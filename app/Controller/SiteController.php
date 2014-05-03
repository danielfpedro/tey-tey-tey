<?php
App::uses('AppController', 'Controller');
/**
 * Site Controller
 *
 */
class SiteController extends AppController {
	
	public $layout = 'Site/default';

	public function perfil($id = null) {
		$this->loadModel('Estabelecimento');
		
		$estabelecimento = $this->Estabelecimento->find('first', array('Estabelecimento.id'=> $id));

		$this->set(compact('estabelecimento'));
	}

}
