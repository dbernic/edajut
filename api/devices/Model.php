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
    
    public function getDevices(){
        $sql = "SELECT * FROM devices";
        return $this->db->getArray($sql);
    }
    
    public function getCompanies(){
        $sql = "SELECT id, name FROM companies";
        return $this->db->getArray($sql);        
    }
            
    function saveDevice($data){
        $sql = '';
        if (empty($data['id'])){
            $sql = "INSERT INTO devices (id, company, url, delimeter, \"user\", password, equipment, duration) VALUES ";
            $sql .= "(";
            $sql .= "nextval('device_id'), ";
            $sql .= $data['company'].', ';
            $sql .= "'".$data['url']."',";
            $sql .= "'".$data['delimeter']."',";
            $sql .= "'".$data['user']."',";
            $sql .= "'".$data['password']."',";
            $sql .= '1, ';
            $sql .= $data['duration'];
            $sql .= ")";
        } else {
            $sql = "UPDATE devices SET ";
            $sql .= "company=".$data['company'].', ';
            $sql .= "url='".$data['url']."', ";
            $sql .= "delimeter='".$data['delimeter']."', ";
            $sql .= "\"user\"='".$data['user']."', ";
            $sql .= "password='".$data['password']."', ";
            $sql .= "duration=".$data['duration'];

            $sql .= " WHERE id=".$data['id']; 
        }
        
        $this->db->query($sql);
        
        return $this->getDevices();
    }    
}
