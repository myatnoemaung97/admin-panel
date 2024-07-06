<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $username;
    public $image;
    public $password;
    public $confirmPassword;
    public $role;
    public $allRoles;
    public $permissions;

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->password = $user->password;
        $this->role = $user->getRoleNames()->first();
        $this->allRoles = Role::all();
        $this->permissions = Role::where('name', $this->role)->first()->permissions;
    }

    public function render()
    {
        return view('livewire.edit-user');
    }

    public function updatedRole($value)
    {
        $this->permissions = Role::where('name', $value)->first()?->permissions;
    }

    public function resetFields()
    {
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->image = '';
        $this->password = $this->user->password;
        $this->confirmPassword = '';
    }

    public function update()
    {

        $rules = [
            'name' => 'required',
            'password' => 'required',
        ];

        if ($this->password != $this->user->password) {
            $rules['confirmPassword'] = 'required|same:password';
        }

        if ($this->user->username == $this->username) {
            $rules['username'] = 'required';
        } else {
            $rules['username'] = 'required|unique:users';
        }

        if ($this->image) {
            $rules['image'] = 'image';
        }

        $validated  = $this->validate($rules);

        if ($this->image) {
            $imagePath = $this->image->store(path: 'avatars');
            Storage::delete($this->user->image);
            $validated['image'] = $imagePath;
        }

        $validated['password'] = Hash::make($validated['password']);
        unset($validated['confirmPassword']);

        $this->user->update($validated);

        $this->user->syncRoles($this->role);

        return redirect()->route('users.show', $this->user->id)->with('update', 'User');
    }
}
