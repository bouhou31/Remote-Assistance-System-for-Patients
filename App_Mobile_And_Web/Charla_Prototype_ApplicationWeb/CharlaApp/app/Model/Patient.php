<?php

App::uses('AppModel', 'Model');
class Patient extends AppModel {

	
	var $name = 'Patient';
	public $ActsAs = array('Containable');
	
   var $hasOne = array(
           'Administrateur' => array(
			'className'   => 'Administrateur'       // name of the Model
		)

		
	);


	
	
}