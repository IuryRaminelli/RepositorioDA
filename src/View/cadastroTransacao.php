<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "administrador@teste.com" || $_SESSION["USER_LOGIN"] == "administrador@teste.com") {

    include_once __DIR__ . "/../Controller/ConTransacao.php";
    include_once __DIR__ . "/../Model/Transacao.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';

    if (isset($_POST['cadastro'])) {
        $arrayUser = array(
            "quantidade" => $_POST['quantidade'],
            "dia" => $_POST['dia'],
            "descricao" => $_POST['descricao'],
        );

        $ConTransacao = new ConTransacao();
        $Transacao = new Transacao($arrayUser);

        if ($ConTransacao->insertTransacao($Transacao)) {
            echo "<script>alert('cadastrado com sucesso!'); window.location.href = '" . HOME . "CadastroTransacao';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar.'); window.location.href = '" . HOME . "CadastroTransacao';</script>";
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
<?php 
      include_once 'header.php';
      include_once 'vlibras.php';
?>
    <div class="container">
    <br><br><br><br>
    
    <h1 align="center">CADASTRAR TRANSAÇÃO</h1><br>
    <div class="container" style="width: 40%;">
    <form align="center" action="<?= HOME ?>CadastroTransacao" method="POST" enctype="multipart/form-data">
                <label for="quantidade">Valor</label>
                <input type="number" class="form-control" name="quantidade"/><br>
                <label for="dia">Data</label>
                <input type="date" class="form-control" name="dia" autofocus="true"/><br>
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" placeholder="Digite uma Descrição"/><br>
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