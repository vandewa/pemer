<?php

namespace App\Http\Livewire\Pages;

use App\Http\Livewire\Pages\Permohonan\Pengajuan;
use App\Models\JenisDokumen;
use App\Models\Publish;
use Livewire\Component;

class Home extends Component
{
    public $data, $publish;
    public function mount()
    {
        $this->data = JenisDokumen::all();
        $this->publish = Publish::all();
    }
    public function render()
    {
        return view('livewire.pages.home');
    }
}
