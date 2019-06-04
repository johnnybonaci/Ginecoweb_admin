<?php
$luces=array("","label label-success","label label-warning","label label-info","label label-danger","label label-primary");
?>
		<div class="col-md-12">
			
			<div class="portlet box purple">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user"></i> Listado de Ecograf&iacute;a Obst&eacute;trica para <?php echo $id[0]['nombre']." ".$id[0]['apellido']?>
					</div>
				</div>
								<div class="portlet-body">
											<?php $this->load->view('base_template/base_alert'); ?>
		<div class="actions">
			<a href="<?php echo site_url('consulta/EcoObst/'.$id[0]['id_paciente']); ?>" class="btn green"><i class="fa fa-plus"></i> Nuevo Eco </a>
		<!--	<a href="<?php echo site_url('user/listadop'); ?>" class="btn blue"><i class="fa fa-comments"></i> Perfiles </a>-->
		</div>																				
							<div class="table-scrollable">

    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									<th>N#</th>
									<th>Nombre</th>
									<th>Cedula</th>
									<th>Fecha de Control</th>
									<th>Estudio</th>
									<th>Numero</th>
									<th>PDF</th>									
									<th>Editar</th>
								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 0;foreach($datos as $consulta){ $num++?>
		<tr id="consulta_<?php echo $consulta['id_eco_obstetrico_1'];?>">
			<td><?php echo $num;?></td>
			<td><a href="<?php echo site_url('consulta/editar_ecoObstetrico/'.$consulta['id_eco_obstetrico_1'].'/'.$consulta['id_paciente']); ?>" class="sepV_a" title="Editar"><?php echo $id[0]['nombre']." ".$id[0]['apellido'];?></a></td>
			<td><?php echo $id[0]['cedula'];?></td>
			<td><?php echo $consulta['fe_create'];?></td>
			<td><?php echo $consulta['estudio'];?></td>
			<td><?php echo $consulta['id_eco_obstetrico_1'];?></td>
			<td><a href="#" class="sepV_a" title="Editar"><i class="fa fa-file-pdf-o"></i></a></td>					
 			<td><a href="<?php echo site_url('consulta/editar_ecoObstetrico/'.$consulta['id_eco_obstetrico_1'].'/'.$consulta['id_paciente']); ?>" class="sepV_a" title="Editar"><i class="fa fa-edit"> Editar </i></a></td>
			<!--<td><a class="sepV_a" title="Eliminar" onclick="eliminar_seguros(<?php echo $consulta['id_seguros'];?>);return false;"><i class="fa fa-trash"></i></a></td>-->			
		</tr>
	<?php } ?>
                    </tbody>
            	</table>

            	</div>	
	</div>
			</div>
      	</div>
 	