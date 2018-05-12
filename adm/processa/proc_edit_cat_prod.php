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
$id 				= $_POST["id"];
$nome 				= $_POST["nome"];
$slug 				= $_POST["slug"];
$tag 				= $_POST["tag"];
$description 		= $_POST["description"];

$query = mysqli_query($conectar,"UPDATE categorias set nome ='$nome', slug = '$slug', tag='$tag', description= '$description', modified = NOW() WHERE id='$id'");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de Produto editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de produto não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>