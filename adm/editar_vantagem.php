<?php
	include_once("conexao.php");
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM vantagens WHERE id_vantagem = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Vantagem</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=31&id=<?php echo $resultado['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_pvantagem.php?id=<?php echo $resultado['id_vantagem']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_vantagem.php">
	  
		  <div class="form-group">
			<label for="inputNome" class="col-sm-2 control-label">Nome:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Plano" value="<?php echo $resultado['desc_vantagem']; ?>">
			</div>
		  </div>

		  <!-- CHECKBOX DE OPÇÕES DO PLANO -->
		  <div class="form-group">
			<label for="inputck1" class="col-sm-2 control-label">Ativo:</label>
			<div class="col-sm-10">
			  <input type="checkbox" class="form-control" name="ck1" placeholder="ckeck1" value="1">
			</div>
		  </div>
		  
		  
		  <input type="hidden" name="id" value="<?php echo $resultado['id_vantagem']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

