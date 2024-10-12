<?php
              if (session_status() == PHP_SESSION_NONE) {
                session_start();
              }
if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "administrador@teste.com") {

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
    ?>
    <div class="container">

        <br><br><br><br>

        <?php
            include_once __DIR__ . '/../Controller/ConAtas.php';
            include_once __DIR__ . '/../Model/Atas.php';
            $ConAtas = new ConAtas();
            $lista = $ConAtas->selectAllAtas();
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Arquivo</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($lista as $atas){
                        $atas = new Atas($atas);
                        echo '
                        <tr>
                            <th>' . $atas->getDia() . '</th>
                            <th>' . $atas->getDescricao() . '</th>
                            <th>
                                <a href="'. $atas->getArquivo() .'" target="_blank">
                                    <img src="src/View/img/pdf.png" width="28" height="28" alt="">
                                </a>
                            </th>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
        <?php include_once 'footer.php'; ?>
    </div>
</body>
</html>

<?php
}else{
    echo "<h1>404 Não possui acesso.</h1>";
}
?>