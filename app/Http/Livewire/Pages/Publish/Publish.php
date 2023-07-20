<?php

namespace App\Http\Livewire\Pages\Publish;


use Livewire\Component;
use App\Models\JenisDokumen;
use Illuminate\Support\Facades\Http;
use App\Models\Publish as ModelPublish;

class Publish extends Component
{
    public $jenis_dokumen_id, $data, $tgl_mulai, $tgl_berakhir, $para_pihak, $path_perjanjian, $tentang, $tipePerjanjian;
    public $listNoSurat = [], $noSuratString;
    public $driveLink, $idnya;
    public $isAvailable, $showdiv = false, $publish, $isEdit = false;
    protected $listeners = ['hapus'];

    public function bersihkan()
    {
        $this->idnya = '';
        $this->jenis_dokumen_id = '';
        $this->tgl_mulai = '';
        $this->tgl_berakhir = '';
        $this->para_pihak = '';
        $this->path_perjanjian = '';
        $this->tentang = '';
        $this->urutan = [
            'no_pemkot' => ''
        ];
    }
    public function hapus($id)
    {
        $this->idnya = $id;
        ModelPublish::destroy($this->idnya);
        $this->dispatchBrowserEvent('Delete');
        $this->bersihkan();
    }
    public function checkAvailability()
    {
        if ($this->path_perjanjian) {
            try {
                $response = Http::head($this->path_perjanjian);

                if ($response->ok()) {
                    $this->isAvailable = true;
                } else {
                    $this->isAvailable = false;
                }
            } catch (\Exception $e) {
                // Handle the exception here
                $this->isAvailable = false;
            }
        } else {
            $this->isAvailable = false;
        }
    }

    public function kembali()
    {
        $this->showdiv = false;
        $this->isEdit = false;
        $this->bersihkan();
    }
    public function tambahData()
    {
        $this->showdiv = true;
    }

    public function edit_data($id)
    {
        $this->showdiv = true;
        $this->isEdit = true;
        $a = ModelPublish::find($id);
        $c = array_filter(explode(',', $a->no_pemkot));
        foreach ($c as $d) {
            array_push($this->listNoSurat, ['no_pemkot' => $d]);
        }
        $this->jenis_dokumen_id = $a->jenis_dokumen_id;
        $this->tgl_mulai = $a->tgl_mulai;
        $this->tgl_berakhir = $a->tgl_berakhir;
        $this->tentang = $a->tentang;
        $this->path_perjanjian = $a->path_surat_perjanjian_kerja;
        $this->para_pihak = $a->para_pihak;
    }
    public function update()
    {


        foreach ($this->listNoSurat as $item) {

            if (isset($item['no_pemkot'])) {
                $noSuratValues = $item['no_pemkot'] . ',';
            }
        }
        $update = ModelPublish::find($this->idnya);
        $update->no_pemkot = $noSuratValues;
        $update->tgl_mulai = $this->tanggal_mulai;
        $update->tgl_berakhir = $this->tanggal_berakhir;
        $update->para_pihak = $this->para_pihak;
        $update->tentang = $this->tentang;
        $update->jenis_dokumen_id = $this->jenis_dokumen_id;
        $update->path_surat_perjanjian_kerja = $this->path_perjanjian;
        $update->update();
        $this->dispatchBrowserEvent('Update');
        $this->bersihkan();
        $this->showdiv = false;
    }
    public function removeInput($index)
    {
        if (isset($this->listNoSurat[$index])) {
            unset($this->listNoSurat[$index]);
        }
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

    public function simpan()
    {
        if ($this->listNoSurat == []) {
            $this->validate([
                'urutan.no_pemkot' => 'required'
            ]);
        }
        $this->validate(
            [
                'jenis_dokumen_id' => 'required',
                'tentang' => 'required',
                'para_pihak' => 'required',
                'tgl_mulai' => 'required',
                'tgl_berakhir' => 'required',
                'path_perjanjian' => 'required'
            ]
        );
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
                // 'no_pemkot' => json_encode($this->listNoSurat[1]),
                'para_pihak' => $this->para_pihak,
                'path_surat_perjanjian_kerja' => $this->path_perjanjian,
                'tanggal_mulai' => $this->tgl_mulai,
                'tanggal_selesai' => $this->tgl_berakhir,
            ]
        );
        $this->dispatchBrowserEvent('Success');
        $this->bersihkan();
        $this->showdiv = false;
    }


    public function mount()
    {
        $this->tipePerjanjian = JenisDokumen::all();
        $this->publish = ModelPublish::orderBy('id', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.pages.publish.publish');
    }
}
