<?php
include_once __DIR__ . '/Constantes.php';

/**************************************************************************************************************************
 **************************************************************************************************************************
 ****************                CLASSE PARA CRIAÇÃO DE ROTAS (URL AMIGÁGEIS) EM PHP                   ********************
 ****************                                GUSTAVO RISSETTI                                      ********************
 ****************                                      2021                                            ******************** 
 **************************************************************************************************************************
 **************************************************************************************************************************
 
 Sugestão de organização de diretórios do projeto para a utilização correta dessa Classe de Rotas Amigáveis em PHP:
	
	NOME_PROJETO
		src
			Conexao
			Controller
			Model
			Rotas
				Constantes.php
				ConfigRotas.php
				Rotas.php				
			View
		index.php
		.htaccess

   
 Para utilização desta classe, deve-se primeiramente criar um arquivo .htaccess no diretório principal do projeto, para 
 redirecionar todas as requisições para o index.php, contendo as seguintes linhas:
 	# Habilitando o modo Rewrite
 	RewriteEngine on
 	#Regras de redirecionamento.
 	RewriteRule !\.(js|ico|txt|gif|jpg|png|css)$ index.php

	
 Dentro do subdiretorio Rotas estão os arquivos Rotas.php, Constantes.php e ConfigRotas.php. No arquivo Constantes.php são
 definidas duas constantes a serem utilizadas no projeto:
		HOME -> Diretório raiz do projeto (NOME_PROJETO)
		SRC -> Subdiretório com os demais arquivos PHP (src)

 Sugere-se também a criação da constante HOME nos arquivos de JavaScript que utilizam redirecionamento (Ajax), para facilitar
 a escrita das URLs. Assim, nesses arquivos JavaScript, cria-se a constante HOME com o seguinte comando:
		const HOME = '/NOME_PROJETO/';

 Dentro do diretorio definido pela constante HOME (diretório raiz do projeto) devem estar apenas os arquivos index.php e o 
 .htaccess, além do subdiretório definido pela constante SRC (src - diretório contendo os demais arquivos do projeto).
 O index.php vai carregar as Rotas através do arquivo ConfigRotas.php. Assim, dentro do index.php, haverá somente o seguinte 
 comando:
		include_once __DIR__ .'/src/Rotas/ConfigRotas.php';


 No arquivo ConfigRotas.php (ou qualquer nome que deseje escolher) é onde configuramos as rotas. Para isso, é necessário
 incluir o arquivo Rotas.php no ConfigRotas.php, através do comando:
 		include_once __DIR__ .'/Rotas.php';
 		
 A classe Rotas.php contém os seguintes métodos estáticos que podem ser utilizados:
 
 	Rotas::addExpReg($rota, $destino) -> Método para adicionar rotas através de Expressões Regulares.
	
	Rotas::add($rota, $destino) -> Método para adicionar rotas normais.
				
	Rotas::addGetInt($rota, $destino, $variavel) -> Método para adicionar rotas com parâmetro GET do tipo INT.
	
	Rotas::addGet($rota, $destino, $variaveis) -> Método para adicionar rotas com parâmetro(s) GET de qualquer tipo.
	
	Rotas::erro($destino) -> Método para adicionar rota para página de erro (rota não encontrada).
	
	Rotas::exec() -> Método para executar as Rotas.
 
 Após a inclusão do Rotas.php dentro do ConfigRotas.php, basta configurar as rotas desejadas, conforme os exemplos abaixo. 
 Após configurar todas rotas, deve-se chamar o método responsável por tratar as requisições de rotas geradas pelo navegador: 
 		Rotas::exec();

 Exemplos de Especificações de Rotas (no arquivo ConfigRotas.php):
 
 // Rotas normais, que podem enviar dados via POST
 Rotas::add('/', 'View/home.php');
 Rotas::add('/home', 'View/home.php');

 // Rotas com Variáveis GET de qualquer tipo (texto, número).
 Rotas::addGet('/home', 'View/home.php', 'toast'); // Variavel GET chamada toast
 Rotas::addGet('/controller', 'Controller/CarroController.php', 'function'); // Variavel GET chamada function

 // Rotas com Variáveis GET do tipo Inteiro.
 Rotas::addGetInt('/editar', 'View/editarCarro.php', 'id'); // Variavel GET chamada id

 // Rotas com Múltiplas Variáveis GET de qualquer tipo (Array de variáveis).
 Rotas::addGet('/noticia', 'noticias.php', array('categoria', 'id')); // Variaveis GET categoria e id.

 // Rotas completas com Expressões Regulares
 Rotas::addExpReg('/editar/(?P<id>\d+)', 'View/editarCarro.php'); // Rota com GET 
 Rotas::addExpReg('/noticia/(?P<categoria>\w+)/(?P<id>\d+)', 'noticias.php'); //Rota com dois GETs (texto e número).

 Execução das Rotas:
 Rotas::exec();
 
 
 Sempre que for redirecionar dentro da aplicação, deve-se usar as rotas já cadastradas, usando a constante HOME, seguida
 da rota de destino desejada (para isso deve-se incluir o arquivo Constantes.php nos arquivos PHP que forem utilizar a 
 constante HOME, e também defini-la nos arquivos JavaScript que forem utilizá-la).
 
 Por exemplo, quando trata-se de redirecionamento via Ajax:

	 $.ajax({url: HOME + 'controller/selectTodos', method: 'post',
	        success: function (response) {$("#pasteHere").html(response);}
	 });
	
	Neste exemplo, o Ajax está redirecionando para a rota controller, enviando um parâmetro por GET (selectTodos).

 Quando trata-se de redirecionamento no PHP:
 
   	header("Location: ".HOME."home/cadastroErro");
   	
   	Neste exemplo, a página está sendo redirecionada para a rota home, enviando um parâmetro por GET (cadastroErro).
 

 Quando trata-se de redirecionamento ou links no HTML:
    
    <form method='post' action='<?=HOME?>controller/cadastrar'></form>
 
 	Neste exemplo, no HTML, abro o PHP, e pego a constante HOME, para então completar o endereço de redirecionamento.
 	Nesse caso, está sendo redirecionado para a rota controller, enviando um parâmetro por GET (cadastrar).
 
 Aconselha-se também a utilizar a constante HOME no momento de fazer inclusão de arquivos CSS e JS dentro das páginas.
 Por exemplo:
 	<link rel="stylesheet" href="<?=HOME?>src/View/css/materialize.css">
 	<script src="<?=HOME?>src/View/js/main.js"></script>
 
 
 Exemplo de Saída de Rota Amigável no Navegador:
 // Rota que exibe o arquivo cadastrarCarro.php
 http://localhost/DSWEBII-PHP-ROTAS/cadastrar
 
 // Rota que exibe o arquivo editarCarro.php, recebendo dados (id) por GET.
 http://localhost/DSWEBII-PHP-ROTAS/editar/1
 
 Observe como o exemplo acima, da edição de um carro ficou mais amigável, que o correspondente sem a utilização de rotas:
 http://localhost/DSWEBII-PHP-ROTAS/src/View/editarCarro.php?id=1
 
**************************************************************************************************************************
**************************************************************************************************************************/

class Rotas{

	private static $rotas = array();
	private static $erro = '';
	
	public static function addExpReg($rota, $destino){
		self::$rotas[$rota] = $destino;
	}
	
	public static function add($rota, $destino){
		self::$rotas[''.$rota.'(/?)'] = $destino;
	}
			
	public static function addGetInt($rota, $destino, $variavel){
		self::$rotas[''.$rota.'/(?P<'.$variavel.'>\d+)'] = $destino;
	}
	
	public static function addGet($rota, $destino, $variaveis){
		$parametros = '';
		if(is_array($variaveis)){			
			foreach ($variaveis as $var){
				$parametros .= '/(?P<'.$var.'>\w+)';
			}
		}else{
			$parametros = '/(?P<'.$variaveis.'>\w+)';
		}
		self::$rotas[''.$rota.$parametros.''] = $destino;
	}
	
	public static function erro($destino){
		self::$erro = $destino;
	}
	
	public static function exec(){
		$uri = str_replace(rtrim(HOME, '/'),'',$_SERVER['REQUEST_URI']);
		foreach(self::$rotas as $rota=>$destino){
			$padrao  = '@^'.$rota.'$@';
			if(preg_match($padrao,$uri,$_GET)){
				include(SRC.'/'.$destino);
				exit();
			}
		}

		// Rota não encontrada
		http_response_code(404);
		if(is_file(SRC.'/'.self::$erro)){
			include(SRC.'/'.self::$erro);
			exit();
		}else{
			echo "<h1>404 Página não Encontrada.</h1>";
			exit();
		}
	}
		
}
?>