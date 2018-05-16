<?php
	if(isset($_SESSION['usuarioNome'])){
		$usuario_logado=$_SESSION['usuarioNome'];
	}else{
		header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
		die();
	}
	$id = $_GET['id'];
	include_once("conexao.php");
	$result = mysqli_query($conectar,"SELECT * FROM cadastro_torneio WHERE cod_cadastro_torneio = '$id'");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualiza Torneio</h1>
	</div>
	
	<!-- Botoes de alteracao  -->
  	<div class="row col-md-8">
		<div class="pull-right">
			<a href="administrativo.php?link=42"><button type='button' class='btn btn-sm btn-info'><span class="glyphicon glyphicon-eye-open align-left" aria-hidden="true"></span></button></a>

			<a href="administrativo.php?link=43&id=<?php echo $id; ?>"><button type='button' class='btn btn-sm btn-warning'><span class="glyphicon glyphicon-pencil align-left" aria-hidden="true"></span></button></a>

			<a href="processa/proc_apagar_torneio.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-sm btn-danger'><span class="glyphicon glyphicon-remove align-left" aria-hidden="true"></span></button></a>
		</div>
	</div>

	<!-- Informacoes de torneios cadastrados -->
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Nome Torneio</b>
			</div>
			<div class=" col-sm-9 col-md-9">
				<?php echo $resultado['nome_torneio']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Torneio Rankeado:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php if ($resultado['flg_ranking']) {
					echo "Sim";
				} else {
					echo "Não";
				}
				?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Tipo do Torneio:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php
					$id_tipo = $resultado['tipo_torneio'];
					$result_tipo = mysqli_query($conectar,"SELECT * FROM tipo_torneio WHERE cod_tp_torneio = '$id_tipo' ");
					$resultado_tipo = mysqli_fetch_assoc($result_tipo); 
					echo $resultado_tipo['nome_tp']; 
					?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Peso Torneio:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['peso_torneio']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Data Criação Torneio:</b>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php echo $resultado['dt_torneio']; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

