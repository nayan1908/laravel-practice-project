<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Users";
        
        $users = User::orderBy('id', 'DESC')->get();

        return view('user/index', compact('users'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create User';
        return view('user/create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated  = $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|required_with:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        
        User::create($user);    
        return redirect('users')->with('success', "User created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page_title'] = 'View User';
        $data['user'] = User::where('id', $id)->first();
        return view('user/view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit User';
        $data['user'] = User::find($id);
        return view('user/edit', compact('user'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user->fill($request->all())->save();
        return redirect('users')->with('success', 'User upadted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users')->with('success', 'User deleted successfully');
    }
}