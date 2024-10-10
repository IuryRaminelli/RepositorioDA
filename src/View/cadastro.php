<?php
include_once __DIR__ . "/../Controller/ConUser.php";
include_once __DIR__ . "/../Model/User.php";
include_once __DIR__ . '/../Rotas/Constantes.php';

if (isset($_POST['cadastro'])) {
    $arrayUser = array(
        "nome" => $_POST['nome'],
        "email" => $_POST['email'],
        "senha" => $_POST['senha'],
        "telefone" => $_POST['telefone'],
    );

    // Validação
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telefone']) || empty($_POST['senha'])) {
        echo "<script>alert('Todos os campos são obrigatórios.'); window.location.href = '" . HOME . "Cadastro';</script>";
        exit;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('E-mail inválido.'); window.location.href = '" . HOME . "Cadastro';</script>";
        exit;
    }

    $ConUser = new ConUser();
    $User = new User($arrayUser);

    if ($ConUser->insertUser($User)) {
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '" . HOME . "Login';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar usuário.'); window.location.href = '" . HOME . "Cadastro';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="src/View/css/teste.css">
</head>

<body>
    <?php include_once 'header.php'; ?>

    <div class="container">
        <div class="container" style="width: 45%;">
            <br><br><br><br>
            <div class="row mt-4">
                <form action="<?= HOME ?>Cadastro" method="POST" class="formLogin">
                    <h1>CADASTRO</h1>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" placeholder="Digite seu nome" autofocus="true" />
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="Digite seu e-mail" />
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" placeholder="Digite seu telefone" />
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" />
                    <input type="submit" value="Cadastrar" class="btn" name="cadastro" />
                </form>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </div>
</body>
</html>
