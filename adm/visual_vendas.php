<?php
	$id = $_GET['id'];

	include_once("conexao.php");
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT d.*, p.nome, p.imagem FROM venda_dados AS d INNER JOIN produtos AS p ON p.id = d.cod_produto WHERE d.cod_venda = '$id'");
	$valor_final = 0;
	$qtd_final = 0;
	#$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Venda</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=50'><button type='button' class='btn btn-sm btn-info'>Listar Vendas</button></a>
			
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
				echo "<tr><td>Total do Pedido</td>";
				echo "<td></td><td></td><td> R$ ".number_format($valor_final, 2, ',', '.')."</td><td>".$qtd_final."</td></tr>";
			?>
		</tbody>
	  </table>
</div> <!-- /container -->

