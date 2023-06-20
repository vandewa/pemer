<?php

namespace App\Http\Livewire\Master;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Instansi;

class ListInstansi extends DataTableComponent
{
    protected $model = Instansi::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Kode", "kode")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        return '
                             <div class="gap-3 table-actions d-flex align-items-center fs-6">
                               <a href="' . route('user', $row->id) . '" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" type="button"><i class="bi bi-pencil-fill"></i>
                               </a>
                               <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" wire:click.prevent="hapus(' . $row->id . ')" type="button"><i class="bi bi-trash-fill"></i></a>
                             </div>
                            ';
                    }

                )
                ->html(),
        ];
    }
}
