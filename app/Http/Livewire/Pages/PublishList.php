<?php

namespace App\Http\Livewire\Pages;

use App\Models\Publish;
use Livewire\Component;

class PublishList extends Component
{
    public $kode, $data, $a, $b;
    protected $queryString = ['kode' => ['except' => '', 'as' => 'jenis_id']];

    public function mount()
    {
        $this->data = Publish::where('jenis_dokumen_id', $this->kode)->get();
        foreach ($this->data as $row) {
            $this->b = $row->jenisDokumen->name;
            $this->a = $row->jenisDokumen->perjanjianTipe->name;
        }
    }
    public function render()
    {
        return view('livewire.pages.publish-list');
    }
}
