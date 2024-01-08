<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('user.create');
    }

    public function validateValidUserPassword(Request $request){
        // dd($request);
        // error_log(json_encode($request->email));
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            Session::flash('failed_login','Invalid credentials');
            return redirect('/')->withInput();
        } else {
            if ($user->password == $request->password ) return redirect()->route('category.list');
            Session::flash('failed_login','Invalid credentials');
            return redirect('/')->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password'=> 'required|min:8|max:20',
        ]);

        // Create The Category
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        Session::flash('user_create','User is created.');
        return redirect()->route('user.list');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $category = Category::find($id);
    //     return view('category.show')->with('category',$category);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password'=> 'required|min:8|max:20',
		]);
		if ($validator->fails()) {
			return redirect('user/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		// Create The user
		$user = User::find($id);
		$user->name = $request->Input('name');
        $user->email = $request->Input('email');
        $user->password = $request->Input('password');
		$user->save();
		// Session::flash('user_update','user is updated.');
        return redirect()->route('user.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('user_delete','user is deleted.');
        return redirect('user');
    }
}