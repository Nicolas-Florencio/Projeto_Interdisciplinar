<?php
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/style.css" type="text/css">
    <!--Fonte escolhida-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav id="barraNav"> <!-- Barra de navegação-->
            <div>
                <img src="../images/Logo.png" alt="Logo do Projeto" id="logo"> <!--Logo do Projeto-->
            </div>
            <div>
                <form method="GET" id="form" action="resultado.php">
                    <input name="buscar" type="text" placeholder="Digite o Nome do Produto" id="barraPesq"> <!-- Barra de pesquisa -->
                </form>
            </div>
            <div>
                <button id="toggleBarra"></button> <!-- botao hamburguer pra sidebar-->
            </div>
        </nav>
    </header>
        
        <main>
            <div id="barraLateral">
                <ul>
                    <li><a href="#">Usuario</a></li>
                    <li><a href="#">Favoritos</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
            </div>
                <div id="box">
                    <p id="escanear">Escanear Produto</p>
                        <div id="opcoes">
                            <div>
                                <img src="../images/CodDBarra.png" alt="codigo de barras" id="codBar">
                            </div>
                            <div>
                                <img src="../images/Line 2.png" alt="" id="barra">
                            </div>
                            <div>
                                <img src="../images/qrCode.png" alt="codigo de barras" id="qrCode">
                            </div>
                        </div>
                </div>
        </main>    

            <footer>
                <div id="direitos">Todos os Direitos Reservados</div>
                Fatec Marilia
            </footer>

            <script src="../JS/script.js"></script>
            <script src="../../back/script/criarUrl.js"></script>
            <script src="../../back/script/cadastrarApi.js"></script> 
</body>
</html>