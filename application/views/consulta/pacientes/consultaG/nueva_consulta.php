<?php
$viciosio=array("nunca he fumado"," < 5 cigarrillos/dia","5-10 cigarrillos/dia","11-15 cigarrillos/dia","16-20 cigarrillos/dia",">20 cigarrillos/dia");


?>										
										<div class="col-md-12">

								<div class="portlet box red">
									<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i> Consulta Ginecol&oacute;gica de Primera N# <?php echo $numerocon;?> => Fecha <?php echo date("d/m/Y");?>
					</div>

									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo site_url('consulta/reg_consulta'); ?>" method="post" class="horizontal-form">
											<input type="hidden" name="id_consultag" id="id_consultag" value="<?php echo $numerocon;?>">
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
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Cedula</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-tablet"></i>
															</span>
																<input readonly type="text" class="form-control input-circle-right" placeholder="Cedula" name="cedula" id="cedula" value="<?php echo $id[0]['cedula'] ?>"/>
																<input type="hidden" name="id_paciente" value="<?php echo $id[0]['id_paciente'] ?>">
																<input type="hidden" name="id_usuario" value="<?php echo $id[0]['id_usuario'] ?>">
															</div>
														</div>
												</div>
												<div class="col-md-3">																						
									<div class="form-group">
										<label class="control-label">Fecha de Nacimiento</label>
											<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-calendar"></i>
															</span>														
												<input name="fecha_nac" id="fecha_nac" type="text" class="form-control input-circle-right" readonly value="<?php echo $this->dash->fechanew2($id[0]['fecha_nac']) ?>">

											</div>
									</div>								
												</div>	
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
															<label class="control-label">Telefono</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-phone"></i>
															</span>
															<input type="text" class="form-control input-circle-right" placeholder="Telefono" name="telefono" id="telefono" readonly value="<?php echo $id[0]['telefono'] ?>">
															</div>
														</div>
												</div>
										</div>
												<div class="row">												
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
													<div class="col-md-3">																						
									<div class="form-group">
										<label class="control-label">Correo</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-envelope"></i>
															</span>														
												<input name="correo" id="correo" type="text" class="form-control input-circle-right" readonly value="<?php echo $id[0]['correo'] ?>">

											</div>
									</div>								
										</div>
										<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Direccion</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-forward"></i>
															</span>
																<input readonly type="text" class="form-control input-circle-right" placeholder="Direccion" name="direccion" value="<?php echo $id[0]['direccion'] ?>"/>
															</div>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Grupo Sangu&iacute;neo</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-signal"></i>
															</span>
																<input readonly type="text" class="form-control input-circle-right" placeholder="Grupo Sangu&iacute;neo" name="g_sanguineo" value="<?php echo $id[0]['g_sanguineo'] ?>"/>
															</div>
														</div>
													</div>																							
												</div>
							<div class="tabbable-custom ">
								<ul class="nav nav-tabs ">
									<li class="active">
										<a href="#tab_6_1" data-toggle="tab">
										Antecedentes Personales y Familiares </a>
									</li>
									<li>
										<a href="#tab_5_1" data-toggle="tab">
										GinecoObst&eacute;trico </a>
									</li>
									<li>
										<a href="#tab_5_4" data-toggle="tab">
										Motivo de Consulta y Evaluaci&oacute;n </a>
									</li>	
									<li>
										<a href="#tab_5_5" data-toggle="tab">
										Diagnostico Plan y Tratamiento </a>
									</li>																																		
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_6_1">
										<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Patolog&iacute;a M&eacute;dica</label>
						<input name="patologia" class="form-control" type="text" >
							</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Patolog&iacute;a Quir&uacute;rgica General</label>
						<input type="text" class="form-control" name="patologia_general" id="patologia_general" />
												</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Accidentes/Traumatismo</label>
						<input name="accidentes" class="form-control" type="text" >
							</div>
													</div>							
								</div>
								<div class="row">
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Salud Mental</label>
						<input type="text" class="form-control" name="mental" id="mental" />
												</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Alergias</label>
						<input name="alergias" class="form-control" type="text" >
							</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Tabaco</label>
			<select  name="tabaco" id="tabaco" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($viciosio as $perra){ ?>
															<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php
																 } 
																?>														
														</select>
								</div>
																		
													</div>
																						
								</div>
								<div class="row">
									<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Alcohol</label>
			<select  name="alcohol" id="alcohol" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Rara vez">Rara vez</option>
															<option value="Ocasional">Ocasional</option>
															<option value="Fines de Semana">Fines de Semana</option>
															<option value="Frecuente">Frecuente</option>
															<option value="Alcoholismo Potencial">Alcoholismo Potencial</option>
														</select>	
									</div>									
								  </div>
								  <div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Drogas Recreativas</label>
			<select  name="drogas" id="drogas" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_d as $drogas){?>
													<option value="<?php echo $drogas['id_drogas']; ?>"><?php echo $drogas['drogas']; ?></option>
											<?php } ?>
														</select>	
								</div>								
								  </div>
								  <div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Ejercita</label>
			<select  name="ejercita" id="ejercita" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Rara vez">Rara vez</option>
															<option value="Sedentaria">Sedentaria</option>
															<option value="Diario">Diario</option>
															<option value="1 Semanal">1 Semanal</option>
															<option value="2 Semanal">2 Semanal</option>
															<option value="3 Semanal">3 Semanal</option>
															<option value="4 Semanal">4 Semanal</option>
														</select>	
								</div>								
									</div>
								  													
								</div>
								<div class="row">
								  <div class="col-md-8">
														<div class="form-group">
															<label class="control-label">Tratamiento(s) actual(es)</label>
												<textarea class="form-control" row="6" name="tratamientos_act" id="tratamientos_act"></textarea>
															</div>
								  </div>
								  <div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Antecedentes Familiares</label>
			<select  name="antece_fam" id="antece_fam" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="1">Contributorios</option>
															<option value="No Contributorios">No Contributorios</option>
															</select>
															<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="6" name="texto_1" id="texto_1" placeholder="Texto Libre"></textarea>	
								</div>								
									</div>
								</div>
											<div class="row">
												<div class="form-body">
													<div class="col-md-12">
										<div class="form-group">
										<label class="control-label">Notas</label>
												<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas Ginecol&oacute;gicas" name="notas_gineco" ></textarea>
											</div>
												</div>
										</div>													
												</div>
											</div>																																										
									</div>
									<div class="tab-pane" id="tab_5_1">
											
											<div class="row">
										
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Menarca</label>
															<input type="number" class="form-control" name="menarca" id="menarca"/>
														</div>
												</div>
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">&Uacute;ltima Regla</label>
												<input name="ultimo_p" id="ultimo_p" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy">
															</div>
												</div>
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Regularidad</label>
															<input type="text" class="form-control" name="regularidad" id="regularidad"/>
														</div>
												</div>
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Duraci&oacute;n</label>
															<input type="text" class="form-control" name="duracion_g" id="duracion_g"/>
														</div>
												</div>
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Dismenorrea</label>
			<select  name="dismenorrea" id="dismenorrea" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="texto_2" id="texto_2" placeholder="Texto Libre"></textarea>	
									</div>									
								 				</div>
								 				<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Cambios recientes</label>
															<textarea class="form-control" row="2" name="cambios_r" id="cambios_r"></textarea>
														</div>
												</div>
												
												
											</div>
										
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Sexualidad Act.</label>
			<select  name="sex_act" id="sex_act" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
														</select>
														</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Dispareunia</label>
			<select  name="dispareunia" id="dispareunia" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="texto_3" id="texto_3" placeholder="Texto Libre"></textarea>	
									</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Orientacion</label>
			<select  name="sex_act" id="sex_act" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Heterosexual">Heterosexual</option>
															<option value="Homosexual">Homosexual</option>
															<option value="Bisexual">Bisexual</option>
														</select>
														</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">N&uacute;mero de Parejas</label>
															<input type="number" class="form-control" name="parejasx" id="parejasx"/>
														</div>
												</div>
												<div class="col-md-2">
														<div class="form-group">
												<label class="control-label">Anticoncepci&oacute;n</label>
									<select  name="anticonceptivos" id="anticonceptivos" class="form-control input-normal select2me" data-placeholder="Selecccione">			
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_a as $antico){?>
													<option value="<?php echo $antico['id_anticonceptivos']; ?>"><?php echo $antico['anticonceptivos']; ?></option>
											<?php } ?>
														</select>
												</div>
												</div>														
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">&Uacute;ltima Citolog&iacute;a</label>
															<textarea class="form-control" row="2" name="u_citologia" id="u_citologia"></textarea>
														</div>
												</div>
												
												</div>
												
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">&Uacute;ltima Mamograf&iacute;a</label>
															<textarea class="form-control" row="2" name="u_mamografia" id="u_mamografia"></textarea>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Menopausia</label>
			<select  name="menopausia" id="menopausia" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="texto_4" id="texto_4" placeholder="Texto Libre"></textarea>	
														</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">(TRH)</label>
			<select  name="terapiarh" id="terapiarh" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="texto_5" id="texto_5" placeholder="Texto Libre"></textarea>	
									</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Embarazo</label>
																<input type="number" class="form-control" name="embarazo" id="embarazo"/>
									</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Partos</label>
																<input type="number" class="form-control" name="partos" id="partos"/>
														</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Ces&aacute;reas</label>
														<input name="cesareas" id="cesareas" type="text" class="form-control">																										
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Abortos</label>
														<input type="number" class="form-control" name="aborto" id="aborto"/>										
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Ect&oacute;picos</label>
																<input type="number" class="form-control" name="ectopico" id="ectopico"/>									
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Complicaciones</label>
			<select  name="complicaciones" id="complicaciones" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="texto_6" id="texto_6" placeholder="Texto Libre"></textarea>	
														</div>									
								 					</div>
								 					<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Malformaciones</label>
			<select  name="malformaciones" id="malformaciones" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Si">Si</option>
															<option value="No">No</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="texto_7" id="texto_7" placeholder="Texto Libre"></textarea>	
														</div>									
								 					</div>
																
												</div>														
												
																																										
									</div>
									<div class="tab-pane" id="tab_5_4">
										<div class="row">
											<div class="col-md-12">
										<div class="form-group">
										<label class="control-label">Sintomas</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="2" class="form-control input-circle-right" placeholder="Sintomas" name="sintomas" ></textarea>

											</div>
									</div>
													</div>											
										</div>
									<h3 class="form-section">Evaluaci&oacute;n</h3>		
								 <div class="row">

										<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Peso</label>
			<select  name="peso" id="peso" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_1" id="normal_1" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">General</label>
			<select  name="general" id="general" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_2" id="normal_2" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cabeza</label>
			<select  name="cabeza" id="cabeza" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_3" id="normal_3" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cuello y Tiroides</label>
			<select  name="cuello_tiroides" id="cuello_tiroides" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_4" id="normal_4" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 </div>
								 <div class="row">
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cardiorrespiratorio</label>
			<select  name="cardiorrespiratorio" id="cardiorrespiratorio" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_5" id="normal_5" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Mamas y axilas</label>
			<select  name="mamas_axilas" id="mamas_axilas" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_6" id="normal_6" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Abdomen</label>
			<select  name="abdomen" id="abdomen" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_7" id="normal_7" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Genitales externos</label>
			<select  name="genitales_externos" id="genitales_externos" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_8" id="normal_8" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
						 		 </div>
						 		 <div class="row">
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Labios mayores y menores</label>
			<select  name="labios_m" id="labios_m" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_9" id="normal_9" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Uretra</label>
			<select  name="uretra" id="uretra" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_10" id="normal_10" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Vagina</label>
			<select  name="vagina" id="vagina" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_11" id="normal_11" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cuello uterino</label>
			<select  name="cuello_uterino" id="cuello_uterino" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_12" id="normal_12" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
						 		 </div>
						 		 <div class="row">
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Ano y perineo</label>
			<select  name="ano" id="ano" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_13" id="normal_13" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
						 		 </div>											
									<h3 class="form-section">Ecograf&iacute;a</h3>
										<div class="row">
												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">&Uacute;tero</label>
			<select  name="utero" id="utero" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_14" id="normal_14" placeholder="Texto Libre"></textarea>	
									</div>									
								 				</div>
								 		<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Endometrio</label>
			<select  name="endometrio" id="endometrio" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_15" id="normal_15" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
								 		<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Ovarios</label>
			<select  name="ovarios" id="ovarios" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_16" id="normal_16" placeholder="Texto Libre"></textarea>	
									</div>									
								 		</div>
							 		</div>
										
										<div class="row">
							
										<div class="col-md-12">
											<div class="form-group">
										<label class="control-label">Nota Ecogr&aacute;fica</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bold"></i>
															</span>														
												<textarea rows="2" class="form-control input-circle-right" placeholder="Nota Ecogr&aacute;fica :" name="nota_ecografica" ></textarea>

											</div>
									</div>
									</div>																				
										</div>																																						
									</div>		
									<div class="tab-pane" id="tab_5_5">
										<div class="row">
											<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Diagnostico</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="2" class="form-control input-circle-right" placeholder="Diagnostico: " name="diagnostico" ></textarea>

											</div>
									</div>
													</div>
							<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Plan</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="2" class="form-control input-circle-right" placeholder="Plan: " name="plan" ></textarea>

											</div>
									</div>
													</div>
<div class="form-body">
												<h4 class="form-section">Recipes</h3>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">		
                    	      <tbody>	
                    	      	<tr id="reciped"></tr>
                    </tbody>
                  
            	</table>
         		</div>																
								</div>
										<div class="row">			
								<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Medicamentos</label>
															<div class="input-group">														
			<select name="medicina" id="medicina" class="form-control input-large select2me" data-placeholder="Selecccione">			
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_me as $medicina){?>
													<option value="<?php echo $medicina['id_medicina']; ?>"><?php echo $medicina['medicina']; ?></option>
											<?php } ?>
														</select>	
									</div>									
								</div>								
							</div>
								<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Presentacion</label>
															<div class="input-group">														
			<select  name="presentacion" id="presentacion" class="form-control input-large select2me" data-placeholder="Selecccione">
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_pre as $presentacion){?>
													<option value="<?php echo $presentacion['id_presentacion']; ?>"><?php echo $presentacion['presentacion']; ?></option>
											<?php } ?>
														</select>	
									</div>									
								</div>								
							</div>
								<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Concentracion</label>
															<div class="input-group">														
			<select  name="concentracion" id="concentracion" class="form-control input-medium select2me" data-placeholder="Selecccione">
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_co as $concentracion){?>
													<option value="<?php echo $concentracion['id_concentracion']; ?>"><?php echo $concentracion['concentracion']; ?></option>
											<?php } ?>
														</select>	
									</div>									
								</div>								
							</div>														
							</div>			
										<div class="row">			
								<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Horario de Tomas</label>
															<div class="input-group">														
			<select  name="horario" id="horario" class="form-control input-large select2me" data-placeholder="Selecccione">			
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_ho as $horario){?>
													<option value="<?php echo $horario['id_horario']; ?>"><?php echo $horario['horario']; ?></option>
											<?php } ?>
														</select>	
									</div>									
								</div>								
							</div>
								<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Duracion</label>
															<div class="input-group">														
			<select  name="duracion" id="duracion" class="form-control input-medium select2me" data-placeholder="Selecccione">
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_du as $duracion){?>
													<option value="<?php echo $duracion['id_duracion']; ?>"><?php echo $duracion['duracion']; ?></option>
											<?php } ?>
														</select>	
									</div>									
								</div>								
							</div>
								<!--<div class="col-md-5">
														<div class="form-group">
															<label class="control-label">&nbsp</label>
															<div class="input-group">														
						<label>&nbsp&nbsp Habilitar Descarga <input name="descargar" id="descargar" type="checkbox" class="icheck">&nbsp&nbsp </label>
		
									</div>									
								</div>								
							</div>-->							
							</div>
						<div class="row">															
											<div class="col-md-9">
										<div class="form-group">
										<label class="control-label">Nota</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="2" class="form-control input-circle-right" placeholder="Nota: " name="nota_recipe" id="nota_recipe" ></textarea>

											</div>
									</div>
											</div>
								<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">&nbsp</label>
															<div class="input-group">														
			<a href="#" id="recipej" class="btn purple"><i class="fa fa-plus"></i> A&ntilde;adir Medicamento </a>
									</div>									
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
															<button class="btn btn-success" type="submit">Guardar</button>
															<a class="btn btn-default" href="<?php echo site_url('consulta/listado_pacientes'); ?>">Cancelar</a>
														</div>
													</div>
										<!-- END FORM-->
									</div>
								</div>
							</div>
						</div>