<?php

namespace App\Http\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $name = '';
    public $selectedPermissions;
    public $unselectedPermissions;
    public $unselectedFilter = '';


    public function mount()
    {
        $this->unselectedPermissions = Permission::all()->toArray();
        $this->selectedPermissions = [];
    }

    public function render()
    {
        return view('livewire.create-role');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|unique:roles,name',
        ];

        $this->validate($rules);

        $permissionIds = Arr::pluck($this->selectedPermissions, 'id');

        $role = Role::create([
            'name' => $this->name,
        ]);

        $role->syncPermissions($permissionIds);

        return redirect()->route('roles.index')->with('create', 'Role');
    }

    public function updatedunselectedFilter($value)
    {
        $this->unselectedPermissions = Permission::whereNotIn('id', Arr::pluck($this->selectedPermissions, 'id'))->get()->toArray();

        if ($this->unselectedFilter) {
            $this->unselectedPermissions = array_filter($this->unselectedPermissions, function ($permission) {
                return Str::contains($permission['name'], $this->unselectedFilter);
            });
        }
    }

    public function addPermission($permissionId)
    {
        $permission = Permission::findById($permissionId)->toArray();
        $this->selectedPermissions[] = $permission;

        $this->unselectedPermissions = array_filter($this->unselectedPermissions, function ($perm) use ($permissionId) {
            return $perm['id'] != $permissionId;
        });
    }

    public function removePermission($permissionId)
    {
        $permission = Permission::findById($permissionId)->toArray();
        $this->selectedPermissions = array_filter($this->selectedPermissions, function ($perm) use ($permissionId) {
            return $perm['id'] != $permissionId;
        });

        $this->unselectedPermissions[] = $permission;
    }

    public function addAllPermission()
    {
        $this->selectedPermissions = array_merge($this->selectedPermissions, $this->unselectedPermissions);
        $this->unselectedPermissions = [];
    }

    public function removeAllPermission()
    {
        $this->selectedPermissions = [];
        $this->unselectedPermissions = Permission::all()->toArray();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->unselectedPermissions = Permission::all()->toArray();
        $this->selectedPermissions = [];
    }
}
