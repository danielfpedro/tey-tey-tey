<?php
App::uses('AppModel', 'Model');
/**
 * Estabelecimento Model
 *
 * @property Comentario $Comentario
 */
class Estabelecimento extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Comentario' => array(
			'className' => 'Comentario',
			'joinTable' => 'comentarios_estabelecimentos',
			'foreignKey' => 'estabelecimento_id',
			'associationForeignKey' => 'comentario_id',
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
