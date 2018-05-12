
<?php
<<<<<<< HEAD
=======
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
>>>>>>> 23a105e6e864b353f2fbc0e38071801b2a44d224
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT * FROM cadastro_torneio WHERE situacao_id = 1 ORDER BY cod_cadastro_torneio");
	$linhas=mysqli_num_rows($resultado);
	$resultado_players=mysqli_query($conectar,"SELECT * FROM usuarios  WHERE cod_clube = 1 and flag_user_ativo = 1 ORDER BY nome");
	$linhas_players=mysqli_num_rows($resultado_players);
	?>

  <script type="text/javascript">
  	
  	function armazena_variaveis(){

	document.getElementById("armazena").disabled = true;
	document.getElementById("armazena1").disabled = true;
	document.getElementById("armazena2").disabled = true;
	document.getElementById("armazena3").disabled = true;
	document.getElementById("armazena4").disabled = true;
	document.getElementById("armazena5").disabled = true;
	document.getElementById("armazena6").disabled = true;

	}

	function marca_usuario(cod_usu) {
		
		
		var element = document.getElementById(cod_usu);
    		element.classList.add("hidden");
		}

	}

	function pesquisa() {
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("busca");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("lista");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}

	function contaCheckbox(){
	  var inputs, x, selecionados=0;
	  inputs = document.getElementsByTagName('checkbox_jogador');
	  for(x=0;x<inputs.length;x++){
	    if(inputs[x].type=='checkbox'){
	      if(inputs[x].checked==true && inputs[x].id == 'check'){
	        selecionados++;
	      }
	    }
	  }
	  document.getElementById('qtd_checkbox').value = selecionados;
	  return selecionados;
	}

  </script>

<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Abertura de Torneio</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=42'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">

	  <form class="form-horizontal" method="POST" id="armazena_form" action="processa/proc_calcula_torneio.php" onsubmit="contaCheckbox()">
	  	
	  	<div class="form-group">
			<label for="tipo_torneio" class="col-sm-2 control-label">Escolha o Torneio</label>
			<div class="col-sm-10">
				<select class="form-control " name="escolha_torneio" id="armazena">
				<?php
					// echo $linhas['cod_cadastro_torneio'];
					echo '<option value="">Selecione um Torneio</option>';
				  	while($linhas = mysqli_fetch_array($resultado)){
						echo '<option value="'.$linhas['cod_cadastro_torneio'].'">'.$linhas['nome_torneio'].'
						</option>';
					}
				?>
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<label for="vlr_entrada" class="col-sm-2 control-label">Valor da entrada:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control desabilitar" name="vlr_entrada" placeholder="Valor numerico"  id="armazena1" >
			</div>
		  </div>

		  <div class="form-group">
			<label for="qtd_max_rebuy" class="col-sm-2 control-label">Quantidade maxima de rebuy:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="qtd_max_rebuy" placeholder="Quantidade maxima de rebuy" id="armazena2">
			</div>
		  </div>

		  <div class="form-group">
			<label for="vlr_rebuy" class="col-sm-2 control-label">Valor do rebuy:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_rebuy" placeholder="Valor do rebuy"  id="armazena3">
			</div>
		  </div>

		  <div class="form-group">
			<label for="qtd_max_addon" class="col-sm-2 control-label">Quantidade maxima de addon:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="qtd_max_addon" placeholder="Quantidade maxima de addon" id="armazena4">
			</div>
		  </div>

		  <div class="form-group">
			<label for="vlr_addon" class="col-sm-2 control-label">Valor do addon:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="vlr_addon" placeholder="Valor do addon" id="armazena5">
			</div>
		  </div>

		  	<div class="form-group">
			<label for="qtd_max_player_mesa" class="col-sm-2 control-label">Quantidade maxima de player por mesa:</label>
			<div class="col-sm-10">
			  <select class="form-control" name="qtd_max_player_mesa" id="armazena6">
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
			  <button type="button" class="btn btn-danger" action="abertura_torneio.php" value="1" name="habilita_usuario" onclick="javascript:armazena_variaveis();" >Cadastrar Regras</button>
			</div>
		  </div>

		<div class="page-header">
			<h1> Selecionar jogadores iniciais</h1>
				<div class="input-group col-md-6">
				<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
				<input  type="text" onkeypress="pesquisa()" name="busca" id="busca">
			</div>
		</div>
		
		<div class="row" name="tabela_usuarios">
			<div class="col-md-6" style="height: 300px; overflow: auto;">
				<table class="table">
					<thead>
						<tr>
							<th>Nome jogador</th>
							<th>Plano</th>
							<th>Entrada</th>
						</tr>
					</thead>
					<tbody id="lista">
						<?php 
							while($linhas_players = mysqli_fetch_array($resultado_players)){
								$cont = 0;
								echo "<tr>";
									echo "<td>".$linhas_players['nome']."</td>";
									echo "<td>".$linhas_players['plano']."</td>";
									echo "<td><input name='jogador[]' type='checkbox' value='".$linhas_players['id']."'></td>";
							}	
							$cont++;
							echo "</tr>";
						?>
					</tbody>
				</table>
			</div>
		</div>	

		<button type="submit" class="btn btn-success"  name="calcula_torneio" href='administrativo.php?link=45' >Iniciar</button>
			</form>
		</div>	
	</div>
	</div>
</div> <!-- /container -->

