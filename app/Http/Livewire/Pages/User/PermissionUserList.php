<?php

namespace App\Http\Livewire\Pages\User;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Spatie\Permission\Models\Role;

class PermissionUserList extends DataTableComponent
{
    protected $model = Role::class;
    public $no, $data, $user_id, $name, $permission_user;
    public function mount()
    {
        $this->no;
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public function getID($id)
    {
        $this->data = Role::find($id);
        $this->permission_user = $this->data->getPermissionNames();
        $this->dispatchBrowserEvent('data', [
            'data' => $this->data
        ]);
        $this->dispatchBrowserEvent('permission_user', [
            'permission_user' => $this->permission_user
        ]);
        $this->dispatchBrowserEvent('select2untukroleuser');
        $this->dispatchBrowserEvent('show-modal-permission-user');
    }
    public function columns(): array
    {
        return [
            Column::make("No", "id")->format(fn () => ++$this->no +  ($this->page - 1) * $this->perPage),
            Column::make("Name", "name"),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        return '
                         <div class="gap-3 table-actions d-flex align-items-center fs-6">
                           <a href="javascript:void(0)" wire:click="getID(' . $row->id . ')" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" type="button"><i class="bi bi-pencil-fill"></i>
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
