<?php
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

$cod_torn 			= $_POST["cod_torneio"];
$id_player			= $_POST["id_cliente"];
$add				= $_POST["add"];
$rebuy				= $_POST["rebuy"];


	$result=mysqli_query($conectar,"SELECT * FROM partida INNER JOIN torneio on torneio.cod_torneio=partida.cod_partida INNER JOIN usuarios ON usuarios.id=partida.cod_player WHERE cod_torneio='$cod_torneio' AND id='$id_player'");
	$resultado=mysqli_num_rows($result);

if (condition) {
	# code...
}

while ($resultado = mysqli_fetch_array($result)) {

	if ($resultado['qtd_rebuy']<$resultado['qtd_max_rebuy'] ) {
		
		$add_rebuy=$resultado['qtd_rebuy']+1;

		$query = mysqli_query($conectar,"UPDATE partida set qtd_rebuy = '$add_rebuy' WHERE cod_torneio ='$cod_torn' AND cod_player ='$id_player' ");

	}
}
	
}


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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Torneio editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Torneio não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>