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
$id 		= $_GET["id"];

$query 		= "UPDATE planos set flag_plan_ativo = 0 WHERE id_plano=$id";
$resultado  = mysqli_query($conectar,$query);
$linhas 	= mysqli_affected_rows($conectar);

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=27'>
				<script type=\"text/javascript\">
					alert(\"Plano apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=27'>
				<script type=\"text/javascript\">
					alert(\"Plano não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>