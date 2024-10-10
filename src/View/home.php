<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repositório Diretório ADS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .btn-custom {
      width: 400px;
    }
  </style>
  
  <link rel="stylesheet" type="text/css" href="src/View/css/teste.css">
</head>

<body>
    <?php
      include_once 'header.php';
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

    <br>
    <h1>Busca Geral</h1>
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Buscar no Repositório" aria-label="Text input with dropdown button">
    </div>

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
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
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
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
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
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
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
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
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
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
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
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
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