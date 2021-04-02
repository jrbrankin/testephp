<h2 id="ListCadastro"> Lista de Cadastro de Empresários</h2>
   <?php
         if (isset($_SESSION['excluir'])) {
             echo $_SESSION['excluir'];
             unset($_SESSION['excluir']);
         }
         ?>
   <table class="table table-bordered">
      <thead>
         <tr>
            <th>#</th>
            <th>Nome Completo</th>
            <th>Celular</th>
            <th>Cidade/UF</th>
            <th>Cadastrado em</th>
            <th>Pai Empresarial</th>
            <th>Rede</th>
            <th>Ações</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <?php
               while ($dado = $con->fetch_array()) {
               ?>
            <td><?php
               echo $dado["id_empresario"];
               ?></td>
            <td><?php
               echo $dado["nome_completo"];
               ?></td>
            <td><?php
               echo $dado["celular"];
               ?></td>
            <td><?php
               echo $dado["cidade"];
               echo "/";
               echo $dado["estado"];
               ?></td>
            <td><?php
               echo date('d/m/Y H:i', strtotime($dado["data"]));
               ?></td>
            <td><?php
               echo $dado["pai_empresarial"];
               ?></td>
            <td>
               <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#confirm<?php
                  echo $dado["id_empresario"];
                  ?>">Ver Rede</i></button>
               <div class="modal fade" id="confirm<?php
                  echo $dado["id_empresario"];
                  ?>" role="dialog">
                  <div class="modal-dialog modal-md">
                     <div class="modal-content">
                        <div class="modal-body">
                           <h4> Detalhes</h4>
                           <br>
                           <strong>Nome Completo</strong><br>
                           <?php
                              echo $dado['nome_completo'];
                              ?><br>
                           <strong>Celular</strong><br>
                           <?php
                              echo $dado["celular"];
                              ?><br>
                           <strong>Cidade/UF</strong><br>
                           <?php
                              echo $dado["cidade"];
                              echo "/";
                              echo $dado["estado"];
                              ?><br>
                           <strong>Cadastrado em</strong><br>
                           <?php
                              echo date('d/m/Y H:i', strtotime($dado["data"]));
                              ?><br>
                           <strong>Hierarquia</strong><br>
						   
						   <?php
						$busca_pai = $dado["nome_completo"];
						$sql2 = "SELECT * FROM `empresarios` WHERE pai_empresarial='$busca_pai'";
						$con2 = $mysqli->query($sql2) or die($mysqli->error);
						while ($dado_pai = $con2->fetch_array()) {							            
								?>
						<ul>
						<li><?php echo $dado_pai ["nome_completo"]; ?>
						 <?php
						$busca_pai2 = $dado_pai["nome_completo"];
						$sql3 = "SELECT * FROM `empresarios` WHERE pai_empresarial='$busca_pai2'";
						$con3 = $mysqli->query($sql3) or die($mysqli->error);
						while ($dado_pai3 = $con3->fetch_array()) {							            
							?>
						<ul>
						<li><?php echo $dado_pai3 ["nome_completo"]; ?>
						
										<ul>
										
										 <?php
										$busca_pai5 = $dado_pai3 ["nome_completo"];
										$sql5 = "SELECT * FROM `empresarios` WHERE pai_empresarial='$busca_pai5'";
										$con5 = $mysqli->query($sql5) or die($mysqli->error);
										while ($dado_pai5 = $con5->fetch_array()) {							            
										?>
										
										<li><?php echo $dado_pai5 ["nome_completo"]; ?>
										</li>
										
										</ul> 
										</ul> 
										<?php }  ?>
										
						
						
						</ul> 
						<?php }  ?>
						
						</li>
						
											
						</ul> 
						<?php }  ?>
					
					
							
	  
                           <br>
                        </div>
                        <div class="modal-footer">
                           <button type="button" data-dismiss="modal" class="btn btn-outline-info">Fechar</button>
                        </div>
                     </div>
                  </div>
               </div>
            </td>
            <td>
               <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#excluir<?php
                  echo $dado["id_empresario"];
                  ?>">Excluir</i></button>
               <div class="modal fade" id="excluir<?php
                  echo $dado["id_empresario"];
                  ?>" role="dialog">
                  <div class="modal-dialog modal-md">
                     <div class="modal-content">
                        <div class="modal-body">
                           <h4> Tem certeza que deseja excluir o
                              registro?
                           </h4>
                           <br><?php
                              echo $dado['nome_completo'];
                              ?></p>
                        </div>
                        <div class="modal-footer">
                           <a href="Controller/deletar.php?id_empresario=<?php echo $dado['id_empresario'];?>" type="button" class="btn btn-outline-danger" id="delete">Sim</a>
                           <button type="button" data-dismiss="modal" class="btn btn-outline-info">Cancelar</button>
                        </div>
                     </div>
                  </div>
               </div>
            </td>
         </tr>
         <?php
            }
            ?>    
      </tbody>
   </table>
   
   <hr>
   <?php
      $query  = "SELECT COUNT(*) AS c FROM empresarios ";
      $result = $mysqli->query($query);
      while ($rowc = $result->fetch_array()) {
          $rowsc[] = $rowc;
      }
      foreach ($rowsc as $rowc)
      ?>
   <h6>
   Total de Empresários: <?php echo $rowc['c'];?></h2>
   </div>