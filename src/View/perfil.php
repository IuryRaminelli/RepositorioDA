<?php
session_start();
include_once "src/Controller/ConUser.php";
include_once "src/Model/User.php";

$ConUser = new ConUser();
$linha = $ConUser->selectLoginUser1($_SESSION["USER_LOGIN2"]);

if($linha != null){
    $user = new User($linha[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>      
  <?php
      include_once 'header.php';
      include_once 'vlibras.php';
  ?>

  <div class="container">

    <br><br><br><br>

    <div class="container" style="width: 70%;">
      <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="src/View/img/logo-diretorio.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
          </div>
        </div>
      </div>
    </div>

    <br><br>

    <div class="container" style="width: 40%;">
        <form align="center" method="POST">
                <h1>PERFIL</h1>
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $user->getNome(); ?>" autofocus="true" disabled=""/><br>
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user->getEmail(); ?>" disabled=""/><br>
                <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" name="telefone" value="<?php echo $user->getTelefone(); ?>" disabled=""/><br>
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" name="tipo" value="<?php echo $user->getTipo(); ?>" disabled=""/><br>
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" value="********" disabled=""/>
            </form>
    </div>
    <?php include_once 'footer.php'; ?>
</div>
</body>
</html>
<?php
}
?>