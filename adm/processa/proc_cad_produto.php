<?php
session_start();
/*
if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>
	
	<?php
//include_once("../seguranca.php");
include_once("../conexao.php");
//PARA TEXTAREA O TRATAMENTO ABAIXO DEVE SER REALIZADO PARA OBTER O TEXTO DO PRODUTO
$nome 				= $_POST["nome"];
$descricao_curta 	= strip_tags(trim($_POST["descricao_curta"]));
$descricao_longa 	= $descricao_curta;
$preco 				= $_POST["preco"];
$tag 				= $_POST["tag"];
$estoque 			= $_POST["estoque"];
$description 		= $descricao_curta;
$slug		 		= $descricao_curta;
$arquivo	 		= $_FILES['arquivo']['name'];
$categoria_id 		= $_POST["categoria_id"];
$situacao_id 		= $_POST["situacao_id"];
$user	 	 		= $_POST["user"];

//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../../foto/';

//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024*1024*100; //5mb

//Array com as extensoes permitidas
$_UP['extensoes'] = array('png','jpg', 'jpeg', 'gif');

//Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
$_UP['renomeia'] = false;

//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if($_FILES['arquivo']['error'] != 0){
	die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
	exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao = strtolower(end(explode('.', $arquivo)));
if(array_search($extensao, $_UP['extensoes'])=== false){
	$query = mysqli_query($conectar,"INSERT INTO produtos (
	categoria_id, 
		created, 
		descricao_curta, 
		descricao_longa, 
		description, 
		imagem, 
		modified, 
		nome, 
		preco, 
		situacao_id, 
		slug, 
		tag) VALUES(
		'$categoria_id',
		NOW(),
		'$descricao_curta',
		'$descricao_longa',
		'$description',
		'$nome_final',
		NOW(),
		'$nome',
		'$preco',
		'$situacao_id',
		'$slug',
		'$tag')");
	echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
		<script type=\"text/javascript\">
			alert(\"A imagem não foi cadastrada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif. As informações do produto foi cadastrado.\");
		</script>
	";
	var_dump(1);
}
//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
	echo "";
	$query = mysqli_query($conectar,"INSERT INTO produtos (
	categoria_id, 
	created, 
	descricao_curta, 
	descricao_longa, 
	description, 
	imagem, 
	modified, 
	nome, 
	preco, 
	situacao_id, 
	slug, 
	tag) VALUES(
	'$categoria_id',
	NOW(),
	'$descricao_curta',
	'$descricao_longa',
	'$description',
	'$nome_final',
	NOW(),
	'$nome',
	'$preco',
	'$situacao_id',
	'$slug',
	'$tag')");
	echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
		<script type=\"text/javascript\">
			alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações do produto foi cadastrado.\");
		</script>
	";
	var_dump(2);
}

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto

else{
	//Primeiro verifica se deve trocar o nome do arquivo
	if($_UP['renomeia'] == true){
		//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
		$nome_final = time().'.jpg';
	}else{
		//mantem o nome original do arquivo
		$nome_final = $_FILES['arquivo']['name'];
	}
	//Verificar se é possivel mover o arquivo para a pasta escolhida
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
		//Upload efetuado com sucesso, exibe a mensagem
		$query = mysqli_query($conectar,"INSERT INTO produtos (
		categoria_id, 
		created, 
		descricao_curta, 
		descricao_longa, 
		description, 
		imagem, 
		modified, 
		nome, 
		preco, 
		situacao_id, 
		slug, 
		tag) VALUES(
		'$categoria_id',
		NOW(),
		'$descricao_curta',
		'$descricao_longa',
		'$description',
		'$nome_final',
		NOW(),
		'$nome',
		'$preco',
		'$situacao_id',
		'$slug',
		'$tag')");



		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
			<script type=\"text/javascript\">
				alert(\"Produto cadatrado com Sucesso.\");
			</script>
		";
	}else{
		//Upload não efetuado com sucesso, exibe a mensagem
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
			<script type=\"text/javascript\">
				alert(\"Produto não foi cadatrado com Sucesso.\");
			</script>
		";
	}
}


//VERIFICA O ULTIMO PRODUTO DO CLIENTE (PROVAVELMENTE O ULTIMO CADASTRADO NESTE MOMENTO) E ATUALIZA O ESTOQUE DO MESMO EM OUTRA TABELA
$resultado =mysqli_query($conectar, "SELECT nome,preco,id FROM produtos ORDER BY id DESC LIMIT 1");
while($dados = mysqli_fetch_assoc($resultado)){
	
	if(($nome.'-'.$preco) == ($dados["nome"].'-'.$dados["preco"])) {
		$id = $dados['id'];
		$query = mysqli_query($conectar, "INSERT INTO estoque (cod_clube, id_produto, qtd_produto) VALUES ('$user','$id','$estoque')");
	}
}





/*$query = mysqli_query($conectar,"INSERT INTO produtos (
nome, 			
descricao_curta,
descricao_longa,
preco, 			
tag, 			
description, 	
imagem, 		
categoria_id, 	
situacao_id, 	 
created) VALUES(
'$nome',
'$descricao_curta',
'$descricao_longa',
'$preco',
'$tag',
'$description',
'$arquivo',
'$categoria_id',
'$situacao_id',
NOW())");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($conectar) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
				<script type=\"text/javascript\">
					alert(\"Produto cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
				<script type=\"text/javascript\">
					alert(\"Produto não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}
*/
		?>
	</body>
</html>