<?php
	include_once("..\seguranca.php");
	include_once("..\conexao.php");
	$resultado=mysqli_query($conectar,"SELECT x.nome, x.preco, x.imagem, x.categoria, s.nome AS situacao FROM
		(SELECT p.nome, p.preco, p.imagem, p.situacao_id, c.nome AS categoria FROM produtos AS p LEFT JOIN categorias AS c ON p.categoria_id = c.id) AS x LEFT JOIN situacaos AS s ON x.situacao_id = s.id");
	var_dump($resultado);


?>