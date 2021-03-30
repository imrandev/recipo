<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Controllers\Operations\IAuthOperation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class AuthController extends Controller implements IAuthOperation {

    public function index(){
        if(Auth::check()){
            return Redirect::back();
        }
        return view('login.index');
    }

    public function registerUI(){
        if(Auth::check()){
            return Redirect::back();
        }
        return view('register.index');
    }

    public function login(Request $request): RedirectResponse
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $user = User::find($user->id);
            $user->save();
            return redirect()->intended('/');
        }
        $errors = new MessageBag(['password' => ['Username and/or password invalid.']]);
        return Redirect::back()->withInput($request->except('password'))->withErrors($errors);
    }

    public function signUp(Request $request): RedirectResponse
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();

        if ($data['password'] != $data['confirmPassword']) {
            $errors = new MessageBag(['confirmPassword' => ['Password does not match']]);
            return Redirect::back()->withInput($request->except('confirmPassword'))->withErrors($errors);
        }

        $check = $this->create($data);
        return Redirect::to("/login");
    }

    public function dashboard(){
        if(Auth::check()){
            $user = Auth::user();
            return view('dashboard.index');
        }
        return Redirect::to("/login");
    }

    public function create(array $data){
        $username = explode('@', trim($data['email']))[0];
        return User::create([
            'username' => $username,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/login')->with('message');
    }
}
