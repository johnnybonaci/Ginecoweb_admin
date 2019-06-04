		<div class="col-md-12">
			
			<div class="portlet box red">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cube"></i> Lista de drogas
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

		<div class="actions">
			<a href="<?php echo site_url('consulta/reg_drogas'); ?>" class="btn purple"><i class="fa fa-plus"></i> A&ntilde;adir drogas </a>
		</div>
							<div class="table-scrollable">

    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
		                        	<th>No.</th>
									<th>Nombre</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 0;foreach($datos as $linea){ $num++?>
		<tr id="registro_seg_<?php echo $linea['id_drogas'];?>">
			<td><?php echo $num;?></td>
			<td><?php echo $linea['drogas'];?></td>
 			<td><a href="<?php echo site_url('consulta/editar_drogas/'.$linea['id_drogas']); ?>" class="sepV_a" title="Editar"><i class="fa fa-edit"></i></a></td>
			<td><a class="sepV_a" title="Eliminar" onclick="eliminar_drogas(<?php echo $linea['id_drogas'];?>);return false;"><i class="fa fa-trash"></i></a></td> 			
		</tr>
	<?php } ?>
                    </tbody>
            	</table>

            	</div>	
	</div>
			</div>
      	</div>
 	