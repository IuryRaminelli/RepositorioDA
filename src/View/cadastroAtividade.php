<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "administrador@teste.com" || $_SESSION["USER_LOGIN"] == "administrador@teste.com") {

    include_once __DIR__ . "/../Controller/ConAtividade.php";
    include_once __DIR__ . "/../Model/Atividade.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if (isset($_POST['cadastro'])) {
        $arrayUser = array(
            "nome" => $_POST['nome'],
            "descricao" => $_POST['descricao'],
            "dia" => $_POST['dia'],
            "local" => $_POST['local'],
        );

        $ConAtividade = new ConAtividade();
        $Atividade = new Atividade($arrayUser);

        if ($ConAtividade->insertAtividade($Atividade)) {
            echo "<script>alert('Cadastrado com sucesso!'); window.location.href = '" . HOME . "CadastroAtividade';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar.'); window.location.href = '" . HOME . "CadastroAtividade';</script>";
        }
    }
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
    
    <h1 align="center">CADASTRAR ATIVIDADE</h1><br>
    <div class="container" style="width: 40%;">
    <form align="center" action="<?= HOME ?>CadastroAtividade" method="POST" enctype="multipart/form-data">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite um Nome"/><br>
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" placeholder="Digite uma Descrição"/><br>
                <label for="dia">Data</label>
                <input type="date" class="form-control" name="dia" autofocus="true"/><br>
                <label for="local">Local</label>
                <input type="text" class="form-control" name="local" placeholder="Digite um Local"/><br>
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