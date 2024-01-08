<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $customers = Customer::all();
        return view('customer.index')->with('customers', $customers);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'mobile_number' => 'required|max:255',
        ]);
        // Create The customer
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->mobile_number = $request->mobile_number;
        $customer->save();
        Session::flash('customer_create','customer is created.');
        return redirect('/customer/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.show')->with('customer',$customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
			'name' => 'required|max:20|min:3',
            'mobile_number' => 'required|max:20|min:3',
		]);
		if ($validator->fails()) {
			return redirect('customer/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		// Create The Category
		$customer = Customer::find($id);
		$customer->name = $request->Input('name');
        $customer->mobile_number = $request->Input('mobile_number');
		$customer->save();
		Session::flash('customer_update','customer is updated.');
		return redirect('customer/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        Session::flash('customer_delete','customer is deleted.');
        return redirect('customer');
    }
}