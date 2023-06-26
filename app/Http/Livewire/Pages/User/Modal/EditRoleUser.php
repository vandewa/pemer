<?php

namespace App\Http\Livewire\Pages\User\Modal;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRoleUser extends Component
{
    public $id_user, $name, $data, $idnya;
    public $permission_user;

    protected $listeners = [
        'triggerEvent' => 'handleEvent',
    ];
    protected $rules = [
        'name' => 'required|min:3',
        'permission_user' => 'required',
    ];

    public function simpan()
    {
        $this->validate();
        if ($this->idnya) {
            $this->update();
        } else {
            $role = Role::create([
                "name" => $this->name,
                'guard_name' => 'web'
            ]);
            $role->givePermissionTo($this->permission_user);
        }
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('Success');
    }
    public function update()
    {
        $role = Role::find($this->idnya);
        if ($role) {
            $role->update([
                "name" => $this->name,
            ]);
            $role->syncPermissions($this->permission_user);
        }
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('Success');
    }
    public function handleEvent($user_id)
    {
        $this->id_user = $user_id['data'];
        $this->data = Role::find($this->id_user);
        $this->idnya = $this->data->id;
        $this->name = $this->data->name;
        $this->permission_user = $this->data->getPermissionNames();
        $this->dispatchBrowserEvent('select2untukroleuser');
    }
    public function render()
    {
        return view('livewire.pages.user.modal.edit-role-user');
    }
}
