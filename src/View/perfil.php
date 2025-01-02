<?php
session_start();
include_once "src/Controller/ConUser.php";
include_once "src/Model/User.php";

$ConUser = new ConUser();
$linha = $ConUser->selectLoginUser1($_SESSION["USER_LOGIN2"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Alterar') {
    $idUser = $_POST['id_user'];
    $_SESSION['id_user'] = $idUser;
    header("Location: " . HOME . "AlterarUser");
    exit();
}


if (isset($_SESSION["USER_LOGIN"]) && ($_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin")) {

    if($linha != null){
        $user = new User($linha[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <br><br>

    <div class="container2">
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
                <br>
                <input type="hidden" name="id_user" value="<?= $user->getIdUser(); ?>">
                <button type="submit" class="btn" name="acao" value="Alterar">
                    <img src="src/View/img/editar2.png" width="28" height="28" alt="">
                </button>
            </form>
    </div>
    <?php include_once 'footer.php'; ?>
</div>
</body>
</html>
<?php
    }
} else {
    echo "<h1>404 Não possui acesso.</h1>";
}
?>