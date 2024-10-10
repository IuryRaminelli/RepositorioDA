<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <li class="nav-item"><a class="nav-link" href="<?=HOME?>Sobre">Sobre</a></l>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Navegar
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cadastrarPedidos.php">Data</a></li>
                    <li><a class="dropdown-item" href="#">Autores</a></li>
                    <li><a class="dropdown-item" href="#">Título</a></li>
                    <li><a class="dropdown-item" href="#">Assunto</a></li>
                    <li><a class="dropdown-item" href="#">Tipo</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Documentos
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Estatuto</a></li>
                    <li><a class="dropdown-item" href="#">Atas</a></li>
                    <li><a class="dropdown-item" href="#">algo2</a></li>
                    <li><a class="dropdown-item" href="#">algo3</a></li>
                    <li><a class="dropdown-item" href="#">algo4</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    ControleADM
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Estatuto</a></li>
                    <li><a class="dropdown-item" href="#">Membros</a></li>
                    <li><a class="dropdown-item" href="#">Financeiro</a></li>
                    <li><a class="dropdown-item" href="#">Atividades</a></li>
                    <li><a class="dropdown-item" href="#">Atas</a></li>
                  </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="<?=HOME?>Contato">Contato</a></li>
              <?php endif; ?>

              <?php if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "administrador@teste.com") : ?>
                <li class="nav-item"><a class="nav-link" href="<?=HOME?>Sobre">Sobre</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Navegar
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cadastrarPedidos.php">Data</a></li>
                    <li><a class="dropdown-item" href="#">Autores</a></li>
                    <li><a class="dropdown-item" href="#">Título</a></li>
                    <li><a class="dropdown-item" href="#">Assunto</a></li>
                    <li><a class="dropdown-item" href="#">Tipo</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Documentos
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cadastrarPedidos.php">algo0</a></li>
                    <li><a class="dropdown-item" href="#">algo1</a></li>
                    <li><a class="dropdown-item" href="#">algo2</a></li>
                    <li><a class="dropdown-item" href="#">algo3</a></li>
                    <li><a class="dropdown-item" href="#">algo4</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    ControleUSER
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Atividades</a></li>
                    <li><a class="dropdown-item" href="#">Atas</a></li>
                  </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="<?=HOME?>Contato">Contato</a></li>
              <?php endif; ?>

              <?php if (!isset($_SESSION["USER_LOGIN"])) : ?>
                <li class="nav-item"><a class="nav-link" href="<?=HOME?>Sobre">Sobre</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Navegar
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cadastrarPedidos.php">Data</a></li>
                    <li><a class="dropdown-item" href="#">Autores</a></li>
                    <li><a class="dropdown-item" href="#">Título</a></li>
                    <li><a class="dropdown-item" href="#">Assunto</a></li>
                    <li><a class="dropdown-item" href="#">Tipo</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?=HOME?>Contato">Contato</a></li>
              <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
              <?php if (!isset($_SESSION["USER_LOGIN"])) : ?>
                <div class="dropdown text">
                  <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=HOME?>src/View/img/perfil2.webp" alt="mdo" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="<?=HOME?>Login">Entrar</a></li>
                    <li><a class="dropdown-item" href="<?=HOME?>Cadastro">Cadastrar</a></li>
                  </ul>
                </div>
              <?php else : ?>
                <div class="dropdown text">
                  <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=HOME?>src/View/img/perfil2.webp" alt="mdo" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="#">Configurações</a></li>
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