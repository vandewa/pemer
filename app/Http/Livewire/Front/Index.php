<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.front.index')->layout('layouts.frontend.app');;
    }
}
