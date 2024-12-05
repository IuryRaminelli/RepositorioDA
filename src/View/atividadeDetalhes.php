<?php
session_start();
include_once "src/Controller/ConAtividade.php";
include_once "src/Controller/ConImagem.php";
include_once "src/Model/Atividade.php";
include_once "src/Model/Imagem.php";

if (isset($_GET['id'])) {
    $idAtividade = $_GET['id'];
    $ConAtividade = new ConAtividade();
    $atividade = $ConAtividade->selectAtividadeById($idAtividade);
    
    if ($atividade) {
        $ConImagem = new ConImagem();
        $imagens = $ConImagem->selectAllImagem($atividade->getNome());
    } else {
        echo "Atividade não encontrada.";
        exit;
    }
} else {
    echo "ID da atividade não fornecido.";
    exit;
}

$dataOriginal = $atividade->getDia(); // Exemplo de data no formato 'YYYY-MM-DD'
$data = DateTime::createFromFormat('Y-m-d', $dataOriginal); // Cria um objeto DateTime
$dataFormatada = $data->format('d/m/Y'); // Formata a data para 'DD/MM/YYYY'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade - <?= htmlspecialchars($atividade->getNome()) ?></title>
    <style>
        .atividade-imagens-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .atividade-imagens-container .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 200px;
        }

        .atividade-imagens-container img {
            width: auto;
            height: 100%;
            object-fit: contain; /* Mantém a proporção da imagem */
            display: block;
        }

        .details-footer {
            margin-top: 30px;
        }

        .back-link {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #007bff;
        }

        .back-link:hover {
            text-decoration: underline;
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
            <div id="carouselExampleSlidesOnly" class="carousel carousel-first" data-bs-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/View/img/logo-diretorio.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
                </div>
                </div>
            </div>
        </div>

        <br><br>

        <h1><?= htmlspecialchars($atividade->getNome()) ?></h1>
        <p class="card-text"><small class="text-muted text-muted-custom">Dia <?= $dataFormatada;?> em <?=$atividade->getLocal();?></small></p>

        <br>

        <h5 class="card-text"><?= $atividade->getDescricao(); ?></h5>

        <br>

        <div class="row atividade-imagens-container" style="align-items: center;">
            <?php foreach ($imagens as $index => $imagem): ?>
                <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                    <div class="image-container">
                        <img src="<?= $imagem->getArquivo(); ?>" class="img-fluid" alt="<?= htmlspecialchars($atividade->getNome()) ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="details-footer">
            <a href="<?= HOME ?>Atividade" class="back-link">&larr; Voltar para a lista de atividades</a>
        </div>
        
        <?php include_once 'footer.php'; ?>
    </div>
</body>
</html>
