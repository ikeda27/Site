<?php
//error_reporting(E_ALL ^ E_DEPRECATED);
$conectar = mysqli_connect("localhost","root","", "tcc1") or die ("Erro na conexão");
mysqli_select_db($conectar, "tcc1")or die ("Base não encontrada");
?>