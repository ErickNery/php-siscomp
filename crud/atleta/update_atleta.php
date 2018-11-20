<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	  include_once('dao_atleta.php');
	  session_start();
	  $_GET['id'] = $_SESSION['id_pagina'];?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Editar atleta existente</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<?php $rw = seleciona_um_atleta($_GET['id']); ?>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::atleta); echo '&option='; echo(Definitions::atualizar);?>" method="post">
			<input type="hidden" name="id_atleta" value="<?php echo $_GET['id']; ?>" /> 
			<table>
				<tr>
					<td>
						<label for="cpf_atleta"> CPF:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="cpf_atleta" value="<?php echo $rw['cpf'] ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="nome_atleta"> Nome:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="nome_atleta" value="<?php echo $rw['nome'] ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="idade_atleta"> Idade:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="idade_atleta" value="<?php echo $rw['idade'] ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="cartoes_atleta"> Cartoes:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="cartoes_atleta" value="<?php echo $rw['cartoes'] ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="equipe_atleta"> Time:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
							echo seleciona_equipe_atleta($rw['fk_equipe']);
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="status_atleta"> Estado:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
							echo seleciona_status_atleta($rw['fk_status_atleta']);
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