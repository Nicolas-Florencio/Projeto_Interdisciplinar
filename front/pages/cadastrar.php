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
    <title>Cadastro</title>
    <link rel="stylesheet" href="../styles/cadastrar.css">
    <link rel="icon" href="../images/logo.jpeg" type="image/x-icon">
      <!--Fonte escolhida-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@1,100&family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
</head>

<body onload="cadastrarApi();">

    <div id="imgContainer">
        <a href="index.php"><img src="../images/Logo.png" alt="Logo" id="logo"></a>
    </div>
    
    <h1>Cadastre-se</h1>
    
    <main>
        <form method="POST" id="form" action="none">
            <div>
                <input type="text" id="nome" class="inputs" name="nome" placeholder="Nome Completo" required>
            </div>
            <div>
                <input type="email" id="email" class="inputs" name="busca" placeholder="Digite seu email" required>
            </div>
            <div>
                <input type="password" id="senha" class="inputs" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div>
                <input type="password" id="senha2" class="inputs" name="senhaConfirm" placeholder="Confirme sua senha" required>
            </div>
            <div>
                <label for="data" id="dataNasc">Informe sua data de Nascimento:</label> <br>
                <input type="date" id="data" class="inputs" name="data" required>
            </div>
    
            <button type="submit" id="botao">Cadastrar</button>
        </form>
    </main>

    <div id="resultado" id="redirect"></div>

    <script src="../../back/script/criarUrl.js"></script>
    <script src="../../back/script/cadastrarApi.js"></script>
</body>
</html>