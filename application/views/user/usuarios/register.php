
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">			
					<div class="caption">
						<i class="fa fa-gift"></i> Registro de Personal
					</div>
				</div>
				<div class="portlet-body form">
				<form class="form-horizontal" role="form" action="<?php echo site_url('user/registro'); ?>" method="post" >
					<div class="form-body">
												<?php $this->load->view('base_template/base_alert'); ?>

	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Nombre <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-font"></i>
		<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre" name="nombre" value="<?php echo set_value('nombre'); ?>"/>
			</div>
			</div>
	  	</div>
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Apellido <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
				<i class="fa fa-font"></i>
							<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Apellido" name="fullname" value="<?php echo set_value('fullname'); ?>"/>
			</div>
			</div>
	  	</div>		

	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Correo <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
				<i class="fa fa-envelope"></i>
							<input required class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Correo" name="email" value="<?php echo set_value('email'); ?>"/>
			</div>
			<span class="help-block"><?php echo form_error('email', '<div class="alert alert-danger"><button class="close" data-close="danger" id="eliminar"></button>', '</div>'); ?>
				  	</span>			
			</div>
	  	</div>		  						  	
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Usuario <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-user"></i>
		<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" value="<?php echo set_value('username'); ?>"/>
			</div>
<span class="help-block"><?php echo form_error('username', '<div class="alert alert-danger"><button class="close" data-close="danger" id="eliminar"></button>', '</div>'); ?>
				  	</span>			
			</div>
							
	  	</div>

	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Contrase&ntilde;a <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-lock"></i>
		<input required class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Contrase&ntilde;a" name="password" value="<?php echo set_value('password'); ?>"/>
			</div>
			</div>
	  	</div>	
	   	<div class="form-group">
	        <label for="" class="col-md-2 control-label">Repita Contrase&ntilde;a <span class="f_req">*</span></label>
	        <div class="col-md-5">
	      <div class="input-icon">
		<i class="fa fa-key"></i>
		<input required class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password2" placeholder="Repita Contrase&ntilde;a" name="password2" value="<?php echo set_value('password2'); ?>"/>
			</div>
<span class="help-block"><?php echo form_error('password2', '<div class="alert alert-danger"><button class="close" data-close="danger" id="eliminar"></button>', '</div>'); ?>
				  	</span>			
			</div>
	  	</div>	  				  	
								   	<div class="form-group" id="meta"></div>
								   		   	<div class="form-group"></div>					  												
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-2 col-md-10">
							<button class="btn btn-success" type="submit">Registrar</button>
							<a class="btn btn-default" href="<?php echo site_url('user/listado'); ?>">Cancelar</a>
						</div>
					</div>	
				</form>
				</div>
				</div>
			</div>
		