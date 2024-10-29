<?php
session_start();
include_once "src/Controller/ConEstatuto.php";
include_once "src/Model/Estatuto.php";

$ConEstatuto = new ConEstatuto();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
    $idEstatuto = $_POST["id_est"];

    if ($ConEstatuto->deleteEstatuto($idEstatuto)) {
        echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Estatuto';</script>";
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
  <title>Repositório Diretório ADS</title>
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

    <h1>Estatuto do Diretório Academico</h1>
    <br>
    <?php
        include_once __DIR__ . '/../Controller/ConEstatuto.php';
        include_once __DIR__ . '/../Model/Estatuto.php';

        $ConEstatuto = new ConEstatuto();
        $lista = $ConEstatuto->selectAllEstatuto();
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Ano</th>
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
                // Exibe a lista de transações
                foreach ($lista as $estatuto){
                    $estatuto = new Estatuto($estatuto);
                    echo '<tr>
                        <td>' . $estatuto->getAno() . '</td>
                        <td>' . $estatuto->getDescricao() . '</td>
                        <td>
                            <a href="'. $estatuto->getArquivo() .'" target="_blank">
                                <img src="src/View/img/pdf.png" width="28" height="28" alt="">
                            </a>';
            if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {
                echo '<td>
                        <form action="' . HOME . 'Estatuto' . '" method="POST" style="display:inline;">
                            <input type="hidden" name="id_est" value="' . $estatuto->getIdEstat() . '">
                            <button type="submit" name="acao" value="Excluir" onclick="return confirm(\'Tem certeza que deseja excluir esta ata?\');">
                                <img src="src/View/img/deletar.png" width="28" height="28" alt="">
                            </button>
                        </form>
                    </td>';
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <br><br>

    <h1>Atual</h1>
    <br>
    ...

    <br><br>
    <?php
      include_once 'footer.php';
    ?>
  </div>

</body>

</html>
<?php
} else {
    echo "<h1>404 Não possui acesso.</h1>";
}
?>