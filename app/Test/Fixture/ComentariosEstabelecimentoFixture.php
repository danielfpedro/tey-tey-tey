<?php
/**
 * ComentariosEstabelecimentoFixture
 *
 */
class ComentariosEstabelecimentoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'estabelecimento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'comentario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_estabelecimentos_comentarios_comentarios1_idx' => array('column' => 'comentario_id', 'unique' => 0),
			'fk_estabelecimentos_comentarios_estabelecimentos_idx' => array('column' => 'estabelecimento_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'estabelecimento_id' => 1,
			'comentario_id' => 1
		),
	);

}
