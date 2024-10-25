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

    <?php
        include_once __DIR__ . '/../Controller/ConAtividade.php';
        include_once __DIR__ . '/../Model/Atividade.php';

        $ConAtividade = new ConAtividade();
        $lista = $ConAtividade->selectAllAtividade();

    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Dia</th>
                <th scope="col">Local</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($lista as $atividade){
                    $atividade = new Atividade($atividade);
                    echo '<tr>
                        <td>' . $atividade->getNome() . '</td>
                        <td>' . $atividade->getDescricao() . '</td>
                        <td>' . $atividade->getDia() . '</td>
                        <td>' . $atividade->getLocal() . '</td>
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
