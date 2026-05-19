class ContactoController {
    // Exibe a página de contacto (Formulário, Mapa, Redes Sociais)
    index(req, res) {
        return res.render('contacto', {
            title: 'Fale Connosco'
        });
    }

    // Processa o formulário enviado pelo usuário
    async enviarMensagem(req, res) {
        const { nome, email, mensagem } = req.body;

        // Validação básica
        if (!nome || !email || !mensagem) {
            return res.status(400).send("Por favor, preencha todos os campos.");
        }

        try {
            // Aqui você pode:
            // 1. Salvar no banco de dados (ex: await Mensagem.create(...))
            // 2. Enviar um e-mail para o administrador do site

            // Redireciona de volta com uma mensagem de sucesso
            return res.render('contacto', {
                title: 'Fale Connosco',
                sucesso: 'Sua mensagem foi enviada com sucesso! Responderemos em breve.'
            });
        } catch (error) {
            return res.status(500).send("Erro ao processar sua mensagem. Tente novamente.");
        }
    }
}

export default new ContactoController();
