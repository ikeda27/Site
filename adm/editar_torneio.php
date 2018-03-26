<?php
	include_once("conexao.php");
	$cod_torn = $_GET['id'];
	//Executa consulta
	$result = mysqli_query($conectar,"SELECT * FROM cadastro_torneio WHERE cod_cadastro_torneio = '$cod_torn' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Torneio</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=42&id=<?php echo $resultado['cod_cadastro_torneio']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_usuario.php?id=<?php echo $resultado['cod_cadastro_torneio']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_torneio.php">

		 <div class="form-group">
			<label for="cod_torneio" class="col-sm-2 control-label">Código do torneio</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="cod_torneio" placeholder="Nome do torneio" value="<?php echo $resultado['cod_cadastro_torneio']; ?>">
			</div>
		 </div>
	  	
		 <div class="form-group">
			<label for="nome_torneio" class="col-sm-2 control-label">Nome do torneio</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome_torneio" placeholder="Nome do torneio" value="<?php echo $resultado['nome_torneio']; ?>">
			</div>
		 </div>
		  
		  <div class="form-group">
		  	<label for="flg_ranking" class="col-sm-2 control-label">Rankeado?</label>
			<div class="col-sm-2 col-sm-offset-0">
				<label><input type="radio" name="flg_ranking" value="1" <?php if( $resultado['flg_ranking'] == 1) { echo 'CHECKED'; } ?>>Sim</label>
			</div>
			<div class="col-sm-2">
				<label><input type="radio" name="flg_ranking" value="0" <?php if( $resultado['flg_ranking'] == 0) { echo 'CHECKED'; } ?>>Não</label>
			</div>
		  </div>
 
 		  <div class="form-group">
			<label for="tipo_torneio" class="col-sm-2 control-label">Tipo de Torneio</label>
			<div class="col-sm-10">
			  <select class="form-control" name="tipo_torneio">
				  <option value="1">Free Hold</option>
				  <option value="2">Mata a Mata</option>
				  <option value="3">Um outro</option>
				  <option value="4">E mais um</option>
				</select>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="peso" class="col-sm-2 control-label">Peso do torneio</label>
			<div class="col-sm-10">
			  <select class="form-control" name="peso">
				  <option value="1" <?php if( $resultado['peso_torneio'] == 1){ echo 'selected'; } ?>>1</option>
				  <option value="2" <?php if( $resultado['peso_torneio'] == 2){ echo 'selected'; } ?>>2</option>
				  <option value="3" <?php if( $resultado['peso_torneio'] == 3){ echo 'selected'; } ?>>3</option>
				</select>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="vlr_entrada" class="col-sm-2 control-label">Valor da entrada:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_entrada" placeholder="Valor numerico" value="<?php echo $resultado['vlr_entrada']; ?>">
			</div>
		  </div>

		  <div class="form-group">
			<label for="qtd_max_rebuy" class="col-sm-2 control-label">Quantidade maxima de rebuy:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="qtd_max_rebuy" placeholder="Quantidade maxima de rebuy" value="<?php echo $resultado['qtd_max_rebuy']; ?>">
			</div>
		  </div>

		  <div class="form-group">
			<label for="vlr_rebuy" class="col-sm-2 control-label">Valor do rebuy:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_rebuy" placeholder="Valor do rebuy" value="<?php echo $resultado['vlr_rebuy']; ?>">
			</div>
		  </div>

		   <div class="form-group">
			<label for="qtd_max_addon" class="col-sm-2 control-label">Quantidade maxima de addon:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="qtd_max_addon" placeholder="Quantidade maxima de addon" value="<?php echo $resultado['qtd_max_addon']; ?>">
			</div>
		  </div>

		  <div class="form-group">
			<label for="vlr_addon" class="col-sm-2 control-label">Valor do addon:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_addon" placeholder="Valor do addon" value="<?php echo $resultado['vlr_addon']; ?>">
			</div>
		  </div>

		  	<div class="form-group">
			<label for="qtd_max_player_mesa" class="col-sm-2 control-label">Quantidade maxima de player por mesa:</label>
			<div class="col-sm-10">
			  <select class="form-control" name="qtd_max_player_mesa">
				  <option value="3" <?php if( $resultado['qtd_max_player_mesa'] == 3){ echo 'selected'; } ?>>3</option>
				  <option value="4" <?php if( $resultado['qtd_max_player_mesa'] == 4){ echo 'selected'; } ?>>4</option>
				  <option value="5" <?php if( $resultado['qtd_max_player_mesa'] == 5){ echo 'selected'; } ?>>5</option>
				  <option value="6" <?php if( $resultado['qtd_max_player_mesa'] == 6){ echo 'selected'; } ?>>6</option>
				  <option value="7" <?php if( $resultado['qtd_max_player_mesa'] == 7){ echo 'selected'; } ?>>7</option>
				  <option value="8" <?php if( $resultado['qtd_max_player_mesa'] == 8){ echo 'selected'; } ?>>8</option>
				  <option value="9" <?php if( $resultado['qtd_max_player_mesa'] == 9){ echo 'selected'; } ?>>9</option>
				  <option value="10" <?php if( $resultado['qtd_max_player_mesa'] == 10){ echo 'selected'; } ?>>10</option>
				</select>
			</div>
		  </div>
		  
		  <input type="hidden" name="id" value="<?php echo $resultado['cod_cadastro_torneio']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

