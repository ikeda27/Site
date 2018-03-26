<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$qtd_max_player_mesa 	= (int) $_POST["qtd_max_player_mesa"];
$players_torneio[] 		= $_POST["checkbox_jogador"];
$id=null;
$qtd_players=0;
foreach ($players_torneio[0] as $key => $value) {
	$id.=(int) $value.";";
	$qtd_players++;
}

//verificar metodo onde o maximo é simultaneamente o minimo , e o restante de players tem que aguardar.


if ($qtd_players>$qtd_max_player_mesa ) {

	$qtd_mesa_abrir=ceil($qtd_players/$qtd_max_player_mesa);
}

else{$qtd_mesa_abrir= 1;}

	$minimo_mesa=1;
	$minimo_player_mesa=1;
	
	$mesa=array($minimo_mesa=1 => array($minimo_player_mesa=1));

while ( $qtd_mesa_abrir>0) {	

foreach ($players_torneio[0] as $key => $value) {

	if ($mesa[$minimo_mesa][$minimo_player_mesa]==$mesa[$qtd_mesa_abrir][$qtd_max_player_mesa])

		{ 
			$query=mysqli_query($conectar,"INSERT INTO partida (cod_partida, data_partida, qtd_rebuy, qtd_entrada, cod_player, qtd_addon, cod_mesa) VALUES ('$mesa[$minimo_mesa]', NOW(), '0', '1', '$id' , '0' ,'$mesa[$minimo_mesa]')");

			if ($mesa[sizeof($minimo_mesa)] == $mesa[sizeof($qtd_mesa_abrir)]) 
			
				{

				$minimo_player_mesa++;	
			
				}

			else{

			$minimo_mesa++;

				}
		}	

		$players_torneio++;
	
	}

$qtd_mesa_abrir--;

}
?>