<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->price = $request->price;
        $customer->comments = $request->comments;
        $customer->save();

        return redirect()->back();
    }


    public function edit($id)
    {
        $customer = Customer::findorFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::FindorFail($id);
        $customer->name = $request->name;
        $customer->price = $request->price;
        $customer->comments = $request->comments;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Başarıyla Güncellendi');
    }

    public function delete($id)
    {
        $customer = Customer::findorFail($id);
        $customer->delete();
        return redirect()->back();
    }


}
