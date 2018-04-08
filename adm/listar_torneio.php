
<?php
	include_once("conexao.php");
	$resultado_torneio=mysqli_query($conectar,"SELECT * FROM torneio INNER JOIN tipo_torneio ON torneio.tipo_torneio=tipo_torneio.cod_tp_torneio WHERE sit_torneio='1'");
	$linhas=mysqli_num_rows($resultado_torneio);

?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Torneio</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=41"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>Nome Torneio</th>
			<th>Tipo do Torneio</th>
			<th>Data do Torneio</th>>
			<th>Valor Entrada</th>
			<th>Qtde Máx. Rebuy</th>
			<th>Valor Rebuy</th>
			<th>Qtde Máx. Addon</th>			
			<th>Valor Addon</th>
			<th>Máx. Players Mesa</th>			
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado_torneio)){
					echo "<tr>";
						echo "<td>".$linhas['nome_torneio']."</td>";
						echo "<td>".$linhas['nome_tp']."</td>";
						echo "<td>".$linhas['data_torneio']."</td>";
						echo "<td>".$linhas['vlr_entrada']."</td>";
						echo "<td>".$linhas['qtd_max_rebuy']."</td>";
						echo "<td>".$linhas['vlr_rebuy']."</td>";
						echo "<td>".$linhas['qtd_max_addon']."</td>";
						echo "<td>".$linhas['vlr_addon']."</td>";
						echo "<td>".$linhas['qtd_max_player_mesa']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=&id=<?php echo $linhas['cod_cadastro_torneio']; ?>'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-eye-open align-left" aria-hidden="true"></span></button></a>
						
						<a href='administrativo.php?link=43&id=<?php echo $linhas['cod_cadastro_torneio']; ?>'><button type='button' class='btn btn-sm btn-warning'><span class="glyphicon glyphicon-pencil align-left" aria-hidden="true"></span></button></a>
						
						<a href='processa/proc_apagar_torneio.php?id=<?php echo $linhas['cod_cadastro_torneio']; ?>'><button type='button' class='btn btn-sm btn-danger'><span class="glyphicon glyphicon-remove align-left" aria-hidden="true"></span></button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

