<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/definitions.php'); ?>	  
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Inserir Nova Competicao</h1> 	  
		  
		  <div class="form_content_container">
		    <p> <span style="color:red;">*</span> = Informação obrigatória</p>
			<p><form action="/recebeform.php?class=<?php echo(Definitions::competicao); echo '&option='; echo(Definitions::inserir);?>" method="post">
			<table>
				<tr>
					<td>
						<label for="nome_competicao"> Nome:[<span style="color:red;">*</span>]:
					</td>
					<td>
						<input type="text" name="nome_competicao" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="data_inicio"> Data Inicio:[<span style="color:red;">*</span>]:<br/><span style="font-size:0.7em;" >(AAAA-MM-DD)</span>
					</td>
					<td>
						<input type="date" name="data_inicio" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="data_fim"> Data fim:[<span style="color:red;">*</span>]:<br/><span style="font-size:0.7em;" >(AAAA-MM-DD)</span>
					</td>
					<td>
						<input type="date" name="data_fim" />
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