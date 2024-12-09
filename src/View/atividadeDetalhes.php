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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            object-fit: contain;
            display: block;
            cursor: pointer;
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

        .modal-dialog { 
            max-width: 80%;
            margin: 30px auto;
        }

        .modal-body img { 
            width: 100%;
            height: auto;
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

        <h1><?= htmlspecialchars($atividade->getNome()) ?></h1>
        <p class="card-text"><small class="text-muted text-muted-custom">Dia <?= $dataFormatada;?> em <?= htmlspecialchars($atividade->getLocal()); ?></small></p>

        <br>

        <h5 class="card-text"><?= htmlspecialchars($atividade->getDescricao()); ?></h5>

        <br>

        <div class="row atividade-imagens-container align-items-center">
            <?php foreach ($imagens as $index => $imagem): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="image-container">
                        <img src="<?= $imagem->getArquivo(); ?>" class="img-fluid rounded shadow-sm" alt="<?= htmlspecialchars($atividade->getNome()) ?>" data-toggle="modal" data-target="#imageModal<?= $index ?>">
                    </div>
                </div>

                <div class="modal fade" id="imageModal<?= $index ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= htmlspecialchars($atividade->getNome()) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= $imagem->getArquivo(); ?>" class="img-fluid" alt="<?= htmlspecialchars($atividade->getNome()) ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="details-footer">
            <a href="<?= HOME ?>Atividade" class="back-link">&larr; Voltar para a lista de atividades</a>
        </div>
        
        <?php include_once 'footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
