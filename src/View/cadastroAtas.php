<?php
session_start();
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "administrador@teste.com") {

    include_once __DIR__ . "/../Controller/ConAtas.php";
    include_once __DIR__ . "/../Model/Atas.php";
    include_once __DIR__ . '/../Rotas/Constantes.php';


    if(isset($_POST['cadastro'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["arquivo"])){
            $target_dir = "src/View/img/";
            $target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        
            if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)){
                
                $arrrayCIA = array("dia" => $_POST['dia'],
                                "descricao" => $_POST['descricao'],
                                "arquivo" => $target_file
                );


                $ConAtas = new ConAtas();
                $Atas = new Atas($arrrayCIA);


                $ConAtas->insertAtas($Atas);
                echo "<script>alert('Ata cadastrada com sucesso.'); window.location.href = '" . HOME . "CadastroAtas';</script>";
            }else {
                echo "<script>alert('Desculpe, houve um erro ao enviar seu arquivo.'); window.location.href = '" . HOME . "CadastroAtas';</script>";
            }
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
<?php include_once 'header.php'; ?>
    <div class="container">
    <br><br><br><br>
    <div class="container" style="width: 40%;">
    <form align="center" action="<?= HOME ?>CadastroAtas" method="POST" enctype="multipart/form-data">
                <h1>CADASTRAR ATAS</h1><br>
                <label for="dia">Data</label>
                <input type="date" class="form-control" name="dia" autofocus="true"/><br>
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" placeholder="Digite uma Descrição"/><br>
                <label for="arquivo">Arquivo</label>
                <input type="file" class="form-control" name="arquivo"/><br>
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