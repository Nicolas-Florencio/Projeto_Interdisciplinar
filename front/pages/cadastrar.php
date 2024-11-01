<?php
    //controle de sessao
    
    if(session_id() != '') {
        header('Location: http://localhost/Projeto_Interdisciplinar/front/pages/index.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se</title>
</head>

<body onload="cadastrarApi();">
    <form method="POST" id="form" action="none">

        <input type="text" id="nome" name="nome" placeholder="Informe o nome" required><br>

        <label for="data">Informe sua data de nascimento:</label>
        <input type="date" id="data" name="data" required><br>

        <input type="email" id="email" name="busca" placeholder="Informe o email" required><br>
        <input type="password" id="senha" name="senha" placeholder="Informe sua senha" required><br>
        <input type="password" id="senha2" name="senhaConfirm" placeholder="Confirme a senha" required><br>


        <button type="submit">Pesquisar</button>
    </form>
    
    <div id="resultado"></div>

    <script src="../../back/script/criarUrl.js"></script>
    <script src="../../back/script/cadastrarApi.js"></script>
</body>
</html>