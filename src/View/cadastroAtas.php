<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin") {

    include_once __DIR__ . "/../Controller/ConAtas.php";
    include_once __DIR__ . "/../Model/Atas.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';


    if(isset($_POST['cadastro'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["arquivo"])){
            $target_dir = "src/View/img/";
            $target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        
            if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)){
                
                $arrrayCIA = array("dia" => $_POST['dia'],
                                "descricao" => $_POST['descricao'],
                                "arquivo" => $target_file
                );


                $ConAtas = new ConAtas();
                $Atas = new Atas($arrrayCIA);


                $ConAtas->insertAtas($Atas);
                echo "<script>alert('Ata cadastrada com sucesso.'); window.location.href = '" . HOME . "CadastroAtas';</script>";
            }else {
                echo "<script>alert('Desculpe, houve um erro ao enviar seu arquivo.'); window.location.href = '" . HOME . "CadastroAtas';</script>";
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
    <div align="center">
      <h1>MODELOS DE ATA</h1>
      <?php
      echo '
        <input type="hidden" name="id_ativ">Alguma coisa<br>
        <button type="submit" class="btn" name="acao" value="Excluir">
          <a href="https://docs.google.com/document/d/14QzHX1SWVKHsl5BOb-QgkERbL9iRTDpeJMxkw__-yqg/edit?usp=sharing">
            <img src="src/View/img/file-open.png" width="28" height="28" alt="">
          </a>
        </button>';
        echo '<br><br>';
        echo '
        <input type="hidden" name="id_ativ">Alguma coisa2<br>
        <button type="submit" class="btn" name="acao" value="Excluir">
          <a href="https://docs.google.com/document/d/14QzHX1SWVKHsl5BOb-QgkERbL9iRTDpeJMxkw__-yqg/edit?usp=sharing">
            <img src="src/View/img/file-open.png" width="28" height="28" alt="">
          </a>
        </button>';
      ?>
    </div>  
    <br><br><br>

    <h1 align="center">CADASTRAR ATA</h1><br>
    <div class="container" style="width: 40%;">
    <form align="center" action="<?= HOME ?>CadastroAtas" method="POST" enctype="multipart/form-data">
                <label for="dia">Data</label>
                <input type="date" class="form-control" name="dia" autofocus="true"/><br>
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" placeholder="Digite uma Descrição"/><br>
                <label for="arquivo">Arquivo</label>
                <input type="file" class="form-control" name="arquivo"/><br>
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