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
            
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        session_start();
      include_once 'header.php';
      include_once 'vlibras.php';
      include_once __DIR__ . '/../Controller/ConMembros.php';

      $conMembros = new ConMembros();
      $membros = $conMembros->selectAllMembros();
      
      $anos = [];
      foreach ($membros as $membro) {
          $anos[$membro['ano']][] = $membro;
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
        $idMembros = $_POST["id_membro"];
    
        if ($conMembros->deleteMembros($idMembros)) {
            echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Membros';</script>";
            exit();
        } else {
            echo "<script>alert('Erro ao excluir!');</script>";
        }
    }
    ?>

    <div class="container">
        
        <br><br><br><br>

        <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/View/img/headernovo.png" class="d-block w-100" alt="Logo Diretório Acadêmico Turing">
                </div>
            </div>
        </div>

        <br><br><h1>Membros</h1>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php foreach ($anos as $ano => $membrosDoAno): ?>
        <li class="nav-item" role="presentation">
            <button 
                class="nav-link <?= $ano === array_key_first($anos) ? 'active' : '' ?>" 
                id="tab-<?= $ano ?>" 
                data-bs-toggle="tab" 
                data-bs-target="#ano-<?= $ano ?>" 
                type="button" 
                role="tab" 
                aria-controls="ano-<?= $ano ?>" 
                aria-selected="<?= $ano === array_key_first($anos) ? 'true' : 'false' ?>">
                <?= $ano ?>
            </button>
        </li>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach ($anos as $ano => $membrosDoAno): ?>
        <div 
            class="tab-pane <?= $ano === array_key_first($anos) ? 'active' : '' ?>" 
            id="ano-<?= $ano ?>" 
            role="tabpanel" 
            aria-labelledby="tab-<?= $ano ?>">
            <?php foreach ($membrosDoAno as $membro): ?>
                <h3>Presidente:</h3>
                <b><?= htmlspecialchars($membro['presidente']) ?></b>
                <br><br>
                <h3>Vice-presidente:</h3>
                <b><?= htmlspecialchars($membro['vicep']) ?></b>
                <br><br>

                <h3>Secretário(a):</h3>
                <b><?= htmlspecialchars($membro['secretario']) ?></b>
                <br><br>

                <h3>Vice-secretário(a):</h3>
                <b><?= htmlspecialchars($membro['vices']) ?></b>
                <br><br>

                <h3>Tesoureiro(a):</h3>
                <b><?= htmlspecialchars($membro['tesoureiro']) ?></b>
                <br><br>

                <h3>Vice-tesoureiro(a):</h3>
                <b><?= htmlspecialchars($membro['vicet']) ?></b>

                <?php if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin"): ?>
                    <br><br>
                    <form action="<?= HOME ?>Membros" method="POST" style="display:inline;">
                        <input type="hidden" name="id_membro" value="<?= $membro['id']; ?>">
                        <button type="submit" class="btn" name="acao" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta gestão?');">
                            <img src="src/View/img/deletar2.png" width="28" height="28" alt="Excluir">
                        </button>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
            
        </div>
    <?php endforeach; ?>
    
</div>

        <?php
            include_once 'footer.php';
        ?>
    </div>
</body>
</html>