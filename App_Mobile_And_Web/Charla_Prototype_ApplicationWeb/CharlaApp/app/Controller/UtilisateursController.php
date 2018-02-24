<?php
App::Uses('AppController','Controller');

App::Uses('ComptesController','UtilisationsController');

class UtilisateursController extends AppController {


  public function bienvenue(){

  }
    
     public function signup()
     {
         //si l'utilisateurs a met les données
             if (!empty($this->data)) {
                 $this->Utilisateur->create();
                 if ($this->Utilisateur->save( $this->data )) {
                     //creer un profil pour le nouveau utilisateur
                 	 $this->Utilisateur->Compte->create();
                     $this->request->data['Compte']['nss'] = $this->Utilisateur->id;
                     $this->Utilisateur->Compte->save($this->request->data);
                  
                     //rediriger vers la page bienvenue
                     $this->redirect(array('controller'=>'Utilisateurs','action'=>'bienvenue'));
                // }
            // }


             } else {
                 //sinon affciher un notification d'erreur
                 $this->Session->setFlash('Merci de corriger vos erreurs');

             }
         }

     }

}