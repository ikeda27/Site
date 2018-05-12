<<<<<<< HEAD
﻿<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
=======
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
session_start();
include_once("../conexao.php");
$cod_clube=$_SESSION['clube'];
$result = mysqli_query($conectar,"SELECT * FROM vantagens WHERE flag_vantagem_ativo=1 AND id_clube='$cod_clube'");
$resultado = mysqli_num_rows($result);
$vantagens=0;
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224

$nome 		= $_POST["nome"];
if(isset($_POST["ck1"])) { $vantagem1 = $_POST["ck1"];}else{$vantagem1="0";};
if(isset($_POST["ck2"])) { $vantagem2 = $_POST["ck2"];}else{$vantagem2="0";};
if(isset($_POST["ck3"])) { $vantagem3 = $_POST["ck3"];}else{$vantagem3="0";};
if(isset($_POST["ck4"])) { $vantagem4 = $_POST["ck4"];}else{$vantagem4="0";};
if(isset($_POST["ck5"])) { $vantagem5 = $_POST["ck5"];}else{$vantagem5="0";};
if(isset($_POST["ck6"])) { $vantagem6 = $_POST["ck6"];}else{$vantagem6="0";};

$vantagens = $vantagem1.",".$vantagem2.",".$vantagem3.",".$vantagem4.",".$vantagem5.",".$vantagem6; 
$retorno_vantagem = mysqli_query($conectar,"SELECT DISTINCT desc_vantagem FROM vantagens WHERE id_vantagem IN (".$vantagens.")");
$linhas=mysqli_num_rows($retorno_vantagem);
$vantagens="";

while($linhas = mysqli_fetch_array($retorno_vantagem)){
	$vantagens = $vantagens." ".$linhas['desc_vantagem'];
};

$acao = 0;

if ($nome != ""){
	$query = mysqli_query($conectar,"INSERT INTO planos (desc_plano, flag_plan_ativo, vantagens_plano) VALUES ('$nome',1,'$vantagens')");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_plano.php'>
=======
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=27'>
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
				<script type=\"text/javascript\">
					alert(\"Plano cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
<<<<<<< HEAD
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_plano.php'>
=======
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=27'>
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
				<script type=\"text/javascript\">
					alert(\"Plano não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>