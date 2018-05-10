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
include_once("../conexao.php");
$nome 				= $_POST["nome"];

$id = mysqli_query($conectar,"SELECT MAX(cod_metodo_pgto) AS max FROM metodos_pgto LIMIT 1");

while($linhas = mysqli_fetch_array($id)){
	$novo_id = $linhas['max']+1;
}

$query = mysqli_query($conectar,"INSERT INTO metodos_pgto (cod_metodo_pgto,descricao_metodo_pgto) VALUES ('$novo_id','$nome')");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=55'>
				<script type=\"text/javascript\">
					alert(\"Método de Pagamento cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=55'>
				<script type=\"text/javascript\">
					alert(\"Método de Pagamento não foi cadastrado!\");
				</script>
			";		   

		}

		?>
	</body>
</html>