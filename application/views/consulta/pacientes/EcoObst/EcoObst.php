<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
										<div class="col-md-12">

								<div class="portlet box red">
									<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i> Ecog Obst&eacute;trico N# <?php echo $numerocon;?> => Fecha <?php echo date("d/m/Y");?>
					</div>

									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo site_url('consulta/reg_EcoObst'); ?>" method="post" class="horizontal-form">
											<input type="hidden" name="id_eco_obstetrico_1" id="id_eco_obstetrico_1" value="<?php echo $numerocon;?>">											
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
																																				
												</div>
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Ultimo Periodo</label>
															<div class="input-group">
																<input readonly type="text" class="form-control" name="ultimo_p2" id="ultimo_p2" value=""/>
															</div>
														</div>
													</div>	
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Probable de Parto</label>
															<div class="input-group">
																<input readonly type="text" class="form-control" name="parto_p" id="parto_p" value=""/>
																</div>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Edad Gestacional</label>
															<div class="input-group">
																<input readonly type="text" class="form-control" name="edadg" id="edadg" value=""/>
																</div>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Paridad</label>
															<div class="input-group">
																<input type="number" class="form-control" name="paridad" id="paridad" value=""/>										
																</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Medico Tratante</label>
													<select  name="tratante" id="tratante" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>
												<?php $num = 0;foreach($tratante as $medico){?>
													<option value="<?php echo $medico['id_tratante']; ?>"><?php echo $medico['tratante']; ?></option>
											<?php } ?>
														</select>												
													</div>
													</div>																	
											</div>
											<div class="row">
												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Sonda</label>
														<select  name="sonda" id="sonda" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Transvaginal Multifrecuencial">Transvaginal Multifrecuencial</option>
															<option value="Transabdominal multifrecuencial">Transabdominal multifrecuencial</option>
															<option value="Mixto TV/TA multifrecuencial">Mixto TV/TA multifrecuencial</option>
														</select>												
														</div>
												</div>
												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Tipo de Estudio</label>
														<select  name="estudio" id="estudio" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>
															<option value="Obstetrico">Obstetrico</option>
															<option value="Obstetrico Doppler">Obstetrico Doppler</option>
															<option value="Genetico segundo trimestre">Genetico segundo trimestre</option>
														</select>												
														</div>
												</div>
													<div class="col-md-4">
										<div class="form-group">
										<label class="control-label">Comentarios</label>
												<textarea rows="2" class="form-control" placeholder="Comentarios..." name="comentarios"></textarea>
									</div>
													</div>																										
													
																						
													
												</div>
							<div class="tabbable-custom ">
								<ul class="nav nav-tabs ">
									<li class="active">
										<a href="#tab_5_1" data-toggle="tab">
										Vitalidad y Membrana </a>
									</li>
									<li>
										<a href="#tab_5_2" data-toggle="tab">
										Biometria y Anatomia </a>
									</li>
									<li>
										<a href="#tab_5_3" data-toggle="tab">
										Doppler Maternofetal </a>
									</li>
									<li>
										<a href="#tab_5_4" data-toggle="tab">
									Marcadores Aneuploidia </a>
									</li>	
									<li>
										<a href="#tab_5_5" data-toggle="tab">
										Diagnostico y Sugerencia </a>
									</li>																		
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_5_1">
										<div class="row">
												
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Numero de fetos</label>
																<input type="number" class="form-control" name="nfetos" value=""/>
															
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Liquido Amionitoco</label>
																<select  name="lamniotico" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>			
															<option value="Normal">Normal</option>
															<option value="Aumentado (>p90)">Aumentado (>p90)</option>
															<option value="Disminuido (<p10)">Disminuido (<p10)</option>
														</select>
													</div>
											</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Placentacion</label>
															<input type="text" class="form-control" name="placentacion" value=""/>
														</div>
													</div>
										</div>
										<div class="row">
											<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Estatica Fetal</label>
																<select  name="efetal" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>			
															<option value="Cefalica Derecha">Cefalica Derecha</option>
															<option value="Cefalica Izquierda"> Cefalica Izquierda</option>
															<option value="Podalica Derecha">Podalica Derecha</option>
															<option value="Podalica Izquierda">Podalica Izquierda</option>
															<option value="Oblicua Variable">Oblicua Variable</option>
														</select>
														</div>
											</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">M Respiratorios</label>
															<select  name="mrespiratorio" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Presentes 2">Presentes 2</option>
															<option value="Ausentes 0">Ausentes 0</option>
														</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Corionicidad</label>
															<select  name="corionicidad" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Monocorial">Monocorial</option>
															<option value="Bicorial biamniotico">Bicorial biamniotico</option>
															<option value="Monocorial biamniotico">Monocorial biamniotico</option>
														</select>

														</div>
													</div>
										</div>										
										<div class="row">
											<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Signos Vitales Fetales</label>
																<select  name="svfetales" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>			
															<option value="Presentes">Presentes</option>
															<option value="Ausentes">Ausentes</option>
														</select>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">M Fetales</label>
															<select  name="mfetales" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Presentes 2">Presentes 2</option>
															<option value="Ausentes 0">Ausentes 0</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Ubicacion</label>
															<select  name="ubicacion" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Anterior">Anterior</option>
															<option value="Posterior">Posterior</option>
															<option value="Derecha">Derecha</option>
															<option value="Izquierda">Izquierda</option>
														</select>

														</div>
													</div>
										</div>
										<div class="row">
											<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Frecuencia Cardiaca Fetal</label>
																<select  name="fcfetal" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>			
															<option value="Rango normal 120-16">Rango normal 120-16</option>
															<option value="Bradicardia fetal <120">Bradicardia fetal <120</option>
															<option value="Taquicardia fetal >160">Taquicardia fetal >160</option>
														</select>
													</div>
											</div>
											<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Tono</label>
															<select  name="tono" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Presentes 2">Presentes 2</option>
															<option value="Ausentes 0">Ausentes 0</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Previa</label>
															<select  name="previa" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="No">No</option>
															<option value="Insercion baja">Insercion baja</option>
															<option value="Parcial">Parcial</option
															<option value="Centro oclusiva">Centro oclusiva</option>
														</select>

														</div>
													</div>
									</div>
									
									<div class="row">
											<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Liquido</label>
															<select  name="liquido" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Suficiente 2">Suficiente 2</option>
															<option value="Disminuido 0">Disminuido 0</option>
														</select>

														</div>
											</div>
											<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Grado</label>
															<select  name="grado" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="0 Grannum">0 Grannum</option>
															<option value="1 Grannum">1 Grannum</option>
															<option value="2 Grannum">2 Grannum</option>
															<option value="3 Grannum">3 Grannum</option>
														</select>

														</div>
											</div>
											<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Perfil Biofisico fetal</label>
															<select  name="pbfetal" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal 8/8">Normal 8/8</option>
															<option value="Dudoso 6/8">Dudoso 6/8</option>
															<option value="SOSPECHA ASFICTICA 4/8">SOSPECHA ASFICTICA 4/8</option>
															<option value="POSIBLEMENTE ASFICTICO 2/8">POSIBLEMENTE ASFICTICO 2/8</option>
															<option value="ASFICTICO 0/8">ASFICTICO 0/8</option>
														</select>

														</div>
											</div>
													
																										
									</div>
									<div class="row">
										<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cordon</label>
															<select  name="cordon" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="3 Vasos">3 Vasos</option>
															<option value="AU UNICA">AU UNICA</option>
														</select>

														</div>
													</div>
												<div class="col-md-9">
										<div class="form-group">
										<label class="control-label">Notas</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas...." name="notas" ></textarea>

											</div>
									</div>
													</div>
													
											</div>
										</div>
									<div class="tab-pane" id="tab_5_2">
										<div class="row">
											<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Biparietal</label>
																<input type="number" class="form-control" name="biparietal"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Craneo</label>
															<select  name="craneo" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normocefalo">Normocefalo</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Estomago</label>
															<select  name="estomago" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Lleno">Lleno</option>
															<option value="No Visulizado">No Visualizado</option>
														</select>

														</div>
													</div>
											</div>	
																																
                        <div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Circunferencia Cefalica</label>
																<input type="number" class="form-control" name="ccefalica"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Orbitas</label>
															<select  name="orbitas" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="2 visibles">2 visibles</option>
															<option value="al menos 1 visible">al menos 1 visible</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Pared Abdominal</label>
															<select  name="pabdominal" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Integra">Integra</option>
															<option value="Onfalocele">Onfalocele</option>
															<option value="Gastrosquisis">Gastrosquisis</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
											</div>
											
											<div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Circunferencia Abdominal</label>
																<input type="number" class="form-control" name="circunferencia"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Atrium</label>
															<select  name="atrium" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal (<10mm)">Normal (<10mm)</option>
															<option value="Ventriculomegalia (>10mm)">Ventriculomegalia (>10mm)</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Higado</label>
															<select  name="higado" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Integra">Integra</option>
															<option value="Aspecto Normal">Aspecto Normal</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
											</div>
											
											
											<div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Femur</label>
																<input type="number" class="form-control" name="femur"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cerebelo</label>
															<select  name="cerebelo" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Visible">Visible</option>
															<option value="acorde a EG)">acorde a EG</option>
														</select>

														</div>
													</div>


											     	<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Bazo</label>
															<select  name="bazo" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Visible">Visible</option>
															<option value="No Evaluado">No Evaluado</option>
														</select>

														</div>
													</div>
											</div>
											<div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Humero</label>
																<input type="number" class="form-control" name="humero"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cisterna</label>
															<select  name="Cisterna" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal (<10mm)">Normal (<10mm)</option>
															<option value="Normal (<10mm)">Normal (<10mm)</option>
														</select>

														</div>
													</div>


											     	<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Vesicula Biliar</label>
															<select  name="vbiliar" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Visible">Visible</option>
															<option value="No Evaluada">No Evaluada</option>
														</select>

														</div>
													</div>
											</div>
											<div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Cubito</label>
																<input type="number" class="form-control" name="cubito"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Perfil Fetal</label>
															<select  name="pfetal" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="visible">Visible</option>
															<option value="Aspecto normal">Aspecto normal</option>
															<option value="Angulo facial normal">Angulo facial normal</option>
														</select>

														</div>
													</div>
											     	<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Intestinos</label>
															<select  name="intestinos" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Grado 1">Grado 1</option>
															<option value="Grado 2">Grado 2</option>
															<option value="Grado 3">Grado 3</option>
															<option value="Grado 4">Grado 4</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
											</div>
											
											
											<div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Tibia</label>
																<input type="number" class="form-control" name="tibia"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Pliegue Nucal</label>
															<select  name="pnucal" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Normal (<6mm)">Normal (<6mm)</option>
															<option value="Aumentado (>6mm)">Aumentado (>6mm)</option>
														</select>

														</div>
													</div>
											     	<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Rinones</label>
															<select  name="rinones" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="2 Visibles">2 Visibles</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>
														</div>
													</div>
											</div>
											<div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Huesos Nasales</label>
																<input type="number" class="form-control" name="hnasales"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Rostro</label>
															<select  name="rostro" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Sin fisuras">Sin fisuras</option>
															<option value="Macizo facial visible">Macizo facial visible</option>
														</select>
														</div>
													</div>
											     	<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Vejiga</label>
															<select  name="vejiga" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Llena">Llena</option>
															<option value="No Visualizable">No Visualizable</option>
															<option value="Ver NOTAS">Ver NOTAS </option>
														</select>
														</div>
													</div>
											</div>
											<div class="row">
														<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Peso Fetal Estimado</label>
																<input type="number" class="form-control" name="pfestimado"/>
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Torax</label>
															<select  name="torax" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Integro">Integro</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>


											     	<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Genitales</label>
															<select  name="genitales" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Femeninos">Femeninos</option>
															<option value="Masculinos">Masculinos</option>
															<option value="Indeterminables">Indeterminables </option>
														</select>

														</div>
													</div>
													
											</div>
											
											<div class="row">
												<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Corazon</label>
															<select  name="corazon" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="4 Camaras visibles">4 Camaras visibles</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Columna Vertebral</label>
															<select  name="cvertebral" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Integra">Integra</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Situs Eje Cardiaco</label>
															<select  name="secardiaco" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Situs solitus/Eje normal">Situs solitus/Eje normal</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Sacro</label>
															<select  name="sacro" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Integro">Integro</option>
															<option value="Orientacion normal">Orientacion normal</option>
														</select>

														</div>
													</div>
											</div>	
											
											
											<div class="row">
												<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Cruce Grandes Vasos</label>
															<select  name="cgvasos" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Cruce visible">Cruce visible</option>
															<option value="No evaluado">No evaluado</option>
															<option value="No Evaluable">No Evaluable</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Miembros</label>
															<select  name="miembros" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="4 Visibles">4 Visibles</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Diafragma</label>
															<select  name="diafragma" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Integro">Integrol</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Pies y Manos</label>
															<select  name="piemano" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<option value="Visibles">Visibles</option>
															<option value="Ver NOTAS">Ver NOTAS</option>
														</select>

														</div>
													</div>
											</div>	
											<div class="row">		
                           <div class="col-md-9">
										<div class="form-group">
										<label class="control-label">Notas</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas...." name="notas2" ></textarea>
											</div>
									</div>
													</div>
									</div>
								</div>
										
									<div class="tab-pane" id="tab_5_3">
										
										<div class="row">
											
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">SD Cerebral Media</label>
																<input type="text" class="form-control" name="sdcerebral"/>
														</div>
													</div>
													
														<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">SD Uterina Izquierda</label>
																<input type="text" class="form-control" name="sduterina"/>
														</div>
													</div>
															
											</div>	
											
											<div class="row">
											
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IP Cerebral Media</label>
																<input type="text" class="form-control" name="ipcerebral"/>
														</div>
													</div>
													
														<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IP Uterina Izquierda</label>
																<input type="text" class="form-control" name="iputerina"/>
														</div>
													</div>
													</div>
													
													
													<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IR Cerebral Media</label>
																<input type="text" class="form-control" name="ircerebral"/>
														</div>
													</div>
													
														<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IR Uterina Izquierda</label>
																<input type="text" class="form-control" name="iruterina"/>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Perfil Cordo Cerebral</label>
																<input type="text" class="form-control" name="pccerebral"/>
														</div>
													</div>
											</div>	
											<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">SD Cordon</label>
																<input type="text" class="form-control" name="sdcordon"/>
														</div>
													</div>
														<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">SD Uterina Derecha</label>
																<input type="text" class="form-control" name="sduterinade"/>
														</div>
													</div>
											</div>	
											<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IP Cordon</label>
																<input type="text" class="form-control" name="ipcordon"/>
														</div>
													</div>
													
														<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IP Uterina Derecha</label>
																<input type="text" class="form-control" name="iputerinade"/>
														</div>
													</div>
															
											</div>	
											
											<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IR Cordon</label>
																<input type="text" class="form-control" name="ircordon"/>
														</div>
													</div>
													
														<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">IR Uterina Derecha</label>
																<input type="text" class="form-control" name="iruterinade"/>
														</div>
													</div>
												</div>
													
													<div class="row">
														<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Notas</label>
																<input type="text" class="form-control" name="notas3"/>
														</div>
													</div>
													
											</div>											
									</div>
									<div class="tab-pane" id="tab_5_4">
										<div class="row">
											<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Pliegue Nucal</label>
															<select  name="plnucal" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
																<option value="Normal (<6mm)">Normal (<6mm)</option>
															<option value="Aumentado (>6mm)">Aumentado (>6mm)</option>
														
														</select>

														</div>
													</div>
													
											</div>
											
											
											<div class="row">
											<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Atrium</label>
															<select  name="atrium2" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
																<option value="Normal (<10mm))">Normal (<10mm)</option>
															<option value="Ventriculomegalia (>10mm)">Ventriculomegalia (>10mm)</option>
														
														</select>

													</div>
													
											</div>
									
									</div>
									
									<div class="row">
										<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Huesos Nasales</label>
																<input type="text" class="form-control" name="huesosnasales2"/>
														</div>
													</div>
													
											</div>	
																																
		
	                  	<div class="row">
											<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">DuptusUS</label>
															<select  name="duptus" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
																<option value="Patron normal">Patron normal</option>
															<option value="Onda A Inversa">Onda A Inversa</option>
															<option value="Patron anomalo">Patron anomalo</option>
														
														</select>

														</div>
													</div>
													
											</div>
											
											<div class="row">
											<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">TricuspideaUS</label>
															<select  name="tris" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
																<option value="Patron normal">Patron normal</option>
															<option value="Insuficiencia valvular">Insuficiencia valvular</option>
														
														</select>

														</div>
													</div>
													
											</div>
																</div>

									<div class="tab-pane" id="tab_5_5">
										<div class="row">
											<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Diagnosticos</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="5" class="form-control input-circle-right" placeholder="Diagnostico: " name="diagnosticos" ></textarea>

											</div>
									</div>
													</div>
							<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Sugerencias</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="5" class="form-control input-circle-right" placeholder="Sugerencias: " name="sugerencias" ></textarea>

											</div>
									</div>
													</div>
													
													
											</div>																						

									
									</div>																
								</div>
							</div>																																																											
												<!--/row-->
													<div class="form-actions fluid">
														<div class="col-md-offset-2 col-md-10">
															<button class="btn btn-success" type="submit">Guardar</button>
															<a class="btn btn-default" href="<?php echo site_url('consulta/listado_pacientes'); ?>">Cancelar</a>
														</div>
													</div>												
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
						</div>
						  	<script type="text/javascript">

$(document).ready(miFuncion());
function miFuncion()
{
	var paciente = $("#id_paciente").val();
	$.post("<?php echo base_url(); ?>consulta/ultimop", {
                   id_paciente:paciente,
                }, function(data){
								var paridad = data.paridad;
								var fecha = data.ultimo_p;
								var res = fecha.split("-");
								var dia = parseFloat(res[2]);
								var mes = res[1];
								var ano = res[0];
								result = calcular(dia,mes,ano);
							  if(result=="nopasa"){
							    alert("Ultima fecha del periodo ingresada supera tiempo estimado de parto, Actualice fecha de ultimo periodo de la paciente");
							    
								}
								else{
									var ultimo_periodo= res[2]+"-"+res[1]+"-"+res[0];
									var fecha_parto=result[3].split("-");
									var edad_gestacional= result[4]+"."+result[5];
									//alert(ultimo_periodo+" "+fecha_parto+" "+edad_gestacional)
									$("#ultimo_p2").val(ultimo_periodo);
									$("#parto_p").val(fecha_parto[2]+"-"+fecha_parto[1]+"-"+fecha_parto[0]);
									$("#edadg").val(edad_gestacional);
								}
               }, "json");
}
	</script>