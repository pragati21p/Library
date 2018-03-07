<?php
class Encrypt_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        define("SALT", "$2y$10$7u44A2gBk5VW8RGymL5K9O9HMucPKWDUzLbgVRvIX4iuEppFE1Cn2");
        define("NAMESPACE", "1546058f-5a25-4334-85ae-e68f2a44bbaf");
    }

    //  http://php.net/manual/en/function.uniqid.php#94959

    public function v3($namespace, $name) {
        if(!$this->is_valid($namespace)) return false;

        // Get hexadecimal components of namespace
        $nhex = str_replace(array('-','{','}'), '', $namespace);

        // Binary Value
        $nstr = '';

        // Convert Namespace UUID to bits
        for($i = 0; $i < strlen($nhex); $i+=2) {
          $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
        }

        // Calculate hash value
        $hash = md5($nstr . $name);

        return sprintf('%08s-%04s-%04x-%04x-%12s',

          // 32 bits for "time_low"
          substr($hash, 0, 8),

          // 16 bits for "time_mid"
          substr($hash, 8, 4),

          // 16 bits for "time_hi_and_version",
          // four most significant bits holds version number 3
          (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x3000,

          // 16 bits, 8 bits for "clk_seq_hi_res",
          // 8 bits for "clk_seq_low",
          // two most significant bits holds zero and one for variant DCE1.1
          (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

          // 48 bits for "node"
          substr($hash, 20, 12)
        );
    }

    public function v4() {
        // example output -  7858397c-9dc8-48f6-8573-432f7f3d3015
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

          // 32 bits for "time_low"
          mt_rand(0, 0xffff), mt_rand(0, 0xffff),

          // 16 bits for "time_mid"
          mt_rand(0, 0xffff),

          // 16 bits for "time_hi_and_version",
          // four most significant bits holds version number 4
          mt_rand(0, 0x0fff) | 0x4000,

          // 16 bits, 8 bits for "clk_seq_hi_res",
          // 8 bits for "clk_seq_low",
          // two most significant bits holds zero and one for variant DCE1.1
          mt_rand(0, 0x3fff) | 0x8000,

          // 48 bits for "node"
          mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function v5($namespace, $name) {
        if(!$this->is_valid($namespace)) return false;

        // Get hexadecimal components of namespace
        $nhex = str_replace(array('-','{','}'), '', $namespace);

        // Binary Value
        $nstr = '';

        // Convert Namespace UUID to bits
        for($i = 0; $i < strlen($nhex); $i+=2) {
          $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
        }

        // Calculate hash value
        $hash = sha1($nstr . $name);

        return sprintf('%08s-%04s-%04x-%04x-%12s',

          // 32 bits for "time_low"
          substr($hash, 0, 8),

          // 16 bits for "time_mid"
          substr($hash, 8, 4),

          // 16 bits for "time_hi_and_version",
          // four most significant bits holds version number 5
          (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,

          // 16 bits, 8 bits for "clk_seq_hi_res",
          // 8 bits for "clk_seq_low",
          // two most significant bits holds zero and one for variant DCE1.1
          (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

          // 48 bits for "node"
          substr($hash, 20, 12)
        );
    }

    public function is_valid($uuid) {
        return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?'.'[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
    }

    public function generaterandomhash(){
        // example output -  5ef1-1084-5e7e-b1e0-7cd7-af35-34ff-3ce2
        return implode(
            "-",
            str_split(
                md5(
                    uniqid(
                        time() . SALT . rand(0, 9999999)
                    )
                ),
                4
            )
        );
    }

    public function generatePublicId( $tablename = null, $columnname = null ){
        if( isset($tablename) && isset($columnname) ){
            $hash = $this->generaterandomhash();
            $sql = $this->db->get_where($tablename, array($columnname => $hash) );
            if($sql->num_rows() > 0){
                $this->generatePublicId($tablename, $columnname);
            }else{
                return $hash;
            }
        }
    }
}
