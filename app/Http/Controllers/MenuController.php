<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Prato; // Remova o comentário quando criar o Model

class MenuController extends Controller
{
    public function index()
    {
        // Quando tiver o banco de dados pronto:
        // $pratos = Prato::all();

        return view('menu', [
            'title' => 'Nosso Cardápio',
            // 'pratos' => $pratos
        ]);
    }

    // Opcional: Para ver os detalhes de um item específico (/menu/1)
    public function show($id)
    {
        // $prato = Prato::findOrFail($id);

        return view('menu-detalhe', [
            // 'prato' => $prato
        ]);
    }
}
