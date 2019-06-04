<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

	function __construct()
	{
		parent::__construct();

    $this->load->helper(array('form', 'url'));
		$this->load->model('perfil_model','perfil');
		$this->load->library(array('session','form_validation'));	
	}

    public function index($mess = 2)
    {
	    	if($this->session->userdata('username')){
	    	$array_items = array('success', 'error');$this->destroyed($array_items);
				$data = array('titulo' => 'Mi Perfil','titulo2' => 'Cambio de Clave','icono' => 'fa fa-users','icono2' => 'fa fa-key','activeTab' => 0,'message' => 0,'main' => 'perfil/perfil/perfil.php');
				$this->load->view('base_template/base',$data);
			}
			else{
				
				redirect('user/home', 'home');
			}
    }
		public function form()
		{
			$array_items = array('success', 'error');$this->destroyed($array_items);
      $this->form_validation->set_rules('pass', '', 'required',array('required' => 'Introduzca una Clave!! '));
      $this->form_validation->set_rules('pass2', '', 'required|matches[pass]',array('required' => 'Introduzca una Clave!!','matches' => 'Las Claves deben ser iguales!'));
   		$data = array('titulo' => 'Mi Perfil','titulo2' => 'Cambio de Clave','icono' => 'fa fa-users','icono2' => 'fa fa-key','activeTab' => 0,'message' => 0,'main' => 'perfil/perfil/perfil.php');
      if ($this->form_validation->run() == FALSE)
      {
			$this->load->view('base_template/base',$data);
			}
			else
			{
				$pass = addslashes($_POST['pass']);
				$clave=sha1($pass);
				$date=date('Y-m-d H:i:s');
				$id=$this->session->userdata('id');
				$datos = array('clave' => $clave,'fe_update' => $date,);
				$temp=$this->perfil->update_clave($datos,$id);
				if($temp != NULL){
					$this->session->set_flashdata('success', "La Contrase&ntilde;a ha sido Actualizada");
					$this->load->view('base_template/base',$data);
				}
				else{
					$this->session->set_flashdata('error', "La Contrase&ntilde;a no ha sido Actualizada");
					$this->load->view('base_template/base',$data);
				}
			}
		}
		public function destroyed($data){
	    	$this->session->unset_userdata($data);
	  }
}


/* End of file user.php */
/* Location: ./application/controllers/user.php */