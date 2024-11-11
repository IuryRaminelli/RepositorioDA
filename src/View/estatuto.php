<?php
session_start();
include_once "src/Controller/ConEstatuto.php";
include_once "src/Model/Estatuto.php";

$ConEstatuto = new ConEstatuto();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'Excluir') {
    $idEstatuto = $_POST["id_est"];

    if ($ConEstatuto->deleteEstatuto($idEstatuto)) {
        echo "<script>alert('Excluído com sucesso!'); window.location.href = '" . HOME . "Estatuto';</script>";
        exit();
    } else {
        echo "<script>alert('Erro ao excluir!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repositório Diretório ADS</title>
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

    <h1>Estatuto do Diretório Academico</h1>
    <br>
    <?php
        include_once __DIR__ . '/../Controller/ConEstatuto.php';
        include_once __DIR__ . '/../Model/Estatuto.php';

        $ConEstatuto = new ConEstatuto();
        $lista = $ConEstatuto->selectAllEstatuto();
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Ano</th>
                <th scope="col">Descrição</th>
                <th scope="col">Arquivo</th>
                <?php
                    if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {
                        echo '<th scope="col">Excluir</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($lista as $estatuto){
                    $estatuto = new Estatuto($estatuto);
                    echo '<tr>
                        <td>' . $estatuto->getAno() . '</td>
                        <td>' . $estatuto->getDescricao() . '</td>
                    <td>
                        <a href="' . $estatuto->getArquivo() . '" target="_blank">
                            <button type="submit" class="btn">
                                <img src="src/View/img/documento.png" width="28" height="28" alt="">
                            </button>
                        </a>
                    </td>';
            if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "admin") {
                echo '<td>
                        <form action="' . HOME . 'Estatuto' . '" method="POST" style="display:inline;">
                            <input type="hidden" name="id_est" value="' . $estatuto->getIdEstat() . '">
                            <button type="submit" class="btn" name="acao" value="Excluir" onclick="return confirm(\'Tem certeza que deseja excluir este estatuto?\');">
                                <img src="src/View/img/deletar2.png" width="28" height="28" alt="">
                            </button>
                        </form>
                    </td>';
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <br><br>

    <h3>ESTATUTO DO DAADS</h3>
    <br>
    <h5>Capítulo I - Da Entidade</h5>
    <br>
    Art 1° O Diretório Acadêmico (DAADS), fundado em doze de abril de dois mil e dez sociedade civil, sem fins lucrativos, apartidária, com sede e foro na cidade de São Vicente do Sul - RS, é o órgão de representação estudantil do curso de análise e desenvolvimento de sistema do Instituto Federal de Educação, Ciência e Tecnologia Farroupilha - Campus São Vicente do Sul.
    <br><br>
    Parágrafo Primeiro - O Diretório Acadêmico, a seguir denominado de DAADS, reconhece o Diretório Central dos Estudantes (DCE), a União Estadual dos Estudantes de (Estado) (UEE) e a União Nacional dos Estudantes (UNE), como entidades legítimas de representação dos estudantes, nos seus respectivos níveis de atuação, reservando, face a elas, sua autonomia.
    <br><br>
    Parágrafo Segundo - Toda ação efetuada em nome deste Estatuto e de conformidade com suas cláusulas provém do poder delegado pelos estudantes e em seu nome será exercido.
    <br><br>
    Art. 2° O DA tem por seus objetivos: Reconhecer, estimular e levar adiante a luta dos estudantes do curso de tecnologia em análise e desenvolvimento de sistemas do Instituto Federal de Educação, Ciência e Tecnologia Farroupilha - Campus São Vicente do Sul em defesa de seus interesses:
    <br><br>
    a. Luta pela ampliação da participação da representação estudantil nos órgãos colegiados.
    <br><br>
    b. Organizar e orientar a luta dos estudantes, ao lado do povo, para a construção de uma sociedade livre, democrática e sem exploração.
    <br><br>
    c. Estimular e defender qualquer tipo de movimento ou organização democrática autônoma que estejam orientados no sentido dos objetivos que constam deste estatuto.
    <br><br>
    d. Organizar os estudantes de análise e desenvolvimento de sistemas na luta por uma Instituição crítica, autônoma e democrática.
    <br><br>
    <h5>Capítulo II - Dos elementos da Entidade</h5>
    <br>
    Art. 3° São elementos do DA: I - Seus patrimônios II - Seus sócios
    <br><br>
    Seção I - Do patrimônio
    <br><br>
    Art. 4° O patrimônio da entidade é constituído pelos bens que possui e por outros que venha a adquirir, cujos rendimentos serão aplicados na satisfação dos seus encargos.
    <br><br>
    Art. 5° A receita da entidade é constituída por: Dividendos
    <br><br>
    a. Auxílios e subvenções
    <br><br>
    b. Doações e legados
    <br><br>
    c. Renda auferida em seus Empreendimentos* caso haja
    <br><br>
    Seção II - Dos sócios
    <br><br>
    Art 6° São sócios do DA todos os alunos regularmente matriculados no curso superior de tecnologia em análise e desenvolvimento de sistemas do Instituto Federal de Educação, Ciência e Tecnologia Farroupilha - Campus São Vicente do Sul.
    <br><br>
    Art 7° São direitos dos sócios:
    <br><br>
    a. Votar e ser votado, conforme as disposições do presente estatuto.
    <br><br>
    b. Participar de todas as atividades promovidas pelo DA.
    <br><br>
    c. Reunir-se, associar-se e manifestar-se nas dependências do DA, bem como utilizar-se seu patrimônio para realizar e desenvolver qualquer atividade que não contrarie o presente estatuto.
    <br><br>
    d. Ter acesso aos livros e documentos do DA.
    <br><br>
    Art. 8° São deveres dos sócios:
    <br><br>
    a. Cumprir e fazer cumprir o estabelecimento no presente estatuto, bem como as deliberações das instâncias do DA.
    <br><br>
    b. Lutar pelo fortalecimento da entidade.
    <br><br>
    c. Zelar pelo patrimônio moral e material da entidade.
    <br><br>
    d. Exercer com dedicação e espírito de luta a função de que tenham sido investidos.
    <br><br>
    <h5>Capítulo III - Da organização e do funcionamento da entidade</h5>
    <br>
    Art. 9° São instâncias do DA.
    <br><br>
    a. Assembleia Geral
    <br><br>
    b. Diretoria
    <br><br>
    Seção I Da Assembleia Geral
    <br><br>
    Art. 10° A Assembleia Geral é a instância máxima de deliberação da entidade
    <br><br>
    Art. 11° A Assembleia Geral realiza-se:
    <br><br>
    a. Por iniciativa de, no mínimo, 3 membros da diretoria
    <br><br>
    b. Por requerimento de 1/10 (um décimo) de sócios à Diretoria, que deve proceder imediatamente a convocação. Parágrafo Único - Toda Assembleia Geral será convocada através de Edital afixado na sede do DA. e no recinto do Instituto Farroupilha - Campus São Vicente do Sul, o qual mencionará data, horário, local e pauta.
    <br><br>
    Art. 12° A Assembleia Geral se realiza em duas sessões, diurna e noturna, e delibera com a presença mínima de 1/10 dos sócios.
    <br><br>
    Parágrafo Único - Para efeito de quorum será considerada a soma dos presentes nas duas sessões.
    <br><br>
    Art. 13° São atribuições da Assembleia Geral:
    <br><br>
    a. Aprovar seu regimento interno
    <br><br>
    b. Aprovar reforma dos Estatutos, pelo voto de 50% 1 (cinquenta por cento mais um) dos presentes
    <br><br>
    c. Aprovar e alterar o regulamento eleitoral
    <br><br>
    d. Criar sobre medidas de interesses dos sócios
    <br><br>
    e. Deliberar sobre casos omissos do presente Estatuto Seção II Da Diretoria.
    <br><br>
    Art. 14° A Diretoria é a instância responsável pelo encaminhamento e execução das atividades cotidianas das entidades.
    <br><br>
    Art. 15° Compete à Diretoria:
    <br><br>
    a. Representar os estudantes do curso superior em análise e desenvolvimento de sistemas do Instituto Federal de Educação, Ciência e Tecnologia Farroupilha - Campus São Vicente do Sul.
    <br><br>
    b. Cumprir e fazer cumprir o presente Estatuto, bem como divulgá-lo entre os sócios.
    <br><br>
    c. Respeitar e encaminhar as decisões do DA.
    <br><br>
    d. Planejar e viabilizar a vida econômica da entidade.
    <br><br>
    e. Convocar a Assembleia Geral
    <br><br>
    f. Convocar as eleições para a Diretoria do DA.
    <br><br>
    g. Apresentar relatório de suas atividades e balanço ao término do mandato.
    <br><br>
    Art. 16° A Diretoria compõe-se de 6 membros: Presidente, Vice-Presidente, 1° Secretário, 2° Secretário, 1° Tesoureiro e 2° Tesoureiro.
    <br><br>
    Parágrafo Único - A Diretoria poderá ter um corpo de entidade
    <br><br>
    a. Presidir as eleições da Diretoria.
    <br><br>
    b. Presidir as sessões de Assembleia Geral e da Diretoria II - Do Vice-Presidente
    <br><br>
    c. Substituir, com as mesmas atribuições do Presidente, nos casos de ausência ou impedimento
    <br><br>
    d. Auxiliar o Presidente na coordenação das sessões da Diretoria e da Assembleia Geral
    <br><br>
    III - Do 1° e 2° Secretário
    <br><br>
    e. Secretariar as Assembleias suplentes, variável de 1 a 3 membros.
    <br><br>
    Art. 17° São responsabilidades específicas:
    <br><br>
    a. Do Presidente - representar pública e juridicamente as reuniões da Diretoria
    <br><br>
    b. Lavrar as atas das Assembleias Gerais e assiná-la com o Presidente
    <br><br>
    c. Secretariar as eleições da Diretoria IV - Do 1° e 2° Tesoureiro
    <br><br>
    d. Executar o planejamento econômico aprovado pela Diretoria
    <br><br>
    e. Movimentar, conjuntamente com o Presidente, as contas bancárias da entidade
    <br><br>
    f. Apresentar balancete da entidade
    <br><br>
    g. Rubricar os livros contábeis, pode-se acrescentar outros cargos de acordo com a necessidade do DA.
    <br><br>
    <h5>Capítulo IV - Da eleição da Diretoria</h5>
    <br>
    Art. 18° A Diretoria se elege por maioria simples, através do sufrágio universal, direto e secreto, em relação por chapas, para mandato de um (1) ano.
    <br><br>
    Parágrafo Primeiro - A eleição deverá ser convocada com, no mínimo, um (1) mes de antecedência.
    <br><br>
    Parágrafo Segundo - O prazo máximo para inscrição de chapas é de 48 (quarenta e oito) horas antes da realização das eleições.
    <br><br>
    Parágrafo Terceiro - As chapas devem apresentar, no ato de sua inscrição, os nomes de seus membros efetivos e seus cargos suplentes.
    <br><br>
    Parágrafo Quarto - Sendo a eleição por chapa, não é permitido o voto nominal para cada cargo.
    <br><br>
    Art. 19° A chapa vencedora tomará posse até, no máximo, 15 (quinze) dias após a apuração dos votos.
    <br><br>
    <h5>Capítulo V - Das disposições Gerais e Transitórias</h5>
    <br>
    Art. 20° O presente Estatuto somente poderá ser reformado, total ou parcialmente, se assim for requerido por 1/3 (um terço) dos sócios.
    <br><br>
    Art. 21° A reforma total do Estatuto deverá ser aprovada em Assembleia Geral, convocada especificamente para este fim e com “quorum” mínimo de 50% 1 (cinquenta por cento mais um) dos sócios.
    <br><br>
    Art. 22° Os sócios não respondem, nem mesmo subsidiariamente, pelas obrigações contraídas em nome do DA.
    <br><br>
    Art. 23° Os diretores não são pessoalmente responsáveis pelas obrigações contraídas em nome do DA., em virtude de ato regular de gestão.
    <br><br>
    Art. 24° Não é admitido o voto por procuração.
    <br><br>
    Art. 25° O presente Estatuto entra em vigor na data de sua aprovação pela Assembleia Geral. São Vicente do Sul, doze de abril de 2010.

    <br><br>
    <?php
      include_once 'footer.php';
    ?>
  </div>

</body>

</html>