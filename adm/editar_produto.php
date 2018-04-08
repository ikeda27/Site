<?php
	include_once("conexao.php");
	$id = $_GET['id'];
	$user = $_SESSION['usuarioId'];
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM produtos WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
	$id_produto = $resultado['id'];

	$result2 = mysqli_query($conectar,"SELECT * FROM estoque WHERE id_produto = '$id' LIMIT 1");
	$resultado2 = mysqli_fetch_assoc($result2);
	$qtd_produto = $resultado2['qtd_produto'];
?>

 <script type="text/javascript"> 
  	  		function numerico(evt){
				   
			   var charCode = (evt.which) ? evt.which : event.keyCode
			   if (charCode >= 48 && charCode <= 57)
			        return true;
			    return false;
			};
</script>

<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Produto</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=10&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_produto.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_produto.php" enctype="multipart/form-data">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Produto" value="<?php echo $resultado['nome']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_curta" placeholder="Descrição curta do produto"><?php echo $resultado['descricao_curta']; ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Preço</label>
			<div class="col-sm-10">
			  <input type="number" min='1' step='0.01' max='10000.00' class="form-control" name="preco" placeholder="<?php echo $resultado['preco']; ?>" value="<?php echo $resultado['preco']; ?>">
			</div>
		  </div>


		    <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Estoque</label>
			<div class="col-sm-10">
			  <input type="number" min='0' onkeypress='return numerico(event)' class="form-control" name="estoque" placeholder="<?php echo $qtd_produto; ?>">
			</div>
		  </div>

		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Foto do Produto (500x500)</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file"/>	
				</div>
		  </div>
		  
		  <?php 
		  $foto = $resultado['imagem'];
		  if($foto == ""){
			  ?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">	
						Foto Antiga
					</label>
					<div class="col-sm-10">
						O produto não possui imagem
					</div>
				</div>
			<?php
		  }
		  if($foto != ""){?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">	
						Foto do Produto Antiga
					</label>
					<div class="col-sm-10">
						<img src="<?php echo "../foto/$foto"; ?>" width="100" height="100">
						<input type="hidden" name="img_antiga" value='<?php echo $foto ?>'>
					</div>
				</div>
		  <?php } ?>
		  
		  <?php $categoria_id = $resultado['categoria_id'];  ?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Categorias</label>
			<div class="col-sm-10">
			  <select class="form-control" name="categoria_id">
				  <option>Selecione</option>
				  <?php 
						$result_cat =mysqli_query($conectar,"SELECT * FROM categorias");
						while($dados = mysqli_fetch_assoc($result_cat)){
							$id_categoria = $dados['id'];
							?>
								<option value="<?php echo $dados["id"]; ?>"<?php if($id_categoria == $categoria_id){ echo 'selected'; } ?>
								><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
		  <?php $situacao_id = $resultado['situacao_id'];?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
			  <select class="form-control" name="situacao_id">
				  <option>Selecione</option>
				  <?php 
						$result_sit =mysqli_query($conectar,"SELECT * FROM situacaos");
						while($dados = mysqli_fetch_assoc($result_sit)){
							$id_situacao = $dados['id'];
							?>
								<option value="<?php echo $dados["id"]; ?>"
								<?php if($id_situacao == $situacao_id){ echo 'selected'; } ?>
								><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
		  <input class="form-control" type="hidden" name="descricao_longa" value="-">
		  <input type="hidden" name="id" value="<?php echo $id_produto;?>">
		  <input type="hidden" name="user" value="<?php echo $user;?>">
		  <input type="hidden" class="form-control" name="description" placeholder="Description" value="-">
	  	  <input type="hidden" class="form-control" name="slug" placeholder="Nome do produto minúsculo" value="-">
	  	  <input type="hidden" class="form-control" name="tag" placeholder="Tag" value="-">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

