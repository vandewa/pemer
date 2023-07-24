<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Livewire\Component;
use App\Models\Pengajuan;

class TablePengajuan extends Component
{
    public $pengajuan;

    public function getID($terima_id)
    {
        // dd($terima_id);
        $this->dispatchBrowserEvent('kirim_id', [
            'kirim_id' => $terima_id
        ]);
        $this->dispatchBrowserEvent('show-modal-pengajuan');
    }

    public function mount()
    {
        if (!auth()->user()->hasRole('admin')) {
            $this->pengajuan = Pengajuan::where('pemohon_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        }
        $this->pengajuan = Pengajuan::orderBy('id', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.pages.permohonan.table-pengajuan');
    }
}
