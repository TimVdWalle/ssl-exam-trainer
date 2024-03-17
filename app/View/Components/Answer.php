<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Answer extends Component
{
    public Answer $answer;

    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answer');
    }
}
