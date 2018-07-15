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
	$resultado=mysqli_query($conectar,"SELECT * FROM produtos ORDER BY 'id'");
	$linhas=mysqli_num_rows($resultado);
	
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Produtos</h1>
	<?// echo $linhas ;?>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=11"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Preco</th>
			<th>Situação</th>
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					$id_sit = $linhas['situacao_id'];
					$result_sit = mysqli_query($conectar,"SELECT * FROM situacaos WHERE id = '$id_sit' ");
					$resultado_sit = mysqli_fetch_assoc($result_sit);
					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['preco']."</td>";
						echo "<td>".$resultado_sit['nome']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=12&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-success'>Visualizar</button></a>&nbsp;&nbsp;
						<a href='administrativo.php?link=13&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Editar</button></a>
						&nbsp;
						<a href='processa/proc_apagar_produto.php?id=<?php echo $linhas['id']; ?>&inativ=1'><button type='button' class='btn btn-sm btn-warning'>
						<?php
							if ($resultado_sit['nome'] == "Ativado") {echo "Desativar";} else {echo "&nbsp;Reativar&nbsp;";}
						?>
						</button></a>

						<form method='post' class='btn btn-sm'> 
						<input type='submit' class='btn btn-sm btn-danger' id='enviar' name='enviar' value="Apagar">
						<input type='hidden' id='apagar_teste' name='apagar_teste' value="<?php echo $linhas['id'] ?>"></form>
						</td>
						<!--
						<a href='processa/proc_apagar_produto.php?id=<?php #echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						-->

						<?php
					echo "</tr>";
				}
					if(array_key_exists('apagar_teste',$_POST)){
					   $resultado_valida=mysqli_query($conectar,"SELECT venda_dados.cod_produto FROM vendas 
					         INNER JOIN venda_dados ON vendas.cod_venda = venda_dados.cod_venda INNER JOIN produtos ON produtos.id = venda_dados.cod_produto 
					         WHERE vendas.cod_clube ='".$_SESSION['clube']."' GROUP BY venda_dados.cod_produto");

					   $id_produto = $_POST['apagar_teste'];
					   $manter = 0;

					   while($detalhes_valida = mysqli_fetch_array($resultado_valida)){
							if($detalhes_valida['cod_produto'] == $id_produto){
								$manter = $manter + 1;
							}
					    }

					   if ($manter > 0) {
					   	  # POSSUI VENDA, CENÁRIO 1 - ABORTAR EXCLUSÃO
					   	  echo "<script>alert('Produto possui venda vinculada, abortando exclusão!');</script>";
					   }else{

						  	 # NÃO POSSUI VENDA NEM PRODUTO, CENÁRIO 2 - PERMITIR A EXCLUSÃO
						  	 header("Location: ".'http://'.$_SERVER['HTTP_HOST']."/adm/processa/proc_apagar_produto.php?id=".$id_produto);
						  	 exit;
					  	  } 
					   } 
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

