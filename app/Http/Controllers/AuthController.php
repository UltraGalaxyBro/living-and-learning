<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //sleep(1);
    
        //Validar
        $fields = $request->validate([
            'avatar' => ['file', 'nullable'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        if ($request->hasFile('avatar')) {
            $fields['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        //dd('DEU CERTO!');
        //Criar
        $user = User::create($fields);
        //Loggar
        Auth::login($user);
        //Redirecionar
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        //dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //Autenticate
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'As credenciais fornecidas não combinam com os nossos registros',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        //dd($request);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
