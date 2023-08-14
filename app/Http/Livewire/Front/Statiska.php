<?php

namespace App\Http\Livewire\Front;

use App\Models\Publish;
use Livewire\Component;
use App\Models\JenisDokumen;

class Statiska extends Component
{
    public $publish, $data = [], $start_date,  $end_date;
    public function mount()
    {
        if ($this->start_date && $this->end_date === null) {
            $kbAntarDaerah = Publish::where('jenis_dokumen_id', 1)->whereBetween('created_at', [$this->start_date, $this->end_date])->count();
            $kbLuarNegeri = Publish::where('jenis_dokumen_id', 2)->whereBetween('created_at', [$this->start_date, $this->end_date])->count();
            $kbPihakKetiga = Publish::where('jenis_dokumen_id', 3)->whereBetween('created_at', [$this->start_date, $this->end_date])->count();
            $sinergi = Publish::where('jenis_dokumen_id', 4)->whereBetween('created_at', [$this->start_date, $this->end_date])->count();
            $pksAntarDaerah = Publish::where('jenis_dokumen_id', 5)->whereBetween('created_at', [$this->start_date, $this->end_date])->count();
            $pksLuarNegeri = Publish::where('jenis_dokumen_id', 6)->whereBetween('created_at', [$this->start_date, $this->end_date])->count();
            $pksPihakKetiga = Publish::where('jenis_dokumen_id', 7)->whereBetween('created_at', [$this->start_date, $this->end_date])->count();
            $this->publish = Publish::all()->whereBetween('created_at', [$this->start_date, $this->end_date])->sortByDesc("id");
        } else {
            $kbAntarDaerah = Publish::where('jenis_dokumen_id', 1)->count();
            $kbLuarNegeri = Publish::where('jenis_dokumen_id', 2)->count();
            $kbPihakKetiga = Publish::where('jenis_dokumen_id', 3)->count();
            $sinergi = Publish::where('jenis_dokumen_id', 4)->count();
            $pksAntarDaerah = Publish::where('jenis_dokumen_id', 5)->count();
            $pksLuarNegeri = Publish::where('jenis_dokumen_id', 6)->count();
            $pksPihakKetiga = Publish::where('jenis_dokumen_id', 7)->count();
            $this->publish = Publish::all()->sortByDesc("id");
        }
        $this->data = [
            'labels' => ['Kesepakatan Bersama Antar Daerah', 'Kesepakatan Bersama Luar Negeri', 'Kesepakatan Bersama Pihak Ketiga', 'Sinergi', 'Perjanjian Kerja Sama Antar Daerah', 'Perjanjian Kerja Sama Luar Negeri', 'Perjanjian Kerja Sama Pihak Ketiga'],
            'datasets' => [
                [
                    'data' => [$kbAntarDaerah,  $kbLuarNegeri, $kbPihakKetiga, $sinergi, $pksAntarDaerah, $pksLuarNegeri, $pksPihakKetiga],
                ],
            ],
        ];
    }
    public function render()
    {
        return view('livewire.front.statiska')->layout('layouts.frontend.app');
    }
}
