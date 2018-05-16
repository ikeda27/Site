<?php
session_start();
include_once("../conexao.php");
$qtd_max_player_mesa 	= (int) $_POST["qtd_max_player_mesa"];
$players_torneio[] 		= $_POST["checkbox_jogador"];
$addon_players[] 		= $_POST["checkbox_addon"];
$cod_torneio 			= $_POST["escolha_torneio"];
$vlr_entrada	 		= $_POST["vlr_entrada"];
$qtd_max_rebuy	 		= $_POST["qtd_max_rebuy"];
$vlr_rebuy		 		= $_POST["vlr_rebuy"];
$qtd_mesas				= $_POST["qtd_mesas"];
$qtd_max_addon 			= $_POST["qtd_max_addon"];
$vlr_addon				= $_POST["vlr_addon"];
$id=null;
$qtd_players=0;
$posicao=0;
$mesa=0;
$posicao_mesa=0;

$query=mysqli_query($conectar,"INSERT INTO torneio (vlr_entrada, qtd_max_rebuy, vlr_rebuy, qtd_max_addon, vlr_addon, qtd_max_player_mesa) VALUES ('$vlr_entrada', $qtd_max_rebuy, '$vlr_rebuy', $qtd_max_addon, '$vlr_addon', '$qtd_max_player_mesa')");

//verificar se deu certo a abertura do torneio e começa o tratamento dos jogadores nas partidas
if ($query == true ){	

	echo "<script type=\"text/javascript\">
		alert(\"Torneio aberto com Sucesso. Realizando inclusão de jogadores.\");
		</script>";

	//Recuperar o numero_torneio, para colocar em partida
	$query=mysqli_query($conectar,"SELECT numero_torneio FROM torneio ORDER BY numero_torneio DESC LIMIT 1");
	$result=mysqli_fetch_assoc($query);
	$cod_ult_torn=$result['numero_torneio'];

	if ($query == true ){	

		//Verifica quantos jogadores foram trazidos da abertura
		foreach ($players_torneio[0] as $key => $value) {
			
			$id.=(int) $value.";";
			$qtd_players++;
		}//fecha foreach

		//verifica qtde de jogadores, maior que o numero de vagas disponiveis
		$qtd_vagas = $qtd_mesas*$qtd_max_player_mesa;
		if ($qtd_vagas >= $qtd_players){

			//Agregando as posições de forma aleaória
			foreach ($players_torneio[0] as $key => $value) {
				foreach ($addon_players[0] as $key_addon => $value_addon) {

					//Cria array para armazenar posição e atribui ao primeiro jogador
					if ($key == 0) {
						$posicao = rand(1, $qtd_players);
						$cadeira[0][0] = $value;
						$cadeira[0][1] = $posicao;
						$cadeira[0][2] = $value_addon;
					}//fecha if
					//Percorre o array, verifica se a posição gerada já existe e atribui ao jogador	
					else {
						$posicao = rand(1, $qtd_players);
						$i=0;
						while (isset($cadeira[$i][0])) {
							$temp = $cadeira[$i][1];
							if ($temp == $posicao) {
								$i=0;
								$posicao = rand(1, $qtd_players);
							}//fecha if
							else {
								$i++;
							}//fecha else
						}//fecha while
						$cadeira[$i][0] = $value;
						$cadeira[$i][1] = $posicao;
						$cadeira[$i][2] = $value_addon;
					}//fecha else
				}//fecha foreach
			}//fecha foreach

			foreach ($cadeira[0] as $key => $value) {
				//verificar cod_mesa
				$mesa=ceil($cadeira[$key][1]/$qtd_max_player_mesa);
				$posicao_mesa=(floor($cadeira[$key][1]/$qtd_max_player_mesa)*$qtd_max_player_mesa)-$cadeira[$key][1];
				$cod_player=$cadeira[$key][0];
				$addon=$cadeira[$key][2];				
				//insere jogador
				$query=mysqli_query($conectar,"INSERT INTO partida (cod_partida, numero_torneio, qtd_rebuy, cod_player, qtd_addon, mesa, posicao_mesa) VALUES ($mesa, $cod_ult_torn, 1, $cod_player, $addon, $mesa, '$posicao_mesa')");

				if ($query != true ){	
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=47'>
						<script type=\"text/javascript\">
							alert(\"Jogadores não vinculados a partida.\");
						</script>";		   
				}//fecha if
			}//fecha foreach
		}//fecha if
		else{
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=44'>
				<script type=\"text/javascript\">
					alert(\"Quantidade de jogadores maior que as vagas disponiveis.\");
				</script>
			";		   

		}		
	}//fecha if
	else{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=44'>
			<script type=\"text/javascript\">
				alert(\"Não foi possivel vincular a(s) partida(s) ao torneio aberto.\");
			</script>
		";		   

	}
}//fecha if
else{
	echo "
	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://".$_SERVER['HTTP_HOST']."/adm/administrativo.php?link=44'>
	<script type=\"text/javascript\">
		alert(\"Torneio não foi aberto com Sucesso.\");
	</script>
	";		   
}//fecha else
?>