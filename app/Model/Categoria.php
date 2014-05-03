<?php
App::uses('AppModel', 'Model');
/**
 * Categoria Model
 *
 * @property Estabelecimento $Estabelecimento
 */
class Categoria extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Estabelecimento' => array(
			'className' => 'Estabelecimento',
			'foreignKey' => 'categoria_id',
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
