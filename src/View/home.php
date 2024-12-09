<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repositório Diretório ADS</title>
  <style>
.card {
  background: #fff !important;
  border-radius: 15px;
  box-shadow: none;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-12px);
  box-shadow: none;
}

.card-header {
  background: #fff !important;
  color: #333;
  padding: 25px;
  border-bottom: none;
  border-radius: 15px 15px 0 0;
  text-align: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.card-body {
  padding: 30px;
  color: #555;
  font-family: 'Roboto', sans-serif;
  font-size: 1rem;
  line-height: 1.8;
}

.card-footer {
  background-color: #fff !important;
  padding: 20px;
  text-align: center;
  border-top: none;
  border-radius: 0 0 15px 15px;
  color: #333;
}

.btn {
  padding: 12px 30px;
  border-radius: 50px;
  color: #007bff;
  border: 2px solid #007bff;
  font-size: 1rem;
  font-weight: bold;
  text-transform: uppercase;
  transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn:hover {
  background-color: #007bff;
  color: #fff;
  transform: scale(1.1);
  box-shadow: none;
}

.btn-icon {
  margin-right: 12px;
  vertical-align: middle;
  transition: transform 0.3s ease;
}

.btn:hover .btn-icon {
  transform: translateX(5px);
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
    <div class="row mb-4">
  <div class="col-md-12 card">
      <div class="card-header">
          <h2>Fique por dentro!</h2>
      </div>
      <div class="card-body">
          <p>
              Explore as últimas atividades do nosso diretório acadêmico. Descubra eventos, projetos e iniciativas que promovem aprendizado, networking e desenvolvimento pessoal.
          </p>
      </div>
      <div class="card-footer">
          <a href="<?=HOME?>Atividade">
              <button type="button" class="btn">
                  <span class="btn-icon"><img src="src/View/img/arrow-right.png" width="20" height="20" alt="Ícone de seta"></span>
                  Ver mais
              </button>
          </a>
      </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-md-12 card">
      <div class="card-header">
          <h2>Confira nossa gestão!</h2>
      </div>
      <div class="card-body">
          <p>
              Conheça as pessoas por trás das decisões e ações que moldam o futuro do nosso diretório. Saiba mais sobre os líderes que estão comprometidos em representar nossos interesses e construir um ambiente acadêmico mais forte.
          </p>
      </div>
      <div class="card-footer">
          <a href="<?=HOME?>Membros">
              <button type="button" class="btn">
                  <span class="btn-icon"><img src="src/View/img/arrow-right.png" width="20" height="20" alt="Ícone de seta"></span>
                  Ver mais
              </button>
          </a>
      </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-md-12 card">
      <div class="card-header">
          <h2>Confira nosso estatuto!</h2>
      </div>
      <div class="card-body">
          <p>
              O estatuto é a base de todas as nossas ações e políticas. Ele estabelece os princípios que seguimos, garantindo transparência, integridade e alinhamento aos interesses dos estudantes.
          </p>
      </div>
      <div class="card-footer">
          <a href="<?=HOME?>Estatuto">
              <button type="button" class="btn">
                  <span class="btn-icon"><img src="src/View/img/arrow-right.png" width="20" height="20" alt="Ícone de seta"></span>
                  Ver mais
              </button>
          </a>
      </div>
  </div>
</div>


    <?php
        include_once 'footer.php';
    ?>
  </div>

</body>
</html>