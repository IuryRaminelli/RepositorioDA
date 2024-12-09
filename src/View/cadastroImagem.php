<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && ($_SESSION["USER_LOGIN"] == "admin" || isset($_SESSION["USER_LOGIN"]))) {

    include_once __DIR__ . "/../Controller/ConImagem.php";
    include_once __DIR__ . "/../Model/Imagem.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if (isset($_POST['cadastro']) && isset($_FILES['arquivo'])) {
        if (isset($_SESSION['nome'])) {
            $nomeAtividade = $_SESSION['nome'];
            $target_dir = "src/View/img/";
            $ConImagem = new ConImagem();

            // Processando múltiplos arquivos de uma vez
            $arquivos = $_FILES['arquivo'];

            foreach ($arquivos['name'] as $key => $name) {
                $target_file = $target_dir . basename($name);
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                    if (move_uploaded_file($arquivos['tmp_name'][$key], $target_file)) {
                        $arrayCIA = array(
                            "idativ" => $nomeAtividade,
                            "arquivo" => $target_file,
                        );

                        $Imagem = new Imagem($arrayCIA);
                        $ConImagem->insertImagem($Imagem);
                    } else {
                        echo "<script>alert('Erro ao enviar uma das imagens.');</script>";
                        exit;
                    }
                } else {
                    echo "<script>alert('Tipo de arquivo não permitido.');</script>";
                    exit;
                }
            }

            echo "<script>alert('Atividade cadastrada com sucesso.'); window.location.href = '" . HOME . "CadastroAtividade';</script>";
            exit;
        } else {
            echo "<script>alert('Nome da atividade não encontrado.'); window.location.href = '" . HOME . "CadastroImagem';</script>";
            exit; 
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

    <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/View/img/headernovo.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
                </div>
            </div>
        </div>

    <br><br>
    
    <h1 align="center">CADASTRAR ATIVIDADE</h1><br>
    <div class="container" style="width: 40%;">
        <form align="center" action="<?= HOME ?>CadastroImagem" method="POST" enctype="multipart/form-data">
            <label for="arquivo">Imagens</label>
            <div id="file-container">
                <div class="d-flex align-items-center mb-2">
                    <!-- O campo 'multiple' permite selecionar várias imagens ao mesmo tempo -->
                    <input type="file" class="form-control me-2" name="arquivo[]" multiple />
                </div>
            </div>
            <input type="submit" value="Cadastrar" class="btn" name="cadastro" />
        </form>
    </div>

    <?php include_once 'footer.php'; ?>
  </div>

</body>
</html>

<?php 
} else {
    echo "<h1>404 Não possui acesso.</h1>";
}
?>
