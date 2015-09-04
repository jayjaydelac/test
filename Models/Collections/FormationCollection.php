<?php

class FormationCollection extends Collection {
	
	protected $_items = null;
	
	public function __construct(){
		
		$this -> _table = "formations";
		
		$this -> _model_name = "Formation";
		
	}	
	

}

?>