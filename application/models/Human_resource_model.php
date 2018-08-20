<?php
   if (!defined('BASEPATH')) {
       exit('No direct script access allowed');
   }
   
   class Human_resource_model extends CI_Model {
   
   		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getHumanResource(){
			$query = $this->db->get('human_resources_mp');
			return $query->result(); 
		}

		public function insertHumanResource($human_resources_mp){
			return $this->db->insert('human_resources_mp', $human_resources_mp);
		}

		public function deleteHumanResource($id){
			$this->db->where('human_resources_mp.project_id', $id);
			return $this->db->delete('human_resources_mp');
		}    
       
   }  
   /* End of file */
   ?>