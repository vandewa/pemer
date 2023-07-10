<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Livewire\Component;
use App\Models\Pengajuan as ModelPengajuan;
use App\Models\Perjanjian;
use App\Models\JenisDokumen;
use Livewire\WithFileUploads;

class Pengajuan extends Component
{
    use WithFileUploads;
    public $tipePerjanjian, $jenis_dokumen_id, $no_surat, $tgl_permohonan, $judul, $obyek, $ruang_lingkup, $path_surat_permohonan, $path_studi_kak;
    public $listNoSurat = [], $noSuratString;

    public function simpan()
    {
        if ($this->listNoSurat == []) {
            $this->validate([
                'urutan.no_surat' => 'required'
            ]);
        }
        $this->validate(
            [
                'jenis_dokumen_id' => 'required',
                'tgl_permohonan' => 'required',
                'judul' => 'required',
                'obyek' => 'required',
                'ruang_lingkup' => 'required',
                'path_surat_permohonan' => 'required|mimes:pdf,jpg,jpeg,png|max:20000',
                'path_studi_kak' => 'required|mimes:pdf,jpg,jpeg,png|max:20000',
            ],
            [
                'path_surat_permohonan.required' => 'Wajib upload File',
                'path_surat_permohonan.mimes' => 'Hanya format gambar(jpg, png, jpeg) Dan pdf',
                'path_surat_permohonan.max' => 'Maksimal upload 20 Mb',
                'path_studi_kak.required' => 'Wajib upload File',
                'path_studi_kak.mimes' => 'Hanya format gambar(jpg, png, jpeg) Dan pdf',
                'path_studi_kak.max' => 'Maksimal upload 20 Mb',
            ]
        );
        $noSuratValues = '';
        foreach ($this->listNoSurat as $item) {
            if (isset($item['no_surat'])) {
                $noSuratValues = $item['no_surat'] . ',' . $noSuratValues;
            }
        }
        $file1 = $this->path_surat_permohonan->store('asiksobo/surat_permohonan');
        $file2 = $this->path_studi_kak->store('asiksobo/surat_studi_kelayakan');
        ModelPengajuan::create(
            [
                'jenis_dokumen_id' => $this->jenis_dokumen_id,
                'no_surat' => $noSuratValues,
                'tgl_permohonan' => $this->tgl_permohonan,
                'judul' => $this->judul,
                'obyek' => $this->obyek,
                'ruang_lingkup' => $this->ruang_lingkup,
                'path_surat_permohonan' => $file1,
                'path_studi_kak' => $file2,
                'pemohon_id' => Auth()->user()->id
            ]
        );
        $this->clearfield();
        $this->dispatchBrowserEvent('Success');
        return redirect()->route('pengajuan');
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
        $this->path_surat_permohonan = [];
        $this->path_studi_kak = [];
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
