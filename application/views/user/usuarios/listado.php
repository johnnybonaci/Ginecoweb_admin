<?php
$luces=array("","label label-success","label label-warning","label label-info","label label-danger","label label-primary");
?>
		<div class="col-md-12">
			
			<div class="portlet box purple">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user"></i> Usuarios
					</div>
				</div>
								<div class="portlet-body">
											<?php $this->load->view('base_template/base_alert'); ?>									
		<div class="actions">
			<a href="<?php echo site_url('user/register'); ?>" class="btn green"><i class="fa fa-plus"></i> Crear Usuario </a>
		<!--	<a href="<?php echo site_url('user/listadop'); ?>" class="btn blue"><i class="fa fa-comments"></i> Perfiles </a>-->
		</div>
							<div class="table-scrollable">

    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
		                        	<th>No.</th>		                        	
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Correo</th>							
									<th>Usuario</th>							
									<th>Estatus</th>
									<th>Edit</th>
								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 0;foreach($datos as $user){?>
		<tr>
			<td><?php $num++;echo $num;?></td>			
			<td><?php echo $user['nombre'];?></td>
			<td><?php echo $user['apellido'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['usuario'];?></td>
			<td><?php if($user['activo']==1){echo '<span class="label label-warning">Activo</span>';} else {echo '<span class="label label-danger">Inactivo</span>';}?></td>
 			<td><a href="<?php echo site_url('user/editar_usuarios/'.$user['id']); ?>" class="sepV_a" title="Editar Usuarios"><i class="icon-pencil"></i></a></td>
 			</td>
		</tr>
	<?php } ?>
                    </tbody>
            	</table>

            	</div>	
	</div>
			</div>
      	</div>
 	