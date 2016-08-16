<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epetition extends CI_Controller {

	public function callView($url){
		$data['main_content'] = $url;
		$this->load->view('include/template',$data);
	}

	public function index(){
		$this->load->model('emodel');
		$data['latestPetition'] = $this->emodel->latestPost();		
		$data['main_content'] = 'index';
		$this->load->view('include/template',$data);
	}

	public function login(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email-ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE)
        {
            $data['login_error'] = '';
			$data['main_content'] = 'login';
			$this->load->view('include/template',$data);	
        }
		else
		{
			$this->load->model('emodel');
			if($query = $this->emodel->login())
			{
				$loginData = array(
				        'username' => $query[0]->username,
				        'userid' => $query[0]->userid
				);
				$this->session->set_userdata($loginData);
				$this->index();
			}
			else
			{
				$data['login_error'] = 'Invalid Email or Password';
				$data['main_content'] = 'login';
				$this->load->view('include/template',$data);	
			}
		}
	}


	public function logout()
	{
		unset($_SESSION['username']);
		unset($_SESSION['userId']);
		session_destroy();
		$this->index();
	}


	public function signup(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email-ID', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE)
			$this->callView('signup');	
		else
		{
			$this->load->model('emodel');
			if($query = $this->emodel->signup())
			{	
			    $data['login_error'] = 'SignUp Done';
				$data['main_content'] = 'login';
				$this->load->view('include/template',$data);
			}	
			else
				$this->callView('signup');
		}
	}



	public function startPetition(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('heading', 'Heading', 'trim|required|is_unique[petitions.heading]');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		$config['upload_path']          = './uploads';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 2024;
        $config['max_height']           = 2024;

        $this->load->library('upload', $config);

		if(isset($_SESSION['username']))
		{
	        if ($this->form_validation->run() === FALSE )
			{
				$data['error'] = array('error'=>'');
				$data['main_content'] = 'startPetition';
				$this->load->view('include/template',$data);
			}
			else
			{
			    if ( ! $this->upload->do_upload('photo'))
			    {
			        $error = array('error' => $this->upload->display_errors());

			        $data['error'] = $error;
					$data['main_content'] = 'startPetition';
					$this->load->view('include/template',$data);
			    }
			    else
			    {
					$this->load->model('emodel');
					$data = array('upload_data' => $this->upload->data());
					$file_name = htmlentities( $data['upload_data']['file_name'] ); 

					if($query = $this->emodel->create_petition($file_name))
					{	
						$this->viewPetition($query);
					}	
					else
					{
						$data['main_content'] = 'startPetition';
						$this->load->view('include/template',$data);
					}	
			    }
	        }
	    }
	    else
	    {
	    	$data['error'] = array('error'=>'*Please Login First');;
			$data['main_content'] = 'startPetition';
			$this->load->view('include/template',$data);
	    }    
}



	public function choose_view(){
		if( isset($_POST['category']) )
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('category', 'Category', 'trim|required');

			$this->load->model('emodel');
			if( $query = $this->emodel->chooseCategory() )
			{
				$data['result']=$query;
				$data['main_content'] = 'choose_view';
			    $this->load->view('include/template',$data);
			}
			else
			{
				$this->index();
			}
		}
		else
		{
			$data['main_content'] = 'choose_view';
			$this->load->view('include/template',$data);
		}		
	}



	public function viewPetition($id ){
		$id = htmlentities($id);
		$this->load->model('emodel');
		if($id!='')
		{			
			if( $query = $this->emodel->viewPetition($id) )
			{
				$check_status = $this->emodel->BothStatus($id);
				$data['petitionId'] = $id;
				$data['heading'] = $query[0]->heading;
				$data['category'] = $query[0]->category;
				$data['description']=$query[0]->description;
				$data['image']=$query[0]->image;
				$data['comments'] = $query[1];
				$data['likes'] = $query[2];
				$data['sign'] = $query[3];

				$data['login_status'] = $check_status[0];
				$data['sign_status'] = $check_status[1];
				$data['main_content'] = 'viewPetition';
			    $this->load->view('include/template',$data);
			}
			else
			{
				$this->index();
			}
		}
		else
		{
			$this->index();
		}
	} 


	public function comments(){
		$id = $this->input->post('petitionId');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|required');

		if ( ($this->form_validation->run() === FALSE) || !isset($_SESSION["username"]) )
			$this->viewPetition($id);	
		else
		{
			$this->load->model('emodel');
			if($query = $this->emodel->comment())
			{	
				$this->viewPetition($id);
			}	
			else
				$this->viewPetition($id);
		}
	}

	public function checkSession(){
		if( isset($_SESSION["username"]) )
			echo 1;
		else
			echo 0;
	}

	public function like($petitionId){
		if(isset($_SESSION['username']))
		{
			$this->load->model('emodel');
			if( $query = $this->emodel->like($petitionId) )
			{
				echo 1;
			}
			else
				echo 0;
		}
		else 
			echo 0;
	}
}
