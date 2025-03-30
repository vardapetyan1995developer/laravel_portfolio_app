<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Heading extends Component
{
    public string $title;

    /**
     * @param string $title
     */
    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.custom.heading');
    }
}
