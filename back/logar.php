<?php
    function buscarCliente($dados) {
        
        include 'funcoes.php';

        try {
            include 'conexao.php';

            $stmt = 'SELECT cliente_idCliente FROM login WHERE email LIKE :email AND senha LIKE :senha';

            $comando = $pdo->prepare($stmt);

            $email = htmlspecialchars($dados['email']);
            $senha = htmlspecialchars($dados['senha']);

            $comando->bindParam(":email", $email);
            $comando->bindParam(":senha", $senha);
            $comando->execute();

            $qtdResult = $comando->rowCount();

            if ($qtdResult == 0) {
                throw new Exception("Usuario ou senha invalido", 401); //codigo de usuario nao autorizado
            } else {
                criarSessao();
                $retorno = (["success" => true, "redirect" => "index.php"]);
                return json_encode($retorno);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);

        } catch (Exception $e) {

            header('Content-Type: application/json');
            http_response_code(401);

            $mensagem = ['code' => $e->getCode(), 'mensagem' => $e->getMessage()];

            return json_encode($mensagem);
        }
    }

    try {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Captura o corpo da requisição que contém o JSON
            $recebeJSON = file_get_contents('php://input');
    
            // Decodifica o JSON em um array associativo
            $dados = json_decode($recebeJSON, true); //array de objetos
            echo buscarCliente($dados);
        }

        else if ($_SERVER['REQUEST_METHOD'] != "POST") {
            throw new Exception("Metodo invalido!");
        }
    }
    catch(Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['Erro' => $e->getMessage()]);
    }

