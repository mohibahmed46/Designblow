<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class authController extends Controller
{
    //
    function index(){
        if(Auth::check()){
            if(Auth::user()->role_id == '1'){
                return redirect('admin');
            }elseif(Auth::user()->role_id == '2'){
                return redirect('agent1');
            }
            elseif(Auth::user()->role_id == '3'){
                return redirect('agent2');
            }
        }else{
            return redirect('/signin');
        }
    }


    function signin(){

        return view('login');
    }
    function signinSubmit(Request $request){
        $data = $request->all();
        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'status' => '1'])){
            return redirect('/');
        }else{
            return redirect()->back()->with('error', 'Authentication Failed.');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/signin');
    }
}
