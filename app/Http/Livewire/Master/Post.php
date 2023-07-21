<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use App\Models\Kategori;
use App\Models\Post as ModelsPost;

class Post extends Component
{
    public $kategori, $idNya, $kategori_id, $nama, $path_file, $isEdit;

    public function clear()
    {
    }

    public function form()
    {
        $this->isEdit = true;
    }

    public function mount()
    {
        $this->kategori = Kategori::get();
    }
    public function render()
    {
        $data = ModelsPost::select('*');
        if ($this->nama) {
            $data->where('name', 'like', "%$this->nama%");
        }
        return view('livewire.master.post', [
            'posts' => $data
        ]);
    }
}
