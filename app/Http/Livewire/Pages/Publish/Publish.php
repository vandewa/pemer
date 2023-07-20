<?php

namespace App\Http\Livewire\Pages\Publish;


use Livewire\Component;
use App\Models\JenisDokumen;
use Illuminate\Support\Facades\Http;
use App\Models\Publish as ModelPublish;

class Publish extends Component
{
    public $kode, $jenis_dokumen_id, $data,  $no_pemkot, $tgl_mulai, $tgl_berakhir, $para_pihak, $path_perjanjian, $tentang, $tipePerjanjian;
    public $listNoSurat = [], $noSuratString;
    public $driveLink, $idnya;
    public $isAvailable, $showdiv = false, $publish;
    protected $listeners = ['hapus'];

    public function bersihkan()
    {
    }
    public function hapus($id)
    {
        $this->idnya = $id;
        ModelPublish::destroy($this->idnya);
        $this->dispatchBrowserEvent('Delete');
        return redirect()->route('manual.publish');
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
    }
    public function tambahData()
    {
        $this->showdiv = true;
    }

    public function edit_data($id)
    {
        $this->showdiv = true;
        $a = ModelPublish::find($id);
        $c = array_filter(explode(',', $a->no_pemkot));
        foreach ($c as $d) {
            array_push($this->listNoSurat, ['no_pemkot' => $d]);
        }
    }

    public function removeInput($index)
    {
        if (isset($this->lstNoSurat[$index])) {
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
                'no_pemkot' => $this->listNoSurat,
                // 'no_pemkot' => json_encode($this->listNoSurat[1]),
                'para_pihak' => $this->para_pihak,
                'path_surat_perjanjian_kerja' => $this->path_perjanjian,
                'tanggal_mulai' => $this->tgl_mulai,
                'tanggal_selesai' => $this->tgl_berakhir,
            ]
        );
        $this->dispatchBrowserEvent('Success');
        return redirect()->route('manual.publish');
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
