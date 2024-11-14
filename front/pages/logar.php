<?php

    if(session_id() != '') {
        header('Location: http://localhost/Projeto_Interdisciplinar/front/pages/index.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
      <!--Fonte escolhida-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
    <body onload="logarApi();">
        <main>
            <div id="imgLog">
                <div><img src="../images/Logo.png" alt="Logo" id="logo"></div>
                <div id="login">Login</div>
            </div>
    
            <form id="form" action="POST">
                <div>
                    <input type="text" id="user" name="username" placeholder="Digite seu E-mail" class="inputs" required>
                </div>
                <div>
                    <input type="password" id="pass" name="pass" placeholder="Digite sua senha" class="inputs" required>
                </div>
                <button id="botao">Entrar</button>
            </form>
            <div id="divConta">
                <div id="conta">Não possui Conta?</div>
                <a href="cadastrar.php" id="cadastro">Cadastre-se</a>
            </div>
            
    
            <div id="resultado"></div>
        </main>

        <script src="../../back/script/criarUrl.js"></script>
        <script src="../../back/script/logarApi.js"></script>
    </body>
</html>