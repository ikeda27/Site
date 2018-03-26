<?php
	$id = $_GET['id'];
	include_once("conexao.php");
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM vantagens WHERE id_vantagem = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Vantagem</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=31&id=<?php echo $resultado['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
				
			<a href='administrativo.php?link=34&id=<?php echo $resultado['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_vantagem.php?id=<?php echo $resultado['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-10">
				<?php  if(empty($resultado['id_vantagem'])) echo "-"; echo $resultado['id_vantagem']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nome:</b>
			</div>
			
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['desc_vantagem'])) echo "-"; echo $resultado['desc_vantagem']; ?>
			</div>
			<div class="col-sm-3 col-md-2">
				<b>Situação:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['flag_vantagem_ativo'])) echo "-"; echo $resultado['flag_vantagem_ativo']; ?>
			</div>
			
			
		</div>
	</div>
</div> <!-- /container -->

