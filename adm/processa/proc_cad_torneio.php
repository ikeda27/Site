<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$flg_ranking 		= $_POST["flg_ranking"];
$tipo_torneio 		= $_POST["tipo_torneio"];
$peso 				= $_POST["peso"];
$vlr_entrada 		= $_POST["vlr_entrada"];
$qtd_max_rebuy 		= $_POST["qtd_max_rebuy"];
$vlr_rebuy 			= $_POST["vlr_rebuy"];
$qtd_max_addon 		= $_POST["qtd_max_addon"];
$vlr_addon 			= $_POST["vlr_addon"];
$nome_torneio 		= $_POST["nome_torneio"];
$qtd_max_player_mesa= $_POST["qtd_max_player_mesa"];



$query = mysqli_query($conectar,"INSERT INTO cadastro_torneio ( flg_ranking , tipo_torneio, peso_torneio, vlr_entrada, qtd_max_rebuy, vlr_rebuy, qtd_max_addon, vlr_addon, nome_torneio, qtd_max_player_mesa) VALUES ($flg_ranking , $tipo_torneio, $peso, '$vlr_entrada', $qtd_max_rebuy, '$vlr_rebuy', $qtd_max_addon, '$vlr_addon', '$nome_torneio', $qtd_max_player_mesa)");



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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=41'>
				<script type=\"text/javascript\">
					alert(\"Torneio cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=41'>
				<script type=\"text/javascript\">
					alert(\"Torneio não foi cadastrado com Sucesso.\");
				</script>
				";
		}

		?>
	</body>
</html>