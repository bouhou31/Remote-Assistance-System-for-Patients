<?php

App::uses('AppModel', 'Model');
class AssistantMedical extends AppModel {

	var $name = 'AssistantMedical';
	public $ActsAs = array('Containable');
	


   

	
	public $validate = array(
		

		'username'=>array(
			array(

				'rule' => 'alphanumeric',
				'required'=> true,
				'allowEmpty'=>false,
				'message'=>"Votre pseudo n'est pas valide"
			),
			array(
				'rule'=>'isUnique', //il est unique
				'message'=> 'Ce pseudo est déjà pris',
			)

		),

		'password'=>array(
			array(
				'rule'=>'notBlank',
				'allowEmpty'=>false,
				'message'=> "Vous devez entrer un mot de passe"
			),
			array(
				'rule' => array('lengthBetween', 7, 25),  //entre 7 et 25
				'message'=> "Votre mot de passe doit ètre entre 7 et 25 caractères"

			)
		)


	);
	
}