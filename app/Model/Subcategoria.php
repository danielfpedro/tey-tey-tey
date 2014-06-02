<?php
App::uses('AppModel', 'Model');
/**
 * Subcategoria Model
 *
 * @property Estabelecimento $Estabelecimento
 */
class Subcategoria extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Estabelecimento' => array(
			'className' => 'Estabelecimento',
			'joinTable' => 'estabelecimentos_subcategorias',
			'foreignKey' => 'subcategoria_id',
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
