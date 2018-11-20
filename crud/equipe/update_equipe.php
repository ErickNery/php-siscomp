<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	  include_once('dao_equipe.php');
	session_start();
	$_GET['id'] = $_SESSION['id_pagina'];?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Editar Time existente</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<?php $rw = seleciona_um_equipe($_GET['id']); ?>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::equipe); echo '&option='; echo(Definitions::atualizar);?>" method="post">
			<input type="hidden" name="id_equipe" value="<?php echo $_GET['id']; ?>" /> 
			<table>
			<tr><td><label for="nome_equipe"> Nome da equipe:[<span style="color:red;">*</span>]:</td>
			<td><input type="text" name="nome_equipe" value="<?php echo $rw['nome'] ?>" /><td></tr>
			<tr><td><label for="status_equipe"> Estado:[<span style="color:red;">*</span>]:</td><td>
			<?php
				echo seleciona_status_equipe($_GET['id']);
				echo "</td></tr><tr><td>";
				echo '<label for="capitao"> Capitão:[<span style="color:red;">*</span>]:';
				echo "</td><td>";
				echo seleciona_capitao($_GET['id']);
				echo "</td></tr></table>";
			?>
			
			</p>
   		        <input type="submit" value="Confirmar"/></form>

		  </div><!--close content_container-->
          		  
		</div><!--close content_item-->
      
	  </div><!--close content-->    	
	
	</div><!--close site_content--> 
  
  </div><!--close main-->