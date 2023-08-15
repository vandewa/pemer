<?php

namespace App\Http\Livewire\Pages\Permohonan;

use App\Models\Pengajuan;
use App\Models\Publish;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class PengajuanProses extends Component
{
    use WithFileUploads;
    public $kode, $data, $keterangan, $no_pemkot, $tgl_mulai, $tgl_berakhir, $para_pihak, $path_perjanjian, $tentang;
    public $listNoSurat = [], $noSuratString, $isAvailable;
    protected $queryString = ['kode' => ['except' => '', 'as' => 'id'],];

    public function diterima()
    {
        $pengajuan = pengajuan::find($this->kode);
        $pengajuan->update([
            'status' => 'Diterima',
            'keterangan' => $this->keterangan,
        ]);
        $judul = $pengajuan->jenisDokument->perjanjianTipe->name . ' ' . $pengajuan->jenisDokument->name;
        $message = "* $judul*" . urldecode('%0D%0A%0D%0A') .
            "Pengajuan Anda telah Di Terima oleh pihak Pemerintahan Sekretariat Daerah Wonosobo dengan keterangan : $pengajuan->keterangan." . urldecode('%0D%0A%0D%0A%0D%0A') .
            "*𝐃𝐢𝐬𝐜𝐥𝐚𝐢𝐦𝐞𝐫: 𝐏𝐞𝐬𝐚𝐧 𝐈𝐧𝐢 𝐚𝐝𝐚𝐥𝐚𝐡 𝐩𝐞𝐬𝐚𝐧 𝐨𝐭𝐨𝐦𝐚𝐭𝐢𝐬 𝐝𝐚𝐫𝐢 A𝐩𝐥𝐢𝐤𝐚𝐬𝐢 A𝐬𝐢𝐤 Sobo  *" . urldecode('%0D%0A') .
            "*@2023 Pemerintahan Sekretariat Daerah Wonosobo | Dinas Komunikasi dan Informatika Kab. Wonosobo*" . urldecode('%0D%0A');
        Http::withHeaders([
            'Authorization' => config('app.token_wa'),
        ])->withoutVerifying()->post(config('app.wa_url') . "/send-message", [
            'phone' => $pengajuan->pemohon->no_hp,
            'message' =>  $message,
        ]);
        $this->dispatchBrowserEvent('Success');
        return redirect()->route('pengajuan.daftar');
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
    public function diproses()
    {
        $pengajuan = pengajuan::find($this->kode);
        $pengajuan->update([
            'status' => 'Diproses',
            'keterangan' => $this->keterangan,
        ]);
        $judul = $pengajuan->jenisDokument->perjanjianTipe->name . ' ' . $pengajuan->jenisDokument->name;
        $message = "* $judul*" . urldecode('%0D%0A%0D%0A') .
            "Pengajuan Anda telah Di Proses oleh pihak Pemerintahan Sekretariat Daerah Wonosobo dengan keterangan : $pengajuan->keterangan." . urldecode('%0D%0A%0D%0A%0D%0A') .
            "*𝐃𝐢𝐬𝐜𝐥𝐚𝐢𝐦𝐞𝐫: 𝐏𝐞𝐬𝐚𝐧 𝐈𝐧𝐢 𝐚𝐝𝐚𝐥𝐚𝐡 𝐩𝐞𝐬𝐚𝐧 𝐨𝐭𝐨𝐦𝐚𝐭𝐢𝐬 𝐝𝐚𝐫𝐢 A𝐩𝐥𝐢𝐤𝐚𝐬𝐢 A𝐬𝐢𝐤 Sobo  *" . urldecode('%0D%0A') .
            "*@2023 Pemerintahan Sekretariat Daerah Wonosobo | Dinas Komunikasi dan Informatika Kab. Wonosobo*" . urldecode('%0D%0A');
        Http::withHeaders([
            'Authorization' => config('app.token_wa'),
        ])->withoutVerifying()->post(config('app.wa_url') . "/send-message", [
            'phone' => $pengajuan->pemohon->no_hp,
            'message' =>  $message,
        ]);
        $this->dispatchBrowserEvent('Success');
        return redirect()->route('pengajuan.daftar');
    }
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
                'path_perjanjian' => 'required',
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
        $publish = Publish::create(
            [
                'jenis_dokumen_id' => $this->data->jenis_dokumen_id,
                'pengajuan_id' => $this->data->id,
                'tentang' => $this->tentang,
                'no_pemkot' => $noSuratValues,
                'para_pihak' => $this->para_pihak,
                'path_surat_perjanjian_kerja' => $this->path_perjanjian,
                'tanggal_mulai' => $this->tgl_mulai,
                'tanggal_selesai' => $this->tgl_berakhir,
            ]
        );
        $judul =  $publish->jenisDokumen->perjanjianTipe->name . ' ' . $publish->jenisDokumen->name;
        $pemohon = $publish->pengajuanNya->pemohon->name;
        $lembaga =  $publish->pengajuanNya->pemohon->lembagaNya->name;
        $jangka_waktu = $publish->tanggal_mulai . ' s.d ' . $publish->tanggal_selesai;
        $message = "Kepada Yth," . urldecode('%0D%0A') .
            "Bapak/Ibu/ Saudara di tempat" . urldecode('%0D%0A') .
            "Diberitahukan bahwa pengajuan Bapak/Ibu sebagai berikut:" . urldecode('%0D%0A') .
            "Nama Pengajuan :  $judul" . urldecode('%0D%0A') .
            "Nama Pemohon : $pemohon" . urldecode('%0D%0A') .
            "Lembaga : $lembaga" . urldecode('%0D%0A') .
            "Jangka Waktu : $jangka_waktu" . urldecode('%0D%0A%0D%0A') .
            "Telah Selesai dan di publish di Website Asik Sobo, klik link berikut untuk detail:" . urldecode('%0D%0A%0D%0A') .
            "https://asiksobo.wonosobokab.go.id/pengajuan/user" . urldecode('%0D%0A%0D%0A%0D%0A') .
            "*𝐃𝐢𝐬𝐜𝐥𝐚𝐢𝐦𝐞𝐫: 𝐏𝐞𝐬𝐚𝐧 𝐈𝐧𝐢 𝐚𝐝𝐚𝐥𝐚𝐡 𝐩𝐞𝐬𝐚𝐧 𝐨𝐭𝐨𝐦𝐚𝐭𝐢𝐬 𝐝𝐚𝐫𝐢 Ap𝐥𝐢𝐤𝐚𝐬𝐢 A𝐬𝐢𝐤 Sobo*" . urldecode('%0D%0A%0D%0A%0D%0A') .
            "*@2023 Pemerintahan Sekretariat Daerah Wonosobo | Dinas Komunikasi dan Informatika Kab. Wonosobo*" . urldecode('%0D%0A');
        Http::withHeaders([
            'Authorization' => config('app.token_wa'),
        ])->withoutVerifying()->post(config('app.wa_url') . "/send-message", [
            'phone' => $publish->pengajuanNya->pemohon->no_hp,
            'message' =>  $message,
        ]);
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
