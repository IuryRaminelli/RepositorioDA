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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
  <title>Repositório Diretório ADS</title>
  <style>
        .social-links {
            margin-top: 15px;
        }
        .social-links a {
            display: inline-block;
            margin: 10px;
            padding: 10px 15px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .social-links a.instagram {
            background-color: #E1306C;
        }
        .social-links a.facebook {
            background-color: #3b5998;
        }
        .social-links a:hover {
            color: white;
            opacity: 0.8;
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

    <h1>Fale Conosco</h1>
    <p>Estamos aqui para ajudar! Se você tiver alguma dúvida, sugestão ou precisar de suporte, entre em contato conosco através de algum dos perfis.</p>

    <br>
    <h3>Diretório</h3>
    <div class="social-links">
      <a href="https://www.facebook.com/diretorioads/" class="facebook"><i class="fab fa-facebook"></i> Facebook</a>
    </div>

    <br>
    <h3>Curso</h3>
    <div class="social-links">
      <a href="https://www.instagram.com/ads.svs/" class="instagram"><i class="fab fa-instagram"></i> Instagram</a>
      <a href="https://www.facebook.com/ADS.IFFar.SVS/" class="facebook"><i class="fab fa-facebook"></i> Facebook</a>
    </div>

    <?php
      include_once 'footer.php';
    ?>
  </div>
</body>

</html>