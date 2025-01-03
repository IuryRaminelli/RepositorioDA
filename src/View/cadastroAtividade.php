<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin") {

    include_once __DIR__ . "/../Controller/ConAtividade.php";
    include_once __DIR__ . "/../Model/Atividade.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if(isset($_POST['cadastro'])){

              $arrrayCIA = array(
                              
                              "nome" => $_POST['nome'],
                              "descricao" => $_POST['descricao'],
                              "dia" => $_POST['dia'],
                              "local" => $_POST['local'],
              );

              $ConAtividade = new ConAtividade();
              $Atividade = new Atividade($arrrayCIA);


              if ($ConAtividade->insertAtividade($Atividade)) {
                $nomeAtividade = $_POST['nome'];
                $_SESSION['nome'] = $nomeAtividade;
                header("Location: " . HOME . "CadastroImagem");
                exit();
            } else {
                echo "<script>alert('Desculpe, houve um erro!'); window.location.href = '" . HOME . "CadastroAtividade';</script>";
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
    
    <h1 align="center">CADASTRAR ATIVIDADE</h1><br>
    <div class="container2">
      <form align="center" action="<?= HOME ?>CadastroAtividade" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite um Nome"/><br>
        
        <label for="descricao">Descrição</label>
        <textarea name="descricao" class="form-control" placeholder="Digite uma Descrição" rows="5"></textarea><br>
        
        <label for="dia">Data</label>
        <input type="date" class="form-control" name="dia" autofocus="true"/><br>
        
        <label for="local">Local</label>
        <input type="text" class="form-control" name="local" placeholder="Digite um Local"/><br>

        <input type="submit" value="Próximo" class="btn" name="cadastro" />
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