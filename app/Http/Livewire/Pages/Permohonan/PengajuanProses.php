<?php

namespace App\Http\Livewire\Pages\Permohonan;

use App\Models\Pengajuan;
use Livewire\Component;

class PengajuanProses extends Component
{
    public $kode, $data;
    protected $queryString = ['kode' => ['except' => '', 'as' => 'id'],];

    public function mount()
    {
        $this->data = Pengajuan::find($this->kode);
    }
    public function render()
    {
        return view('livewire.pages.permohonan.pengajuan-proses');
    }
}
