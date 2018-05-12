<?php
session_start();
<<<<<<< HEAD
include_once("../seguranca.php");
=======
/*
if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}
*/
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
include_once("../conexao.php");

$nome 		= $_POST["nome"];

if ($nome != ""){
	$query = mysqli_query($conectar,"INSERT INTO vantagens (desc_vantagem, flag_vantagem_ativo) VALUES ('$nome',1)");
	$acao = mysqli_affected_rows($conectar);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if ($acao > 0 ){	
			echo "
<<<<<<< HEAD
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_vantagem.php'>
=======
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=31'>
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
				<script type=\"text/javascript\">
					alert(\"Vantagem cadastrada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
<<<<<<< HEAD
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_vantagem.php'>
=======
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=31'>
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
				<script type=\"text/javascript\">
					alert(\"Vantagem não foi cadastrada com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>