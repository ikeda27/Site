<?php
if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Listar Vantagens</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>
<?php
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT * FROM vantagens ORDER BY flag_vantagem_ativo DESC");
	$linhas=mysqli_num_rows($resultado);
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Vantagens</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=32"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>			
			<th>Ativo</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr>";
						echo "<td>".$linhas['id_vantagem']."</td>";
						echo "<td>".$linhas['desc_vantagem']."</td>";
						echo "<td>".$linhas['flag_vantagem_ativo']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=33&id=<?php echo $linhas['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=34&id=<?php echo $linhas['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_vantagem.php?id=<?php echo $linhas['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

