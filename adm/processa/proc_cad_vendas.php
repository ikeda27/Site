<?php
	include_once("../conexao.php");


	$cod_produtos 	= $_POST["cod_produtos"];
	$cliente_id 	= $_POST["id_cliente"];
	$valor_produto 	= $_POST["valor_produto"];
	$qtde_produtos	= $_POST["qtde_produto"];
	$cod_clube		= '1';

	$ultima_venda = mysqli_fetch_array(mysqli_query($conectar,"SELECT MAX(cod_venda) AS ultima_venda FROM vendas"));

	if(is_null($ultima_venda[0])){
		$ultima_venda = 1;
	}else{
		$ultima_venda = ($ultima_venda[0]*1)+1;
	}

	$query = mysqli_query($conectar,"INSERT INTO vendas (cod_cliente, cod_clube, cod_venda) VALUES ('$cliente_id','$cod_clube','$ultima_venda')");

	$temp_cod_prod = explode("-",$cod_produtos);
	$temp_val_prod = explode("-",$valor_produto);
	$temp_qtd_prod = explode("-",$qtde_produtos);

	for($i = 0; $i < count($temp_cod_prod); $i++ ){ 
		$query = mysqli_query($conectar,"INSERT INTO venda_dados (cod_produto, cod_venda, data_venda, qtd_produto, valor_produto) VALUES ('$temp_cod_prod[$i]','$ultima_venda',NOW(), '$temp_qtd_prod[$i]', '$temp_val_prod[$i]')");
		$acao = $i+1;
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../administrativo.php?link=50'>
				<script type=\"text/javascript\">
					alert(\"Venda realizada!\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../administrativo.php?link=51'>
				<script type=\"text/javascript\">
					alert(\"Houve algum problema! Confira por favor!\");
				</script>
			";		   

		}

		?>
	</body>
</html>