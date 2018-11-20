<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	  include_once('dao_rodada.php');
	session_start();
	$_GET['id'] = $_SESSION['id_pagina'];?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Editar Rodada existente</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<?php $rw = seleciona_um_rodada($_GET['id']); ?>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::rodada); echo '&option='; echo(Definitions::atualizar);?>" method="post">
 
			<table>
				<tr>
					<td>
						<label for="id_rodada"> Id[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="id_rodada" value="<?php echo $_GET['id']; ?>" readonly />
					<td>
				</tr>
				<tr>
					<td>
						<label for="competicao_rodada"> Competicao[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_competicao_rodada($id_competicao = $rw['fk_competicao']);
						?>
					<td>
				</tr>
				<tr>
					<td>
						<label for="status_rodada"> Estado[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
							echo seleciona_status_rodada($id_status = $rw['fk_status_rodada']);
						?>
					</td>
				</tr>				
				<tr>
					<td>
						<label for="data_inicio"> Data Inicio[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="date" name="data_inicio" value="<?php echo $rw['data_inicio'] ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="data_fim"> Data Termino[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="date" name="data_fim" value="<?php echo $rw['data_fim'] ?>" />
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