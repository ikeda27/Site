<?php
	include_once("conexao.php");
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM usuarios WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Usuário</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=2&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_usuario.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_usuario.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" required placeholder="Nome Completo" value="<?php echo $resultado['nome']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" name="email" required placeholder="E-mail" value="<?php echo $resultado['email']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Usuário</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="usuario" required placeholder="Usuário" value="<?php echo $resultado['login']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Endereço</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="endereco" placeholder="endereco" value="<?php echo $resultado['endereco']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Documento</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" required name="documento" placeholder="documento" value="<?php echo $resultado['documento']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>
			<div class="col-sm-10">
			  <input type="tel" class="form-control" required name="telefone" placeholder="telefone" value="<?php echo $resultado['telefone']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Plano</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="plano" required placeholder="plano" value="<?php echo $resultado['plano']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Data Nascimento</label>
			<div class="col-sm-10">
			  <input type="date" class="form-control"  required name="nascimento"  placeholder="nascimento" value="<?php echo $resultado['nascimento']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" required name="senha" placeholder="Senha">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-10">
			  <select class="form-control" name="nivel_de_acesso">
					<option>Selecione</option>
					<option value="1"
					<?php
						if( $resultado['nivel_acesso_id'] == 1){
							echo 'selected';
						}
					?>
					>Administrativo</option>
					<option value="2"
					<?php
						if( $resultado['nivel_acesso_id'] == 2){
							echo 'selected';
						}
					?>
					>Usuário</option>
				</select>
			</div>
		  </div>
		  
		  <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

