<?php
$viciosio=array("nunca he fumado","dejo de fumar hacee"," < 5 cigarrillos/dia","5-10 cigarrillos/dia","11-15 cigarrillos/dia","16-20 cigarrillos/dia",">20 cigarrillos/dia");


?>										
										<div class="col-md-12">

								<div class="portlet box red">
									<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i> Control Prenatal N# <?php echo $dprenatal[0]['id_prenatal_1'] ?> => Fecha <?php echo date("d/m/Y");?>
					</div>

									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" id="form_prenatal" method="post" class="horizontal-form">
											<input type="hidden" name="id_prenatal" id="id_prenatal" value="<?php echo $dprenatal[0]['id_prenatal_1'] ?>">
											<div class="form-body">
<?php
if(isset($message)){ 
if($message == 0){?>
		<div class="alert alert-danger">
		<button class="close" data-close="success" id="eliminar"></button>
		<span>
		 Los Datos no Fueron Registrados </span>
	</div>
	<?php
}
}
?>												
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Cedula</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-tablet"></i>
															</span>
											<input readonly type="text" class="form-control input-circle-right" placeholder="Cedula" name="cedula" id="cedula" value="<?php echo $id[0]['cedula'] ?>"/>
											<input type="hidden" id="id_paciente" name="id_paciente" value="<?php echo $id[0]['id_paciente'] ?>">
											<input type="hidden" name="id_usuario" value="<?php echo $id[0]['id_usuario'] ?>">
															</div>
														</div>
													</div>
													<div class="col-md-3">
												<div class="form-group">
															<label class="control-label">Nombre</label>
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-user"></i>
															</span>
															<input readonly type="text" class="form-control input-circle-right" placeholder="Nombre" name="nombre" value="<?php echo $id[0]['nombre']." ".$id[0]['apellido'] ?>"/>
														</div>
												</div>														
												</div>	
										<!--<div class="col-md-3">																						
									<div class="form-group">
										<label class="control-label">Fecha de Nacimiento</label>
											<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-calendar"></i>
															</span>														
												<input name="fecha_nac" id="fecha_nac" type="text" class="form-control input-circle-right" readonly value="<?php echo $this->dash->fechanew2($id[0]['fecha_nac']) ?>">

											</div>
									</div>								
										</div>-->	
													<div class="col-md-2">
												<div class="form-group">
															<label class="control-label">Edad</label>
														<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-list-ol"></i>
															</span>
															<input type="number" class="form-control input-circle-right" placeholder="Edad" name="edad" id="edad" readonly value="<?php echo $id[0]['edad'] ?>">
														</div>
												</div>														
												</div>
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Embarazada?</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bold"></i>
															</span>
															<input type="text" class="form-control input-circle-right" placeholder="Embarazo" name="embarazo" id="embarazo" readonly value="<?php echo ($id[0]['embarazo']==1) ? "si" : "no"; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Aseguradora</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-download"></i>
															</span>

																							
												<?php $num = 0;foreach($datos as $aseguradora){
														if($aseguradora['id_seguros']==$id[0]['id_seguros']){		
												?>
									<input type="text" class="form-control input-circle-right" placeholder="Seguros" name="seguro" id="seguro" readonly value="<?php echo $aseguradora['seguros']; ?>">												
															<?php } }
																?>																												
															</div>
														</div>
													</div>																								
												</div>
							<div class="tabbable-custom ">
								<ul class="nav nav-tabs ">
									<li class="active">
										<a href="#tab_5_1" data-toggle="tab">
										Resumen de Evaluaci&oacute;n </a>
									</li>
									<li>
										<a href="#tab_5_2" data-toggle="tab">
										Sintomas </a>
									</li>
									<li>
										<a href="#tab_5_3" data-toggle="tab">
										Evaluaci&oacute;n Cl&iacute;nica </a>
									</li>
																																		
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_5_1">
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Ultimo Periodo</label>
															<div class="input-group">
																<input readonly type="text" class="form-control" name="ultimo_p2" id="ultimo_p2" value="<?php echo $this->dash->fechanew2($dprenatal[0]['ultimo_p2'])?>"/>
															</div>
														</div>
													</div>	
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Probable de Parto</label>
															<div class="input-group">
																<input readonly type="text" class="form-control" name="parto_p" id="parto_p" value="<?php echo $this->dash->fechanew2($dprenatal[0]['parto_p'])?>"/>
																</div>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Edad Gestacional</label>
															<div class="input-group">
																<input readonly type="text" class="form-control" name="edadg" id="edadg" value="<?php echo $dprenatal[0]['edadg'];?>"/>
																</div>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Paridad</label>
															<div class="input-group">
																<input readonly type="text" class="form-control" name="pari" id="pari" value="<?php echo $datos_g[0]['paridad'];?>"/>										
																</div>
														</div>
													</div>																	
											</div>				
											<div class="row">																							
													<div class="col-md-7">
										<div class="form-group">
										<label class="control-label">Antecedentes de riesgo o Situacion particular condicionada gestacional</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Antecedentes...." name="antecedentes_r" ><?php echo $dprenatal[0]['antecedentes_r'];?></textarea>

											</div>
									</div>
													</div>
										<div class="col-md-5">
										<div class="form-group">
										<label class="control-label">Notas y Resoluciones</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-font"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas y Resoluciones...." name="notas_res" ><?php echo $dprenatal[0]['notas_res'];?></textarea>

											</div>
									</div>
										</div>
									</div>																																											
											<div class="row">
												<div class="form-body">
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Interconsultas con otras especialidades</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-medkit"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Interconsultas con otras especialidades..." name="interconsultas" ><?php echo $dprenatal[0]['interconsultas'];?></textarea>

											</div>
									</div>
													</div>
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Eventos, Accidentes, reportes telefonicos o mensajer&iacute;a</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-ambulance"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Eventos..." name="eventos"><?php echo $dprenatal[0]['eventos'];?></textarea>

											</div>
									</div>
													</div>													
												</div>
											</div>
											<div class="row">	
												<div class="form-body">																							
														<div class="col-md-12">
										<div class="form-group">
										<label class="control-label">Notas EA</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-plus-square"></i>
															</span>														
										<textarea rows="3" class="form-control input-circle-right" placeholder="Notas EA..." name="notas_ea" ><?php echo $dprenatal[0]['notas_ea'];?></textarea>

											</div>
									</div>
													</div>													
												</div>												
									</div>																												
									</div>
									<div class="tab-pane" id="tab_5_2">
								<div class="form-body">
											<h4 class="form-section">Sintomas y Manifestacion Clinicas Maternas</h4>
								         		</div>		
												<div class="row">
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Movimientos Fetales</label>
						<input type="text" class="form-control" name="fetales" id="fetales" value="<?php echo $dprenatal[0]['fetales'] ?>"/>
					<label class="control-label">Neurologicos</label><br>
						<input type="text" class="form-control" name="neurologicos" id="neurologicos" value="<?php echo $dprenatal[0]['neurologicos'] ?>"/>
						<label class="control-label">Respiratorios</label><br>
						<input type="text" class="form-control" name="respiratorios" id="respiratorios" value="<?php echo $dprenatal[0]['respiratorios'] ?>"/>
						<label class="control-label">Cardiovascular</label><br>
						<input type="text" class="form-control" name="cardiovasculares" id="cardiovasculares" value="<?php echo $dprenatal[0]['cardiovasculares'] ?>"/>
												</div>
									</div>
								<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Urinarios</label>
									<input type="text" class="form-control" name="urinarios" id="urinarios" value="<?php echo $dprenatal[0]['urinarios'] ?>"/>
									<label class="control-label">Digestivos</label><br>
						<input type="text" class="form-control" name="digestivos" id="digestivos" value="<?php echo $dprenatal[0]['digestivos'] ?>"/>
						<label class="control-label">Genitales</label><br>
						<input type="text" class="form-control" name="genitales" id="genitales" value="<?php echo $dprenatal[0]['genitales'] ?>"/>
						<label class="control-label">Osteomusculoarticular</label><br>
						<input type="text" class="form-control" name="osteomusculo" id="osteomusculo" value="<?php echo $dprenatal[0]['osteomusculo'] ?>"/>
												</div>
									</div>
																						
								</div>
											<div class="row">
												<div class="form-body">
													<div class="col-md-12">
										<div class="form-group">
										<label class="control-label">Notas sobre sintomas y condiciones maternas</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-font"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas..." name="notas_maternas"><?php echo $dprenatal[0]['notas_maternas'] ?></textarea>
											</div>
									</div>
													</div>																										
												</div>
									</div>								
									</div>								
									<div class="tab-pane" id="tab_5_3">
												<div class="row">
													<div class="col-md-2">
												<div class="form-group">
															<label class="control-label">Tensi&oacute;n Arterial</label>
						<input type="text" class="form-control" name="tension" id="tension" value="<?php echo $dprenatal[0]['tension'] ?>"/>

												</div>
									</div>	
											<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Peso</label>
						<input type="text" class="form-control" name="peso" id="peso" value="<?php echo $dprenatal[0]['peso'] ?>"/>
												</div>
									</div>	
									<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Variacion de Peso</label>
						<input type="text" class="form-control" name="variacion" id="variacion" value="<?php echo $dprenatal[0]['variacion'] ?>"/>

												</div>
									</div>	
									<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Edemas</label>
						<input type="text" class="form-control" name="edemas" id="edemas" value="<?php echo $dprenatal[0]['edemas'] ?>"/>

												</div>
									</div>																									
											</div>										
											<div class="row">
												<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Otros Hallazgos y condiciones llamativas</label>
						<input type="text" class="form-control" name="hallazgos" id="hallazgos" value="<?php echo $dprenatal[0]['hallazgos'] ?>"/>
						<label class="control-label">Vigilancia Fetal</label><br>
						<input type="text" class="form-control" name="vigilancia" id="vigilancia" value="<?php echo $dprenatal[0]['vigilancia'] ?>"/>
						<label class="control-label">Plan de Trabajo, Interconsultas, Recomendaciones o Advertencias</label><br>
						<input type="text" class="form-control" name="plan" id="plan" value="<?php echo $dprenatal[0]['plan'] ?>"/>
						<label class="control-label">Resumen Clinico</label><br>
						<input type="text" class="form-control" name="resumen" id="resumen" value="<?php echo $dprenatal[0]['resumen'] ?>"/>
						<label class="control-label">Laboratorio Solicitado</label><br>
						<input type="text" class="form-control" name="laboratorio" id="laboratorio" value="<?php echo $dprenatal[0]['laboratorio'] ?>"/>
						<label class="control-label">Medicamentos Indicados</label><br>
						<input type="text" class="form-control" name="medicamentos" id="medicamentos" value="<?php echo $dprenatal[0]['medicamentos'] ?>"/>
						<label class="control-label">Reposo Indicado</label><br>
						<input type="text" class="form-control" name="reposos" id="reposos" value="<?php echo $dprenatal[0]['reposos'] ?>"/>
												</div>
									</div>
											</div>													
									</div>
									</form>			
								</div>
						</div>								
										
												<!--/row-->
													<div class="form-actions fluid">
														<div class="col-md-offset-2 col-md-10">
															<button class="btn btn-success" type="submit">Actualizar</button>
															<a class="btn btn-default" href="<?php echo site_url('consulta/listado_pacientes'); ?>">Cancelar</a>
														</div>
													</div>
										<!-- END FORM-->
									</div>
								</div>
							</div>
						</div>