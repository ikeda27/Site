
<<<<<<< HEAD
=======
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

>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
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
		  <div class="form-group">
			<label for="inputck1" class="col-sm-2 control-label">Check1</label>
			<div class="col-sm-10">
			  <input type="checkbox" class="form-control" name="ck1" placeholder="ckeck1" value="1">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputck2" class="col-sm-2 control-label">Check2</label>
			<div class="col-sm-10">
			  <input type="checkbox" class="form-control" name="ck2" placeholder="ckeck2" value="2">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputck3" class="col-sm-2 control-label">Check3</label>
			<div class="col-sm-10">
			  <input type="checkbox" class="form-control" name="ck3" placeholder="ckeck3" value="3">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputck4" class="col-sm-2 control-label">Check4</label>
			<div class="col-sm-10">
			  <input type="checkbox" class="form-control" name="ck4" placeholder="ckeck4" value="4">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputck5" class="col-sm-2 control-label">Check5</label>
			<div class="col-sm-10">
			  <input type="checkbox" class="form-control" name="ck5" placeholder="ckeck5" value="5">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputck6" class="col-sm-2 control-label">Check6</label>
			<div class="col-sm-10">
			  <input type="checkbox" class="form-control" name="ck6" placeholder="ckeck6" value="6">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

