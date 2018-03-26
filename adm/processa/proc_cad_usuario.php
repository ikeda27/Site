<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$nome 				= $_POST["nome"];
$email 				= $_POST["email"];
$usuario 			= $_POST["usuario"];
$senha 				= $_POST["senha"];
$endereco 			= $_POST["endereco"];
$documento 			= $_POST["documento"];
$telefone 			= $_POST["telefone"];
$nivel_de_acesso 	= $_POST["nivel_de_acesso"];
$nivel_plano 		= $_POST["nivel_plano"];
$saldo			 	= $_POST["saldo"];
$nascimento 		= $_POST["nascimento"];

$date = DateTime::createFromFormat('d/m/Y', $nascimento);

$query = mysqli_query($conectar,"INSERT INTO usuarios (nome, email, login, senha, nivel_acesso_id, created, modified, endereco, documento, telefone, plano, saldo, nascimento) VALUES ('$nome', '$email', '$usuario', '$senha', '$nivel_de_acesso', NOW(), NOW(), '$endereco', '$documento', '$telefone', '$nivel_plano', '$saldo', '".$date->format('Y-m-d')."')");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_usuario.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_usuario.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>