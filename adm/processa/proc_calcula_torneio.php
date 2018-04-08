<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$torneios=mysqli_query($conectar,"SELECT * FROM torneio");
$cod_torneio=mysqli_num_rows($torneios)+1; // acrescer 1 para ter o cod torneio que foi aberto;

$qtd_max_player_mesa 	= (int) $_POST["qtd_max_player_mesa"];
$players_torneio[] 		= $_POST["checkbox_jogador"];
$cod_cad_torneio 		= $_POST["escolha_torneio"];
$vlr_entrada			= $_POST["vlr_entrada"];
$qtd_max_rebuy			= $_POST["qtd_max_rebuy"];
$vlr_rebuy				= $_POST["vlr_rebuy"];
$qtd_max_addon			= $_POST["qtd_max_addon"];
$vlr_addon				= $_POST["vlr_addon"];
$nome_torneio			= $_POST["nome_torneio"];
$qtd_players=0;
$i=0;

foreach ($players_torneio[0] as $key => $value) {
	$id_ok[$i]= $value; // insere o id do usuario num array
	$i++;
	$qtd_players++;
}

$query1 = mysqli_query($conectar,"INSERT INTO torneio ( vlr_entrada, vlr_rebuy, vlr_addon, cod_club, sit_torneio ,qtd_max_rebuy , qtd_max_addon , qtd_max_player_mesa,  tipo_torneio , nome_torneio) VALUES ('$vlr_entrada','$vlr_rebuy','$vlr_addon','1','1','$qtd_max_rebuy','$qtd_max_addon','$qtd_max_player_mesa','$cod_cad_torneio' , '$nome_torneio'");

//sit_torneio ($cod_cad_torneio) = 1 aberto , 0 fechado
//tipo torneio = freroll, mata a mata etc...

if ($qtd_players>$qtd_max_player_mesa ) {

	$qtd_mesa_abrir=ceil($qtd_players/$qtd_max_player_mesa);
}

else{$qtd_mesa_abrir= 1;}

	$minimo_mesa=1; //mesa
	$temp=1; // contador para inserir jogor na mesa
	$i=0;

while ( $qtd_mesa_abrir>0) {	

foreach ($players_torneio[0] as $key => $value) {

	if ($temp<$qtd_max_player_mesa) // se contador nao tiver chego ao limite de player na mesa ele registra no banco de dados

		{ 
			$query=mysqli_query($conectar,"INSERT INTO partida (cod_partida, data_partida, qtd_rebuy, qtd_entrada, cod_player, qtd_addon, cod_mesa , cod_torneio ,colocacap_player) VALUES ('$minimo_mesa', NOW(), '0', '1', '$id_ok[$i]' , '0' ,'$minimo_mesa' , '$cod_torneio' , '0' )");

			$i++; // aumentou o indice de id depois de printar no banco de dados

			$temp++; // amentou o contor de player na mesa;

			$players_torneio++;

		}

			else{ // se não cabe mais na mesa então aumenta o registro de mesa e volta o contador de player na mesa

			$minimo_mesa++;

			$temp=0;

				}


		; // aumenta indice do foreach
				
		}	

	$qtd_mesa_abrir--; // se não cabe na mesa diminui mesas a abrir p sair do while	

}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($conectar) > 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/abertura_torneio.php'>
				<script type=\"text/javascript\">
					alert(\"Torneio aberto com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/abertura_torneio.php'>
				<script type=\"text/javascript\">
					alert(\"Torneio não foi aberto com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>