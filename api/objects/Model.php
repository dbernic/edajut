<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    
    public function getObjects(){
        $sql = "SELECT * FROM objects ORDER BY id";
        return DB::get()->getArray($sql);
    }
            
    public function saveObject($data){
        $array = [
            'name'=>$data['name'],   
        ];
        
        if (empty($data['id'])){
            DB::get()->insertInto('objects', $array);
        } else {  
            DB::get()->updateById('objects', $array, $data['id']);
        }
        
        return $this->getObjects();
    }
    public function deleteObject($id){
        DB::get()->deleteById('objects', $id);
        return $this->getObjects();
    }

}
