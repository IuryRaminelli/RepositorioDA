<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "administrador@teste.com") {

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
            echo "<script>alert('Todos os campos são obrigatórios.'); window.location.href = '" . HOME . "CadastroUser';</script>";
            exit;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('E-mail inválido.'); window.location.href = '" . HOME . "CadastroUser';</script>";
            exit;
        }

        $ConUser = new ConUser();
        $User = new User($arrayUser);

        if ($ConUser->insertUser($User)) {
            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '" . HOME . "CadastroUser';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar usuário.'); window.location.href = '" . HOME . "CadastroUser';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <div class="container">
    <br><br><br><br>
    <div class="container" style="width: 40%;">
    <form align="center" action="<?= HOME ?>CadastroUser" method="POST">
                <h1>CADASTRAR USUÁRIO</h1><br>
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" autofocus="true"/><br>
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="Digite seu e-mail"/><br>
                <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" name="telefone" placeholder="Digite seu telefone"/><br>
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha"/><br>
                <input type="submit" value="Cadastrar" class="btn" name="cadastro" />
            </form>
    </div>
    <?php include_once 'footer.php'; ?>
</div>
</body>
</html>

<?php 
}else{
    echo "<h1>404 Não possui acesso.</h1>";
}
?>