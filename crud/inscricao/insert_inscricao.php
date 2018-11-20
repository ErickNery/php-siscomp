<?php 
	include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	include_once('dao_inscricao.php');
?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Inserir Nova Inscrição de time em competição</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::inscricao); echo '&option='; echo(Definitions::inserir);?>" method="post">
			<table>
				<tr>
					<td>
						<label for="competicao_inscricao"> Competicao:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_competicao_inscricao();
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="equipe_inscricao"> Equipe:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_equipe_inscricao("equipe_inscricao");
						?>
					</td>
				</tr>
			</table>
			</p>
	
		    <input type="submit" value="Confirmar"/></form>

		  </div><!--close content_container-->
          		  
		</div><!--close content_item-->
      
	  </div><!--close content-->    	
	
	</div><!--close site_content--> 
  
  </div><!--close main-->