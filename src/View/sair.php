<?php
    include_once __DIR__ . '/../Rotas/Constantes.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    unset($_SESSION["USER_LOGIN"]);
    unset($_SESSION["USER_ADM"]);

    header("Location: " . HOME . "Home");
    exit();
?>