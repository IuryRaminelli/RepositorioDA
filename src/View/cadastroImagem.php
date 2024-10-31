<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin") {

    include_once __DIR__ . "/../Controller/ConImagem.php";
    include_once __DIR__ . "/../Model/Imagem.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if (isset($_POST['cadastro']) && isset($_FILES['arquivo'])) {
        if (isset($_SESSION['nome'])) {
            $nomeAtividade = $_SESSION['nome'];
            $target_dir = "src/View/img/";
            $ConImagem = new ConImagem();
    
            foreach ($_FILES['arquivo']['name'] as $key => $name) {
                $target_file = $target_dir . basename($name);
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
                if (move_uploaded_file($_FILES['arquivo']['tmp_name'][$key], $target_file)) {
                    $arrayCIA = array(
                        "idativ" => $nomeAtividade,
                        "arquivo" => $target_file,
                    );
    
                    $Imagem = new Imagem($arrayCIA);
                    $ConImagem->insertImagem($Imagem);
                } else {
                    echo "<script>alert('Erro ao enviar uma das imagens.');</script>";
                }
            }
            echo "<script>alert('Imagens cadastradas com sucesso.'); window.location.href = '" . HOME . "CadastroImagem';</script>";
            header("Location: " . HOME . "CadastroAtividade");
        } else {
            echo "<script>alert('Nome da atividade não encontrado.'); window.location.href = '" . HOME . "CadastroImagem';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Imagens</title>
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
    
    <h1 align="center">CADASTRAR ATIVIDADE</h1><br>
    <div class="container" style="width: 40%;">
        <form align="center" action="<?= HOME ?>CadastroImagem" method="POST" enctype="multipart/form-data">
            <label for="arquivo">Imagem</label>
            <div id="file-container">
                <div class="d-flex align-items-center mb-2">
                    <input type="file" class="form-control me-2" name="arquivo[]" />
                    <button type="button" class="btn p-0" onclick="addFileInput()">
                        <img src="src/View/img/maisbranco.png" width="28" height="28" alt="">
                    </button>
                </div>
            </div>
            <input type="submit" value="Cadastrar" class="btn" name="cadastro" />
        </form>
    </div>

    <script>
    function addFileInput() {
        const fileContainer = document.getElementById('file-container');
        const newFileInput = document.createElement('div');
        newFileInput.classList.add('d-flex', 'align-items-center', 'mb-2');

        newFileInput.innerHTML = `
        <input type="file" class="form-control me-2" name="arquivo[]" />
        <button type="button" class="btn p-0" onclick="addFileInput()">
            <img src="src/View/img/maisbranco.png" width="28" height="28" alt="">
        </button>

        `;

        fileContainer.appendChild(newFileInput);
    }
    </script>

    <?php include_once 'footer.php'; ?>
</div>
</body>
</html>

<?php 
} else {
    echo "<h1>404 Não possui acesso.</h1>";
}
?>
