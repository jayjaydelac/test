<?php

class MatterCollection extends Collection {
	
	protected $_items = null;
	
	public function __construct(){
		
		$this -> _table = "matters";
		
		$this -> _model_name = "Matter";
		
	}	
	
	
	
}

?>