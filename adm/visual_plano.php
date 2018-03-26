<?php
	$id = $_GET['id'];
	include_once("conexao.php");
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM planos WHERE id_plano = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Plano</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=27&id=<?php echo $resultado['id_plano']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
				
			<a href='administrativo.php?link=30&id=<?php echo $resultado['id_plano']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_plano.php?id=<?php echo $resultado['id_plano']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-10">
				<?php  if(empty($resultado['id_plano'])) echo "-"; echo $resultado['id_plano']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Plano:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['desc_plano'])) echo "-"; echo $resultado['desc_plano']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Ativo:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['flag_plan_ativo'])) echo "-"; echo $resultado['flag_plan_ativo']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Vantagens:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  if(empty($resultado['vantagens_plano'])) echo "-"; else echo $resultado['vantagens_plano']; ?>
			</div>
			
		</div>
	</div>
</div> <!-- /container -->

