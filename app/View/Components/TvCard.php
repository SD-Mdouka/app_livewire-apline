<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TvCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tvshow;
    public function __construct($tvshow)
    {
        //
        $this->tvshow = $tvshow;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tv-card');
    }
}