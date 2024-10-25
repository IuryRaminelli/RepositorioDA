<?php
    include_once __DIR__ . '/Rotas.php';

    /* NORMAL */
    Rotas::add('/Home', '/View/home.php');
    Rotas::add('/Sobre', 'View/sobre.php');
    Rotas::add('/Atividade', 'View/atividade.php');
    Rotas::add('/Membros', 'View/membros.php');
    Rotas::add('/Financeiro', 'View/financeiro.php');

    /* DOCUMENTOS */
    Rotas::add('/Atas', 'View/atas.php');

    /* CONTROLE */
    Rotas::add('/CadastroUser', 'View/cadastroUser.php');
    Rotas::add('/CadastroAtas', 'View/cadastroAtas.php');
    Rotas::add('/CadastroTransacao', 'View/cadastroTransacao.php');
    Rotas::add('/CadastroEstatuto', 'View/cadastroEstatuto.php');
    Rotas::add('/CadastroAtividade', 'View/cadastroAtividade.php');

    /* PERFIL */
    Rotas::add('/Login', 'View/login.php');
    Rotas::add('/Perfil', 'View/perfil.php');
    Rotas::add('/Sair', 'View/sair.php');

    Rotas::erro('View/404.php');
    Rotas::exec();
?>