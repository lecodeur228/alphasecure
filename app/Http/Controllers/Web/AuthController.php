<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     // Afficher le formulaire de login
     public function showLoginForm()
     {
         return view('auth.login');
     }
 
     // Gérer la soumission du formulaire de login
     public function login(Request $request)
     {
         $credentials = $request->only('email', 'password');
 
         if (Auth::attempt($credentials)) {
             return redirect()->intended('/agents');
         }
 
         return redirect()->back()->withErrors(['email' => 'Ces informations ne correspondent pas à nos dossiers.']);
     }
 
     // Afficher le formulaire de création de compte
     public function showRegisterForm()
     {
         return view('auth.register');
     }
 
     // Gérer la soumission du formulaire de création de compte
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
 
         Auth::login($user);
 
         return redirect('/');
     }
 
     // Gérer la déconnexion
     public function logout()
     {
         Auth::logout();
         return redirect('/login');
     }
}
