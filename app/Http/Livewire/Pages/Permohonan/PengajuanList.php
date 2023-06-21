<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Perjanjian;

class PengajuanList extends DataTableComponent
{
    protected $model = Perjanjian::class;
    public $no;


    public function mount()
    {
        $this->no;
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("No", "id")->format(fn () => ++$this->no +  ($this->page - 1) * $this->perPage)->sortable(),
            Column::make("Status Pengajuan", "status")
                ->format(
                    function ($value, $row, Column $column) {
                        if ($row->status == 1) {
                            return '<span class="badge badge-success">Active</span>';
                        } else {
                            return '<span class="badge badge-warning">Tidak</span>';
                        }
                    }
                )
                ->html(),
            Column::make("No. Dokumen Pemkot", "no_pemkot")
                ->sortable()->searchable(),
            Column::make("No. Dokumen Penyedia", "no_penyedia")
                ->sortable()->searchable(),
            Column::make("Perjanjian Kerjasama", "judul")
                ->sortable()->searchable(),
            Column::make("Pihak I", "pihak_1")
                ->sortable()->searchable(),
            Column::make("Pihak II", "pihak_2")
                ->sortable()->searchable(),
            Column::make("Tentang", "tentang")
                ->sortable()->searchable(),
            Column::make("Ruang Lingkup", "ruang_lingkup")
                ->sortable()->searchable(),
            Column::make("Jangka Waktu", "tanggal_mulai")
                ->sortable()->searchable(),
            Column::make("Batas Akhir", "tanggal_selesai")
                ->sortable()->searchable(),
        ];
    }
}
