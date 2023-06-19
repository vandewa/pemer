<?php

namespace App\Http\Livewire\Master;

use App\Models\JenisDokumen;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipePerjanjian;

class DokumenJenis extends Component
{
    use WithPagination;
    public $delete_id;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'rowsDeleted'];
    public $edit = 0;

    public $nama, $listPerjanjian;

    public $form = [
        'name' => "", 
        'tipe_perjanjian_id' => ""
    ];

    public function mount()
    {
        $this->listPerjanjian = TipePerjanjian::all();
    }

    public function store()
    {
        if($this->edit){
            $this->editStore();
            return 0;
        }
       $a =  JenisDokumen::create($this->form);
       if($a){
        session()->flash('success', 'Data berhasil disimpan');  
        $this->clear();
       }
    }

    public function show($id)
    {
        $a = JenisDokumen::find($id);
        $this->edit = $a->id;
        $this->form['name'] = $a->name;
        $this->form['tipe_perjanjian_id'] = $a->tipe_perjanjian_id;
    }

    public function clear()
    {
        $this->form['name'] = "";
        $this->form['tipe_perjanjian_id'] = "";
        $this->edit = 0;
    }

    public function editStore()
    {
        JenisDokumen::find($this->edit)->update($this->form);

        $this->clear();
    }
    public function hapus($var)
    {
        $this->delete_id = $var;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function rowsDeleted()
    {
        JenisDokumen::where('id', $this->delete_id)->first()->delete();
        $this->dispatchBrowserEvent('Delete');
    }

    public function render()
    {
        $data =  JenisDokumen::with('perjanjianTipe')->select('*');
        if($this->nama){
            $data->where('name', 'like', "%$this->nama%");
        }
        $data=  $data->paginate(10);
        return view('livewire.master.dokumen-jenis', [
            'posts' => $data
        ]);
    }
}
