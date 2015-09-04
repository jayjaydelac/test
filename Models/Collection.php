<?php

include_once('Database.php');

class Collection {

    protected $_items = null;

    protected $_table = "";
    protected $_model_name = "";
    
    protected $_requete = "";
    
    
    public function __construct() {
    }
    
    public function setAttribut($table,$model){
        $this->_table = $table;
        $this->_model_name = $model;
    }
    
    
    public function getItems(){
        
        //si on a pas encore getItems
        if(!$this -> _items){

            $tab_item = array();
            
            if( $result = Database::getInstance()->getResultats( $this->_requete ) ){
                
                foreach ($result as $key => $value) {   
                    
                    //crée une instance de class
                    $newitem = App::getModel($this->_model_name);
                    
                    //charge l'instance avec le n-eme id
                    $tab_item[] = $newitem -> load($value['id']);
                    
                }
                $this->_items = $tab_item;
                
                return $tab_item;
                
            }
        }else{
            
            //si on a déjà getItem, retourné l'tableau déjà crée 
            return $this->_items;
            
        }
    }
    
    public function select($a = ""){
        
        if( empty($a) ){
            
            $this->_requete = 'SELECT * FROM '.$this->_table;
                    
        }else{
            
            $this->_requete = 'SELECT '.$a.' FROM '.$this->_table;
                      
        }
        return $this;
        
    } 
      
    public function condition($col,$op,$val){
        
        $this->_requete .= $col.' '.$op.' '.$val.' ';
        return $this;
        
    }
    
    public function where(){
        
        $this->_requete .= ' WHERE ';
        return $this; 
        
    }
    
    public function ou(){
        
        $this->_requete .= ' OR ';
        return $this; 
        
    }
    
    public function et(){
        
        $this->_requete .= ' AND ';
        return $this; 
        
    }

}

?>