<?php
	include_once("conexao.php");
	$cod_clube=$_SESSION['clube'];
	$result=mysqli_query($conectar,"SELECT * FROM partida INNER JOIN torneio on torneio.cod_torneio=partida.cod_partida INNER JOIN usuarios ON usuarios.id=partida.cod_player where cod_club='$cod_club' AND sit_torneio=1 ");
	$resultado=mysqli_num_rows($result);
	$qtd_max_player_mesa=$resultado['qtd_max_player_mesa'];
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Usuarios em jogo: </h1>
	</div>
	
	 <div class="row espaco">
		<div class="pull-right">
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
		  	<th hidden="true">Cod Cliente</th>
		  	<th hidden="true">Cod Torneio</th>
			<th>Mesa</th>
			<th>Nome Player</th>
			<th>Qtd de rebuy</th>
			<th>Qtd addon</th>
			<th>Saldo a Pagar</th>
			<th>Funções</th>		 
		  </tr>
		</thead>
		<tbody>
			<form class="form-horizontal" method="POST" action="processa/proc_add_rebuy.php" >
			<?php 
				while($resultado = mysqli_fetch_array($result)){
					echo "<tr>";
						echo "<td name='id_cliente'>".$resultado['id']."</td>";
						echo "<td name='cod_torneio'>".$resultado['cod_torneio']."</td>";
						echo "<td>".$resultado['cod_mesa']."</td>";
						echo "<td>".$resultado['nome']."</td>";
						echo "<td name='qtd_rebuy>".$resultado['qtd_rebuy']."</td>";
						echo "<td name='qtd_addon>".$resultado['qtd_addon']."</td>";
						echo "<td>".((($resultado['vlr_rebuy']*$resultado['qtd_rebuy'])+$resultado['vlr_entrada'])+$resultado['vlr_addon']*$resultado['qtd_addon'])."</td>";
						?>
						<td> 
						<a href=""><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-eye-open align-left" aria-hidden="true"></span></button></a>
						
						<div class="btn-group">
						  <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil align-left" aria-hidden="true"></span>
						     <span class="caret "></span>
						  </button>
						  <ul class="dropdown-menu">
						    <li><button type='submit' name="rebuy" value="1" class='btn btn-sm btn-default'>Adcionar Rebuy</button></li>
						    <li><button type='submit' value="1" name="addon" class='btn btn-sm btn-default'>Adicionar Addon</button></li>
						  </ul>
						</div>
						
						<a href=""><button type='button' class='btn btn-sm btn-danger'><span class="glyphicon glyphicon-remove align-left" aria-hidden="true"></span></button></a>
						</td>
					<?php echo "</tr>";}?>
			</form>
		</tbody>
	  </table>
	</div>
	</div>
	</div> <!-- /container -->

