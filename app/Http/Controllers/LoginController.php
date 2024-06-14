<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//validacion de formulario
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// Resto de tu código

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;

        // $user->role = 'mesero'; // Puedes ajustar el rol aquí según tus necesidades
        $user->save();
        Auth::login($user);
        return redirect(route("privada"));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = ($request->has("remember") ? true:false);
        if (Auth::attempt($credentials, $remember)) { 
            $request->session()->regenerate(); //que prepare la session
            return redirect()->intended(route("privada")); // que lo lleve ala apgina privada
        }else{
            return redirect("login");
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
