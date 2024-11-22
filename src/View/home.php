<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repositório Diretório ADS</title>

  <style>
    .btn-custom {
      width: 400px;
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

    <div class="row mb-4">
      <div class="col-md-12 p-4 border rounded bg-light shadow-sm d-flex align-items-center justify-content-between flex-column">
          <div class="d-flex justify-content-between w-100">
              <div>
                  <h2>Fique por dentro!</h2>
                  <p>
                      Explore as últimas atividades do nosso diretório acadêmico. 
                      Descubra eventos, projetos e iniciativas que promovem aprendizado, networking e desenvolvimento pessoal.
                  </p>
              </div>
          </div>
          <a href="<?=HOME?>Atividade" class="align-self-start mt-3">
              <button type="submit" class="btn btn-primary" name="mais" href="paginainclusao.php">
                  Ver mais
              </button>
          </a>
      </div>
  </div>

  <div class="row mb-4">
      <div class="col-md-12 p-4 border rounded bg-light shadow-sm d-flex align-items-center justify-content-between flex-column">
          <div class="d-flex justify-content-between w-100">
              <div>
                  <h2>Confira nossa gestão!</h2>
                  <p>
                      Conheça as pessoas por trás das decisões e ações que moldam o futuro do nosso diretório. 
                      Saiba mais sobre os líderes que estão comprometidos em representar nossos interesses e construir um ambiente acadêmico mais forte.
                  </p>
              </div>
          </div>
          <a href="<?=HOME?>Membros" class="align-self-start mt-3">
              <button type="submit" class="btn btn-primary" name="mais" href="paginainclusao.php">
                  Ver mais
              </button>
          </a>
      </div>
  </div>

  <div class="row mb-4">
      <div class="col-md-12 p-4 border rounded bg-light shadow-sm d-flex align-items-center justify-content-between flex-column">
          <div class="d-flex justify-content-between w-100">
              <div>
                  <h2>Confira nosso estatuto!</h2>
                  <p>
                      O estatuto é a base de todas as nossas ações e políticas. 
                      Ele estabelece os princípios que seguimos, garantindo transparência, integridade e alinhamento aos interesses dos estudantes.
                  </p>
              </div>
          </div>
          <a href="<?=HOME?>Estatuto" class="align-self-start mt-3">
              <button type="submit" class="btn btn-primary" name="mais" href="paginainclusao.php">
                  Ver mais
              </button>
          </a>
      </div>
  </div>

    <?php
        include_once 'footer.php';
      ?>
    </div>

</body>
</html>