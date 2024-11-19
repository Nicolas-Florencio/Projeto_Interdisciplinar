<?php
    include "funcoes.php";

    function cadastroUsuario($dados) {
        
        try {
            include "conexao.php";
            
            if (verificarUsuario($dados) == false) {
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

                $idCliente = pegarIdUsuario($dados);
                // echo $idCliente['idCliente'];

                $query = "INSERT INTO login(email, senha, cliente_idCliente) VALUES (:email, :senha, :id);";
                $email = htmlspecialchars($dados['email']);
                $senha = md5(htmlspecialchars($dados['senha']));
                
                $comando = $pdo->prepare($query);
                $comando->bindParam(":email", $email);
                $comando->bindParam(":senha", $senha);
                $comando->bindParam(":id", $idCliente['idCliente']);

                $retorno = $comando->execute();

                return $retorno ? "Usuário cadastrado!" : "Erro ao cadastrar email!";
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
    
    try {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Captura o corpo da requisição que contém o JSON
            $recebeJSON = file_get_contents('php://input');
            $arrayDados = json_decode($recebeJSON, true); // Decodifica o JSON em um array associativo

            echo cadastroUsuario($arrayDados);
        }
        else {
            throw new Exception("Metodo invalido!");
        }
    }
    catch(Exception $e) {
        echo json_encode(['Erro' => $e->getMessage()]);
    }