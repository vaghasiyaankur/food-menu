<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RestaurantTable extends Component
{
    public $title;
    public $headerTitle;
    public $button;
    public $back;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $headerTitle, $button = false, $back = false, $route = null)
    {
        $this->title = $title;
        $this->headerTitle = $headerTitle;
        $this->button = $button;
        $this->back = $back;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.restaurant-table');
    }
}
