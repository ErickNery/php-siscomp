<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	  include_once('dao_competicao.php');
	session_start();
	$_GET['id'] = $_SESSION['id_pagina'];?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Editar competição existente</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<?php $rw = seleciona_um_competicao($_GET['id']); ?>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::competicao); echo '&option='; echo(Definitions::atualizar);?>" method="post">
			<input type="hidden" name="id_competicao" value="<?php echo $_GET['id']; ?>" /> 
			<table>
				<tr>
					<td>
						<label for="nome_competicao"> Nome[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="nome_competicao" value="<?php echo $rw['nome'] ?>" />
					<td>
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
						<input type="date" name="data_fim" value="<?php echo $rw['data_termino'] ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="status_competicao"> Estado[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
							echo seleciona_status_competicao($_GET['fk_status_competicao']);
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