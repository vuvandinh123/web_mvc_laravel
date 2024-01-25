<?php

namespace App\View\Components;

use App\Models\Image;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Product extends Component
{
    /**
     * Create a new component instance.
     */
    private $product ;
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product = $this->product;
        $images = Image::where('product_id', $this->product->id)->get();
        return view('components.product',compact('images','product'));
    }
}
