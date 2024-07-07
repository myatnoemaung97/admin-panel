<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();

            return DataTables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('updated_at', function ($user) {
                    return $user->updated_at->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($user) {
                    $isAdmin = $user->name == 'Admin';
                    $links = "<a class='dropdown-item' href='/admin/auth/users/$user->id'>show</a>";

                    if (!$isAdmin) {
                        $links .= "<a class='dropdown-item' href='/admin/auth/users/$user->id/edit'>edit</a>
                                <a href='' class='deleteUserButton dropdown-item' data-id='$user->id'>delete</a>";
                    }

                    $btn = "<div class='dropdown'>
                              <button class='--custom-dropdown-toggle bg-transparent border-0 dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-ellipsis-v'></i>
                              </button>
                              <div class='dropdown-menu'>
                                $links
                              </div>
                            </div>";

                    return '<div class="action">' . $btn . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        Storage::delete($user->image);
        $user->delete();

        return 'success';
    }
}
