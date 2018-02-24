<?php

App::uses('AppModel', 'Model');
class Praticien extends AppModel {

	
	var $name = 'Praticien';
	public $ActsAs = array('Containable');
	
   var $hasOne = array(
           'Administrateur' => array(
			'className'   => 'Administrateur'       // name of the Model
		)

		
	);


	
	
}