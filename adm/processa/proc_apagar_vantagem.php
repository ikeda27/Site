<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id 		= $_GET["id"];

$query 		= "UPDATE vantagens set flag_vantagem_ativo = 0 WHERE id_vantagem=$id";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=31'>
				<script type=\"text/javascript\">
					alert(\"Vantagem apagada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=31'>
				<script type=\"text/javascript\">
					alert(\"Vantagem não foi apagada com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>