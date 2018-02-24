<?php

App::uses('AppModel', 'Model');
class Compte extends AppModel {

	
	public $actsAs = array('Containable');
    var $belongsTo = array(

        'Utilisateur' => array(
            'className'   => 'Utilisateur',       // name of the Model
            'foreignKey'  => 'nss',  // foreign key for this relation
        ),
    );


	
	
}