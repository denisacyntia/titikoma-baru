<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function showLoginForm(){
        return view('user.login');
    }

    public function login(Request $request){

        //Validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password'=>$request->password])){
            return redirect()->intended(route('customer.index'));
        }

        return redirect()->back()->with(['error'=> 'Email / Password salah' ]);

    }
}
