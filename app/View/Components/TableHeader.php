<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableHeader extends Component
{
    public $headers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-header');
    }
}
