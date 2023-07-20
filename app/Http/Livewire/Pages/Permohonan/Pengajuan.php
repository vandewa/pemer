<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Livewire\Component;
use App\Models\Pengajuan as ModelPengajuan;
use Illuminate\Support\Facades\Http;
use App\Models\JenisDokumen;
use App\Models\User;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

class Pengajuan extends Component
{
    use WithFileUploads;
    public $tipePerjanjian, $jenis_dokumen_id, $no_surat, $tgl_permohonan, $judul, $obyek, $ruang_lingkup, $path_surat_permohonan;
    public $path_studi_kak, $submit = false;
    public $listNoSurat = [], $noSuratString;

    public function toggleCheckbox()
    {
        if ($this->checkbox) {
            // Checkbox is selected
            // Perform actions or emit events as needed
            // For example, you can emit an event to notify other components
            $this->emit('checkboxSelected');
        } else {
            // Checkbox is deselected
            // Perform actions or emit events as needed
            // For example, you can emit an event to notify other components
            $this->emit('checkboxDeselected');
        }
    }

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
                'path_surat_permohonan' => 'required|mimes:pdf|max:2000',
                'path_studi_kak' => 'required|mimes:pdf|max:20000'
            ],
            [
                'path_surat_permohonan.required' => 'Wajib upload File',
                'path_surat_permohonan.mimes' => 'Hanya format .pdf',
                'path_surat_permohonan.max' => 'Maksimal upload 2 Mb',
                'path_studi_kak.required' => 'Wajib upload File',
                'path_studi_kak.mimes' => 'Hanya format .pdf',
                'path_studi_kak.max' => 'Maksimal upload 2 Mb',
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
        $data = ModelPengajuan::create(
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

        $judul = $data->jenisDokument->perjanjianTipe->name . ' ' . $data->jenisDokument->name;
        $nama_pemohon = $data->pemohon->name;
        $lembaga = $data->pemohon->lembagaNya->name;
        $hari = Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd');
        $hari_indonesia = Lang::get($hari);
        $tanggal = Carbon::parse($data->created_at)->locale('id_ID')->translatedFormat('d F Y');
        $message = "* $judul*" . urldecode('%0D%0A%0D%0A') .
            "Pengajuan Anda telah terkirim dan menunggu pihak Pemerintahan Sekretariat Daerah Wonosobo mengkonfirmasi." . urldecode('%0D%0A%0D%0A%0D%0A') .
            "*𝐃𝐢𝐬𝐜𝐥𝐚𝐢𝐦𝐞𝐫: 𝐏𝐞𝐬𝐚𝐧 𝐈𝐧𝐢 𝐚𝐝𝐚𝐥𝐚𝐡 𝐩𝐞𝐬𝐚𝐧 𝐨𝐭𝐨𝐦𝐚𝐭𝐢𝐬 𝐝𝐚𝐫𝐢 𝐚𝐩𝐥𝐢𝐤𝐚𝐬𝐢 A𝐬𝐢𝐤 Wonosobo  *" . urldecode('%0D%0A') .
            "*@2023 Pemerintahan Sekretariat Daerah Wonosobo | Dinas Komunikasi dan Informatika Kab. Wonosobo*" . urldecode('%0D%0A');

        $message2 =
            "Terdapat pengajuan sebagai berikut :" . urldecode('%0D%0A%0D%0A%0D%0A') .
            "Nama Pengajuan :  $judul" . urldecode('%0D%0A') .
            "Nama Pemohon : $nama_pemohon" . urldecode('%0D%0A') .
            "Lembaga : $lembaga" . urldecode('%0D%0A') .
            "Hari : $hari_indonesia;" . urldecode('%0D%0A') .
            "Tanggal : $tanggal" . urldecode('%0D%0A%0D%0A') .
            "Silahkan untuk segera mendisposisi, klik pada tautan berikut :" . urldecode('%0D%0A%0D%0A%0D%0A') .
            "https://asik.wonosobokab.go.id/pengajuan/proses?id=$data->id" . urldecode('%0D%0A%0D%0A%0D%0A') .
            "*𝐃𝐢𝐬𝐜𝐥𝐚𝐢𝐦𝐞𝐫: 𝐏𝐞𝐬𝐚𝐧 𝐈𝐧𝐢 𝐚𝐝𝐚𝐥𝐚𝐡 𝐩𝐞𝐬𝐚𝐧 𝐨𝐭𝐨𝐦𝐚𝐭𝐢𝐬 𝐝𝐚𝐫𝐢 𝐚𝐩𝐥𝐢𝐤𝐚𝐬𝐢 A𝐬𝐢𝐤 Wonosobo*" . urldecode('%0D%0A%0D%0A%0D%0A') .
            "*@2023 Pemerintahan Sekretariat Daerah Wonosobo | Dinas Komunikasi dan Informatika Kab. Wonosobo*" . urldecode('%0D%0A');

        //kirim pesan dan wa ke Pemohon
        $admin = User::find(1);
        Http::withHeaders([
            'Authorization' => config('app.token_wa'),
        ])->withoutVerifying()->post(config('app.wa_url') . "/send-message", [
            'phone' => $admin->no_hp, //6289650352118 admin asik
            'message' =>  $message,
        ]);

        //kirim pesan wa ke admin
        Http::withHeaders([
            'Authorization' => config('app.token_wa'),
        ])->withoutVerifying()->post(config('app.wa_url') . "/send-message", [
            'phone' => $data->pemohon->no_hp,
            'message' =>  $message2,
        ]);
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
