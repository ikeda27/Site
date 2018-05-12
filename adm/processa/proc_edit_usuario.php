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
<<<<<<< HEAD
		if (mysqli_affected_rows($conectar) != 0 ){	
=======
		if ($tipo_erro==1){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Nome de usuario já cadastrado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==2){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Este e-mail já esta sendo utilizado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==3){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuario já cadastrado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==4){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"A senha tem menos de 6 caracteres.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==5){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Este CPF já foi utilizado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==6){	
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>