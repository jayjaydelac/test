<?php  

class FormationSessionController{
	
	public function __contruct(){
	}
	
	public function indexAction(){
		
		//appel la méthode getItems de la class Collection avec la parametre qui va bien
		$collection = App::getCollection('FormationSession');				
        
        //On crée la requete via les méthode de création de requete
        $collection->select();	
		
        //requete construite, on recupe le resultat
    	$coll_forsess = $collection->getItems();

		//On transmet via setDatas() la collection de formation dans un tableau associatif
		Template::getInstance()->setFileName("FormationSession/list_formationsession")->setDatas(array(
			'coll_forsess' => $coll_forsess
		))->render();
	
	}
	
	public function editAction(){
		
		//on charge le model de formation
		$maFormationSession = App::getModel('FormationSession');
		
        //crée la liste des matières via une collection
        $collection = App::getCollection('Formation');
        $collection->select();
        $coll_for = $collection->getItems();        
        
		if( isset($_GET['id']) ){
			
			$maFormationSession->load($_GET['id']);
			
		}
		
		if( isset($_POST['submit']) ) {
			//Si id existe et n'est pas vide, on modifie
			if( isset($_POST['id']) && !empty($_POST['id']) ){
				
				$maFormationSession->store( array(	'id'=> $_POST['id']	));
				
			}else{//sinon c'est une création
				
				$maFormationSession->store( array(	'id'=> 0 ));			
				
			}
			
			$maFormationSession->store( array(
						
						'begin_date' 					=> $_POST['begin_date'],
						'ending_date'					=> $_POST['ending_date'],
						'formations_id'					=> $_POST['formations']

													
			));
	
			

			//on appelle la méthode qui stock les infos dans l'objet crée
			$maFormationSession->save();
            
			
            //Formation et les réf pedago lié sont crée, on retoure au listing
			header("Location: index.php?c=FormationSession");
		}	
			//On transmet via setDatas() la collection de formation dans un tableau associatif
			Template::getInstance()->setFileName("FormationSession/edit_formationsession")->setDatas(array(
				'maFormationSession'   => $maFormationSession,
				'coll_for'   => $coll_for
			))->render();
		
	}
	
    //Trop dangereux pour l'projet, ne pas utilisé
	public function deleteAction(){
		
		$maFormationSession = App::getModel("FormationSession");
		
		if( isset($_GET['id']) ){
		
			$maFormationSession->load($_GET['id']);
			$maFormationSession->delete();
			header("Location: index.php?c=FormationSession");
			
		}
		
	}

}
