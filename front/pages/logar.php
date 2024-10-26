<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/logar.css">
    <title>Login</title>
</head>
    <body onload="logarApi();">
        <h1>Bem-vindo ao LOGIN</h1>

        <form action="POST">
            <label for="username">Login:</label>
            <input type="text" name="username" placeholder="Informe seu e-mail" required>

            <label for="pass">Senha:</label>
            <input type="password" name="pass" placeholder="Informe sua senha" required>
        </form>

        <button>Entrar</button>

        <div id="resultado"></div>

        <script src="../../back/script/criarUrl.js"></script>
        <script src="../../back/script/logarApi.js"></script>
    </body>
</html>