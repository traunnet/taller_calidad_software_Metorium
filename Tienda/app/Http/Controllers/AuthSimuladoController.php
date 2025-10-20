<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthSimuladoController extends Controller
{
    // Mostrar formulario de login simulado
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesar login (simulado): guardamos en session 'admin_logged' = true
    public function doLogin(Request $request)
    {
        // Si quieres, podrías validar que exista un "usuario"
        // $request->validate(['email' => 'required', 'password' => 'required']);

        // Simulamos login sin verificar credenciales reales
        $request->session()->put('admin_logged', true);
        // Opcional: guardar nombre de usuario simulado
        $request->session()->put('admin_user', $request->input('email', 'admin'));

        return redirect()->route('admin.dashboard')->with('success', 'Sesión iniciada (simulado)');
    }

    // Dashboard (solo si session admin_logged = true)
    public function dashboard(Request $request)
    {
        // Puedes pasar datos reales si quieres
        return view('admin.dashboard');
    }

    // Logout simulado: borramos la sesión
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_logged', 'admin_user']);
        return redirect()->route('home')->with('success', 'Sesión cerrada (simulado)');
    }
}
