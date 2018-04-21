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
$assunto 				= $_POST["Assunto"];
$mensagem 				= $_POST["Mensagem"];
$data_envio 			= $_POST["data_envio"];

$query = mysqli_query($conectar,"INSERT INTO mensagens (conteudo_mensagem, data_envio, assunto) VALUES ('$assunto','$data_envio','$mensagem')");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Sua mensagem foi cadastrada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Sua mensagem não foi cadastrada com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>