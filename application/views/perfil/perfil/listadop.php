		<div class="col-md-12">
			
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-comments"></i> Perfiles
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
					<!--<div class="row">
						<div class="col-md-12">
							<a href="<?php echo site_url('user/register'); ?>" class="btn btn-primary" >Crear Usuario</a>
						</div>				
					</div>-->
		<div class="actions">
			<a href="<?php echo site_url('user/reg_perfil'); ?>" class="btn blue"><i class="fa fa-plus"></i> Crear Perfil </a>
		</div>
							<div class="table-scrollable">

    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
		                        	<th>No.</th>
									<th>Perfil</th>
									<th>Descripci&oacute;n</th>									
									<th>Creado</th>							
									<th>Actualizado</th>							
									<th>Acci&oacute;n</th>
								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 0;foreach($datos as $perfiles){?>
		<tr>
			<td><?php $num++;echo $num;?></td>
			<td><?php echo $perfiles['perfil'];?></td>
			<td><?php echo $perfiles['descripcion'];?></td>
			<td><?php echo $perfiles['fe_create'];?></td>
			<td><?php echo $perfiles['fe_update'];?></td>
 			<td><a href="<?php echo site_url('user/editar_perfiles/'.$perfiles['id_perfil']); ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a></td>
		</tr>
	<?php } ?>
                    </tbody>
            	</table>

            	</div>	
	</div>
			</div>
      	</div>
 	