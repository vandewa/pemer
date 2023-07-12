<?php

namespace App\Http\Livewire\Pages\Permohonan\Modal;

use Livewire\Component;

class ShowSuratPermohonan extends Component
{
    public $path_file;
    protected $listeners = ['SuratPermohonanEvent' => 'SuratPermohonanHandleEvent'];

    public function SuratPermohonanHandleEvent($path)
    {
        $this->path_file = $path['tampung_id'];
    }
    public function render()
    {
        return view('livewire.pages.permohonan.modal.show-surat-permohonan');
    }
}
