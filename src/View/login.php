<?php
include_once __DIR__ . "/../Controller/ConUser.php";
include_once __DIR__ . "/../Model/User.php";
include_once __DIR__ . '/../Rotas/Constantes.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $ConUser = new ConUser();
  $linha = $ConUser->selectLoginUser1($_POST['email']);

  if ($linha == null) {
    echo "<script>alert('Desculpe, essa conta não existe.'); window.location.href = '/RepositorioDA/Login';</script>";
  } else {
    $user = new User($linha[0]);
    if (($user->getEmail() == $_POST['email']) && password_verify($_POST['senha'], $user->getSenha())) {
      $_SESSION["USER_LOGIN"] = $user->getTipo();
      $_SESSION["USER_LOGIN2"] = $_POST['email'];
      
      header("Location: " . HOME . "Home");
      exit;
    } else {
      echo "<script>alert('Erro! E-mail ou senha incorretos.'); window.location.href = '/RepositorioDA/Login';</script>";
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
  <style>
        .container2 {
            width: 45%;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .container2 {
                width: 90%;
            }
        }

        @media (max-width: 576px) {
            .container2 {
                width: 100%;
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>
<?php
      include_once 'header.php';
      include_once 'vlibras.php';
      ?>
  <div class="container">

<br><br><br><br>

<div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/View/img/headernovo.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
                </div>
            </div>
        </div>

      <div class="container2">
        <br><br>
        <div class="row mt-4">
            <form action="<?=HOME?>Login" method="POST" class="formLogin">
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
    <?php
        include_once 'footer.php';
      ?>
  </div>
</body>

</html>