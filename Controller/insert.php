<?php
session_start();
include ("../config/database.php");

   
	$nome_completo= $_POST['nome_completo'];
	$celular= $_POST['celular'];
	$estado= $_POST['estado'];
	$cidade= $_POST['cidade'];
	$pai_empresarial= $_POST['pai_empresarial'];
	$data = date('Y-m-d H:i');
	
	$sql = "SELECT celular FROM empresarios WHERE celular='".$celular."'"; // CONSULTA

      $con = $mysqli->query($sql);

      $linhas = $con->num_rows;

      
      if($linhas >= 1) { // SE HÁ LINHAS
 echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../'>";
	$_SESSION['verifica_celular'] = "<div class='alert alert-danger' role='alert'>
  Já existe uma pessoa cadastrada com esse Celular
</div>";
     
exit; 

}
else {
	
$sql = "INSERT INTO empresarios (nome_completo, celular, estado, cidade, pai_empresarial, data) VALUES ";
$sql .= "('$nome_completo', '$celular', '$estado', '$cidade', '$pai_empresarial', '$data')"; 
mysqli_query($mysqli,$sql);
mysqli_close($mysqli);
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../'>";
	$_SESSION['cadastradoSucess'] = "<div class='alert alert-success' role='alert'>
 Cadastrado com sucesso
</div>";
 
exit; 		
	
	
}











?>
