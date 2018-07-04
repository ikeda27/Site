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
$cidade      		= $_POST["cidade"];

$cod_clube 			= 1;
if (isset($_SESSION['clube'])){
	$cod_clube		= $_SESSION['clube'];
}

$erro 				= null;
$tipo_erro 			= 0;

//insere variavel validações mysql

$teste_nome 	= mysqli_query($conectar,"SELECT nome FROM usuarios WHERE cod_clube='$cod_clube' AND nome='$nome'");
$result_nome 	= mysqli_num_rows($teste_nome);

$teste_email 	= mysqli_query($conectar,"SELECT nome FROM usuarios WHERE cod_clube='$cod_clube' AND email='$email'");
$result_email 	= mysqli_num_rows($teste_email);

$teste_usuario  = mysqli_query($conectar,"SELECT nome FROM usuarios WHERE cod_clube='$cod_clube' AND login='$usuario'");
$result_usuario = mysqli_num_rows($teste_usuario);

$teste_cpf 		= mysqli_query($conectar,"SELECT nome FROM usuarios WHERE cod_clube='$cod_clube' AND documento='$documento'");
$result_cpf 	= mysqli_num_rows($teste_cpf);

$teste_cel 		= mysqli_query($conectar,"SELECT nome FROM usuarios WHERE cod_clube='$cod_clube' AND telefone='$telefone'");
$result_cel 	= mysqli_num_rows($teste_cel);

//fim inserção mysql

//inicia testes de erro

if ($result_nome<>0) {
	$erro=true;
	$tipo_erro=1;
}


elseif ($result_email<>0) {
	$erro=true;
	$tipo_erro=2;
} 

elseif ($result_usuario<>0) {
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

	$query = mysqli_query($conectar,"INSERT INTO usuarios (nome, email, login, senha, nivel_acesso_id, created, modified, endereco, documento, telefone, plano, saldo, nascimento, flag_user_ativo, cod_clube, cidade) VALUES ('$nome', '$email', '$usuario', '$senha', '$nivel_de_acesso', NOW(), NOW(), '$endereco', '$documento', '$telefone', '$nivel_plano', '$saldo', '$nascimento','1','$cod_clube','$cidade')");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=3'>
				<script type=\"text/javascript\">
					alert(\"Nome de usuario já cadastrado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==2){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=3'>
				<script type=\"text/javascript\">
					alert(\"Este e-mail já esta sendo utilizado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==3){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=3'>
				<script type=\"text/javascript\">
					alert(\"Usuario já cadastrado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==4){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=3'>
				<script type=\"text/javascript\">
					alert(\"A senha tem menos de 6 caracteres.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==5){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=3'>
				<script type=\"text/javascript\">
					alert(\"Este CPF já foi utilizado neste clube.\");
				</script>
			";		   
		}
		elseif ($tipo_erro==6){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=3'>
				<script type=\"text/javascript\">
					alert(\"Celular já cadastrado neste clube.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuario cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>
