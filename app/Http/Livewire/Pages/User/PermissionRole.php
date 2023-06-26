<?php

namespace App\Http\Livewire\Pages\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class PermissionRole extends Component
{
    public $permission_user, $name;


    public function render()
    {
        return view('livewire.pages.user.permission-role');
    }
}
