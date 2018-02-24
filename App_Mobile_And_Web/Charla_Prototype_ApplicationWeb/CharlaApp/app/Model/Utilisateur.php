<?php

App::uses('AppModel', 'Model');
class Utilisateur extends AppModel {

	
	
var $name = 'Utilisateur';
	public $ActsAs = array('Containable');
//les relations entre utilisateur et les autres tables

//un utilisateur a un seul compte
	var $hasOne = array(

		'Compte' => array(
			'className'   => 'Compte'       // name of the Model
		)
	);
	


	
	
}