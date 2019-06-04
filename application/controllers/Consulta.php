<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");


class Consulta extends CI_Controller {
  public $db_medicina;

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->database();
		$this->db_medicina = $this->load->database('medicina', true);
		$this->load->model('Medicamentos_model','farmacia');		
		$this->load->model('Gestion_model','dash');
		$this->load->library(array('session','form_validation','email'));	
	}
  public function index($mess = 2)
  {
    	if(!$this->session->userdata('username')){
			$data['main'] 	= 'user/login';
			$data['message'] 	= $mess;
			$this->load->view('base_template/login_base',$data);
		}
		else{
			
			redirect('consulta/listado_pacientes', 'listado');
		}
  }
  function calculaedad(){
  $fechanacimiento=$_REQUEST['fecha_nac'];	
   
	$dia=date("j");
	$mes=date("n");
	$anno=date("Y");
 
	list($dia_nac,$mes_nac,$anno_nac) = explode("-",$fechanacimiento);
	if($mes_nac>$mes){
		$calc_edad= $anno-$anno_nac-1;
	}else{
		if($mes==$mes_nac AND $dia_nac>$dia){
			$calc_edad= $anno-$anno_nac-1;
		}else{
			$calc_edad= $anno-$anno_nac;
		}
	}
		$retorna['edad']=$calc_edad;
		$retorna['fecha']=date('Ymd');
		echo json_encode($retorna);
}
	function registro($mess = 1)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
			$datosr=array('titulo' => 'Gesti&oacute;n de Usuarios','titulo2' => 'Registro de Usuarios','icono' => 'fa fa-user','icono2' => 'fa fa-users','activeTab' => 1,'main' => 'user/usuarios/register','message'	=> $mess);
      $this->form_validation->set_rules('password', '', 'required',array('required' => 'Introduzca una Clave!! '));
      $this->form_validation->set_rules('password2', 'Clave', 'matches[password]',array('matches' => 'Las Claves deben ser iguales!'));
			$this->form_validation->set_rules('email', 'Correo', 'is_unique[usuarios.email]',array('is_unique'=>'Ya existe un %s igual registrado'));      
      $this->form_validation->set_rules('username', 'Usuario', 'is_unique[usuarios.usuario]',array('is_unique'=>'Ya existe un %s igual registrado'));
      if ($this->form_validation->run() == FALSE)
      {
			$this->load->view('base_template/base',$datosr);
			}
			else
			{   	
			$usuario = addslashes($_POST['username']);
    	$clave = addslashes($_POST['password']);$password=sha1($clave);
			$email = addslashes($_POST['email']);
			$nombre = addslashes($_POST['nombre']);
			$apellido=addslashes($_POST['fullname']);;
			$activo=1;
			$date=date('Y-m-d H:i:s');
			$data = array(
        'usuario' => $usuario,
        'clave' => $password,
        'email' => $email,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'activo' => $activo,
        'fe_create' => $date,
        'fe_update' => $date);
        $temp = $this->dash->reg_insert($data);
			if($temp != NULL){
				$datos1=array('titulo' => 'Gesti&oacute;n de Usuarios','titulo2' => 'Lista de Usuarios','icono' => 'fa fa-user','icono2' => 'fa fa-users','activeTab' => 1,'main' => 'user/usuarios/listado','message'	=> $mess, 'datos' => $this->dash->list_user()->result_array());
				$this->session->set_flashdata('success', "El Usuario fue Registrado con exito!!!");
				$this->load->view('base_template/base',$datos1);				
				}
				else{
				$this->session->set_flashdata('error', "Hubo un Error al Registrar el Usuario !!!intente de nuevo!!!");
				$this->load->view('base_template/base',$datosr);			
				}
			}
		}
	}	
/////////////////////PACIENTES REGISTRO////////////////////////////////////
	function add_pacientes($mess = 1)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
			$datosr=array('titulo' => 'Gesti&oacute;n de Consultas','titulo2' => 'Registro de Pacientes','icono' => 'fa fa-user','icono2' => 'fa fa-users','activeTab' => 2,'main' => 'consulta/pacientes/reg_pacientes','message'	=> $mess,'datos' => $this->dash->list_aseguradoras()->result_array());
			$this->form_validation->set_rules('fecha_nac', 'Fecha de Nacimiento','required',array('required' => 'Introduzca una Fecha de Nacimiento!! '));
			$this->form_validation->set_rules('ultimo_p', 'Ultima Fecha del Periodo','required',array('required' => 'Introduzca una Fecha!! '));			
			$this->form_validation->set_rules('cedula', 'Cedula', 'is_unique[pacientes.cedula]',array('is_unique'=>'Ya existe una %s igual registrada'));
			$this->form_validation->set_rules('correo', 'Correo', 'is_unique[pacientes.correo]',array('is_unique'=>'Ya existe un %s igual registrado'));      
      if ($this->form_validation->run() == FALSE)
      {
			$this->load->view('base_template/base',$datosr);
			}
			else
			{
			$cedula = addslashes($_POST['cedula']);
    	$password=sha1($cedula);
			$email = addslashes($_POST['correo']);
			$nombre = addslashes($_POST['nombre']);
			$apellido=addslashes($_POST['apellido']);;
			$activo=1;
			$date=date('Y-m-d H:i:s');
			$data = array(
        'usuario' => $email,
        'clave' => $password,
        'email' => $email,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'activo' => $activo,
        'fe_create' => $date,
        'fe_update' => $date,
        'admin' => 0);
        $temp = $this->dash->reg_insert($data);
			if($temp != NULL){
			$cedula = $_POST['cedula'];
			$nombre = addslashes($_POST['nombre']);
			$apellido=addslashes($_POST['apellido']);;
			$telefono = addslashes($_POST['telefono']);
			$fecha_nac = $this->dash->fechanew($_POST['fecha_nac']);
			$edad=addslashes($_POST['edad']);
			$id_seguros = addslashes($_POST['id_seguros']);
			$embarazo=addslashes($_POST['embarazo']);;
			$correo = addslashes($_POST['correo']);
			$g_sanguineo = addslashes($_POST['g_sanguineo']);
			$direccion = addslashes($_POST['direccion']);
			$id_usuario = $temp;
			$ultimo_p = $this->dash->fechanew($_POST['ultimo_p']);
														
			$datos = array(
        'cedula' => $cedula,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'telefono' => $telefono,
        'fecha_nac' => $fecha_nac,
        'edad' => $edad,
        'id_seguros' => $id_seguros,
        'embarazo' => $embarazo,
        'correo' => $correo,
        'id_usuario' => $id_usuario,
        'fe_create' => $date,
        'fe_update' => $date,
        'ultimo_p' => $ultimo_p,
        'g_sanguineo' => $g_sanguineo,
        'direccion' => $direccion);
        $tempo = $this->dash->pacientes_insert($datos);
        if($tempo != NULL){
				$datos1=array('titulo' => 'Gesti&oacute;n de Consultas','titulo2' => 'Lista de Pacientes','icono' => 'fa fa-user','icono2' => 'fa fa-users','activeTab' => 2,'main' => 'consulta/pacientes/listado_pacientes','message'	=> $mess, 'datos' => $this->dash->list_pacientes()->result_array());
				$this->session->set_flashdata('success', "El Paciente fue Registrado con exito!!!");
				$this->load->view('base_template/base',$datos1);	
					}			
			}
				else{
				$this->session->set_flashdata('error', "Hubo un Error al Registrar el Usuario !!!intente de nuevo!!!");
				$this->load->view('base_template/base',$datosr);			
				}
			}
		}
	}	
	function update_pacientes($mess = 1)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
			else
			{ 
			$id_usuario = addslashes($_POST['id_usuario']);				
			$cedula = addslashes($_POST['cedula']);
    	$password=sha1($cedula);
			$email = addslashes($_POST['correo']);
			$nombre = addslashes($_POST['nombre']);
			$apellido=addslashes($_POST['apellido']);;
			$date=date('Y-m-d H:i:s');
			$data = array(
        'usuario' => $email,
        'clave' => $password,
        'email' => $email,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'fe_update' => $date,
	'admin' => 0);
        $temp = $this->dash->reg_update($data,$id_usuario);        
			if($temp != NULL){
			$id_paciente = addslashes($_POST['id_paciente']);								
			$cedula = $_POST['cedula'];
			$nombre = addslashes($_POST['nombre']);
			$apellido=addslashes($_POST['apellido']);;
			$telefono = addslashes($_POST['telefono']);
			$fecha_nac = $this->dash->fechanew($_POST['fecha_nac']);
			$edad=addslashes($_POST['edad']);
			$id_seguros = addslashes($_POST['id_seguros']);
			$embarazo=addslashes($_POST['embarazo']);;
			$correo = addslashes($_POST['correo']);
			$ultimo_p = $this->dash->fechanew($_POST['ultimo_p']);
			$g_sanguineo = addslashes($_POST['g_sanguineo']);
			$direccion = addslashes($_POST['direccion']);
			
			$datos = array(
        'cedula' => $cedula,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'telefono' => $telefono,
        'fecha_nac' => $fecha_nac,
        'edad' => $edad,
        'id_seguros' => $id_seguros,
        'embarazo' => $embarazo,
        'correo' => $correo,                
        'fe_update' => $date,
        'ultimo_p' => $ultimo_p,
        'g_sanguineo' => $g_sanguineo,
        'direccion' => $direccion);
        $tempo = $this->dash->pacientes_update($datos,$id_paciente);                
        if($tempo != NULL){
				$datos1=array('titulo' => 'Gesti&oacute;n de Consultas','titulo2' => 'Lista de Pacientes','icono' => 'fa fa-user','icono2' => 'fa fa-users','activeTab' => 2,'main' => 'consulta/pacientes/listado_pacientes','message'	=> $mess, 'datos' => $this->dash->list_pacientes()->result_array());
				$this->session->set_flashdata('success', "El Paciente fue Actualizado con exito!!!");
				$this->load->view('base_template/base',$datos1);	
					}			
			}
				else{
				$this->session->set_flashdata('error', "Hubo un Error al Registrar el Usuario !!!intente de nuevo!!!");
				$this->load->view('base_template/base',$datosr);			
				}
			}
	}	
	function listado_pacientes($mess = 2)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Registro de Pacientes";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/listado_pacientes'; 
		  	$data['datos']	= $this->dash->list_pacientes()->result_array();				 
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
      }
  }
	function reg_pacientes()
	{    		
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Registro de Pacientes";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/reg_pacientes'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();				 
				$this->load->view('base_template/base',$data);
		}
	}	
	function edit_pacientes($id)
	{    		
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
    		$ref=$this->dash->PacientesEdit($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Actualizar Pacientes";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/edit_pacientes'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();				 
				$this->load->view('base_template/base',$data);
		}
	}
/////////////////LISTA DE CONSULTA G///////////////////////////////////////

	function LisConsultaG($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Consulta Ginecol&oacute;gica";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/consultaG/listado_consultaG'; 
		  	$data['datos']	= $this->dash->LisConsultaG($id)->result_array();				 
        $this->load->view('base_template/base',$data);	
      }
  }
	function nueva_consulta($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
				$autoid=$this->dash->GetAutoincrement('g_consulta','obstetri_admin')->result_array();
				$idconsulta=$autoid[0]['Auto_increment'];	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Consulta Ginecol&oacute;gica";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/consultaG/nueva_consulta'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();	
		  	$data['datos_a']	= $this->dash->list_anticonceptivos()->result_array();	
		  	$data['datos_d']	= $this->dash->list_drogas()->result_array();
		  	$data['datos_me']	= $this->farmacia->list_medicina()->result_array();
		  	$data['datos_pre']	= $this->farmacia->list_presentacion()->result_array();
		  	$data['datos_co']	= $this->farmacia->list_concentracion()->result_array();
		  	$data['datos_ho']	= $this->farmacia->list_horario()->result_array();
		  	$data['datos_du']	= $this->farmacia->list_duracion()->result_array();
    	  $data['numerocon']=$idconsulta;
        $this->load->view('base_template/base',$data);	
      }
  }
	function reg_consulta()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
				$id_consultag=@$_POST['id_consultag'];
				$id_paciente = @$_POST['id_paciente'];
				$primera_r = @$_POST['primera_r'];
				$parejasx = @$_POST['parejasx'];
				$estadoc = @$_POST['estadoc'];
				$actividadx = @$_POST['actividadx'];
				$histerectomia = @$_POST['histerectomia'];
				$oforectomia = @$_POST['oforectomia'];
				$vph_cervical = @$_POST['vph_cervical'];
				$vph_condiloma = @$_POST['vph_condiloma'];
				$herpes_genital = @$_POST['herpes_genital'];
				$endometriosis = @$_POST['endometriosis'];
				$sop = @$_POST['sop'];
				$ultimo_ = @$_POST['ultimo_p'];
				($ultimo_=="") ? $ultimo_p="" : $ultimo_p=$this->dash->fechanew($ultimo_);
				$anticonceptivos = @$_POST['anticonceptivos'];
				$paridad = @$_POST['paridad'];
				$partos = @$_POST['partos'];
				$cesareas = @$_POST['cesareas'];
				$aborto = @$_POST['aborto'];
				$ectopico = @$_POST['ectopico'];
				$antecedentes_gine = @$_POST['antecedentes_gine'];
				$antecedentes_obste = @$_POST['antecedentes_obste'];
				$notas_gineco = @$_POST['notas_gineco'];
				$notas_obste = @$_POST['notas_obste'];
				$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
				$data = array(        
				'id_consultag' => $id_consultag,
				'id_paciente' => $id_paciente,
				'primera_r' => $primera_r,
				'parejasx' => $parejasx,
				'estadoc' => $estadoc,
				'actividadx' => $actividadx,
				'histerectomia' => $histerectomia,
				'oforectomia' => $oforectomia,
				'vph_cervical' => $vph_cervical,
				'vph_condiloma' => $vph_condiloma,
				'herpes_genital' => $herpes_genital,
				'endometriosis' => $endometriosis,
				'sop' => $sop,
				'ultimo_p' => $ultimo_p,
				'anticonceptivos' => $anticonceptivos,
				'paridad' => $paridad,
				'partos' => $partos,
				'cesareas' => $cesareas,
				'aborto' => $aborto,
				'ectopico' => $ectopico,
				'antecedentes_gine' => $antecedentes_gine,
				'antecedentes_obste' => $antecedentes_obste,
				'notas_gineco' => $notas_gineco,
				'notas_obste' => $notas_obste,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update);	
        $tempo = $this->dash->consultag_insert($data);
        if($tempo != NULL){
        //$id_consultag=$tempo;
				$patologia = @$_POST['patologia'];    
				$hipertencion = @$_POST['hipertencion'];          
				$diabetes = @$_POST['diabetes'];      
				$asma = @$_POST['asma'];  
				$renales = @$_POST['renales'];        
				$neurologicos = @$_POST['neurologicos'];          
				$psiquiatricos = @$_POST['psiquiatricos'];        
				$patologia_general = @$_POST['patologia_general'];
				$traumatologicos = @$_POST['traumatologicos'];    
				$oftalmologicos = @$_POST['oftalmologicos'];      
				$endoscopia = @$_POST['endoscopia'];
				$laparoscopias = @$_POST['laparoscopias'];     
				$laparotomias = @$_POST['laparotomias'];        
				$detalles_medicos = @$_POST['detalles_medicos'];     
				$detalles_quirurgicos = @$_POST['detalles_quirurgicos'];   
				$datam = array(
        'id_consultag' => $id_consultag,			     
				'patologia' => $patologia,       
				'hipertencion' => $hipertencion,       
				'diabetes' => $diabetes,         
				'asma' => $asma,     
				'renales' => $renales,       
				'neurologicos' => $neurologicos,   
				'psiquiatricos' => $psiquiatricos,       
				'patologia_general' => $patologia_general,     
				'traumatologicos' => $traumatologicos, 
				'oftalmologicos' => $oftalmologicos,         
				'endoscopia' => $endoscopia,           
				'laparoscopias' => $laparoscopias,     
				'laparotomias' => $laparotomias,       
				'detalles_medicos' => $detalles_medicos,           
				'detalles_quirurgicos' => $detalles_quirurgicos); 
        $tempo2 = $this->dash->g_medicos_insert($datam);
        if($tempo2 != NULL){	
        //$id_consultag=$tempo;
				$habitos_pb = @$_POST['habitos_pb'];    
				$tabaco = @$_POST['tabaco'];          
				$alcohol = @$_POST['alcohol'];      
				$drogas = @$_POST['drogas'];  
				$ejercita = @$_POST['ejercita'];        
				$datamh = array(
        'id_consultag' => $id_consultag,			     
				'habitos_pb' => $habitos_pb,       
				'tabaco' => $tabaco,       
				'alcohol' => $alcohol,         
				'drogas' => $drogas,     
				'ejercita' => $ejercita);
				 $tempo3 = $this->dash->g_habitos_insert($datamh); 
        if($tempo3 != NULL){
				$motivo = @$_POST['motivo'];    
				$general = @$_POST['general'];          
				$vagina = @$_POST['vagina'];      
				$cuello_tiroide = @$_POST['cuello_tiroide'];  
				$mamas = @$_POST['mamas'];
				$abdomen = @$_POST['abdomen'];
				$genitales_e = @$_POST['genitales_e'];          
				$vagina = @$_POST['vagina'];      
				$cuello = @$_POST['cuello'];  
				$ustv = @$_POST['ustv'];
				$utero = @$_POST['utero'];    
				$ovario_der = @$_POST['ovario_der'];          
				$ovario_izq = @$_POST['ovario_izq'];      
				$nota_ecografica = @$_POST['nota_ecografica'];  
				$datamhj = array(
        'id_consultag' => $id_consultag,			     
				'motivo' => $motivo,       
				'general' => $general,       
				'vagina' => $vagina,         
				'cuello_tiroide' => $cuello_tiroide,     
				'mamas' => $mamas,
				'abdomen' => $abdomen,       
				'genitales_e' => $genitales_e,       
				'vagina' => $vagina,         
				'cuello' => $cuello,     
				'ustv' => $ustv,
				'utero' => $utero,    
				'ovario_der' => $ovario_der,       
				'ovario_izq' => $ovario_izq,         
				'nota_ecografica' => $nota_ecografica);        	
         $tempo4 = $this->dash->g_evaluacion_insert($datamhj); 
        if($tempo4 != NULL){
				$diagnostico = @$_POST['diagnostico'];    
				$plan = @$_POST['plan'];        
				$datamhg = array(
        'id_consultag' => $id_consultag,			     
				'diagnostico' => $diagnostico,       
				'plan' => $plan);
				 $tempo5 = $this->dash->g_diagnostico_insert($datamhg); 
        if($tempo5 != NULL){        	
						$this->session->set_flashdata('success', "Consulta Registrada con exito!!!");
						header('location:'.base_url().'consulta/LisConsultaG/'.$id_paciente);
							}
						}
					}
				}			 
      }
    }
  }
	function actualiza_consulta()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	

				$id_paciente = @$_POST['id_paciente'];
				$id_consultag = @$_POST['id_consultag'];
				$primera_r = @$_POST['primera_r'];
				$parejasx = @$_POST['parejasx'];
				$estadoc = @$_POST['estadoc'];
				$actividadx = @$_POST['actividadx'];
				$histerectomia = @$_POST['histerectomia'];
				$oforectomia = @$_POST['oforectomia'];
				$vph_cervical = @$_POST['vph_cervical'];
				$vph_condiloma = @$_POST['vph_condiloma'];
				$herpes_genital = @$_POST['herpes_genital'];
				$endometriosis = @$_POST['endometriosis'];
				$sop = @$_POST['sop'];
				$ultimo_ = @$_POST['ultimo_p'];
				($ultimo_=="") ? $ultimo_p="" : $ultimo_p=$this->dash->fechanew($ultimo_);
				$anticonceptivos = @$_POST['anticonceptivos'];
				$paridad = @$_POST['paridad'];
				$partos = @$_POST['partos'];
				$cesareas = @$_POST['cesareas'];
				$aborto = @$_POST['aborto'];
				$ectopico = @$_POST['ectopico'];
				$antecedentes_gine = @$_POST['antecedentes_gine'];
				$antecedentes_obste = @$_POST['antecedentes_obste'];
				$notas_gineco = @$_POST['notas_gineco'];
				$notas_obste = @$_POST['notas_obste'];
				$fe_update=date('Y-m-d H:i:s');
				$data = array(        
				'id_paciente' => $id_paciente,
				'primera_r' => $primera_r,
				'parejasx' => $parejasx,
				'estadoc' => $estadoc,
				'actividadx' => $actividadx,
				'histerectomia' => $histerectomia,
				'oforectomia' => $oforectomia,
				'vph_cervical' => $vph_cervical,
				'vph_condiloma' => $vph_condiloma,
				'herpes_genital' => $herpes_genital,
				'endometriosis' => $endometriosis,
				'sop' => $sop,
				'ultimo_p' => $ultimo_p,
				'anticonceptivos' => $anticonceptivos,
				'paridad' => $paridad,
				'partos' => $partos,
				'cesareas' => $cesareas,
				'aborto' => $aborto,
				'ectopico' => $ectopico,
				'antecedentes_gine' => $antecedentes_gine,
				'antecedentes_obste' => $antecedentes_obste,
				'notas_gineco' => $notas_gineco,
				'notas_obste' => $notas_obste,
				'fe_update' => $fe_update);	
        $tempo = $this->dash->consultag_update($data,$id_consultag);
        $patologia = @$_POST['patologia'];    
				$hipertencion = @$_POST['hipertencion'];          
				$diabetes = @$_POST['diabetes'];      
				$asma = @$_POST['asma'];  
				$renales = @$_POST['renales'];        
				$neurologicos = @$_POST['neurologicos'];          
				$psiquiatricos = @$_POST['psiquiatricos'];        
				$patologia_general = @$_POST['patologia_general'];
				$traumatologicos = @$_POST['traumatologicos'];    
				$oftalmologicos = @$_POST['oftalmologicos'];      
				$endoscopia = @$_POST['endoscopia'];
				$laparoscopias = @$_POST['laparoscopias'];     
				$laparotomias = @$_POST['laparotomias'];        
				$detalles_medicos = @$_POST['detalles_medicos'];     
				$detalles_quirurgicos = @$_POST['detalles_quirurgicos'];   
				$datam = array(
				'patologia' => $patologia,       
				'hipertencion' => $hipertencion,       
				'diabetes' => $diabetes,         
				'asma' => $asma,     
				'renales' => $renales,       
				'neurologicos' => $neurologicos,   
				'psiquiatricos' => $psiquiatricos,       
				'patologia_general' => $patologia_general,     
				'traumatologicos' => $traumatologicos, 
				'oftalmologicos' => $oftalmologicos,         
				'endoscopia' => $endoscopia,           
				'laparoscopias' => $laparoscopias,     
				'laparotomias' => $laparotomias,       
				'detalles_medicos' => $detalles_medicos,           
				'detalles_quirurgicos' => $detalles_quirurgicos);
				$tempo2 = $this->dash->medicosg_update($datam,$id_consultag);
				$habitos_pb = @$_POST['habitos_pb'];    
				$tabaco = @$_POST['tabaco'];          
				$alcohol = @$_POST['alcohol'];      
				$drogas = @$_POST['drogas'];  
				$ejercita = @$_POST['ejercita'];        
				$datamh = array(
				'habitos_pb' => $habitos_pb,       
				'tabaco' => $tabaco,       
				'alcohol' => $alcohol,         
				'drogas' => $drogas,     
				'ejercita' => $ejercita);
				$tempo3 = $this->dash->g_habitos_update($datamh,$id_consultag); 
				$motivo = @$_POST['motivo'];    
				$general = @$_POST['general'];          
				$vagina = @$_POST['vagina'];      
				$cuello_tiroide = @$_POST['cuello_tiroide'];  
				$mamas = @$_POST['mamas'];
				$abdomen = @$_POST['abdomen'];
				$genitales_e = @$_POST['genitales_e'];          
				$vagina = @$_POST['vagina'];      
				$cuello = @$_POST['cuello'];  
				$ustv = @$_POST['ustv'];
				$utero = @$_POST['utero'];    
				$ovario_der = @$_POST['ovario_der'];          
				$ovario_izq = @$_POST['ovario_izq'];      
				$nota_ecografica = @$_POST['nota_ecografica'];  
				$datamhj = array(
				'motivo' => $motivo,       
				'general' => $general,       
				'vagina' => $vagina,         
				'cuello_tiroide' => $cuello_tiroide,     
				'mamas' => $mamas,
        'id_consultag' => $id_consultag,			     
				'abdomen' => $abdomen,       
				'genitales_e' => $genitales_e,       
				'vagina' => $vagina,         
				'cuello' => $cuello,     
				'ustv' => $ustv,
				'utero' => $utero,    
				'ovario_der' => $ovario_der,       
				'ovario_izq' => $ovario_izq,         
				'nota_ecografica' => $nota_ecografica);
				$tempo4 = $this->dash->g_evaluacion_update($datamhj,$id_consultag);  
        if($tempo != NULL AND $tempo2 != NULL AND $tempo3 != NULL AND $tempo4 != NULL){
				$retorna["resultado"]="si";	
				}
				else{
					$retorna["resultado"]="no";
				}
					echo json_encode($retorna);			 
      }
  }	  
	function editar_consulta($id_consultag,$id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 	
    		$refc=$this->dash->ConsultaGEdit($id_consultag);
				$data['dconsulta'] = $refc; 						
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Consulta Ginecol&oacute;gica";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/consultaG/editar_consulta'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();	
		  	$data['datos_a']	= $this->dash->list_anticonceptivos()->result_array();
		  	$data['datos_d']	= $this->dash->list_drogas()->result_array();
				$data['datos_me']	= $this->farmacia->list_medicina()->result_array();
		  	$data['datos_pre']	= $this->farmacia->list_presentacion()->result_array();
		  	$data['datos_co']	= $this->farmacia->list_concentracion()->result_array();
		  	$data['datos_ho']	= $this->farmacia->list_horario()->result_array();
		  	$data['datos_du']	= $this->farmacia->list_duracion()->result_array();
				$jjbreci=$this->dash->list_recipes($id_consultag)->result_array();
				$recipefinal=array();$num=0;
				foreach($jjbreci as $recipe){
				$ref=$this->farmacia->medicinaEdit($recipe['medicina']);
				$recipefinal[$num]['nombre']=$ref[0]['medicina'];
				$recipefinal[$num]['id_rec']=$recipe['id_g_recipes'];
				$num++;
				}
			 	$data['medicinare']	= $recipefinal;
		  					 
       	$this->load->view('base_template/base',$data);
      }
  } 
  /////////////////LISTA DE Control G///////////////////////////////////////

	function LisControlG($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Control Ginecol&oacute;gico";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/controlG/listado_controlG'; 
		  	$data['datos']	= $this->dash->LisConsultaG($id)->result_array();				 
        $this->load->view('base_template/base',$data);	
      }
  }
	function nuevo_control($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
				$autoid=$this->dash->GetAutoincrement('g_consulta','obstetri_admin')->result_array();
				$idconsulta=$autoid[0]['Auto_increment'];	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Control Ginecol&oacute;gico";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/controlG/nuevo_control'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();	
		  	$data['datos_a']	= $this->dash->list_anticonceptivos()->result_array();	
		  	$data['datos_d']	= $this->dash->list_drogas()->result_array();
		  	$data['datos_me']	= $this->farmacia->list_medicina()->result_array();
		  	$data['datos_pre']	= $this->farmacia->list_presentacion()->result_array();
		  	$data['datos_co']	= $this->farmacia->list_concentracion()->result_array();
		  	$data['datos_ho']	= $this->farmacia->list_horario()->result_array();
		  	$data['datos_du']	= $this->farmacia->list_duracion()->result_array();
    	  $data['numerocon']=$idconsulta;
        $this->load->view('base_template/base',$data);	
      }
  }
	function reg_control()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
				$id_consultag=@$_POST['id_consultag'];
				$id_paciente = @$_POST['id_paciente'];
				$primera_r = @$_POST['primera_r'];
				$parejasx = @$_POST['parejasx'];
				$estadoc = @$_POST['estadoc'];
				$actividadx = @$_POST['actividadx'];
				$histerectomia = @$_POST['histerectomia'];
				$oforectomia = @$_POST['oforectomia'];
				$vph_cervical = @$_POST['vph_cervical'];
				$vph_condiloma = @$_POST['vph_condiloma'];
				$herpes_genital = @$_POST['herpes_genital'];
				$endometriosis = @$_POST['endometriosis'];
				$sop = @$_POST['sop'];
				$ultimo_ = @$_POST['ultimo_p'];
				($ultimo_=="") ? $ultimo_p="" : $ultimo_p=$this->dash->fechanew($ultimo_);
				$anticonceptivos = @$_POST['anticonceptivos'];
				$paridad = @$_POST['paridad'];
				$partos = @$_POST['partos'];
				$cesareas = @$_POST['cesareas'];
				$aborto = @$_POST['aborto'];
				$ectopico = @$_POST['ectopico'];
				$antecedentes_gine = @$_POST['antecedentes_gine'];
				$antecedentes_obste = @$_POST['antecedentes_obste'];
				$notas_gineco = @$_POST['notas_gineco'];
				$notas_obste = @$_POST['notas_obste'];
				$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
				$data = array(        
				'id_consultag' => $id_consultag,
				'id_paciente' => $id_paciente,
				'primera_r' => $primera_r,
				'parejasx' => $parejasx,
				'estadoc' => $estadoc,
				'actividadx' => $actividadx,
				'histerectomia' => $histerectomia,
				'oforectomia' => $oforectomia,
				'vph_cervical' => $vph_cervical,
				'vph_condiloma' => $vph_condiloma,
				'herpes_genital' => $herpes_genital,
				'endometriosis' => $endometriosis,
				'sop' => $sop,
				'ultimo_p' => $ultimo_p,
				'anticonceptivos' => $anticonceptivos,
				'paridad' => $paridad,
				'partos' => $partos,
				'cesareas' => $cesareas,
				'aborto' => $aborto,
				'ectopico' => $ectopico,
				'antecedentes_gine' => $antecedentes_gine,
				'antecedentes_obste' => $antecedentes_obste,
				'notas_gineco' => $notas_gineco,
				'notas_obste' => $notas_obste,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update);	
        $tempo = $this->dash->consultag_insert($data);
        if($tempo != NULL){
        //$id_consultag=$tempo;
				$patologia = @$_POST['patologia'];    
				$hipertencion = @$_POST['hipertencion'];          
				$diabetes = @$_POST['diabetes'];      
				$asma = @$_POST['asma'];  
				$renales = @$_POST['renales'];        
				$neurologicos = @$_POST['neurologicos'];          
				$psiquiatricos = @$_POST['psiquiatricos'];        
				$patologia_general = @$_POST['patologia_general'];
				$traumatologicos = @$_POST['traumatologicos'];    
				$oftalmologicos = @$_POST['oftalmologicos'];      
				$endoscopia = @$_POST['endoscopia'];
				$laparoscopias = @$_POST['laparoscopias'];     
				$laparotomias = @$_POST['laparotomias'];        
				$detalles_medicos = @$_POST['detalles_medicos'];     
				$detalles_quirurgicos = @$_POST['detalles_quirurgicos'];   
				$datam = array(
        'id_consultag' => $id_consultag,			     
				'patologia' => $patologia,       
				'hipertencion' => $hipertencion,       
				'diabetes' => $diabetes,         
				'asma' => $asma,     
				'renales' => $renales,       
				'neurologicos' => $neurologicos,   
				'psiquiatricos' => $psiquiatricos,       
				'patologia_general' => $patologia_general,     
				'traumatologicos' => $traumatologicos, 
				'oftalmologicos' => $oftalmologicos,         
				'endoscopia' => $endoscopia,           
				'laparoscopias' => $laparoscopias,     
				'laparotomias' => $laparotomias,       
				'detalles_medicos' => $detalles_medicos,           
				'detalles_quirurgicos' => $detalles_quirurgicos); 
        $tempo2 = $this->dash->g_medicos_insert($datam);
        if($tempo2 != NULL){	
        //$id_consultag=$tempo;
				$habitos_pb = @$_POST['habitos_pb'];    
				$tabaco = @$_POST['tabaco'];          
				$alcohol = @$_POST['alcohol'];      
				$drogas = @$_POST['drogas'];  
				$ejercita = @$_POST['ejercita'];        
				$datamh = array(
        'id_consultag' => $id_consultag,			     
				'habitos_pb' => $habitos_pb,       
				'tabaco' => $tabaco,       
				'alcohol' => $alcohol,         
				'drogas' => $drogas,     
				'ejercita' => $ejercita);
				 $tempo3 = $this->dash->g_habitos_insert($datamh); 
        if($tempo3 != NULL){
				$motivo = @$_POST['motivo'];    
				$general = @$_POST['general'];          
				$vagina = @$_POST['vagina'];      
				$cuello_tiroide = @$_POST['cuello_tiroide'];  
				$mamas = @$_POST['mamas'];
				$abdomen = @$_POST['abdomen'];
				$genitales_e = @$_POST['genitales_e'];          
				$vagina = @$_POST['vagina'];      
				$cuello = @$_POST['cuello'];  
				$ustv = @$_POST['ustv'];
				$utero = @$_POST['utero'];    
				$ovario_der = @$_POST['ovario_der'];          
				$ovario_izq = @$_POST['ovario_izq'];      
				$nota_ecografica = @$_POST['nota_ecografica'];  
				$datamhj = array(
        'id_consultag' => $id_consultag,			     
				'motivo' => $motivo,       
				'general' => $general,       
				'vagina' => $vagina,         
				'cuello_tiroide' => $cuello_tiroide,     
				'mamas' => $mamas,
				'abdomen' => $abdomen,       
				'genitales_e' => $genitales_e,       
				'vagina' => $vagina,         
				'cuello' => $cuello,     
				'ustv' => $ustv,
				'utero' => $utero,    
				'ovario_der' => $ovario_der,       
				'ovario_izq' => $ovario_izq,         
				'nota_ecografica' => $nota_ecografica);        	
         $tempo4 = $this->dash->g_evaluacion_insert($datamhj); 
        if($tempo4 != NULL){
				$diagnostico = @$_POST['diagnostico'];    
				$plan = @$_POST['plan'];        
				$datamhg = array(
        'id_consultag' => $id_consultag,			     
				'diagnostico' => $diagnostico,       
				'plan' => $plan);
				 $tempo5 = $this->dash->g_diagnostico_insert($datamhg); 
        if($tempo5 != NULL){        	
						$this->session->set_flashdata('success', "Consulta Registrada con exito!!!");
						header('location:'.base_url().'consulta/LisConsultaG/'.$id_paciente);
							}
						}
					}
				}			 
      }
    }
  }
	function actualiza_control()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	

				$id_paciente = @$_POST['id_paciente'];
				$id_consultag = @$_POST['id_consultag'];
				$primera_r = @$_POST['primera_r'];
				$parejasx = @$_POST['parejasx'];
				$estadoc = @$_POST['estadoc'];
				$actividadx = @$_POST['actividadx'];
				$histerectomia = @$_POST['histerectomia'];
				$oforectomia = @$_POST['oforectomia'];
				$vph_cervical = @$_POST['vph_cervical'];
				$vph_condiloma = @$_POST['vph_condiloma'];
				$herpes_genital = @$_POST['herpes_genital'];
				$endometriosis = @$_POST['endometriosis'];
				$sop = @$_POST['sop'];
				$ultimo_ = @$_POST['ultimo_p'];
				($ultimo_=="") ? $ultimo_p="" : $ultimo_p=$this->dash->fechanew($ultimo_);
				$anticonceptivos = @$_POST['anticonceptivos'];
				$paridad = @$_POST['paridad'];
				$partos = @$_POST['partos'];
				$cesareas = @$_POST['cesareas'];
				$aborto = @$_POST['aborto'];
				$ectopico = @$_POST['ectopico'];
				$antecedentes_gine = @$_POST['antecedentes_gine'];
				$antecedentes_obste = @$_POST['antecedentes_obste'];
				$notas_gineco = @$_POST['notas_gineco'];
				$notas_obste = @$_POST['notas_obste'];
				$fe_update=date('Y-m-d H:i:s');
				$data = array(        
				'id_paciente' => $id_paciente,
				'primera_r' => $primera_r,
				'parejasx' => $parejasx,
				'estadoc' => $estadoc,
				'actividadx' => $actividadx,
				'histerectomia' => $histerectomia,
				'oforectomia' => $oforectomia,
				'vph_cervical' => $vph_cervical,
				'vph_condiloma' => $vph_condiloma,
				'herpes_genital' => $herpes_genital,
				'endometriosis' => $endometriosis,
				'sop' => $sop,
				'ultimo_p' => $ultimo_p,
				'anticonceptivos' => $anticonceptivos,
				'paridad' => $paridad,
				'partos' => $partos,
				'cesareas' => $cesareas,
				'aborto' => $aborto,
				'ectopico' => $ectopico,
				'antecedentes_gine' => $antecedentes_gine,
				'antecedentes_obste' => $antecedentes_obste,
				'notas_gineco' => $notas_gineco,
				'notas_obste' => $notas_obste,
				'fe_update' => $fe_update);	
        $tempo = $this->dash->consultag_update($data,$id_consultag);
        $patologia = @$_POST['patologia'];    
				$hipertencion = @$_POST['hipertencion'];          
				$diabetes = @$_POST['diabetes'];      
				$asma = @$_POST['asma'];  
				$renales = @$_POST['renales'];        
				$neurologicos = @$_POST['neurologicos'];          
				$psiquiatricos = @$_POST['psiquiatricos'];        
				$patologia_general = @$_POST['patologia_general'];
				$traumatologicos = @$_POST['traumatologicos'];    
				$oftalmologicos = @$_POST['oftalmologicos'];      
				$endoscopia = @$_POST['endoscopia'];
				$laparoscopias = @$_POST['laparoscopias'];     
				$laparotomias = @$_POST['laparotomias'];        
				$detalles_medicos = @$_POST['detalles_medicos'];     
				$detalles_quirurgicos = @$_POST['detalles_quirurgicos'];   
				$datam = array(
				'patologia' => $patologia,       
				'hipertencion' => $hipertencion,       
				'diabetes' => $diabetes,         
				'asma' => $asma,     
				'renales' => $renales,       
				'neurologicos' => $neurologicos,   
				'psiquiatricos' => $psiquiatricos,       
				'patologia_general' => $patologia_general,     
				'traumatologicos' => $traumatologicos, 
				'oftalmologicos' => $oftalmologicos,         
				'endoscopia' => $endoscopia,           
				'laparoscopias' => $laparoscopias,     
				'laparotomias' => $laparotomias,       
				'detalles_medicos' => $detalles_medicos,           
				'detalles_quirurgicos' => $detalles_quirurgicos);
				$tempo2 = $this->dash->medicosg_update($datam,$id_consultag);
				$habitos_pb = @$_POST['habitos_pb'];    
				$tabaco = @$_POST['tabaco'];          
				$alcohol = @$_POST['alcohol'];      
				$drogas = @$_POST['drogas'];  
				$ejercita = @$_POST['ejercita'];        
				$datamh = array(
				'habitos_pb' => $habitos_pb,       
				'tabaco' => $tabaco,       
				'alcohol' => $alcohol,         
				'drogas' => $drogas,     
				'ejercita' => $ejercita);
				$tempo3 = $this->dash->g_habitos_update($datamh,$id_consultag); 
				$motivo = @$_POST['motivo'];    
				$general = @$_POST['general'];          
				$vagina = @$_POST['vagina'];      
				$cuello_tiroide = @$_POST['cuello_tiroide'];  
				$mamas = @$_POST['mamas'];
				$abdomen = @$_POST['abdomen'];
				$genitales_e = @$_POST['genitales_e'];          
				$vagina = @$_POST['vagina'];      
				$cuello = @$_POST['cuello'];  
				$ustv = @$_POST['ustv'];
				$utero = @$_POST['utero'];    
				$ovario_der = @$_POST['ovario_der'];          
				$ovario_izq = @$_POST['ovario_izq'];      
				$nota_ecografica = @$_POST['nota_ecografica'];  
				$datamhj = array(
				'motivo' => $motivo,       
				'general' => $general,       
				'vagina' => $vagina,         
				'cuello_tiroide' => $cuello_tiroide,     
				'mamas' => $mamas,
        'id_consultag' => $id_consultag,			     
				'abdomen' => $abdomen,       
				'genitales_e' => $genitales_e,       
				'vagina' => $vagina,         
				'cuello' => $cuello,     
				'ustv' => $ustv,
				'utero' => $utero,    
				'ovario_der' => $ovario_der,       
				'ovario_izq' => $ovario_izq,         
				'nota_ecografica' => $nota_ecografica);
				$tempo4 = $this->dash->g_evaluacion_update($datamhj,$id_consultag);  
        if($tempo != NULL AND $tempo2 != NULL AND $tempo3 != NULL AND $tempo4 != NULL){
				$retorna["resultado"]="si";	
				}
				else{
					$retorna["resultado"]="no";
				}
					echo json_encode($retorna);			 
      }
  }	  
	function editar_control($id_consultag,$id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 	
    		$refc=$this->dash->ConsultaGEdit($id_consultag);
				$data['dconsulta'] = $refc; 						
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Consulta Ginecol&oacute;gica";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/consultaG/editar_consulta'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();	
		  	$data['datos_a']	= $this->dash->list_anticonceptivos()->result_array();
		  	$data['datos_d']	= $this->dash->list_drogas()->result_array();
				$data['datos_me']	= $this->farmacia->list_medicina()->result_array();
		  	$data['datos_pre']	= $this->farmacia->list_presentacion()->result_array();
		  	$data['datos_co']	= $this->farmacia->list_concentracion()->result_array();
		  	$data['datos_ho']	= $this->farmacia->list_horario()->result_array();
		  	$data['datos_du']	= $this->farmacia->list_duracion()->result_array();
				$jjbreci=$this->dash->list_recipes($id_consultag)->result_array();
				$recipefinal=array();$num=0;
				foreach($jjbreci as $recipe){
				$ref=$this->farmacia->medicinaEdit($recipe['medicina']);
				$recipefinal[$num]['nombre']=$ref[0]['medicina'];
				$recipefinal[$num]['id_rec']=$recipe['id_g_recipes'];
				$num++;
				}
			 	$data['medicinare']	= $recipefinal;
		  					 
       	$this->load->view('base_template/base',$data);
      }
  }  
/////////////////LISTA DE PRENATAL G///////////////////////////////////////

	function LisPrenatalG($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 
				$data['otroid']=$id;		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Control Prenatal y Resumen de Evaluacion";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/prenatal/listado_prenatalG'; 
		  	$data['datos']	= $this->dash->LisPrenatalG($id)->result_array();				 
        $this->load->view('base_template/base',$data);	
      }
  }
  function ultimop()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{	
    		$id_paciente=$_POST['id_paciente'];
    		$datosg=$this->dash->ultimopg($id_paciente);
    		$retorna['ultimo_p']=$datosg[0]['ultimo_p'];
				$retorna['paridad']=$datosg[0]['paridad'];
				echo json_encode($retorna);
      }
  }
  function guarda_prenatal()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{	
    		$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$id_paciente=$_POST['paciente'];
    		$ultimo_p2=$_POST['ultimo_periodo'];
    		$parto_p=$_POST['fecha_parto'];
    		$edadg=$_POST['edad_gestacional'];
				$data=array(
				'id_paciente' => $id_paciente,
				'ultimo_p2' => $ultimo_p2,
				'parto_p' => $parto_p,
				'edadg' => $edadg,
				'antecedentes_r' => "",
				'notas_res' => "",
				'interconsultas' => "",
				'eventos' => "",
				'notas_ea' => "",
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
    		$temp=$this->dash->guarda_prenatal($data);
    		$retorna['idss']="si";
    		echo json_encode($retorna);
      }
  }
	function nueva_prenatal($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
				$autoid=$this->dash->GetAutoincrement('prenatal_1','obstetri_admin')->result_array();
				$id_prenatal_1=$autoid[0]['Auto_increment'];				
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Control Prenatal";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/prenatal/nueva_prenatal'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();
    	  $data['numerocon']=$id_prenatal_1;
        $this->load->view('base_template/base',$data);	
      }
  }
  function editar_prenatal($id_prenatal_1,$id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 	
    		$refc=$this->dash->prenatalEdit($id_prenatal_1);
				$data['dprenatal'] = $refc; 						
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Control Prenatal";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/prenatal/editar_prenatal'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();	
		  	$data['datos_a']	= $this->dash->list_anticonceptivos()->result_array();
		  	$data['datos_d']	= $this->dash->list_drogas()->result_array();
		  	$data['datos_g']	=  $this->dash->ultimopg($id);
				/*$data['datos_me']	= $this->farmacia->list_medicina()->result_array();
		  	$data['datos_pre']	= $this->farmacia->list_presentacion()->result_array();
		  	$data['datos_co']	= $this->farmacia->list_concentracion()->result_array();
		  	$data['datos_ho']	= $this->farmacia->list_horario()->result_array();
		  	$data['datos_du']	= $this->farmacia->list_duracion()->result_array();*/
       	$this->load->view('base_template/base',$data);
      }
  }
  function reg_prenatal()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{	
    		$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$id_paciente=$_POST['id_paciente'];	
    		$id_prenatal_1=$_POST['id_prenatal'];
				$ultimo_p2=$this->dash->fechanew($_POST['ultimo_p2']);
    		$parto_p=$this->dash->fechanew($_POST['parto_p']);
    		$edadg=$_POST['edadg'];    		
    		$antecedentes_r=$_POST['antecedentes_r'];
    		$notas_res=$_POST['notas_res'];
    		$interconsultas=$_POST['interconsultas'];
    		$eventos=$_POST['eventos'];
    		$notas_ea=$_POST['notas_ea'];
				$data=array(
				'id_paciente' => $id_paciente,
				'ultimo_p2' => $ultimo_p2,
				'parto_p' => $parto_p,
				'edadg' => $edadg,				
				'antecedentes_r' => $antecedentes_r,
				'notas_res' => $notas_res,
				'interconsultas' => $interconsultas,
				'eventos' => $eventos,
				'notas_ea' => $notas_ea,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
    		$temp=$this->dash->insert_prenatal($data,'prenatal_1');
				$fetales=$_POST['fetales'];
				$urinarios=$_POST['urinarios'];
				$neurologicos=$_POST['neurologicos'];
				$digestivos=$_POST['digestivos'];
    		$respiratorios=$_POST['respiratorios'];    		
    		$genitales=$_POST['genitales'];
    		$cardiovasculares=$_POST['cardiovasculares'];
    		$osteomusculo=$_POST['osteomusculo'];
    		$notas_maternas=$_POST['notas_maternas'];
				$data2=array(
				'id_prenatal_1' => $id_prenatal_1,
				'fetales' => $fetales,
				'urinarios' => $urinarios,
				'neurologicos' => $neurologicos,
				'digestivos' => $digestivos,				
				'respiratorios' => $respiratorios,
				'genitales' => $genitales,
				'cardiovasculares' => $cardiovasculares,
				'osteomusculo' => $osteomusculo,
				'notas_maternas' => $notas_maternas,
				);
    		$temp2=$this->dash->insert_prenatal($data2,'prenatal_2'); 
				$tension=$_POST['tension'];
				$peso=$_POST['peso'];
				$variacion=$_POST['variacion'];
				$edemas=$_POST['edemas'];
    		$hallazgos=$_POST['hallazgos'];    		
    		$vigilancia=$_POST['vigilancia'];
    		$plan=$_POST['plan'];
    		$resumen=$_POST['resumen'];
    		$laboratorio=$_POST['laboratorio'];
    		$medicamentos=$_POST['medicamentos'];
    		$reposos=$_POST['reposos'];
				$data3=array(
				'id_prenatal_1' => $id_prenatal_1,
				'tension' => $tension,
				'peso' => $peso,
				'variacion' => $variacion,
				'edemas' => $edemas,				
				'hallazgos' => $hallazgos,
				'vigilancia' => $vigilancia,
				'plan' => $plan,
				'resumen' => $resumen,
				'laboratorio' => $laboratorio,
				'medicamentos' => $medicamentos,
				'reposos' => $reposos,
				);
    		$temp3=$this->dash->insert_prenatal($data3,'prenatal_3');     		  		
    		if($temp != NULL & $temp2 != NULL & $temp3 != NULL){
						$this->session->set_flashdata('success', "Consulta Prenatal Registrada con exito!!!");
						header('location:'.base_url().'consulta/LisPrenatalG/'.$id_paciente);
				}
      }
  }
  function actualiza_prenatal()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{	
    		$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$id_paciente=$_POST['id_paciente'];	
    		$id_prenatal=$_POST['id_prenatal'];
				$ultimo_p2=$this->dash->fechanew($_POST['ultimo_p2']);
    		$parto_p=$this->dash->fechanew($_POST['parto_p']);
    		$edadg=$_POST['edadg'];    		
    		$antecedentes_r=$_POST['antecedentes_r'];
    		$notas_res=$_POST['notas_res'];
    		$interconsultas=$_POST['interconsultas'];
    		$eventos=$_POST['eventos'];
    		$notas_ea=$_POST['notas_ea'];
				$data=array(
				'antecedentes_r' => $antecedentes_r,
				'notas_res' => $notas_res,
				'interconsultas' => $interconsultas,
				'eventos' => $eventos,
				'notas_ea' => $notas_ea,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
    		$temp=$this->dash->actualiza_prenatal($data,$id_prenatal,'prenatal_1');
				$fetales=$_POST['fetales'];
				$urinarios=$_POST['urinarios'];
				$neurologicos=$_POST['neurologicos'];
				$digestivos=$_POST['digestivos'];
    		$respiratorios=$_POST['respiratorios'];    		
    		$genitales=$_POST['genitales'];
    		$cardiovasculares=$_POST['cardiovasculares'];
    		$osteomusculo=$_POST['osteomusculo'];
    		$notas_maternas=$_POST['notas_maternas'];
				$data2=array(
				'fetales' => $fetales,
				'urinarios' => $urinarios,
				'neurologicos' => $neurologicos,
				'digestivos' => $digestivos,				
				'respiratorios' => $respiratorios,
				'genitales' => $genitales,
				'cardiovasculares' => $cardiovasculares,
				'osteomusculo' => $osteomusculo,
				'notas_maternas' => $notas_maternas,
				);
    		$temp2=$this->dash->actualiza_prenatal($data2,$id_prenatal,'prenatal_2');
				$tension=$_POST['tension'];
				$peso=$_POST['peso'];
				$variacion=$_POST['variacion'];
				$edemas=$_POST['edemas'];
    		$hallazgos=$_POST['hallazgos'];    		
    		$vigilancia=$_POST['vigilancia'];
    		$plan=$_POST['plan'];
    		$resumen=$_POST['resumen'];
    		$laboratorio=$_POST['laboratorio'];
    		$medicamentos=$_POST['medicamentos'];
    		$reposos=$_POST['reposos'];
				$data3=array(
				'tension' => $tension,
				'peso' => $peso,
				'variacion' => $variacion,
				'edemas' => $edemas,				
				'hallazgos' => $hallazgos,
				'vigilancia' => $vigilancia,
				'plan' => $plan,
				'resumen' => $resumen,
				'laboratorio' => $laboratorio,
				'medicamentos' => $medicamentos,
				'reposos' => $reposos,
				);
    		$temp3=$this->dash->actualiza_prenatal($data3,$id_prenatal,'prenatal_3');
    		if($temp != NULL & $temp2 != NULL & $temp3 != NULL){
				$retorna["resultado"]="si";	
				}
				else{
					$retorna["resultado"]="no";
				}
					echo json_encode($retorna);	
      }
  }  
/////////////////LISTA DE PRENATAL G///////////////////////////////////////

	function LisUsGinecologico($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 
				$data['otroid']=$id;		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Us Ginecologico";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/UsGinecologico/listado_UsGinecologico'; 
		  	$data['datos']	= $this->dash->listado_UsGinecologico($id)->result_array();	
        $this->load->view('base_template/base',$data);	
      }
  }
  function nuevo_UsGinecologico($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
				$autoid=$this->dash->GetAutoincrement('us_ginecologico_1','obstetri_admin')->result_array();
				$id_us_ginecologico_1=$autoid[0]['Auto_increment'];				
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Us Ginecologico";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/UsGinecologico/nuevo_UsGinecologico'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();
		  	$data['tratante']	= $this->dash->list_tratante()->result_array();		 
    	  $data['numerocon']=$id_us_ginecologico_1;
        $this->load->view('base_template/base',$data);	
      }
  }
   function reg_UsGinecologico()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{	
    		$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$id_paciente=$_POST['id_paciente'];	
    		$id_us_ginecologico_1=$_POST['id_us_ginecologico_1'];
    		$indicacion=$_POST['indicacion'];    		
    		$sonda=$_POST['sonda'];
    		$tratante=$_POST['tratante'];
    		$posicion_u=$_POST['posicion_u'];
    		$superficie=$_POST['superficie'];
    		$miometrio=$_POST['miometrio'];
    		$endometrio=$_POST['endometrio'];    		
    		$grosor=$_POST['grosor'];
    		$endometrio_m=$_POST['endometrio_m'];
    		$fondos=$_POST['fondos'];
    		$utero_l=$_POST['utero_l'];
    		$utero_ap=$_POST['utero_ap'];
    		$utero_trans=$_POST['utero_trans'];    		
    		$volumen_uterino=$_POST['volumen_uterino'];
    		$endometrio_m=$_POST['endometrio_m'];
				$data=array(
				'id_paciente' => $id_paciente,
				'indicacion' => $indicacion,
				'sonda' => $sonda,
				'tratante' => $tratante,				
				'posicion_u' => $posicion_u,
				'superficie' => $superficie,
				'miometrio' => $miometrio,
				'endometrio' => $endometrio,
				'grosor' => $grosor,
				'endometrio_m' => $endometrio_m,
				'fondos' => $fondos,
				'utero_l' => $utero_l,				
				'utero_ap' => $utero_ap,
				'utero_trans' => $utero_trans,
				'volumen_uterino' => $volumen_uterino,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
    		$ovderecho=$_POST['ovderecho'];    		
    		$ovizquierdo=$_POST['ovizquierdo'];
    		$caracteristicas=$_POST['caracteristicas'];
    		$caracteristicas1=$_POST['caracteristicas1'];
    		$longitudinal=$_POST['longitudinal'];
    		$longitudinal1=$_POST['longitudinal1'];
    		$transversal=$_POST['transversal'];    		
    		$transversal1=$_POST['transversal1'];
    		$anteroposterior=$_POST['anteroposterior'];
    		$anteroposterior1=$_POST['anteroposterior1'];
    		$volumen=$_POST['volumen'];
    		$volumen1=$_POST['volumen1'];
    		$hallazgos=$_POST['hallazgos'];    		
    		$diagnosticos=$_POST['diagnosticos'];
    		$sugerencias=$_POST['sugerencias'];
				$data2=array(
				'id_us_ginecologico_1' => $id_us_ginecologico_1,
				'ovderecho' => $ovderecho,
				'ovizquierdo' => $ovizquierdo,
				'caracteristicas' => $caracteristicas,				
				'caracteristicas1' => $caracteristicas1,
				'longitudinal' => $longitudinal,
				'longitudinal1' => $longitudinal1,
				'transversal' => $transversal,
				'transversal1' => $transversal1,
				'anteroposterior' => $anteroposterior,
				'anteroposterior1' => $anteroposterior1,
				'volumen' => $volumen,				
				'volumen1' => $volumen1,
				'hallazgos' => $hallazgos,
				'diagnosticos' => $diagnosticos,
				'sugerencias' => $sugerencias,
				);
    		$temp=$this->dash->insert_UsGinecologico($data,'us_ginecologico_1');
    		$temp2=$this->dash->insert_UsGinecologico($data2,'us_ginecologico_2');
				
    		if($temp != NULL & $temp2 != NULL ){
						$this->session->set_flashdata('success', "Us Ginecologico Registrado con exito!!!");
						header('location:'.base_url().'consulta/LisUsGinecologico/'.$id_paciente);
				}
      }
  }
  function editarUsGinecologico($id_us_ginecologico_1,$id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 	
    		$refc=$this->dash->usGinecologicoEdit($id_us_ginecologico_1);
				$data['usGinecologico'] = $refc; 						
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Us Ginecologico";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/UsGinecologico/editar_UsGinecologico'; 
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();
		  	$data['tratante']	= $this->dash->list_tratante()->result_array();		 	
		  	
       	$this->load->view('base_template/base',$data);
      }
  }
  function actualiza_UsGinecologico()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{	
    		$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$id_us_ginecologico_1=@$_POST['id_us_ginecologico_1'];
    		$indicacion=@$_POST['indicacion'];    		
    		$sonda=@$_POST['sonda'];
    		$tratante=@$_POST['tratante'];
    		$posicion_u=@$_POST['posicion_u'];
    		$superficie=@$_POST['superficie'];
    		$miometrio=@$_POST['miometrio'];
    		$endometrio=@$_POST['endometrio'];    		
    		$grosor=@$_POST['grosor'];
    		$endometrio_m=@$_POST['endometrio_m'];
    		$fondos=@$_POST['fondos'];
    		$utero_l=@$_POST['utero_l'];
    		$utero_ap=@$_POST['utero_ap'];
    		$utero_trans=@$_POST['utero_trans'];    		
    		$volumen_uterino=@$_POST['volumen_uterino'];
    		$endometrio_m=@$_POST['endometrio_m'];
				$data=array(
				'indicacion' => $indicacion,
				'sonda' => $sonda,
				'tratante' => $tratante,				
				'posicion_u' => $posicion_u,
				'superficie' => $superficie,
				'miometrio' => $miometrio,
				'endometrio' => $endometrio,
				'grosor' => $grosor,
				'endometrio_m' => $endometrio_m,
				'fondos' => $fondos,
				'utero_l' => $utero_l,				
				'utero_ap' => $utero_ap,
				'utero_trans' => $utero_trans,
				'volumen_uterino' => $volumen_uterino,
				'fe_update' => $fe_update,
				);
    		$ovderecho=@$_POST['ovderecho'];    		
    		$ovizquierdo=@$_POST['ovizquierdo'];
    		$caracteristicas=@$_POST['caracteristicas'];
    		$caracteristicas1=@$_POST['caracteristicas1'];
    		$longitudinal=@$_POST['longitudinal'];
    		$longitudinal1=@$_POST['longitudinal1'];
    		$transversal=@$_POST['transversal'];    		
    		$transversal1=@$_POST['transversal1'];
    		$anteroposterior=@$_POST['anteroposterior'];
    		$anteroposterior1=@$_POST['anteroposterior1'];
    		$volumen=@$_POST['volumen'];
    		$volumen1=@$_POST['volumen1'];
    		$hallazgos=@$_POST['hallazgos'];    		
    		$diagnosticos=@$_POST['diagnosticos'];
    		$sugerencias=@$_POST['sugerencias'];
				$data2=array(
				'ovderecho' => $ovderecho,
				'ovizquierdo' => $ovizquierdo,
				'caracteristicas' => $caracteristicas,				
				'caracteristicas1' => $caracteristicas1,
				'longitudinal' => $longitudinal,
				'longitudinal1' => $longitudinal1,
				'transversal' => $transversal,
				'transversal1' => $transversal1,
				'anteroposterior' => $anteroposterior,
				'anteroposterior1' => $anteroposterior1,
				'volumen' => $volumen,				
				'volumen1' => $volumen1,
				'hallazgos' => $hallazgos,
				'diagnosticos' => $diagnosticos,
				'sugerencias' => $sugerencias,
				);
    		$temp=$this->dash->actualiza_UsGinecologico($data,$id_us_ginecologico_1,'us_ginecologico_1');
    		$temp2=$this->dash->actualiza_UsGinecologico($data2,$id_us_ginecologico_1,'us_ginecologico_2');
				
    		if($temp != NULL & $temp2 != NULL ){
				$retorna["resultado"]="si";	
				}
				else{
					$retorna["resultado"]="no";
				}
					echo json_encode($retorna);	
      }
  }
 ///////////////////////PRIMER TRIMESTRE///////////////////////////////////////////////////////
 	function LisPrimerTrimestre($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Eco Primer Trimestre";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/PrimerTrimestre/LisPrimerTrimestre'; 
		  	$data['datos']	= $this->dash->LisPrimerTrimestre($id)->result_array();				 
        $this->load->view('base_template/base',$data);	
      }
  }
	function PrimerTrimestre($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
				$autoid=$this->dash->GetAutoincrement('primer_trimestre_1','obstetri_admin')->result_array();
				$id_primer_trimestre_1=$autoid[0]['Auto_increment'];				
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Eco Primer Trimestre";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/PrimerTrimestre/PrimerTrimestre'; 
				$data['tratante']	= $this->dash->list_tratante()->result_array();		 
				$data['numerocon']=$id_primer_trimestre_1;
        $this->load->view('base_template/base',$data);	
      }
  }
 	function reg_PrimerTrimestre()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{
 				
    		$id_primer_trimestre_1=@$_POST['id_primer_trimestre_1'];
    		$id_paciente=@$_POST['id_paciente'];
    		$nfetos=@$_POST['nfetos'];
    		$efetal=@$_POST['efetal'];
    		$svfetales=@$_POST['svfetales'];
    		$lcr=@$_POST['lcr'];
    		$bipariental=@$_POST['bipariental'];
    		$ccefalica=@$_POST['ccefalica'];    		
    		$humero=@$_POST['humero'];
    		$cordon=@$_POST['cordon'];
    		$corionicidad=@$_POST['corionicidad'];
    		$cabdominal=@$_POST['cabdominal'];
    		$famniocorial=@$_POST['famniocorial'];
    		$femur=@$_POST['femur'];    		
    		$vvitelina=@$_POST['vvitelina'];
    		$pfe=@$_POST['pfe'];
    		$nbiometrica=@$_POST['nbiometrica'];
    		$paridad=@$_POST['paridad'];	
    		$tratante=@$_POST['tratante'];
    		$sonda=@$_POST['sonda'];    		
    		$estudio=@$_POST['estudio'];
    		$comentarios=@$_POST['comentarios'];
				$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
				$data1=array(
				'id_paciente' => $id_paciente,
				'nfetos' => $nfetos,
				'efetal' => $efetal,				
				'svfetales' => $svfetales,
				'lcr' => $lcr,
				'bipariental' => $bipariental,
				'ccefalica' => $ccefalica,
				'humero' => $humero,
				'cordon' => $cordon,
				'corionicidad' => $corionicidad,
				'cabdominal' => $cabdominal,				
				'famniocorial' => $famniocorial,
				'femur' => $femur,
				'vvitelina' => $vvitelina,
				'pfe' => $pfe,
				'nbiometrica' => $nbiometrica,
				'paridad' => $paridad,
				'tratante' => $tratante,
				'sonda' => $sonda,
				'estudio' => $estudio,
				'comentarios' => $comentarios,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
		    $temp1=$this->dash->insert_PrimerTrimestre($data1,'primer_trimestre_1');
    		//$temp2=$this->dash->insert_PrimerTrimestre($data2,'primer_trimestre_2');
    		//$temp3=$this->dash->insert_PrimerTrimestre($data3,'primer_trimestre_3');
    		//$temp4=$this->dash->insert_PrimerTrimestre($data4,'primer_trimestre_4');
				
    		//if($temp1 != NULL & $temp2 != NULL & $temp3 != NULL & $temp4 != NULL ){
					if($temp1 != NULL){
						$this->session->set_flashdata('success', "Eco Primer Trimestre Registrado con exito!!!");
						header('location:'.base_url().'consulta/LisPrimerTrimestre/'.$id_paciente);
				}
	}

	}
 
 	
/////////////////LISTA DE Eco Obstetrico///////////////////////////////////////

	function LisEcoObst($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Eco Obst&eacute;trico";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/EcoObst/LisEcoObst'; 
		  	$data['datos']	= $this->dash->LisEcoObst($id)->result_array();				 
        $this->load->view('base_template/base',$data);	
      }
  }
	function EcoObst($id)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
				$autoid=$this->dash->GetAutoincrement('eco_obstetrico_1','obstetri_admin')->result_array();
				$id_eco_obstetrico_1=$autoid[0]['Auto_increment'];				
    		$ref=$this->dash->PacientesG($id);
				$data['id'] = $ref; 		
    	  $data['titulo']="Gesti&oacute;n de Consultas";
    	  $data['titulo2']="Listado Eco Obst&eacute;trico";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=2;
				$data['main'] = 'consulta/pacientes/EcoObst/EcoObst'; 
				$data['tratante']	= $this->dash->list_tratante()->result_array();		 
				$data['numerocon']=$id_eco_obstetrico_1;
        $this->load->view('base_template/base',$data);	
      }
  }
	function reg_EcoObst()
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else{
 				$paridad=@$_POST['paridad'];	
    		$tratante=@$_POST['tratante'];
    		$sonda=@$_POST['sonda'];    		
    		$estudio=@$_POST['estudio'];
    		$comentarios=@$_POST['comentarios'];
				$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$id_paciente=@$_POST['id_paciente'];	
    		$id_eco_obstetrico_1=@$_POST['id_eco_obstetrico_1'];
    		$notas=@$_POST['notas'];    		
    		$nfetos=@$_POST['nfetos'];
    		$efetal=@$_POST['efetal'];
    		$svfetales=@$_POST['svfetales'];
    		$fcfetal=@$_POST['fcfetal'];
    		$lamniotico=@$_POST['lamniotico'];
    		$mrespiratorio=@$_POST['mrespiratorio'];    		
    		$placentacion=@$_POST['placentacion'];
    		$cordon=@$_POST['cordon'];
    		$corionicidad=@$_POST['corionicidad'];
    		$tono=@$_POST['tono'];
    		$liquido=@$_POST['liquido'];
    		$previa=@$_POST['previa'];    		
    		$pbfetal=@$_POST['pbfetal'];
    		$grado=@$_POST['grado'];
				$data1=array(
				'id_paciente' => $id_paciente,
				'notas' => $notas,
				'nfetos' => $nfetos,
				'efetal' => $efetal,				
				'svfetales' => $svfetales,
				'fcfetal' => $fcfetal,
				'lamniotico' => $lamniotico,
				'mrespiratorio' => $mrespiratorio,
				'placentacion' => $placentacion,
				'cordon' => $cordon,
				'corionicidad' => $corionicidad,
				'tono' => $tono,				
				'liquido' => $liquido,
				'previa' => $previa,
				'pbfetal' => $pbfetal,
				'grado' => $grado,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				'paridad' => $paridad,
				'tratante' => $tratante,
				'sonda' => $sonda,
				'estudio' => $estudio,
				'comentarios' => $comentarios,
				);	
				$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$id_paciente=@$_POST['id_paciente'];	
    		$notas2=@$_POST['notas2'];    		
    		$biparietal=@$_POST['biparietal'];
    		$craneo=@$_POST['craneo'];
    		$estomago=@$_POST['estomago'];
    		$ccefalica=@$_POST['ccefalica'];
    		$orbitas=@$_POST['orbitas'];
    		$pabdominal=@$_POST['pabdominal'];    		
    		$circunferencia=@$_POST['circunferencia'];
    		$atrium=@$_POST['atrium'];
    		$higado=@$_POST['higado'];
    		$femur=@$_POST['femur'];
    		$cerebelo=@$_POST['cerebelo'];
    		$bazo=@$_POST['bazo'];    		
    		$humero=@$_POST['humero'];
    		$vbiliar=@$_POST['vbiliar'];
    		$cubito=@$_POST['cubito'];
    		$pfetal=@$_POST['pfetal'];
    		$intestinos=@$_POST['intestinos'];
    		$tibia=@$_POST['tibia'];
    		$pnucal=@$_POST['pnucal'];
    		$rinones=@$_POST['rinones'];    		
    		$hnasales=@$_POST['hnasales'];
    		$rostro=@$_POST['rostro'];
    		$vejiga=@$_POST['vejiga'];
    		$pfestimado=@$_POST['pfestimado'];
    		$genitales=@$_POST['genitales'];
    		$corazon=@$_POST['corazon'];    		
    		$cvertebral=@$_POST['cvertebral'];
    		$secardiaco=@$_POST['secardiaco'];
    		$sacro=@$_POST['sacro'];
    		$cgvasos=@$_POST['cgvasos'];
    		$miembros=@$_POST['miembros'];
    		$diafragma=@$_POST['diafragma'];
    		$piemano=@$_POST['piemano'];
				$data2=array(
				'id_eco_obstetrico_1' => $id_eco_obstetrico_1,
				'notas2' => $notas2,
				'biparietal' => $biparietal,
				'craneo' => $craneo,				
				'estomago' => $estomago,
				'ccefalica' => $ccefalica,
				'orbitas' => $orbitas,
				'pabdominal' => $pabdominal,
				'circunferencia' => $circunferencia,
				'atrium' => $atrium,
				'higado' => $higado,
				'femur' => $femur,				
				'cerebelo' => $cerebelo,
				'bazo' => $bazo,
				'humero' => $humero,
				'vbiliar' => $vbiliar,
				'cubito' => $cubito,
				'pfetal' => $pfetal,				
				'intestinos' => $intestinos,
				'tibia' => $tibia,
				'pnucal' => $pnucal,
				'rinones' => $rinones,
				'hnasales' => $hnasales,
				'rostro' => $rostro,
				'vejiga' => $vejiga,
				'pfestimado' => $pfestimado,				
				'genitales' => $genitales,
				'corazon' => $corazon,
				'cvertebral' => $cvertebral,
				'secardiaco' => $secardiaco,
				'sacro' => $sacro,
				'cgvasos' => $cgvasos,				
				'miembros' => $miembros,
				'diafragma' => $diafragma,
				'piemano' => $piemano,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
				$fe_create=date('Y-m-d');
				$fe_update=date('Y-m-d H:i:s');
    		$sdcerebral=@$_POST['sdcerebral'];
    		$sduterina=@$_POST['sduterina'];
    		$ipcerebral=@$_POST['ipcerebral'];
    		$iputerina=@$_POST['iputerina'];
    		$ircerebral=@$_POST['ircerebral'];    		
    		$iruterina=@$_POST['iruterina'];
    		$pccerebral=@$_POST['pccerebral'];
    		$sdcordon=@$_POST['sdcordon'];
    		$sduterinade=@$_POST['sduterinade'];
    		$ipcordon=@$_POST['ipcordon'];
    		$iputerinade=@$_POST['iputerinade'];    		
    		$ircordon=@$_POST['ircordon'];
    		$notas3=@$_POST['notas3'];
				$data3=array(
				'id_eco_obstetrico_1' => $id_eco_obstetrico_1,
				'sdcerebral' => $sdcerebral,				
				'sduterina' => $sduterina,
				'ipcerebral' => $ipcerebral,
				'iputerina' => $iputerina,
				'ircerebral' => $ircerebral,
				'iruterina' => $iruterina,
				'pccerebral' => $pccerebral,
				'sdcordon' => $sdcordon,
				'sduterinade' => $sduterinade,				
				'ipcordon' => $ipcordon,
				'iputerinade' => $iputerinade,
				'ircordon' => $ircordon,
				'notas3' => $notas3,				
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
				$plnucal=@$_POST['plnucal'];
    		$atrium2=@$_POST['atrium2'];
    		$huesosnasales2=@$_POST['huesosnasales2'];
    		$duptus=@$_POST['duptus'];    		
    		$tris=@$_POST['tris'];
    		$diagnosticos=@$_POST['diagnosticos'];
    		$sugerencias=@$_POST['sugerencias'];
				$data4=array(
				'id_eco_obstetrico_1' => $id_eco_obstetrico_1,
				'plnucal' => $plnucal,
				'atrium2' => $atrium2,				
				'huesosnasales2' => $huesosnasales2,
				'duptus' => $duptus,
				'tris' => $tris,
				'diagnosticos' => $diagnosticos,
				'sugerencias' => $sugerencias,
				'fe_create' => $fe_create,
				'fe_update' => $fe_update,
				);
		    $temp1=$this->dash->insert_ecoObstetrico($data1,'eco_obstetrico_1');
    		$temp2=$this->dash->insert_ecoObstetrico($data2,'eco_obstetrico_2');
    		$temp3=$this->dash->insert_ecoObstetrico($data3,'eco_obstetrico_3');
    		$temp4=$this->dash->insert_ecoObstetrico($data4,'eco_obstetrico_4');
				
    		if($temp1 != NULL & $temp2 != NULL & $temp3 != NULL & $temp4 != NULL ){
						$this->session->set_flashdata('success', "Eco Obstetrico Registrado con exito!!!");
						header('location:'.base_url().'consulta/LisEcoObst/'.$id_paciente);
				}
	}

  }
 /////////////////////////////////////////////////////////	 
//////aseguradoras///////////////////////////////
	function aseguradora($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="Aseguradoras";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
		  	$data['datos']	= $this->dash->list_aseguradoras()->result_array();
				$data['main'] = 'consulta/aseguradora/aseguradora';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_aseguradora()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="Aseguradoras";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/aseguradora/reg_aseguradora';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_seguros($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$aseguradora = addslashes($_POST['aseguradora']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('seguros' => $aseguradora,'updated' => $datetime);
        $temp = $this->dash->reg_insert_aseguradora($data);
			if($temp != NULL){
						header('location:'.base_url().'consulta/aseguradora/1');
				}
				else{
				$data['titulo']="Tablas";
    	  $data['titulo2']="aseguradoras de Productos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/aseguradora/reg_aseguradora';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_aseguradora($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->dash->aseguradoraEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Tablas";
    	  $data['titulo2']="Aseguradoras";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/aseguradora/editar_aseguradora';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_aseguradora($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_seguros = addslashes($_POST['id_seguros']);
			$seguros=addslashes($_POST['seguros']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('seguros' => $seguros,'updated' => $datetime);
        $temp = $this->dash->aseguradora_update($data,$id_seguros);
			if($temp != NULL){
						header('location:'.base_url().'consulta/aseguradora/1');
						echo $temp;
				}
				else{
   			$ref=$this->dash->aseguradoraEdit($id_seguros);
				$data['id'] = $ref; 					
    		$data['titulo']="Tablas";
    	  $data['titulo2']="Aseguradoras";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/aseguradora/editar_aseguradora';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_seguro(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->dash->eliminar_seguro($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}
 /////////////////////////////////////////////////////////	 
//////anticonceptivoss///////////////////////////////
	function anticonceptivos($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="anticonceptivoss";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
		  	$data['datos']	= $this->dash->list_anticonceptivos()->result_array();
				$data['main'] = 'consulta/anticonceptivos/anticonceptivos';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_anticonceptivos()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="anticonceptivoss";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/anticonceptivos/reg_anticonceptivos';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_anticonceptivos($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$anticonceptivos = addslashes($_POST['anticonceptivos']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('anticonceptivos' => $anticonceptivos,'updated' => $datetime);
        $temp = $this->dash->reg_insert_anticonceptivos($data);
			if($temp != NULL){
						header('location:'.base_url().'consulta/anticonceptivos/1');
				}
				else{
				$data['titulo']="Tablas";
    	  $data['titulo2']="anticonceptivoss de Productos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/anticonceptivos/reg_anticonceptivos';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_anticonceptivos($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->dash->anticonceptivosEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Tablas";
    	  $data['titulo2']="anticonceptivoss";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/anticonceptivos/editar_anticonceptivos';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_anticonceptivos($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_anticonceptivos = addslashes($_POST['id_anticonceptivos']);
			$anticonceptivos=addslashes($_POST['anticonceptivos']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('anticonceptivos' => $anticonceptivos,'updated' => $datetime);
        $temp = $this->dash->anticonceptivos_update($data,$id_anticonceptivos);
			if($temp != NULL){
						header('location:'.base_url().'consulta/anticonceptivos/1');
						echo $temp;
				}
				else{
   			$ref=$this->dash->anticonceptivosEdit($id_anticonceptivos);
				$data['id'] = $ref; 					
    		$data['titulo']="Tablas";
    	  $data['titulo2']="anticonceptivoss";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/anticonceptivos/editar_anticonceptivos';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_anticonceptivos(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->dash->eliminar_anticonceptivos($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}	
 /////////////////////////////////////////////////////////	 
//////drogas///////////////////////////////
	function drogas($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="drogas";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
		  	$data['datos']	= $this->dash->list_drogas()->result_array();
				$data['main'] = 'consulta/drogas/drogas';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_drogas()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="drogas";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/drogas/reg_drogas';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_drogas($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$drogas = addslashes($_POST['drogas']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('drogas' => $drogas,'updated' => $datetime);
        $temp = $this->dash->reg_insert_drogas($data);
			if($temp != NULL){
						header('location:'.base_url().'consulta/drogas/1');
				}
				else{
				$data['titulo']="Tablas";
    	  $data['titulo2']="drogas";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/drogas/reg_drogas';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_drogas($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->dash->drogasEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Tablas";
    	  $data['titulo2']="drogas";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/drogas/editar_drogas';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_drogas($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_drogas = addslashes($_POST['id_drogas']);
			$drogas=addslashes($_POST['drogas']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('drogas' => $drogas,'updated' => $datetime);
        $temp = $this->dash->drogas_update($data,$id_drogas);
			if($temp != NULL){
						header('location:'.base_url().'consulta/drogas/1');
						echo $temp;
				}
				else{
   			$ref=$this->dash->drogasEdit($id_drogas);
				$data['id'] = $ref; 					
    		$data['titulo']="Tablas";
    	  $data['titulo2']="drogas";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/drogas/editar_drogas';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_drogas(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->dash->eliminar_drogas($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}	
//////tratante///////////////////////////////
	function tratante($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="tratante";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
		  	$data['datos']	= $this->dash->list_tratante()->result_array();
				$data['main'] = 'consulta/tratante/tratante';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_tratante()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Tablas";
    	  $data['titulo2']="tratante";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/tratante/reg_tratante';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_tratante($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$tratante = addslashes($_POST['tratante']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('tratante' => $tratante,'updated' => $datetime);
        $temp = $this->dash->reg_insert_tratante($data);
			if($temp != NULL){
						header('location:'.base_url().'consulta/tratante/1');
				}
				else{
				$data['titulo']="Tablas";
    	  $data['titulo2']="tratante";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/tratante/reg_tratante';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_tratante($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->dash->tratanteEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Tablas";
    	  $data['titulo2']="tratante";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;			
				$data['main'] = 'consulta/tratante/editar_tratante';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_tratante($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_tratante = addslashes($_POST['id_tratante']);
			$tratante=addslashes($_POST['tratante']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('tratante' => $tratante,'updated' => $datetime);
        $temp = $this->dash->tratante_update($data,$id_tratante);
			if($temp != NULL){
						header('location:'.base_url().'consulta/tratante/1');
						echo $temp;
				}
				else{
   			$ref=$this->dash->tratanteEdit($id_tratante);
				$data['id'] = $ref; 					
    		$data['titulo']="Tablas";
    	  $data['titulo2']="tratante";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=3;
				$data['main'] 	= 'consulta/tratante/editar_tratante';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_tratante(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->dash->eliminar_tratante($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}	
//////////////////////////////////////////////////////////////////////////////////////	
// Modo de uso
	function add_recipej()
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
			$medicina=$_POST['medicina'];
			$id_consultag=$_POST['id_consultag'];
			$concentracion=$_POST['concentracion'];
			$presentacion=$_POST['presentacion'];
			$horario=$_POST['horario'];
			$duracion=$_POST['duracion'];
			$nota_recipe=$_POST['nota_recipe'];
			$descargar=$_POST['descargar'];
			$data=array('id_consultag' => $id_consultag,'medicina' => $medicina,'presentacion' => $presentacion,'concentracion' => $concentracion,'horario' => $horario,'duracion' => $duracion,'descargar' => $descargar,'nota_recipe' => $nota_recipe);
			$temp = $this->dash->reg_insert_recipej($data);
			 $ref=$this->farmacia->medicinaEdit($medicina);
			if($temp != NULL){
						$resultado=1;$retorna['id_recipe']=$temp;
				}
			else {$resultado=0;}
			$retorna['resultado']=$resultado;
			$retorna['nombre']=$ref[0]['medicina'];
			echo json_encode($retorna);
    }
  }
  function eliminar_recipe(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->dash->eliminar_recipe($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}
}