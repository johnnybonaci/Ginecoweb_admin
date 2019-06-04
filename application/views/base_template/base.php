<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Ginecoweb-Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>

<link href="<?php echo base_url(); ?>assets/tablas/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/tablas/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>

<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url(); ?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo base_url(); ?>assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/icheck/skins/all.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/icheck/skins/minimal/red.css" rel="stylesheet"/>



<!-- END THEME STYLES 
<link rel="shortcut icon" href="favicon.ico"/>-->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo site_url('user/home'); ?>">
			<img src="<?php echo base_url(); ?>assets/admin/layout/img/ginecoweb.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/admin/layout/img/user.png"/>
					<span class="username username-hide-on-mobile">
						<?php echo  $this->session->userdata('username'); ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?php echo site_url('perfil'); ?>">
							<i class="fa fa-key"></i> Cambio de Clave </a>
						</li>						
						<li>
							<a href="<?php echo site_url('user/logout'); ?>">
							<i class="fa fa-power-off"></i> Salir </a>
						</li>
					</ul>
				</li>

				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>

        <li class="<?php echo ($activeTab == 1) ? "start active open" : ""; ?>">				
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">Gesti&oacute;n de Usuarios</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">					
						<li>
							<a href="<?php echo site_url('user/listado'); ?>">
							<i class="fa fa-users"></i> Lista de Usuarios</a>
						</li>	
							<li>
							<a href="<?php echo site_url('user/clientes'); ?>">
							<i class="fa fa-list"></i> Lista de Clientes </a>
						</li>			
							<li>
							<a href="<?php echo site_url('user/correos'); ?>">
							<i class="fa fa-credit-card"></i> Lista de Correos </a>
						</li>																	
					</ul>
				</li>				
        <li class="<?php echo ($activeTab == 2) ? "start active open" : ""; ?>">				
					<a href="javascript:;">
					<i class="fa fa-database"></i>
					<span class="title">Gesti&oacute;n de Consultas</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">		
							<li>
							<a href="<?php echo site_url('consulta/listado_pacientes'); ?>">
							<i class="fa fa-list-ul"></i> Listado de Pacientes </a>
						</li>												
							<li>
							<a href="<?php echo site_url('consulta/reg_pacientes'); ?>">
							<i class="fa fa-user"></i> Registro de Pacientes </a>
						</li>																		
					</ul>
				</li>
				<li class="<?php echo ($activeTab == 3) ? "start active open" : ""; ?>">				
					<a href="javascript:;">
					<i class="fa fa-table"></i>
					<span class="title">Gesti&oacute;n de Tablas</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">							
							<li>
							<a href="<?php echo site_url('consulta/aseguradora'); ?>">
							<i class="fa fa-indent"></i> Lista de Seguros </a>
						</li>	
							<li>
							<a href="<?php echo site_url('consulta/anticonceptivos'); ?>">
							<i class="fa fa-bolt"></i> Anticonceptivos </a>
						</li>				
							<li>
							<a href="<?php echo site_url('consulta/drogas'); ?>">
							<i class="fa fa-cubes"></i> Lista de Drogas </a>
						</li>	
							<li>
							<a href="<?php echo site_url('consulta/tratante'); ?>">
							<i class="fa fa-users"></i> Lista de Medicos </a>
						</li>																																					
					</ul>
				</li>			
				<li class="<?php echo ($activeTab == 4) ? "start active open" : ""; ?>">				
					<a href="javascript:;">
					<i class="fa fa-ge"></i>
					<span class="title">BD Medicamentos</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">							
							<li>
							<a href="<?php echo site_url('medicamentos/medicina'); ?>">
							<i class="fa fa-empire"></i> Lista de Medicamentos </a>
						</li>	
							<li>
							<a href="<?php echo site_url('medicamentos/presentacion'); ?>">
							<i class="fa fa-tags"></i> Presentación </a>
						</li>	
							<li>
							<a href="<?php echo site_url('medicamentos/concentracion'); ?>">
							<i class="fa fa-plus-square-o"></i> Concentración </a>
						</li>	
							<li>
							<a href="<?php echo site_url('medicamentos/horario'); ?>">
							<i class="fa fa-ticket"></i> Horario de Tomas </a>
						</li>
							<li>
							<a href="<?php echo site_url('medicamentos/duracion'); ?>">
							<i class="fa fa-clock-o"></i> Duración </a>
						</li>																																																						
					</ul>
				</li>												
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">

			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->

						<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Sistema <small>Ginecoweb</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">

						<li>
							<i class="<?php echo $icono; ?>"></i>
							<a href="#"><?php echo $titulo; ?></a>
							<i class="fa fa-angle-right"></i>
							<i class="<?php echo $icono2; ?>"></i>
							<a href="#"><?php echo $titulo2; ?></a>
							<i class="fa fa-angle-right"></i>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>

			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">

				<?php if(isset($main)){ 

					$this->load->view($main);

				} ?>

			</div>	
			<!-- END DASHBOARD STATS -->

		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<!--<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>-->

	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2016 &copy; Ginecoweb 
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

</div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
	<div class="slides">
	</div>
	<h3 class="title"></h3>
	<a class="prev">
	‹ </a>
	<a class="next">
	› </a>
	<a class="close white">
	</a>
	<a class="play-pause">
	</a>
	<ol class="indicator">
	</ol>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger label label-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn blue start" disabled>
                    <i class="fa fa-upload"></i>
                    <span>Subir</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn red cancel">
                    <i class="fa fa-ban"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
	{% var jj=0; %}
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td>
                    {% if (file.deleteUrl) { %}
                        <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="fa fa-trash-o"></i>
                            <span>Borrar</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle">
                    {% } else { %}
                        <button class="btn yellow cancel btn-sm">
                            <i class="fa fa-ban"></i>
                            <span>Cancelar</span>
                        </button>
                    {% } %}
                </td>
               
            </tr>
        {% } %}
    </script>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.number.js" type="text/javascript"></script>
<!-- BEGIN:File Upload Plugin JS files-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
<!-- END:File Upload Plugin JS files-->



<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/global/plugins/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo base_url(); ?>assets/tablas/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/tablas/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/tablas/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/tablas/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/form-icheck.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/form-fileupload.js"></script>
<script src="<?php echo base_url(); ?>assets/js/calculo.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
ComponentsPickers.init();
FormiCheck.init(); // init page demo
FormFileUpload.init();
        });   
    </script>


  	<script type="text/javascript">
  		
$("#antece_fam").change(function(event){
								var antece_fam = $("#antece_fam").val();
								if(antece_fam == 1){$("#texto_1").show("slow")}
								else {$("#texto_1").hide("slow")}            
});
$("#dismenorrea").change(function(event){
								var dismenorrea = $("#dismenorrea").val();
								if(dismenorrea == "Si"){$("#texto_2").show("slow")}
								else {$("#texto_2").hide("slow")}            
});
$("#dispareunia").change(function(event){
								var dispareunia = $("#dispareunia").val();
								if(dispareunia == "Si"){$("#texto_3").show("slow")}
								else {$("#texto_3").hide("slow")}            
});
$("#menopausia").change(function(event){
								var menopausia = $("#menopausia").val();
								if(menopausia == "Si"){$("#texto_4").show("slow")}
								else {$("#texto_4").hide("slow")}            
});
$("#terapiarh").change(function(event){
								var terapiarh = $("#terapiarh").val();
								if(terapiarh == "Si"){$("#texto_5").show("slow")}
								else {$("#texto_5").hide("slow")}            
});
$("#complicaciones").change(function(event){
								var complicaciones = $("#complicaciones").val();
								if(complicaciones == "Si"){$("#texto_6").show("slow")}
								else {$("#texto_6").hide("slow")}            
});
$("#malformaciones").change(function(event){
								var malformaciones = $("#malformaciones").val();
								if(malformaciones == "Si"){$("#texto_7").show("slow")}
								else {$("#texto_7").hide("slow")}            
});
///////////////////////////////////los anormales///////////
$("#peso").change(function(event){
								var peso = $("#peso").val();
								if(peso == "Anormal"){$("#normal_1").show("slow")}
								else {$("#normal_1").hide("slow")}            
});

$("#general").change(function(event){
								var general = $("#general").val();
								if(general == "Anormal"){$("#normal_2").show("slow")}
								else {$("#normal_2").hide("slow")}            
});
$("#cabeza").change(function(event){
								var cabeza = $("#cabeza").val();
								if(cabeza == "Anormal"){$("#normal_3").show("slow")}
								else {$("#normal_3").hide("slow")}            
});
$("#cuello_tiroides").change(function(event){
								var cuello_tiroides = $("#cuello_tiroides").val();
								if(cuello_tiroides == "Anormal"){$("#normal_4").show("slow")}
								else {$("#normal_4").hide("slow")}            
});
$("#cardiorrespiratorio").change(function(event){
								var cardiorrespiratorio = $("#cardiorrespiratorio").val();
								if(cardiorrespiratorio == "Anormal"){$("#normal_5").show("slow")}
								else {$("#normal_5").hide("slow")}            
});
$("#mamas_axilas").change(function(event){
								var mamas_axilas = $("#mamas_axilas").val();
								if(mamas_axilas == "Anormal"){$("#normal_6").show("slow")}
								else {$("#normal_6").hide("slow")}            
});
$("#abdomen").change(function(event){
								var abdomen = $("#abdomen").val();
								if(abdomen == "Anormal"){$("#normal_7").show("slow")}
								else {$("#normal_7").hide("slow")}            
});
$("#genitales_externos").change(function(event){
								var genitales_externos = $("#genitales_externos").val();
								if(genitales_externos == "Anormal"){$("#normal_8").show("slow")}
								else {$("#normal_8").hide("slow")}            
});
$("#labios_m").change(function(event){
								var labios_m = $("#labios_m").val();
								if(labios_m == "Anormal"){$("#normal_9").show("slow")}
								else {$("#normal_9").hide("slow")}            
});
$("#uretra").change(function(event){
								var uretra = $("#uretra").val();
								if(uretra == "Anormal"){$("#normal_10").show("slow")}
								else {$("#normal_10").hide("slow")}            
});

$("#vagina").change(function(event){
								var vagina = $("#vagina").val();
								if(vagina == "Anormal"){$("#normal_11").show("slow")}
								else {$("#normal_11").hide("slow")}            
});
$("#cuello_uterino").change(function(event){
								var cuello_uterino = $("#cuello_uterino").val();
								if(cuello_uterino == "Anormal"){$("#normal_12").show("slow")}
								else {$("#normal_12").hide("slow")}            
});

$("#ano").change(function(event){
								var ano = $("#ano").val();
								if(ano == "Anormal"){$("#normal_13").show("slow")}
								else {$("#normal_13").hide("slow")}            
});
$("#utero").change(function(event){
								var utero = $("#utero").val();
								if(utero == "Anormal"){$("#normal_14").show("slow")}
								else {$("#normal_14").hide("slow")}            
});
$("#endometrio").change(function(event){
								var endometrio = $("#endometrio").val();
								if(endometrio == "Anormal"){$("#normal_15").show("slow")}
								else {$("#normal_15").hide("slow")}            
});
$("#ovarios").change(function(event){
								var ovarios = $("#ovarios").val();
								if(ovarios == "Anormal"){$("#normal_16").show("slow")}
								else {$("#normal_16").hide("slow")}            
});

 function eliminar_producto(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$("#registro_"+numero).remove();
    	$.post("<?php echo base_url(); ?>user/eliminar_registro", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										     location.reload();
										   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_seguros(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>consulta/eliminar_seguro", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_anticonceptivos(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>consulta/eliminar_anticonceptivos", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_drogas(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>consulta/eliminar_drogas", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_medicina(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>medicamentos/eliminar_medicina", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_presentacion(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>medicamentos/eliminar_presentacion", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_concentracion(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>medicamentos/eliminar_concentracion", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_horario(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>medicamentos/eliminar_horario", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_duracion(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>medicamentos/eliminar_duracion", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_medicamento(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Medicamento???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>consulta/eliminar_recipe", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										$("#borrarec_"+numero).hide(500, function () {
        						$("#borrarec_"+numero).remove();
											});
										//var table = $('#dt_d').DataTable();
										//var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
function eliminar_tratante(numero){
 			bootbox.confirm({
    message: "<h4>Esta Seguro de Eliminar este Registro???</h4>",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
    	if(result){
    	$.post("<?php echo base_url(); ?>consulta/eliminar_tratante", {
       numero:numero
                }, function(data){
                	if(data.resultado=="si"){
										var table = $('#dt_d').DataTable();
										var rows = table.rows($("#registro_seg_"+numero)).remove().draw();
								   }
										  if(data.resultado=="no"){
											bootbox.alert("Este registro no pude ser Eliminado");
										   }
                        }, "json");
  		}
  		
    }
});
}
    var save_method; //for save method string
    var table;
    $(document).ready(function() {
	$("#calcular").click(function(event){
		//event.preventDefault();
	var paciente = $("#datoid").val();
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
									
									//alert(result[0]+" "+result[1]+" "+result[2]+" "+result[3]+" "+result[4]+" "+result[5])
									var ultimo_periodo= fecha;
									var fecha_parto=result[3];
									var edad_gestacional= result[4]+"."+result[5];
									/*$.post("<?php echo base_url(); ?>consulta/guarda_prenatal",{
									ultimo_periodo : ultimo_periodo,
									fecha_parto : fecha_parto,
									edad_gestacional : edad_gestacional,
									paciente : paciente 
					        }, function(data){
												alert("d")
                        }, "json");*/	
										$.ajax({
					           type: "POST",
		           			 dataType:"json",					           
					           url: "<?php echo base_url(); ?>consulta/guarda_prenatal",
			    					 data: {"ultimo_periodo" : ultimo_periodo, "fecha_parto" : fecha_parto,"edad_gestacional" : edad_gestacional, "paciente" : paciente},
			    					 success: function(data)
		           			{
												alert("d")
		           			}
							     });
								}
               }, "json");
	

	});
    	
      table = $('#dt_d').DataTable({ 
        responsive: true,
              });
     	table = $('#dt_d2').DataTable({ 
        responsive: true,
      });
							$("#eliminar").click(function(event){
								$(this).parent('div').remove(); //eliminar el campo
							});              	
			//$('#cedula').number( true, 0, ',', '.' )
      $("#fecha_nac").change(function() {
									$.post("<?php echo base_url(); ?>consulta/calculaedad", {
                    fecha_nac:$("#fecha_nac").val()
                }, function(data){
                							$("#edad").val(data.edad);
                        }, "json");					
      }); 
$("#form_consultag" ).submit(function( event ) {
	
		    		$.ajax({
		           type: "POST",
		           dataType:"json",
		           url: "<?php echo base_url(); ?>consulta/actualiza_consulta",
		           data: $("#form_consultag").serialize(),
		           success: function(data)
		           {
										if(data.resultado=="si"){
											bootbox.alert("Datos Actualizados Satisfactoriamente!!",function(){
											location.reload()
												
											});

										}else{
											bootbox.alert("Los datos no fueron actualizados, intente nuevamente")
											
         										 /*$("#suceso").hide(200);																						
														 $("#suceso_error").show(1000);	
														 $("#mensaje").html("Los datos no fueron actualizados, intente nuevamente");*/
											
										}

		           }
		         });
event.preventDefault();
});
$("#form_prenatal" ).submit(function( event ) {
	
		    		$.ajax({
		           type: "POST",
		           dataType:"json",
		           url: "<?php echo base_url(); ?>consulta/actualiza_prenatal",
		           data: $("#form_prenatal").serialize(),
		           success: function(data)
		           {
										if(data.resultado=="si"){
											bootbox.alert("Datos Actualizados Satisfactoriamente!!",function(){
											//location.reload()											
											});

										}else{
											bootbox.alert("Los datos no fueron actualizados, intente nuevamente")
										}
		           }
		         });
event.preventDefault();
});
$("#form_usGinecologico" ).submit(function( event ) {
	
		    		$.ajax({
		           type: "POST",
		           dataType:"json",
		           url: "<?php echo base_url(); ?>consulta/actualiza_UsGinecologico",
		           data: $("#form_usGinecologico").serialize(),
		           success: function(data)
		           {
										if(data.resultado=="si"){
											bootbox.alert("Datos Actualizados Satisfactoriamente!!",function(){
											//location.reload()											
											});

										}else{
											bootbox.alert("Los datos no fueron actualizados, intente nuevamente")
										}
		           }
		         });
event.preventDefault();
});
				
    $("#recipej").click(function (){
    		var id_consultag = $("#id_consultag").val();
        var medicina = $("#medicina").val();
        var presentacion = $("#presentacion").val();
        var concentracion = $("#concentracion").val();        
        var horario = $("#horario").val();        
        var duracion = $("#duracion").val();        
        var nota_recipe = $("#nota_recipe").val();        
        var descargar = $("#descargar:checked").val();
        if(descargar){descargar=1;}else{descargar=0;}
               
        
        if(medicina == "" || presentacion == "" || concentracion == "" || horario == "" || duracion == ""){
        	 bootbox.alert("<h4>No puede dejar campos vacios en el recipe <i class='fa fa-calendar'></i></h4>")
            return false;
        }
							else
							{
							var url = "<?php echo base_url(); ?>consulta/add_recipej";
		    			 $.ajax({
		           type: "POST",
		           url: url,
		           dataType:"json",		           
    					data: {"medicina" : medicina, "presentacion" : presentacion,"concentracion" : concentracion, "horario" : horario, "duracion" : duracion, "nota_recipe" : nota_recipe,"descargar" : descargar,"id_consultag" : id_consultag},
		           success: function(data)
				           {
						          if(data.resultado==1){
						          $("#medicina").select2("val","");$("#presentacion").select2("val","");$("#concentracion").select2("val","");$("#horario").select2("val","");$("#duracion").select2("val","");
						          $("#nota_recipe").val("");$("#descargar").iCheck('uncheck');						          
						           	bootbox.alert("Medicamento "+ data.nombre +" fue añadido al recipe",function() {
						          	$("#reciped").append('<td id="borrarec_'+data.id_recipe+'">Medicamento: '+data.nombre+' <a class="sepV_a" title="Eliminar" onclick="eliminar_medicamento('+data.id_recipe+');return false;"><i class="fa fa-trash"></i></a></td>').hide().fadeIn(1000);
						           		
						           	});
											}
											else{
												bootbox.alert("Los datos del recipe no fueron registrados");
												
											}
										
				           }
				         });
				        return false;
							}
 							                
   	});

    });
        </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>