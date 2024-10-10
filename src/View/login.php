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
    if ($linha != null) {
      $user = new User($linha[0]);
      if (($user->getEmail() == $_POST['email']) && ($user->getSenha() == $_POST['senha'])) {
        $_SESSION["USER_LOGIN"] = $_POST['email'];
        header("Location: " . HOME . "Home");
        exit;
      } else {
        echo "<script>alert('Erro!'); window.location.href = '/RepositorioDA/Login';</script>";

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
  <link rel="stylesheet" type="text/css" href="src/View/css/teste.css">
</head>

<body>
<?php
        include_once 'header.php';
      ?>

  <div class="container">
    <div class="container" style="width: 45%;">
      <br><br><br><br>
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