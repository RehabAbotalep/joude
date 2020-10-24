<?php

namespace App\Http\Controllers\Front\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required|unique:users',
            'mobile'    => 'required|unique:users',
            'email'     => 'required|unique:users|email|string|max:255',
            'password'  => 'required|min:8',

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        User::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
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
        $user = User::find($id);

        $this->validate($request,[
            'name'      => 'unique:users,name,'. $user->id,
            'mobile'    => 'unique:users,mobile,'. $user->id,
            'email'     => 'unique:users,email,'. $user->id,

        ]);
        if(!empty('name')){
           $user->name  = $request->name; 
        }

        if(!empty('password')){
           $user->password  = Hash::make($request->password); 
        }

        if(!empty('email')){
           $user->email  = $request->email; 
        }
        if(!empty('mobile')){
           $user->mobile  = $request->mobile; 
        }
        $user->is_active =  ($request->is_active)?? 0;
        $user->is_admin  =  ($request->is_admin)?? 0;
        $user->save();
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }

    //Activate User
    public function active($id){
        $user = User::find($id);
        $user->is_active = 1;
        $user->save();
        return back();
    }

     //Deactivate User
    public function deactive($id){
        $user = User::find($id);
        $user->is_active = 0;
        $user->save();
        return back();
    }


}
