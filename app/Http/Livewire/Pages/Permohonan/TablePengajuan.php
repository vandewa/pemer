<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Livewire\Component;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Storage;


class TablePengajuan extends Component
{
    public $pengajuan, $idnya;
    protected $listeners = ['hapus'];

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
        } else {
            $this->pengajuan = Pengajuan::orderBy('id', 'DESC')->get();
        }
    }

    public function hapus($id)
    {
        $this->idnya = $id;
        $data = Pengajuan::find($this->idnya);

        Storage::disk('local')->delete($data['path_surat_permohonan']);
        Storage::disk('local')->delete($data['path_studi_kak']);
        Pengajuan::destroy($this->idnya);
        $this->dispatchBrowserEvent('Delete');
        $this->idnya = '';
        return redirect()->route('pengajuan.daftar');
    }

    public function render()
    {
        return view('livewire.pages.permohonan.table-pengajuan');
    }
}
