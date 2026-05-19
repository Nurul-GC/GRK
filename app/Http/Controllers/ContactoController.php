<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Mensagem; // Caso queira salvar as mensagens no banco

class ContactoController extends Controller
{
    // Exibe a página de contacto
    public function index()
    {
        return view('contacto', [
            'title' => 'Fale Connosco'
        ]);
    }

    // Processa o envio do formulário
    public function enviarMensagem(Request $request)
    {
        // Validação nativa do Laravel
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensagem' => 'required|string',
        ]);

        try {
            // Aqui você pode processar a mensagem, por exemplo:
            // Mensagem::create($request->all()); // Salvar no banco
            // Mail::to('admin@email.com')->send(new NovoContacto($request->all())); // Enviar e-mail

            // Redireciona de volta com uma mensagem de sucesso na sessão
            return redirect()->route('contacto.index')
                ->with('sucesso', 'Sua mensagem foi enviada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('erro', 'Houve um erro ao enviar sua mensagem. Tente novamente.');
        }
    }
}
