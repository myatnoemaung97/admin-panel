<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $name;

    public $username;

    public $image;

    public $password;
    public $confirmPassword;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function save()
    {
        $rules = [
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ];

        if ($this->image) {
            $rules['image'] = 'image';
        }

        $validated = $this->validate($rules);

        if ($this->image) {
            $imagePath = $this->image->store(path: 'avatars');
            $validated['image'] = $imagePath;
        }

        $validated['password'] = Hash::make($validated['password']);
        unset($validated['confirmPassword']);
        User::create($validated);

        return redirect()->route('users.index')->with('create', "User");
    }

    public function resetFields()
    {
        $this->reset();
    }
}
