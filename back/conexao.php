<?php
    if(session_status())

    $tipo = "mysql"; //identificador do sgbd

    $url = "localhost"; //url do servidor
    $porta = 3306; //porta do servidor
    $banco = "alergenicos"; //banco a ser usado
    
    /*
    $user = "php"; //nome do user
    $pass = 'senha123'; //senha user
    */

    //a dsn é uma string que informa a biblioteca os dados da conexao
    $dsn = "$tipo:host=$url;dbname=$banco;port=$porta";

    try {
        $pdo = new PDO($dsn, $user, $pass);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), $e->getCode());
    }

?>