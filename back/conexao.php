<?php

    $tipo = "mysql"; //identificador do sgbd

    $url = "localhost"; //url do servidor
    $porta = 3306; //porta do servidor
    $banco = "alergenicos"; //banco a ser usado
    
    $user = "root"; //nome do user
    $pass = '1234'; //senha user

    //a dsn é uma string que informa a biblioteca os dados da conexao
    $dsn = "$tipo:host=$url;dbname=$banco;port=$porta";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        
        if(!$pdo) {
            $user = "php"; //nome do user
            $pass = 'senha123'; //senha user

            //a dsn é uma string que informa a biblioteca os dados da conexao
            $dsn = "$tipo:host=$url;dbname=$banco;port=$porta";
        }
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), $e->getCode());
    }

?>