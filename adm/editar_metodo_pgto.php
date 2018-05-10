<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	include_once("conexao.php");
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM metodos_pgto WHERE cod_metodo_pgto = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Método de Pagamento</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=55'><button type='button' class='btn btn-sm btn-info'>Ver Métodos de Pagamento</button></a>
			
			<a href='processa/proc_apagar_metodo_pgto.php?id=<?php echo $resultado['cod_metodo_pgto']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_metodo_pgto.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="<?php echo $resultado['descricao_metodo_pgto']; ?>">
			</div>
		  </div>		  
		  
		  <input type="hidden" name="id" value="<?php echo $resultado['cod_metodo_pgto']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

