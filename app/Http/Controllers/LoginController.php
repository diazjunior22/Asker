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
use Illuminate\Auth\Events\Login;
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
        // Validar las credenciales
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $remember = ($request->has("remember") ? true : false);
    
        // Intentar autenticar al usuario
        if (Auth::attempt($credentials, $remember)) { 
            $request->session()->regenerate(); // Regenerar la sesión
    
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route("admin.index");
            } elseif ($user->role == 'user') {
                return redirect()->route("user");
            } elseif ($user->role == "chef") {
                return redirect()->route('chef.pedidos');
            }
        } 
    
        // Si la autenticación falla, redirigir de nuevo al formulario de login con un mensaje de error
        return redirect()->back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            'password' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
    


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    
    public function principal(){
        return view('login');
    }








}
