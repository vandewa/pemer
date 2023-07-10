<?php

namespace App\Http\Livewire\Pages;

use DateTime;
use App\Models\Publish;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PublishList extends DataTableComponent
{
    protected $model = Publish::class;
    public $no = 0, $data;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $this->no = $this->page > 1 ? ($this->page - 1) * $this->perPage : 0;
        return [
            Column::make("No", "id")->format(fn () => ++$this->no),
            Column::make("Nomor Dokumen", "no_pemkot")
                ->sortable(),
            Column::make("Pihak Kerjasama", "para_pihak")
                ->sortable(),
            Column::make("Tentang", "pengajuanNya.judul")
                ->sortable(),
            Column::make('Jangka Waktu', 'jangka_waktu')
                ->sortable(),
            Column::make('Selisih Waktu')
                ->format(function ($value, $row) {
                    $mulai = new DateTime($row->tanggal_mulai);
                    $selesai = new DateTime($row->tanggal_selesai);
                    $selisih = $mulai->diff($selesai);
                    return $selisih->format('%y');
                }),
        ];
    }
}
