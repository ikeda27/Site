<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$nome 				= $_POST["nome"];
$slug 				= $_POST["slug"];
$tag 				= $_POST["tag"];
$description 		= $_POST["description"];

$query = mysqli_query($conectar,"INSERT INTO categorias (nome, slug, tag, description, created) VALUES ('$nome', '$slug', '$tag', '$description', NOW())");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de Produto cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de produto não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>