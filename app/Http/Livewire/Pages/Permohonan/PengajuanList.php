<?php

namespace App\Http\Livewire\Pages\Permohonan;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Perjanjian;
use Illuminate\Database\Eloquent\Builder;

class PengajuanList extends DataTableComponent
{
    protected $model = Perjanjian::class;
    public $no, $data_id = 1;

    public function mount($data_id)
    {
        $this->no;
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }
    public function builder(): Builder
    {
        if ($this->data_id !== null) {
            return Perjanjian::where('jenis_dokumen_id', $this->data_id);
        }
        return Perjanjian::query();
    }
    public function columns(): array
    {
        return [
            Column::make("No", "id")->format(fn () => ++$this->no +  ($this->page - 1) * $this->perPage),
            Column::make("Status Pengajuan", "status")
                ->format(
                    function ($value, $row, Column $column) {
                        switch ($row->status) {
                            case ('open'):
                                return ' <span class="badge bg-primary">Open</span>';
                                break;
                            case ('done'):
                                return ' <span class="badge bg-success">Konfirmasi</span>';
                                break;
                            case ('reject'):
                                return ' <span class="badge bg-danger">Di Tolak</span>';
                                break;
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
