<?php
    include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
    unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
    session_destroy();

    header ("Location: index.php");

?>