<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php'); 
include_once('dao_atleta.php');
?>
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Inserir Novo atleta</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::atleta); echo '&option='; echo(Definitions::inserir);?>" method="post">
			<table>
			<tr>
				<td>
					<label for="cpf_atleta"> CPF[<span style="color:red;">*</span>]:
				</td>
				<td>
					<input type="text" name="cpf_atleta" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="nome_atleta"> Nome[<span style="color:red;">*</span>]:
				</td>
				<td>
					<input type="text" name="nome_atleta" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="idade_atleta"> Idade[<span style="color:red;">*</span>]:
				</td>
				<td>
					<input type="text" name="idade_atleta"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="equipe_atleta"> Equipe:[<span style="color:red;">*</span>]:
				</td>
				<td>
					<?php
					echo seleciona_equipe_atleta();
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