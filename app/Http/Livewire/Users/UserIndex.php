<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\User;

class UserIndex extends Component
{

	public $name;
	public $username;
	public $password;
	public $confirm_password;
	public $selected_id;
	public $updatedMode = false;

	protected $rules = [
        'name' => 'required|max:255|string',
        'username' => 'required|string|max:100|unique:users|regex:/^\S*$/u',
        'password' => 'nullable|min:8',
        'confirm_password' => 'same:password'
    ];
    public function render()
    {
        return view('livewire.users.user-index',[
        	'users' => User::all()
        ]);
    }

    public function save()
    {
    	$this->validate();

    	User::create([
    		'name' => $this->name,
    		'username' => $this->username,
    		'password' => bcrypt($this->password)
    	]);

    	session()->flash('berhasil','Data user berhasil di tambahkan!');
    	$this->resetInput();
    	$this->emit('addKaryawan');
    }

    private function resetInput()
    {
    	$this->name = null;
    	$this->username = null;
    	$this->password = null;
    }
     public function edit($id)
    {
        $find = User::find($id);
        
        
        $this->selected_id = $id;
        $this->name = $find->name;
        $this->username = $find->username;

        $this->updatedMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $find = User::find($this->selected_id);
            $find->update([
            'name' => $this->name,
            'username' => $this->username,
            'password' => bcrypt($this->password)
            ]);

            $this->resetInput();
            $this->updatedMode = false;
            session()->flash('berhasil','Data user berhasil di update!');
            $this->emit('update');
        }
    }

    public function destroy($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('hapus', 'Data user berhasil di hapus');
        }
    }
}
