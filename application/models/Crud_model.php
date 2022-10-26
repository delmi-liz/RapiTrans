<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Crud_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
		}

		function insert_excel($data){
			$this->load->database();
			$this->db->insert_batch('costos', $data);
		}

		function insert_exceldos($data){
			$this->load->database();
			$this->db->insert_batch('demanda', $data);
		}

		public function datosDemanda()
    {
        $this->load->database();
        $query = $this->db->query("
    
        select * from demanda
    
          ");
        return $query->result();
    }

	public function datosCostos()
    {
        $this->load->database();
        $query = $this->db->query("
    
        select * from costos
    
          ");
        return $query->result();
    }

		/*function insert_excel($data){
			$this->load->database();
			$this->db->insert_batch('excel_data', $data);
		}*/
	}
?>