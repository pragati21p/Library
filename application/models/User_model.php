<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($input = null)
    {
        $attr = array('public_id' => $input);
        $query = $this->db->get_where('user', $attr);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getUsers()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getUserIssueDetails($id)
    {
        # code...
        $attr = array('issued_to_id' => $id);
        $query = $this->db->get_where('issue_details', $attr);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function getOperator($table, $input)
    {
        $query = $this->db->get_where($table, $input);
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function validEmail($email)
    {
        $check = explode( "@", $email );
        if( checkdnsrr( array_pop( $check ) ) ) {
            return true;
        }else{
            return false;
        }
    }

    public function getId()
    {
        # code...
        $pid = mt_rand(10000, 99999);
        $array = $this->db->get_where('user', array('public_id' => $pid));
        if($array->num_rows() > 0){
            $this->getId($table);
        }else{
            return $pid;
        }
    }

    public function isUniqueEmail( $email)
    {
        $sql = $this->db->get_where('user', array('email' => $email));
        if ($sql->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function isUniquePhone($phone)
    {
        $sql = $this->db->get_where('user', array('phone' => $phone));
        if ($sql->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function now()
    {
        date_default_timezone_set('Asia/Calcutta');
        return date("Y-m-d H:i:s");
    }

    public function validUserId($userid)
    {
        # code...
        $data = array('public_id' => $userid);
        $sql = $this->db->get_where('user', $data);
        if ($sql->num_rows() == 1) {

            $get = $sql->row_array();

            if( !( $this->IsValidity($get['updated_at'] )) ){
                $this->session->set_flashdata('error', 'User has Due Amount To Be Paid.');
                return false;
            }

            if($get['credit'] == 0){
                $this->session->set_flashdata('error', 'User has No Credit Left.');
                return false;
            }

            $credit = $get['credit'] - 1;
            $set = array('credit' => $credit);
            $this->db->set($set);
            $this->db->where($data);
            $this->db->update('user');

            return true;
        } else {
            $this->session->set_flashdata('error', 'User Id is Invalid.');
            return false;
        }
    }

    public function createAccount($array)
    {
        # code...
        $sql = $this->db->insert('user', $array);
        return $sql;

    }

    public function IsValidity($date){
        date_default_timezone_set('Asia/Calcutta');
        $compare = date('Y-m-d H:i:s', strtotime("- 30 days"));
        if($date > $compare){
            return true;
        }else{
            return false;
        }
    }


}
