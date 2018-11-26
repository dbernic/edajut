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
        Responce::sendPayload($this->model->getProducts(filter_input(INPUT_POST, 'data', FILTER_DEFAULT , FILTER_REQUIRE_ARRAY)));  
    }

    
    function saveProduct(){
        Auth::allow('admin');        
        Responce::sendPayload($this->model->saveProduct($_POST['data']));
    }
    
    
    function deleteProduct(){
        Auth::allow('admin');
        Responce::sendPayload($this->model->deleteProduct($_POST['id']));
    }
    
}
