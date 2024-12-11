<?php

session_start();
    include_once __DIR__ . '/../Rotas/Constantes.php';
    include_once __DIR__ . '/../Controller/ConTransacao.php';
    include_once __DIR__ . '/../Model/Transacao.php';

    $ConTransacao = new ConTransacao();
    $lista = $ConTransacao->selectAllTransacao();

    $saldo = 0;

    foreach ($lista as $transacao){
        $transacao = new Transacao($transacao);
        $saldo += $transacao->getQuantidade();
    }

    if ($saldo < 0) {
        $cor = 'red';
    } elseif ($saldo > 0) {
        $cor = 'green';
    } else {
        $cor = 'black';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
      $idTrans = $_POST["teste"];
      
      if ($ConTransacao->deleteTransacao($idTrans)) {
          echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Financeiro';</script>";
          exit();
      } else {
          echo "<script>alert('Erro ao excluir!');</script>";
      }
  }

    if (isset($_SESSION["USER_LOGIN"]) && ($_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin")) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repositório Diretório ADS</title>
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

    <h1>Saldo Atual</h1>
    <br>
    <h1 align="center" style="color: <?= $cor; ?>">R$ <?= $saldo; ?></h1>
    
    <br>
    <h1>Histórico</h1>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Valor</th>
                <th scope="col">Dia</th>
                <th scope="col">Descrição</th>
                <?php
                    if (isset($_SESSION["USER_LOGIN"])) {
                        echo '<th scope="col">Excluir</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($lista as $transacao){
                    $transacao = new Transacao($transacao);
                    $dataOriginal = $transacao->getDia();
                    $data = DateTime::createFromFormat('Y-m-d', $dataOriginal);
                    $dataFormatada = $data->format('d/m/Y');
                    echo '<tr>
                        <td> R$ ' . $transacao->getQuantidade() . '</td>
                        <td>' . $dataFormatada . '</td>
                        <td>' . $transacao->getDescricao() . '</td>';
                    if (isset($_SESSION["USER_LOGIN"])) {
                      echo '<td>
                              <form action="' . HOME . 'Financeiro' . '" method="POST" style="display:inline;">
                                  <input type="hidden" name="teste" value="' . $transacao->getIdTrans() . '">
                                  <button type="submit" class="btn" name="acao" value="Excluir" onclick="return confirm(\'Tem certeza que deseja excluir esta transação?\');">
                                      <img src="src/View/img/deletar2.png" width="28" height="28" alt="">
                                  </button>
                              </form>
                          </td>';
                  }
                  echo '</tr>';
              }
              ?>
        </tbody>
    </table>
    <br><br>
    <?php
      include_once 'footer.php';
    ?>
  </div>

</body>

</html>
<?php
} else {
    echo "<h1>404 Não possui acesso.</h1>";
}
?>