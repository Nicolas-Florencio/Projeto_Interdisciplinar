require('dotenv').config(); //carrega as variaveis do arquivo

const routes = require('./routes'); //importa as rotas
const cors = require('cors'); //importa cors para seguranca
const mongoose = require('mongoose'); //importa o mongoose para banco
const express = require('express'); //importa o express

const app = express(); //instancia da classe do servidor express

mongoose.connect(process.env.CONNECTIONSTRING).then(() => {
    app.emit('Autobots, rodar!'); //emitindo evento chamado Autobots, rodar!
}).catch(e => console.log('Erro: ', e.message));

app.use(cors()); //permitir requisicoes externas
app.use(express.json()); //permite aceitar dados por JSON
app.use(routes); //permite uso de arquivo externo para rotas

app.on('Autobots, rodar!', () => { //ouvindo evento Autobots, rodar!
    app.listen(3000, () => { //inciando na porta 3k
        console.log('Servidor executando na porta 3000');
        console.log('Acessar em: http://localhost:3000');
    });
});