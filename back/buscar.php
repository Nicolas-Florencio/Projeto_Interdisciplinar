<?php

function buscarProduto()
{
    include 'conexao.php';
    
    try {
        $stmt = 'SELECT * FROM produto WHERE nome LIKE :nome OR idProduto = :cod';
        
        $comando = $pdo->prepare($stmt);

        $busca = htmlspecialchars($_GET['busca']);

        if(is_numeric($busca)) {
            //pesquisa caso receba código de barras
            $comando->bindParam(":cod", $busca);
        }
        else {
            //caso receba o nome do produto
            $nulo = NULL;
            $comando->bindParam(":cod", $nulo);
        }
        $nome = $busca . '%';

        $comando->bindParam(":nome", $nome);
        $comando->execute();
        
        $result = $comando->fetchAll(PDO::FETCH_ASSOC);
        
        
        header('Content-Type: application/json');
        return json_encode($result);

    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

echo buscarProduto();
?>