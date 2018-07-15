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
	<h1>Cadastrar Produto</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=10&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" id="form_produto" action="processa/proc_cad_produto.php" enctype="multipart/form-data">
	  	  <script type="text/javascript"> 
  	  		function numerico(evt){
				   
			   var charCode = (evt.which) ? evt.which : event.keyCode
			   if (charCode >= 48 && charCode <= 57)
			        return true;
			    return false;
			};



			window.onload=function() {
			    document.getElementById('form_produto').onsubmit=function() {
			    
			    var inputClass = document.getElementsByClassName('formInput');
			    for (var i = 0, ii = inputClass.length; i < ii ; i++) {
				   inputClass[i].addEventListener('blur', doSomething);
				}

				function doSomething() {
				    var inputField = this;
				    alert(inputField.value);
				}


			    var erro_no_form = 0;

			    var nome = document.getElementsByName("nome")[0].value;
			    var descricao_curta = "1";
			    var descricao_longa = "1";
			    var preco = document.getElementsByName("preco")[0].value;
			    var estoque = document.getElementsByName("estoque")[0].value;
			    var categoria_id = document.getElementsByName("categoria_id")[0].value;
			    var situacao_id = document.getElementsByName("situacao_id")[0].value;

			    if( nome == "" || descricao_curta == "" || preco == "" || estoque == "" || categoria_id == "Selecione" || situacao_id == "Selecione"){
			    	erro_no_form = 1;
			    }

			    if (erro_no_form > 0 ){
					alert("Há pendências no produto, revise por favor!");
					return false;
				}else{
					//alert("tudo ok!");
					return true;
				}
			  }
			};
		  </script>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome do Produto</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome do Produto">
			</div>
		  </div>
		  
		  <div class="form-group" id="desc_curta">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_curta" placeholder="Descrição curta do produto. Exemplo: Refrigerante 2 Litros"></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Preço</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="preco" id="dinheiro" placeholder="Preço">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Estoque</label>
			<div class="col-sm-10">
			  <input type="number" min='0' onkeypress='return numerico(event)' class="form-control" name="estoque" placeholder="estoque">
			</div>
		  </div>

		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Foto do Produto (Opcional)</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file" required/>	
				</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Categorias</label>
			<div class="col-sm-10">
			  <select class="form-control" name="categoria_id">
				  <option>Selecione</option>
				  <?php 
						$resultado =mysqli_query($conectar, "SELECT * FROM categorias");
						while($dados = mysqli_fetch_assoc($resultado)){
							?>
								<option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
			  <select class="form-control" name="situacao_id">
				  <option>Selecione</option>
				  <?php 
						$resultado =mysqli_query($conectar, "SELECT * FROM situacaos");
						while($dados = mysqli_fetch_assoc($resultado)){
							?>
								<option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<div class="col-sm-10">
			  <input type="hidden" class="form-control" name="user" placeholder="user" value='<?php echo $_SESSION['usuarioId']; ?>'>
			  <input type="hidden" class="form-control" name="description" placeholder="Description" value="-">
		  	  <input type="hidden" class="form-control" name="slug" placeholder="Nome do produto minúsculo" value="-">
		  	  <input type="hidden" class="form-control" name="tag" placeholder="Tag" value="-">
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

