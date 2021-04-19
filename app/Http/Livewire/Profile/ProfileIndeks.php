<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\User;

class ProfileIndeks extends Component
{
	public $name;
	public $username;
	public $password;
	public $confirm_password;
	public $selected_id;

	protected $rules = [
        'name' => 'nullable',
        'username' => 'nullable|email',
        'password' => 'nullable',
        'confirm_password' => 'same:password'
    ];

    public function mount()
    {
    	$this->selected_id = auth()->user()->uuid;

    	$model = User::find($this->selected_id);
    	$this->name = $model->name;
    	$this->username = $model->username; 
    }

    public function update()
    {
    	$this->validate();

    	$find = User::find(auth()->user()->uuid);

    	/*
    	if (!empty($this->photo)) {
    		$this->photo->store('public/images');
    	}*/

    	$find->update([
    		'name' => $this->name,
    		'username' => $this->username,
    		'password' => bcrypt($this->password),
    		]);

    	session()->flash('berhasil','Data berhasil di update!');

    }

    public function render()
    {
        return view('livewire.profile.profile-indeks');
    }
}
