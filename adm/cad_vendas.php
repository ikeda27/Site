<?php
if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Venda</h1>
  </div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_usuario.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Comprador</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Comprador">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Produto</label>
			<div class="col-sm-10">

			  <!-- incluir apis de grid refido no bloco de notas -->

			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Quantidade:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control input-sm" name="usuario" placeholder="1">
			</div>
		  </div>		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Tipo de compra</label>
			<div class="col-sm-10">
			  <select class="form-control" name="nivel_de_acesso">
				  <option value="1">A vista</option>
				  <option value="2">Debito</option>
				  <option value="2">Credito</option>
				  <option value="2">Saldo em conta</option>
				</select>
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

