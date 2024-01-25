<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class HotTrendProductHome extends Component
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
        $list_product = Product::where([['2121110393_product.status', 2],['brand_id', 35]])
        ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
        ->select('2121110393_product.*', '2121110393_brand.name as brand_name', DB::raw('ROUND((((price - price_sale) / price) * 100)) as sale'))
        ->take(5)
        ->get();
        return view('components.hot-trend-product-home',compact('list_product'));
    }
}
