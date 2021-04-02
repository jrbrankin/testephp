
<?php
//incia a session e inclue a conexão com o banco de dados
session_start();
include("config/database.php");
include("view/head.php");

?>    
    
<body>

    	<!-- insere a logo da Ponteon -->
   <center><img src="imagens/pon_dark.png"></center>
   <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#topo">Home</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="#cadastro">Cadastro</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="#ListCadastro">Lista de Cadastro</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link"  href="https://ponteon.com.br/">Sair</a>
    </li>
  </ul>
</nav>
      <div class="container border">
	  <hr>
	  
   <h2 id="cadastro">Cadastro de Empresários</h2>
   <form action="Controller/insert.php" method="POST" class="form-horizontal form-label-left" 
      onsubmit="this.enviar.value='Cadastrando...'; this.enviar.disabled=true;">
	  <!-- Exibe mensagem de Cadastrado com sucesso ou verifica o celular repetido-->
      <?php
         if (isset($_SESSION['cadastradoSucess'])) {
             echo $_SESSION['cadastradoSucess'];
             unset($_SESSION['cadastradoSucess']);
         }
		 
		 if (isset($_SESSION['verifica_celular'])) {
             echo $_SESSION['verifica_celular'];
             unset($_SESSION['verifica_celular']);
         }
         ?>
		 
		 
		 
      <div class="row">
         <div class="col">
            <div class="form-group">
               <label for="nome">Nome Completo</label>
               <input type="text" class="form-control" placeholder="Digite o seu nome Completo" id="nome" name="nome_completo" required>
            </div>
         </div>
         <div class="col">
            <div class="form-group">
               <label for="celular">Celular</label>
               <input type="cpf" class="form-control" id="celular" placeholder="Digite seu telefone" name="celular" required  onkeydown="javascript: fMasc( this, mTel );" maxlength="14">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <div class="form-group">
               <label for="sel1">Estado</label>
               <select class="form-control" id="estados" name="estado" required>
                  </select>
            </div>
         </div>
         <div class="col">
            <div class="form-group">
               <label for="cidade">Cidade</label>
               <select class="form-control" id="cidades" name="cidade" required>
                  </select>
            </div>
         </div>
      </div>
      <div class="form-group">
         <label for="sel1">Pai Empresarial</label>
         <select class="form-control" id="sel1" name="pai_empresarial">
            <option value="" >Escolha um Pai Empresarial</option>
            <?php
               $busca_nome     = "SELECT * FROM empresarios";
               $resultado_nome = mysqli_query($mysqli, $busca_nome);
               while ($row_busca_nome = mysqli_fetch_assoc($resultado_nome)) {
               ?>
            <option value ="<?php
               echo $row_busca_nome['nome_completo'];
               ?>">
               <?php
                  echo $row_busca_nome['nome_completo'];
                  ?>
            </option>
            <?php
               }
               ?>
         </select>
      </div>
      <input class="btn btn-outline-primary" type="submit" name="enviar" value="Cadastrar">
   </form>
   <br><br>
   </div>
   <div class="container-fluid border">
   <hr>
   <?php
      $sql = "SELECT * FROM `empresarios` ORDER By data ASC";
      $con = $mysqli->query($sql) or die($mysqli->error);
      ?>
	  
	  
	  
	
<?php
include("view/listEmpresarios.php");
include("view/footer.php");
?>    
   
  