<?php

namespace App\Http\Livewire\Pages\Permohonan\Modal;

use App\Models\Pengajuan;
use Livewire\Component;

class ShowPengajuan extends Component
{
    public $data, $pengajuan_id, $judul, $jenis;
    protected $listeners = [
        'triggerEvent' => 'handleEvent',
    ];
    public function handleEvent($pengajuan_id)
    {
        $this->data = Pengajuan::find($pengajuan_id['tampung_id']);
        $this->judul = $this->data->judul;
        $this->jenis = $this->data->jenisDokument->perjanjianTipe->name . ' ' . $this->data->jenisDokument->name;
    }
    public function render()
    {
        return view('livewire.pages.permohonan.modal.show-pengajuan');
    }
}
