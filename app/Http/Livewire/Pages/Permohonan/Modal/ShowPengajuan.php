<?php

namespace App\Http\Livewire\Pages\Permohonan\Modal;

use App\Models\Pengajuan;
use Livewire\Component;

class ShowPengajuan extends Component
{
    public $data, $pengajuan_id, $judul, $no_surat, $obyek, $tgl_permohonan, $ruang_lingkup, $jenis;
    protected $listeners = [
        'triggerEvent' => 'handleEvent',
    ];
    public function handleEvent($pengajuan_id)
    {
        $this->data = Pengajuan::find($pengajuan_id['tampung_id']);
        $this->judul = $this->data->judul;
        $this->jenis = $this->data->jenisDokument->perjanjianTipe->name . ' ' . $this->data->jenisDokument->name;
        $this->no_surat = $this->data->no_surat;
        $this->obyek = $this->data->obyek;
        $this->tgl_permohonan = $this->data->tgl_permohonan;
        $this->ruang_lingkup = $this->data->ruang_lingkup;
    }
    public function render()
    {
        return view('livewire.pages.permohonan.modal.show-pengajuan');
    }
}
