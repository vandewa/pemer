<?php

namespace App\Http\Livewire\Global;

use Livewire\Component;

class ModalSuratPerjanjian extends Component
{
    public $path_file;
    protected $listeners = ['SuratPerjanjianEvent' => 'SuratPerjanjianHandleEvent'];
    public function SuratPerjanjianHandleEvent($path)
    {
        $this->path_file = $path['tampung_id'];
    }
    public function render()
    {
        return view('livewire.global.modal-surat-perjanjian');
    }
}
