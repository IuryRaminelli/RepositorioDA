<?php
include_once "../Controller/ConUser.php";
include_once "../Model/User.php";
if (isset($_POST['email']) && isset($_POST['senha'])) {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $ConUser = new ConUser();
  $linha = $ConUser->selectLoginUser1($_POST['email']);

  if ($linha == null) {
    echo "
                        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=login.php'>
                        <script type=\"text/javascript\">
                            alert(\"Desculpe, essa conta não existe.\");
                        </script>
                        ";
  } else {
    if ($linha != null) {
      $user = new User($linha[0]);
      if (($user->getEmail() == $_POST['email']) && ($user->getSenha() == $_POST['senha'])) {
        $_SESSION["USER_LOGIN"] = $_POST['email'];
        header("Location: index.php");
        exit;
      } else {
        echo "
                                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=login.php'>
                                <script type=\"text/javascript\">
                                    alert(\"Erro!\");
                                </script>
                                ";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
                <li class="nav-item"><a class="nav-link active" href="sobre.php">Sobre</a></li>
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
                <li class="nav-item"><a class="nav-link" href="login.php">Contato</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Algo</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">algo2</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">algo3</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">algo4</a></li>
              <?php endif; ?>

              <?php if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "administrador@teste.com") : ?>
                <li class="nav-item"><a class="nav-link active" href="sobre.php">Sobre</a></li>
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
                    <li><a class="dropdown-item" href="cadastrarPedidos.php">Cadastros</a></li>
                    <li><a class="dropdown-item" href="#">algo1</a></li>
                    <li><a class="dropdown-item" href="#">algo2</a></li>
                    <li><a class="dropdown-item" href="#">algo3</a></li>
                    <li><a class="dropdown-item" href="#">algo4</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="login.php">Contato</a></li>
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
    <div class="container" style="width: 45%;">
      <br><br><br><br>
      <div class="row mt-4">
        <form action="login.php" method="POST" class="formLogin">
          <h1>LOGIN</h1>
          <label for="email">E-mail</label>
          <input type="email" name="email" placeholder="Digite seu e-mail" autofocus="true" />
          <label for="password">Senha</label>
          <input type="password" name="senha" placeholder="Digite sua senha" />
          <!--<a href="/">Esqueci minha senha</a>-->
          <input type="submit" value="Acessar" class="btn" />
        </form>
      </div>
    </div>
    <footer class="pt-5 my-5 text-body-secondary border-top">
      Desenvolvido por <a href="https://instagram.com/iury_raminelli">Iury Raminelli</a> - ADS18 &middot; &copy; 2024
    </footer>
  </div>
</body>

</html>