<?php
/**
 * EstabelecimentoFixture
 *
 */
class EstabelecimentoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'site' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'endereco' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_fumantes' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'faz_reserva' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'ar_condicionado' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'estacionamento' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'ar_livre' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'descricao' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 140, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'rate' => array('type' => 'string', 'null' => true, 'default' => '0', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'categoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'usuarios_administrativo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'desde' => array('type' => 'integer', 'null' => true, 'default' => null),
		'imagem' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cidade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_estabelecimentos_categorias1_idx' => array('column' => 'categoria_id', 'unique' => 0),
			'fk_estabelecimentos_usuarios_administrativos1_idx' => array('column' => 'usuarios_administrativo_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-05-22 02:51:29',
			'modified' => '2014-05-22 02:51:29',
			'site' => 'Lorem ipsum dolor sit amet',
			'telefone' => 'Lorem ipsum dolor sit a',
			'endereco' => 'Lorem ipsum dolor sit amet',
			'area_fumantes' => 1,
			'faz_reserva' => 1,
			'ar_condicionado' => 1,
			'estacionamento' => 1,
			'ar_livre' => 1,
			'descricao' => 'Lorem ipsum dolor sit amet',
			'rate' => 'Lorem ipsum dolor sit amet',
			'categoria_id' => 1,
			'usuarios_administrativo_id' => 1,
			'desde' => 1,
			'imagem' => 'Lorem ipsum dolor sit amet',
			'cidade' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet'
		),
	);

}
