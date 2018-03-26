<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$nome 				= $_POST["nome"];

$query = mysqli_query($conectar,"INSERT INTO situacaos (nome, created) VALUES ('$nome', NOW())");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"Situação cadastrada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"Situação não foi cadastrada com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>