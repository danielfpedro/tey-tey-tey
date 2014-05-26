<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $site_name = 'Agito Rio Sul';

	function beforeFilter(){
		$this->loadModel('AdminMainMenu');;
		$items_menu = $this->AdminMainMenu->get();

		$site_name = $this->site_name;
		$this->set(compact('items_menu', 'site_name'));
	}

	public function beforeSave($options = array()) {
		if (!empty($this->request->data['UsuariosAdministrativo']['senha'])) {
			$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
				$this->request->data['UsuariosAdministrativo']['senha'] = $passwordHasher->hash(
				$this->request->data['UsuariosAdministrativo']['senha']
			);
		}
		return true;
	}
}
