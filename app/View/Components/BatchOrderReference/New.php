<?php

namespace App\View\Components\BatchOrderReference;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class New extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        // public $batchOrder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.batch-order-reference.new');
    }
}
