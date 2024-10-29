<?php
    function verificarUsuario($dados) { //verifica se usuario existe na base de dados
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
    
    function pegarIdUsuario($dados) { //obtem o id do usuario para realizar insercao na tabela de login
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

    function criarSessao() {
        session_start();
        if(!isset($_SESSION['controleSessao'])) {
            $_SESSION['controleSessao'] = 'logado';
            return true; //true para sessao inciada
        }
        else {
            return false; //falso se usuario ja logado
        }
    }

    function destruirSessao() {
        session_start();
        if(!isset($_SESSION['controleSessao'])) {
            return 'logon'; //logon para usuario realizar login (nao logado)
        }
        else {
            $_SESSION['controleSessao'] = '';
            session_destroy();
            return 'logoff'; //logoff para usuario deslogado
        }
    }

?>