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

}
