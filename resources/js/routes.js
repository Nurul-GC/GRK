import { Router } from 'express';
import HomeController from './controllers/HomeController.js';
import MenuController from './controllers/MenuController.js';
import ContactoController from './controllers/ContactoController.js';

const routes = Router();

// Rotas da Home
routes.get('/', HomeController.index);

// Rotas do Menu
routes.get('/menu', MenuController.index);
routes.get('/menu/:id', MenuController.show); // Opcional

// Rotas de Contacto
routes.get('/contacto', ContactoController.index);
routes.post('/contacto', ContactoController.enviarMensagem);

export default routes;
