<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    
    public function getUsers(){
        $sql = "SELECT * FROM users";
        return DB::get()->getArray($sql);
    }
    
    public function getTypes(){
        return Auth::$groups;        
    }
            
    public function saveUser($data){
        $array = [
                'name'=>$data['name'],
                'surname'=>$data['surname'],
                'phone'=>$data['phone'],
                'group'=>$data['group'],
                'login'=>$data['login']     
        ];
        
        if (empty($data['id'])){
            $array['password'] = $this->encryptPass($data['password']);
            DB::get()->insertInto('users', $array);
        } else {
            if (!empty($data['password'])){   
                $array['password'] = $this->encryptPass($data['password']);
            }
            
            DB::get()->updateById('users', $array, $data['id']);
        }
        
        return $this->getUsers();
    }
    
    private function encryptPass($pass){
        return password_hash($pass, PASSWORD_BCRYPT);
    }
}
