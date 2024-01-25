<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function sort(Request $request)
    {
        $value = $request->data;
        $query = Product::query();
        $query->where('2121110393_product.status', 2)
            ->join('2121110393_category', '2121110393_product.category_id', '=', '2121110393_category.id')
            ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
            ->select('2121110393_product.*', '2121110393_category.name as category_name', '2121110393_brand.name as brand_name');
        switch ($value) {
            case 'newdesc':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldasc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'pricedesc':
                $query->orderBy('price', 'desc');
                break;
            case 'priceasc':
                $query->orderBy('price', 'asc');
                break;
            default:
                break;
        }
        $products = $query->get();
        $images = Image::all();

        return response()->json(array($products, $images), 200);
    }
    public function filter(Request $request)
    {
        $requestData = $request->all();
        $query = Product::query();
        $data = $requestData['data'];
        $query->Where('2121110393_product.status', 2);
        if (isset($data['category'])) {
            $listId = $data['category'];
            $query->whereIn('category_id', $listId);
        }
        if (isset($data['brand'])) {
            $listId = $data['brand'];
            $query->whereIn('brand_id', $listId);
        }
        if (isset($data['price'])) {
            $min = $data['price']['min'];
            $max = $data['price']['max'];
            $query->where([['price', '>=', $min], ['price', '<=', $max], ['2121110393_product.status', 2]]);
        }
        $products = $query
            ->join('2121110393_category', '2121110393_product.category_id', '=', '2121110393_category.id')
            ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
            ->select('2121110393_product.*', '2121110393_category.name as category_name', '2121110393_brand.name as brand_name')
            ->get();
        $images = Image::all();
        return response()->json(array($products, $images), 200);
    }
    public function comment(Request $request)
    {
        $comment = new Comments();
        $comment->content = $request->data['content'];
        $comment->post_id = $request->data['post_id'];
        $comment->user_id = 1;
        $comment->save();
        return response()->json(array($request->data), 200);
    }
    public function commentShow(Request $request)
    {
        $comment = Comments::where('post_id', $request->data)
            ->join('2121110393_user', '2121110393_comments.user_id', '=', '2121110393_user.id')
            ->select('2121110393_comments.*', '2121110393_user.name as user_name')
            ->get();
        return response()->json($comment, 200);
    }

    public function addToCart(Request $request){
        $product_id = $request->data;
        $product = Product::where([['2121110393_product.id', $product_id],['2121110393_product.status',2]])
        ->join('2121110393_category', '2121110393_product.category_id', '=', '2121110393_category.id')
        ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
        ->select('2121110393_product.*', '2121110393_category.name as category_name', '2121110393_brand.name as brand_name')
        ->first();

        return response()->json($product, 200);
    }
}
