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
$id 				= $_POST["id"];
$nome 				= $_POST["nome"];


$query = mysqli_query($conectar,"UPDATE metodos_pgto set descricao_metodo_pgto ='$nome' WHERE cod_metodo_pgto='$id'");
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
					alert(\"Método de Pagamento editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=55'>
				<script type=\"text/javascript\">
					alert(\"Método de Pagamento não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>