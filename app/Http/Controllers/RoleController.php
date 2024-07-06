<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::query();

            return DataTables::of($roles)
                ->editColumn('created_at', function ($role) {
                    return $role->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('updated_at', function ($role) {
                    return $role->updated_at->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($role) {

                    $btn = "<div class='dropdown'>
                              <button class='--custom-dropdown-toggle bg-transparent border-0 dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>
                                <i class='fa-solid fa-ellipsis-vertical'></i>
                              </button>
                              <div class='dropdown-menu'>
                                <a class='dropdown-item' href='/admin/auth/roles/$role->id/edit'>edit</a>
                                <a class='dropdown-item' href='/admin/auth/roles/$role->id'>show</a>
                                <a href='' class='deleteRoleButton dropdown-item' data-id='$role->id'>delete</a>
                              </div>
                            </div>";

                    return '<div class="action">' . $btn . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('roles.index');
    }

    public function create() {
        return view('roles.create');
    }

    public function show(Role $role) {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function destroy(Role $role) {
        $role->delete();

        return 'success';
    }
}
