<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Listar Produto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>


<?php
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT * FROM produtos ORDER BY 'id'");
	$linhas=mysqli_num_rows($resultado);
	
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de fornecedor</h1>
	<?// echo $linhas ;?>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=36"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Preco</th>
			<th>Situação</th>
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					$id_sit = $linhas['situacao_id'];
					$result_sit = mysqli_query($conectar,"SELECT * FROM situacaos WHERE id = '$id_sit' ");
					$resultado_sit = mysqli_fetch_assoc($result_sit);
					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['preco']."</td>";
						echo "<td>".$resultado_sit['nome']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=12&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=13&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_produto.php?id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

