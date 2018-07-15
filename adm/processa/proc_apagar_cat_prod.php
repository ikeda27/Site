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
$ativ_inativ		= 0;

if(isset($_GET["inativ"])){$ativ_inativ = $_GET["inativ"];}
$ativ = 0;
$msg = "";

if ($ativ_inativ > 0) {
	$pre_query = "SELECT id, tag FROM categorias WHERE id=$id";
	$pre_resultado = mysqli_query($conectar,$pre_query);
	
	while($pre_linhas = mysqli_fetch_array($pre_resultado)){
		if ($pre_linhas['tag'] == '0' ){ $ativ = 1; $msg = "ativada"; } else { $ativ = 0; $msg = "desativada"; }
	}

	$query = "UPDATE categorias set tag = '$ativ' WHERE id=$id";

} else { 
	$query = "DELETE FROM categorias WHERE id=$id";
	$msg = "apagado";
}

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
					alert(\"Categoria de produto ".$msg." com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de produto não foi ".$msg." com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>