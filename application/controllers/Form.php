<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function index()
	{	
		
		$post = $this->input->post();
		$data = [
			'title'=>'<h4>USER FORM SIGN UP</h4>',
			'submit'=>'sign up',
			'reset' => 'reset',
			'btn_class'=>'btn-success'
		];
		
		if (!empty($post) && is_array($post)) {
			echo json_encode($post);
			exit;
		}

		$this->layout("form/signup", $data);
	}

	public function signupDB(){
		$this->load->model('postform');
		$post = $this->input->post();
		$data = [
			'title'=>'<h4>USER FORM SIGN UP</h4>',
			'submit'=>'sign up',
			'reset' => 'reset',
			'btn_class'=>'btn-success'
		];

		if(!empty($post) && is_array($post)){
			$params = [
				'FirstName' => $post['name'],
				'LastName' => $post['lastname'],
				'City' => $post['city'],
				'ContactNumber' => $post['number'],
				'Email' => $post['email']
			]; 
			$this->postform->insert_user($params);
			echo json_encode($post);
			exit;
		}
		$res = $this->postform->fetch_user();
		if(count($res)){
			$res_data['result'] = $res;
			$this->load->view("table/dynamic_table", $res_data);
		}
		$this->layout("form/SignupDB", $data);
	}

	public function login() {
		$post = $this->input->post();
		
		$data = [
			'title'=>'<h2>USER FORM Login</h2>',
			'submit'=>'log in',
			'btn_class'=>'btn-danger'
		];

		if(!empty($post) && is_array($post)){
			echo json_encode($post);
			exit;
		}
		
		$this->layout("form/login", $data);
	}

	public function signup1() {

		$data = [
			'title' =>'<h2>USER FORM Signup1</h2>',
			 'submit' => 'Signup',
			'btn_class' => 'btn-success'
		];

		$post = $this->input->post();
		// echo "<pre>"; print_r($post); exit;
		if(!empty($post) && is_array($post)){
			$data['post_res'] = $post;
		}
		$this->layout("form/signup1" , $data);
	}

	function layout($view, $data = []) {
		$this->load->view('layout/header');
		$this->load->view($view,$data);
		$this->load->view('layout/footer');
	}

}
