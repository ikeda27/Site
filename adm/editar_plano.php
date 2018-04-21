<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	include_once("conexao.php");
	$id = $_GET['id'];
	$cod_clube=$_SESSION['clube'];
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM planos WHERE id_plano = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
	$result_vantagens = mysqli_query($conectar,"SELECT * FROM vantagens  WHERE id_clube='$cod_clube'");
	$resultado_vantagens = mysqli_fetch_assoc($result_vantagens);

?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Plano</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=27&id=<?php echo $resultado['id_plano']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_plano.php?id=<?php echo $resultado['id_plano']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_plano.php">
	  
		  <div class="form-group">
			<label for="inputNome" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Plano" value="<?php echo $resultado['desc_plano']; ?>">
			</div>
		  </div>
		  
		  <!-- CHECKBOX DE OPÇÕES DO PLANO -->
			<?php $name=1;

		   while ($resultado_vantagens = mysqli_fetch_array($result_vantagens)) {
		  	echo "<div class='form-group'>";
		  	echo "<label for='".$name."' class='col-sm-2 control-label'>".$resultado_vantagens['desc_vantagem']."</label>";
		  	echo "<div class='col-sm-10'>";
		  	echo "<input type='checkbox' class='form-control' name='".$name."' value='".$resultado_vantagens['id_vantagem']."'>";
		  	echo "</div>";
		  	echo "</div>";
		  	$name++;
		  } ?>	

		  <input type="hidden" name="id" value="<?php echo $resultado['id_plano']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

