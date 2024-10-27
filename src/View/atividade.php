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

<div class="row">
    <?php foreach ($lista as $atividade): ?>
      <?php $atividade = new Atividade($atividade); ?>
      <div class="col-md-6 mb-4"> <!-- Define duas colunas por linha em telas médias ou maiores -->
        <div class="card card-custom h-100">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?= $atividade->getImagem(); ?>" class="img-fluid rounded-start" alt="<?= $atividade->getNome(); ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body card-body-custom">
                <h5 class="card-title card-title-custom"><?= $atividade->getNome(); ?></h5>
                <p class="card-text"><?= $atividade->getDescricao(); ?></p>
                <p class="card-text"><small class="text-muted text-muted-custom"><?= $atividade->getLocal(); ?></small></p>
                <p class="card-text"><small class="text-muted text-muted-custom"><?= $atividade->getDia(); ?></small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
    <br><br>
    <?php
      include_once 'footer.php';
    ?>
  </div>

</body>

</html>
