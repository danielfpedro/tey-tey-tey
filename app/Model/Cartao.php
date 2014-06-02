<?php
App::uses('AppModel', 'Model');
/**
 * Cartao Model
 *
 * @property Estabelecimento $Estabelecimento
 */
class Cartao extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Estabelecimento' => array(
			'className' => 'Estabelecimento',
			'joinTable' => 'cartoes_estabelecimentos',
			'foreignKey' => 'cartao_id',
			'associationForeignKey' => 'estabelecimento_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
