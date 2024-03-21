<?php

namespace App\Http\Livewire\Pages\User;

use Livewire\Component;

class DaftarUser extends Component
{
    public function modalUser()
    {
        $this->dispatchBrowserEvent('show-view-modal-user');
    }
    public function render()
    {
        return view('livewire.pages.user.daftar-user');
    }
}
