<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id 				= $_POST["id"];
$nome_nivel 				= $_POST["nome_nivel"];
$query = mysqli_query($conectar,"UPDATE nivel_acessos set nome_nivel ='$nome_nivel', modified = NOW() WHERE id='$id'");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de acesso editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de acesso não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>