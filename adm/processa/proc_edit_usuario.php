<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id 				= $_POST["id"];
$nome 				= $_POST["nome"];
$email 				= $_POST["email"];
$usuario 			= $_POST["usuario"];
$senha 				= $_POST["senha"];
$nivel_de_acesso 	= $_POST["nivel_de_acesso"];
$endereco 			= $_POST["endereco"];
$documento 			= $_POST["documento"];
$telefone 			= $_POST["telefone"];
$plano 				= $_POST["plano"];
$nascimento 		= $_POST["nascimento"];




$query = mysqli_query($conectar,"UPDATE usuarios set nome ='$nome', email = '$email', login = '$usuario', senha = '$senha', nivel_acesso_id = '$nivel_de_acesso', endereco = '$endereco', documento = '$documento', telefone = '$telefone', plano = '$plano', nascimento = '$nascimento', modified = NOW () WHERE id='$id'");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>