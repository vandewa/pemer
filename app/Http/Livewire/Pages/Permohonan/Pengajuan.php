<?php

namespace App\Http\Livewire\Pages\Permohonan;

use App\Models\JenisDokumen;
use App\Models\Perjanjian;
use Livewire\Component;


class Pengajuan extends Component
{
    public $tipePerjanjian, $jenis_dokumen_id, $no_pemkot, $no_penyedia, $judul, $pihak_1, $pihak_2, $tentang, $ruang_lingkup, $tanggal_mulai, $tanggal_selesai;
    protected $rules = [
        'jenis_dokumen_id' => 'required',
        'no_pemkot' => 'required',
        'no_penyedia' => 'required',
        'judul' => 'required',
        'pihak_1' => 'required',
        'pihak_2' => 'required',
        'tentang' => 'required',
        'ruang_lingkup' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_selesai' => 'required',
    ];
    public function simpan()
    {
        $this->validate();
        Perjanjian::insert(
            [
                'status' => 'open',
                'jenis_dokumen_id' => $this->jenis_dokumen_id,
                'no_pemkot' => $this->no_pemkot,
                'no_penyedia' => $this->no_penyedia,
                'judul' => $this->judul,
                'pihak_1' => $this->pihak_1,
                'pihak_2' => $this->pihak_2,
                'tentang' => $this->tentang,
                'ruang_lingkup' => $this->ruang_lingkup,
                'tanggal_mulai' => $this->tanggal_mulai,
                'tanggal_selesai' => $this->tanggal_selesai,
                'pemohon_id' => Auth()->user()->id,
            ]
        );
        $this->clearfield();
        $this->dispatchBrowserEvent('Success');
    }
    public function clearfield()
    {
        $this->jenis_dokumen_id = '';
        $this->no_pemkot = '';
        $this->no_penyedia = '';
        $this->judul = '';
        $this->pihak_1 = '';
        $this->pihak_2 = '';
        $this->tentang = '';
        $this->ruang_lingkup = '';
        $this->tanggal_mulai = '';
        $this->tanggal_selesai = '';
    }
    public function mount()
    {
        $this->tipePerjanjian = JenisDokumen::all();
    }
    public function render()
    {
        return view('livewire.pages.permohonan.pengajuan');
    }
}
