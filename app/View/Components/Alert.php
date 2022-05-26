<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    public $level;
    public $message;

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        if (session('alert')) {
            $this->level = session('alert')['level'];
            $this->message = session('alert')['message'];
            return view('components.alert');
        }
    }
}
