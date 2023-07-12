<?php

namespace App\Http\Livewire\Pages\User\Modal;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ModalUser extends Component
{
    public $idNya, $name, $email, $instansi_id, $no_hp, $password, $role, $data;
    protected $listeners = [
        'triggerEvent' => 'handleEvent',
    ];
    public function handleEvent($tampung_id)
    {
        $this->data = User::find($tampung_id['tampung_id']);
        $this->idNya = $this->data->id;
        $this->name = $this->data->name;
        $this->email = $this->data->email;
        $this->instansi_id = $this->data->instansi_id;
        $this->no_hp = $this->data->no_hp;
    }
    public function clear()
    {
        $this->idNya = '';
        $this->name = '';
        $this->email = '';
        $this->instansi_id = '';
        $this->no_hp = '';
    }
    public function simpan()
    {
        if ($this->idNya) {
            $this->update();
        } else {
            $phoneNumber = $this->no_hp;

            if (substr($phoneNumber, 0, 2) === '62') {
                $modifiedPhoneNumber = $phoneNumber;
            } else {
                $modifiedPhoneNumber = substr_replace($phoneNumber, '62', 0, 1);
            }
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'instansi_id' => $this->instansi_id,
                'no_hp' => $modifiedPhoneNumber,
            ])->assignRole('user');
        }
        $this->clear();
        $this->dispatchBrowserEvent('closeModalUser');
        $this->dispatchBrowserEvent('Success');
    }
    public function update()
    {

        $phoneNumber = $this->no_hp;

        if (substr($phoneNumber, 0, 2) === '62') {
            $modifiedPhoneNumber = $phoneNumber;
        } else {
            $modifiedPhoneNumber = substr_replace($phoneNumber, '62', 0, 1);
        }
        $user = User::find($this->idNya);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $modifiedPhoneNumber,
            'instansi_id' => $this->instansi_id,
        ]);

        if ($this->password) {
            User::find($this->idnya)->update([
                'password' => Hash::make($this->password),
            ]);
        }
        $this->dispatchBrowserEvent('Update');
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
