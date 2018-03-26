<?php
	$id = $_GET['id'];
	include_once("conexao.php");
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM produtos WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
	$id_cat = $resultado['categoria_id'];
	$result_cat = mysqli_query($conectar,"SELECT * FROM categorias WHERE id = '$id_cat' ");
	$resultado_cat = mysqli_fetch_assoc($result_cat);
	$id_sit = $resultado['situacao_id'];
	$result_sit = mysqli_query($conectar,"SELECT * FROM situacaos WHERE id = '$id_sit' ");
	$resultado_sit = mysqli_fetch_assoc($result_sit);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Produto</h1>
		
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=10'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=13&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_produto.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-9">
				<?php echo $resultado['id']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nome do Produto:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['nome']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Descrição Curta:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['descricao_curta']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Descricao Longa:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['descricao_longa']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Preço:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['preco']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Tag:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['tag']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Description:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['description']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Imagem:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php $foto = $resultado['imagem']; ?>
				<img src="<?php echo "../foto/$foto"; ?>" width="100" height="100">
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Situação:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado_sit['nome']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Categoria:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado_cat['nome']; ?>
			</div>
			
		</div>
	</div>
</div> <!-- /container -->

