<?php

namespace App\Http\Livewire\Pages\Permohonan;

use App\Models\Pengajuan;
use App\Models\Publish;
use Livewire\Component;
use Livewire\WithFileUploads;

class PengajuanProses extends Component
{
    use WithFileUploads;
    public $kode, $data, $keterangan, $no_pemkot, $tgl_mulai, $tgl_berakhir, $para_pihak, $path_perjanjian;
    public $listNoSurat = [], $noSuratString;
    protected $queryString = ['kode' => ['except' => '', 'as' => 'id'],];

    public function publish()
    {
        if ($this->listNoSurat == []) {
            $this->validate([
                'urutan.no_pemkot' => 'required'
            ]);
        }
        $this->validate(
            [
                'tgl_mulai' => 'required',
                'tgl_berakhir' => 'required',
                'para_pihak' => 'required',
                'path_perjanjian' => 'required|mimes:pdf,jpg,jpeg,png|max:20000',
            ],
            [
                'path_perjanjian.required' => 'Wajib upload File',
                'path_perjanjian.mimes' => 'Hanya format gambar(jpg, png, jpeg) Dan pdf',
                'path_perjanjian.max' => 'Maksimal upload 20 Mb'
            ]
        );
        $this->data->status = 'Selesai';
        $this->data->save();
        $noSuratValues = '';
        foreach ($this->listNoSurat as $item) {
            if (isset($item['no_pemkot'])) {
                $noSuratValues = $item['no_pemkot'] . ',' . $noSuratValues;
            }
        }
        $file = $this->path_perjanjian->store('asiksobo/surat_perjanjian');
        Publish::create(
            [
                'jenis_dokumen_id' => $this->data->jenis_dokumen_id,
                'pengajuan_id' => $this->data->id,
                'no_pemkot' => $noSuratValues,
                'para_pihak' => $this->para_pihak,
                'path_surat_perjanjian_kerja' => $file,
                'tanggal_mulai' => $this->tgl_mulai,
                'tanggal_selesai' => $this->tgl_berakhir,
            ]
        );
        $this->dispatchBrowserEvent('Success');
        return redirect()->route('pengajuan.daftar');
    }
    public $urutan = [
        'no_pemkot' => ''

    ];
    public function tambahNomor()
    {
        $this->validate([
            'urutan.no_pemkot' => 'required'
        ]);
        array_push($this->listNoSurat, $this->urutan);
        $this->urutan = [
            'no_pemkot' => ''
        ];
    }

    public function suratPermohonan($path_surat_permohonan)
    {
        $this->dispatchBrowserEvent('path_surat_permohonan', [
            'path_surat_permohonan' => $path_surat_permohonan
        ]);
        $this->dispatchBrowserEvent('show-view-modal-path-surat-permohonan');
    }

    public function suratStudiKak($path_surat_studi_kak)
    {
        $this->dispatchBrowserEvent('path_surat_studi_kak', [
            'path_surat_studi_kak' => $path_surat_studi_kak
        ]);
        $this->dispatchBrowserEvent('show-view-modal-path-surat-studi-kelayakan');
    }
    public function mount()
    {
        $this->data = Pengajuan::find($this->kode);
    }
    public function render()
    {
        return view('livewire.pages.permohonan.pengajuan-proses');
    }
}
