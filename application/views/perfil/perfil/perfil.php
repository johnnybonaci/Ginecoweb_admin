										<div class="col-md-12">

								<div class="portlet box red">
									<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-setting"></i> Mi Cuenta
					</div>

									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo site_url('perfil/form'); ?>" method="post" class="horizontal-form">
											<div class="form-body">
												<?php $this->load->view('base_template/base_alert'); ?>
											
												<!--<h3 class="form-section">Person Info</h3>-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Clave</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-key"></i>
															</span>
																<input required type="password" class="form-control input-circle-right" placeholder="Clave" name="pass" value="<?php echo set_value('pass'); ?>" />
															</div>
														</div>
											<span class="help-block"><?php echo form_error('pass', '<div class="alert alert-danger">', '</div>'); ?></span>
														
													</div>
																																																					
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Repita Clave</label>
															<div class="input-group">
															<span class="input-group-addon input-circle-left">
															<i class="fa fa-key"></i>
															</span>
																<input required type="password" class="form-control input-circle-right" placeholder="Clave" name="pass2" value="<?php echo set_value('pass2'); ?>" />
															</div>
														</div>
											<span class="help-block"><?php echo form_error('pass2', '<div class="alert alert-danger">', '</div>'); ?></span>
														
													</div>													
												</div>																						
												<!--/row-->
													<div class="form-actions fluid">
														<div class="col-md-offset-2 col-md-10">
															<button class="btn btn-success" type="submit">Actualizar</button>
														</div>
													</div>
													</div>												
										</form>

										<!-- END FORM-->
									</div>
								</div>							
								
							</div>
						</div>