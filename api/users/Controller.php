<?php

/**

 * @author dbernic
 */
class Controller {
    
    var $model;
    
    public function __construct() {
        $this->model = new Model();
    }
    
    function getUsers(){
        Auth::allow('admin');
        Responce::sendPayload($this->model->getUsers());             
    }
    
    function getTypes(){
        Auth::allow('admin');
        Responce::sendPayload($this->model->getTypes());
    }
    
    function saveUser(){
        Auth::allow('admin');        
        Responce::sendPayload($this->model->saveUser($_POST['data']));
    }
    
}
