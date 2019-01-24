<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model ('dep_model');
		$data = array();
		
	}
        public function adddepartment(){
		$data['title'] = 'Add Department';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['content'] = $this->load->view('inc/departmentadd', '',TRUE);
		$this->load->view('home', $data);

	}

	public function addDepartmentForm(){
		$data['depname'] = $this->input->post('depname');
		$data['deparea'] = $this->input->post('deparea');
		$data['depcode'] = $this->input->post('depcode');
	

		$depname = $data['depname'];
		$deparea = $data['deparea'];
		$depcode = $data['depcode'];
	


		if (empty($depname) && empty($deparea) && empty($depcode))
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/adddepartment");
			
		
		}else{
			$this->dep_model->SaveDepartment($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/adddepartment");
		}



	}

	public function departmentlist(){
		$data['title'] = 'Department List';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['depdata'] = $this->dep_model->getAllDepartmentData();
		$data['content'] = $this->load->view('inc/listdepartment', $data,TRUE);
		$this->load->view('home', $data);

	}
	public function editdepartment($depid){
		$data['title'] = 'Edit Department';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['depById'] = $this->dep_model->getDepartmentById($depid);
		$data['content'] = $this->load->view('inc/depedit', $data,TRUE);
		$this->load->view('home', $data);


}

public function updateDepartment(){
	    $data['depid'] = $this->input->post('depid');
        $data['depname'] = $this->input->post('depname');
		$data['deparea'] = $this->input->post('deparea');
		$data['depcode'] = $this->input->post('depcode');
	

        $depid = $data['depid'];
		$depname = $data['depname'];
		$deparea = $data['deparea'];
		$depcode = $data['depcode'];
	


		if (empty($depname) && empty($deparea) && empty($depcode))
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/editdepartment/".$depid);
			
		
		}else{
			$this->dep_model->updateDepName($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/editdepartment/".$depid);
		}

}
    public function deldepartment($depid){
	        $this->dep_model->delDepartmentById($depid);
		    $sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/departmentlist"); 




}


}