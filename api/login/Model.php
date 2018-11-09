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
        $sql = "SELECT * FROM users u LEFT JOIN usertypes t on u.type=t.id WHERE login='".$user."'";
        $user = $this->db->getArray($sql);
        if (!empty($user) && password_verify($pass, $user[0]['password'])){
            return $user[0];
        } else {
            return array();
        }
    }
    
}
