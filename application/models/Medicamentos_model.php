<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamentos_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	  $this->load->database();
	}
	
	
/**************medicina********************************/	
	function list_medicina(){
		$this->db_medicina->select('*');
		$this->db_medicina->from('medicina');
		$this->db_medicina->order_by('updated', 'desc');
	$query = $this->db_medicina->get('');
	return $query;
	}
	function reg_insert_medicina($data){
	
	$insert=$this->db_medicina->insert('medicina', $data);
	return $insert;
		
	}	
  public function medicinaEdit($id) {
    	$this->db_medicina->select('*');
			$this->db_medicina->from('medicina');
			$this->db_medicina->where('id_medicina', $id);
			$query = $this->db_medicina->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function medicina_update($data,$id){
	$this->db_medicina->where('id_medicina', $id);
	$insert=$this->db_medicina->update('medicina', $data);
	return $insert;	
	}
	public function eliminar_medicina($id){
			$tables = array('medicina');
			$this->db_medicina->where('id_medicina', $id);
			$que=$this->db_medicina->delete($tables);
			return $que;
	}	
/***************************************************/
/********************PRESENTACION*******************/
	function list_presentacion(){
		$this->db_medicina->select('*');
		$this->db_medicina->from('presentacion');
		$this->db_medicina->order_by('updated', 'desc');
	$query = $this->db_medicina->get('');
	return $query;
	}
	function reg_insert_presentacion($data){
	
	$insert=$this->db_medicina->insert('presentacion', $data);
	return $insert;
		
	}	
  public function presentacionEdit($id) {
    	$this->db_medicina->select('*');
			$this->db_medicina->from('presentacion');
			$this->db_medicina->where('id_presentacion', $id);
			$query = $this->db_medicina->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function presentacion_update($data,$id){
	$this->db_medicina->where('id_presentacion', $id);
	$insert=$this->db_medicina->update('presentacion', $data);
	return $insert;	
	}
	public function eliminar_presentacion($id){
			$tables = array('presentacion');
			$this->db_medicina->where('id_presentacion', $id);
			$que=$this->db_medicina->delete($tables);
			return $que;
	}
/********************concentracion*******************/
	function list_concentracion(){
		$this->db_medicina->select('*');
		$this->db_medicina->from('concentracion');
		$this->db_medicina->order_by('updated', 'desc');
	$query = $this->db_medicina->get('');
	return $query;
	}
	function reg_insert_concentracion($data){
	
	$insert=$this->db_medicina->insert('concentracion', $data);
	return $insert;
		
	}	
  public function concentracionEdit($id) {
    	$this->db_medicina->select('*');
			$this->db_medicina->from('concentracion');
			$this->db_medicina->where('id_concentracion', $id);
			$query = $this->db_medicina->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function concentracion_update($data,$id){
	$this->db_medicina->where('id_concentracion', $id);
	$insert=$this->db_medicina->update('concentracion', $data);
	return $insert;	
	}
	public function eliminar_concentracion($id){
			$tables = array('concentracion');
			$this->db_medicina->where('id_concentracion', $id);
			$que=$this->db_medicina->delete($tables);
			return $que;
	}	
/********************horario*******************/
	function list_horario(){
		$this->db_medicina->select('*');
		$this->db_medicina->from('horario');
		$this->db_medicina->order_by('updated', 'desc');
	$query = $this->db_medicina->get('');
	return $query;
	}
	function reg_insert_horario($data){
	
	$insert=$this->db_medicina->insert('horario', $data);
	return $insert;
		
	}	
  public function horarioEdit($id) {
    	$this->db_medicina->select('*');
			$this->db_medicina->from('horario');
			$this->db_medicina->where('id_horario', $id);
			$query = $this->db_medicina->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function horario_update($data,$id){
	$this->db_medicina->where('id_horario', $id);
	$insert=$this->db_medicina->update('horario', $data);
	return $insert;	
	}
	public function eliminar_horario($id){
			$tables = array('horario');
			$this->db_medicina->where('id_horario', $id);
			$que=$this->db_medicina->delete($tables);
			return $que;
	}	
/********************duracion*******************/
	function list_duracion(){
		$this->db_medicina->select('*');
		$this->db_medicina->from('duracion');
		$this->db_medicina->order_by('updated', 'desc');
	$query = $this->db_medicina->get('');
	return $query;
	}
	function reg_insert_duracion($data){
	
	$insert=$this->db_medicina->insert('duracion', $data);
	return $insert;
		
	}	
  public function duracionEdit($id) {
    	$this->db_medicina->select('*');
			$this->db_medicina->from('duracion');
			$this->db_medicina->where('id_duracion', $id);
			$query = $this->db_medicina->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function duracion_update($data,$id){
	$this->db_medicina->where('id_duracion', $id);
	$insert=$this->db_medicina->update('duracion', $data);
	return $insert;	
	}
	public function eliminar_duracion($id){
			$tables = array('duracion');
			$this->db_medicina->where('id_duracion', $id);
			$que=$this->db_medicina->delete($tables);
			return $que;
	}	
/***************************************************/

}
?>