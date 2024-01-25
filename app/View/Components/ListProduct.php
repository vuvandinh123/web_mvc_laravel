<?php

namespace App\View\Components;

use App\Models\Image;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ListProduct extends Component
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
        $list_product = Product::where('2121110393_product.status', 2)
            ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
            ->select('2121110393_product.*', '2121110393_brand.name as brand_name', DB::raw('ROUND((((price - price_sale) / price) * 100)) as sale'))
            ->orderBy('created_at', 'desc')->limit(5)
            ->get();
        return view('components.list-product', compact('list_product'));
    }
}
