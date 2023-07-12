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
    public $no_hp, $instansi_id;

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
            $phoneNumber = $this->no_hp;

            if (substr($phoneNumber, 0, 2) === '62') {
                $modifiedPhoneNumber = $phoneNumber;
            } else {
                $modifiedPhoneNumber = substr_replace($phoneNumber, '62', 0, 1);
            }
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'no_hp' =>  $modifiedPhoneNumber,
                'intansi_id' => $this->intansi_id,
                'password' => Hash::make($this->password),
            ])->assignRole($this->role_user);

            $this->dispatchBrowserEvent('Success');
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
        $phoneNumber = $this->no_hp;

        if (substr($phoneNumber, 0, 2) === '62') {
            $modifiedPhoneNumber = $phoneNumber;
        } else {
            $modifiedPhoneNumber = substr_replace($phoneNumber, '62', 0, 1);
        }
        $user = User::find($this->idnya);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $modifiedPhoneNumber,
            'instansi_id' => $this->instansi_id,
        ]);

        DB::table('model_has_roles')->where('model_id', $this->idnya)->delete();

        $user->assignRole($this->role_user);

        if ($this->password) {
            User::find($this->idnya)->update([
                'password' => Hash::make($this->password),
            ]);
        }
        $this->dispatchBrowserEvent('Update');
    }

    public function mount()
    {
        $data = User::find(auth()->user()->id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->no_hp = $data->no_hp;
        $this->instansi_id = $data->instansi_id;
        $this->role_user = $data->getRoleNames();

        $this->role = Role::get();
        $this->idnya = $data->id;
    }

    public function render()
    {
        return view('livewire.pages.user.user-page');
    }
}
