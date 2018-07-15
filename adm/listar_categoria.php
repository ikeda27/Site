
<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT * FROM categorias ORDER BY 'id'");
	$linhas=mysqli_num_rows($resultado);

?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Categoria</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=6"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>		
			<th>Situação</th>	
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>"; if ($linhas['tag'] == '0') {echo "Inativo";} else {echo "Ativo";}"</td>";
						
						?>
						<td> 
						<a href='administrativo.php?link=8&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-success'>Visualizar</button></a>&nbsp;&nbsp;
						<a href='administrativo.php?link=9&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Editar</button>
						</a>&nbsp;
						<a href='processa/proc_apagar_cat_prod.php?id=<?php echo $linhas['id']; ?>&inativ=1'><button type='button' class='btn btn-sm btn-warning'><?php
							if ($linhas['tag'] <> '0') {echo "Desativar";} else {echo "&nbsp;Reativar&nbsp;";}
						?>
						</button></a>
						<form method='post' class='btn btn-sm'> 
						<input type='submit' class='btn btn-sm btn-danger' id='enviar' name='enviar' value="Apagar">
						<input type='hidden' id='apagar_teste' name='apagar_teste' value="<?php echo $linhas['id'] ?>"></form>
						</td>
						
						<!-- ANTIGA FORMA DE EXCLUSÃO
						<a href='processa/proc_apagar_cat_prod.php?id=<?php # echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a> 
					-->
						
					<?php echo "</tr>"; 				
				}

				#<?php 
				# VALIDA A EXCLUSÃO SE HÁ VENDA E/OU PRODUTO RELACIONADO À CATEGORIA (NÃO PODE HAVER PARA PERMITIR A EXCLUSÃO)
				if(array_key_exists('apagar_teste',$_POST)){
				   $resultado_valida=mysqli_query($conectar,"SELECT produtos.categoria_id FROM vendas 
				         INNER JOIN venda_dados ON vendas.cod_venda = venda_dados.cod_venda INNER JOIN produtos ON produtos.id = venda_dados.cod_produto 
				         WHERE vendas.cod_clube ='".$_SESSION['clube']."' GROUP BY produtos.categoria_id");

				   $id_categoria = $_POST['apagar_teste'];
				   $manter = 0;

				   while($detalhes_valida = mysqli_fetch_array($resultado_valida)){
						if($detalhes_valida['categoria_id'] == $id_categoria){
							$manter = $manter + 1;
						}
				    }

				   if ($manter > 0) {
				   	  # POSSUI VENDA, CENÁRIO 1 - ABORTAR EXCLUSÃO
				   	  echo "<script>alert('Categoria possui venda vinculada, abortando exclusão!');</script>";
				   }else{

						  $resultado_valida=mysqli_query($conectar,"SELECT produtos.categoria_id FROM produtos 
						  	WHERE produtos.categoria_id ='".$id_categoria."' GROUP BY produtos.categoria_id");
						  $manter = 0;

					  while($detalhes_valida = mysqli_fetch_array($resultado_valida)){
						 if($detalhes_valida['categoria_id'] == $id_categoria){
						    $manter = $manter + 1;
						 }
					  }

					  if ($manter == 0) {
					  	 # NÃO POSSUI VENDA NEM PRODUTO, CENÁRIO 2 - PERMITIR A EXCLUSÃO
					  	 header("Location: ".'http://'.$_SERVER['HTTP_HOST']."/adm/processa/proc_apagar_cat_prod.php?id=".$id_categoria);
					  	 exit;
				  	  } else {
				  	  	 # POSSUI PRODUTO, CENÁRIO 3 - ABORTAR EXCLUSÃO
				  	  	 echo "<script>alert('Categoria possui produto vinculado, abortando exclusão!');</script>";
				  	  }
				   } 
				}
				


			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

