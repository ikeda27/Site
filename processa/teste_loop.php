<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>
	
	<?php

include_once("../adm/conexao.php");
$nome 				= $_POST["nome"];
$email			 	= $_POST["email"];
$telefone		 	= $_POST["telefone"];
$assunto			= $_POST["assunto"];
$mensagem			= $_POST["mensagem"];

$query = mysqli_query($conectar, "INSERT INTO contatos (nome, email, telefone, assunto, mensagem, created) VALUES ('$nome', '$email', '$telefone', '$assunto', '$mensagem', NOW())");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/contato'>
				<script type=\"text/javascript\">
					alert(\"Mensagem enviada com Sucesso.\");
				</script>
			";	 
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/contato'>
				<script type=\"text/javascript\">
					alert(\"Mensagem não foi enviada com Sucesso.\");
				</script>
			";		

		}

		?>
	</body>
</html>