<?php
session_start();
include ("../config/database.php");

$usu_codigo = $_GET['id_empresario'];



$sql = "DELETE FROM empresarios WHERE id_empresario='$usu_codigo' ";
mysqli_query($mysqli,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($mysqli);
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../#ListCadastro'>";
	$_SESSION['excluir'] = "<div class='alert alert-danger' role='alert'>
 Registro excluído com sucesso
</div>";
     
exit;  	
?>
