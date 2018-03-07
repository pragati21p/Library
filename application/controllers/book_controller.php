<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Book_controller extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('common_model');
        $this->load->model('user_model');
        $this->load->model('book_model');
        $this->load->database();

        if( !( $this->session->userdata('operator') ) ){
        redirect('operator_controller/login');        
        }    
    }

    public function index()
    {

    }

    public function searchBook($name)
    {
        $array = $this->book_model->searchBook($name);
        return $array;
    }

    public function searchBookPage()
    {
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view("forms/searchbookform");
        $this->load->view('common/footer');
    }

    public function fetchBookZone()
    {
        $data['array'] = $this->book_model->getZone();
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view("operator/viewzoner", $data);
        $this->load->view('common/footer');
    }

    public function bookList()
    {
        $sql['array'] = $this->book_model->getBooks();
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view("details/booklist", $sql);
        $this->load->view('common/footer');
    }

    public function BookForm()
    {
        $data['array'] = $this->book_model->getZone();
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view("forms/bookform", $data);
        $this->load->view('common/footer');
    }

    public function addZonePage()
    {
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view("forms/addzone");
        $this->load->view('common/footer');
    }

    public function addZone()
    {
        $data = $this->input->post(null, true);
        $this->form_validation->set_rules('rackid', 'Rack Id', 'required|trim');
        $this->form_validation->set_rules('zoner', 'Zoner', 'required|trim');
        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $array = array(
            'zoner' => $data['zoner'],
            'rack_id' => $data['rackid'],
            'totalbooks' => '0'        );
            $this->db->insert('rack', $array);
            $this->session->set_flashdata('success', 'Successfully Added.');
            redirect('Book_controller/fetchBookZone');        
        }
    }

    public function createBook()
    {
        $data = $this->input->post(null, true);
        $this->session->set_flashdata('data', $data);
        $this->form_validation->set_rules('bookname', 'Book Name', 'required|trim');
        $this->form_validation->set_rules('zoner', 'Zoner', 'required|trim');
        $this->form_validation->set_rules('writer', 'Writer', 'required|trim');
        $this->form_validation->set_rules('copies', 'Number Of Copies', 'required|trim|numeric');
        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);        
        }else{
            $bookid = $this->user_model->getId('books');
            $array = array(
                'public_id' => $bookid,
                'bookname' => $data['bookname'],
                'zoner' => $data['zoner'],
                'popular' => isset($data['popular'])?'1':'0' ,
                'writer' => $data['writer'],
                'copies' => $data['copies'],
                'available' => $data['copies'],
                'available_since' =>$this->common_model->now()        
            );
            $this->db->insert('books', $array);
            $this->book_model->updateRackOnBook($data['zoner']);
            redirect('book_controller/bookPage'.$bookid);        
        }
    }
   
    public function bookIssue()
    {
        # code...
        $data = $this->input->post(null, true);
        $this->form_validation->set_rules('bookid', 'Book Id', 'required|trim');
        $this->form_validation->set_rules('userid', 'User Id', 'required|trim');
        if ( $this->form_validation->run() == false ) {
            $this->session->set_flashdata('error', validation_errors());        
        }else{
            if( $this->book_model->validBookId($data['bookid']) ){
            $array = array(
                'book_id' => $data['bookid'],
                'issued_to_id' => $data['userid'],
                'issued_at' => $this->user_model->now()
            );

            $valid = $this->user_model->validUserId( $data['userid']);

            if( $valid ){
                if( $this->book_model->bookIssueEntry($array) ){
                    $this->session->set_flashdata('success', 'Successfully Issued.');        
                }else{
                    $this->session->set_flashdata('error', 'Sorry... Some Error Occurred');        
                }        
            }        
        }else{
                $this->session->set_flashdata('error', 'Book Id is Invalid.');        
            }        
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
   
    public function bookIssueForm()
    {
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view('forms/bookissue');
        $this->load->view('common/footer');
    }
   
    public function popularBooks($value = null)
    {
        $data['title'] = 'popular in '.$value;
        $where = array( 'popular' => '1', 'zoner' => $value);
        $data['array'] = $this->book_model->getBooks($where);

        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view('details/booklist', $data);
        $this->load->view('common/footer');
    }
   
    public function bookPage($value)
    {
        # code...
        $data['array'] = $this->book_model->getBook($value);
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view('details/book', $data);
        $this->load->view('common/footer');
    }
   
    public function dueBooks()
    {
        $array = array('returned_at' => '0000-00-00 00:00:00', 'issued_at <' => $this->common_model->nowMinusDays(15));
        $sql = $this->db->get_where('issue_details', $array);
        if($sql->num_rows() > 0){
        $data['array'] = $sql->result_array();}else{
        $data['array'] = false;}
        if ($data['array']) {
            foreach ($data['array'] as $key =>$value) {
                $new = $this->user_model->getUser($value['issued_to_id']);
                $data['array'][$key]['contact'] = $new['phone'];
            }
        }
        
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view('details/notReturnedBooks', $data);
        $this->load->view('common/footer');
    }

   
    public function returnBook($value)
    {
        $array = $this->db->get_where('issue_details', array('id' => $value));

        if($array->num_rows() > 0){

            $array = $array->row_array();
            $this->db->set( array('returned_at' => $this->user_model->now()) );
            $this->db->where( array('id' => $value) );
            $sql  = $this->db->update('issue_details');
        
            if($sql){

                $user = $this->db->get_where('user', array('public_id' => $array['issued_to_id']));

                if($user->num_rows() > 0){
                    $user = $user->row_array();
                    $credit = (int)$user['credit'] + 1;
                    $this->db->set( array('credit' => $credit )  );
                    $this->db->where( array('public_id' => $array['issued_to_id']) );

                    $sql = $this->db->update('user');

                    $done = 0;

                    if($sql){
                        $user = $this->db->get_where('books', array('public_id' => $array['book_id']));

                        if($user->num_rows() > 0){

                            $user = $user->row_array();
                            $available = (int)$user['available'] + 1;
                            $this->db->set( array('available' => $available )  );
                            $this->db->where( array('public_id' => $array['book_id']) );
                            $sql = $this->db->update('books');

                            if($sql){
                                $done = 1;
                                $this->session->set_flashdata('success', 'Successfully Returned.' );
                            }
                        }
                    }
                    if (!$done) {
                        $this->session->set_flashdata('error', 'Some Error Occurred.' );
                    }
                }
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}