<?php

namespace App\Http\Livewire\Master;

use App\Models\Kategori as ModelsKategori;
use Livewire\Component;

class Kategori extends Component
{
    public $edit, $nama, $idnya;
    protected $listeners = ['hapus'];
    public $form = [
        'name' => ""
    ];

    public function hapus($id)
    {
        $this->idnya = $id;
        ModelsKategori::destroy($this->idnya);
        $this->dispatchBrowserEvent('Delete');
        $this->clear();
    }
    public function store()
    {
        if ($this->edit) {
            $this->editStore();
            return 0;
        }
        $a =  ModelsKategori::create($this->form);
        if ($a) {
            $this->dispatchBrowserEvent('Success');
            $this->clear();
        }
    }

    public function editStore()
    {
        ModelsKategori::find($this->edit)->update($this->form);
        $this->dispatchBrowserEvent('Update');
        $this->clear();
    }

    public function clear()
    {
        $this->form['name'] = "";
        $this->edit = 0;
    }
    public function show($id)
    {
        $a = ModelsKategori::find($id);
        $this->edit = $a->id;
        $this->form['name'] = $a->name;
    }


    public function render()
    {
        $data =  ModelsKategori::select('*');
        if ($this->nama) {
            $data->where('name', 'like', "%$this->nama%");
        }
        $data =  $data->paginate(10);
        return view('livewire.master.kategori', [
            'kategori' => $data
        ]);
    }
}
