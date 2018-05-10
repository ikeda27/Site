<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");
$cod_torn 			= $_POST["cod_torneio"];
$flg_ranking 		= $_POST["flg_ranking"];
$tipo_torneio 		= $_POST["tipo_torneio"];
$peso 				= $_POST["peso"];
$nome_torneio 		= $_POST["nome_torneio"];




$query = mysqli_query($conectar,"UPDATE cadastro_torneio set flg_ranking = '$flg_ranking', tipo_torneio = '$tipo_torneio', peso_torneio = '$peso', nome_torneio = '$nome_torneio', WHERE cod_cadastro_torneio ='$cod_torn'");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Torneio editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Torneio não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>