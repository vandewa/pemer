<?php

namespace App\Http\Livewire\Front;

use App\Models\Publish;
use Livewire\Component;

class Statiska extends Component
{
    public $publish;
    public function mount()
    {
        $this->publish = Publish::all();
    }
    public function render()
    {
        return view('livewire.front.statiska')->layout('layouts.frontend.app');
    }
}
