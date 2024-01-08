<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = array();
        $users = User::all();
        $customers = Customer::all();
        $orders = Order::all();

        foreach (Category::all() as $category) {
    		$categories[$category->id] = $category->name;
    	}


        return view('dashboard.index')
        ->with('categories', $categories)
        ->with('products', $products)
        ->with('users', $users)
        ->with('customers', $customers)
        ->with('orders', $orders);
    }
}