<?php
    include_once __DIR__ . '/../Rotas/Constantes.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
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

    <h1>Fale Conosco</h1>
    <p>Estamos aqui para ajudar! Se você tiver alguma dúvida, sugestão ou precisar de suporte, entre em contato conosco através do formulário abaixo.</p>

    <div class="row mt-5">
      <form>
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Seu nome">
        <br>
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" placeholder="Seu e-mail">
        <br>
        <label for="mensagem">Mensagem</label>
        <textarea class="form-control" id="mensagem" rows="5" placeholder="Digite sua mensagem"></textarea>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
      </form>
    </div>

    <?php
        include_once 'footer.php';
      ?>
  </div>
</body>

</html>