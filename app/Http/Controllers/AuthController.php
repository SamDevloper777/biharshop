<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        if($req->isMethod("post"))
        {
            $req->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $req->only('email', 'password');  
            
            if(Auth::attempt($credentials))
            {
                return redirect()->route('homepage')->with('success','Login successfull');
            }
            return back()->withErrors(['email'=>'invaild creadentails']);
        }
        return view("login");
    }
    public function register(Request $req)
    {
        if($req->isMethod("post"))
        {
            $req->validate([
                'name'=>'required|max:255',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6|',
                'contact' => 'required'
            ]);

            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->contact = $req->contact;
            $user->save(); 
            return redirect()->route('login')->with('success', 'Registration successful!');
        }
        return view("register");

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful!'); 
    }
}
