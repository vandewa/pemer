<?php

namespace App\Http\Livewire\Pages\User\Modal;

use Livewire\Component;

class ModalSelect2 extends Component
{
    public $selectedItems = [];
    public function render()
    {
        return view('livewire.pages.user.modal.modal-select2');
    }
}
