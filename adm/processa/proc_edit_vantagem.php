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

$id 		= $_POST["id"];
$nome 		= $_POST["nome"];
if(isset($_POST["ck1"])) { $ativo1 = $_POST["ck1"];}else{$ativo1="0";};

$query = mysqli_query($conectar,"UPDATE vantagens SET desc_vantagem ='$nome',flag_vantagem_ativo='$ativo1' WHERE id_vantagem='$id'");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=31'>
				<script type=\"text/javascript\">
					alert(\"Vantagem editada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=31'>
				<script type=\"text/javascript\">
					alert(\"Vantagem não foi editada com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>