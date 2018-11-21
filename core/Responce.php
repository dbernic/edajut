<?php
/**
 * Error codes:
 * 1 - authentication error
 * 2 - method not found
 */

class Responce {
    
    private static function getInstance(){
        
    }

    public static function sendPayload($payload){
        self::send(0, '', $payload);
    }
    
    public static function sendError($id, $text){
        self::send($id, $text);
    }
    
    public static function sendLoginError(){
        self::send(1, 'You must login');
    }
    
    public static function sendAuthError(){
        self::send(3, 'Access denied');
    }
    
    public static function sendLoginFailed(){
        self::send(1, 'Wrong credentials');
    }
    
    private static function send($errId, $errText, $payload=null){
        $respObj = new ResponceData($errId, $errText,$payload);
        echo json_encode($respObj);
        exit();
    }
    
    
}

class ResponceData{
    var $error;
    var $errorTxt;
    var $payload;
//    var $token;
    
    function __construct($error, $errorTxt, $payload) {
        $this->error = $error;
        $this->errorTxt = $errorTxt;
        $this->payload = $payload;
//        $this->token = $token;
    }

}
