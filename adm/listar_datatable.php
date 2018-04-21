<?php
if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Listar Produto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>


<?php
	include_once("conexao.php");
	$resultado=mysqli_query($conectar,"SELECT fim.*, CASE WHEN e.qtd_produto IS NULL THEN 0 ELSE e.qtd_produto END AS qtd_produto FROM (SELECT x.nome, x.preco, x.imagem, x.categoria, s.nome AS situacao, x.prod_id AS id FROM
		(SELECT p.nome, p.preco, p.imagem, p.situacao_id, p.id AS prod_id, c.nome AS categoria FROM produtos AS p LEFT JOIN categorias AS c ON p.categoria_id = c.id) AS x LEFT JOIN situacaos AS s ON x.situacao_id = s.id) AS fim LEFT JOIN estoque AS e ON e.id_produto = fim.id") ;
	$linhas=mysqli_num_rows($resultado);
	
	if (isset($_POST["cliente_search"])){
		$cliente_search=$_POST["cliente_search"];
		$result=mysqli_query($conectar,"SELECT id, nome FROM usuarios WHERE nome LIKE '%".$_POST["cliente_search"]."%'");
	}else{
		$cliente_search="";
		$result=mysqli_query($conectar,"SELECT id, nome FROM usuarios");
	}

?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1 >Lista de Produtos</h1>
  </div>
  <div class="row espaco">
		
		<div class="col-md-12">
		<div class="pull-left">
		<div class="col-sm-5">
		<input type='text' id="cx_textos" placeholder='Filtre o Cliente' class="form-control" name="cliente_search" onkeypress="procura_clientes()" value=<?php echo "'".$cliente_search."'"; ?> >
		</div>
		
		<div class="col-sm-7">
		<select id="cliente" class="form-control">
			<?php
				echo "<option onclick='recolher_drop()' value='0' >Lista de Clientes</option>";
				while($linhas = mysqli_fetch_array($result)){
					echo "<option onclick='recolher_drop()'value='".$linhas['id']."'>".$linhas['nome']."</option>";
				}
			?>
		</select>
	</div>
	</div>
	<div class="pull-right">
		<table><tr>	
				<td><input id="ck_inativa" type="checkbox" onchange="inativos()" checked="UnChecked">Exibir Inativos</td>
				<script type="text/javascript">
			    	checkbox = document.getElementById("ck_inativa");
			    	linhas = document.getElementsByClassName('linha_produto');
					selects = document.getElementById("cliente");
					selects_bkp = selects;

					 function inativos(){
						for(var i=0, n=linhas.length;i<n;i++) {
							var str = linhas[i].textContent;
						    var patt = new RegExp("Desativado");
						    var res = patt.test(str);

						    if(checkbox.checked){
						    	linhas[i].style.display = 'table-row';
						    }else{
							    if (res) {
							    	linhas[i].style.display = 'none';
							    }
						   }
						}
					};


					function procura_clientes(){
						selects = selects_bkp;
						cx_texto = document.getElementById("cx_textos");

						var patt = new RegExp(cx_texto.value);

						for(var i=0, n=selects.length;i<n;i++) {
							var str = selects[i].textContent;
						    var res = patt.test(str);

							if (!res) {
								/*selects.options.remove(i);*/
								selects[i].style.display='none';
							}else{
								selects[i].style.display='block';
							}
						}

						selects.size = selects.options.length;

					};

					
					function recolher_drop(){
						selects = document.getElementById("cliente");
						selects.size = 0;
					};


					function post() {
					    var erro_qtd_prod = 0;
					    var form = $('<form></form>');

					    form.attr("method", "post");
					    form.attr("action", "processa/proc_cad_vendas.php");
					    var field = $('<input></input>');

					    cliente = document.getElementById("cliente");

					    ck_marcados = document.getElementsByClassName("ck_prod");
					    var produtos_id="";
					    var temp_id = "";
					    var temp_valor = "";
					    var temp_qtde = "";
					    var temp_estoque = "";
					    var qtde_produto = "";
					    var valor_produto = "";
					    var marcados = 0;
					    for(var i=0, n=ck_marcados.length;i<n;i++) {
					    	if(ck_marcados[i].checked){
					    		marcados = marcados + 1;
					    		temp_id = ck_marcados[i].value;
					    		temp_valor = "preco_id_" + temp_id;
					    		temp_valor = document.getElementById(temp_valor).innerHTML;
					    		temp_estoque = "td_estoque_" + temp_id;
					    		temp_estoque = document.getElementById(temp_estoque).innerHTML;
					    		//temp_estoque = "est_id_" + temp_id;
					    		//temp_estoque = document.getElementsByClassName(temp_estoque).innerHTML;

					    		if(temp_estoque == undefined){temp_estoque = 0;}
					    		temp_qtde = "qtd_id_" + temp_id;
					    		temp_qtde = document.getElementById(temp_qtde).value;

					    		if (temp_qtde > temp_estoque) {
					    			erro_qtd_prod = 1;
					    		}

					    		//alert("DEBUG: qtde= "+temp_qtde+" estoque= "+temp_estoque+" qtd > estoque= "+erro_qtd_prod);

					    		if(produtos_id==""){
					    			produtos_id   = temp_id;
					    			valor_produto = temp_valor;
					    			qtde_produto = temp_qtde;
					    		}else{
					    			produtos_id=produtos_id.concat('-',temp_id);
					    			valor_produto=valor_produto.concat('-',temp_valor);
					    			qtde_produto=qtde_produto.concat('-',temp_qtde);
					    		}
					    		
					    	}
					    	
					    }

					    
					    field.attr("type", "hidden");
				        field.attr("name", "id_cliente");
				        field.attr("value", cliente.value);
				        form.append(field);				        

				        field = $('<input></input>');
				        field.attr("type", "hidden");
				        field.attr("name", "valor_produto");
				        field.attr("value", valor_produto);
				        form.append(field);

				        field = $('<input></input>');
				        field.attr("type", "hidden");
				        field.attr("name", "qtde_produto");
				        field.attr("value", qtde_produto);
				        form.append(field);

				        field = $('<input></input>');
				        field.attr("type", "hidden");
				        field.attr("name", "cod_produtos");
				        field.attr("value", produtos_id);
				        form.append(field);

						if (erro_qtd_prod == 0 && marcados > 0 && cliente.value > 0){
					    	$(document.body).append(form);
					    	form.submit();
					    }else{
					    	alert("Revise por favor: Produtos ou cliente sem seleção, quantidade acima do estoque!");
					    }
					    
					};

					function numerico(evt){
					   
					   var charCode = (evt.which) ? evt.which : event.keyCode
					   if (charCode >= 48 && charCode <= 57)
					        return true;
					    return false;
					};

			    </script>
			
			<td><button type='button' class='btn btn-sm btn-success' onclick="post()">Vender</button></td>
		</tr>
		</table>
	</div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>Imagem</th>
			<th>Nome</th>
			<th>Preço</th>
			<th>Qtde</th>
			<th>Estoque</th>
			<th>Categoria</th>
			<th>Situação</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr class='linha_produto' display='none'>";
					
					echo "<td id='td_img'><img src='../foto/".$linhas['imagem']."' width = '50' height = '50'></td>";
					echo "<td id='td_nome'>".$linhas['nome']."</td>";
					echo "<td id='preco_id_".$linhas['id']."'>".$linhas['preco']."</td>";
					echo "<td id='td_qtde'> <input type='number' min='0' onkeypress='return numerico(event)' id='qtd_id_".$linhas['id']."' value='0' size='3'> </td>";
					echo "<td id='td_estoque_".$linhas['id']."' class='est_id_".$linhas['id']."'>".$linhas['qtd_produto']."</td>";
					echo "<td id='td_categoria'>".$linhas['categoria']."</td>";
					echo "<td id='td_situacao'>".$linhas['situacao']."</td>";
					?>
					<td> 
					<input id=<?php echo "'ck_id_".$linhas['id']."'"; ?> type="checkbox" class="ck_prod" value=<?php echo "'".$linhas['id']."'";?> name=<?php echo "'ck_".$linhas['nome']."'";  
					if($linhas['situacao'] == 'Desativado'){ echo " disabled"; } ;
					?> value=>
					<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
</div>
</div> <!-- /container -->

