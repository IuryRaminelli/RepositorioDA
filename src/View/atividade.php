<?php
session_start();
include_once "src/Controller/ConAtividade.php";
include_once "src/Model/Atividade.php";

$ConAtividade = new ConAtividade();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
    $idAtividade = $_POST["id_ativ"];

    if ($ConAtividade->deleteAtividade($idAtividade)) {
        echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Atividade';</script>";
        exit();
    } else {
        echo "<script>alert('Erro ao excluir!');</script>";
    }
}

$limite = 6;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$totalAtividades = $ConAtividade->contarAtividades();

$totalPaginas = ceil($totalAtividades / $limite);

$atividades = $ConAtividade->selectAtividadesComPaginacao($pagina, $limite);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositório Diretório ADS</title>
    <style>
.carousel-inner {
    height: 300px;
}

.carousel-inner img {
    width: 100%;
    height: auto;
    max-height: 300px;
    object-fit: scale-down;
    display: block;
    margin: auto;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: #000;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    border: 2px solid #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: #fff;
    transform: scale(1.1);
}

.carousel-first .carousel-inner {
    height: auto;
}

.carousel-first .carousel-inner img {
    max-height: none;
}

.card-custom {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.card-custom:hover {
    transform: scale(1.02);
}

.card-title-custom {
    font-size: 1.5rem;
    color: #333;
}

.text-muted-custom {
    color: #888;
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
        <div id="carouselExampleSlidesOnly" class="carousel carousel-first" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/View/img/headernovo.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
                </div>
            </div>
        </div>
        <br><br>
        <h1>Atividades</h1>
        <?php
            include_once __DIR__ . '/../Controller/ConImagem.php';
            include_once __DIR__ . '/../Model/Imagem.php';

            $ConImagem = new ConImagem();
        ?>
        <div class="row">
            <?php foreach ($atividades as $atividade): ?>
                <?php $atividade = new Atividade($atividade); ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-custom h-100">
                        <a href="<?= HOME ?>AtividadeDetalhes?id=<?= $atividade->getIdAtiv(); ?>" style="text-decoration: none;">
                            <div id="carouselExampleControls<?= $atividade->getIdAtiv(); ?>" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php 
                                    $imagens = $ConImagem->selectAllImagem($atividade->getNome());
                                    foreach ($imagens as $index => $imagem): 
                                        $imagem = new Imagem($imagem); 
                                        $dataOriginal = $atividade->getDia();
                                        $data = DateTime::createFromFormat('Y-m-d', $dataOriginal);
                                        $dataFormatada = $data->format('d/m/Y');
                                    ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?= $imagem->getArquivo(); ?>" class="d-block w-100" alt="<?= htmlspecialchars($atividade->getNome()); ?>">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls<?= $atividade->getIdAtiv(); ?>" data-bs-slide="prev">
                                    <span class="btn carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls<?= $atividade->getIdAtiv(); ?>" data-bs-slide="next">
                                    <span class="btn carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </a>
                        <div class="card-body card-body-custom">
                            <a href="<?= HOME ?>AtividadeDetalhes?id=<?= $atividade->getIdAtiv(); ?>" style="text-decoration: none;">
                                <h3 class="card-title card-title-custom"><?= htmlspecialchars($atividade->getNome()); ?></h3>
                            </a>
                            <h5 class="card-text">
                                <?php
                                $descricao = htmlspecialchars($atividade->getDescricao());
                                if (strlen($descricao) > 50) {
                                    $descricao = substr($descricao, 0, 50) . '...';
                                }
                                echo $descricao;
                                ?>
                            </h5>
                            <p class="card-text">em <?= htmlspecialchars($atividade->getLocal()); ?></p>
                            <p class="card-text"><small class="text-muted text-muted-custom"><?= $dataFormatada;?></small></p>
                            <?php if (isset($_SESSION["USER_LOGIN"])): ?>
                                <p class="card-text">
                                    <small class="text-muted text-muted-custom">
                                        <form action="<?= HOME ?>Atividade" method="POST" style="display:inline;">
                                            <input type="hidden" name="id_ativ" value="<?= $atividade->getIdAtiv(); ?>">
                                            <button type="submit" class="btn" name="acao" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta atividade?');">
                                                <img src="src/View/img/deletar2.png" width="28" height="28" alt="">
                                            </button>
                                        </form>
                                    </small>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($pagina > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?= $pagina - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?= ($i == $pagina) ? 'active' : ''; ?>">
                        <a class="page-link" href="?pagina=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($pagina < $totalPaginas): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?= $pagina + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <br><br>
        <?php
            include_once 'footer.php';
        ?>
    </div>
</body>
</html>
