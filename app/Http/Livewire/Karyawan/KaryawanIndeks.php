<?php

namespace App\Http\Livewire\Karyawan;

use Livewire\Component;
use App\Models\Karyawans;
use App\Models\Absens;
use Ramsey\Uuid\Uuid;

class KaryawanIndeks extends Component
{
	public $name;
	public $position;
	public $level;
	public $selected_id;
	public $updatedMode = false;

    protected $rules = [
        'name' => 'required',
        'position' => 'required',
        'level' => 'required'
    ];

    public function render()
    {
        return view('livewire.karyawan.karyawan-indeks',[
        	'data' => Karyawans::latest()->get()
        ]);
    }


    public function save()
    {
    	$this->validate();

    	Karyawans::create([
            'uuid' => Uuid::uuid4()->toString(),
    		'name' => $this->name,
    		'position' => $this->position,
    		'level' => $this->level
    	]);

    	session()->flash('berhasil','Data karyawan berhasil di tambahkan!');
    	$this->resetInput();
    	$this->emit('addKaryawan');
    }

    private function resetInput()
    {
    	$this->name = null;
    	$this->position = null;
    	$this->level = null;
    }

    public function edit($id)
    {
    	$find = Karyawans::find($id);
    	
    	
    	$this->selected_id = $find->id;
        $this->user_id = $find->uuid;
    	$this->name = $find->name;
    	$this->position = $find->position;
    	$this->level = $find->level;

    	$this->updatedMode = true;
    }

    public function update()
    {
    	$this->validate();

    	if ($this->selected_id) {
    		$find = Karyawans::find($this->selected_id);
    		$find->update([
    		'name' => $this->name,
    		'position' => $this->position,
    		'level' => $this->level
    		]);

    		$this->resetInput();
    		$this->updatedMode = false;
    		session()->flash('berhasil','Data berhasil di update!');
            $this->emit('update');
    	}
    }

    public function destroy($id)
    {
        if($id){
            Karyawans::where('id',$id)->delete();
            Absens::where('user_id', $id)->delete();
            session()->flash('hapus', 'Data berhasil di hapus');
        }
    }
}
