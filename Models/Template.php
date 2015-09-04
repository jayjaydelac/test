<?php
	class Template{
		
		//attribut du singleton
		private static $_instance = null;
		protected $_filename = "index";
		protected $_datas = array();
		
		private function __construct(){
		}
		
        public function render($option = "vue"){
            
            extract($this -> _datas);
            
            if($option == "vue"){    
                if( file_exists( dirname(dirname('_FILE_'))."/Views/header.phtml" ) ){
                    include_once dirname(dirname('_FILE_'))."/Views/header.phtml";
                }
            }
            
            if( file_exists( dirname(dirname('_FILE_'))."/Views/".$this->_filename.".phtml" ) ){
                include_once dirname(dirname('_FILE_'))."/Views/".$this->_filename.".phtml";
            }
            
            if($option == "vue"){  
                if( file_exists( dirname(dirname('_FILE_'))."/Views/footer.phtml" ) ){
                    include_once dirname(dirname('_FILE_'))."/Views/footer.phtml";
                }
            }    
        }
		
		//singleton
		public static function getInstance(){
			if(!self::$_instance){
				self::$_instance = new Template();
			}
			return self::$_instance;
		}
		
		//Prend en parametre un string
		public function setFileName($a){
			$this -> _filename = $a;
			return $this;
		}
		
		//Prend un parametre un array()
		//Cette méthode permet de pouvoir transferé des tableaux de donnée dans une vue
		public function setDatas($a){
			$this -> _datas = $a;
			return $this;
		
		}
	
	}
?>