<?php
    include_once __DIR__ . '/Rotas.php';

    /* Normal */
    Rotas::add('/Home', '/View/home.php');
    Rotas::add('/Sobre', 'View/sobre.php');
    Rotas::add('/Contato', 'View/contato.php');
    Rotas::add('/Membros', 'View/membros.php');

    /* USER */
    Rotas::add('/Atas', 'View/atas.php');

    /* ADM */
    Rotas::add('/CadastroUser', 'View/cadastroUser.php');
    Rotas::add('/CadastroAtas', 'View/cadastroAtas.php');

    /* Perfil */
    Rotas::add('/Login', 'View/login.php');
    Rotas::add('/Perfil', 'View/perfil.php');
    Rotas::add('/Sair', 'View/sair.php');
    
    Rotas::erro('View/404.php');
    Rotas::exec();
?>