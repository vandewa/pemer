<?php

namespace App\Http\Livewire\Global;

use Livewire\Component;

class KonfirmasiHapus extends Component
{
    public $isShow = false;
    public $idnya;

    protected $listeners = ['showModal'];

    public function showModal($id = "")
    {
        $this->isShow = !$this->isShow;
        $this->idnya = $id;
    }

    public function confirm()
    {
        $this->emit('hapus',$this->idnya);
        $this->showModal();
    }
    
    public function render()
    {
        return view('livewire.global.konfirmasi-hapus');
    }
}
