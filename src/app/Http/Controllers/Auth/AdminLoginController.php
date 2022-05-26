<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'email';
    }

    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('admin.index');
        }

        return view('auth.adminLogin');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Por favor, ingrese su usuario (Email).',
            'password.required' => 'Por favor, ingrese su contraseña.',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

           return redirect()->route('admin.index');
        }
        return back()->withErrors(['error' => 'El nombre de usuario o la contraseña son incorrectos.']);

        // $usuario = Usuario::where('login', $request->login)->where('password', $request->password)->first();
        
        // if (!empty($usuario)) {
        //     if (Auth::guard('admin')->login($usuario)) {
        //         return redirect()->route('admin.index');
        //     } else {
        //         return back()->withErrors(['error' => 'El nombre de usuario o la contraseña son incorrectos.']);
        //     }
        // } else {
        //     return back()->withErrors(['error' => 'El nombre de usuario o la contraseña son incorrectos.']);
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        //Invalida la sesión y genera una nueva
        $request->session()->invalidate();
        
        // Genera un nuevo Token
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
