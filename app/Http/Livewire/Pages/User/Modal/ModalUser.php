<?php

namespace App\Http\Livewire\Pages\User\Modal;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ModalUser extends Component
{
    public $idNya, $name, $email, $instansi_id, $no_hp, $password, $role;

    public function simpan()
    {
        if ($this->idNya) {
            $this->update();
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'instansi_id' => $this->instansi_id,
                'no_hp' => $this->no_hp,
            ])->assignRole('user');
        }
        $this->dispatchBrowserEvent('closeModalUser');
        $this->dispatchBrowserEvent('Success');
        
    }
    public function update()
    {
    }

    public function mount()
    {
        $this->role = Role::get();
    }
    public function render()
    {
        return view('livewire.pages.user.modal.modal-user');
    }
}
