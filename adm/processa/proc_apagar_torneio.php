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
$cod_torneio 				= $_GET["id"];

$query = "UPDATE cadastro_torneio set situacao_id = 0 WHERE cod_cadastro_torneio=$cod_torneio";
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
<<<<<<< HEAD
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=42'>
=======
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=42'>
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
				<script type=\"text/javascript\">
					alert(\"Torneio apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
<<<<<<< HEAD
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=42'>
=======
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=42'>
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
				<script type=\"text/javascript\">
					alert(\"Torneio não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>