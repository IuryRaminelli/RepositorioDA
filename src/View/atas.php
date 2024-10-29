<?php
session_start();
include_once "src/Controller/ConAtas.php";
include_once "src/Model/Atas.php";

$ConAtas = new ConAtas();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
    $idAta = $_POST["id_ata"];

    if ($ConAtas->deleteAta($idAta)) {
        echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Atas';</script>";
        exit();
    } else {
        echo "<script>alert('Erro ao excluir!');</script>";
    }
}

if (isset($_SESSION["USER_LOGIN"]) && ($_SESSION["USER_LOGIN"] != "admin" || $_SESSION["USER_LOGIN"] == "admin")) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <?php
        $lista = $ConAtas->selectAllAtas();
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Dia</th>
                <th scope="col">Descrição</th>
                <th scope="col">Arquivo</th>
                <?php
                    if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {
                        echo '<th scope="col">Excluir</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($lista as $atas) {
            $atas = new Atas($atas);
            echo '
                <tr>
                    <td>' . $atas->getDia() . '</td>
                    <td>' . $atas->getDescricao() . '</td>
                    <td>
                        <a href="' . $atas->getArquivo() . '" target="_blank">
                            <button type="submit" class="btn">
                                <img src="src/View/img/pdf.png" width="28" height="28" alt="">
                            </button>
                        </a>
                    </td>';
            if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {
                echo '<td>
                        <form action="' . HOME . 'Atas' . '" method="POST" style="display:inline;">
                            <input type="hidden" name="id_ata" value="' . $atas->getIdAtas() . '">
                            <button type="submit" class="btn" name="acao" value="Excluir" onclick="return confirm(\'Tem certeza que deseja excluir esta ata?\');">
                                <img src="src/View/img/deletar2.png" width="28" height="28" alt="">
                            </button>
                    </td>';
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <br><br>
    <?php include_once 'footer.php'; ?>
</div>
</body>
</html>

<?php
} else {
    echo "<h1>404 Não possui acesso.</h1>";
}
?>
