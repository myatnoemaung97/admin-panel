<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    use WithFileUploads;

    public $name;

    public $username;

    public $image;

    public $password;

    public $confirmPassword;

    public $role;
    public $allRoles;

    public $permissions;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function mount() {
        $this->permissions = Permission::all();
        $this->allRoles = Role::all();
    }

    public function updatedRole($value)
    {
        $this->permissions = Role::where('name', $value)->first()?->permissions;
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
        $user = User::create($validated);

        $user->assignRole($this->role);

        return redirect()->route('users.index')->with('create', "User");
    }

    public function resetFields()
    {
        $this->resetExcept(['allRoles']);
    }
}
