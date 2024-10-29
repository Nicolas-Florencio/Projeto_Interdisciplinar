<?php
    function verificaUsuario($dados) {
        include "conexao.php";
    
        try {
            $stmt = 'SELECT email FROM login WHERE email LIKE :email';
            
            $comando = $pdo->prepare($stmt);
    
            $email = $dados['email'];
    
            $comando->bindParam(":email", $email);
            $comando->execute();
    
            $qtdResult = $comando->rowCount();
    
            return $qtdResult == 0 ? true : false;
            
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    function pegaIdUsuario($dados) {
        include "conexao.php";
    
        try {
            $stmt = 'SELECT idCliente FROM cliente WHERE nome LIKE :nome';
            //um alternativa seria utilizar o maior id da tabela, desta forma sempre pegariamos o ultimo usuario inserido
            $comando = $pdo->prepare($stmt);
    
            $nome = $dados['nome'];
    
            $comando->bindParam(":nome", $nome);
            $comando->execute();
    
            $retorno  = $comando->fetch();
    
            return $retorno;
            
        } catch (PDOException $e) {
            return $e;
        }
    }



?>