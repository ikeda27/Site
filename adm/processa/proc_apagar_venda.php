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

if(isset($_GET["id"])){
	$id = $_GET["id"];
}else{
	echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=50'>
		<script type=\"text/javascript\">
			alert(\"Erro ao apagar venda! Retornando às vendas.\");
		</script>
		";	
}

$query 		= "SELECT v.cod_venda, v.cod_clube, v.pago, vd.cod_produto, SUM(vd.qtd_produto) AS qtd_produtos
FROM vendas AS v INNER JOIN venda_dados AS vd ON v.cod_venda = vd.cod_venda
WHERE v.cod_venda = $id GROUP BY v.cod_venda, v.cod_clube, v.pago, vd.cod_produto";
$resultado  = mysqli_query($conectar,$query);

$cod_prod = 0;
$qtd_prod = 0;

while($capta_dados = mysqli_fetch_array($resultado)){
	$id_produto    = $capta_dados['cod_produto'];
	$qtd_prod      = $capta_dados['qtd_produtos'];
	$cod_clube     = $capta_dados['cod_clube'];

	$query_est 	   = "SELECT id_produto, qtd_produto FROM estoque WHERE id_produto=$id_produto AND cod_clube=$cod_clube";
	$select_est    = mysqli_query($conectar,$query_est);	

	while($capta_estoque = mysqli_fetch_array($select_est)){
		$qtd_prod_novo = $qtd_prod + $capta_estoque['qtd_produto'];
	}


	$query_est 	   = "UPDATE estoque SET qtd_produto =$qtd_prod_novo WHERE id_produto=$id_produto AND cod_clube=$cod_clube";
	$update_est    = mysqli_query($conectar,$query_est);

}

$deleta_vendas = "DELETE FROM vendas WHERE cod_venda = $id";
$deleta_venda  = mysqli_query($conectar,$deleta_vendas);

$deleta_vendas_dados = "DELETE FROM venda_dados WHERE cod_venda = $id";
$deleta_venda_dados  = mysqli_query($conectar,$deleta_vendas_dados);


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=50'>
			<script type=\"text/javascript\">
				alert(\"Venda Removida com Sucesso!\");
			</script>
			";		   
		?>
	</body>
</html>