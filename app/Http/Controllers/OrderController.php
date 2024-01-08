<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = array();
    	foreach (Product::all() as $product) {
    		$products[$product->id] = $product->name;
    	}

        $customers = array();
        foreach (Customer::all() as $customer) {
    		$customers[$customer->id] = $customer->name;
    	}
        
    	return view('order.create')
                ->with('products', $products)
                ->with('customers', $customers);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'quantity' => 'required|max:20|min:3',
            'customer_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('product/create')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The product
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->customer_id = $request->customer_id;
        $order->quantity = $request->quantity;
        $order->save();
        Session::flash('order_create','New data is created.');
        return redirect('order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = array();
    	foreach (Product::all() as $product) {
    		$products[$product->id] = $product->name;
    	}

        $customers = array();
        foreach (Customer::all() as $customer) {
    		$customers[$customer->id] = $customer->name;
    	}

        $order = Order::find($id);
        return view('order.edit')
                    ->with('products', $products)
                    ->with('order', $order)
                    ->with('customers', $customers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'quantity' => 'required|max:20|min:3',
            'customer_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('order/'. $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $order = Order::find($id);
        $order->product_id = $request->product_id;
        $order->customer_id = $request->customer_id;
        $order->quantity = $request->quantity;
        $order->save();

        return redirect('order');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Order::find($id);
        $product->delete();
        Session::flash('order_delete','Product is deleted.');
        return redirect('order');
    }
}