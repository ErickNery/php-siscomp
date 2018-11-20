<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php'); ?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Vizualizar Competição</h1> 	  
		  
		  <div class="form_content_container">
			<p>
			<?php 
			include_once('dao_competicao.php');
			echo seleciona_competicao();
			?>
			</p>
		  </div><!--close content_container-->
          		  
		</div><!--close content_item-->
      
	  </div><!--close content-->    	
	
	</div><!--close site_content--> 
  
  </div><!--close main-->