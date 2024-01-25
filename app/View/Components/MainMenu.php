<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public $menuRow = null;
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $query = [
            ['status',2],
            ['type','Main menu'],
            ['parent_id',0],
        ];
        $menus = Menu::where($query)->orderBy('sort_order','asc')->get();
        return view('components.main-menu',compact('menus'));
    }
}
