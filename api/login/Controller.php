<?php
/**

 * @author dbernic
 */
class Controller {
    
    var $model;
    
    public function __construct() {
        $this->model = new Model();
    }
    
    function login(){
        $password = filter_input(INPUT_POST, 'password');
        $login = filter_input(INPUT_POST, 'login');
        $user = $this->model->checkPass($login, $password);
        
        if(!empty($user)){
            $_SESSION['user'] = $user;
            Responce::sendPayload($user['name']);
        } else {
            Responce::sendLoginFailed();
        }
    }
    
    function logout(){
        $_SESSION['user'] = null;
        $this->responce->error = 0; 
        return $this->responce;
    }
}
