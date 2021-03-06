<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scope_specification extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Scope_specification_model');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('Scope_specification','english');
        // $this->lang->load('manage-scope','portuguese-brazilian');

	}

	public function addnew($project_id){
		$dado['scope_specification'] = $this->Scope_specification_model->getAll();
		$dado['id'] = $project_id;
		//$dado['verific'] = true;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/scope_specification',$dado);
	}

	public function insert($id){
		$dado['scope_specification'] = $this->Scope_specification_model->getAll();
		$Scope_specification['scope_description'] = $this->input->post('scope_description');
		$Scope_specification['acceptance_criteria'] = $this->input->post('acceptance_criteria');
		$Scope_specification['deliveries'] = $this->input->post('deliveries');
		$Scope_specification['exclusions'] = $this->input->post('exclusions');
		$Scope_specification['restrictions'] = $this->input->post('restrictions');
		$Scope_specification['assumptions'] = $this->input->post('assumptions');
		$Scope_specification['project_id'] = $id;
		$Scope_specification['status'] = 1;
		$query=false;
		if($dado['Scope_specification']!=null){
			foreach($dado['Scope_specification'] as $scope){
				$verific = $scope->project_id;
				if($id==$verific){
					$query = $this->Scope_specification_model->update($Scope_specification, $id);
				}
			}
		}
		if($query!=true){
			$query = $this->Scope_specification_model->insert($Scope_specification);
		}
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('project/' . $Scope_specification['project_id']);
		}

	}
}
?>