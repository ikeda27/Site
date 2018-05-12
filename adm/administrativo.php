<?php
session_start();
include_once("seguranca.php");

if(isset($_SESSION['usuarioNome'])){
	$usuario_logado=$_SESSION['usuarioNome'];
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
	die();
}


include_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Ikeda">
    <link rel="icon" href="imagens/favicon.ico">
    <meta rel="">
    <title>Administrativo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/jquery_3_1.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/mascaras.js"></script>
    
 
  </head>

  <body role="document">
	<?php
		include_once("menu_admin.php");
		if(isset($_GET["link"])){
			$link = $_GET["link"];
		}else{
			$link = 0;
		}
		
		$pag[0] = "administrativo.php";
		$pag[1] = "bem_vindo.php";
		$pag[2] = "listar_usuario.php";
		$pag[3] = "cad_usuario.php";
		$pag[4] = "editar_usuario.php";		
		$pag[5] = "visual_usuario.php";
		$pag[6] = "cad_categoria.php";
		$pag[7] = "listar_categoria.php";
		$pag[8] = "visual_categoria.php";
		$pag[9] = "editar_categoria.php";
		$pag[10] = "listar_produto.php";
		$pag[11] = "cad_produto.php";
		$pag[12] = "visual_produto.php";
		$pag[13] = "editar_produto.php";
		$pag[14] = "listar_situacao.php";
		$pag[15] = "cad_situacao.php";
		$pag[16] = "visual_situacao.php";
		$pag[17] = "editar_situacao.php";
		$pag[18] = "listar_nivel_acesso.php";
		$pag[19] = "cad_nivel_acesso.php";
		$pag[20] = "visual_nivel_acesso.php";
		$pag[21] = "editar_nivel_acesso.php";
		$pag[22] = "listar_destaque_produto.php";
		$pag[23] = "cad_destaque_prod.php";
		$pag[24] = "cad_carousel.php";
		$pag[25] = "listar_carousel.php";
		$pag[26] = "listar_mensagem_contato.php";
		$pag[27] = "listar_plano.php";
		$pag[28] = "cad_plano.php";
		$pag[29] = "visual_plano.php";
		$pag[30] = "editar_plano.php";
		$pag[31] = "listar_vantagem.php";
		$pag[32] = "cad_vantagem.php";
		$pag[33] = "visual_vantagem.php";
		$pag[34] = "editar_vantagem.php";
		$pag[35] = "listar_fornecedor.php";
		$pag[36] = "cad_fornecedor.php";
		$pag[37] = "visual_fornecedor.php";
		$pag[38] = "editar_fornecedor.php";
		$pag[39] = "cad_vendas.php";
		$pag[40] = "cad_mensagem.php";
		$pag[41] = "cad_torneio.php";
		$pag[42] = "listar_torneio.php";
		$pag[43] = "editar_torneio.php";
		$pag[44] = "abertura_torneio.php";
		$pag[45] = "proc_calcula_torneio.php";
		$pag[46] = "visual_torneio.php";
		$pag[47] = "manipula_torneio_aberto.php";
		$pag[50] = "listar_vendas.php";
		$pag[51] = "listar_datatable.php";
		$pag[52] = "editar_vendas.php";
		$pag[53] = "visual_vendas.php";
		$pag[54] = "finalizar_vendas.php";
		$pag[55] = "listar_metodo_pgto.php";
		$pag[56] = "editar_metodo_pgto.php";
		$pag[57] = "cad_metodo_pagamento.php";

		if(!empty($link)){
			if(file_exists($pag[$link])){
				include $pag[$link];
			}else{
				include "bem_vindo.php";
			}
		}else{
			include "bem_vindo.php";
		}
		
	?>
    
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="js/ckeditor/ckeditor.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
