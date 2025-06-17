const mongoose = require('mongoose');

const UsuarioSchema = new mongoose.Schema({
    nome: { type: String, required: true }
});

const UsuarioModel = mongoose.model('Usuario', UsuarioSchema);

class Usuario {
    constructor(bodyreq) {
        this.body = bodyreq;
    }

    async autenticar() {

    }
}