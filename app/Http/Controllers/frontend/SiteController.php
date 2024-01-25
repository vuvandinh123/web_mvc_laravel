<?php

namespace App\Http\Controllers\frontend;

// use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Link;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public function index($slug = '')
    {
        if ($slug == '') {
            return $this->home();
        } else {
            $link = Link::where('slug', $slug)->first();
            if ($link != NULL) {
                $type = $link->type;
                switch ($type) {
                    case "category": {
                            return $this->product_category($slug);
                        }
                    case "brand": {
                            return $this->product_brand($slug);
                        }
                    case "topic": {
                            return $this->post_topic();
                        }
                    case "page": {
                            return $this->post_page($slug);
                        }
                }
            } else {
                $product = Product::where([['status', 2], ['slug', $slug]])->first();
                if ($product != null) {
                    return $this->product_detail($slug);
                } else {
                    $post = Post::where([['status', 2], ['slug', $slug], ['type', 'post']])->first();
                    if ($post != null) {
                        return $this->post_detail($post);
                    } else {
                        // return $this->error_404($slug);
                    }
                }
            }
        }
    }

    private function home()
    {
        return view('frontend.Home.home');
    }
    private function product_brand($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        if ($brand!= NULL) {
            $list_product  = Product::where([['status',2],['brand_id',$brand->id]])->get();
            $brandName = $brand->name;
            return view('frontend.product_brand.product-brand',compact('list_product','brandName'));
        } else {
            return $this->error_404();
        }
    }
    private function product_category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category!= NULL) {
            $list_product  = Product::where([['status',2],['category_id',$category->id]])->get();
            $categoryName = $category->name;
            return view('frontend.product_category.product-category',compact('list_product','categoryName'));
        } else {
            return $this->error_404();
        }
    }
    private function product_detail($slug)
    {
        $product = Product::where('2121110393_product.slug', $slug)
            ->join('2121110393_category', '2121110393_product.category_id', '=', '2121110393_category.id')
            ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
            ->select('2121110393_product.*', '2121110393_category.name as category_name', '2121110393_brand.name as brand_name')
            ->first();
        $images = Image::where('product_id', $product->id)->get();
        $list_product = Product::where([['2121110393_product.status', 2],['category_id', $product->category_id],['2121110393_product.id','!=', $product->id]])
        ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
        ->select('2121110393_product.*', '2121110393_brand.name as brand_name', DB::raw('ROUND((((price - price_sale) / price) * 100)) as sale'))
        ->take(5)
        ->get();
        return view('frontend.Product_Detail.index', compact('product', 'images','list_product'));
    }
    public function cart(){
        return view('frontend.Cart.cart');
    }
    private function post_page($slug)
    {
        $page = Post::where([['status',2],['type','page'],['slug',$slug]])->first();
        return view('frontend.Page.page',compact('page'));
    }
    private function post_detail($post)
    {

        return view('frontend.Post.post_detail', compact('post'));
    }
    public function product()
    {
        $list_product = Product::where('status', 2)->orderBy('created_at', 'desc')->paginate(20);
        return view('frontend.Products.index', compact('list_product'));
    }
    public function post()
    {
        $posts = Post::where([['status', 2], ['type', 'post']])->get();
        $topic = Topic::where('status', 2)->get();
        return view('frontend.Post.index', compact('posts', 'topic',));
    }
    public function contact()
    {
        return view('frontend.Contact.index');
    }
    public function contactPost(Request $request)
    {
        $post = new Contact();
        $post->name = $request->name;
        $post->title = $request->title;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->content = $request->content;
        $post->updated_by = 1;
        $post->user_id = 1;
        $post->replay_id = 1;
        $post->save();
        return redirect()->route('site.contact')->with('success', 'Cập nhập Thương hiệu thành công');
    }
    public function search(Request $request){
        $keyword = $request->query('s');
        $list_product = Product::where('name','LIKE', "%$keyword%")->get();
        return view('frontend.Search.search',compact('keyword','list_product'));
    }
    public function login()
    {
        return view('frontend.Login.index');
    }
    public function loginStore(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Xác thực thông tin đăng nhập
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Đăng nhập thành công

            // Lưu thông tin đăng nhập vào cookie
            $cookieData = [
                'user_id' => $user->id,
                'email' => $user->email,
            ];
            $response = redirect()->route('home')->with('error', 'Thông tin đăng nhập không chính xác');
            $cookie = Cookie::make('login_data', json_encode($cookieData), 60);
            $response->cookie($cookie);

            // Thiết lập cookie trong response

            return $response;
        }


        // Đăng nhập thất bại
        return redirect()->route('site.login')->with('error', 'Thông tin đăng nhập không chính xác');
    }
    public function logout()
    {
        $response = new Response('logot successful');
        $response->cookie('login_data', '', -1);
        return redirect()->route('site.login')->with('error', "đăng xuất thành công");
    }
    public function singup(){
        return view('frontend.Singup.singup');
    }
    public function singupStore(Request $request){
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->username= $request->username;
        $user->password = Hash::make($request->password);;
        $user->roles=0;
        $user->save();
        return redirect()->route('site.login')->with('error', "đăng xuất thành công");

    }
    public function order()
    {
        return view('frontend.Order.index');
    }
}
