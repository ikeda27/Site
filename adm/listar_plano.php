<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Listar Planos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>
<?php
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT * FROM planos ORDER BY flag_plan_ativo DESC");
	$linhas=mysqli_num_rows($resultado);
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Planos</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=28"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>			
			<th>Vantagens</th>
			<th>Ativo</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr>";
						echo "<td>".$linhas['id_plano']."</td>";
						echo "<td>".$linhas['desc_plano']."</td>";
						echo "<td>".$linhas['vantagens_plano']."</td>";
						echo "<td>".$linhas['flag_plan_ativo']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=29&id=<?php echo $linhas['id_plano']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=30&id=<?php echo $linhas['id_plano']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_plano.php?id=<?php echo $linhas['id_plano']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

