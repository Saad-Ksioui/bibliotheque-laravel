<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $newUser = $request->validate([
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        // Hash password before storing it in the database
        User::create([
            'nom'=>$newUser['nom'],
            'prenom'=>$newUser['prenom'],
            'username'=>$newUser['username'],
            'email'=>$newUser['email'],
            'password'=>Hash::make($newUser['password']),
        ]);

        return view('auth.login')->with('register', 'Vous êtes inscrit avec succès');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $validatedData = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], $request->filled('rememberme'))) {
            return redirect()->route('livre.index')->with('login', 'Vous êtes maintenant connecté!');
        } else {
            return back()->withErrors('error', 'Email ou mot de passe incorrecte')->withInput(request(["email"]));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
