<?php

/**

 * @author dbernic
 */
class Controller {
    
    var $model;
    
    public function __construct() {
        $this->model = new Model();
    }
    
    function getProducts(){
        Auth::allow(['admin','teacher']);
        Responce::sendPayload($this->model->getProducts());  
    }

    
    function saveProduct(){
        Auth::allow('admin');        
        Responce::sendPayload($this->model->saveProduct($_POST['data']));
    }
    
    function getObjects(){
        Auth::allow();
        Responce::sendPayload($this->model->getObjects());
    }
    
    function deleteProduct(){
        Auth::allow('admin');
        Responce::sendPayload($this->model->deleteProduct($_POST['id']));
    }
    
}
