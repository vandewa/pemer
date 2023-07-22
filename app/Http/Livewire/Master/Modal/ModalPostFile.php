<?php

namespace App\Http\Livewire\Master\Modal;

use App\Models\Post;
use Livewire\Component;

class ModalPostFile extends Component
{
    public $isShow = false;
    public $path_file;

    protected $listeners = ['showPostFile'];

    public function showPostFile($id = "")
    {
        $this->isShow = !$this->isShow;
        if ($id) {
            $data = Post::find($id);
            $this->path_file = $data->path_file;
        }
    }
    public function render()
    {
        return view('livewire.master.modal.modal-post-file');
    }
}
