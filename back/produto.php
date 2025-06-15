<?php

try {
    if($_SERVER['REQUEST_METHOD'] === "GET") {
        //pega o corpo da requisição
        $recebeJSON = file_get_contents('php://input');

        //transforma a resposta em um array
        $arrayDados = json_decode($recebeJSON, true);
    }
    else {
        throw new Exception("Método inválido!");
    }
}
catch(Exception $e) {
    echo json_encode(['Erro' => $e->getMessage()]);
}

include "buscar.php";

$retornoBuscar = buscarProduto();
//recebe um objeto de produto a ser retornado pela api


?>