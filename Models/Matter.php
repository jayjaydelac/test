<?php
    

    class Matter extends Model{
		
		protected $_ref_pedago = null;
		protected $_level = null;
		
		protected $_table = "matters";
		protected $_fields = array(
									'id' 		=> 0,
									'title' 	=> ''	
		
		);

		public function __contruct(){
			
			
		}
		
		//permet de récuperé la collection des reférence pédagogique
		public function getRedPedago(){
			
			if($this->_ref_pedago){
				
				return $this -> _ref_pedago;

			}
			
		}
		
		//permet de récuperé la collection des niveaux
		public function getLevel(){
			
			if($this->_level){
				
				return $this -> _level;

			}
			
		}	
	}
	
?>