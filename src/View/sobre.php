<?php
    include_once __DIR__ . '/../Rotas/Constantes.php';
?>

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

    <br><br>

    <div class="row">
      <h1>Sobre nós</h1>
      <p>Bem-vindo ao Diretório Acadêmico Turing! Nosso objetivo é promover a integração dos alunos, fornecer suporte acadêmico e
        fomentar o crescimento profissional através de eventos, palestras e projetos que incentivam o desenvolvimento de habilidades técnicas e comportamentais.</p>
    </div>

    <div class="row mt-5">
      <div class="col-md-4">
        <h2>Missão</h2>
        <p>Ser um ponto de apoio para os alunos, facilitando o aprendizado contínuo e promovendo um ambiente de colaboração para o desenvolvimento de soluções tecnológicas
          inovadoras.</p>
      </div>
      <div class="col-md-4">
        <h2>Valores</h2>
        <ul>
          <li><strong>Inovação:</strong> Estimulamos a criatividade e o pensamento crítico para o desenvolvimento de novas soluções tecnológicas.</li>
          <li><strong>Colaboração:</strong> Valorizamos o trabalho em equipe e a troca de conhecimento entre alunos, professores e o mercado.</li>
          <li><strong>Excelência:</strong> Buscamos a melhoria contínua, tanto no âmbito acadêmico quanto no desenvolvimento profissional dos alunos.</li>
        </ul>
      </div>
      <div class="col-md-4">
        <h2>Visão</h2>
        <p>Ser reconhecido como um diretório de excelência, referência em inovação tecnológica e na preparação de profissionais capacitados para o mercado de trabalho.</p>
      </div>
    </div>

    <div class="row mt-5">
      <h2>Proposta</h2>
      <p>Oferecemos aos alunos atividades extracurriculares, como workshops, hackathons, e palestras com profissionais renomados da área.
        Nosso objetivo é complementar a formação acadêmica com experiências práticas e oportunidades de networking, preparando os alunos para os desafios do mercado de trabalho.</p>
    </div>
    <?php
        include_once 'footer.php';
      ?>
  </div>
</body>

</html>