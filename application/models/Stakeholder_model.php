<?php
	class Stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($stakeholder_register){
			return $this->db->insert('stakeholder', $stakeholder_register);
		}
	}
?>