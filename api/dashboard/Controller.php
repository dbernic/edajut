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
    
    function getPassages(){        
        if (empty($_SESSION['user'])){
            $this->responce->error = 1;
            return $this->responce;
        }
        
        $this->responce->payload = $this->model->getPassages();
        return $this->responce;
    }
    
    function saveUser($data){
        if (empty($_SESSION['user'])){
            $this->responce->error = 1;
            return $this->responce;
        }        
        $model->saveUser($data);
        return $this->responce;
    }
}
