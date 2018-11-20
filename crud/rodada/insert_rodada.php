<?php 
	include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	include_once('dao_rodada.php');
?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Inserir Nova Rodada</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::rodada); echo '&option='; echo(Definitions::inserir);?>" method="post">
			<table>
				<tr>
					<td>
						<label for="competicao_rodada"> Competicao:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_competicao_rodada();
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="data_inicio"> Data Inicio:[<span style="color:red;">*</span>]:<br/><span style="font-size:0.7em;" >(AAAA-MM-DD)</span>
					</td>
					<td>
						<input type="date" name="data_inicio" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="data_fim"> Data fim:[<span style="color:red;">*</span>]:<br/><span style="font-size:0.7em;" >(AAAA-MM-DD)</span>
					</td>
					<td>
						<input type="date" name="data_fim" />
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