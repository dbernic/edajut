<?php

/**
 * Description of Auth
 *
 * @author dbernic
 */
class Auth {
    
    private $groups;
    
    private static $instance = null;
    
    public static function get(){
        if(self::$instance===NULL) {
            self::$instance = new Auth();
        }
        
        return self::$instance;
    } 
    
    
    static function allow($groups){
        if(is_array($groups)){
            
        }
    }
    
    static function deny(){
        
    }
    
    
    public function __construct() {
        $this->groups = ['admin', 'teacher', 'parent'];
    }
    
    
}
