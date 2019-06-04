				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Gesti&oacute;n de M&oacute;dulos
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form class="form-horizontal form-row-sepe" role="form" action="<?php echo site_url('user/update_asignar_modulos'); ?>" method="post" >
												<!--<form action="#" class="form-horizontal form-row-sepe">-->
							<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3">M&oacute;dulos</label>
										<div class="col-md-9">
											<select required multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
												<?php
												$num=0;
												foreach($datos as $modulos){
												if($modulos['id_modulo']==@$id[$num]['id_modulo']){
													echo "<option selected value='".$modulos['id_modulo']."'>".$modulos['modulo']."</option>";
													$num++;
												}
													else{
															echo "<option value='".$modulos['id_modulo']."'>".$modulos['modulo']."</option>";	
													}	
												}
												
												?>
											</select>
										</div>
									</div>
								<input type="hidden" value="<?php echo $id[0]['id_perfil'];?>" name="id_perfil"/> 
								<input type="hidden" value="<?php echo $id_usuario;?>" name="id_usuario"/> 

								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Enviar</button>
											<a class="btn btn-default" href="<?php echo site_url('user/listado'); ?>">Cancelar</a>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END PORTLET-->
				</div>