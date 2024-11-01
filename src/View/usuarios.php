<?php
session_start();
include_once "src/Controller/ConUser.php";
include_once "src/Model/User.php";

$ConUser = new ConUser();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
    $idAta = $_POST["id_user"];

    if ($ConUser->deleteUser($idAta)) {
        echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Usuarios';</script>";
        exit();
    } else {
        echo "<script>alert('Erro ao excluir!');</script>";
    }
}

if (isset($_SESSION["USER_LOGIN"]) && ($_SESSION["USER_LOGIN"] == "admin")) {
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
        $lista = $ConUser->selectAllUser();
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">Telefone</th>
                <th scope="col">Tipo</th>
                <?php
                    if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {
                        echo '<th scope="col">Excluir</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($lista as $user) {
            $user = new User($user);
            echo '
                <tr>
                    <td>' . $user->getNome() . '</td>
                    <td>' . $user->getEmail() . '</td>
                    <td>' . $user->getSenha() . '</td>
                    <td>' . $user->getTelefone() . '</td>
                    <td>' . $user->getTipo() . '</td>
                    
                    ';
            if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {
                echo '<td>
                        <form action="' . HOME . 'Usuarios' . '" method="POST" style="display:inline;">
                            <input type="hidden" name="id_user" value="' . $user->getIdUser() . '">
                            <button type="submit" class="btn" name="acao" value="Excluir" onclick="return confirm(\'Tem certeza que deseja excluir este usuário?\');">
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
