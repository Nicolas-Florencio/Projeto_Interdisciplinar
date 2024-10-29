<?php
// Captura o corpo da requisição que contém o JSON
$recebeJSON = file_get_contents('php://input');

// Decodifica o JSON em um array associativo
$arrayDados = json_decode($recebeJSON, true); //array de objetos

// var_dump($arrayDados, $recebeJSON);

function verificaUsuario($dados) {
    include "conexao.php";

    try {
        $stmt = 'SELECT email FROM login WHERE email LIKE :email';

        $comando = $pdo->prepare($stmt);

        $email = $dados['email'];

        $comando->bindParam(":email", $email);
        $comando->execute();

        $qtdResult = $comando->rowCount();

        return $qtdResult == 0 ? $comando->fetchAll(PDO::FETCH_ASSOC) : false;
        
    } catch (PDOException $e) {
        return $e;
    }
}

function cadastroUsuario($dados) {
    try {
        include "conexao.php";

        $verificaIdCliente = verificaUsuario($dados);

        if ($verificaIdCliente == false && empty($verificaIdCliente)) {
            throw new PDOException("Usuário existente", 23000);
        }

        $query = "INSERT INTO cliente(nome, dataNasc) VALUES (:nome, :dataNasc);";
        $nome = htmlspecialchars($dados['nome']);
        $dataNasc = htmlspecialchars($dados['dataNasc']);
        
        $comando = $pdo->prepare($query);
        $comando->bindParam(":nome", $nome);
        $comando->bindParam(":dataNasc", $dataNasc);

        $retorno = $comando->execute();
        
        if ($retorno) {

            $query = "INSERT INTO login(email, senha, cliente_idCliente) VALUES (:email, :senha, :id);";
            $email = htmlspecialchars($dados['email']);
            $senha = htmlspecialchars($dados['senha']);
            
            $comando = $pdo->prepare($query);
            $comando->bindParam(":email", $email);
            $comando->bindParam(":senha", $senha);
            $comando->bindParam(":id", $verificaIdCliente['idCliente']);

            $retorno = $comando->execute();
        }
        else {
            return "Erro ao cadastrar!";
        }
    }
    catch (PDOException $Exception) {
        
        if ($Exception->getCode() == 23000) { //código para exceção de e-mail existente

            header('Content-Type: application/json');
            http_response_code(409);

            $mensagem = ['code' => 23000,'mensagem' => 'Usuário já cadastrado'];
            
            return json_encode($mensagem);

        } else {
            return $Exception;
        }
    }
}
// echo verificaUsuario($arrayDados);
echo cadastroUsuario($arrayDados);
