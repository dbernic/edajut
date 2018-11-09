<?php
include_once 'Model.php';

/**

 * @author dbernic
 */
class Controller {
    
    var $model;
    var $responce;
    
    public function __construct() {
        $this->model = new Model();
        $this->responce = new Responce();
    }
    
    function login(){
        $password = filter_input(INPUT_POST, 'password');
        $login = filter_input(INPUT_POST, 'login');
        $user = $this->model->checkPass($login, $password);
        if(!empty($user)){
            $_SESSION['user'] = $user;
            $this->responce->error = 0; 
            $this->responce->payload = $user['name'];
        } else {
            $_SESSION['user'] = null;
            $this->responce->error = 1;
            $this->responce->errorTxt = "Wrong credencials";
        }
               
        return $this->responce;
    }
    
    function logout(){
        $_SESSION['user'] = null;
        $this->responce->error = 0; 
        return $this->responce;
    }
}
