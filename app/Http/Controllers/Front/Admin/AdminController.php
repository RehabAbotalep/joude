<?php

namespace App\Http\Controllers\Front\Admin;

use App\Card;
use App\Category;
use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{	
	//Login Form
	public function showLoginForm(){
		return view('admin.login');
	}

	public function login(Request $request){
		 $this->validate($request,[
            'email'    =>'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))){
        	$user = Auth::user();
            if(Auth::user()->is_admin == 1){
                return redirect('dashboard');
            }else{
                	return redirect('/');
                }
        }   
		else{
			return back()->with('status', 'Wrong Mail Or Password');
		}
	}
    //dashboard 
    public function adminDashboard(){

        $cards      = Card::count();
        $users      = User::count();
        $stores     = Store::count();
        $categories = Category::count();
    	return view('admin.index',compact('cards','users','stores','categories'));
    }

    public function adminLogout(){
        Auth::logout();
        return redirect(route('login.form'));
        
    }

}
