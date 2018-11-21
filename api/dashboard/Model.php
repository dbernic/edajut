<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    var $db;
    
    public function __construct() {
        global $db;
        $this->db = $db;
    }

    
}
