
		<div class="col-md-12">
			<div class="portlet box purple">
				<div class="portlet-title">			
					<div class="caption">
						<i class="fa fa-gift"></i> Editar Perfiles
					</div>
				</div>
				<div class="portlet-body form">
				<form class="form-horizontal" role="form" action="<?php echo site_url('user/update_perfiles'); ?>" method="post" >
					<div class="form-body">
<?php
if(isset($message)){ 
if($message == 0){?>
		<div class="alert alert-danger">
		<button class="close" data-close="success" id="eliminar"></button>
		<span>
		 Los Datos no Fueron Actualizados </span>
	</div>
	<?php
}
}
?>
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Nombre <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-font"></i>
		<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Perfil" name="perfil" value="<?php echo $id[0]['perfil'];?>"/>
		<input type="hidden" value="<?php echo $id[0]['id_perfil'];?>" name="id_perfil"/> 
			</div>
			</div>
	  	</div>
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Descripci&oacute;n <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
				<i class="fa fa-font"></i>
							<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Descripci&oacute;n" name="descripcion" value="<?php echo $id[0]['descripcion'];?>"/>
			</div>
			</div>
	  	</div>		
								  										
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-2 col-md-10">
							<button class="btn btn-success" type="submit">Actualizar</button>
							<a class="btn btn-default" href="<?php echo site_url('user/listadop'); ?>">Cancelar</a>
						</div>
					</div>	
				</form>
				</div>
				</div>
			</div>
		