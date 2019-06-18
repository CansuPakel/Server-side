<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use View;
class HomeController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


    public function index()
    {
        return view('index');
    }


    public function checklogin(Request $request){

    	$this->validate($request,[
    		'email'=>'required|email',
			'password' => 'required',
		]);

    	$user = array(
    		'email' => $request->get('email'),
			'password' => $request->get('password'),
		);

    	if(Auth::attempt($user)){
			return redirect('index');
		}else{
			return back()->with('error','Login fault');
		}

	}

	public function succeslogin(){
    	return view('index');
	}

	public function logout(Request $request){
    	Auth::logout();
		$request->session()->flush();
    	return redirect('/');
	}
}
