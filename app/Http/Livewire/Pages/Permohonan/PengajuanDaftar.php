<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Livewire\Component;

class PengajuanDaftar extends Component
{
    public $data_id;
    protected $listeners = ['lihatPengajuan'];
    protected $queryString = ['data_id' => ['except' => '', 'as' => 'id']];
    public $showModal = false;
    public function lihatPengajuan($id)
    {
        $this->showModal = true;
    }
    public function render()
    {
        return view('livewire.pages.permohonan.pengajuan-daftar');
    }
}
