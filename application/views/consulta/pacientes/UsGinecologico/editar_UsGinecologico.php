 <!--<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>--> 	

<?php
$viciosio=array("nunca he fumado","dejo de fumar hacee"," < 5 cigarrillos/dia","5-10 cigarrillos/dia","11-15 cigarrillos/dia","16-20 cigarrillos/dia",">20 cigarrillos/dia");


?>										
										<div class="col-md-12">

								<div class="portlet box red">
									<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i> Us Ginecologico N# <?php echo $usGinecologico[0]['id_us_ginecologico_1']; ?> => Fecha del Estudio <?php echo date("d/m/Y");?>
					</div>

									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" id="form_usGinecologico" method="post" class="horizontal-form">
											<input type="hidden" name="id_us_ginecologico_1" id="id_us_ginecologico_1" value="<?php echo $usGinecologico[0]['id_us_ginecologico_1'];?>">
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
												<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Ultimo Periodo</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-bold"></i>
															</span>
															<input type="text" class="form-control input-circle-right" placeholder="Embarazo" name="ultimo_p" id="ultimo_p" readonly value="<?php echo $this->dash->fechanew2($id[0]['ultimo_p'])?>">
															</div>
														</div>
													</div>																								
												</div>											
												<div class="row">
													<div class="col-md-5">
										<div class="form-group">
										<label class="control-label">Indicaci&oacute;n</label>
												<textarea rows="2" class="form-control" placeholder="Indicacion..." name="indicacion"><?php echo $usGinecologico[0]['indicacion'] ?> </textarea>
									</div>
													</div>																										
												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Sonda</label>
															<?php $son=array("Transvaginal Multifrecuencial","Transabdominal multifrecuencial");?>
														<select  name="sonda" id="sonda" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($son as $dat){
														if($dat==$usGinecologico[0]['sonda']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>												
														</div>
									</div>	
										<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Medico Tratante</label>
													<select  name="tratante" id="tratante" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>
												<?php $num = 0;foreach($tratante as $medico){
													if($medico['id_tratante']==$usGinecologico[0]['tratante']){ ?>		
							<option selected value="<?php echo $medico['id_tratante']; ?>"><?php echo $medico['tratante']; ?></option>
							<?php } else { ?>
								<option  value="<?php echo $medico['id_tratante']; ?>"><?php echo $medico['tratante']; ?>
											<?php } } ?>
														</select>												
													</div>
									</div>									
													
												</div>
							<div class="tabbable-custom ">
								<ul class="nav nav-tabs ">
									<li class="active">
										<a href="#tab_5_1" data-toggle="tab">
										Utero </a>
									</li>
									<li>
										<a href="#tab_5_2" data-toggle="tab">
										Ovarios </a>
									</li>
									<li>
										<a href="#tab_5_3" data-toggle="tab">
										Diagnosticos y Sugerencias </a>
									</li>																																		
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_5_1">
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Posicion Utero</label>
															<?php $sonasti=array("Anteversion","Anteversoflexion","Indiferente","Retroversion","Retroversoflexion",);?>
									<select  name="posicion_u" id="posicion_u" class="form-control select2me" data-placeholder="Selecccione">								<option value=""></option>
															<?php foreach($sonasti as $dat){
														if($dat==$usGinecologico[0]['posicion_u']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>												
														</div>
													</div>
									<div class="col-md-2">
										<div class="form-group">
										<label class="control-label">Utero Long</label>
								<input name="utero_l" type="number" class="form-control" value="<?php echo $usGinecologico[0]['utero_l']; ?>">
								</div>
									</div>	
									<div class="col-md-2">
										<div class="form-group">
										<label class="control-label">Utero AP</label>
								<input name="utero_ap" type="number" class="form-control" value="<?php echo $usGinecologico[0]['utero_ap']; ?>">
								</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
										<label class="control-label">Utero Trans</label>
					<input name="utero_trans" type="number" class="form-control" value="<?php echo $usGinecologico[0]['utero_trans']; ?>">
								</div>
									</div>
									<div class="col-md-3">
														<div class="form-group">
											<label class="control-label">Volumen Uterino</label>
									<?php $sonasti1=array("Aumentado","Normal","Disminuido");?>
										<select  name="volumen_uterino" id="volumen_uterino" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti1 as $dat){
														if($dat==$usGinecologico[0]['volumen_uterino']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>												
														</div>
													</div>																													
											</div>	
											<div class="row">																							
												<div class="col-md-2">
														<div class="form-group">
															<label class="control-label">Superficie</label>
															<?php $sonasti2=array("Regular","Irregular");?>
										<select  name="superficie" id="superficie" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti2 as $dat){
														if($dat==$usGinecologico[0]['superficie']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>												
														</div>
												</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Miometrio</label>
															<?php $sonasti3=array("Homogeneo","Heterogeneo","Disminuido");?>
										<select  name="miometrio" id="miometrio" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti3 as $dat){
														if($dat==$usGinecologico[0]['miometrio']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>												
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Endomiometrio</label>
															<?php $sonasti3=array("Homogeneo","Heterogeneo","Trilaminar","Secretor","Proliferativo");?>
										<select  name="endometrio" id="endometrio" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti3 as $dat){
														if($dat==$usGinecologico[0]['endometrio']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>													
														</div>
													</div>	
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Grosor</label>
															<?php $sonasti4=array("Aumentado","Normal");?>
														<select  name="grosor" id="grosor" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti4 as $dat){
														if($dat==$usGinecologico[0]['grosor']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>												
														</div>
													</div>
									</div>																																											
											<div class="row">
												
									<div class="col-md-3">
										<div class="form-group">
										<label class="control-label">Endometrio Medida</label>
										<input name="endometrio_m" type="number" class="form-control" value="<?php echo $usGinecologico[0]['endometrio_m'] ?>">
								</div>
									</div>													
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Fondos de Saco</label>
															<?php $sonasti5=array("Sin liquido libre","Escaso liquido libre");?>
														<select  name="fondos" id="fondos" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti5 as $dat){
														if($dat==$usGinecologico[0]['fondos']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>												
														</div>
													</div>
											</div>																												
									</div>
									<div class="tab-pane" id="tab_5_2">
										
                    <div class="row">
                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Ovario Derecho</label>
															<?php $sonasti31=array("Visible","No visible");?>
															<select  name="ovderecho" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($sonasti31 as $dat){
																if($dat==$usGinecologico[0]['ovderecho']){		
															?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>
																<label class="control-label">Caracteristicas Ovario Derecho</label>
															<?php $sonasti21=array("Multifolicular","Normal","Atrofico");?>
															<select  name="caracteristicas" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>
															<?php foreach($sonasti21 as $dat){
																if($dat==$usGinecologico[0]['caracteristicas']){		
															?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>
														<label class="control-label">Longitudinal Ovario Derecho</label>
																<input type="text" class="form-control input-small" name="longitudinal" value="<?php echo $usGinecologico[0]['longitudinal'];?>"/>
																<label class="control-label">Transversal Ovario Derecho</label>
																<input type="text" class="form-control input-small" name="transversal" value="<?php echo $usGinecologico[0]['transversal'];?>"/>
																<label class="control-label">Anteroposterior Ovario Derecho</label>
																<input type="text" class="form-control input-small" name="anteroposterior" value="<?php echo $usGinecologico[0]['anteroposterior'];?>"/>
																<label class="control-label">Volumen Ovario Derecho</label>
																<?php $sonasti11=array("Aumentado","Normal","Disminuido");?>
															<select  name="volumen" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti11 as $dat){
														if($dat==$usGinecologico[0]['volumen']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>
														</div>
										</div>
										<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Ovario Izquierdo</label>
															<?php $sonasti31=array("Visible","No visible");?>
															<select  name="ovizquierdo" class="form-control select2me" data-placeholder="Selecccione">			
															<option value=""></option>
															<?php foreach($sonasti31 as $dat){
																if($dat==$usGinecologico[0]['ovizquierdo']){		
															?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>
																<label class="control-label">Caracteristicas Ovario Izquierdo</label>
															<?php $sonasti21=array("Multifolicular","Normal","Atrofico");?>
															<select  name="caracteristicas1" class="form-control select2me" data-placeholder="Selecccione">
															<option value=""></option>
															<?php foreach($sonasti21 as $dat){
																if($dat==$usGinecologico[0]['caracteristicas1']){		
															?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>
														<label class="control-label">Longitudinal Ovario Izquierdo</label>
																<input type="text" class="form-control input-small" name="longitudinal1" value="<?php echo $usGinecologico[0]['longitudinal1'];?>"/>
																<label class="control-label">Transversal Ovario Izquierdo</label>
																<input type="text" class="form-control input-small" name="transversal1" value="<?php echo $usGinecologico[0]['transversal1'];?>"/>
																<label class="control-label">Anteroposterior Ovario Izquierdo</label>
																<input type="text" class="form-control input-small" name="anteroposterior1" value="<?php echo $usGinecologico[0]['anteroposterior1'];?>"/>
																<label class="control-label">Volumen Ovario Izquierdo</label>
																<?php $sonasti11=array("Aumentado","Normal","Disminuido");?>
															<select  name="volumen1" class="form-control select2me" data-placeholder="Selecccione">
														<option value=""></option>
															<?php foreach($sonasti11 as $dat){
														if($dat==$usGinecologico[0]['volumen1']){		
												?>
													<option selected value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
																<?php } 
																else {
																?>
													<option value="<?php echo $dat; ?>"><?php echo $dat; ?></option>
														<?php }
															}
															?>
														</select>
														</div>
										</div>
													
											</div>	
													
												<div class="row">
														<div class="col-md-12">
										<div class="form-group">
										<label class="control-label">Notas de los Hallazgos</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Notas de los Hallazgos...." name="hallazgos" ><?php echo $usGinecologico[0]['hallazgos'] ?></textarea>

											</div>
									</div>
													</div>
											</div>			
									</div>	
									<div class="tab-pane" id="tab_5_3">
										<div class="row">
													<div class="col-md-6">
										<div class="form-group">
										<label class="control-label">Diagnosticos</label>
											<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-slack"></i>
															</span>														
												<textarea rows="4" class="form-control input-circle-right" placeholder="Diagnosticos...." name="diagnosticos" ><?php echo $usGinecologico[0]['diagnosticos'] ?></textarea>

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
												<textarea rows="4" class="form-control input-circle-right" placeholder="Sugerencias...." name="sugerencias" ><?php echo $usGinecologico[0]['sugerencias'] ?></textarea>

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
															<button class="btn btn-success" type="submit">Actualizar</button>
															<a class="btn btn-default" href="<?php echo site_url('consulta/LisUsGinecologico/'.$usGinecologico[0]['id_paciente']); ?>">Cancelar</a>
														</div>
													</div>
										<!-- END FORM-->
									</div>
								</div>
							</div>
						</div>
<!--  	<script type="text/javascript">

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
									$("#pari").val(paridad);
								}
               }, "json");
}
	</script>-->