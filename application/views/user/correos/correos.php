		<div class="col-md-12">
			
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-comments"></i> Lista de Correos
					</div>
				</div>
								<div class="portlet-body">
<?php 
if($message == 1){?>
		<div class="alert alert-success">
		<button class="close" data-close="success" id="eliminar"></button>
		<span>
		 Los Datos Fueron Registrados </span>
	</div>
	<?php
}
?>
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo site_url('user/reg_correo'); ?>" class="btn btn-primary" >Crear Correo</a>
						</div>				
					</div>
							<div class="table-scrollable">
    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
		                        	<th>No.</th>
									<th>Semana</th>
									<th>Descripcion</th>									
									<th>Editar</th>							
								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 0;foreach($datos as $clientes){?>
		<tr>
			<td><?php $num++;echo $num;?></td>
			<td><?php echo $clientes['semana'];?></td>
			<td><?php echo $clientes['descripcion'];?></td>
 			<td><a href="<?php echo site_url('user/editar_correos/'.$clientes['id_correos']); ?>" class="sepV_a" title="Editar Correos"><i class="icon-pencil"></i>Editar</a></td>
			
					</tr>
	<?php } ?>
                    </tbody>
            	</table>

            	</div>	
	</div>
			</div>
      	</div>
 	