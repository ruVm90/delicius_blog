<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Muestra el formulario de login
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Autentica al usuario
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate(); // Autentica al usuario con los datos recibidos

        $request->session()->regenerate(); // Regenera la sesion del usuario

        return redirect()->intended(route('dashboard', absolute: false)); // Redirige a la ruta que se queria visitar
    }

    /**
     * Cierra la sesion del usuario
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirecciona a la ruta de bienvenida
    }
}
