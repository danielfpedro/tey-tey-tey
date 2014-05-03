<?php
App::uses('AppModel', 'Model');
/**
 * UsuariosAdministrativo Model
 *
 * @property Estabelecimento $Estabelecimento
 */
class UsuariosAdministrativo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Estabelecimento' => array(
			'className' => 'Estabelecimento',
			'foreignKey' => 'usuarios_administrativo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
