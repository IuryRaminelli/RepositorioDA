<?php
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
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '" . HOME . "Cadastro';</script>";
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
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php 
}else{
    echo "<h1>404 Não possui acesso.</h1>";
}
?>