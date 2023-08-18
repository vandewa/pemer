<?php

namespace App\Http\Livewire\Front;

use App\Models\Publish;
use Livewire\Component;
use App\Models\JenisDokumen;

class Statiska extends Component
{
    public $kbAntarDaerah, $kbLuarNegeri, $kbPihakKetiga, $sinergi, $pksAntarDaerah, $pksLuarNegeri, $pksPihakKetiga;
    public $publish, $data = [], $start_date,  $end_date;
    public function cari()
    {
        $this->fetchData($this->start_date, $this->end_date);
        $this->emit('chartUpdate', $this->data);
    }

    public function mount()
    {
        $this->publish = Publish::orderBy('id', 'desc')->get();
        if (!$this->start_date && !$this->end_date) {
            $this->fetchData();
            $this->emit('chartUpdate', $this->data);
        }
    }

    private function fetchData($startDate = null, $endDate = null)
    {
        $documentTypes = [
            1 => 'kbAntarDaerah',
            2 => 'kbLuarNegeri',
            3 => 'kbPihakKetiga',
            4 => 'sinergi',
            5 => 'pksAntarDaerah',
            6 => 'pksLuarNegeri',
            7 => 'pksPihakKetiga',
        ];

        $query = Publish::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }



        foreach ($documentTypes as $typeId => $property) {
            $countQuery = Publish::where('jenis_dokumen_id', $typeId);

            if ($startDate && $endDate) {
                $countQuery->whereBetween('created_at', [$startDate, $endDate]);
            }

            $this->$property = $countQuery->count();
        }
        $dataValues = [
            $this->kbAntarDaerah ?? 0,
            $this->kbLuarNegeri ?? 0,
            $this->kbPihakKetiga ?? 0,
            $this->sinergi ?? 0,
            $this->pksAntarDaerah ?? 0,
            $this->pksLuarNegeri ?? 0,
            $this->pksPihakKetiga ?? 0,
        ];
        $this->data = [
            'labels' => ['Kesepakatan Bersama Antar Daerah', 'Kesepakatan Bersama Luar Negeri', 'Kesepakatan Bersama Pihak Ketiga', 'Sinergi', 'Perjanjian Kerja Sama Antar Daerah', 'Perjanjian Kerja Sama Luar Negeri', 'Perjanjian Kerja Sama Pihak Ketiga'],
            'datasets' => [
                [
                    'data' =>  $dataValues,
                ],
            ],
        ];
    }
    public function render()
    {
        return view('livewire.front.statiska')->layout('layouts.frontend.app');
    }
}
