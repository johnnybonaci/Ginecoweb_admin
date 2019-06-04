<?php
$luces=array("","label label-success","label label-warning","label label-info","label label-danger","label label-primary");
?>
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user"></i> Us Ginecologico para <?php echo $id[0]['nombre']." ".$id[0]['apellido']?>
					</div>
				</div>
								<div class="portlet-body">
											<?php $this->load->view('base_template/base_alert'); ?>
		<div class="actions">
			<a id="calcular" href="<?php echo site_url('consulta/nuevo_UsGinecologico/'.$id[0]['id_paciente']); ?>" class="btn yellow"><i class="fa fa-plus"></i> Nuevo Us Ginecologico </a>
		<!--	<a href="<?php echo site_url('user/listadop'); ?>" class="btn blue"><i class="fa fa-comments"></i> Perfiles </a>-->
		</div>
		<input id="datoid2" type="hidden" value="<?php echo $id[0]['id_paciente']; ?>">																				
							<div class="table-scrollable">
    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									<th>N#</th>
									<th>Nombre</th>
									<th>Cedula</th>
									<th>Fecha del Estudio</th>
									<th>Numero</th>
									<th>PDF</th>									
									<th>Mail</th>									
									<th>Editar</th>
								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 0;foreach($datos as $consulta){ $num++?>
		<tr id="consulta_<?php echo $consulta['id_us_ginecologico_1'];?>">
			<td><?php echo $num;?></td>
			<td><a href="<?php echo site_url('consulta/editarUsGinecologico/'.$consulta['id_us_ginecologico_1'].'/'.$consulta['id_paciente']); ?>" class="sepV_a" title="Editar"><?php echo $id[0]['nombre']." ".$id[0]['apellido'];?></a></td>
			<td><?php echo $id[0]['cedula'];?></td>
			<td><?php echo $consulta['fe_create'];?></td>
			<td><?php echo $consulta['id_us_ginecologico_1'];?></td>
			<td><a href="#" class="sepV_a" title="Editar"><i class="fa fa-file-pdf-o"></i></a></td>						
			<td><a href="#" class="sepV_a" title="Editar"><i class="fa fa-envelope"></i></a></td>						
 			<td><a href="<?php echo site_url('consulta/editarUsGinecologico/'.$consulta['id_us_ginecologico_1'].'/'.$consulta['id_paciente']); ?>" class="sepV_a" title="Editar"><i class="fa fa-edit"> Editar </i></a></td>
			<!--<td><a class="sepV_a" title="Eliminar" onclick="eliminar_seguros(<?php echo $consulta['id_seguros'];?>);return false;"><i class="fa fa-trash"></i></a></td>-->			
		</tr>
	<?php } ?>
                    </tbody>
            	</table>
            	</div>	
	</div>
			</div>
      	</div>