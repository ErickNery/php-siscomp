<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	  include_once('dao_jogo.php');
	session_start();
	$_GET['id'] = $_SESSION['id_pagina'];?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Editar Jogo existente</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<?php $rw = seleciona_um_jogo($_GET['id']); ?>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::jogo); echo '&option='; echo(Definitions::atualizar);?>" method="post">
 
			<table>
				<tr>
					<td>
						<label for="id_jogo"> Id[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="id_jogo" value="<?php echo $_GET['id']; ?>" readonly />
					<td>
				</tr>
				<tr>
					<td>
						<label for="rodada_jogo"> Rodada[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_rodada_jogo($id_rodada = $rw['fk_rodada']);
						?>
					<td>
				</tr>
				<tr>
					<td>
						<label for="status_jogo"> Estado[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
							echo seleciona_status_jogo($id_status = $rw['fk_status_jogo']);
						?>
					</td>
				</tr>				
				<tr>
					<td>
						<label for="hora_inicio"> Hora Inicio[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="time" name="hora_inicio" value="<?php echo $rw['hora_inicio'] ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="hora_fim"> Hora Termino[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="time" name="hora_fim" value="<?php echo $rw['hora_fim'] ?>" />
					<td>
				</tr>
				</table>
			
			</p>
   		        <input type="submit" value="Confirmar"/></form>

		  </div><!--close content_container-->
          		  
		</div><!--close content_item-->
      
	  </div><!--close content-->    	
	
	</div><!--close site_content--> 
  
  </div><!--close main-->