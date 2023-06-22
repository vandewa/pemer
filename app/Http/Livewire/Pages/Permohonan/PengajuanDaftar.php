<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Livewire\Component;

class PengajuanDaftar extends Component
{
    public $data_id;
    protected $queryString = ['data_id' => ['except' => '', 'as' => 'id']];

   
    public function render()
    {
        return view('livewire.pages.permohonan.pengajuan-daftar');
    }
}
