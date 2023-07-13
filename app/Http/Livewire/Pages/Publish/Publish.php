<?php

namespace App\Http\Livewire\Pages\Publish;

use App\Models\Publish as ModelPublish;
use Livewire\Component;
use App\Models\JenisDokumen;

class Publish extends Component
{
    public $kode, $jenis_dokumen_id, $data, $keterangan, $no_pemkot, $tgl_mulai, $tgl_berakhir, $para_pihak, $path_perjanjian, $tentang, $tipePerjanjian;
    public $listNoSurat = [], $noSuratString;

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

    public function simpan()
    {
        $noSuratValues = '';
        foreach ($this->listNoSurat as $item) {
            if (isset($item['no_pemkot'])) {
                $noSuratValues = $item['no_pemkot'] . ',' . $noSuratValues;
            }
        }
        ModelPublish::create(
            [
                'jenis_dokumen_id' => $this->jenis_dokumen_id,
                'tentang' => $this->tentang,
                'no_pemkot' => $noSuratValues,
                'para_pihak' => $this->para_pihak,
                'path_surat_perjanjian_kerja' => $this->path_perjanjian,
                'tanggal_mulai' => $this->tgl_mulai,
                'tanggal_selesai' => $this->tgl_berakhir,
            ]
        );
    }
    

    public function mount()
    {
        $this->tipePerjanjian = JenisDokumen::all();
    }
    public function render()
    {
        return view('livewire.pages.publish.publish');
    }
}
