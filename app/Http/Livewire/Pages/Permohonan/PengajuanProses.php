<?php

namespace App\Http\Livewire\Pages\Permohonan;

use App\Models\Pengajuan;
use Livewire\Component;

class PengajuanProses extends Component
{
    public $kode, $data, $keterangan;
    protected $queryString = ['kode' => ['except' => '', 'as' => 'id'],];

    public function suratPermohonan($path_surat_permohonan)
    {
        $this->dispatchBrowserEvent('path_surat_permohonan', [
            'path_surat_permohonan' => $path_surat_permohonan
        ]);
        $this->dispatchBrowserEvent('show-view-modal-path-surat-permohonan');
    }

    public function suratStudiKak($path_surat_studi_kak)
    {
        $this->dispatchBrowserEvent('path_surat_studi_kak', [
            'path_surat_studi_kak' => $path_surat_studi_kak
        ]);
        $this->dispatchBrowserEvent('show-view-modal-path-surat-studi-kelayakan');
    }
    public function mount()
    {
        $this->data = Pengajuan::find($this->kode);
    }
    public function render()
    {
        return view('livewire.pages.permohonan.pengajuan-proses');
    }
}
