<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	  $this->load->database();
	}	
	function update_clave($data,$id){
	$this->db->where('id', $id);
	$insert=$this->db->update('usuarios', $data);
	return $insert;	
	}
}

?>