<?php 
$puta=array('1-5','6-10','11-15','16-20','>20');
$estadoperras=array('Casada','Pareja','Divorciada','Soltera','Viuda');
$activity=array('Sin Actividad','Sexo Casual');
$dataperr=array('histerectomia','oforectomia','vph_cervical','vph_condiloma','herpes_genital','endometriosis','sop');
$nomperr=array('Histerectom&iacute;a','Oforectom&iacute;a','VPH Cervical','VPH Condiloma','Herpes Genital','EIP/Endometriosis','SOP');
$medicossp=array("hipertencion","diabetes","asma","renales","neurologicos","psiquiatricos");
$medicospp=array("Hipertenci&oacute;n","Diabetes/Metab&oacute;licos","Asma/ Reumatol&oacute;gico","Renales/Urinarios","Neurol&oacute;gicos","Psiqui&aacute;tricos");
$medicollp=array("traumatologicos","oftalmologicos","endoscopia","laparoscopias","laparotomias");
$medicolpp=array("Traumatol&oacute;gicos","ORL/Oftalmol&oacute;gicos","Endoscopias/(ORL Trauma)","Laparoscopias","Laparotomias");
$pares=array('1G','2G','3G','4G','0G',);
$alcoholismo=array("Rara vez","Ocasional","Fines de Semana","Frecuente","Alcoholismo Potencial");
$viciosio=array("nunca he fumado","dejo de fumar hace"," < 5 cigarrillos/dia","5-10 cigarrillos/dia","11-15 cigarrillos/dia","16-20 cigarrillos/dia",">20 cigarrillos/dia");
$musculito=array("Rara vez","Sedentaria","Diario","1 Semanal","2 Semanal","3 Semanal","4 Semanal");
$ultimo_ = $dconsulta[0]['ultimo_p'];
$maldita=array("utero","ovario_der","ovario_izq");$nommaldita=array("Utero Normal","Ovario Derecho","Ovario Izquierdo");
($ultimo_=="0000-00-00") ? $ultimo_p="" : $ultimo_p=$this->dash->fechanew2($ultimo_);

?>										
										<div class="col-md-12">
            
								<div class="portlet box red">
									<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i> Consulta Ginecol&oacute;gica N# <?php echo $dconsulta[0]['id_consultag'] ?>  => Fecha <?php echo $this->dash->fechanew2($dconsulta[0]['fe_create']);?>
					</div>

									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" id="form_consultag" method="post" class="horizontal-form">
											<div class="form-body">
		<div class="alert alert-success" style="display:none" id="suceso">
		<button class="close" data-close="success" id="eliminar"></button>
		<span id="mensaje"></span>
	</div>
			<div class="alert alert-danger" style="display:none" id="suceso_error">
		<button class="close" data-close="success" id="eliminar"></button>
		<span id="mensaje_error"></span>
	</div>											
												<div class="row">
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
										Ginecoobst&eacute;trico </a>
									</li>
									<li>
										<a href="#tab_5_2" data-toggle="tab">
										M&eacute;dicos y Quir&uacute;rgicos </a>
									</li>
									<li>
										<a href="#tab_5_3" data-toggle="tab">
										H&aacute;bitos </a>
									</li>
									<li>
										<a href="#tab_5_4" data-toggle="tab">
										Consulta y Evaluaci&oacute;n </a>
									</li>	
									<li>
										<a href="#tab_5_5" data-toggle="tab">
										Diagnostico y Plan </a>
									</li>		
									<li>
										<a href="#tab_5_6" data-toggle="tab">
										Intercambio </a>
									</li>																										
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_5_1">
												<div class="row">
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Primera Relaci&oacute;n</label>
															<div class="input-group">
																<input type="number" class="form-control" name="primera_r" id="primera_r" value="<?php echo $dconsulta[0]['primera_r']; ?>"/>
																<input type="hidden" name="id_consultag" id="id_consultag" value="<?php echo $dconsulta[0]['id_consultag'] ?>">
															<label class="control-label">Parejas Sexuales</label><br>
									<select  name="parejasx" id="parejasx" class="form-control input-normal select2me" data-placeholder="Selecccione">			
															<option value=""></option>
														<?php foreach($puta as $perra){
														if($perra==$dconsulta[0]['parejasx']){		
												?>
													<option selected value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
														<?php }
															}
															?>														
														</select><br>
															<label class="control-label">Estado Civil</label><br>
									<select  name="estadoc" id="estadoc" class="form-control input-normal select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($estadoperras as $perra){
														if($perra==$dconsulta[0]['estadoc']){		
												?>
													<option selected value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
														<?php }
															}
															?>														
														</select><br>	
															<label class="control-label">Actividad Sexual</label><br>
									<select  name="actividadx" id="actividadx" class="form-control input-normal select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($activity as $perra){
														if($perra==$dconsulta[0]['actividadx']){		
												?>
													<option selected value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
														<?php }
															}
															?>														
														</select><br>																													
															</div>
														</div>
													</div>													
													<div class="col-md-3">
														<div class="form-group">
															<div class="input-group">
															<?php for($i=0;$i<count($dataperr);$i++){ 
															if($dconsulta[0][$dataperr[$i]]=="on"){
															?>	
	<label><input checked name="<?php echo $dataperr[$i]; ?>" type="checkbox" class="icheck"><?php echo $nomperr[$i]; ?></label><br>
									<?php 
								}	else {														
								?>
	<label><input name="<?php echo $dataperr[$i]; ?>" type="checkbox" class="icheck"><?php echo $nomperr[$i]; ?></label><br>


															<?php } }	?>															
												
															</div>
														</div>
													</div>													
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">&Uacute;ltimo Periodo</label>
													<div class="input-group">
												<input name="ultimo_p" id="ultimo_p" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" value="<?php echo $ultimo_p  ?>"><br>
															<label class="control-label">Anticoncepci&oacute;n</label>
									<select  name="anticonceptivos" id="anticonceptivos" class="form-control input-normal select2me" data-placeholder="Selecccione">			
															<option value=""></option>
														<?php foreach($datos_a as $antico){
														if($antico['id_anticonceptivos']==$dconsulta[0]['anticonceptivos']){		
												?>
													<option selected value="<?php echo $antico['id_anticonceptivos']; ?>"><?php echo $antico['anticonceptivos']; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $antico['id_anticonceptivos']; ?>"><?php echo $antico['anticonceptivos']; ?></option>
														<?php }
															}
															?>														
														</select><br>												
															<label class="control-label">Paridad</label><br>
									<select  name="paridad" id="paridad" class="form-control input-normal select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($pares as $perra){
														if($perra==$dconsulta[0]['paridad']){		
												?>
													<option selected value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
														<?php }
															}
															?>														
														</select>												
															<label class="control-label">Partos</label>
																<input type="number" class="form-control" name="partos" id="partos" value="<?php echo $dconsulta[0]['partos']; ?>"/>												
											</div>
									</div>
													</div>		
													<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Ces&aacute;reas</label>
													<div class="input-group">
												<input name="cesareas" id="cesareas" type="text" class="form-control" value="<?php echo $dconsulta[0]['cesareas']; ?>"><br>
															<label class="control-label">Abortos</label>
																<input type="number" class="form-control" name="aborto" id="aborto" value="<?php echo $dconsulta[0]['aborto']; ?>" /><br>					
															<label class="control-label">Ect&oacute;picos</label>
																<input type="number" class="form-control" name="ectopico" id="ectopico" value="<?php echo $dconsulta[0]['ectopico']; ?>"/>																										
											</div>
									</div>
													</div>	
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Antecedentes Ginecol&oacute;gicos</label>
													<div class="input-group">
												<textarea class="form-control" row="6" name="antecedentes_gine" id="antecedentes_gine"><?php echo $dconsulta[0]['antecedentes_gine']; ?></textarea>
															<label class="control-label">Antecedentes Obst&eacute;tricos</label>		
											<textarea class="form-control" row="6" name="antecedentes_obste" id="antecedentes_obste"><?php echo $dconsulta[0]['antecedentes_obste']; ?></textarea>
																									
											</div>
									</div>
													</div>																																																
												</div>
											<div class="row">
												<div class="form-body">
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Notas Ginecol&oacute;gicas</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas Ginecol&oacute;gicas" name="notas_gineco" ><?php echo $dconsulta[0]['notas_gineco']; ?></textarea>

											</div>
									</div>
													</div>
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Notas Obst&eacute;tricas</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas Obst&eacute;tricas" name="notas_obste" ><?php echo $dconsulta[0]['notas_obste']; ?></textarea>

											</div>
									</div>
													</div>													
												</div>
									</div>																																										
										</div>
									<div class="tab-pane" id="tab_5_2">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Patolog&iacute;a M&eacute;dica</label>
															<div class="input-group">														
						<input type="text" class="form-control" name="patologia" id="patologia" value="<?php echo $dconsulta[0]['patologia']; ?>"/>
															<?php for($i=0;$i<count($medicossp);$i++){ 
															if($dconsulta[0][$medicossp[$i]]=="on"){
															?>	
	<label><input checked name="<?php echo $medicossp[$i]; ?>" type="checkbox" class="icheck"><?php echo $medicospp[$i]; ?></label><br>
									<?php 
								}	else {														
								?>
	<label><input name="<?php echo $medicossp[$i]; ?>" type="checkbox" class="icheck"><?php echo $medicospp[$i]; ?></label><br>
															<?php } }	?>	


													</div>																																	
												</div>
									</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Patolog&iacute;a Quir&uacute;rgica General</label>
															<div class="input-group">
						<input type="text" class="form-control" name="patologia_general" id="patologia_general" value="<?php echo $dconsulta[0]['patologia_general']; ?>"/>

<?php for($i=0;$i<count($medicollp);$i++){ 
															if($dconsulta[0][$medicollp[$i]]=="on"){
															?>	
	<label><input checked name="<?php echo $medicollp[$i]; ?>" type="checkbox" class="icheck"><?php echo $medicolpp[$i]; ?></label><br>
									<?php 
								}	else {														
								?>
	<label><input name="<?php echo $medicollp[$i]; ?>" type="checkbox" class="icheck"><?php echo $medicolpp[$i]; ?></label><br>
															<?php } }	?>
													</div>																																	
												</div>
									</div>									
								</div>
											<div class="row">
												<div class="form-body">
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Detalles M&eacute;dicos</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Detalles M&eacute;dicos" name="detalles_medicos" ><?php echo $dconsulta[0]['detalles_medicos']; ?></textarea>

											</div>
									</div>
													</div>
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Detalles Quir&uacute;rgicos</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Detalles Quir&uacute;rgicos" name="detalles_quirurgicos" ><?php echo $dconsulta[0]['detalles_quirurgicos']; ?></textarea>

											</div>
									</div>
													</div>													
												</div>
									</div>	
	
									</div>
									<div class="tab-pane" id="tab_5_3">
<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Habitos PB</label>
															<div class="input-group">														
						<input type="text" class="form-control input-large" name="habitos_pb" id="habitos_pb" value="<?php echo $dconsulta[0]['habitos_pb'] ?>"/>

													</div>																																	
												</div>
									</div>	
									<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Alcohol</label>
															<div class="input-group">														
			<select  name="alcohol" id="alcohol" class="form-control input-large select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($alcoholismo as $perra){
														if($perra==$dconsulta[0]['alcohol']){		
												?>
													<option selected value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
														<?php }
															}
															?>														
														</select>	
												</div>
									</div>									
								</div>									
												</div>																
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Tabaco</label>
															<div class="input-group">														
			<select  name="tabaco" id="tabaco" class="form-control input-large select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($viciosio as $perra){
														if($perra==$dconsulta[0]['tabaco']){		
												?>
													<option selected value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
														<?php }
															}
															?>														
			</select>														
									</div>									
								</div>									
							</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Drogas Rec</label>
															<div class="input-group">														
			<select  name="drogas" id="drogas" class="form-control input-large select2me" data-placeholder="Selecccione">			
															<option value=""></option>
														<?php foreach($datos_d as $adicto){
														if($adicto['id_drogas']==$dconsulta[0]['drogas']){		
												?>
													<option selected value="<?php echo $adicto['id_drogas']; ?>"><?php echo $adicto['drogas']; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $adicto['id_drogas']; ?>"><?php echo $adicto['drogas']; ?></option>
														<?php }
															}
															?>
														</select>	
									</div>									
								</div>								
							</div>	
					</div>	
												<div class="row">
													<div class="col-md-6" style="display:none" id="hacecuanto">
														<div class="form-group">
															<label class="control-label">Drogas Rec</label>
															<div class="input-group">														
			<select  name="cuanto" id="cuanto" class="form-control input-large select2me" data-placeholder="Selecccione">			
															<option value=""></option>																							
												<?php $num = 0;foreach($datos_d as $drogas){?>
													<option value="<?php echo $drogas['id_drogas']; ?>"><?php echo $drogas['drogas']; ?></option>
											<?php } ?>
														</select>	
									</div>									
								</div>								
							</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Ejercita</label>
															<div class="input-group">														
			<select  name="ejercita" id="ejercita" class="form-control input-large select2me" data-placeholder="Selecccione">			
															<option value=""></option>
																	<?php foreach($musculito as $perra){
														if($perra==$dconsulta[0]['ejercita']){		
												?>
													<option selected value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $perra; ?>"><?php echo $perra; ?></option>
														<?php }
															}
															?>														
										</select>	
									</div>									
								</div>								
							</div>																			
						</div>
									</div>
									<div class="tab-pane" id="tab_5_4">
									<div class="row">
											<div class="col-md-12">
										<div class="form-group">
										<label class="control-label">Motivo de la Consulta</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="2" class="form-control input-circle-right" placeholder="Motivo de la Consulta: "name="motivo" ><?php echo $dconsulta[0]['motivo'] ?></textarea>

											</div>
									</div>
												</div>
										</div>											
										<div class="row">
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">General</label>													
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="general" id="general" value="<?php echo $dconsulta[0]['general'] ?>"/>

													</div>																																	
												</div>
									</div>
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">USTV</label>													
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="ustv" id="ustv" value="<?php echo $dconsulta[0]['ustv'] ?>"/>
													</div>																																	
												</div>
									</div>																				
										</div>
										<div class="row">
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Cuello Tiroide</label>						
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="cuello_tiroide" id="cuello_tiroide" value="<?php echo $dconsulta[0]['cuello_tiroide'] ?>"/>
													</div>																																	
												</div>
									</div>
										<div class="col-md-6">
														<div class="form-group">										
						<div class="input-group">														
						<?php for($i=0;$i<count($maldita);$i++){ 
															if($dconsulta[0][$maldita[$i]]=="on"){
															?>	
	<label><input checked name="<?php echo $maldita[$i]; ?>" type="checkbox" class="icheck"><?php echo $nommaldita[$i]; ?></label><br>
									<?php 
								}	else {														
								?>
	<label><input name="<?php echo $maldita[$i]; ?>" type="checkbox" class="icheck"><?php echo $nommaldita[$i]; ?></label><br>
															<?php } }	?>
						</div>																																	
												</div>
									</div>																				
										</div>
										<div class="row">
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Mamas y Axila</label>
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="mamas" id="mamas" value="<?php echo $dconsulta[0]['mamas'] ?>"/>

													</div>																																	
												</div>
									</div>
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Abdomen</label>													
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="abdomen" id="abdomen" value="<?php echo $dconsulta[0]['abdomen'] ?>"/>
													</div>																																	
												</div>
									</div>																				
										</div>				
										<div class="row">
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Genitales Externos</label>
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="genitales_e" id="genitales_e" value="<?php echo $dconsulta[0]['genitales_e'] ?>"/>

													</div>																																	
												</div>
									</div>
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Vagina</label>
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="vagina" id="vagina" value="<?php echo $dconsulta[0]['vagina'] ?>"/>
													</div>																																	
												</div>
									</div>																				
										</div>
										<div class="row">
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Cuello</label>
															<div class="input-group">														
						<input type="text" class="form-control input-xlarge" name="cuello" id="cuello" value="<?php echo $dconsulta[0]['cuello'] ?>"/>

													</div>																																	
												</div>
									</div>
										<div class="col-md-6">
											<div class="form-group">
										<label class="control-label">Nota Ecogr&aacute;fica</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bold"></i>
															</span>														
												<textarea rows="2" class="form-control input-circle-right" placeholder="Nota Ecogr&aacute;fica :" name="nota_ecografica" ><?php echo $dconsulta[0]['nota_ecografica'] ?></textarea>
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
												<textarea rows="2" class="form-control input-circle-right" placeholder="Diagnostico: " name="diagnostico" ><?php echo $dconsulta[0]['diagnostico'] ?></textarea>

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
												<textarea rows="2" class="form-control input-circle-right" placeholder="Plan: " name="plan" ><?php echo $dconsulta[0]['plan'] ?></textarea>

											</div>
									</div>
													</div>
<div class="form-body">
												<h4 class="form-section">Recipes</h3>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">		
                    	      <tbody>	
                    	      	<tr id="reciped">
															<?php 
                    	      	foreach($medicinare as $datosrec){
                    	      	?>	
                    	      	<td id="borrarec_<?php echo $datosrec['id_rec'] ?>">Medicamento: <?php echo $datosrec['nombre'] ?><a class="sepV_a" title="Eliminar" onclick="eliminar_medicamento(<?php echo $datosrec['id_rec'] ?>);return false;"><i class="fa fa-trash"></i></a></td>
                    	      	<?php	
                    	      	}
                    	      	?>
                    	      	</tr>
                    </tbody>
                  
            	</table>
         		</div>																
								</div>
										<div class="row">			
								<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Medicamentos</label>
															<div class="input-group">														
			<select  name="medicina" id="medicina" class="form-control input-large select2me" data-placeholder="Selecccione">			
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
									<div class="tab-pane" id="tab_5_6">
												<div class="row">
														<div class="col-md-12">
									<div class="form-body">
												<h4 class="form-section">Subir Imagenes JPG PNG GIF</h3>
         						</div>
															<form id="fileupload" action="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/server2/php/" method="POST" enctype="multipart/form-data">
																<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
																<div class="row fileupload-buttonbar">
																	<div class="col-lg-7">
																		<!-- The fileinput-button span is used to style the file input field as button -->
																		<span class="btn green fileinput-button">
																		<i class="fa fa-plus"></i>
																		<span>
																		Agregar</span>
																		<input type="file" name="files[]" multiple="">
																		</span>
																		<button type="submit" class="btn blue start">
																		<i class="fa fa-upload"></i>
																		<span>
																		Iniciar</span>
																		</button>
																		<button type="reset" class="btn warning cancel">
																		<i class="fa fa-ban-circle"></i>
																		<span>
																		Cancelar </span>
																		</button>
																		<button type="button" class="btn red delete">
																		<i class="fa fa-trash"></i>
																		<span>
																		Borrar </span>
																		</button>
																		<input type="checkbox" class="toggle">
																		<!-- The global file processing state -->
																		<span class="fileupload-process">
																		</span>
																	</div>
																	<!-- The global progress information -->
																	<div class="col-lg-5 fileupload-progress fade">
																		<!-- The global progress bar -->
																		<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																			<div class="progress-bar progress-bar-success" style="width:0%;">
																			</div>
																		</div>
																		<!-- The extended global progress information -->
																		<div class="progress-extended">
																			 &nbsp;
																		</div>
																	</div>
																</div>
																<!-- The table listing the files available for upload/download -->
																<table role="presentation" class="table table-striped clearfix">
																<tbody class="files">
																</tbody>
																</table>
															</form>
														</div>
										</div>	
									</div>																
								</div>
							</div>																																																											
												<!--/row-->
													<div class="form-actions fluid">
														<div class="col-md-offset-2 col-md-10">
															<button class="btn btn-success" type="submit">Actualizar</button>
															<a class="btn btn-default" href="<?php echo site_url('consulta/LisConsultaG/'.$id[0]['id_paciente']); ?>">Cancelar</a>
														</div>
													</div>
										<!-- END FORM-->
									</div>
								</div>
							</div>
						</div>