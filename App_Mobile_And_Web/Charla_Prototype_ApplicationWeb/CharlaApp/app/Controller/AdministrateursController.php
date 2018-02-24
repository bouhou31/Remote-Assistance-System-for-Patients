<?php
App::Uses('AppController','Controller');
App::Uses('AssistantMedicalsController','UtilisateursController');
App::Uses('PatientsController','PraticiensController');
App::Uses('GrossesseArisquesController','DiabetiquesController');
App::Uses('AlzheimersController','MedecinsController');

CakePlugin::loadAll();


class AdministrateursController extends AppController {

     
     var $name = 'Administrateurs';

     public $components = array('Paginator',
    'Session','Flash',
    'Auth' => array(

      'loginAction' => array('controller' => 'Administrateurs', 'action' => 'login'),
      'loginRedirect' => array('controller' => 'Administrateurs', 'action' => 'adminpage'),
      'logoutRedirect' => array('controller' => 'Administrateurs', 'action' => 'login'),
      'authenticate' => array(
        'Form'=> array(
          'fields' => array(
            'username' => 'username',
            'password' => 'password'))),
      'authError'=>"you can't access that page",
      'authorize'=> array('Controller')
    ));
  

  public function isAuthorized($administrateur = null){
    return true;
  }

  public function beforeFilter() {
         
         $this->Auth->allow('login','creerCompte','adminpage','creerCompteDiabetique','creerCompteAlzheimer',
            'creerCompteGrossesse','creerCompteMedecin','creerCompteAssistant','logout','adminIndex',
            'choisirMedecin1','choisirMedecin','choisirMedecinGrossesse1','choisirMedecinGrossesse',
            'choisirMedecinAlzheimer','choisirMedecinAlzheimer1');
     }

//==============================================================================================================//
     public function logout() {
         //si logout rediriger vers la page definie
         $this->redirect($this->Auth->logout());

     }
//==============================================================================================================//
 public function creerCompteDiabetique(){


/*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);

         /// la liste des medecins
         $listem = $this->Administrateur->Medecin->find('all');
         $this->set('data3',$listem);

 	//si l'utilisateurs a met les données
             if (!empty($this->data)) {
                 $this->Administrateur->Diabetique->create();

                 if ($this->Administrateur->Diabetique->save( $this->data )) {
                    $this->Administrateur->Diabetique->updateAll(
                     array('Diabetique.administrateur_id' => $user_id)
                 );
                    
                     $this->Administrateur->Diabetique->save($this->request->data);
                  
                     //rediriger vers la page bienvenue
                     $this->redirect(array('controller'=>'Administrateurs','action'=>'creerCompteDiabetique'));
                // }
            // }


             } else {
                 //sinon affciher un notification d'erreur
                 $this->Session->setFlash('Merci de corriger vos erreurs');

             }
         }



 }




 //==================================Affecter un medecin aux patients diabetiques =============================//

 public function choisirMedecin($id= null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);
         /// la liste des medecins
         $listem = $this->Administrateur->Medecin->find('all');
         $this->set('data3',$listem);
         $Diabe= $this->Administrateur->Diabetique->find('all', array('conditions'=> array('Diabetique.id'=>$id)));
         $this->set('idD',$Diabe);
        
     
     


 }

 //=======================================================================================================//

 public function choisirMedecin1($id= null,$pat_id = null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);
        

     if ($this->request->is('post')) {

             


             $this->Administrateur->Diabetique->updateAll(
                
                 array('Diabetique.medecin_id' => $id),
                 array('Diabetique.id' => $pat_id)
             );
        


             $this->redirect(array('controller' => 'Administrateurs', 'action' => 'adminIndex'));
         }



 }



 //==================================Affecter un medecin aux Alzheimer =============================//

 public function choisirMedecinAlzheimer($id= null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);
         /// la liste des medecins
         $listem = $this->Administrateur->Medecin->find('all');
         $this->set('data3',$listem);
         $Diabe= $this->Administrateur->Alzheimer->find('all', array('conditions'=> array('Alzheimer.id'=>$id)));
         $this->set('idD',$Diabe);
        
     
     


 }

 //=======================================================================================================//

 public function choisirMedecinAlzheimer1($id= null,$pat_id = null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);
        

     if ($this->request->is('post')) {

             


             $this->Administrateur->Alzheimer->updateAll(
                
                 array('Alzheimer.medecin_id' => $id),
                 array('Alzheimer.id' => $pat_id)
             );
        


             $this->redirect(array('controller' => 'Administrateurs', 'action' => 'adminIndex'));
         }



 }



 //==================================Affecter un medecin aux grossesses =============================//

 public function choisirMedecinGrossesse($id= null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);
         /// la liste des medecins
         $listem = $this->Administrateur->Medecin->find('all');
         $this->set('data3',$listem);
         $Diabe= $this->Administrateur->GrossesseArisque->find('all', array('conditions'=> array('GrossesseArisque.id'=>$id)));
         $this->set('idD',$Diabe);
        
     
     


 }

 //=======================================================================================================//

 public function choisirMedecinGrossesse1($id= null,$pat_id = null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);
        

     if ($this->request->is('post')) {

             


             $this->Administrateur->GrossesseArisque->updateAll(
                
                 array('GrossesseArisque.medecin_id' => $id),
                 array('GrossesseArisque.id' => $pat_id)
             );
        


             $this->redirect(array('controller' => 'Administrateurs', 'action' => 'adminIndex'));
         }



 }

 //=======================================================================================================//

 public function creerCompteAlzheimer(){


    /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);

    //si l'utilisateurs a met les données
             if (!empty($this->data)) {
                 $this->Administrateur->Alzheimer->create();

                 if ($this->Administrateur->Alzheimer->save( $this->data )) {
                    $this->Administrateur->Alzheimer->updateAll(
                     array('Alzheimer.administrateur_id' => $user_id)
                 );
                     
                     $this->Administrateur->Alzheimer->save($this->request->data);
                  
                     //rediriger vers la page bienvenue
                     $this->redirect(array('controller'=>'Administrateurs','action'=>'creerCompteAlzheimer'));
                // }
            // }


             } else {
                 //sinon affciher un notification d'erreur
                 $this->Session->setFlash('Merci de corriger vos erreurs');

             }
         }
 }


  //=======================================================================================================//

 public function creerCompteGrossesse(){


    /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);

    //si l'utilisateurs a met les données
             if (!empty($this->data)) {
                 $this->Administrateur->GrossesseArisque->create();

                 if ($this->Administrateur->GrossesseArisque->save( $this->data )) {

                    $this->Administrateur->GrossesseArisque->updateAll(
                     array('GrossesseArisque.administrateur_id' => $user_id)
                 );
                     
                     $this->Administrateur->GrossesseArisque->save($this->request->data);
                  
                     //rediriger vers la page bienvenue
                     $this->redirect(array('controller'=>'Administrateurs','action'=>'creerCompteGrossesse'));
                // }
            // }


             } else {
                 //sinon affciher un notification d'erreur
                 $this->Session->setFlash('Merci de corriger vos erreurs');

             }
         }

 }
 //=======================================================================================================//

 public function creerCompteMedecin(){


    /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);

    //si l'utilisateurs a met les données
             if (!empty($this->data)) {
                 $this->Administrateur->Medecin->create();

                 if ($this->Administrateur->Medecin->save( $this->data )) {

                    $this->Administrateur->Medecin->updateAll(
                     array('Medecin.administrateur_id' => $user_id)
                 );
                     
                     $this->Administrateur->Medecin->save($this->request->data);
                  
                     //rediriger vers la page bienvenue
                     $this->redirect(array('controller'=>'Administrateurs','action'=>'creerCompteMedecin'));
                // }
            // }


             } else {
                 //sinon affciher un notification d'erreur
                 $this->Session->setFlash('Merci de corriger vos erreurs');

             }
         }

 }

  //=======================================================================================================//

 public function creerCompteAssistant(){

    /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);

    //si l'utilisateurs a met les données
             if (!empty($this->data)) {
                 $this->Administrateur->AssistantMedical->create();

                 if ($this->Administrateur->AssistantMedical->save( $this->data )) {

                    $this->Administrateur->AssistantMedical->updateAll(
                     array('AssistantMedical.administrateur_id' => $user_id)
                 );
                     
                     $this->Administrateur->AssistantMedical->save($this->request->data);
                  
                     //rediriger vers la page bienvenue
                     $this->redirect(array('controller'=>'Administrateurs','action'=>'creerCompteAssistant'));
                // }
            // }


             } else {
                 //sinon affciher un notification d'erreur
                 $this->Session->setFlash('Merci de corriger vos erreurs');

             }
         }

 }

 

//=======================================================================================================================//


public function login() {
          
       /// si les informations sont posté par l'utilisateur   
         if ($this->request->is('post')) {
            
             $options = array(
                 'conditions' => array(
                     'Administrateur.username' => $this->request->data['Administrateur']['username'],
                     'Administrateur.password' => $this->request->data['Administrateur']['password'],

                 ),
                 'fields' => array(
                     'Administrateur.id',
                     'Administrateur.username',


                 )
             );
             
           /// verifier si les informations entrées sont dans la base de données 
             $userData = $this->Administrateur->find('first', $options);
          
             
       
     
             if (!empty($userData) && $this->Auth->login($userData['Administrateur'])) {
                 $this->redirect($this->Auth->redirectUrl());
             } else {

                
                 $this->Session->setFlash(__('Username, and/or password are incorrect'));
                 
                  
                   
               
              
             }
        
     }
         
}
      
     
      

  
      

   //===========================================================================================================//

   public function adminpage(){


/*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);
   }

   //=========================================================================================================//

   public function adminIndex(){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Administrateur->find('all', array('conditions'=> array('Administrateur.id'=>$user_id)));
         $this->set('photo',$av);


        /// Recuperer les informations des patients et des praticiens pour avoir la liste 

        
          /// la liste des diabetiques
         $listed = $this->Administrateur->Diabetique->find('all');
         $this->set('data',$listed);


         /// la liste des atteints d'Alzheimer
         $listea = $this->Administrateur->Alzheimer->find('all');
         $this->set('data1',$listea);


         /// la liste des grossesses
         $listeg = $this->Administrateur->GrossesseArisque->find('all');
         $this->set('data2',$listeg);

         /// la liste des medecins
         $listem = $this->Administrateur->Medecin->find('all');
         $this->set('data3',$listem);


         /// la liste des assistants
         $listes = $this->Administrateur->AssistantMedical->find('all');
         $this->set('data4',$listes);


       
   } 

   public function deleteDiabetique($id = null){

        $this->Administrateur->Diabetique->delete($id);
        $this->redirect(array('controller'=>'Administrateurs','action'=>'adminIndex'));
   }

   public function deleteAlzheimer($id = null){

        $this->Administrateur->Alzheimer->delete($id);
        $this->redirect(array('controller'=>'Administrateurs','action'=>'adminIndex'));
   }
   public function deleteGrossesse($id = null){

        $this->Administrateur->GrossesseArisque->delete($id);
        $this->redirect(array('controller'=>'Administrateurs','action'=>'adminIndex'));
   }
   public function deleteMedecin($id = null){

        $this->Administrateur->Medecin->delete($id);
        $this->redirect(array('controller'=>'Administrateurs','action'=>'adminIndex'));
   }
   public function deleteAssistant($id = null){

        $this->Administrateur->AssistantMedical->delete($id);
        $this->redirect(array('controller'=>'Administrateurs','action'=>'adminIndex'));
   }

}