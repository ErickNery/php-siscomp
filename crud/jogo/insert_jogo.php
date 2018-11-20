<?php 
	include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	include_once('dao_jogo.php');
?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Inserir Novo jogo</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::jogo); echo '&option='; echo(Definitions::inserir);?>" method="post">
			<table>
				<tr>
					<td>
						<label for="rodada_jogo"> Rodada - Competição:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_rodada_jogo();
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="hora_inicio"> Hora Inicio:[<span style="color:red;">*</span>]:<br/><span style="font-size:0.7em;" >(HH:MM)</span>
					</td>
					<td>
						<input type="time" name="hora_inicio" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="hora_fim"> Hora fim:[<span style="color:red;">*</span>]:<br/><span style="font-size:0.7em;" >(HH:MM)</span>
					</td>
					<td>
						<input type="time" name="hora_fim" />
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