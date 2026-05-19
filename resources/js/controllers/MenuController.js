class MenuController {
    async index(req, res) {
        try {
            // Busca todos os itens do menu (ou filtra por categoria)
            // const itensMenu = await Menu.find();

            return res.render('menu', {
                title: 'Nosso Cardápio',
                // itens: itensMenu
            });
        } catch (error) {
            return res.status(500).send("Erro ao carregar o cardápio.");
        }
    }

    // Opcional: Detalhe de um prato específico (ex: /menu/1)
    async show(req, res) {
        const { id } = req.params;
        try {
            // const prato = await Menu.findById(id);
            return res.render('menu-detalhe', { /* prato */ });
        } catch (error) {
            return res.status(404).send("Prato não encontrado.");
        }
    }
}

export default new MenuController();
