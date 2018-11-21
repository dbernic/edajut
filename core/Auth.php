<?php

/**
 * Description of Auth
 *
 * @author dbernic
 */
class Auth {
    
    public static $groups = ['admin', 'teacher', 'parent'];
    
    static function allow($groups = null){
        
        if(Userdata::get()->getGroup() === null){
            self::sendDeny();
        } else if(is_array($groups)){
            if (!in_array(Userdata::get()->getGroup(), $groups)){
                self::sendDeny();
            }
        } else if(is_string($groups)){
            if(Userdata::get()->getGroup() !== $groups){
                self::sendDeny();
            }
        } 
      
    }
    
    static function deny(){
        // TODO
    }
    
    private static function sendDeny(){
        Responce::sendAuthError();
    }
    
}
