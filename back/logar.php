<?php
// Captura o corpo da requisição que contém o JSON
$recebeJSON = file_get_contents('php://input');

// Decodifica o JSON em um array associativo
$arrayDados = json_decode($recebeJSON, true); //array de objetos

function buscarCliente()
{
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
        
        $result = $comando->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result == 0) {
            throw new Exception("Usuario ou senha invalido");
        }
        else {
            criarSessao();
            return "Usuario logado com sucesso!";
        }

    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    } catch (Exception $e ) {

        header('Content-Type: application/json');
        http_response_code(403);

        $mensagem = ['code' => 403,'mensagem' => 'Usuario nao encontrado!'];
            
        return json_encode($mensagem);
    }
}

echo buscarCliente($dados);
?>