<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "ponteon";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno) 
	echo "Falha na Conexão : (".$mysqli->connect_errno.")  ".$mysqli->connect_errno;
	
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

?>