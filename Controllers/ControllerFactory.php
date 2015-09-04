<?php

	class ControllerFactory {
	
	
		/*
		 * 
		 */
		public static function createController() {
			$controller = 'FrontController';
			
			if( isset( $_GET['c'] ) ) {
				if( file_exists( dirname(dirname(__FILE__)) . '/Controllers/' . $_GET['c'] . 'Controller.php' ) ) {
					$controller = $_GET['c'] . 'Controller';
				}
			}
			include_once ( dirname(dirname(__FILE__)) . '/Controllers/' . $controller . '.php');
			return new $controller();
		}
	
	
	}

?>