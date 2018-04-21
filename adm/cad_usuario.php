<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}

	include_once("conexao.php");
	$cod_clube=$_SESSION['clube'];
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM planos  WHERE id_clube='$cod_clube'");
	$resultado = mysqli_fetch_assoc($result);
?>


<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Usuário</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=2'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_usuario.php" name="form_cad_usu">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" name="email" placeholder="E-mail">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Usuário</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="usuario" placeholder="Usuário">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" name="senha" placeholder="Senha">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-10">
			  <select class="form-control" name="nivel_de_acesso">
				  <option value="1">Administrativo</option>
				  <option value="2">Usuário</option>
				</select>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="endereco" placeholder="Endereco">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputDocumento" class="col-sm-2 control-label">Documento</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="documento" placeholder="CPF" id="cpf">
			</div>
		  </div>
		  
		  <!-- incluir padrão formatação de telefone -->
		  <div class="form-group">
			<label for="inputTelefone" class="col-sm-2 control-label">Celular</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="telefone" placeholder="Celular" id="tel">
			</div>
		  </div>
		  
		  
		   <div class="form-group">
			<label for="nivel_plano" class="col-sm-2 control-label">Plano</label>
			<div class="col-sm-10">
			  <select class="form-control" name="nivel_plano">
			  <?php

			  while ($resultado = mysqli_fetch_array($result)) {
			  	
		  	echo "<option value='".$resultado['id_plano']."'>".$resultado['desc_plano']."</option>";
		  } 

			  ?>
				</select>
			</div>
		  </div>
		  
		  <!-- incluir padrão formatação de moeda -->
		  <div class="form-group">
			<label for="inputSaldo" class="col-sm-2 control-label">Saldo</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="saldo" placeholder="Saldo" id="dinheiro">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputNasc" class="col-sm-2 control-label">Data Nascimento</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nascimento" placeholder="Nascimento" id="data">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" onclick="validar_cad_usu();" class="btn btn-success">Cadastrar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

