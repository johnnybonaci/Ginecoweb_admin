<?php
$luces=array("","label label-success","label label-warning","label label-info","label label-danger","label label-primary");
?>
		<div class="col-md-12">
			<div class="portlet box purple">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user"></i> Lista de Pacientes
					</div>
				</div>
								<div class="portlet-body">
											<?php $this->load->view('base_template/base_alert'); ?>									
							<div class="table-scrollable">

    <table id="dt_d" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  </br></br></br>
		                    <thead>
		                        <tr>
									<th>N#</th>
									<th>Nombre</th>
									<th>Ginecolog&iacute;a</th>		
									<th>Obstetricia</th>																
									<th>Anexos</th>									

								</tr>
                    	</thead>		
                    	      <tbody>	
	<?php $num = 1;foreach($datos as $user){?>
		<tr>
			<td><?php echo $num; $num++?></td>
			
			<td><a href="<?php echo site_url('consulta/edit_pacientes/'.$user['id_paciente']); ?>" class="sepV_a" title="Editar Pacientes"><?php echo $user['nombre']." ".$user['apellido'];?></a></td>
			<td>
				<div class="btn-group dropup">
															<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"  data-delay="1000" data-close-others="true">
															Ginecolog&iacute;a <i class="fa fa-angle-up"></i></button>
															<ul class="dropdown-menu" role="menu">
																<li>
																	<a href="<?php echo site_url('consulta/LisConsultaG/'.$user['id_paciente']); ?>">
																	CONSULTA DE PRIMERA </a>
																</li>
																<li>
																	<a href="<?php echo site_url('consulta/LisControlG/'.$user['id_paciente']); ?>">
																	CONTROL GINECOLOGICO </a>
																</li>
																<li>
																	<a href="<?php echo site_url('consulta/LisUsGinecologico/'.$user['id_paciente']); ?>">
																	ECO GINECOLOGICO </a>
																</li>																
															</ul>
				</div>

			</td>
			
			<td>
				<div class="btn-group dropup">
															<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"  data-delay="1000" data-close-others="true">
															Obstetricia <i class="fa fa-angle-up"></i></button>
															<ul class="dropdown-menu" role="menu">
																<li>
																	<a href="<?php echo site_url('consulta/LisConsultaG/'.$user['id_paciente']); ?>">
																	CONSULTA DE PRIMERA </a>
																</li>
																<li>
																	<a href="<?php echo site_url('consulta/LisPrenatalG/'.$user['id_paciente']); ?>">
																	CONTROL PRENATAL </a>
																</li>
																<li>
																	<a href="<?php echo site_url('consulta/LisPrimerTrimestre/'.$user['id_paciente']); ?>">
																	ECOGRAFIA I TRIMESTRE </a>
																</li>		
																<li>
																	<a href="<?php echo site_url('consulta/LisEcoObst/'.$user['id_paciente']); ?>">
																	ECOGRAFIA OBSTETRICA </a>
																</li>
																<li>
																	<a href="<?php echo site_url('consulta/LisEcoObst/'.$user['id_paciente']); ?>">
																	RIESGO DE PRIMER TRIMESTRE </a>
																</li>										
															</ul>
				</div>
			</td>
			<td>
				<div class="btn-group">
				<button type="button" class="btn green dropdown-toggle" > Anexos </button>
				</div>
			</td>
			<!--<a href="<?php echo site_url('consulta/LisConsultaG/'.$user['id_paciente']); ?>"><span class="label label-success">Consulta Ginecol&oacute;gica</span></a>
		</td>
				<td>
			<a href="<?php echo site_url('consulta/LisPrenatalG/'.$user['id_paciente']); ?>"><span class="label label-danger">Prenatal</span></a>
		</td>			
		<td>
			<a href="<?php echo site_url('consulta/LisEcoObst/'.$user['id_paciente']); ?>"><span class="label label-warning">Ecograf&iacute;a Obst&eacute;trica</span></a>
		</td>			
		<td>
			<a href="<?php echo site_url('consulta/LisPrimerTrimestre/'.$user['id_paciente']); ?>"><span class="label label-default">Primer Trimestre</span></a>
		</td>
		<td>
			<a href="<?php echo site_url('consulta/LisUsGinecologico/'.$user['id_paciente']); ?>"><span class="label label-info">US Ginecol&oacute;gico</span></a>
		</td>					
		</tr>-->
	<?php } ?>
                    </tbody>
            	</table>

            	</div>	
	</div>
			</div>
      	</div>
 	