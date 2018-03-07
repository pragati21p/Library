<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('admin_model');
        $this->load->model('encrypt_model');
        $this->load->model('common_model');
        $this->load->model('user_model');
        $this->load->database();
        if( !( $this->session->userdata('operator') ) ){
        	redirect('operator_controller/login');
        }
    }

    public function index()
	{
		
	}

	public function register()
	{
		# code...
		$this->load->view('common/header');
		$this->load->view('common/navbar');
		$this->load->view("forms/userform");
		$this->load->view('common/footer');
	}

	public function registerUser()
	{
		$data = $this->input->post(null, true);
        $this->form_validation->set_rules('email', 'Email-id', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'required|trim|numeric|exact_length[10]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('privilege', 'Privilege', 'required|trim');
        $this->form_validation->set_rules('idtype', 'Id Type', 'required|trim');
        $this->form_validation->set_rules('idproof', 'Id Proof', 'required|trim');
        $this->session->set_flashdata('data', $data);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('error', validation_errors());

        }else{
        	if( $this->user_model->validEmail($data['email']) ){
                $this->session->set_flashdata('error', 'Invalid Email');
            }
            if( $this->unique_email_phone( $data['email'], $data['phone'] ) ){

            	$userid = $this->user_model->getId('student');

	            $array = array(
        			'public_id' => $userid,
	                'email' => $data['email'],
	                'idproof' => $data['idproof'],
	                'idtype' => $data['idtype'],
	                'privilege' => $data['privilege'],
	                'address' => $data['address'],
	                'credit' => ( $data['privilege'] == 'gold' )?(4):(6) ,
	                'phone' => $data['phone'],
	                'username' => $data['username'],
	                'created_at' => $this->user_model->now(),
	                'updated_at' => $this->user_model->now()
	                );
	            if( $this->user_model->createAccount($array) ){
	            	$this->session->set_flashdata('success', 'Successfully Created.');
	            }else{
	            	$this->session->set_flashdata('error', 'Wait... Some Error Occurred.');
	            }
	            redirect('user_controller/userPage/'. $userid);
            }

        }
        redirect($_SERVER['HTTP_REFERER']);
	}

	public function searchUser()
	{
		# code...
		$data = $this->input->post(null, true);
        $this->form_validation->set_rules('searchuser', 'Search', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        }
        redirect('user_controller/userPage/'.$data['searchuser']);	
	}

	public function searchUserPage()
	{
		# code...
		$this->load->view('common/header');
		$this->load->view('common/navbar');
		$this->load->view("forms/searchuserform");
		$this->load->view('common/footer');
	}

	public function userPage($value)
	{
		# code...
		$sql['array'] = $this->user_model->getUser($value);

		$sql['due'] = 0;
        if( !( $this->user_model->IsValidity( $sql['array']['updated_at'] )) ){
        	if( $sql['array']['privilege'] == 'gold'){
        		$sql['due'] = 400;
        	}else{
        		$sql['due'] = 600;
        	}
        }

        $sql['issueDetails'] = $this->user_model->getUserIssueDetails($value);

        // print_r($sql['issueDetails']);

		$this->load->view('common/header');
		$this->load->view('common/navbar');
		$this->load->view("details/user", $sql);
		$this->load->view('common/footer');
	}

	public function searchUserName()
	{
		# code...
		$data = $this->input->post(null, true);
        $this->form_validation->set_rules('searchuser', 'Search', 'required|trim');
		$name = array('username' => $value);
		$sql = $this->db->get_where('user', $name);
		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}

	public function userList()
	{
		# code...
		$data['array'] = $this->user_model->getUsers();

		foreach ($data['array']  as $key => $value) {
			# code...
			$due = 0;
	        if( !( $this->user_model->IsValidity( $value['updated_at'] )) ){
	        	if( $value['privilege'] == 'gold'){
	        		$due = 400;
	        	}else{
	        		$due = 600;
	        	}
	        }
			$data['array'][$key]['due'] = $due;
		}
		$this->load->view('common/header');
		$this->load->view('common/navbar');
		$this->load->view("details/userlist", $data);
		$this->load->view('common/footer');
	}

	public function updateUser($id)
	{
		# code...
		$this->db->where( array('public_id' => $id) );
		$this->db->set( array( 'updated_at' => $this->user_model->now() ) );
		$this->db->update( 'user' );
		$this->session->set_flashdata('success', 'Successfully Updated.');
        redirect($_SERVER['HTTP_REFERER']);
	}

	function unique_email_phone( $email = null, $phone = null)
	{
		$valid = 1;
		if( $email ){
			if( !($this->user_model->isUniqueEmail( $email))){
				$this->session->set_flashdata('error', 'E-mail Already Registered');
				$valid = 0;
			}
		}

		if( $phone && $valid ){
			if( !($this->user_model->isUniquePhone( $phone))){
				$this->session->set_flashdata('error', 'Phone Number Already Registered');
				$valid = 0;
			}
		}

		return $valid;
    }
}
