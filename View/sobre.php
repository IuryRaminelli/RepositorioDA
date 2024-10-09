<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repositório Diretório ADS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/teste.css">
  <link rel="stylesheet" type="text/css" href="css/a.css">
</head>

<body>
<section class="section-inicio">
    <header class="header-inicio">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="index.php"><img src="img/logoo-ads.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <?php
              if (session_status() == PHP_SESSION_NONE) {
                session_start();
              }
              if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "administrador@teste.com") :
              ?>
                <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a></l>
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

                <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
              <?php endif; ?>

              <?php if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "administrador@teste.com") : ?>
                <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a></li>
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

                <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
              <?php endif; ?>

              <?php if (!isset($_SESSION["USER_LOGIN"])) : ?>
                <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a></li>
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
                <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
              <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
              <?php if (!isset($_SESSION["USER_LOGIN"])) : ?>
                <div class="dropdown text">
                  <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/perfil2.webp" alt="mdo" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="login.php">Entrar</a></li>
                    <li><a class="dropdown-item" href="cadastro.php">Cadastrar</a></li>
                  </ul>
                </div>
              <?php else : ?>
                <div class="dropdown text">
                  <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/perfil2.webp" alt="mdo" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="#">Configurações</a></li>
                    <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="sair.php">Sair</a></li>
                  </ul>
                </div>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </section>

  <div class="container">

    <br><br><br><br>

    <div class="container" style="width: 70%;">
      <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/logo-diretorio.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
          </div>
        </div>
      </div>
    </div>

    <br><br>

    <div class="row">
      <h1>Sobre nós</h1>
      <p>Bem-vindo ao Diretório Acadêmico do curso de Análise e Desenvolvimento de Sistemas! Nosso objetivo é promover a integração dos alunos, fornecer suporte acadêmico e
        fomentar o crescimento profissional através de eventos, palestras e projetos que incentivam o desenvolvimento de habilidades técnicas e comportamentais.</p>
    </div>

    <div class="row mt-5">
      <div class="col-md-4">
        <h2>Missão</h2>
        <p>Ser um ponto de apoio para os alunos, facilitando o aprendizado contínuo e promovendo um ambiente de colaboração para o desenvolvimento de soluções tecnológicas
          inovadoras.</p>
      </div>
      <div class="col-md-4">
        <h2>Valores</h2>
        <ul>
          <li><strong>Inovação:</strong> Estimulamos a criatividade e o pensamento crítico para o desenvolvimento de novas soluções tecnológicas.</li>
          <li><strong>Colaboração:</strong> Valorizamos o trabalho em equipe e a troca de conhecimento entre alunos, professores e o mercado.</li>
          <li><strong>Excelência:</strong> Buscamos a melhoria contínua, tanto no âmbito acadêmico quanto no desenvolvimento profissional dos alunos.</li>
        </ul>
      </div>
      <div class="col-md-4">
        <h2>Visão</h2>
        <p>Ser reconhecido como um diretório de excelência, referência em inovação tecnológica e na preparação de profissionais capacitados para o mercado de trabalho.</p>
      </div>
    </div>

    <div class="row mt-5">
      <h2>Nossa Proposta</h2>
      <p>Oferecemos aos alunos atividades extracurriculares, como workshops, hackathons, e palestras com profissionais renomados da área.
        Nosso objetivo é complementar a formação acadêmica com experiências práticas e oportunidades de networking, preparando os alunos para os desafios do mercado de trabalho.</p>
    </div>
    <footer class="pt-5 my-5 text-body-secondary border-top">
    Desenvolvido por <a href="https://instagram.com/iury_raminelli">Iury Raminelli</a> - ADS18 &middot; &copy; 2024
    </footer>
  </div>
</body>

</html>