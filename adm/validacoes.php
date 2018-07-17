<?php
		//envio o charset para evitar problemas
		header("Content-Type: text/html; charset=ISO-8859-1");
		include_once("conexao.php");
		$campo = $_POST['campo'];
		$vlr_post_campo = $_POST[''.$campo.''];
		if ($_POST['acao']=='edit') {
			$sql = "SELECT * FROM usuarios WHERE $campo = '$vlr_post_campo' AND id <> {$_POST['id']} ";
			$q = mysqli_query($conectar,$sql);//executo a query
			$usuario = mysqli_num_rows($q);
		}elseif ($_POST['acao']=='cad') {
			$sql = "SELECT * FROM usuarios WHERE $campo = '$vlr_post_campo'";
			$q = mysqli_query($conectar,$sql);//executo a query
			$usuario = mysqli_num_rows($q);

		}

		if($usuario>0){ 
			echo "1|Já existe usuário com este ".$campo."!|".$usuario[''.$campo.''];
		}
		else {
			echo "0|";
		}
?>