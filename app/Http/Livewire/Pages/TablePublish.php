<?php

namespace App\Http\Livewire\Pages;

use App\Models\Publish;
use Livewire\Component;

class TablePublish extends Component
{
    public $publish, $jenis_id;
    public function path_surat_perjanjian($path)
    {
        $this->dispatchBrowserEvent('path_surat_perjanjian', [
            'path_surat_perjanjian' => $path
        ]);
        $this->dispatchBrowserEvent('show-view-modal-path-surat-perjanjian');
    }
    public function mount()
    {
        if ($this->jenis_id == null) {
            $this->publish = Publish::all();
        } else {
            $this->publish = Publish::where('jenis_dokumen_id', $this->jenis_id)->get();
        }
    }


    public function render()
    {
        return view('livewire.pages.table-publish');
    }
}
