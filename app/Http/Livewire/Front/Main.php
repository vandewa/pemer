<?php

namespace App\Http\Livewire\Front;

use App\Models\ProfileOpd;
use Livewire\Component;

class Main extends Component
{
    public $data, $path_file, $judul, $isi;
    public function mount()
    {
        $this->data = ProfileOpd::find('1');
        $this->path_file = $this->data['gambar'];
        $this->judul = $this->data['judul'];
        $this->isi = $this->data['isi'];
    }
    public function render()
    {
        return view('livewire.front.main');
    }
}
