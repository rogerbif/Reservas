<!-- Modal de Delete-->
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">	  
		<div class="modal-dialog modal-dialog-centered" role="document">	    
			<div class="modal-content">	      
			<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div>
	        <h4 class="modal-title" id="modalLabel"> Excluir Item </h4>
			<div class="modal-body">	        Deseja realmente excluir este item?	      </div>	      
				<div class="modal-footer"> 
					<a id="confirm" class="btn btn-warning btn-sm" href="delete.php?index=<?php echo $index; ?>" role="button">Sim</a>
					<a id="cancel" class="btn btn-primary btn-sm" data-dismiss="modal" role="button">N&atilde;o</a> 
				</div>	    
			</div>	  
		</div>	
	</div> 
<!-- /.modal -->