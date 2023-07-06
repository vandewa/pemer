<?php

namespace App\Http\Livewire\Pages\Permohonan\Modal;

use Livewire\Component;

class ShowSuratStudiKelayakan extends Component
{
    public $path_file;
    protected $listeners = ['SuratStudiKelayakanEvent' => 'SuratStudiKelayakanHandleEvent'];
    public function SuratStudiKelayakanHandleEvent($path)
    {
        $this->path_file = $path['tampung_id'];
    }
    public function render()
    {
        return view('livewire.pages.permohonan.modal.show-surat-studi-kelayakan');
    }
}
