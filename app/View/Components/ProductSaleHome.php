<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ProductSaleHome extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $list_product = Product::where('2121110393_product.status',2)
        // ->orderByRaw('((price_sale * 100) / price) DESC')
        // ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
        // ->select('2121110393_product.*','2121110393_brand.name as brand_name',
        // DB::raw('(price_sale * 100) / price) as sale'))
        // ->take(10)
        // ->get();
        $list_product = Product::where('2121110393_product.status', 2)
        ->orderByRaw('(((price - price_sale) / price) * 100) DESC')
        ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
        ->select('2121110393_product.*', '2121110393_brand.name as brand_name', DB::raw('ROUND((((price - price_sale) / price) * 100)) as sale'))
        ->take(8)
        ->get();

        // print_r($list_product);
        return view('components.product-sale-home',compact('list_product'));
    }
}
