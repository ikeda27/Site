
<?php
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT * FROM cadastro_torneio WHERE situacao_id = 1 ORDER BY cod_cadastro_torneio");
	$linhas=mysqli_num_rows($resultado);
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
			<th hidden="TRUE">Codigo Torneio</th>
			<th>Nome Torneio</th>
			<th>Torneio Rankeado</th>
			<th>Tipo do Torneio</th>
			<th>Peso Torneio</th>
			<th>Valor Entrada</th>
			<th>Qtde Máx. Rebuy</th>
			<th>Valor Rebuy</th>
			<th>Qtde Máx. Addon</th>			
			<th>Valor Addon</th>
			<th>Máx. Players</th>			
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					$id_sit = $linhas['tipo_torneio'];
					$result_sit = mysqli_query($conectar,"SELECT * FROM tipo_torneio WHERE cod_tp_torneio = '$id_sit' ");
					$resultado_sit = mysqli_fetch_assoc($result_sit);
					echo "<tr>";
						echo "<td hidden='TRUE'>".$linhas['cod_cadastro_torneio']."</td>";
						echo "<td>".$linhas['nome_torneio']."</td>";
						echo "<td>".$linhas['flg_ranking']."</td>";
						echo "<td>".$resultado_sit['nome_tp']."</td>";
						echo "<td>".$linhas['peso_torneio']."</td>";
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

