<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
    public \App\Models\Question $question;
    public int $iteration;

    public function __construct(\App\Models\Question $question, int $iteration)
    {
        $this->question = $question;
        $this->iteration = $iteration;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question');
    }
}
