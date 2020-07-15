<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();

        // dd($activeCustomers);
        // dd($inactiveCustomers);

        // $customers = Customer::all();

        // dd($customers);

        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));
    }

    public function store()
    {
        $data = request()->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'active' => 'required',
            ]
        );

        // dd($data);

        Customer::create($data);

        return back();

        // dd(request('name'));
    }
}
