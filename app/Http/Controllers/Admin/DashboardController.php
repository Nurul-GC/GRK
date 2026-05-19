<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Aqui poderá futuramente buscar estatísticas (ex: total de pratos, mensagens não lidas)
        return view('admin.dashboard', [
            'title' => 'Painel de Administração'
        ]);
    }
}
