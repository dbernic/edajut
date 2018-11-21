<?php

/**

 * @author dbernic
 */
class Controller {
    
    var $model;
    
    public function __construct() {
        $this->model = new Model();
    }
    
    function getObjects(){
        Auth::allow(['admin','teacher']);
        Responce::sendPayload($this->model->getObjects());  
    }

    
    function saveObject(){
        Auth::allow('admin');        
        Responce::sendPayload($this->model->saveObject($_POST['data']));
    }
    
    function deleteObject(){
        Auth::allow('admin');
        Responce::sendPayload($this->model->deleteObject($_POST['id']));
    }
    
}
