<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model ('book_model');
		$this->load->model ('dep_model');
		$this->load->model ('manage_model');
		$data = array();
		
	}
	public function issuebook(){
		$data['title'] = 'Issue Book';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['depdata'] = $this->dep_model->getAllDepartmentData();
		$data['content'] = $this->load->view('inc/issuebook', $data,TRUE);
		$this->load->view('home', $data);

	}
	public function getBookByDepId($dep){
		$getAllBook =  $this->manage_model->getBookByDep($dep);
		$output = null;
		$output .= '<option value="0">Select One</option>';
		foreach ($getAllBook as $book) {
			$output .= '<option value="'.$book->bookid.'">'.$book->bookname.'</option>';
		}
		echo $output;



	}
	public function addIssueForm(){
		$data['studentname'] = $this->input->post('studentname');
		$data['dep'] = $this->input->post('dep');
		$data['reg'] = $this->input->post('reg');
		$data['book'] = $this->input->post('book');
	

		$studentname = $data['studentname'];
		$dep = $data['dep'];
		$reg = $data['reg'];
		$book = $data['book'];



		if (empty($studentname) && empty($dep) && empty($reg) && empty($book) )
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			redirect("manage/issuebook");
			
		
		}else{
			$this->manage_model->saveIssueData($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("manage/issuebook");
		}
		


	}
	public function issuelist(){
		$data['title'] = 'Issue Book';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['issuedata'] = $this->manage_model->getAllIssueData();
		$data['content'] = $this->load->view('inc/issuelist', $data,TRUE);
		$this->load->view('home', $data);

	}

}

	