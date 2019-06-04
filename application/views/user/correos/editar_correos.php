
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">			
					<div class="caption">
						<i class="fa fa-gift"></i> Actualizar de Correos
					</div>
				</div>
				<div class="portlet-body form">
				<form class="form-horizontal" role="form" action="<?php echo site_url('user/update_correo'); ?>" method="post" >
					<div class="form-body">

	   	<div class="form-group">
	        <label for="" class="col-md-3 control-label">Semana de Gestaci&oacute;n <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-font"></i>
		<select required name="semana" id="semanas" class="form-control input-xlarge select2me" data-placeholder="Seleccione...">																										
	<?php $num = 0;foreach($datos as $semana){
	if($semana['id_semanas']==$id[0]['semanas']){
	?>
	<option selected value="<?php echo $semana['id_semanas']; ?>"><?php echo $semana['semana']; ?></option>																			
		<?php } 
		else {
		?>
	<option value="<?php echo $semana['id_semanas']; ?>"><?php echo $semana['semana']; ?></option>
		<?php }
	}
		 ?>

</select>	

				<input type="hidden" value="<?php echo $id[0]['id_correos'];?>" name="id"/> 

			</div>
			</div>
	  	</div>
	   	<div class="form-group">
	        <label for="" class="col-md-3 control-label">Descripci&oacute;n <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
				<i class="fa fa-font"></i>
					<textarea class="form-control placeholder-no-fix" placeholder="Descripci&oacute;n" name="descripcion" rows="2"><?php echo $id[0]['descripcion'];?></textarea>
			</div>
			</div>
	  	</div>		
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXTRAS PORTLET-->
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<div class="form-body">
									<div class="form-group last">
										<label class="col-md-2 control-label">Plantilla de Correo</label>
										<div class="col-md-12">
											<textarea class="ckeditor form-control" name="correo" rows="20"><?php echo $id[0]['correo'];?></textarea>
										</div>
									</div>
								</div>

							<!-- END FORM-->
						</div>
					<!-- END EXTRAS PORTLET-->
				</div>
			</div>
							
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-2 col-md-10">
							<button class="btn btn-success" type="submit">Actualizar</button>
							<a class="btn btn-default" href="<?php echo site_url('user/correos'); ?>">Cancelar</a>
						</div>
					</div>	
				</form>
				</div>
				</div>
			</div>
		