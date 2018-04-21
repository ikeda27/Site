<?php
/*
if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}
*/
session_start();
include_once("../conexao.php");
$id 				= $_GET["id"];

$query = "DELETE FROM categorias WHERE id=$id";
$resultado = mysqli_query($conectar,$query);
$linhas = mysqli_affected_rows($conectar);

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de produto apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de produto não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>