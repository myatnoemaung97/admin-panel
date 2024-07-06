<?php

namespace App\Http\Controllers;

use App\Models\Fry;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $fries = Fry::query();

            return DataTables::of($fries)
                ->editColumn('created_at', function ($fry) {
                    return $fry->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('updated_at', function ($fry) {
                    return $fry->updated_at->format('Y-m-d H:i:s');
                })
                ->editColumn('is_local', function ($fry) {
                    $link = "https://daowf.icu/api/zipFolder?file_name=$fry->uid";

                    if ($fry->is_local) {
                        return 'Local code cache';
                    } else {
                        return "<div>
                                    <a href='$link' target='_blank'>
                                        Click to download or copy the following address to download
                                    </a>
                                    <span>$link</span>
                                </div>";
                    }
                })
                ->editColumn('user_id', function ($fry) {
                    return $fry->user->name ?? '';
                })
                ->addColumn('action', function ($fry) {

                    $btn = "<div class='dropdown'>
                              <button class='--custom-dropdown-toggle bg-transparent border-0 dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>
                                <i class='fa-solid fa-ellipsis-vertical'></i>
                              </button>
                              <div class='dropdown-menu'>
                                <a class='dropdown-item' href='/admin/fry/$fry->id/edit'>edit</a>
                                <a class='dropdown-item' href='/admin/fry/$fry->id'>show</a>
                                <a href='' class='deleteFryButton dropdown-item' data-id='$fry->id'>delete</a>
                              </div>
                            </div>";

                    return '<div class="action">' . $btn . '</div>';
                })->rawColumns(['action', 'is_local'])->make(true);
        }

        return view('fry.index');
    }

    public function create()
    {
        return view('fry.create', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'uid' => 'required|unique:fries',
            'phone' => 'required',
            'nick_name' => 'required',
            'language' => 'required',
            'is_local' => 'required',
        ]);

        $validated['state'] = $request['state'];
        $validated['remark'] = $request['remark'];

        if ($request->has('user_id')) {
            $validated['user_id'] = $request['user_id'];
        }

        Fry::create($validated);

        return redirect()->route('fry.index')->with('create', 'Fry management');
    }

    public function show(Fry $fry)
    {
        return view('fry.show', compact('fry'));
    }

    public function edit(Fry $fry)
    {
        $users = User::all();

        return view('fry.edit', compact('fry', 'users'));
    }

    public function update(Request $request, Fry $fry)
    {
        $rules = [
            'phone' => 'required',
            'nick_name' => 'required',
            'language' => 'required',
            'is_local' => 'required',
        ];

        if ($request['uid'] != $fry->uid) {
            $rules['uid'] = 'required|unique:fries';
        } else {
            $rules['uid'] = 'required';
        }

        $validated = $request->validate($rules);

        $validated['state'] = $request['state'];
        $validated['remark'] = $request['remark'];
        $validated['user_id'] = $request['user_id'];

        $fry->update($validated);

        return redirect(route('fry.show', $fry->id))->with('update', 'Fry management');
    }

    public function destroy(Fry $fry)
    {
        $fry->delete();

        return 'success';
    }
}
