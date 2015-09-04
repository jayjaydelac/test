<?php  

class FormationController{
	
	public function __contruct(){
	}
	
	public function indexAction(){
		
		//appel la méthode getItems de la class Collection avec la parametre qui va bien
		$collection = App::getCollection('Formation');
        //On crée la requete via les méthode de création de requete
        $collection->select();	
		
        //requete construite, on recupe le resultat
    	$coll_for = $collection->getItems();

		//On transmet via setDatas() la collection de formation dans un tableau associatif
		Template::getInstance()->setFileName("Formation/list_formations")->setDatas(array(
			'coll_for' => $coll_for
		))->render();
	
	}
	
	public function editAction(){
		
		//on charge le model de formation
		$maFormation = App::getModel('Formation');
		
        //crée la liste des matières via une collection
        $collection = App::getCollection('Matter');
        $collection->select();
        $coll_matter = $collection->getItems();        
        
		if( isset($_GET['id']) ){
			
			$maFormation->load($_GET['id']);
			
		}
		
		if( isset($_POST['submit']) ) {
			//Si id existe et n'est pas vide, on modifie
			if( isset($_POST['id']) && !empty($_POST['id']) ){
				
				$maFormation->store( array(	'id'=> $_POST['id']	));
				
			}else{//sinon c'est une création
				
				$maFormation->store( array(	'id'=> 0 ));			
				
			}
			
			$maFormation->store( array(
						'title' 						=> $_POST['title'],
						'average_effective' 			=> $_POST['average_effective'],
						'convention_hour_center'		=> $_POST['convention_hour_center'],
						'convention_hour_company' 		=> $_POST['convention_hour_company'],
						'deal_code' 					=> $_POST['deal_code'],
						'order_giver' 					=> $_POST['order_giver'],
						'deal_begin_date' 				=> $_POST['deal_begin_date'],
						'deal_ending_date' 				=> $_POST['deal_ending_date']							
			));
	
			

			//on appelle la méthode qui stock les infos dans l'objet crée
			$maFormation->save();
            
            //On prépare la sauvegardes des references pedagogique lié a la formation
            for( $i=0;$i<count($_POST['matters']);$i++){
                
                //on crée un model de refpedago
                $ref = App::getModel('RefPedago');
                //on store l'ID de la formation qui vien d'être crée et l'ID de la matière courante
                $ref->store( array(
                    'formations_id' =>  $maFormation->getData('id'),
                    'matters_id'    =>  $_POST['matters'][$i]
                ));
                //On sauvegarde dans la bdd la réf pedago une fois initialisé
                $ref->save();
                
            }
			
            //Formation et les réf pedago lié sont crée, on retoure au listing
			header("Location: index.php?c=Formation");
		}	
			//On transmet via setDatas() la collection de formation dans un tableau associatif
			Template::getInstance()->setFileName("Formation/edit_formations")->setDatas(array(
				'maFormation'   => $maFormation,
				'coll_matter'   => $coll_matter
			))->render();
		
	}
	
    //Trop dangereux pour l'projet, ne pas utilisé
	public function deleteAction(){
		
		$maFormation = App::getModel("Formation");
		
		if( isset($_GET['id']) ){
		
			$maFormation->load($_GET['id']);
			$maFormation->delete();
			header("Location: index.php?c=Formation");
			
		}
		
	}

}
