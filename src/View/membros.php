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
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" 
                aria-controls="v-pills-home" aria-selected="true">2024-2025</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" 
                aria-controls="v-pills-profile" aria-selected="false">2023-2024</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" 
                aria-controls="v-pills-messages" aria-selected="false">2022-2023</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" 
                aria-controls="v-pills-settings" aria-selected="false">2021-2022</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <br>
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <?php
                        /* FAZER COM O BANCO DE DADOS */
                    ?>
                    <h3>Presidente:</h3>
                    <b>Rafael Müller Tischler</b><br>

                    <h3>Vice-presidente</h3>
                    <b>Murilo Brauner Ziani</b>

                    <h3>Tesoureiro(a)</h3>
                    <b>João Vitor Martins San Martin</b><br>

                    <h3>Vice-tesoureiro(a)</h3>
                    <b>João Miguel Zucuni Ugulini</b><br>

                    <h3>Secretário(a)</h3>
                    <b>Carolini Bassan Carlé</b><br>

                    <h3>Vice-secretário(a)</h3>
                    <b>Maurício Carvalho Cogo</b><br>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    .
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    ...
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    ...
                </div>
            </div>
        </div>


        <?php
            include_once 'footer.php';
        ?>
    </div>
</body>
</html>