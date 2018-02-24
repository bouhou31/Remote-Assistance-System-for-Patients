<?php

App::uses('AppModel', 'Model');
class Alzheimer extends AppModel {

	var $name = 'Alzheimer';
	public $ActsAs = array('Containable');
	
var $belongsTo = array(

        'Medecin' => array(
            'className'   => 'Medecin',       // name of the Model
            'foreignKey'  => 'medecin_id',  // foreign key for this relation
        ),
    );

	
	
}