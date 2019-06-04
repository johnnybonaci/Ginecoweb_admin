<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Gestion_model','dash');
		$this->load->library(array('session','form_validation'));	
	}

  public function index($mess = 2)
  {
    	if(!$this->session->userdata('username')){
			$data['main'] 	= 'user/login';
			$data['message'] 	= $mess;
			$this->load->view('base_template/login_base',$data);
		}
		else{
			
			redirect('user/listado', 'listado');
		}
  }
	function login()
	{
		if($_POST){
			$usuario = addslashes($_POST['username']);
			$clave = addslashes($_POST['password']);
			$password=sha1($clave);
			$temp = $this->dash->GetUser($usuario,$password)->result_array();
			if($temp != NULL){
				$dat = array(
					'username' => $temp[0]['usuario'],
					'id' => $temp[0]['id'],
				);
				$this->session->set_userdata($dat);
				redirect('user/listado', 'listado');
		}
			else
			{
				$this->session->set_flashdata('error', "Usuario y/o Contrase&ntilde;a Incorrectos");
				$data['main'] 	= 'user/login';
				$this->load->view('base_template/login_base',$data);
			}
			
		}
			else{
				$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
				$data['main'] 	= 'user/login';
				$this->load->view('base_template/login_base',$data);
			}
	}
/////////////usuarios/////////7

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

	function register()
	{    		
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
    	  $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Registro de Usuarios";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=1;
				$data['main'] = 'user/usuarios/register';  

			$this->load->view('base_template/base',$data);
		}
	}
	function editar_usuarios($id)
	{ 
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {   

    	$ref=$this->dash->UsuarioEdit($id);
				$data['id'] = $ref; 
    	  $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Editar Usuarios";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=1;			
				$data['main'] = 'user/usuarios/editar_usuarios';		    

			$this->load->view('base_template/base',$data);
		}
	}	

	function listado($mess = 2)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {	
		
    	  $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Lista de Usuarios";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=1;
		  	$data['datos']	= $this->dash->list_user()->result_array();
				$data['main'] = 'user/usuarios/listado';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
      }
  }
	function update_user($mess = 1)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
			$nombre = addslashes($_POST['nombre']);
			$apellido=addslashes($_POST['fullname']);;
			$email = addslashes($_POST['email']);
			$usuario = addslashes($_POST['username']);
			$date=date('Y-m-d H:i:s');
			$activo=addslashes($_POST['estado']);;
			$id=addslashes($_POST['id']);;
			$data = array(
        'usuario' => $usuario,
        'email' => $email,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'activo' => $activo,
        'fe_update' => $date,
         );
        $temp = $this->dash->reg_update($data,$id);
			if($temp != NULL){
						header('location:'.base_url().'user/listado/1');
						echo $temp;
				}
				else{
				$data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Actualizar Usuarios";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-users";    	  
    	  $data['activeTab']=1;
				$data['main'] 	= 'user/usuarios/editar_usuarios';
				$data['message'] 	= 0;
			$this->load->view('base_template/base',$data);	
				}			
		}
	}
	function logout()
	{
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('admin');
		redirect('user/index', 'index');
	}	
 /////////////////////////////////////////////////////////	
	 /////////////////////////////////////////////////////////	
//////clientes///////////////////////////////	
	
	function clientes($mess = 2)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
    	  $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Lista de Clientes Suscritos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-list";
    	  $data['activeTab']=1;
		  	$data['datos']	= $this->dash->list_clientes()->result_array();
				$data['main'] = 'user/clientes/clientes';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
 	 }	
	}
	function correos($mess = 2)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
    	  $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Lista de Correos Semanales";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-list";
    	  $data['activeTab']=1;
		  	$data['datos']	= $this->dash->list_correos()->result_array();
				$data['main'] = 'user/correos/correos';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
 	 }	
	}
		function reg_correo()
	{    
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
		    $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Registro de Correos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-plus-circle";
    	  $data['activeTab']=1;
				$data['main'] = 'user/correos/reg_correo';
				$data['datos'] = $this->dash->list_semanas()->result_array();

			$this->load->view('base_template/base',$data);
		}
	}	
	function add_correo($mess = 1)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
		$this->form_validation->set_rules('semana', 'Semanas', 'is_unique[correos.semanas]',array('is_unique'=>'Ya existe una Semana igual registrada'));
		  if ($this->form_validation->run() == FALSE)
      {

		    $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Registro de Correos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-plus-circle";
    	  $data['activeTab']=1;
				$data['main'] = 'user/correos/reg_correo';
				$data['datos'] = $this->dash->list_semanas()->result_array();
				$this->load->view('base_template/base',$data);	
			}
			else{
		
			$semana = addslashes($_POST['semana']);
			$descripcion=addslashes($_POST['descripcion']);;
			$correo=$_POST['correo'];
			$data = array(
        'semanas' => $semana,
        'correo' => $correo,
        'descripcion' => $descripcion);
        $temp = $this->dash->reg_correos($data);
			if($temp != NULL){
						header('location:'.base_url().'user/correos/1');
				}		
		}
	}
}
		function editar_correos($id)
	{    
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
    	$ref=$this->dash->CorreoEdit($id);
    	  $data['titulo']="Gesti&oacute;n de Usuarios";
    	  $data['titulo2']="Editar Correos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-edit";
    	  $data['activeTab']=1;
				$data['id'] = $ref; 
				$data['main'] = 'user/correos/editar_correos';
				$data['datos'] = $this->dash->list_semanas()->result_array();
						    

			$this->load->view('base_template/base',$data);
		}
	}
		function update_correo($mess = 1)
	{
		if(!$this->session->userdata('username')){
		$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
		$data['main'] 	= 'user/login';
		$this->load->view('base_template/login_base',$data);
	}
	else {
			$semana = addslashes($_POST['semana']);
			$id = addslashes($_POST['id']);
			$descripcion=addslashes($_POST['descripcion']);;
			$correo=$_POST['correo'];
			$data = array(
        'semanas' => $semana,
        'correo' => $correo,
        'descripcion' => $descripcion);
        $temp = $this->dash->update_correos($data,$id);
			if($temp != NULL){
						header('location:'.base_url().'user/correos/1');
				}		
		}
	}	
}


/* End of file user.php */
/* Location: ./application/controllers/user.php */