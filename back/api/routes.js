const express = require('express');
const route = express.Router();

const loginController = require('./controllers/loginController');

//rotas de login
route.post('/login', loginController.logar);