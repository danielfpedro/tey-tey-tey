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
		'imagem' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'endereco' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cidade' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tipo_comida' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'horario_funcionamento' => array('type' => 'time', 'null' => false, 'default' => null),
		'site' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_fumantes' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'ar_livre' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'ar_condicionado' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'faz_reserva' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'estacionamento' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'faz_entrega' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'wifi' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'acesso_deficiente' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4),
		'inaugurado' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'rate' => array('type' => 'string', 'null' => true, 'default' => '0', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'categoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'usuarios_administrativo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tipo_cadastro' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_estabelecimentos_categorias1_idx' => array('column' => 'categoria_id', 'unique' => 0),
			'fk_estabelecimentos_usuarios_administrativos1_idx' => array('column' => 'usuarios_administrativo_id', 'unique' => 0),
			'fk_estabelecimentos_clientes1_idx' => array('column' => 'cliente_id', 'unique' => 0)
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
			'imagem' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'endereco' => 'Lorem ipsum dolor sit amet',
			'cidade' => 'Lorem ipsum dolor sit amet',
			'telefone' => 'Lorem ipsum dolor sit a',
			'tipo_comida' => 'Lorem ipsum dolor sit amet',
			'horario_funcionamento' => '23:01:13',
			'site' => 'Lorem ipsum dolor sit amet',
			'area_fumantes' => 1,
			'ar_livre' => 1,
			'ar_condicionado' => 1,
			'faz_reserva' => 1,
			'estacionamento' => 1,
			'faz_entrega' => 1,
			'wifi' => 'Lorem ipsum dolor sit amet',
			'acesso_deficiente' => 1,
			'inaugurado' => '2014-06-01',
			'created' => '2014-06-01 23:01:13',
			'modified' => '2014-06-01 23:01:13',
			'rate' => 'Lorem ipsum dolor sit amet',
			'categoria_id' => 1,
			'usuarios_administrativo_id' => 1,
			'slug' => 'Lorem ipsum dolor sit amet',
			'tipo_cadastro' => 1,
			'cliente_id' => 1
		),
	);

}
