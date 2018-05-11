<?php	
	$resultado=mysqli_query($conectar, "SELECT * FROM categorias ORDER BY 'id'");
	$linhas=mysqli_num_rows($resultado);
?>	
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/home'; ?>">LOGO</a>
	</div>
	
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/home'; ?>">Home</a></li>            
		<li class="dropdown">
		  <a href="produto.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<?php 
				//lista as categorias de produto
				while($linhas = mysqli_fetch_array($resultado)){
				?><li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/produto/'.$linhas['id'].'/'.$linhas['slug']; ?>"><?php echo $linhas['nome']; ?></a></li>	
			<?php } //fim lista as categorias de produto?>			
		  </ul>
		</li>
		<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/empresa'; ?>">Empresa</a></li>
		<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/contato'; ?>">Contato</a></li>
		<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/adm/'; ?>">Login</a></li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>
	