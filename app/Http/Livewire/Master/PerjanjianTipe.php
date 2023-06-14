<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipePerjanjian;

class PerjanjianTipe extends Component
{
    use WithPagination;
    public $delete_id;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'rowsDeleted'];
    public $edit = 0;

    public $nama;

    public $form = [
        'name' => ""
    ];

    public function store()
    {
        if($this->edit){
            $this->editStore();
            return 0;
        }
       $a =  TipePerjanjian::create($this->form);
       if($a){
        session()->flash('success', 'Data berhasil disimpan');  
       }
    }

    public function show($id)
    {
        $a = TipePerjanjian::find($id);
        $this->edit = $a->id;
        $this->form['name'] = $a->name;
    }

    public function clear()
    {
        $this->form['name'] = "";
        $this->edit = 0;
    }

    public function editStore()
    {
        TipePerjanjian::find($this->edit)->update($this->form);

        $this->clear();
    }
    public function hapus($var)
    {
        $this->delete_id = $var;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function rowsDeleted()
    {
        TipePerjanjian::where('id', $this->delete_id)->first()->delete();
        $this->dispatchBrowserEvent('Delete');
    }
    public function render()
    {
        $data =  TipePerjanjian::select('*');
        if($this->nama){
            $data->where('name', 'like', "%$this->nama%");
        }
        $data=  $data->paginate(10);
        return view('livewire.master.perjanjian-tipe', [
            'posts' => $data
        ]);
    }
}
