<?php	
	

    class FormationSession extends Model{
		
		protected $_formation = null;
		
		protected $_session_trainee = null;
		protected $_time_sheet = null;
		
		protected $_table = "formation_sessions";
		protected $_fields = array(
									'id' 					=> 0,
									'begin_date' 			=> '',
									'ending_date' 			=> '',
									'formations_id'			=> 0		
		
		);		
		
		public function construct(){
			
		}
		
		//récupere l'instance de la formation ou en crée une si non existante
		public function getFormation(){
			
			if(!$this->_formation){
				
				$f = App::getModel('Formation');
				$f -> load($this-> getData('formations_id') );
				$this->_formation = $f;
				
			}
				
			return $this -> _formation;
			
		}
		
		//récupere la collection des session trainee
		public function getSessionTrainee(){
			
			if($this->_session_trainee){
				
				return $this -> _session_trainee;

			}
			
		}
		
		//Récupere la collection des emplois du temps
		public function getTimeSheet(){
			
			if($this->_time_sheet){
				
				return $this -> _time_sheet;

			}
			
		} 		
	}