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
    
    public function getUsers(){
        $sql = "SELECT id, login FROM users";
        return $this->db->getArray($sql);
    }
    
    public function getCompanies(){
        $sql = "SELECT * FROM companies";
        return $this->db->getArray($sql);        
    }
            
    function saveCompany($data){
        $sql = '';
        if (empty($data['id'])){
            $sql = "INSERT INTO companies (id, name, contact) VALUES ";
            $sql .= "(";
            $sql .= "nextval('company_id'), ";
            $sql .= "'".$data['name']."',";
            $sql .= $data['contact'];
            $sql .= ")";
        } else {
            $sql = "UPDATE companies SET ";
            $sql .= "name='".$data['name']."', ";
            $sql .= "contact=".$data['contact'];

            $sql .= " WHERE id=".$data['id']; 
        }
        
        $this->db->query($sql);
        
        return $this->getCompanies();
    }    
}
