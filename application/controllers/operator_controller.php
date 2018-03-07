	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_controller extends CI_Controller {

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
        $this->load->model('book_model');
        $this->load->database();
    }

	public function index()
	{
		if( !( $this->session->userdata('operator') ) ){
			redirect('operator_controller/login');
		}else{
			redirect('operator_controller/home');
		}
	}


	public function checkoperator()
	{
        $data = $this->input->post(null, true);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $array = array(
                'username' => $data['username'],
                'password' => md5($data['password'])
               );
            if( $this->user_model->getOperator('operator', $array) ){
            	$this->session->set_userdata('operator', 'valid');
            	redirect('operator_controller/home');
            }else{
            	$this->session->set_flashdata('error', 'Invalid Login.');
            	redirect($_SERVER['HTTP_REFERER']);
            }
        }

	}

	public function login()
	{
		$this->load->view('common/header');
		$this->load->view("operator/loginpage");
		$this->load->view('common/footer');
	}

	public function home()
	{
		if( !( $this->session->userdata('operator') ) ){
			redirect('operator_controller/login');
		}
		redirect('book_controller/fetchBookZone');
		
	}

	public function changeOperator()
	{
		# code...
		$this->load->view('common/header');
		$this->load->view('common/navbar');
		$this->load->view("forms/changePasswordForm");
		$this->load->view('common/footer');
	}

	public function logout()
	{
		# code...
		unset($_SESSION['operator']);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function Delete($table, $where, $value = null)
	{
		# code...
		if(!is_null($value)){
			$where = array($where => $value);
		}
		$this->db->where($where);
		$this->db->delete($table);
        $this->session->set_flashdata('success', 'Successfully Deleted.');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function updateUsername()
	{
		# code...
		$data = $this->input->post(null, true);
        $this->form_validation->set_rules('oldusername', 'Old Username', 'required|trim');
        $this->form_validation->set_rules('newusername', 'New Username', 'required|trim');
        $this->session->set_flashdata('user', $data);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
        }else{

				$sql = $this->db->get_where('operator', array('username' => $data['oldusername']));
				
				if($sql->num_rows() == 1){
					$this->db->set( array( 'username' => $data['newusername'] ) );
					$this->db->where( array( 'username' => $data['oldusername'] ) );
					$this->db->update('operator');
        			$this->session->set_flashdata('success', 'Username Successfully Changed.');
				}else{

        			$this->session->set_flashdata('error', 'Old Username Entered is Invalid .');
				}
        }
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function updatePassword()
	{
		# code...
		$data = $this->input->post(null, true);
        $this->form_validation->set_rules('oldpassword', 'Old Password', 'required|trim');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required|trim');
        $this->session->set_flashdata('data', $data);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
        }else{

        		$where = array( 'password' => md5( $data['oldpassword']) );
        		$set = array( 'password' => md5( $data['newpassword']) );

				$sql = $this->db->get_where('operator', $where);
				
				if($sql->num_rows() == 1){
					$this->db->set( $set );
					$this->db->where( $where );
					$this->db->update('operator');
        			$this->session->set_flashdata('success', 'Password Successfully Changed.');
				}else{

        			$this->session->set_flashdata('error', 'Old Password Entered is Invalid .');
				}
        }
		redirect($_SERVER['HTTP_REFERER']);
	}

	
}
