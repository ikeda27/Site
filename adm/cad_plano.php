
<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	
	$cod_clube = $_SESSION['clube'];
	$result = mysqli_query($conectar,"SELECT * FROM vantagens WHERE flag_vantagem_ativo=1 AND id_clube='$cod_clube' ");
	$resultado = mysqli_num_rows($result);
?>

<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Plano</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=2&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_plano.php">
	  
		  <div class="form-group">
			<label for="inputNome" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
			</div>
		  </div>

		  <!-- CHECKBOX DE OPÇÕES DO PLANO -->

		  <?php $name=1;

		   while ($resultado = mysqli_fetch_array($result)) {
		  	echo "<div class='form-group'>";
		  	echo "<label for='".$name."' class='col-sm-2 control-label'>".$resultado['desc_vantagem']."</label>";
		  	echo "<div class='col-sm-10'>";
		  	echo "<input type='checkbox' class='form-control' name='".$name."' value='".$resultado['id_vantagem']."'>";
		  	echo "</div>";
		  	echo "</div>";
		  	$name++;
		  } ?>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

