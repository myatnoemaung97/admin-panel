<?php

namespace App\Http\Controllers;

use App\Models\AutoResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AutoResponderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $autoresponders = AutoResponder::query();


            return DataTables::of($autoresponders)
                ->editColumn('created_at', function ($template) {
                    return $template->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('first_pic', function ($template) {
                    return "
                        <img src='/storage/$template->first_pic' alt='first auto reply picture' width='80px' height='80px' />
                    ";
                })
                ->editColumn('second_pic_android', function ($template) {
                    return "
                        <img src='/storage/$template->second_pic_android' alt='second auto reply android picture' width='80px' height='80px' />
                    ";
                })
                ->editColumn('second_pic_ios', function ($template) {
                    return "
                        <img src='/storage/$template->second_pic_ios' alt='second auto reply ios picture' width='80px' height='80px' />
                    ";
                })
                ->addColumn('action', function ($template) {
                    $links = "<a class='dropdown-item' href='/admin/autoresponders/$template->id/edit'>edit</a>
                                <a href='' class='deleteAutoResponderButton dropdown-item' data-id='$template->id'>delete</a>";

                    $btn = "<div class='dropdown'>
                              <button class='--custom-dropdown-toggle bg-transparent border-0 dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-ellipsis-v'></i>
                              </button>
                              <div class='dropdown-menu'>
                                $links
                              </div>
                            </div>";

                    return '<div class="action">' . $btn . '</div>';

                })->rawColumns(['action', 'first_pic', 'second_pic_android', 'second_pic_ios'])->make(true);
        }

        return view('autoresponders.index');
    }

    public function create()
    {
        return view('autoresponders.create');
    }

    public function edit(AutoResponder $autoresponder)
    {
        return view('autoresponders.edit', compact('autoresponder'));
    }

    public function destroy(AutoResponder $autoresponder)
    {
        Storage::delete($autoresponder->first_pic);
        Storage::delete($autoresponder->second_pic_android);
        Storage::delete($autoresponder->second_pic_ios);

        $autoresponder->delete();

        return 'success';
    }
}
