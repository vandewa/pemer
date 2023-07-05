<?php

namespace App\Http\Livewire\Pages\Permohonan;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PengajuanList extends DataTableComponent
{
    protected $model = Pengajuan::class;
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
    public function builder(): Builder
    {
        return Pengajuan::where('pemohon_id', Auth()->user()->id);
    }
    public function getID($terima_id)
    {
        $this->dispatchBrowserEvent('kirim_id', [
            'kirim_id' => $terima_id
        ]);
        $this->dispatchBrowserEvent('show-modal-pengajuan');
    }
    public function columns(): array
    {
        return [
            Column::make("No", "id")->format(fn () => ++$this->no +  ($this->page - 1) * $this->perPage),
            Column::make("Status Pengajuan", "status")
                ->format(
                    function ($value, $row, Column $column) {
                        switch ($row->status) {
                            case ('Pengajuan'):
                                return ' <span class="badge bg-info">Pengajuan</span>';
                                break;
                            case ('Ditinjau'):
                                return ' <span class="badge bg-warning">Di terima</span>';
                                break;
                            case ('Diproses'):
                                return ' <span class="badge bg-warning">Di Proses</span>';
                                break;
                            case ('Selesai'):
                                return ' <span class="badge bg-success">Selesai</span>';
                                break;
                            case ('Ditolak'):
                                return ' <span class="badge bg-danger">Di Tolak</span>';
                                break;
                        }
                    }
                )
                ->html(),
            Column::make("Judul", "judul"),
            Column::make("Jenis", 'jenis_dokumen_id')
                ->format(function ($value, $row, Column $column) {
                    return $row->jenisDokument->perjanjianTipe->name . ' ' . $row->jenisDokument->name;
                }),
            Column::make("Surat Permohonan", "path_surat_permohonan")
                ->format(
                    function ($value, $row, Column $column) {
                        return '<div>
                    <div class="list-icons">
                        <div class="dropdown">
                        <a  href="' . $row->path_surat_permohonan . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views" target="_blank">Lihat File</a>
                        </div>
                    </div>';
                    }
                )
                ->html(),
            Column::make("Studi Kelayakan / KAK", "tgl_permohonan")
                ->format(
                    function ($value, $row, Column $column) {
                        return '<div>
                <div class="list-icons">
                    <div class="dropdown">
                    <a  href="' . $row->tgl_permohonan . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views" target="_blank">Lihat File</a>
                    </div>
                </div>';
                    }
                )
                ->html(),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        return '<div>
                        <div class="list-icons">
                            <div class="dropdown">
                            <a wire:click="getID(' . $row->id . ')" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                            </div>
                        </div>';
                    }
                )
                ->html(),

        ];
    }
}
