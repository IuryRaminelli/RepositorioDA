<?php
    include_once __DIR__ . '/../Rotas/Constantes.php';
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

    <h1>Saldo Atual</h1>
    <br>
    <?php
        include_once __DIR__ . '/../Controller/ConTransacao.php';
        include_once __DIR__ . '/../Model/Transacao.php';

        $ConTransacao = new ConTransacao();
        $lista = $ConTransacao->selectAllTransacao();

        // Inicializa o saldo como zero
        $saldo = 0;

        // Soma o valor de cada transação ao saldo
        foreach ($lista as $transacao){
            $transacao = new Transacao($transacao);
            $saldo += $transacao->getQuantidade();
        }

        // Define a cor do saldo com base no valor
        if ($saldo < 0) {
            $cor = 'red';
        } elseif ($saldo > 0) {
            $cor = 'green';
        } else {
            $cor = 'black';
        }
    ?>
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
            </tr>
        </thead>
        <tbody>
            <?php 
                // Exibe a lista de transações
                foreach ($lista as $transacao){
                    $transacao = new Transacao($transacao);
                    echo '<tr>
                        <td> R$ ' . $transacao->getQuantidade() . '</td>
                        <td>' . $transacao->getDia() . '</td>
                        <td>' . $transacao->getDescricao() . '</td>
                    </tr>';
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
