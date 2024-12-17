<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {

    include_once __DIR__ . "/../Controller/ConMembros.php";
    include_once __DIR__ . "/../Model/Membros.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if (isset($_POST['cadastro'])) {
        $arrayMembros = array(
            "ano" => $_POST['ano'],
            "presidente" => $_POST['presidente'],
            "vicep" => $_POST['vicep'],
            "secretario" => $_POST['secretario'],
            "vices" => $_POST['vices'],
            "tesoureiro" => $_POST['tesoureiro'],
            "vicet" => $_POST['vicet'],
        );

        $ConMembros = new ConMembros();
        $Membros = new Membros($arrayMembros);

        if ($ConMembros->insertMembros($Membros)) {
            echo "<script>alert('Gestão cadastrada com sucesso.'); window.location.href = '" . HOME . "CadastroMembros';</script>";
      } else {
          echo "<script>alert('Desculpe, houve um erro!'); window.location.href = '" . HOME . "CadastroMembros';</script>";
      }      
    }
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
<h1 align="center">CADASTRAR GESTÃO</h1><br>
    <div class="container2">
    <form align="center" action="<?= HOME ?>CadastroMembros" method="POST">
                <label for="ano">Ano</label>
                <input type="number" class="form-control" name="ano" placeholder="Digite o ano de gestão" autofocus="true"/><br>
                <label for="presidente">Presidente</label>
                <input type="text" class="form-control" name="presidente" placeholder="Digite o Presidente"/><br>
                <label for="vicep">Vice-presidente</label>
                <input type="text" class="form-control" name="vicep" placeholder="Digite o Vice-Presidente"/><br>
                <label for="secretario">Secretário</label>
                <input type="text" class="form-control" name="secretario" placeholder="Digite o Secretário"/><br>
                <label for="vices">Vice-Secretário</label>
                <input type="text" class="form-control" name="vices" placeholder="Digite o Vice-Secretário"/><br>
                <label for="tesoureiro">Tesoureiro</label>
                <input type="text" class="form-control" name="tesoureiro" placeholder="Digite o Tesoureiro"/><br>
                <label for="vicet">Vice-Tesoureiro</label>
                <input type="text" class="form-control" name="vicet" placeholder="Digite o Vice-Tesoureiro"/><br>
                <input type="submit" value="Cadastrar" class="btn" name="cadastro" />
            </form>
    </div>
    <?php include_once 'footer.php'; ?>
</div>
</body>
</html>

<?php 
}else{
    echo "<h1>404 Não possui acesso.</h1>";
}
?>