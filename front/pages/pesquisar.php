
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pesquisar.css">
    <title>Resultado</title>
</head>

<body onload="pesquisarApi();">
    <form method="GET" id="form" action="none">
        <input type="text" id="busca" name="busca" placeholder="Informe o codigo">

        <button type="submit">Pesquisar</button>
    </form>
    
    <div id="resultado"></div>

    <script src="../../back/script/pesquisarApi.js"></script>
</body>
</html>