﻿<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");
$flg_ranking 		= $_POST["flg_ranking"];
$tipo_torneio 		= $_POST["tipo_torneio"];
$peso 				= $_POST["peso"];
$nome_torneio 		= $_POST["nome_torneio"];




$query = mysqli_query($conectar,"INSERT INTO cadastro_torneio ( flg_ranking , tipo_torneio, peso_torneio, nome_torneio) VALUES ($flg_ranking , $tipo_torneio, $peso, '$nome_torneio')");



?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>


	<body>
		<?php
		if (mysqli_affected_rows($conectar) > 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=41'>
				<script type=\"text/javascript\">
					alert(\"Torneio cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=41'>
				<script type=\"text/javascript\">
					alert(\"Torneio não foi cadastrado com Sucesso.\");
				</script>
				";
		}

		?>
	</body>
</html>