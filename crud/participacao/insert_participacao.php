<?php 
	include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	include_once('dao_participacao.php');
?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Inserir Nova Participação de time em jogo</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::participacao); echo '&option='; echo(Definitions::inserir);?>" method="post">
			<table>
				<tr>
					<td>
						<label for="jogo_participacao"> Jogo Nº:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_jogo_participacao();
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="equipe_participacao"> Equipe:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_equipe_participacao("equipe_participacao");
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="gols_equipe"> Gols realizados:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="number" name="gols_equipe" min="0" max="99"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="vencedor"> Vencedor? [<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="checkbox" name="vencedor"/>
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