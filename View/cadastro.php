<?php
include_once "../Controller/ConUser.php";
include_once "../Model/User.php";

if(isset($_POST['cadastro'])){
  $arrrayUser = array("nome" => $_POST['nome'],
                    "email" => $_POST['email'],
                    "telefone" => $_POST['telefone'],
                    "senha" => $_POST['senha'],
                  );
                  echo "
                  <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=login.php'>
                  <script type=\"text/javascript\">
                      alert(\"Usuário cadastrado com sucesso!\");
                  </script>
                  ";

$ConUser = new ConUser();
$User = new User($arrrayUser);


$ConUser->insertUser($User);
header("Location: login.php");
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
<?php
        include_once 'header.php';
      ?>


  <div class="container">
    <div class="container" style="width: 45%;">
      <br><br><br><br>
      <div class="row mt-4">
        <form action="cadastro.php" method="POST" class="formLogin">
          <h1>CADASTRO</h1>
          <label for="nome">Nome</label>
          <input type="text" name="nome" placeholder="Digite seu nome" autofocus="true" />
          <label for="email">E-mail</label>
          <input type="email" name="email" placeholder="Digite seu e-mail" autofocus="true" />
          <label for="telefone">Telefone</label>
          <input type="number" name="telefone" placeholder="Digite seu telefone" autofocus="true" />
          <label for="password">Senha</label>
          <input type="password" name="senha" placeholder="Digite sua senha" />
          <!--<a href="/">Esqueci minha senha</a>-->
          <input type="submit" value="Acessar" class="btn" name="cadastro"/>
        </form>
      </div>
    </div>
    <?php
        include_once 'footer.php';
      ?>
  </div>
</body>

</html>