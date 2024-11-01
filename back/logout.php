<?php
    session_start();

    include "funcoes.php";
    destruirSessao();
    header("Location: http://localhost/Projeto_Interdisciplinar/front/pages/logar.php");
?>