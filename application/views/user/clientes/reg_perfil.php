
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">			
					<div class="caption">
						<i class="fa fa-gift"></i> Registro de Perfiles
					</div>
				</div>
				<div class="portlet-body form">
				<form class="form-horizontal" role="form" action="<?php echo site_url('user/add_perfil'); ?>" method="post" >
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
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Nombre Perfil <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-font"></i>
		<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Perfil" name="perfil"/>
			</div>
			</div>
	  	</div>
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Descripci&oacute;n <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
				<i class="fa fa-font"></i>
							<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Descripci&oacute;n" name="descripcion"/>
			</div>
			</div>
	  	</div>		

							
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-2 col-md-10">
							<button class="btn btn-success" type="submit">Registrar</button>
							<a class="btn btn-default" href="<?php echo site_url('user/listadop'); ?>">Cancelar</a>
						</div>
					</div>	
				</form>
				</div>
				</div>
			</div>
		