<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    
    public function checkPass($user, $pass){
        $sql = "SELECT * FROM users WHERE login='".$user."'";
        $user = DB::get()->getArray($sql);
        if (!empty($user) && password_verify($pass, $user[0]['password'])){
            return $user[0];
        } else {
            return array();
        }
    }
    
}
