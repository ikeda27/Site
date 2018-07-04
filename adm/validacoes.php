<?php
		//envio o charset para evitar problemas
		header("Content-Type: text/html; charset=ISO-8859-1");
		include_once("conexao.php");

		$sql = "SELECT * FROM usuarios WHERE login = '{$_POST['usuario']}' AND id = {$_POST['id']} ";
		$q = mysqli_query($conectar,$sql);//executo a query
		$usuario = mysqli_fetch_assoc($q); 

		if($usuario['login']==NULL){  
			$sql = "SELECT * FROM usuarios WHERE login = '{$_POST['usuario']}'";
			$q = mysqli_query($conectar,$sql);//executo a query
			$usuario = mysqli_fetch_assoc($q); 
				if ($usuario['login']<>NULL){ //verificação por id retornou algo?
					$sql = "SELECT * FROM usuarios WHERE id = {$_POST['id']}";
					$q = mysqli_query($conectar,$sql);//executo a query
					$usuario = mysqli_fetch_assoc($q); 
					echo "1|Login já existente!|".$usuario['login'];
				}
				else {
					echo "2|Login não existente!";
				}
		}
		else{ 
			echo "0|Login não alterado!";
		}
?>