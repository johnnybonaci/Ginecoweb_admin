<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	  $this->load->database();
	}	
	function actualizamesd($data,$id){
	$this->db->where('id_usuario', $id);
	$insert=$this->db->update('cumple', $data);
	return $insert;	
	}		
		public function CheckCorreo($correo) {
    	$this->db->select('*');
			$this->db->from('parto');
			$this->db->where('correo', $correo);
			$query = $this->db->get();
			 if($query->num_rows() > 0){
          return $query->result_array();
     }
   }
      public function otraf($correo,$nombre){
     	$query = $this->db->query("SELECT * FROM parto WHERE nombre='$nombre' and correo = '$correo'");
			return $query->num_rows();
     }
    	public function eliminar_registro($id){
			$tables = array('parto','cumple');
			$this->db->where('id_usuario', $id);
			$que=$this->db->delete($tables);
			return $que;
		}
	  public function GetMensaje($correo) {
    	$this->db->select('*');
			$this->db->from('correos');
			$this->db->where('semanas', $correo);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }
    function list_cumple(){
		$this->db->select('*');
		$this->db->from('parto');
		$this->db->join('cumple','parto.id_usuario=cumple.id_usuario','LEFT');
		$this->db->where('parto.de_baja', 0);
		$this->db->order_by('parto.fecha_creado', 'ASC');
		$query = $this->db->get('');
		return $query;
		}
	    function update_cumple($data,$id){
    	$this->db->where('id_usuario', $id);
			$insert=$this->db->update('cumple', $data);
			return $insert;	
		}	
     public function GetCorreo($correo) {
    	$this->db->select('*');
			$this->db->from('parto');
			$this->db->where('correo', $correo);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }
    public function GetCorreoid($id) {
    	$this->db->select('*');
			$this->db->from('parto');
			$this->db->where('id_usuario', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }
    function debaja($id){
    	$data = array('de_baja' => 1);
    	$this->db->where('id_usuario', $id);
			$insert=$this->db->update('parto', $data);
			return $insert;	
		}
	function GetUser($usuario,$clave)
	{
		return $this->db->query("SELECT * FROM usuarios Where usuario='$usuario' and clave='$clave';");
		
	}
	function GetAutoincrement($tabla,$bd)
	{
		return $this->db->query("SHOW TABLE STATUS FROM $bd LIKE '$tabla';");
		
	}
	function fechanew($h1){

  $nuevafecha1 = strtotime ($h1);
	$nuevafecha = date ( 'Y-m-d' , $nuevafecha1 );
	return $nuevafecha;
	}
		function fechanew2($h1){

  $nuevafecha1 = strtotime ($h1);
	$nuevafecha = date ( 'd-m-Y' , $nuevafecha1 );
	return $nuevafecha;
	}
	function reg_insert($data){
	//$sql = $this->db->set($data)->get_compiled_insert('usuarios');
	//return $sql;
	$insert=$this->db->insert('usuarios', $data);
	if($insert){return $this->db->insert_id();}
	else{return null;}
		
	}
	function pacientes_insert($data){
	$insert=$this->db->insert('pacientes', $data);
	return $insert;	
	}	
	function reg_correos($data){
	
	$insert=$this->db->insert('correos', $data);
	return $insert;
		
	}
	
	function reg_update($data,$id){
	$this->db->where('id', $id);
	$insert=$this->db->update('usuarios', $data);
	return $insert;	
	}
	
	function update_correos($data,$id){
	$this->db->where('id_correos', $id);
	$insert=$this->db->update('correos', $data);
	return $insert;	
	}
	function permisos_user_update($data,$id){
	$this->db->where('id', $id);
	$insert=$this->db->update('usuarios', $data);
	return $insert;	
	}

	function list_user(){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->order_by('usuarios.fe_update', 'desc');
	$query = $this->db->get('');
	return $query;
	}
		function list_pacientes(){
		$this->db->select('*');
		$this->db->from('pacientes');
		$this->db->order_by('fe_update', 'DESC');
	$query = $this->db->get('');
	return $query;
	}
		function PacientesEdit($id){
		$this->db->select('*');
		$this->db->from('pacientes');
		$this->db->where('id_paciente', $id);
		$query = $this->db->get();
    if($query->num_rows() > 0){
     return $query->result_array();
    }
	}
		function PacientesG($id){
		$this->db->select('*');
		$this->db->from('pacientes');
		$this->db->where('id_paciente', $id);
		$query = $this->db->get();
    if($query->num_rows() > 0){
     return $query->result_array();
    }
	}
	function pacientes_update($data,$id){
	$this->db->where('id_paciente', $id);
	$insert=$this->db->update('pacientes', $data);
	return $insert;	
	}	
	
/**************ASEGURADORA********************************/	
	function list_aseguradoras(){
		$this->db->select('*');
		$this->db->from('aseguradora');
		$this->db->order_by('updated', 'desc');
	$query = $this->db->get('');
	return $query;
	}
	function reg_insert_aseguradora($data){
	
	$insert=$this->db->insert('aseguradora', $data);
	return $insert;
		
	}	
  public function aseguradoraEdit($id) {
    	$this->db->select('*');
			$this->db->from('aseguradora');
			$this->db->where('id_seguros', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function aseguradora_update($data,$id){
	$this->db->where('id_seguros', $id);
	$insert=$this->db->update('aseguradora', $data);
	return $insert;	
	}
	public function eliminar_seguro($id){
			$tables = array('aseguradora');
			$this->db->where('id_seguros', $id);
			$que=$this->db->delete($tables);
			return $que;
	}	
/***************************************************/
/****************Consulta Ginecologica***********************************/
	function consultag_insert($data){
	$insert=$this->db->insert('g_consulta', $data);
	if($insert){return $this->db->insert_id();}
	else{return null;}	
	}
	function g_habitos_insert($data){
	$insert=$this->db->insert('g_habitos', $data);
	return $insert;	
	}
	function g_medicos_insert($data){
	$insert=$this->db->insert('g_medicos', $data);
	return $insert;	
	}
	function g_diagnostico_insert($data){
	$insert=$this->db->insert('g_diagnostico', $data);
	return $insert;	
	}	
	function g_evaluacion_insert($data){
	$insert=$this->db->insert('g_evaluacion', $data);
	return $insert;	
	}		
	function consultag_update($data,$id){
	$this->db->where('id_consultag', $id);
	$insert=$this->db->update('g_consulta', $data);
	return $insert;	
	}	
	function medicosg_update($data,$id){
	$this->db->where('id_consultag', $id);
	$insert=$this->db->update('g_medicos', $data);
	return $insert;	
	}
	function g_habitos_update($data,$id){
	$this->db->where('id_consultag', $id);
	$insert=$this->db->update('g_habitos', $data);
	return $insert;	
	}
	function g_evaluacion_update($data,$id){
	$this->db->where('id_consultag', $id);
	$insert=$this->db->update('g_evaluacion', $data);
	return $insert;	
	}	
	function LisConsultaG($id){
		$this->db->select('*');
		$this->db->from('g_consulta');
		$this->db->where('id_paciente', $id);
		$this->db->order_by('fe_update', 'desc');
	$query = $this->db->get('');
	return $query;
	}	
		function ConsultaGEdit($id){
		$this->db->select('*');
		$this->db->from('g_consulta');
		$this->db->join('g_medicos','g_consulta.id_consultag=g_medicos.id_consultag','LEFT');		
		$this->db->join('g_habitos','g_consulta.id_consultag=g_habitos.id_consultag','LEFT');		
		$this->db->join('g_evaluacion','g_consulta.id_consultag=g_evaluacion.id_consultag','LEFT');		
		$this->db->join('g_diagnostico','g_consulta.id_consultag=g_diagnostico.id_consultag','LEFT');		
		$this->db->where('g_consulta.id_consultag', $id);
		$query = $this->db->get();
    if($query->num_rows() > 0){
     return $query->result_array();
    }
	}		

/**************anticonceptivos********************************/	
	function list_anticonceptivos(){
		$this->db->select('*');
		$this->db->from('anticonceptivos');
		$this->db->order_by('updated', 'desc');
	$query = $this->db->get('');
	return $query;
	}
	function reg_insert_anticonceptivos($data){
	
	$insert=$this->db->insert('anticonceptivos', $data);
	return $insert;
		
	}	
  public function anticonceptivosEdit($id) {
    	$this->db->select('*');
			$this->db->from('anticonceptivos');
			$this->db->where('id_anticonceptivos', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function anticonceptivos_update($data,$id){
	$this->db->where('id_anticonceptivos', $id);
	$insert=$this->db->update('anticonceptivos', $data);
	return $insert;	
	}
	public function eliminar_anticonceptivos($id){
			$tables = array('anticonceptivos');
			$this->db->where('id_anticonceptivos', $id);
			$que=$this->db->delete($tables);
			return $que;
	}	
/**************drogas********************************/	
	function list_drogas(){
		$this->db->select('*');
		$this->db->from('drogas');
		$this->db->order_by('updated', 'desc');
	$query = $this->db->get('');
	return $query;
	}
	function reg_insert_drogas($data){
	
	$insert=$this->db->insert('drogas', $data);
	return $insert;
		
	}	
  public function drogasEdit($id) {
    	$this->db->select('*');
			$this->db->from('drogas');
			$this->db->where('id_drogas', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function drogas_update($data,$id){
	$this->db->where('id_drogas', $id);
	$insert=$this->db->update('drogas', $data);
	return $insert;	
	}
	public function eliminar_drogas($id){
			$tables = array('drogas');
			$this->db->where('id_drogas', $id);
			$que=$this->db->delete($tables);
			return $que;
	}	
	/**************tratante********************************/	
	function list_tratante(){
		$this->db->select('*');
		$this->db->from('tratante');
		$this->db->order_by('updated', 'desc');
	$query = $this->db->get('');
	return $query;
	}
	function reg_insert_tratante($data){
	
	$insert=$this->db->insert('tratante', $data);
	return $insert;
		
	}	
  public function tratanteEdit($id) {
    	$this->db->select('*');
			$this->db->from('tratante');
			$this->db->where('id_tratante', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
 	} 	
	function tratante_update($data,$id){
	$this->db->where('id_tratante', $id);
	$insert=$this->db->update('tratante', $data);
	return $insert;	
	}
	public function eliminar_tratante($id){
			$tables = array('tratante');
			$this->db->where('id_tratante', $id);
			$que=$this->db->delete($tables);
			return $que;
	}	
/******************recipes*********************************/	

function reg_insert_recipej($data){
	$insert=$this->db->insert('g_recipes', $data);
	if($insert){return $this->db->insert_id();}
	else{return null;}
}	
	public function eliminar_recipe($id){
			$tables = array('g_recipes');
			$this->db->where('id_g_recipes', $id);
			$que=$this->db->delete($tables);
			return $que;
	}
		function list_recipes($id){
		$this->db->select('*');
		$this->db->from('g_recipes');
		$this->db->where('id_consultag', $id);
		$this->db->order_by('id_g_recipes', 'ASC');
	$query = $this->db->get('');
	return $query;
	}		
/******************US Ginecologico*********************************/	
  function listado_UsGinecologico($id){
		$this->db->select('*');
		$this->db->from('us_ginecologico_1');
		$this->db->where('id_paciente', $id);
		$this->db->order_by('fe_update', 'desc');
	$query = $this->db->get('');
	return $query;
	}
	function actualiza_UsGinecologico($data,$id,$tabla){
	$this->db->where('id_us_ginecologico_1', $id);
	$insert=$this->db->update($tabla, $data);
	return $insert;	
	}
	function insert_UsGinecologico($data,$tabla){
	$insert=$this->db->insert($tabla, $data);
	return $insert;	
	}
	public function usGinecologicoEdit($id) {
    	$this->db->select('*');
			$this->db->from('us_ginecologico_1');
			$this->db->join('us_ginecologico_2','us_ginecologico_1.id_us_ginecologico_1=us_ginecologico_2.id_us_ginecologico_1');
			$this->db->where('us_ginecologico_1.id_us_ginecologico_1', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
  }
/*******************PRENATAL************************/	
  public function ultimopg($id) {
    	$this->db->select('pacientes.ultimo_p,g_consulta.paridad');
			$this->db->from('pacientes');
			$this->db->join('g_consulta','g_consulta.id_paciente=pacientes.id_paciente','LEFT');
			$this->db->where('pacientes.id_paciente', $id);
			$this->db->order_by('g_consulta.id_paciente', 'ASC');
			$this->db->limit(1);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
  }
  function guarda_prenatal($data){
		$insert=$this->db->insert('prenatal_1', $data);
		return $insert;
	}	
  public function prenatalEdit($id) {
    	$this->db->select('*');
			$this->db->from('prenatal_1');
			$this->db->join('prenatal_2','prenatal_1.id_prenatal_1=prenatal_2.id_prenatal_1');
			$this->db->join('prenatal_3','prenatal_1.id_prenatal_1=prenatal_3.id_prenatal_1');
			$this->db->where('prenatal_1.id_prenatal_1', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
  }
  public function id_prenatal($id) {
    	$this->db->select('*');
			$this->db->from('prenatal_1');
			$this->db->where('id_paciente', $id);
			$this->db->order_by('id_prenatal_1', 'DESC');
			$this->db->order_by('fe_update', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
  }    		
  function LisPrenatalG($id){
		$this->db->select('*');
		$this->db->from('prenatal_1');
		$this->db->where('id_paciente', $id);
		$this->db->order_by('fe_update', 'desc');
	$query = $this->db->get('');
	return $query;
	}	
	function actualiza_prenatal($data,$id,$tabla){
	$this->db->where('id_prenatal_1', $id);
	$insert=$this->db->update($tabla, $data);
	return $insert;	
	}
	function insert_prenatal($data,$tabla){
	$insert=$this->db->insert($tabla, $data);
	return $insert;	
	}
/****************ECO OBSTETRICO***********************************/	
 function LisEcoObst($id){
		$this->db->select('*');
		$this->db->from('eco_obstetrico_1');
		$this->db->where('id_paciente', $id);
		$this->db->order_by('fe_update', 'desc');
	$query = $this->db->get('');
	return $query;
	}
	function insert_ecoObstetrico($data,$tabla){
	$insert=$this->db->insert($tabla, $data);
	return $insert;	
	}
	
/***************PRIMER TRIMESTRE*********************/	
 function LisPrimerTrimestre($id){
		$this->db->select('*');
		$this->db->from('primer_trimestre_1');
		$this->db->where('id_paciente', $id);
		$this->db->order_by('fe_update', 'desc');
	$query = $this->db->get('');
	return $query;
	}
	function insert_PrimerTrimestre($data,$tabla){
	$insert=$this->db->insert($tabla, $data);
	return $insert;	
	}
/***************************************************/	
	
	function list_semanas(){
		$this->db->select('*');
		$this->db->from('semanas');
		$this->db->order_by('id_semanas', 'ASC');
	$query = $this->db->get('');
	return $query;
	}
		function list_clientes(){
		$this->db->select('*');
		$this->db->from('parto');
		$this->db->join('cumple','parto.id_usuario=cumple.id_usuario');
		$this->db->order_by('parto.fecha_creado', 'desc');
		$query = $this->db->get('');
		return $query;
	}
		function list_correos(){
		$this->db->select('*');
		$this->db->from('correos');
		$this->db->join('semanas','correos.semanas=semanas.id_semanas','LEFT');
		$this->db->order_by('id_correos', 'ASC');

		$query = $this->db->get('');
		return $query;
	}
	
    public function UsuarioEdit($id) {
    	$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->where('id', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }   

    public function CorreoEdit($id) {
    	$this->db->select('*');
			$this->db->from('correos');
			$this->db->where('id_correos', $id);
			$query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }
}
?>