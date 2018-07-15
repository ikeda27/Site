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
$id 				= $_GET["id"];
$ativ_inativ		= 0;

if(isset($_GET["inativ"])){$ativ_inativ = $_GET["inativ"];}
$ativ = 0;
$msg = "";

if ($ativ_inativ > 0) {
	$pre_query = "SELECT id, situacao_id FROM produtos WHERE id=$id";
	$pre_resultado = mysqli_query($conectar,$pre_query);
	
	while($pre_linhas = mysqli_fetch_array($pre_resultado)){
		if ($pre_linhas['situacao_id'] > 1 ){ $ativ = 1; $msg = "ativado"; } else { $ativ = 2; $msg = "desativado"; }
	}

	$query = "UPDATE produtos set situacao_id = '$ativ' WHERE id=$id";

} else { 
	$query = "DELETE FROM produtos WHERE id=$id";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
				<script type=\"text/javascript\">
					alert(\"Produto ".$msg." com sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=10'>
				<script type=\"text/javascript\">
					alert(\"Produto não foi ".$msg." com sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>