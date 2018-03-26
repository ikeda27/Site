<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Listar Mensagem Contato</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>
<?php
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT * FROM contatos ORDER BY id asc");
	$linhas=mysqli_num_rows($resultado);
	$contr_sob = $linhas;
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de mensagem de Contato</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=40"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Assunto</th>
			<th>Data</th>
			 <th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){					
					$carousel_id = $linhas['id'];
					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['assunto']."</td>";
						$data = $linhas['created'];
						echo "<td>".date('d/m/Y', strtotime($data))."</td>";
						?>
						<td> 
						<a href='#'><button type='button' class='btn btn-sm btn-info'>Enviar</button></a>

						<a href='#'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='#'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='#'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

