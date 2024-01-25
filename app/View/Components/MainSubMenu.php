<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainSubMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public $menuRank1=null;
    public function __construct($menu)
    {
        $this->menuRank1 = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menuRank1 = $this->menuRank1;
        $query = [
            ['status',2],
            ['type','Main menu'],
            ['parent_id',$menuRank1->id],
        ];
        $menuRank2 = Menu::where($query)->orderBy('sort_order','asc')->get(); 
        return view('components.main-sub-menu',compact('menuRank1','menuRank2'));
    }
}
