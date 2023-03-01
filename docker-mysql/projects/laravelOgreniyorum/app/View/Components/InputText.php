<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    //    public function __construct(string $type)

    public function __construct(public string $type, public string $placeholder)
    {
        //        $this->type = $type;
    }
    /**
     * Create a new component instance.
     */
    public const TYPES = ['text', 'checkbox', 'submit'];

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (in_array($this->type, self::TYPES))
        {
            $class = "form-control";
            return view('components.input-text', compact('class'));
        }
        else if (false)
        {
            $class = "bg-warning";
            return view('components.input-text', compact('class'));
        }
       return "";
    }
}
