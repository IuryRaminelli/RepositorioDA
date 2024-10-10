<?php
    include_once __DIR__ . '/Rotas.php';
    
    Rotas::add('/Home', '/View/home.php');
    Rotas::add('/Sobre', 'View/sobre.php');
    Rotas::add('/Contato', 'View/contato.php');

    Rotas::add('/Login', 'View/login.php');
    Rotas::add('/Cadastro', 'View/cadastro.php');
    Rotas::add('/Perfil', 'View/perfil.php');
    Rotas::add('/Sair', 'View/sair.php');
    
    Rotas::erro('View/404.php');
    Rotas::exec();
?>