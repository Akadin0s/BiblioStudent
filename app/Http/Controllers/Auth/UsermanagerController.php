<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsermanagerController extends Controller
{
    public function showusermanager()
    {
        return view('auth.register');
    }
    public function usermanager(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $validated['name'],
            'lastname' => $validated['surname'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Hash the password
            'role' => $validated['role']
        ]);



        return back()->with('success', 'Utilisateur enregistré avec succès!');
    }
}
