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

    <h1>Busca Geral</h1>
    <form class="d-flex" name="menu" method="post" action="SelectTudo.php">
      <input id="tudo" name="tudo" class="form-control me-2" type="search" placeholder="Buscar no Repositório" aria-label="Search">
        <button id="tudo1" name="tudo1" class="btn btn-outline-light" type="submit">
          <i class='bx bx-search icon'></i>
        </button>
    </form>

    <br><br>
    <h1>Busca Facetada</h1>
    <div class="container">
      <div class="row">
        <div class="col-4 d-flex justify-content-start">
          <a class="btn btn-primary btn-custom" data-bs-toggle="collapse" href="#autores" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Autor</a>
        </div>
        <div class="col-4 d-flex justify-content-center">
          <a class="btn btn-primary btn-custom" data-bs-toggle="collapse" href="#assunto" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Assunto</a>
        </div>
        <div class="col-4 d-flex justify-content-end">
          <a class="btn btn-primary btn-custom" data-bs-toggle="collapse" href="#datapub" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Data de Publicação</a>
        </div>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col">
        <div class="collapse multi-collapse" id="autores">
          <div class="card card-body">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="collapse multi-collapse" id="assunto">
          <div class="card card-body">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="collapse multi-collapse" id="datapub">
          <div class="card card-body">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="container">
      <div class="row">
        <div class="col-4 d-flex justify-content-start">
          <a class="btn btn-primary btn-custom" data-bs-toggle="collapse" href="#tipodoc" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Tipo de Documento</a>
        </div>
        <div class="col-4 d-flex justify-content-center">
          <a class="btn btn-primary btn-custom d-none" data-bs-toggle="collapse" href="#assunto" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Assunto</a>
        </div>
        <div class="col-4 d-flex justify-content-end">
          <a class="btn btn-primary btn-custom" data-bs-toggle="collapse" href="#outro" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Outro?</a>
        </div>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col">
        <div class="collapse multi-collapse" id="tipodoc">
          <div class="card card-body">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="collapse multi-collapse" id="nada">
          <div class="card card-body">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="collapse multi-collapse" id="outro">
          <div class="card card-body">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
          </div>
        </div>
      </div>
      <?php
        include_once 'footer.php';
      ?>
    </div>


</body>

</html>