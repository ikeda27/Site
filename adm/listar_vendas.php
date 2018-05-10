
<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	include_once("conexao.php");
	$cod_clube = 1;
	$resultado=mysqli_query($conectar,"SELECT u.nome, x.data_venda, x.cod_venda, SUM(x.valor_produto) AS valor_acumulado, SUM(valor_acum_produto) AS valor_final, x.meio_pgto, x.data_pgto, m.descricao_metodo_pgto FROM (SELECT v.*, d.cod_produto, d.qtd_produto, d.valor_produto, d.qtd_produto*d.valor_produto AS valor_acum_produto, d.data_venda FROM vendas AS v INNER JOIN venda_dados AS d ON d.cod_venda = v.cod_venda WHERE v.cod_clube = '$cod_clube') AS x INNER JOIN usuarios AS u ON u.id = x.cod_cliente LEFT JOIN metodos_pgto AS m ON m.cod_metodo_pgto = x.meio_pgto GROUP BY u.nome, x.data_venda, x.cod_venda, x.meio_pgto, x.data_pgto, m.descricao_metodo_pgto");
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
			<th>Data Venda</th>
			<th>Data Pgto.</th>
			<th>Meio Pgto.</th>
		  </tr>
		</thead>
		<tbody>
			<?php
				$valor_a_receber = 0;
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr>";
						
						echo "<td>".$linhas['cod_venda']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".number_format($linhas['valor_final'], 2, ',', '.')."</td>";
						echo "<td>".$linhas['data_venda']."</td>";
						echo "<td>".$linhas['data_pgto']."</td>";
						echo "<td>".$linhas['descricao_metodo_pgto']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=53&id=<?php echo $linhas['cod_venda']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<?php
						if (is_null($linhas['descricao_metodo_pgto'])){
							$valor_a_receber = $valor_a_receber + $linhas['valor_final'];
							echo "<a href='administrativo.php?link=54&id=".$linhas['cod_venda']."'><button type='button' class='btn btn-sm btn-warning'>Finalizar Venda</button></a>";
						}
						
				}
					echo "</tr>";
				
				echo "<tr><td><th>TOTAL A RECEBER:</th><td>".number_format($valor_a_receber, 2, ',', '.')."</td></tr>";
				
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

