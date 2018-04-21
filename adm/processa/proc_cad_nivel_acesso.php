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
$nome_nivel 				= $_POST["nome_nivel"];

$query = mysqli_query($conectar,"INSERT INTO nivel_acessos (nome_nivel, created) VALUES ('$nome_nivel', NOW())");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de Acesso cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de acesso não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>