<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    
    public function getUsers(){
        $sql = "SELECT * FROM users";
        return DB::getArray($sql);
    }
    
    public function getTypes(){
        $sql = "SELECT * FROM usertypes";
        return $this->db->getArray($sql);        
    }
    
    public function getCompanies(){
        $sql = "SELECT id,name FROM companies";
        return $this->db->getArray($sql);        
    }
            
    function saveUser($data){
        $sql = '';
        $passhash = password_hash($data['password'], PASSWORD_BCRYPT);
        if (empty($data['id'])){
            $sql = "INSERT INTO users (id, name, phone, address, email, company, type, login, password ) VALUES ";
            $sql .= "(";
            $sql .= "nextval('user_id'), ";
            $sql .= "'".$data['name']."',";
            $sql .= "'".$data['phone']."',";
            $sql .= "'".$data['address']."',";
            $sql .= "'".$data['email']."',";
            $sql .= $data['company'].",";
            $sql .= $data['type'].",";
            $sql .= "'".$data['login']."',";
            $sql .= "'".$passhash."'";            
            $sql .= ")";
        } else {
            $sql = "UPDATE users SET ";
            $sql .= "name='".$data['name']."', ";
            $sql .= "phone='".$data['phone']."', ";
            $sql .= "address='".$data['address']."', ";
            $sql .= "email='".$data['email']."', ";
            $sql .= "company=".$data['company'].", ";
            $sql .= "type=".$data['type'].", ";
            if ($data['password'] !==''){   
                $sql .= "password='".$passhash."', ";
            }            
            $sql .= "login='".$data['login']."'";

            $sql .= " WHERE id=".$data['id']; 
        }
        
        $this->db->query($sql);
        
        return $this->getUsers();
    }    
}
