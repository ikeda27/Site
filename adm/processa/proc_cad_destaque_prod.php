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
$id 				= $_GET["id"];
$situacao			= $_GET["situacao"];

$controle_salvou = 0;
$controle_ordem = 1;
$inseriu = 0;
if($situacao == 1){
	if($controle_salvou == 0){
		$resultado_prod_dest=mysqli_query($conectar,"SELECT * FROM destaques_produtos WHERE nivel_um='1' ORDER BY ordem ASC");
		$linhas_prod_dest=mysqli_num_rows($resultado_prod_dest);
		while($linhas_prod_dest = mysqli_fetch_array($resultado_prod_dest)){
			if($linhas_prod_dest['ordem'] != $controle_ordem){
				$query = mysqli_query($conectar,"INSERT INTO destaques_produtos (produto_id, nivel_um, nivel_dois, interessar, ordem, created) VALUES ('$id', '1', '0', '0', '$controle_ordem', NOW())");
				$inseriu = 1;
				$controle_ordem = $controle_ordem + 1;
			}
			$controle_ordem = $controle_ordem + 1;
		}
	}if($inseriu == 0){
		$query = mysqli_query($conectar,"INSERT INTO destaques_produtos (produto_id, nivel_um, nivel_dois, interessar, ordem, created) VALUES ('$id', '1', '0', '0', '$controle_ordem', NOW())");
	}
}

if($situacao == 2){
	if($controle_salvou == 0){
		$resultado_prod_dest=mysqli_query($conectar,"SELECT * FROM destaques_produtos WHERE nivel_dois='1' ORDER BY ordem ASC");
		$linhas_prod_dest=mysqli_num_rows($resultado_prod_dest);
		while($linhas_prod_dest = mysqli_fetch_array($resultado_prod_dest)){
			if($linhas_prod_dest['ordem'] != $controle_ordem){
				$query = mysqli_query($conectar,"INSERT INTO destaques_produtos (produto_id, nivel_um, nivel_dois, interessar, ordem, created) VALUES ('$id', '0', '1', '0', '$controle_ordem', NOW())");
				$inseriu = 1;
				$controle_ordem = $controle_ordem + 1;
			}
			$controle_ordem = $controle_ordem + 1;
		}
	}if($inseriu == 0){
		$query = mysqli_query($conectar,"INSERT INTO destaques_produtos (produto_id, nivel_um, nivel_dois, interessar, ordem, created) VALUES ('$id', '0', '1', '0', '$controle_ordem', NOW())");
	}
}

if($situacao == 3){
	
}
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=22'>
				<script type=\"text/javascript\">
					alert(\"Produto destacado com sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=22'>
				<script type=\"text/javascript\">
					alert(\"Produto não foi destacado com sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>
