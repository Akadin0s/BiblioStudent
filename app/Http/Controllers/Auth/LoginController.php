<?php

namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request ;
    use Illuminate\Validation\ValidationException;

use function Pest\Laravel\put;

class LoginController extends Controller
{
    
    public function show(){
        return view('auth.login');
    }
    
    public function Login(Request $request){
        
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',           
        ]);


        // Map the email field to the correct column in the database
        $credentials = [
            'email' => $validated['email'], 
            'password' => $validated['password'],
        ];

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'Student' || Auth::user()->role === 'Teacher') {
                $request->session()->regenerate(); 
                return redirect()->route('home');
            } elseif (Auth::user()->role === 'Admin') {
                $request->session()->regenerate(); 
                return redirect()->route('dashboard');
            }
            
        }
           throw ValidationException::withMessages([
                'password' => 'The provided credentials do not match our records.',
            ]); 
        
        
    }
   

}
