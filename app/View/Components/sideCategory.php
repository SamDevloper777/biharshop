<?php

namespace App\View\Components;

use App\Models\category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sideCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   
        $data['mainCategories']=Category::where('parent_id',null)->get();
        return view('components.side-category',$data);
    }
}
