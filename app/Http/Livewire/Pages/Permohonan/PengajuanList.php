<?php

namespace App\Http\Livewire\Pages\Permohonan;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PengajuanList extends DataTableComponent
{
    protected $model = Pengajuan::class;
    public $no = 0;
    protected $listeners = ['path_surat_permohonan', 'path_surat_studi_kelayakan'];


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }
    public function builder(): Builder
    {
        if (!auth()->user()->hasRole('admin')) {
            return Pengajuan::where('pemohon_id', auth()->user()->id);
        }
        return Pengajuan::query();
    }
    public function path_surat_studi_kelayakan($path_surat_studi_kak)
    {
        $this->dispatchBrowserEvent('path_surat_studi_kak', [
            'path_surat_studi_kak' => $path_surat_studi_kak
        ]);
        $this->dispatchBrowserEvent('show-view-modal-path-surat-studi-kelayakan');
    }
    public function path_surat_permohonan($path_surat_permohonan)
    {
        $this->dispatchBrowserEvent('path_surat_permohonan', [
            'path_surat_permohonan' => $path_surat_permohonan
        ]);
        $this->dispatchBrowserEvent('show-view-modal-path-surat-permohonan');
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
        $this->no = $this->page > 1 ? ($this->page - 1) * $this->perPage : 0;
        return [
            Column::make("No", "id")->format(fn () => ++$this->no),
            Column::make("Status Pengajuan", "status")
                ->format(
                    function ($value, $row, Column $column) {
                        switch ($row->status) {
                            case ('Pengajuan'):
                                return ' <div class="chip chip-md bg-info">Pengajuan</div>';
                                break;
                            case ('Diterima'):
                                return ' <div class="chip chip-md bg-warning">Di Terima</div>';
                                break;
                            case ('Diproses'):
                                return ' <div class="chip chip-md bg-warning">Di Proses</div>';
                                break;
                            case ('Selesai'):
                                return ' <div class="chip chip-md bg-success">Selesai</div>';
                                break;
                            case ('Ditolak'):
                                return ' <div class="chip chip-md bg-danger">Di Tolak</div>';
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
                        return '<button class="btn btn-sm btn-info" wire:click="$emit(\'path_surat_permohonan\',\'' . $row->path_surat_permohonan . '\')">View</button>';
                    }
                )
                ->html(),
            Column::make("Studi Kelayakan / KAK", "path_studi_kak")
                ->format(
                    function ($value, $row, Column $column) {
                        return '<button class="btn btn-sm btn-info" wire:click="$emit(\'path_surat_studi_kelayakan\',\'' . $row->path_studi_kak . '\')">View</button>';
                    }
                )
                ->html(),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        if (!auth()->user()->hasRole("admin")) {
                            return '
                            <div class="ms-auto">
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle " data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                <a wire:click="getID(' . $row->id . ')" class="dropdown-item" href="javascript:;">Lihat Data</a>                      
                              </div>
                            </div>
                          </div>';
                        }
                        return '
                        <div class="ms-auto">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle " data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                            <a class="dropdown-item" wire:click="getID(' . $row->id . ')" href="javascript:;">Lihat Data</a>
                                                       
                            <a class="dropdown-item" href="' . route("pengajuan.proses", ["id" => $row->id]) . '">Proses</a>                       
                          </div>
                        </div>
                      </div>';
                    }
                )
                ->html(),

        ];
    }
}
