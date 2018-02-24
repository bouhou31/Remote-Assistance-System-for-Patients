<?php

App::uses('AppModel', 'Model');
class GrossesseArisque extends AppModel {

	
	
var $name = 'GrossesseArisque';
	public $ActsAs = array('Containable');
	
  var $belongsTo = array(

        'Medecin' => array(
            'className'   => 'Medecin',       // name of the Model
            'foreignKey'  => 'medecin_id',  // foreign key for this relation
        ),
    );

	
	
}