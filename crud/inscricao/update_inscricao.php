<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php');
	  include_once('dao_participacao.php');
	session_start();
	$_GET['id'] = $_SESSION['id_pagina'];?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Editar Participação de time em jogo</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<?php $rw = seleciona_um_participacao($_GET['id']); ?>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::participacao); echo '&option='; echo(Definitions::atualizar);?>" method="post">
 
			<table>
				<tr>
					<td>
						<label for="id_participacao"> Id[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="id_participacao" value="<?php echo $_GET['id']; ?>" readonly />
					<td>
				</tr>
				<tr>
					<td>
						<label for="jogo_participacao"> Jogo[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
						echo seleciona_jogo_participacao($id_jogo = $rw['fk_jogo']);
						?>
					<td>
				</tr>
				<tr>
					<td>
						<label for="equipe_participacao"> Time[<span style="color:red;">*</span>]:
					</td>
					<td>
						<?php
							echo seleciona_equipe_participacao($nome_item='equipe_participacao',$id_equipe = $rw['fk_equipe']);
						?>
					</td>
				</tr>				
				<tr>
					<td>
						<label for="gols_jogo"> Gols[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="number" name="gols_jogo" value="<?php echo intval($rw['gols_jogo']) ?>" />
					<td>
				</tr>
				<tr>
					<td>
						<label for="vencedor"> Vencedor[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="checkbox" name="vencedor" <?php if($rw['vencedor']==TRUE) echo 'checked="checked" ';?> />
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