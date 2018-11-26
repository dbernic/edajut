<?php
/**
 * Description of Model
 *
 * @author dbernic
 */
class Model {
    
    
    public function getProducts($data){
//        $data = ;
        $array = [$data['class'],$data['object']];
        
        $sql = 'SELECT * FROM products WHERE clas_num=? AND object_id=?';
        return DB::get()->selectPrepared($sql, $array);
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
