<?php
App::Uses('AppController','Controller');
App::Uses('AlzheimersController','AdministrateursController');
App::Uses('PatientsController','PraticiensController');
App::Uses('GrossesseArisquesController','DiabetiquesController');
App::Uses('AlzheimersController','MedecinsController');

class AssistantMedicalsController extends AppController {




	 var $name = 'AssistantMedicals';

     public $components = array('Paginator',
    'Session','Flash',
    'Auth' => array(

      'loginAction' => array('controller' => 'AssistantMedicals', 'action' => 'login'),
      'loginRedirect' => array('controller' => 'AssistantMedicals', 'action' => 'assistantpage'),
      'logoutRedirect' => array('controller' => 'AssistantMedicals', 'action' => 'login'),
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
         
         $this->Auth->allow('login','assistantpage');
     }


//=======================================================================================================================//


public function login() {
          
       /// si les informations sont posté par l'utilisateur   
         if ($this->request->is('post')) {
            
             $options = array(
                 'conditions' => array(
                     'AssistantMedical.username' => $this->request->data['AssistantMedical']['username'],
                     'AssistantMedical.password' => $this->request->data['AssistantMedical']['password'],

                 ),
                 'fields' => array(
                     'AssistantMedical.id',
                     'AssistantMedical.username',


                 )
             );
             
           /// verifier si les informations entrées sont dans la base de données 
             $userData = $this->AssistantMedical->find('first', $options);
            
             $userDat = $this->AssistantMedical->find('list', array('conditions' => array(
                     'AssistantMedical.username' => $this->request->data['AssistantMedical']['username'],
                     

                 ),
                 'fields' => array(
                     'AssistantMedical.id',
                     

// other fields you need
                 )));
             
              
                

     
             if (!empty($userData) && $this->Auth->login($userData['AssistantMedical'])) {
                 $this->redirect($this->Auth->redirectUrl());
             } else {

                
                 $this->Session->setFlash(__('Username, and/or password are incorrect'));
                 
                  
                   
               
              
             }
        
     }
         
}
  

  public function assistantpage(){

  }    
    

}