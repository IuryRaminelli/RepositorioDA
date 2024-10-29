<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin") {

    include_once __DIR__ . "/../Controller/ConEstatuto.php";
    include_once __DIR__ . "/../Model/Estatuto.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';


    if(isset($_POST['cadastro'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["arquivo"])){
            $target_dir = "src/View/img/";
            $target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        
            if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)){
                
                $arrrayCIA = array("ano" => $_POST['ano'],
                                "descricao" => $_POST['descricao'],
                                "arquivo" => $target_file
                );


                $ConEstatuto = new ConEstatuto();
                $Estatuto = new Estatuto($arrrayCIA);


                $ConEstatuto->insertEstatuto($Estatuto);
                echo "<script>alert('Estatuto cadastrada com sucesso.'); window.location.href = '" . HOME . "CadastroEstatuto';</script>";
            }else {
                echo "<script>alert('Desculpe, houve um erro ao enviar seu arquivo.'); window.location.href = '" . HOME . "CadastroEstatuto';</script>";
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

    <h1 align="center">CADASTRAR ESTATUTO</h1><br>
    <div class="container" style="width: 40%;">
    <form align="center" action="<?= HOME ?>CadastroEstatuto" method="POST" enctype="multipart/form-data">
                <label for="ano">Ano</label>
                <input type="number" class="form-control" name="ano" autofocus="true"/><br>
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