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

  // Verifica se a conta existe
  if ($linha == null) {
    echo "<script>alert('Desculpe, essa conta não existe.'); window.location.href = '/RepositorioDA/Login';</script>";
  } else {
    // Instancia o usuário com os dados retornados
    $user = new User($linha[0]);
    
    // Verifica se a senha está correta usando password_verify se as senhas estão criptografadas
    if (($user->getEmail() == $_POST['email']) && ($user->getSenha() == $_POST['senha'])) {
      // Armazena o tipo do usuário na sessão
      $_SESSION["USER_LOGIN"] = $user->getTipo();
      $_SESSION["USER_LOGIN2"] = $_POST['email'];
      
      // Redireciona para a página Home
      header("Location: " . HOME . "Home");
      exit;
    } else {
      // Se a senha estiver incorreta, mostra um alerta
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
</head>

<body>
<?php
      include_once 'header.php';
      include_once 'vlibras.php';
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