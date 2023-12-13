<?php

namespace App\Http\Livewire\Pages\User\Modal;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditPermission extends Component
{
    public $id_permission, $data, $idnya, $name;
    protected $rules = [
        'name' => 'required'
    ];
    protected $listeners = [
        'triggerEvent' => 'handleEvent',
    ];
    public function handleEvent($terima_id)
    {
        $this->data = Permission::find($terima_id['tampung_id']);
        $this->idnya = $this->data->id;
        $this->name = $this->data->name;
    }

    public function simpan_p()
    {
    }
    public function render()
    {
        return view('livewire.pages.user.modal.edit-permission');
    }
}
