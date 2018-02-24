<?php

App::uses('AppModel', 'Model');
class Medecin extends AppModel {

	var $name = 'Medecin';
	public $ActsAs = array('Containable');


	public $actsAs = array('Upload.Upload' => array(
		'fields' => array(
			'avatar' => 'img/photo/:y/:uid/:md5/:id1000/:id'

			/*'couverture'=> 'img/photoUser/:y/:uid/:md5/:id1000/:id'*/

		)
	));
	

	var $hasMany = array(
           
		'Diabetique' => array(
			'className'   => 'Diabetique'       // name of the Model
		),
		'Alzheimer' => array(
			'className'   => 'Alzheimer'       // name of the Model
		),
		'GrossesseArisque'=>array(
			'className'=>'GrossesseArisque'
		),
		'AssistantMedical' => array(
			'className'   => 'AssistantMedical'       // name of the Model
		)

		
	);

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
		),

		'avatar'=> array(

           'validAvatar'=>array(
				'fileExtension'=>array('jpg','jpeg','png')),
				'message'=>'Vous ne pouvez envoyer que des jpg ou des png ',
                'rule'=>'notBlank',
				'allowEmpty' =>true

		)


	);


	
	
}