<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Option extends Component
{
    public $selected;
    public $value;
    public $label;

    /**
     * Create a new component instance.
     */
    public function __construct($selected, $value, $label)
    {
        $this->selected = $selected;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.option');
    }

    public function isSelected(): bool
    {
        return $this->value === $this->selected;
    }
}
