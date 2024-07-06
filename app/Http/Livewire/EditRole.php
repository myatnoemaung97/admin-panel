<?php

namespace App\Http\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    public $role;
    public $name = '';
    public $selectedPermissions;
    public $unselectedPermissions;
    public $unselectedFilter = '';


    public function mount()
    {
        $this->initialize();
    }

    public function render()
    {
        return view('livewire.edit-role');
    }

    public function save()
    {
        $rules = [
            'name' => 'required',
        ];

        if ($this->name != $this->role->name) {
            $rules['name'] = 'required|unique:roles,name';
        }

        $this->validate($rules);

        $permissionIds = Arr::pluck($this->selectedPermissions, 'id');

        $this->role->update([
            'name' => $this->name,
        ]);

        $this->role->syncPermissions($permissionIds);

        return redirect()->route('roles.show', $this->role->id)->with('update', 'Role');
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
        $this->unselectedPermissions = [];
        $this->selectedPermissions = Permission::all()->toArray();
    }

    public function removeAllPermission()
    {
        $this->selectedPermissions = [];
        $this->unselectedPermissions = Permission::all()->toArray();
    }

    public function resetFields()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $selected = $this->role->permissions;

        $this->name = $this->role->name;
        $this->selectedPermissions = $selected->toArray();
        $this->unselectedPermissions = Permission::whereNotIn('id', $selected->pluck('id'))->get()->toArray();
    }
}
