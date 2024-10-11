<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tab-pane {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            
            text-align: center; /* Centraliza o texto */
        }
    </style>
</head>
<body>
    <?php
      include_once 'header.php';
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

        <h1>Membros</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">2024-2025</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">2023-2024</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">2022-2023</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">2021-2022</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php
                    /* FAZER COM O BANCO DE DADOS */
                ?>
                <h3>Presidente:</h3>
                <b>Rafael Müller Tischler</b>
                <br><br>

                <h3>Vice-presidente</h3>
                <b>Murilo Brauner Ziani</b>
                <br><br>

                <h3>Tesoureiro(a)</h3>
                <b>João Vitor Martins San Martin</b>
                <br><br>

                <h3>Vice-tesoureiro(a)</h3>
                <b>João Miguel Zucuni Ugulini</b>
                <br><br>

                <h3>Secretário(a)</h3>
                <b>Carolini Bassan Carlé</b>
                <br><br>

                <h3>Vice-secretário(a)</h3>
                <b>Maurício Carvalho Cogo</b>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                ...
            </div>
            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                ...
            </div>
            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                ...
            </div>
        </div>

        <?php
            include_once 'footer.php';
        ?>
    </div>
</body>
</html>