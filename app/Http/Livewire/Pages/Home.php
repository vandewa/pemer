<?php

namespace App\Http\Livewire\Pages;

use App\Http\Livewire\Pages\Permohonan\Pengajuan;
use App\Models\JenisDokumen;
use Livewire\Component;

class Home extends Component
{
    public $data;
    public function mount()
    {
        $this->data = JenisDokumen::all();
    }
    public function render()
    {
        return view('livewire.pages.home');
    }
}
