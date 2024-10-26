<?php
// Captura o corpo da requisição que contém o JSON
$recebeJSON = file_get_contents('php://input');

// Decodifica o JSON em um array associativo
$arrayDados = json_decode($recebeJSON, true); //array de objetos

// var_dump($arrayDados, $recebeJSON);

function verificaUsuario($dados) {
    include "conexao.php";

    try {
        $stmt = 'SELECT email FROM cliente WHERE email LIKE :email';

        $comando = $pdo->prepare($stmt);

        $email = $dados['email'];

        $comando->bindParam(":email", $email);
        $comando->execute();

        $qtdResult = $comando->rowCount();

        // if($qtdResult == 0) {
        //     return $dados;
        // }

        // else {
        //     // throw new PDOException("Usuário existente", 23000);
        //     return false;
        // }
        return $qtdResult == 0 ? true : false;
        
    } catch (PDOException $e) {
        return $e;
    }
}

function cadastroUsuario($dados) {
    try {
        include "conexao.php";

        if(verificaUsuario($dados) == false) {
            throw new PDOException("Usuário existente", 23000);
        }

        $query = "INSERT INTO cliente(nome, email, senha, dataNasc)";
        $query .= "VALUES (:nome, :email, :senha, :dataNasc)";
        
        
        $nome = htmlspecialchars($dados['nome']);
        $email = htmlspecialchars($dados['email']);
        $senha = htmlspecialchars($dados['senha']);
        $dataNasc = htmlspecialchars($dados['dataNasc']);
        
        $comando = $pdo->prepare($query);
        
        $comando->bindParam(":nome", $nome);
        $comando->bindParam(":email", $email);
        $comando->bindParam(":senha", $senha);
        $comando->bindParam(":dataNasc", $dataNasc);

        $retorno = $comando->execute();

        if ($retorno) {
            return true;
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
            return $Exception->getMessage();
        }
    }
}
// echo verificaUsuario($arrayDados);
echo cadastroUsuario($arrayDados);
