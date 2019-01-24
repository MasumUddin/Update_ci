<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model ('book_model');
		$this->load->model ('dep_model');
		$data = array();
		
	}
	public function addbook(){
		$data['title'] = 'Add Book';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['depdata'] = $this->dep_model->getAllDepartmentData();
		$data['content'] = $this->load->view('inc/addbook', $data,TRUE);
		$this->load->view('home', $data);

	}
	public function addBookForm(){
		$data['bookname'] = $this->input->post('bookname');
		$data['dep'] = $this->input->post('dep');
		$data['author'] = $this->input->post('author');
		

		$bookname = $data['bookname'];
		$dep = $data['dep'];
		$author = $data['author'];


		if (empty($bookname) && empty($dep) && empty($author))
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			redirect("book/addbook");
			
		
		}else{
			$this->book_model->saveBook($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("book/addbook");
		}
		


	}
		public function booklist(){
		$data['title'] = 'Book List';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['allbook'] = $this->book_model->getAllBookData();
		$data['content'] = $this->load->view('inc/booklist', $data,TRUE);
		$this->load->view('home', $data);

	}
	public function editbook($bookid){
		$data['title'] = 'Edit Book';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['departmentdata'] = $this->dep_model->getAllDepartmentData();
		$data['bookbyid'] = $this->book_model->bookById($bookid);
		$data['content'] = $this->load->view('inc/editbook', $data,TRUE);
		$this->load->view('home', $data);

	}

	public function UpdateBookForm(){
		$data['bookid'] = $this->input->post('bookid');
		$data['bookname'] = $this->input->post('bookname');
		$data['dep'] = $this->input->post('dep');
		$data['author'] = $this->input->post('author');
		
        $bookid = $data['bookid'];
		$bookname = $data['bookname'];
		$dep = $data['dep'];
		$author = $data['author'];


		if (empty($bookname) && empty($dep) && empty($author))
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			redirect("book/editbook/".$bookid);
			
		
		}else{
			$this->book_model->updateBook($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("book/editbook/".$bookid);
		}
		


	}

		public function delbook($bookid){
		    $this->book_model->delBookByid($bookid);
		    $sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("book/booklist"); 

	}
}