<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	$id = $_GET['id'];

	include_once("conexao.php");
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT d.*, p.nome, p.imagem FROM venda_dados AS d INNER JOIN produtos AS p ON p.id = d.cod_produto WHERE d.cod_venda = '$id'");
	$valor_final = 0;
	$qtd_final = 0;
	$cod_venda = 0;
	#$resultado = mysqli_fetch_assoc($result);


	$metodos_pgto=mysqli_query($conectar,"SELECT * FROM metodos_pgto ORDER BY 'descricao_metodo_pgto'");
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Finalizar Venda</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=50'><button type='button' class='btn btn-sm btn-info'>Voltar para Vendas</button></a>
			
		</div>
	</div>
	
	<table class="table">
		<thead>
		  <tr>
			<th>Venda Nº</th>
			<th>Data</th>
			<th>Produto</th>	
			<th>Valor Unit.</th>
			<th>Quantidade</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($result)){
					echo "<tr>";
						$cod_venda = $linhas['cod_venda'];
						echo "<td>".$linhas['cod_venda']."</td>";
						echo "<td>".$linhas['data_venda']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".number_format(($linhas['valor_produto']*1), 2, ',', '.')."</td>"; 
						$valor_final = $valor_final+(($linhas['valor_produto']*1)*$linhas['qtd_produto']);
						echo "<td>".$linhas['qtd_produto']."</td>"; 
						$qtd_final = $qtd_final+($linhas['qtd_produto']*1);
						
						?>
						
						
						<?php
					echo "</tr>";
				}
				echo "<tr><th>TOTAL DO PEDIDO</th>";
				echo "<td>-</td><td>-</td><td> R$ ".number_format($valor_final, 2, ',', '.')."</td><td>".$qtd_final."</td></tr>";

				echo "<tr><th>FORMA DE PAGAMENTO</th>";
				
				echo "<form class='form-horizontal' method='POST' action='processa/proc_edit_finaliza_venda.php'>";
				echo "<input type='hidden' class='form-control' name='id' value='".$cod_venda."'>";
				echo "<td><select class='form-control' name='meio'>";
			 	while ($resultado_pgtos = mysqli_fetch_array($metodos_pgto)) {
		  			echo "<option value='".$resultado_pgtos['cod_metodo_pgto']."'>".$resultado_pgtos['descricao_metodo_pgto']."</option>";
		 		} 

		 		$meio = 3;

				echo "</select></td><td> </td><td> </td><td><input type='submit' class='btn btn-sm btn-warning' value='Finalizar Venda'></td></tr></form>";
			?>
		</tbody>
	  </table>
</div> <!-- /container -->

