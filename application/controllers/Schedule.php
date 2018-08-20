<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Schedule extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Schedule_model');
	}

	function schedule_form(){
		//chamar db da model
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('schedule.php');
	}

	public function updateSchedule(){
		$shed['schedule_model'] = $this->input->post('schedule_model');
		$shed['accuracy_level'] = $this->input->post('accuracy_level');
		$shed['organizational_procedures'] = $this->input->post('organizational_procedures');
		$shed['schedule_maintenance'] = $this->input->post('schedule_maintenance');
		$shed['performance_measurement'] = $this->input->post('performance_measurement');
		$shed['report_format'] = $this->input->post('report_format');

		$query =	$this->Schedule_model->updateScheduleDB($shed);
		if ($query) {
			header('location:'.base_url().$this->schedule_form());
		}

		//var_dump($shed);
	}

}?>