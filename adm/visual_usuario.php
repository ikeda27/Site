<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	$id = $_GET['id'];
	include_once("conexao.php");
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM usuarios WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Usuário</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=2&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=4&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_usuario.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-10">
				<?php  if(empty($resultado['id'])) echo "-"; echo $resultado['id']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nome:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['nome'])) echo "-"; echo $resultado['nome']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>E-mail:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['email'])) echo "-"; echo $resultado['email']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Usuário:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['login'])) echo "-"; else echo $resultado['login']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nivel de Acesso:</b>
			</div>
			
			<div class="col-sm-3 col-md-10">
				<?php  if(empty($resultado['nivel_acesso_id'])) echo "-"; else echo $resultado['nivel_acesso_id']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Cliente Desde:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['created'])) echo "-"; else echo date('d/m/Y',strtotime($resultado['created'])); ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Endereço:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['endereco'])) echo "-"; else echo $resultado['endereco']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Documento:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['documento'])) echo "-"; else echo $resultado['documento']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Telefone:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['telefone'])) echo "-"; else echo $resultado['telefone']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Plano:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['plano'])) echo "-"; else echo $resultado['plano']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Data Nascimento:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['nascimento'])) echo "-"; else echo date('d/m/Y',strtotime($resultado['nascimento'])); ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Saldo:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['saldo'])) echo "-"; else echo $resultado['saldo']; ?>
			</div>
			
			
		</div>
	</div>
</div> <!-- /container -->

