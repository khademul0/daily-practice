<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        //for user validation we user this
       $request->validate([
        'name'=> ['required','string','max:255'],
        'email' => ['required', 'email', 'unique:users'],
        'password'=>['required',Password::defaults()],
       ]);

       //create user in database

      $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=> Hash::make($request->password),
       ]);

       //make user to login

       Auth::login($user);

       //and redirect the user to the home

       return redirect('/');//it hase to be the same name as route//
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
