<?php
class Book_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getNewArrival()
    {
        # code...
        $myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d ") ) ) . "-1 month" ) );
        $books = array('available_since >=' => $myDate);
        $array = $this->db->get_where('books', $books);
        if ($array->num_rows() > 0) {
            return $array->result_array();
        } else {
            return false;
        }
    }

    public function getBooks($where = null)
    {
        # code...
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get('books');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function validBookId($id)
    {
        # code...
        $attr = array('public_id' => $id);
        $query = $this->db->get_where('books', $attr);
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getBook($id)
    {
        # code...
        if(is_array($id)) $attr = $id;
        else $attr = array('public_id' => $id);

        $query = $this->db->get_where('books', $attr);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    public function updateRackOnBook($value)
    {
        # code...
        $array = array('zoner' => $value);
        $query = $this->db->get_where('rack', $array);
        if ($query->num_rows() == 1) {

            $data = $query->row_array();
            $set = array( 'totalbooks' => (int)($data['totalbooks']) + 1 ) ;
            $this->db->set($set);
            $this->db->where($data);
            $this->db->update('rack');
        } else {
            return false;
        }
    }

    public function getZone()
    {
        # code...
        $array = $this->db->get('rack');
        if ($array->num_rows() > 0) {
            return $array->result_array();
        } else {
            return false;
        } 
    }

    public function searchBook($name)
    
    {
        # code...
        $this->db->like('bookname', $name);
        $array = $this->db->get('books');
        if ($array->num_rows() > 0) {
            return $array->result_array();
        } else {
            return false;
        } 
    }

    public function bookIssueEntry($array)
    {
        $sql = $this->db->insert('issue_details', $array);

        $book = array('public_id' => $array['book_id']);
        $this->minusCopies($book);
        return $sql;
    }

    public function minusCopies($array)
    {
        # code...
        $query = $this->db->get_where('books', $array);
        if ($query->num_rows() == 1) {

            $data = $query->row_array();
            $set = array( 'available' => (int)($data['available']) - 1 ) ;
            $this->db->set($set);
            $this->db->where($data);
            $this->db->update('books');
        } else {
            return false;
        }
    }
}