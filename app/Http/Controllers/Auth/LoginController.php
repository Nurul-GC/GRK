<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibe o formulário de login personalizado
    public function showLoginForm()
    {
        // Se já estiver logado, redireciona direto para o Dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login', [
            'title' => 'Acesso Restrito - KIRA-HOME'
        ]);
    }

    // Processa a tentativa de login
    public function login(Request $request)
    {
        // Valida as credenciais enviadas
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Opcional: recurso "lembrar-me" (remember me)
        $remember = $request->has('remember');

        // Tenta autenticar o utilizador
        if (Auth::attempt($credentials, $remember)) {
            // Regenera a sessão para prevenir ataques de fixação de sessão
            $request->session()->regenerate();

            // Redireciona para o painel administrativo
            return redirect()->intended(route('admin.dashboard'));
        }

        // Se falhar, retorna com um erro específico para o campo de email
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não coincidem com os nossos registos.',
        ])->withInput($request->only('email'));
    }

    // Processa o encerramento da sessão (Logout)
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida a sessão atual e regenera o token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redireciona para a página pública inicial
        return redirect()->route('home');
    }
}
