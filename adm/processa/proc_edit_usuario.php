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
$cidade				= $_POST['cidade'];
$cod_clube=$_SESSION['clube'];
$erro=null;
$tipo_erro=0;

//insere variavel validações mysql


$teste_email = mysqli_query($conectar,"SELECT id, email FROM usuarios WHERE email='$email'");
$result_email = mysqli_num_rows($teste_email);

$teste_usuario = mysqli_query($conectar,"SELECT login FROM usuarios WHERE cod_clube='$cod_clube' AND login='$usuario'");
$lnh_usuario = mysqli_num_rows($teste_usuario);
$vlr_usuario = mysqli_fetch_array($teste_usuario);

$teste_cpf = mysqli_query($conectar,"SELECT nome FROM usuarios WHERE cod_clube='$cod_clube' AND documento='$documento'");
$result_cpf = mysqli_num_rows($teste_cpf);

$teste_cel = mysqli_query($conectar,"SELECT nome FROM usuarios WHERE cod_clube='$cod_clube' AND telefone='$telefone'");
$result_cel = mysqli_num_rows($teste_cel);

//fim inserção mysql

//inicia testes de erro

//se retorno do teste feito pelo campo avaliado for maior que 1, ou menor ou o id for diferente



elseif ($result_email<1) {
	$erro=true;
	$tipo_erro=2;
} */

if ($lnh_usuario<>0) {
	
	$erro=true;
	$tipo_erro=3;
}

elseif (strlen($senha)<6) {
	$erro=true;
	$tipo_erro=4;
}

elseif ($result_cpf<>0) {
	$erro=true;
	$tipo_erro=5;
}

elseif ($result_cel<>0) {
	$erro=true;
	$tipo_erro=6;
}

else {
	$erro=false;
}

// se $erro for setado como false realiza cadastro

if ($erro==false) {

$query = mysqli_query($conectar,"UPDATE usuarios set nome ='$nome', email = '$email', login = '$usuario', senha = '$senha', nivel_acesso_id = '$nivel_de_acesso', endereco = '$endereco', documento = '$documento', telefone = '$telefone', plano = '$plano', nascimento = '$nascimento', modified = NOW () , cod_clube = '$cod_clube', cidade = '$cidade' WHERE id='$id'");

}
	
	?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
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
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Celular já cadastrado neste clube.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuario atualizado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>
