<!-- BEGIN LOGIN FORM -->
<center><h3 class="form-title">Inicio de Sesi&oacute;n</h3></center>
<?php $this->load->view('base_template/base_alert'); ?>
<form class="login-form" action="<?php echo site_url('user/login'); ?>" method="post">
	<div class="form-group">
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<label class="control-label visible-ie8 visible-ie9">Usuario</label>
		<div id='msg_username' class="padding"></div> 
		<div class="input-icon">
			<i class="fa fa-user"></i>
			<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" id="username" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Contrase&ntilde;a</label>
		<div class="input-icon">
			<i class="fa fa-lock"></i>
			<input required class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contrase&ntilde;a" name="password" id="password" />
		</div>
		
	</div>
	<div class="form-actions">
		<label class="checkbox"></label>
	<button type="submit" class="btn green pull-right">
		Entrar <i class="m-icon-swapright m-icon-white"></i>
		</button>
	</div>
	<div class="create-account">
		<p>
		&nbsp;
		</p>
	</div>
</form>
<!-- END LOGIN FORM -->