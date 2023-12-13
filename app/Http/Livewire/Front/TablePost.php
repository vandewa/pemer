<?php

namespace App\Http\Livewire\Front;

use App\Models\Post;
use Livewire\Component;

class TablePost extends Component
{
    public $posts, $kategori_id;
    protected $listeners = ['tampil'];

    public function tampil($kategori_id)
    {
        $this->posts = Post::where('kategori_id', $kategori_id)->orderBy('id', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.front.table-post');
    }
}
