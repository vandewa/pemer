<?php

namespace App\Http\Livewire\Pages\User;

use Livewire\Component;

class PermissionRole extends Component
{
    public $permission_user;
    public function render()
    {
        return view('livewire.pages.user.permission-role');
    }
}
