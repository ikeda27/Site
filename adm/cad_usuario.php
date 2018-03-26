
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Usuário</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=2&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_usuario.php">
	  
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
			  <input type="text" class="form-control" name="documento" placeholder="documento">
			</div>
		  </div>
		  
		  <!-- incluir padrão formatação de telefone -->
		  <div class="form-group">
			<label for="inputTelefone" class="col-sm-2 control-label">Telefone</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="telefone" placeholder="Telefone">
			</div>
		  </div>
		  
		  
		   <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Plano</label>
			<div class="col-sm-10">
			  <select class="form-control" name="nivel_plano">
				  <option value=1>B&aacute;sico</option>
				  <option value=2>Bronze</option>
				  <option value=3>Prata</option>
				  <option value=4>Ouro</option>
				  <option value=5>Diamante</option>
				</select>
			</div>
		  </div>
		  
		  <!-- incluir padrão formatação de moeda -->
		  <div class="form-group">
			<label for="inputSaldo" class="col-sm-2 control-label">Saldo</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="saldo" placeholder="Saldo">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputNasc" class="col-sm-2 control-label">Data Nascimento</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nascimento" placeholder="Nascimento">
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

