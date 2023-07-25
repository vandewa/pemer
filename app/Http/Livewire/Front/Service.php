<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use Livewire\Component;

class Service extends Component
{
    public $data, $no;
    public function mount()
    {
        $this->data = User::find('1');
        $this->no = $this->data['no_hp'];
    }
    public function render()
    {
        return view('livewire.front.service');
    }
}
