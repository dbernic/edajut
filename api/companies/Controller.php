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
        $this->responce->error = 0;
    }
    
    function getUsers(){
        if (empty($_SESSION['user'])){
            $this->responce->error = 1;
            return $this->responce;
        }
        
        $this->responce->payload = $this->model->getUsers();
               
        return $this->responce;
    }

    function getCompanies(){
        if (empty($_SESSION['user'])){
            $this->responce->error = 1;
            return $this->responce;
        }
        
        $this->responce->payload = $this->model->getCompanies();
               
        return $this->responce;
    }
    
    function saveCompany(){
        if (empty($_SESSION['user'])){
            $this->responce->error = 1;
            return $this->responce;
        }
        
        $this->responce->payload = $this->model->saveCompany($_POST['data']);
        
        return $this->responce;
    }
    
}
