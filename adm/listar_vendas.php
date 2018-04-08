
<?php
	include_once("conexao.php");
	$cod_clube = 1;
	$resultado=mysqli_query($conectar,"SELECT u.nome, x.data_venda, x.cod_venda, SUM(x.valor_produto) AS valor_acumulado, SUM(valor_acum_produto) AS valor_final FROM (SELECT v.*, d.cod_produto, d.qtd_produto, d.valor_produto, d.qtd_produto*d.valor_produto AS valor_acum_produto, d.data_venda FROM vendas AS v INNER JOIN venda_dados AS d ON d.cod_venda = v.cod_venda WHERE v.cod_clube = '$cod_clube') AS x INNER JOIN usuarios AS u ON u.id = x.cod_cliente GROUP BY u.nome, x.data_venda, x.cod_venda");
	$linhas=mysqli_num_rows($resultado);
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Vendas Realizadas</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=51"><button type='button' class='btn btn-sm btn-success'>Nova Venda</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>Venda Nº</th>
			<th>Cliente</th>			
			<th>R$ Valor</th>
			<th>Data</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr>";
						echo "<td>".$linhas['cod_venda']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".number_format($linhas['valor_final'], 2, ',', '.')."</td>";
						echo "<td>".$linhas['data_venda']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=53&id=<?php echo $linhas['cod_venda']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						
						<!--  1-> TROCAR TAG COMENTARIO HTML // 2-> SOLICITAR SENHA ADM PARA EDIÇÃO  -->
							<a href='administrativo.php?link=52&id=<?php echo $linhas['cod_venda']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

