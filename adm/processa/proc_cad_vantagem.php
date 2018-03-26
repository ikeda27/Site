<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");

$nome 		= $_POST["nome"];

if ($nome != ""){
	$query = mysqli_query($conectar,"INSERT INTO vantagens (desc_vantagem, flag_vantagem_ativo) VALUES ('$nome',1)");
	$acao = mysqli_affected_rows($conectar);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if ($acao > 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_vantagem.php'>
				<script type=\"text/javascript\">
					alert(\"Vantagem cadastrada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/listar_vantagem.php'>
				<script type=\"text/javascript\">
					alert(\"Vantagem não foi cadastrada com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>