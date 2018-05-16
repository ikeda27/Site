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
$id   = $_POST['id'];
$meio = $_POST['meio'];


$metodos_pgto=mysqli_query($conectar,"SELECT * FROM metodos_pgto WHERE cod_metodo_pgto='$meio' LIMIT 1");
while ($resultado_pgtos = mysqli_fetch_array($metodos_pgto)) {
	$meio_ok = $resultado_pgtos['descricao_metodo_pgto'];
} 



$pg_data = (new \DateTime())->format('d/m/Y');

$query = mysqli_query($conectar,"UPDATE vendas SET pago ='SIM', meio_pgto='$meio', data_pgto='$pg_data' WHERE cod_venda='$id'");

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=50'>
				<script type=\"text/javascript\">
					alert(\"Venda finalizada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=50'>
				<script type=\"text/javascript\">
					alert(\"Venda não foi finalizada!\");
				</script>
			";		   

		}

		?>
	</body>
</html>