<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('appHelper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class SiteHelper extends AppHelper {

	public $helpers = array('Html','Text');

	public function getAvatar($usuario) {
		if (!empty($usuario['Perfil']['imagem'])) {
			$img_url = ''.
				'Usuarios/' . 
				$usuario['Usuario']['id'] .
				'/' . 
				$usuario['Perfil']['imagem'];
		}elseif (!empty($usuario['Usuario']['facebook_id'])) {
			$img_url = 'https://graph.facebook.com/' .
				$usuario['Usuario']['facebook_id'].
				'/picture?type=normal';
			
		} else {
			$img_url = 'Usuarios/default_avatar.png';
		}
		return $img_url;
	}

}
