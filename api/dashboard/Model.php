<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    var $db;
    
    public function __construct() {
        global $db;
        $this->db = $db;
    }
    
    public function checkPass($user, $pass){
        $sql = "SELECT * FROM users WHERE name='".$user."'";
        $user = $this->db->getArray($sql);
        if (!empty($user) && password_verify($pass, $user[0]['password'])){
            return $user;
        } else {
            return array();
        }
    }
    
    public function getPassages(){
        $sql = "SELECT * FROM passages ORDER BY id DESC LIMIT 20";
        return $this->db->getArray($sql);
    }
    
}
