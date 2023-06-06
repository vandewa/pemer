<?php

namespace App\Http\Livewire\Pages\User;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class ListUser extends DataTableComponent
{
    /**
     * @var [type]
     */
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'rowsDeleted'];

    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function hapus($var)
    {
        $this->delete_id = $var;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function rowsDeleted()
    {
        User::where('id', $this->delete_id)->first()->delete();
        $this->dispatchBrowserEvent('Delete');
    }

    public function columns(): array
    {
        return [
            Column::make("Nama", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make('Role', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        $tampung = [];
                        if (!empty($row->getRoleNames())) {
                            foreach ($row->getRoleNames() as $role) {
                                $tampung[] = '<label class=" badge bg-primary">' . $role . '</label>';
                            }
                            return implode(" ", $tampung);
                        }
                    }
                )
                ->html(),
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