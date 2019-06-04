
		<div class="col-md-12">
			<div class="portlet box purple">
				<div class="portlet-title">			
					<div class="caption">
						<i class="fa fa-gift"></i> Editar Registros
					</div>
				</div>
				<div class="portlet-body form">
				<form class="form-horizontal" role="form" action="<?php echo site_url('user/update_user'); ?>" method="post" >
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
		<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre" name="nombre" value="<?php echo $id[0]['nombre'];?>"/>
		<input type="hidden" value="<?php echo $id[0]['id'];?>" name="id"/> 
			</div>
			</div>
	  	</div>
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Apellido <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
				<i class="fa fa-font"></i>
							<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Apellido" name="fullname" value="<?php echo $id[0]['apellido'];?>"/>
			</div>
			</div>
	  	</div>		

	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Correo <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
				<i class="fa fa-envelope"></i>
							<input required class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Correo" name="email" value="<?php echo $id[0]['email'];?>"/>
			</div>
			</div>
	  	</div>		  						  	
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Usuario <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-user"></i>
		<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" value="<?php echo $id[0]['usuario'];?>"/>
			</div>
			</div>
	  	</div>	  	

								   	<div class="form-group">
							        <label for="" class="col-md-2 control-label">Estado <span class="f_req">*</span></label>
							        <div class="col-md-5">
											<?php if($id[0]['activo']==1) { ?> 											 
												<input type="checkbox" checked class="make-switch" data-size="small" value="1" name="estado">
 											<?php } if($id[0]['activo']==0) {?>
 												<input type="checkbox" class="make-switch" data-size="small" value="1" name="estado">
 											  <?php } ?>
									</div>
							  			</div>								  											  										
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-2 col-md-10">
							<button class="btn btn-success" type="submit">Actualizar</button>
							<a class="btn btn-default" href="<?php echo site_url('user/listado'); ?>">Cancelar</a>
						</div>
					</div>	
				</form>
				</div>
				</div>
			</div>
		