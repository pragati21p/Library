<?php
class Common_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function now(){
        date_default_timezone_set('Asia/Calcutta');
        return date("Y-m-d H:i:s");
    }

    public function nowPlusDays($days){
        date_default_timezone_set('Asia/Calcutta');
        return date('Y-m-d H:i:s', strtotime("+".$days." days"));
    }


    public function nowMinusDays($days){
        date_default_timezone_set('Asia/Calcutta');
        return date('Y-m-d H:i:s', strtotime("-".$days." days"));
    }

     public function makeDatetime($date){
        date_default_timezone_set('Asia/Calcutta');
          return date("Y-m-d H:i:s",strtotime($date));
    }

    public function nowTime(){
        date_default_timezone_set('Asia/Calcutta');
        return time();
    }
}