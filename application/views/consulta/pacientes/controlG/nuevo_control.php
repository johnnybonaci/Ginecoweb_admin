<?php
$viciosio=array("nunca he fumado"," < 5 cigarrillos/dia","5-10 cigarrillos/dia","11-15 cigarrillos/dia","16-20 cigarrillos/dia",">20 cigarrillos/dia");


?>										
										<div class="col-md-12">

								<div class="portlet box blue">
									<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i> Control Ginecol&oacute;gico N# <?php echo $numerocon;?> => Fecha <?php echo date("d/m/Y");?>
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
										Control </a>
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
											<div class="col-md-1">
														<div class="form-group">
															<label class="control-label">Edad</label>
						<input readonly name="edad_g" class="form-control" type="text" value="<?php echo $id[0]['edad'] ?>">
							</div>
											</div>
											<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">&Uacute;ltima Regla</label>
						<input name="u_regla_g" readonly class="form-control" type="text" value="<?php echo $id[0]['ultimo_p'] ?>">
							</div>
											</div>
											<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Caracter&iacute;sticas Menstruales</label>
			<select  name="general" id="general" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal">Normal</option>
															<option value="Anormal">Anormal</option>
															<option value="Ciclicas">Ciclicas</option>
															<option value="Regulares">Regulares</option>
														</select>
														<label class="control-label">&nbsp;</label>
												<textarea style="display:none" class="form-control" row="2" name="normal_20" id="normal_20" placeholder="Texto Libre"></textarea>	
									</div>									
								 		  </div>
								 		<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Sexualidad</label>
			<select  name="general" id="general" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Activa">Activa</option>
															<option value="Inactiva">Inactiva</option>
														</select>	
									</div>									
								 		</div>
								 		<div class="col-md-3">
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
													
																				
								</div>
								
								
											<div class="row">
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Eventos</label>
												<div class="input-group">										
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" name="eventos" ></textarea>
											</div>												
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
			<select  name="general" id="general" class="form-control select2me" data-placeholder="Selecccione">			
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