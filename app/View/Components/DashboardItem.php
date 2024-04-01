<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardItem extends Component
{
    public string $title;
    public string $text;


    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-item');
    }
}
