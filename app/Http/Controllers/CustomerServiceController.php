<?php

namespace App\Http\Controllers;

use App\Models\AutoResponder;
use App\Models\CustomerService;
use App\Models\Fry;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerServiceController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $customerServices = CustomerService::query();

            return DataTables::of($customerServices)
                ->editColumn('created_at', function ($customerServices) {
                    return $customerServices->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('user_id', function ($customerServices) {
                    return $customerServices->user->name ?? '';
                })
                ->editColumn('auto_responder_id', function ($customerServices) {
                    return $customerServices->autoResponder->name ?? '';
                })
                ->addColumn('action', function ($customerServices) {

                    $btn = "<div class='dropdown'>
                              <button class='--custom-dropdown-toggle bg-transparent border-0 dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>
                                <i class='fa-solid fa-ellipsis-vertical'></i>
                              </button>
                              <div class='dropdown-menu'>
                                <a class='dropdown-item' href='/admin/customer-service/$customerServices->id/edit'>edit</a>
                                <a href='' class='deleteCustomerServiceButton dropdown-item' data-id='$customerServices->id'>delete</a>
                              </div>
                            </div>";

                    return '<div class="action">' . $btn . '</div>';
                })->rawColumns(['action'])->make(true);
        }

        return view('customer-service.index');
    }

    public function create() {
        return view('customer-service.create', [
            'users' => User::all(),
            'autoresponders' => Autoresponder::all(),
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'auto_responder_id' => 'required',
            'user_id' => 'required',
        ]);

        CustomerService::create($validated);

        return redirect(route('customer-service.index'))->with('create', 'Customer service');
    }

    public function edit(CustomerService $customerService) {
        return view('customer-service.edit', [
            'customerService' => $customerService,
            'users' => User::all(),
            'autoresponders' => Autoresponder::all(),
            ]);
    }

    public function update(Request $request, CustomerService $customerService) {
        $validated = $request->validate([
            'auto_responder_id' => 'required',
            'user_id' => 'required',
        ]);

        $customerService->update($validated);

        return redirect(route('customer-service.index'))->with('update', 'Customer service');
    }

    public function destroy(CustomerService  $customerService)
    {
        $customerService->delete();

        return 'success';
    }

}
