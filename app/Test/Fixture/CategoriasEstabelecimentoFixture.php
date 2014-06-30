<?php
/**
 * CategoriasEstabelecimentoFixture
 *
 */
class CategoriasEstabelecimentoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'categoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'estabelecimento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_categorias_estabelecimentos_estabelecimentos1_idx' => array('column' => 'estabelecimento_id', 'unique' => 0),
			'fk_categorias_estabelecimentos_categorias1_idx' => array('column' => 'categoria_id', 'unique' => 0)
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
			'categoria_id' => 1,
			'estabelecimento_id' => 1
		),
	);

}
