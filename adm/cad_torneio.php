
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Torneio</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=42'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_torneio.php">
	  
		  <div class="form-group">
			<label for="nome_torneio" class="col-sm-2 control-label">Nome do torneio</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome_torneio" placeholder="Nome do torneio">
			</div>
		  </div>
		  
		  <div class="form-group">
		  	<label for="flg_ranking" class="col-sm-2 control-label">Rankeado?</label>
			<div class="col-sm-2 col-sm-offset-0">
				<label><input type="radio" name="flg_ranking" value="1">Sim</label>
			</div>
			<div class="col-sm-2">
				<label><input type="radio" name="flg_ranking" value="0">Não</label>
			</div>
		  </div>
 
 		  <div class="form-group">
			<label for="tipo_torneio" class="col-sm-2 control-label">Tipo de Torneio</label>
			<div class="col-sm-10">
			  <select class="form-control" name="tipo_torneio">
				  <option value="1">Freeroll</option>
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
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				</select>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="vlr_entrada" class="col-sm-2 control-label">Valor da entrada:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_entrada" placeholder="Valor numerico">
			</div>
		  </div>

		  <div class="form-group">
			<label for="qtd_max_rebuy" class="col-sm-2 control-label">Quantidade maxima de rebuy:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="qtd_max_rebuy" placeholder="Quantidade maxima de rebuy">
			</div>
		  </div>

		  <div class="form-group">
			<label for="vlr_rebuy" class="col-sm-2 control-label">Valor do rebuy:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_rebuy" placeholder="Valor do rebuy">
			</div>
		  </div>

		   <div class="form-group">
			<label for="qtd_max_addon" class="col-sm-2 control-label">Quantidade maxima de addon:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="qtd_max_addon" placeholder="Quantidade maxima de addon">
			</div>
		  </div>

		  <div class="form-group">
			<label for="vlr_addon" class="col-sm-2 control-label">Valor do addon:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_addon" placeholder="Valor do addon">
			</div>
		  </div>

		  	<div class="form-group">
			<label for="qtd_max_player_mesa" class="col-sm-2 control-label">Quantidade maxima de player por mesa:</label>
			<div class="col-sm-10">
			  <select class="form-control" name="qtd_max_player_mesa">
				  <option value="3">3</option>
				  <option value="4">4</option>
				  <option value="5">5</option>
				  <option value="6">6</option>
				  <option value="7">7</option>
				  <option value="8">8</option>
				  <option value="9">9</option>
				  <option value="10">10</option>
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

