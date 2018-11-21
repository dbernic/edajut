<?php


/**
 * Description of Userdata
 *
 * @author dbernic
 */
class Userdata {
    
    private $id=null;
    private $group=null;
    private $login=null;
    private $name=null;
    private $surname=null;
    private $phone=null;
    
    
    private static $instance;
    
    public static function get(){
        if(self::$instance === null){
            self::$instance = new Userdata();
        }
        
        return self::$instance;
    }
    
    function __construct() {
        // TODO token auth
        $this->userSession();
    }
    
    private function userSession(){
        if (empty($_SESSION['user'])){
            return;
        }
        
        $this->setId($_SESSION['user']['id']);
        $this->setGroup($_SESSION['user']['group']);
        $this->setLogin($_SESSION['user']['login']);
        $this->setName($_SESSION['user']['name']);
        $this->setSurname($_SESSION['user']['surname']);
        $this->setPhone($_SESSION['user']['phone']);
    }
    
    function getId() {
        return $this->id;
    }

    function getGroup() {
        return $this->group;
    }

    function getLogin() {
        return $this->login;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getPhone() {
        return $this->phone;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setGroup($group) {
        $this->group = $group;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

}
