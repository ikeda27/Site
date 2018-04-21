<?php
ob_start();

if (!(isset($_SESSION['usuarioNome']))){
	
	unset($_SESSION['usuarioId'],			
		  $_SESSION['usuarioNome'], 		
		  $_SESSION['usuarioNivelAcesso'], 
		  $_SESSION['usuarioLogin'], 		
		  $_SESSION['usuarioSenha']);

	$_SESSION['loginErro'] = "Área restrita para usuários cadastrados";
	
	//Manda o usuário para a tela de login
	header("Location: http://".$_SERVER['HTTP_HOST']."/adm/index.php");
}