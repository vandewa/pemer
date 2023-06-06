<?php

namespace App\Http\Livewire\Pages\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserPage extends Component
{
    public $idnya;
    public $name;
    public $email;
    public $password;
    public $role_user;
    public $password_confirmation;
    public $role;
    public $no_hp;
    public $opd;

    public function simpanData()
    {
        if ($this->idnya) {
            $this->patchData();
        } else {
            $this->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'role_user' => 'required',
                'password' => 'required|same:password_confirmation',
                'password_confirmation' => 'same:password'
            ]);

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'no_hp' => $this->no_hp,
                'opd' => $this->opd,
                'password' => Hash::make($this->password),
            ])->assignRole($this->role_user);

            $this->dispatchBrowserEvent('Success');
            redirect()->to(route('user.index'));
        }
    }

    public function patchData()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->idnya,
            'role_user' => 'required',
            'password' => 'same:password_confirmation',
            'password_confirmation' => 'same:password'
        ]);

        $user = User::find($this->idnya);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'opd' => $this->opd,
        ]);

        DB::table('model_has_roles')->where('model_id', $this->idnya)->delete();

        $user->assignRole($this->role_user);

        if ($this->password) {
            User::find($this->idnya)->update([
                'password' => Hash::make($this->password),
            ]);
        }

        redirect()->to(route('user.index'));
    }

    public function mount($id = "")
    {
        if ($id != "") {
            $data = User::find($id);
            $this->name = $data->name;
            $this->email = $data->email;
            $this->no_hp = $data->no_hp;
            $this->opd = $data->opd;
            $this->role_user = $data->getRoleNames();
        }

        $this->role = Role::get();
        $this->idnya = $id;
    }

    public function render()
    {
        return view('livewire.pages.user.user-page');
    }
}