<?php
App::Uses('AppController','Controller');
App::Uses('AlzheimersController','AdministrateursController');
App::Uses('PatientsController','PraticiensController');
App::Uses('GrossesseArisquesController','DiabetiquesController');
App::Uses('AlzheimersController','AssistantMedicalsController');

CakePlugin::loadAll();

class MedecinsController extends AppController {

var $name = 'Medecin';

     public $components = array('Paginator',
    'Session','Flash',
    'Auth' => array(

      'loginAction' => array('controller' => 'Medecins', 'action' => 'login'),
      'loginRedirect' => array('controller' => 'Medecins', 'action' => 'medecinpage'),
      'logoutRedirect' => array('controller' => 'Medecins', 'action' => 'login'),
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
         
         $this->Auth->allow('login','medecinpage','listeDiabetique','logout','listeAlzheimer','listeGrossesse',
          'listeMedecin','listeAssistant','InfoDiabetique','InfoAlzheimer','InfoGrossesse','InfoAssistant',
          'choisirAssistantAlzheimer','choisirAssistantAlzheimer1');
     }


//=======================================================================================================================//


public function login() {
          
       /// si les informations sont posté par l'utilisateur   
         if ($this->request->is('post')) {
            
             $options = array(
                 'conditions' => array(
                     'Medecin.username' => $this->request->data['Medecin']['username'],
                     'Medecin.password' => $this->request->data['Medecin']['password'],

                 ),
                 'fields' => array(
                     'Medecin.id',
                     'Medecin.username',


                 )
             );
             
           /// verifier si les informations entrées sont dans la base de données 
             $userData = $this->Medecin->find('first', $options);
            
             $userDat = $this->Medecin->find('list', array('conditions' => array(
                     'Medecin.username' => $this->request->data['Medecin']['username'],
                     

                 ),
                 'fields' => array(
                     'Medecin.id',
                     

// other fields you need
                 )));
             
              
                

     
             if (!empty($userData) && $this->Auth->login($userData['Medecin'])) {
                 $this->redirect($this->Auth->redirectUrl());
             } else {

                
                 $this->Session->setFlash(__('Username, and/or password are incorrect'));
                 
                  
                   
               
              
             }
        
     }
         
}
  
//==============================================================================================================//
    public function logout() {
         //si logout rediriger vers la page definie
         $this->redirect($this->Auth->logout());

     }
//==============================================================================================================//
  public function medecinpage(){

     /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


   // chercher les diabetiques qui ont un taux de glycémie superieur à 1.6 g/l
    $listem = $this->Medecin->Diabetique->find('all',array('conditions'=> array('Diabetique.tauxGlycemie >'=>1.6)));
         $this->set('data',$listem);

         // chercher les grossesses qui ont un taux de glycémie superieur à 1.6 g/l
    $listem1 = $this->Medecin->GrossesseArisque->find('all',array('conditions'=> array('GrossesseArisque.tauxGlycemie >'=>1.6)));
         $this->set('data1',$listem1);


        

  }    
   

//================================================================================================================//  
   public function listeDiabetique(){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


        

        
          /// la liste des diabetiques
         $listed = $this->Medecin->Diabetique->find('all',array('conditions'=>array('Diabetique.medecin_id'=>$user_id)));
         $this->set('data',$listed);

       
   }

   //==============================================================================================================//

   public function listeAlzheimer(){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


         /// la liste des atteints d'Alzheimer
         $listea = $this->Medecin->Alzheimer->find('all',array('conditions'=>array('Alzheimer.medecin_id'=>$user_id)));
         $this->set('data1',$listea);

   }

   //================================================================================================================//

   public function listeGrossesse(){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);



         /// la liste des grossesses
         $listeg = $this->Medecin->GrossesseArisque->find('all',array('conditions'=>array('GrossesseArisque.medecin_id'=>$user_id)));
         $this->set('data2',$listeg);
       
   }

//====================================================================================================================//
   public function listeMedecin(){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


         /// la liste des medecins
         $listem = $this->Medecin->find('all');
         $this->set('data3',$listem);

       
   }
    
//=====================================================================================================================//
    public function listeAssistant(){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);

 

         /// la liste des assistants
         $listes = $this->Medecin->AssistantMedical->find('all');
         $this->set('data4',$listes);

       
   }
   //==================================================================================================================//


   public function InfoDiabetique($id = null){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


        

        
          /// la liste des diabetiques
         $listed = $this->Medecin->Diabetique->find('all',array('conditions'=> array(array('AND'=>array('Diabetique.medecin_id'=>$user_id ,
                'Diabetique.id'=>$id)))));
         $this->set('data',$listed);

       
   }

   //==============================================================================================================//

   public function InfoAlzheimer($id = null){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


        

        
          /// la liste des atteints d'alzheimer
         $listed = $this->Medecin->Alzheimer->find('all',array('conditions'=> array(array('AND'=>array('Alzheimer.medecin_id'=>$user_id ,
                'Alzheimer.id'=>$id)))));
         $this->set('data',$listed);

       
   }

   //==============================================================================================================//


   public function InfoGrossesse($id = null){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


        

        
          /// la liste des atteints d'alzheimer
         $listed = $this->Medecin->GrossesseArisque->find('all',array('conditions'=> array(array('AND'=>array('GrossesseArisque.medecin_id'=>$user_id ,
                'GrossesseArisque.id'=>$id)))));
         $this->set('data',$listed);

       
   }

   //==============================================================================================================//

   public function InfoAssistant($id = null){
       
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);


        

        
          /// la liste des atteints d'alzheimer
         $listed = $this->Medecin->AssistantMedical->find('all',array('conditions'=> array(array('AND'=>array(
                'AssistantMedical.id'=>$id)))));
         $this->set('data',$listed);

       
   }

   

   //==================================Affecter un medecin aux Alzheimer =============================//

 public function choisirAssistantAlzheimer($id= null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);
         /// la liste des assistants
         $listem = $this->Medecin->AssistantMedical->find('all',array('conditions'=> array('AssistantMedical.idAlzheimer'=>null)));
         $this->set('data3',$listem);

         // la liste des patients alzheimer
         $Diabe= $this->Medecin->Alzheimer->find('all', array('conditions'=> array('Alzheimer.id'=>$id)));
         $this->set('idD',$Diabe);
        
     
     


 }

 //=======================================================================================================//

 public function choisirAssistantAlzheimer1($id= null,$pat_id = null){

  /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);
        

     if ($this->request->is('post')) {

             


             $this->Medecin->AssistantMedical->updateAll(
                
                 array('AssistantMedical.idAlzheimer' => $pat_id),
                 array('AssistantMedical.id' => $id)
             );

             $this->Medecin->Alzheimer->updateAll(
                
                 array('Alzheimer.idAssistant' => $id),
                 array('Alzheimer.id' => $pat_id)
             );
        


             $this->redirect(array('controller' => 'Medecins', 'action' => 'listeAlzheimer'));
         }



 }

 //================================================================================================================//
 public function calendrier(){
  
   /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

     $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);
 }

  public function affectationpage() {
 
       /*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

         $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);
  }


  public function urgence() {
/*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

         $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);
  }

    public function indication() {
/*recuperer l'identifiant de medecin autentifie*/
         $user_id = $this->Auth->user('id');

         /// recuperer les informations de l'administrateur

         $av= $this->Medecin->find('all', array('conditions'=> array('Medecin.id'=>$user_id)));
         $this->set('photo',$av);
  }

}