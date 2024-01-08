<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index') -> with('customers', $customers);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required|max:255'],
            'phone' => ['required|max:255'],
            'address' => ['required|max:255']
        ]);
        // Create customer
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->save();
        // Return to list page with success message
        Session::flash('success', 'Customer has been added!');
        return redirect()->route('/customer/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required|max:255'],
            'phone' => ['required|max:13'],
            'address' => ['nullable|max:255']
        ]);
        if ($validator->fails()) {
            return redirect('customer/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
        }
        // Create The Customer
        $customer = Customer::find($id);
        $customer->name = $request->input('name;');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->save();
        // Return to Customers Page with Success Message
        Session::flash('success', 'Customer Updated!');
        return redirect('/customers' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        Session::flash('customer_delete','Customer is deleted.');
        return redirect('customer');
    }
}
