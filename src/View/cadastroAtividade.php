<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin") {

    include_once __DIR__ . "/../Controller/ConAtividade.php";
    include_once __DIR__ . "/../Model/Atividade.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if(isset($_POST['cadastro'])){
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])){
          $target_dir = "src/View/img/";
          $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
          $uploadOk = 1;
          $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


      
          if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)){
              
              $arrrayCIA = array(
                              
                              "imagem" => $target_file,
                              "nome" => $_POST['nome'],
                              "descricao" => $_POST['descricao'],
                              "dia" => $_POST['dia'],
                              "local" => $_POST['local'],
              );


              $ConAtividade = new ConAtividade();
              $Atividade = new Atividade($arrrayCIA);


              $ConAtividade->insertAtividade($Atividade);
              echo "<script>alert('Cadastrada com sucesso.'); window.location.href = '" . HOME . "CadastroAtividade';</script>";
          }else {
              echo "<script>alert('Desculpe, houve um erro ao enviar sua imagem.'); window.location.href = '" . HOME . "CadastroAtividade';</script>";
          }
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
                <label for="imagem">Imagem</label>
                <input type="file" class="form-control" name="imagem"/><br>
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