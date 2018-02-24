<?php
/**
 
 */

App::uses('Controller', 'Controller');


class AppController extends Controller {

	public function initialize()
	{
		$this->loadComponent('Flash');
	}
}
