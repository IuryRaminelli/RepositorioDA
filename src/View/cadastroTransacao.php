<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin") {

    include_once __DIR__ . "/../Controller/ConTransacao.php";
    include_once __DIR__ . "/../Model/Transacao.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if (isset($_POST['cadastro'])) {
      $tipoTransacao = $_POST['tipoTransacao'];
      $quantidade = $_POST['quantidade'];
  
      if ($tipoTransacao === 'saida') {
          $quantidade = -abs($quantidade);
      } else {
          $quantidade = abs($quantidade);
      }
  
      $arrayUser = array(
          "quantidade" => $quantidade,
          "dia" => $_POST['dia'],
          "descricao" => $_POST['descricao'],
      );
  
      $ConTransacao = new ConTransacao();
      $Transacao = new Transacao($arrayUser);
  
      if ($ConTransacao->insertTransacao($Transacao)) {
          echo "<script>alert('Cadastrado com sucesso!'); window.location.href = '" . HOME . "CadastroTransacao';</script>";
      } else {
          echo "<script>alert('Erro ao cadastrar.'); window.location.href = '" . HOME . "CadastroTransacao';</script>";
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

    <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/View/img/headernovo.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
                </div>
            </div>
        </div>

    <br><br>
    
    <h1 align="center">CADASTRAR TRANSAÇÃO</h1><br>
<div class="container" style="width: 40%;">
  
<div class="d-flex justify-content-center gap-3 mb-3">
    <button type="button" id="btnEntrada" class="btn btn-success">Entrada</button>
    <button type="button" id="btnSaida" class="btn btn-danger">Saída</button>
</div>


  <form align="center" action="<?= HOME ?>CadastroTransacao" method="POST" enctype="multipart/form-data">
      <input type="hidden" id="tipoTransacao" name="tipoTransacao" value="entrada" />

      <label for="quantidade">Valor</label>
      <input type="number" id="quantidade" class="form-control" name="quantidade" placeholder="Digite um Valor"/><br>

      <label for="dia">Data</label>
      <input type="date" class="form-control" name="dia" required autofocus="true"/><br>

      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" name="descricao" placeholder="Digite uma Descrição" required/><br>

      <input type="submit" value="Cadastrar" class="btn btn-primary" name="cadastro" />
  </form>
</div>

<script>
  const btnEntrada = document.getElementById('btnEntrada');
  const btnSaida = document.getElementById('btnSaida');
  const tipoTransacao = document.getElementById('tipoTransacao');
  const quantidadeInput = document.getElementById('quantidade');

  btnEntrada.addEventListener('click', () => {
    tipoTransacao.value = 'entrada';
    if (quantidadeInput.value < 0) {
      quantidadeInput.value = Math.abs(quantidadeInput.value);
    }
  });

  btnSaida.addEventListener('click', () => {
    tipoTransacao.value = 'saida';
    if (quantidadeInput.value > 0) {
      quantidadeInput.value = -Math.abs(quantidadeInput.value);
    }
  });
</script>


    <?php include_once 'footer.php'; ?>
</div>
</body>
</html>

<?php 
}else{
    echo "<h1>404 Não possui acesso.</h1>";
}
?>