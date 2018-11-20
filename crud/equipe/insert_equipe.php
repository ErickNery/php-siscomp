<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php'); ?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Inserir Novo Time</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::equipe); echo '&option='; echo(Definitions::inserir);?>" method="post">
			<label for="nome_equipe"> Nome da equipe:[<span style="color:red;">*</span>]:&nbsp;&nbsp;&nbsp;
			<input type="text" name="nome_equipe" /><br/><br/>
			
			</p>
	
		      <input type="submit" value="Confirmar"/></form>

		  </div><!--close content_container-->
          		  
		</div><!--close content_item-->
      
	  </div><!--close content-->    	
	
	</div><!--close site_content--> 
  
  </div><!--close main-->