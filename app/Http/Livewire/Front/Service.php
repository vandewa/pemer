<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Service extends Component
{
    public function sign_in()
    {
        dd('aa');
    }
    public function render()
    {
        return view('livewire.front.service');
    }
}
