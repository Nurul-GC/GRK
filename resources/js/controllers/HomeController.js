// Exemplo em Node.js/Express (padrão que pode ser adaptado para qualquer linguagem)

class HomeController {
    async index(req, res) {
        try {
            // Opcional: Buscar destaques do banco de dados para exibir na Home
            // const pratosDestaque = await Prato.find({ destaque: true }).limit(3);

            // Renderiza a view 'home' passando os dados necessários
            return res.render('home', {
                title: 'Bem-vindo ao Nosso Restaurante'
                // destaques: pratosDestaque
            });
        } catch (error) {
            return res.status(500).send("Erro ao carregar a página inicial.");
        }
    }
}

export default new HomeController();
