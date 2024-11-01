<?php
session_start();
include_once "src/Controller/ConAtividade.php";
include_once "src/Model/Atividade.php";

$ConAtividade = new ConAtividade();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
    $idAtividade = $_POST["id_ativ"];

    if ($ConAtividade->deleteAtividade($idAtividade)) {
        echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Atividade';</script>";
        exit();
    } else {
        echo "<script>alert('Erro ao excluir!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repositório Diretório ADS</title>
  <style>

.carousel-inner {
    height: 300px; /* Altura fixa para o contêiner do carrossel */
}

.carousel-inner img {
    width: 100%; /* Faz a imagem ocupar toda a largura do contêiner */
    height: auto; /* Altura automática para manter a proporção */
    max-height: 300px; /* Limita a altura máxima para que o layout não mude */
    object-fit: scale-down; /* Ajusta a imagem sem cortá-la */
    display: block; /* Remove espaços abaixo da imagem */
    margin: auto; /* Centraliza a imagem verticalmente */
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
        $listaAtividades = $ConAtividade->selectAllAtividade();

        include_once __DIR__ . '/../Controller/ConImagem.php';
        include_once __DIR__ . '/../Model/Imagem.php';

        $ConImagem = new ConImagem();
    ?>
 <div class="row">
    <?php foreach ($listaAtividades as $atividade): ?>
      <?php $atividade = new Atividade($atividade); ?>
      <div class="col-md-6 mb-4">
        <div class="card card-custom h-100">
          <div class="carousel-container">
            <div id="carouselExampleControls<?= $atividade->getIdAtiv(); ?>" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php 
                $imagens = $ConImagem->selectAllImagem($atividade->getNome());
                foreach ($imagens as $index => $imagem): 
                  $imagem = new Imagem($imagem); ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                    <img src="<?= $imagem->getArquivo(); ?>" class="d-block w-100" alt="<?= $atividade->getNome(); ?>">
                  </div>
                <?php endforeach; ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls<?= $atividade->getIdAtiv(); ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls<?= $atividade->getIdAtiv(); ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="card-body card-body-custom">
            <h3 class="card-title card-title-custom"><?= $atividade->getNome(); ?></h3>
            <h5 class="card-text"><?= $atividade->getDescricao(); ?></h5>
            <p class="card-text"><?= $atividade->getLocal(); ?></small></p>
            <p class="card-text"><small class="text-muted text-muted-custom"><?= $atividade->getDia(); ?></small></p>
            <?php if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin"): ?>
                <p class="card-text">
                    <small class="text-muted text-muted-custom">
                        <form action="<?= HOME ?>Atividade" method="POST" style="display:inline;">
                            <input type="hidden" name="id_ativ" value="<?= $atividade->getIdAtiv(); ?>">
                            <button type="submit" class="btn" name="acao" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta atividade?');">
                                <img src="src/View/img/deletar2.png" width="28" height="28" alt="">
                            </button>
                        </form>
                    </small>
                </p>
            <?php endif; ?>
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
