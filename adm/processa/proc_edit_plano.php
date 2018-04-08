<?php

include_once("../conexao.php");
session_start();
$cod_clube=$_SESSION['clube'];
$result = mysqli_query($conectar,"SELECT * FROM vantagens WHERE flag_vantagem_ativo=1 AND id_clube='$cod_clube'");
$resultado = mysqli_num_rows($result);

$id 		= $_POST["id"];
$nome 		= $_POST["nome"];
$name=0;
$vantagens=0;


while ($resultado = mysqli_fetch_array($result)) {
	
	$name++;

	if(isset($_POST[$name])) { $vantagens=$vantagens.",".$_POST[$name];}else{$vantagens=$vantagens.","."0";}
	
}

$retorno_vantagem = mysqli_query($conectar,"SELECT DISTINCT desc_vantagem FROM vantagens WHERE id_vantagem IN (".$vantagens.")");
$linhas=mysqli_num_rows($retorno_vantagem);
$vantagens="";

while($linhas = mysqli_fetch_array($retorno_vantagem)){
	$vantagens = $vantagens." ".$linhas['desc_vantagem'];
}

$query = mysqli_query($conectar,"UPDATE planos SET desc_plano ='$nome',vantagens_plano='$vantagens' WHERE id_plano='$id'");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($conectar) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=27'>
				<script type=\"text/javascript\">
					alert(\"Plano editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/adm/administrativo.php?link=27'>
				<script type=\"text/javascript\">
					alert(\"Plano não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>