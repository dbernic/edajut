<?php


/**
 * Description of Userdata
 *
 * @author dbernic
 */
class Userdata {
    
    private $id;
    private $group;
    private $login;
    private $name;
    private $surname;
    private $phone;
    
    
    private static $instance;
    
    public static function get(){
        if(self::$instance === null){
            self::$instance = new Userdata();
        }
        
        return self::$instance;
    }
    
    function __construct() {
        // transliterator_transliterate('Latin', $subject)
    }

}
