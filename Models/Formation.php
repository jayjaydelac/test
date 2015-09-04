<?php

    class Formation extends Model{
    	
		protected $_ref_pedago = null;
		protected $_formation_session = null;
		
		protected $_table = "formations";
		protected $_fields = array(
									'id' 							=> 0,
									'title' 						=> '',
									'average_effective' 			=> 0,
									'convention_hour_center'		=> 0,
									'convention_hour_company' 		=> 0,
									'deal_code' 					=> '',
									'order_giver' 					=> '',
									'deal_begin_date' 				=> '',
									'deal_ending_date' 				=> ''
		
		);
        
        public function __construct(){
            
        }
		
		public function getTable(){
			
			return $this -> _table;
		}
		
		//permet de récuperé la collection des reférence pédagogique
		public function getRefPedago(){
			
			if($this->_ref_pedago){
				
				return $this -> _ref_pedago;

			}
			
		}
		public function setRefPedago($a){
			
			$this -> _ref_pedago = $a;
			
			return $this;
			
		}
		//permet de récuperé la collection des formations session------
		public function getFormationSessions(){
			
			if($this->_formation_session){
				
				return $this -> _formation_session;

			}
			
		}
		public function setFormationSessions($a){
			
			$this -> _formation_session = $a;
			
			return $this;
			
		}
    }
    
?>