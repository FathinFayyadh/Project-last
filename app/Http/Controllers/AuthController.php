<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    
    public function registerUser(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required',
            'age' => 'required|integer',
            'birth' => 'required|date',
            'adderess' => 'required|string|max:2000',

        ]); 

        if ($validator->fails()) {
         
            return redirect()->route('register.create')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'age'=>$request->age,
            'gender'=>$request->gender,
            'birth'=> $request->birth, 
            'adderess'=> $request->adderess, 

        ]);

        $user->assignRole('user');
        if ($user) {
            Auth::login($user);
            return redirect()->route('login.create')->with('success', 'Register success');
        } else {
            return redirect()->route('register.create')->with('error', 'Register failed');
        }

       
    }

    public function auth(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        if($validator->fails()){
            return redirect()->route('login.crete')->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success','Login Success');
        
        }else{
            return redirect()->route('login.create')->with('error','Login failed email or password is incoret');

        }
        }
        

    public function logout(){
        Auth::logout();
        return redirect()->route('login.create');
    }

    
}
