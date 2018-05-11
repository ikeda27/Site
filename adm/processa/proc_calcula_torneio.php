<?php
session_start();
include_once("../conexao.php");
$qtd_max_player_mesa 	= (int) $_POST["qtd_max_player_mesa"];
$players_torneio[] 		= $_POST["checkbox_jogador"];
$cod_torneio 			= $_POST["escolha_torneio"];
$vlr_entrada	 		= $_POST["vlr_entrada"];
$qtd_max_rebuy	 		= $_POST["qtd_max_rebuy"];
$vlr_rebuy		 		= $_POST["vlr_rebuy"];
$qtd_max_addon 			= $_POST["qtd_max_addon"];
$vlr_addon				= $_POST["vlr_addon"];
$id=null;
$qtd_players=0;
$posicao=0;

//Carrega a tabela usuario, para cruzar com os códigos trazidos da abertura 
$info_jogadores=mysqli_query($conectar,"SELECT * FROM usuarios");
$jogares=mysqli_num_rows($info_jogadores);



//Verifica quantos jogadores foram trazidos da abertura
foreach ($players_torneio[0] as $key => $value) {
	
	$id.=(int) $value.";";
	$qtd_players++;
}


//Agregando as posições de forma aleaória
foreach ($players_torneio[0] as $key => $value) {

	//Cria array para armazenar posições e atribui ao primeiro jogador
	if ($key == 0) {
		$posicao = rand(1, $qtd_players);
		$cadeira[0][0] = $value;
		$cadeira[0][1] = $posicao;
	}
	//Percorre o array, verifica se a posição gerada já existe e atribui ao ao jogador	
	else {
		$posicao = rand(1, $qtd_players);
		$i=0;
		while (isset($cadeira[$i][0])) {
			$temp = $cadeira[$i][1];
			if ($temp == $posicao) {
				$i=0;
				$posicao = rand(1, $qtd_players);
			}
			else {
				$i++;
			}

		}
		$cadeira[$i][0] = $value;
		$cadeira[$i][1] = $posicao;
	}

}

foreach ($cadeira[0] as $key => $value) {

	$mesa=ceil($cadeira[$key][1]/$qtd_max_player_mesa);
	$posicao_mesa=(floor($cadeira[$key][1]/$qtd_max_player_mesa)*$qtd_max_player_mesa)-$cadeira[$key][1];
	//verificar cod_mesa

	$query=mysqli_query($conectar,"INSERT INTO partida (cod_partida, data_partida, qtd_rebuy, qtd_entrada, cod_player, qtd_addon, cod_mesa) VALUES ('$mesa', NOW(), '0', '1', '$id' , '0' , '$mesa', '$posicao_mesa')");

		if (mysqli_affected_rows($conectar) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Situação cadastrada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=42'>
				<script type=\"text/javascript\">
					alert(\"Situação não foi cadastrada com Sucesso.\");
				</script>
			";		   

		}
}
?>