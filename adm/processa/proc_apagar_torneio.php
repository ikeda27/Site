<?php
session_start();
include_once("../seguranca.php");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:8080/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Torneio apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:8080/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Torneio não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>