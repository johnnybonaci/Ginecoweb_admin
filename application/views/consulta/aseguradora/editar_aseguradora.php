
		<div class="col-md-12">
			<div class="portlet box purple">
				<div class="portlet-title">			
					<div class="caption">
						<i class="fa fa-gift"></i> Editar Aseeguradora
					</div>
				</div>
				<div class="portlet-body form">
				<form class="form-horizontal" role="form" action="<?php echo site_url('consulta/update_aseguradora'); ?>" method="post" >
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
		<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Seguro" name="seguros" value="<?php echo $id[0]['seguros'];?>"/>
		<input type="hidden" value="<?php echo $id[0]['id_seguros'];?>" name="id_seguros"/> 
			</div>
			</div>
	  	</div>	
								  										
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-2 col-md-10">
							<button class="btn btn-success" type="submit">Actualizar</button>
							<a class="btn btn-default" href="<?php echo site_url('consulta/aseguradora'); ?>">Cancelar</a>
						</div>
					</div>	
				</form>
				</div>
				</div>
			</div>
		