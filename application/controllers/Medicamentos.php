<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");


class Medicamentos extends CI_Controller {
  public $db_medicina;

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->db_medicina = $this->load->database('medicina', true);
		$this->load->model('Medicamentos_model','farmacia');
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
			
			redirect('medicamentos/medicina', 'medicina');
		}
  }



 /////////////////////////////////////////////////////////	 
//////medicina///////////////////////////////
	function medicina($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
		  	$data['datos']	= $this->farmacia->list_medicina()->result_array();
				$data['main'] = 'medicamentos/medicina/medicina';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_medicina()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/medicina/reg_medicina';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_medicina($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$medicina = addslashes($_POST['medicina']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('medicina' => $medicina,'updated' => $datetime);
        $temp = $this->farmacia->reg_insert_medicina($data);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/medicina/1');
				}
				else{
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="medicina de Productos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/medicina/reg_medicina';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_medicina($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->farmacia->medicinaEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/medicina/editar_medicina';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_medicina($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_medicina = addslashes($_POST['id_medicina']);
			$medicina=addslashes($_POST['medicina']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('medicina' => $medicina,'updated' => $datetime);
        $temp = $this->farmacia->medicina_update($data,$id_medicina);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/medicina/1');
						echo $temp;
				}
				else{
   			$ref=$this->farmacia->medicinaEdit($id_medicina);
				$data['id'] = $ref; 					
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/medicina/editar_medicina';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_medicina(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->farmacia->eliminar_medicina($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}		
 /////////////////////////////////////////////////////////	 
//////presentacion///////////////////////////////
	function presentacion($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
		  	$data['datos']	= $this->farmacia->list_presentacion()->result_array();
				$data['main'] = 'medicamentos/presentacion/presentacion';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_presentacion()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/presentacion/reg_presentacion';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_presentacion($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$presentacion = addslashes($_POST['presentacion']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('presentacion' => $presentacion,'updated' => $datetime);
        $temp = $this->farmacia->reg_insert_presentacion($data);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/presentacion/1');
				}
				else{
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="presentacion de Productos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/presentacion/reg_presentacion';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_presentacion($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->farmacia->presentacionEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/presentacion/editar_presentacion';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_presentacion($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_presentacion = addslashes($_POST['id_presentacion']);
			$presentacion=addslashes($_POST['presentacion']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('presentacion' => $presentacion,'updated' => $datetime);
        $temp = $this->farmacia->presentacion_update($data,$id_presentacion);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/presentacion/1');
						echo $temp;
				}
				else{
   			$ref=$this->farmacia->presentacionEdit($id_presentacion);
				$data['id'] = $ref; 					
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/presentacion/editar_presentacion';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_presentacion(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->farmacia->eliminar_presentacion($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}	
 /////////////////////////////////////////////////////////	 
//////concentracion///////////////////////////////
	function concentracion($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
		  	$data['datos']	= $this->farmacia->list_concentracion()->result_array();
				$data['main'] = 'medicamentos/concentracion/concentracion';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_concentracion()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/concentracion/reg_concentracion';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_concentracion($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$concentracion = addslashes($_POST['concentracion']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('concentracion' => $concentracion,'updated' => $datetime);
        $temp = $this->farmacia->reg_insert_concentracion($data);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/concentracion/1');
				}
				else{
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="concentracion de Productos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/concentracion/reg_concentracion';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_concentracion($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->farmacia->concentracionEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/concentracion/editar_concentracion';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_concentracion($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_concentracion = addslashes($_POST['id_concentracion']);
			$concentracion=addslashes($_POST['concentracion']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('concentracion' => $concentracion,'updated' => $datetime);
        $temp = $this->farmacia->concentracion_update($data,$id_concentracion);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/concentracion/1');
						echo $temp;
				}
				else{
   			$ref=$this->farmacia->concentracionEdit($id_concentracion);
				$data['id'] = $ref; 					
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/concentracion/editar_concentracion';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_concentracion(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->farmacia->eliminar_concentracion($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}	
 /////////////////////////////////////////////////////////	 
//////horario///////////////////////////////
	function horario($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
		  	$data['datos']	= $this->farmacia->list_horario()->result_array();
				$data['main'] = 'medicamentos/horario/horario';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_horario()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/horario/reg_horario';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_horario($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$horario = addslashes($_POST['horario']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('horario' => $horario,'updated' => $datetime);
        $temp = $this->farmacia->reg_insert_horario($data);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/horario/1');
				}
				else{
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="horario de Productos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/horario/reg_horario';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_horario($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->farmacia->horarioEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/horario/editar_horario';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_horario($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_horario = addslashes($_POST['id_horario']);
			$horario=addslashes($_POST['horario']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('horario' => $horario,'updated' => $datetime);
        $temp = $this->farmacia->horario_update($data,$id_horario);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/horario/1');
						echo $temp;
				}
				else{
   			$ref=$this->farmacia->horarioEdit($id_horario);
				$data['id'] = $ref; 					
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/horario/editar_horario';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_horario(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->farmacia->eliminar_horario($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}	
 /////////////////////////////////////////////////////////	 
//////duracion///////////////////////////////
	function duracion($mess = 2)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
    else
    {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
		  	$data['datos']	= $this->farmacia->list_duracion()->result_array();
				$data['main'] = 'medicamentos/duracion/duracion';
				$data['message'] 	= $mess;
        $this->load->view('base_template/base',$data);	
    }
  }
	function reg_duracion()
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
     else {
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/duracion/reg_duracion';
			$this->load->view('base_template/base',$data);
		}
	}	 
	function add_duracion($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}		
 else {
			$duracion = addslashes($_POST['duracion']);
			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			$data = array('duracion' => $duracion,'updated' => $datetime);
        $temp = $this->farmacia->reg_insert_duracion($data);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/duracion/1');
				}
				else{
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="duracion de Productos";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/duracion/reg_duracion';
			$this->load->view('base_template/base',$data);				
			}
		}
	}	 
	function editar_duracion($id)
	{    
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}	 else {
    		$ref=$this->farmacia->duracionEdit($id);
				$data['id'] = $ref; 
				$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;			
				$data['main'] = 'medicamentos/duracion/editar_duracion';		    

			$this->load->view('base_template/base',$data);
		}
	}			
	function update_duracion($mess = 1)
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata('error', "Debe iniciar sesi&oacute;n");
			$data['main'] 	= 'user/login';
			$this->load->view('base_template/login_base',$data);
		}
 else {
			$id_duracion = addslashes($_POST['id_duracion']);
			$duracion=addslashes($_POST['duracion']);;
			$datetime=date('Y-m-d H:i:s');
			$data = array('duracion' => $duracion,'updated' => $datetime);
        $temp = $this->farmacia->duracion_update($data,$id_duracion);
			if($temp != NULL){
						header('location:'.base_url().'medicamentos/duracion/1');
						echo $temp;
				}
				else{
   			$ref=$this->farmacia->duracionEdit($id_duracion);
				$data['id'] = $ref; 					
    		$data['titulo']="Medicamentos";
    	  $data['titulo2']="Farmacia";
    	  $data['icono']="fa fa-user";
    	  $data['icono2']="fa fa-credit-card";
    		$data['activeTab']=4;
				$data['main'] 	= 'medicamentos/duracion/editar_duracion';
				$data['message'] 	= 0;
				$this->load->view('base_template/base',$data);				
			}
		}
	}
	function eliminar_duracion(){
	$codigo=$_REQUEST['numero'];
	$temp=$this->farmacia->eliminar_duracion($codigo);
	if(!$temp){$retorna['resultado']="si";}else {$retorna['resultado']="no";}
	echo json_encode($retorna);
	}	
//////////////////////////////////////////////////////////////////////////////////////	
// Modo de uso	
}