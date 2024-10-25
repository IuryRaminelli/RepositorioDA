<?php
  $current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="src/View/css/teste.css">
</head>
<body>

<section class="section-inicio">
    <header class="header-inicio">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="<?=HOME?>Home"><img src="src/View/img/logoo-ads.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <?php
              include_once __DIR__ . '/../Rotas/Constantes.php';
              if (session_status() == PHP_SESSION_NONE) {
                session_start();
              }
              if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "administrador@teste.com") :
              ?>
                <li class="nav-item"><a class="nav-link <?= $current_page == 'Sobre' ? 'active' : '' ?>" href="<?=HOME?>Sobre">Sobre</a></li>

                <li class="nav-item"><a class="nav-link <?= $current_page == 'Membros' ? 'active' : '' ?>" href="<?=HOME?>Membros">Membros</a></li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= in_array($current_page, ['Data', 'Autores', 'Titulo', 'Assunto', 'Tipo']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Navegar
                </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Data</a></li>
                    <li><a class="dropdown-item" href="#">Autores</a></li>
                    <li><a class="dropdown-item" href="#">Título</a></li>
                    <li><a class="dropdown-item" href="#">Assunto</a></li>
                    <li><a class="dropdown-item" href="#">Tipo</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= in_array($current_page, ['Atividades', 'Atas']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Documentos
                </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=HOME?>Atividades">Estatuto</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>Atas">Atas</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= in_array($current_page, ['CadastroEstatuto', 'CadastroUser', 'CadastroTransacao', 'CadastroAtividades', 'CadastroAtas']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Controle
                </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroEstatuto">Estatuto</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroUser">Membros</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroTransacao">Financeiro</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroAtividades">Atividades</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroAtas">Atas</a></li>
                  </ul>
                </li>

                <li class="nav-item"><a class="nav-link <?= $current_page == 'Financeiro' ? 'active' : '' ?>"  href="<?=HOME?>Financeiro">Financeiro</a></li>

                <li class="nav-item"><a class="nav-link <?= $current_page == 'Contato' ? 'active' : '' ?>"  href="<?=HOME?>Contato">Contato</a></li>
              <?php endif; ?>

              <?php if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "administrador@teste.com") : ?>
                <li class="nav-item"><a class="nav-link <?= $current_page == 'Sobre' ? 'active' : '' ?>" href="<?=HOME?>Sobre">Sobre</a></li>

                <li class="nav-item"><a class="nav-link <?= $current_page == 'Membros' ? 'active' : '' ?>" href="<?=HOME?>Membros">Membros</a></li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= in_array($current_page, ['Data', 'Autores', 'Titulo', 'Assunto', 'Tipo']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Navegar
                </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Data</a></li>
                    <li><a class="dropdown-item" href="#">Autores</a></li>
                    <li><a class="dropdown-item" href="#">Título</a></li>
                    <li><a class="dropdown-item" href="#">Assunto</a></li>
                    <li><a class="dropdown-item" href="#">Tipo</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= in_array($current_page, ['Estatuto', 'Atas']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Documentos
                </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=HOME?>Atividades">Estatuto</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>Atas">Atas</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= in_array($current_page, ['CadastroAtividades', 'CadastroAtas', 'CadastroTransacao']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Controle
                </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroAtividades">Atividades</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroAtas">Atas</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>CadastroTransacao">Financeiro</a></li>
                  </ul>
                </li>
                
                <li class="nav-item"><a class="nav-link <?= $current_page == 'Financeiro' ? 'active' : '' ?>"  href="<?=HOME?>Financeiro">Financeiro</a></li>

                <li class="nav-item"><a class="nav-link <?= $current_page == 'Contato' ? 'active' : '' ?>"  href="<?=HOME?>Contato">Contato</a></li>
              <?php endif; ?>

              <?php if (!isset($_SESSION["USER_LOGIN"])) : ?>
                <li class="nav-item"><a class="nav-link <?= $current_page == 'Sobre' ? 'active' : '' ?>" href="<?=HOME?>Sobre">Sobre</a></li>

                <li class="nav-item"><a class="nav-link <?= $current_page == 'Membros' ? 'active' : '' ?>" href="<?=HOME?>Membros">Membros</a></li>


                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= in_array($current_page, ['Data', 'Autores', 'Titulo', 'Assunto', 'Tipo']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Navegar
                </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Data</a></li>
                    <li><a class="dropdown-item" href="#">Autores</a></li>
                    <li><a class="dropdown-item" href="#">Título</a></li>
                    <li><a class="dropdown-item" href="#">Assunto</a></li>
                    <li><a class="dropdown-item" href="#">Tipo</a></li>
                  </ul>
                </li>
                
                <li class="nav-item"><a class="nav-link <?= $current_page == 'Financeiro' ? 'active' : '' ?>"  href="<?=HOME?>Financeiro">Financeiro</a></li>

                <li class="nav-item"><a class="nav-link <?= $current_page == 'Contato' ? 'active' : '' ?>"  href="<?=HOME?>Contato">Contato</a></li>
              <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
              <?php if (!isset($_SESSION["USER_LOGIN"])) : ?>
                <div class="dropdown text">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="src/View/img/perfil2.png" alt="Foto" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="<?=HOME?>Login">Entrar</a></li>
                  </ul>
                </div>
              <?php else : ?>
                <div class="dropdown text">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="src/View/img/perfil2.png" alt="Foto" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="<?=HOME?>Perfil">Perfil</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="<?=HOME?>Sair">Sair</a></li>
                  </ul>
                </div>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </section>
</body>
</html>