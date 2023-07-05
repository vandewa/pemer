<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Livewire\Component;
use App\Models\Pengajuan as ModelPengajuan;
use App\Models\Perjanjian;
use App\Models\JenisDokumen;


class Pengajuan extends Component
{
    public $tipePerjanjian, $jenis_dokumen_id, $no_surat, $tgl_permohonan, $judul, $obyek, $ruang_lingkup, $path_surat_permohonan, $path_studi_kak;
    public $listNoSurat = [], $noSuratString;

    public function simpan()
    {
        if ($this->listNoSurat == []) {
            $this->validate([
                'urutan.no_surat' => 'required'
            ]);
        }
        $this->validate([
            'jenis_dokumen_id' => 'required',
            'tgl_permohonan' => 'required',
            'judul' => 'required',
            'obyek' => 'required',
            'ruang_lingkup' => 'required',
            'path_surat_permohonan' => 'required',
            'path_studi_kak' => 'required',
        ]);
        $noSuratValues = '';
        foreach ($this->listNoSurat as $item) {
            if (isset($item['no_surat'])) {
                $noSuratValues = $item['no_surat'] . ',' . $noSuratValues;
            }
        }
        ModelPengajuan::create(
            [
                'jenis_dokumen_id' => $this->jenis_dokumen_id,
                'no_surat' => $noSuratValues,
                'tgl_permohonan' => $this->tgl_permohonan,
                'judul' => $this->judul,
                'obyek' => $this->obyek,
                'ruang_lingkup' => $this->ruang_lingkup,
                'path_surat_permohonan' => $this->path_surat_permohonan,
                'path_studi_kak' => $this->path_studi_kak,
                'pemohon_id' => Auth()->user()->id
            ]
        );
        $this->clearfield();
        $this->dispatchBrowserEvent('Success');
    }

    public $urutan = [
        'no_surat' => ''

    ];
    public function tambahNomor()
    {
        $this->validate([
            'urutan.no_surat' => 'required'
        ]);
        array_push($this->listNoSurat, $this->urutan);
        $this->urutan = [
            'no_surat' => ''
        ];
    }
    public function clearfield()
    {
        $this->jenis_dokumen_id = '';
        $this->tgl_permohonan = '';
        $this->judul = '';
        $this->obyek = '';
        $this->ruang_lingkup = '';
        $this->path_surat_permohonan = '';
        $this->path_studi_kak = '';
        $this->listNoSurat = [];
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
