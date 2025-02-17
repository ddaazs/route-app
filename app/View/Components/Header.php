<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * The message instance.
     *
     * @var string
     */
    public $message;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param string $type ,string $message
     *   $this->type = $type;
     *   $this->message = $message;
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.header');
    }

    // public function shouldRender()  {
    //     return Str::length($this->message) >0;
    // }
}
