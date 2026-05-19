<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retorna a view 'home.blade.php'
        return view('home', [
            'title' => 'Bem-vindo ao Nosso Restaurante'
        ]);
    }
}
