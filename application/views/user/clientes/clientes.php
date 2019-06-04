		<div class="col-md-12">
			
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-comments"></i> Lista de Clientes
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
							<div class="table-scrollable">
    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
		                        	<th>No.</th>
									<th>Nombre</th>
									<th>Correo</th>									
									<th>Ultimo Periodo</th>
									<th>Fecha de Parto</th>
									<th>Cumple Semama</th>
									<th>Semana</th>									
									<th>Creado</th>				
								<th>Eliminar</th>												
								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 0;foreach($datos as $clientes){?>
		<tr id="registro_<?php echo $clientes['id_usuario'];?>">
			<td><?php $num++;echo $num;?></td>
			<td><?php echo $clientes['nombre'];?></td>
			<td><?php echo $clientes['correo'];?></td>
			<td><?php echo $this->dash->fechanew2($clientes['fecha_ultimop']);?></td>
			<td><?php echo $this->dash->fechanew2($clientes['fecha_parto']);?></td>
			<td><?php echo $this->dash->fechanew2($clientes['cumple']);?></td>
			<td><?php echo $clientes['semana'].".".$clientes['dia'];?></td>			
			<td><?php echo $clientes['fecha_creado'];?></td>
			<td style="width:5%"><div class="btn btn-danger btn-sm" onclick="eliminar_producto(<?php echo $clientes['id_usuario'];?>)"><i class="fa fa-trash-o"></i></div></td>
					</tr>
	<?php } ?>
                    </tbody>
            	</table>

            	</div>	
	</div>
			</div>
      	</div>
 	