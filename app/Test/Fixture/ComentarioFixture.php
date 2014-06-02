<?php
/**
 * ComentarioFixture
 *
 */
class ComentarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'texto' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 600, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'estabelecimento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'ativo' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_comentarios_usuarios1_idx' => array('column' => 'usuario_id', 'unique' => 0),
			'fk_comentarios_estabelecimentos1_idx' => array('column' => 'estabelecimento_id', 'unique' => 0)
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
			'texto' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-05-27 02:29:36',
			'modified' => '2014-05-27 02:29:36',
			'usuario_id' => 1,
			'estabelecimento_id' => 1,
			'ativo' => 1
		),
	);

}
