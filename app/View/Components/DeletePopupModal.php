<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeletePopupModal extends Component
{
    public $item;

    /**
     * Create a new component instance.
     *
     * @param int $item
     */
    public function __construct($item)
    {
        $this->item = $item;
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
