<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    
    public function getProducts(){
        return DB::get()->selectTable('products');
    }
    
    public function getObjects(){
        return DB::get()->selectTable('objects');
    }
            
    public function saveProduct($data){
        $array = [
            'name'=>$data['name'],   
        ];
        
        if (empty($data['id'])){
            DB::get()->insertInto('products', $array);
        } else {  
            DB::get()->updateById('products', $array, $data['id']);
        }
        
        return $this->getObjects();
    }
    public function deleteProduct($id){
        DB::get()->deleteById('products', $id);
        return $this->getObjects();
    }

}
