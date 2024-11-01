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
</head>
    <body onload="logarApi();">
        <h1>Bem-vindo ao LOGIN</h1>

        <form id="form" action="POST">
            <label for="username">Login:</label>
            <input type="text" id="user" name="username" placeholder="Informe seu e-mail" required>

            <label for="pass">Senha:</label>
            <input type="password" id="pass" name="pass" placeholder="Informe sua senha" required>

            <button>Entrar</button>
        </form>
        

        <div id="resultado"></div>

        <script src="../../back/script/criarUrl.js"></script>
        <script src="../../back/script/logarApi.js"></script>
    </body>
</html>