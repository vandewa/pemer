<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithFileUploads;
use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\Storage;

class Post extends Component
{
    use WithFileUploads;
    public $kategori, $idNya, $kategori_id, $judul, $path_file, $isEdit, $btnUpdate;
    protected $listeners = ['hapus'];

    public function hapus($id)
    {
        $this->idNya = $id;

        $b = ModelsPost::find($this->idNya);
        Storage::delete($b->path_file);
        $b->delete();
        $this->dispatchBrowserEvent('Delete');
        $this->clear();
    }
    public function edit($id)
    {
        $this->isEdit = true;
        $this->btnUpdate = true;
        $a = ModelsPost::find($id);
        $this->idNya = $a->id;
        $this->kategori_id = $a->kategori_id;
        $this->judul = $a->judul;
        $this->path_file = $a->path_file;
    }
    public function store()
    {
        $this->validate(
            [
                'kategori_id' => 'required',
                'judul' => 'required',
                'path_file' => 'required|mimes:pdf|max:2000'
            ],
            [
                'path_file.required' => 'Wajib upload File',
                'path_file.mimes' => 'Hanya format .pdf',
                'path_file.max' => 'Maksimal upload 2 Mb',
            ]
        );
        $file1 = $this->path_file->store('asiksobo/post/');
        ModelsPost::create([
            'kategori_id' => $this->kategori_id,
            'judul' => $this->judul,
            'path_file' => $file1
        ]);
        $this->dispatchBrowserEvent('Success');
        $this->clear();
    }

    public function editStore()
    {
        $post = ModelsPost::find($this->idNya);
        if ($this->path_file !== $post->path_file) {
            Storage::delete($post->path_file);
            $newFilePath = $this->path_file->store('asiksobo/post/');
        } else {
            $newFilePath = $post->path_file;
        }
        $post->update(
            [
                'kategori_id' => $this->kategori_id,
                'judul' => $this->judul,
                'path_file' => $newFilePath,
            ]
        );
        $this->dispatchBrowserEvent('Update');
        $this->clear();
    }
    public function clear()
    {
        $this->kategori_id = '';
        $this->judul = '';
        $this->path_file = '';
        $this->isEdit = false;
        $this->idNya = '';
    }

    public function form()
    {
        $this->isEdit = true;
    }

    public function mount()
    {
        $this->kategori = Kategori::all();
    }
    public function render()
    {
        $data = ModelsPost::all();
        return view('livewire.master.post', [
            'posts' => $data
        ]);
    }
}
