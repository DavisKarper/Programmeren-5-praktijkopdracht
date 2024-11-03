<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeletePopupModal extends Component
{
    public $item;
    public $route;


    /**
     * Create a new component instance.
     *
     * @param $item
     * @param string $route
     */
    public function __construct($item, string $route = 'dashboard')
    {
        $this->item = $item;
        $this->route = $route;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.delete-popup-modal');
    }
}
