<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**

     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
        'email' => ['required', 'email'],
        'password'=>['required',Password::defaults()],
       ]);

       if(Auth::attempt($validate)){
        $request->session()->regenerate();
        return redirect('/index');
       }
       return back()->withErrors(['email'
       =>'your information is not currect',]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

       return redirect('/');
    }
}
