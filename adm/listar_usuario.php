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

    <title>Listar Usuario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>
<?php
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT u.*,n.nome_nivel FROM usuarios AS u INNER JOIN nivel_acessos AS n ON n.id=u.nivel_acesso_id ORDER BY u.id");
	$linhas=mysqli_num_rows($resultado);
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Usuário</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=3"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
		<table class="table">
	  		<tr>
	  			<td>
					<input id="ck_inativa" type="checkbox" onchange="inativos()" checked="">
						Exibir Inativos
				</td>
	  				<script type="text/javascript">
				    	checkbox = document.getElementById("ck_inativa");
				    	linhas = document.getElementsByClassName('linha_usuario');
					
						function inativos(){
							for(var i=0, n=linhas.length;i<n;i++) {
								var str = linhas[i].textContent;
							    var patt = new RegExp("Desativado");
							    var res = patt.test(str);

							    if(checkbox.checked){
							    	linhas[i].style.display = 'table-row';
							    }else{
								    if (res) {
								    	linhas[i].style.display = 'none';
								    }
							   }
							}
						};
					</script>
			</tr>
		</table>
	<table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Nivel de Acesso</th>
			<th>Ativo</th>
			<th>Cidade</th>
			<th>Ações</th>
			 
		  </tr>
		</thead>
		<tbody>
			<?php 
				$ativo = ""; 
				while($linhas = mysqli_fetch_array($resultado)){
					if ($linhas['flag_user_ativo'] > 0){
						$ativo = 'Ativado';
					}else{
						$ativo = 'Desativado';
					}
					echo "<tr class='linha_usuario' display='none'>";
						echo "<td id='id'>".$linhas['id']."</td>";
						echo "<td id='nome'>".$linhas['nome']."</td>";
						echo "<td id='email'>".$linhas['email']."</td>";
						echo "<td id='nome_nivel'>".$linhas['nome_nivel']."</td>";
						echo "<td id='flag_user_ativo'>".$ativo."</td>";
						echo "<td id='cidade'>".$linhas['cidade']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=5&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=4&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_usuario.php?id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

