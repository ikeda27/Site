
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
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					$id_tipo = $linhas['tipo_torneio'];
					$result_tipo = mysqli_query($conectar,"SELECT * FROM tipo_torneio WHERE cod_tp_torneio = '$id_tipo' ");
					$resultado_tipo = mysqli_fetch_assoc($result_tipo);
					echo "<tr>";
						echo "<td hidden='TRUE'>".$linhas['cod_cadastro_torneio']."</td>";
						echo "<td>".$linhas['nome_torneio']."</td>";
						echo "<td>".$linhas['flg_ranking']."</td>";
						echo "<td>".$resultado_tipo['nome_tp']."</td>";
						echo "<td>".$linhas['peso_torneio']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=46&id=<?php echo $linhas['cod_cadastro_torneio']; ?>'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-eye-open align-left" aria-hidden="true"></span></button></a>
						
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

