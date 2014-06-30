<?php
App::uses('CategoriasEstabelecimento', 'Model');

/**
 * CategoriasEstabelecimento Test Case
 *
 */
class CategoriasEstabelecimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorias_estabelecimento',
		'app.categoria',
		'app.estabelecimento',
		'app.usuarios_administrativo',
		'app.cliente',
		'app.estado',
		'app.comentario',
		'app.usuario',
		'app.perfil',
		'app.cartao',
		'app.cartoes_estabelecimento',
		'app.subcategoria',
		'app.estabelecimentos_subcategoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriasEstabelecimento = ClassRegistry::init('CategoriasEstabelecimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriasEstabelecimento);

		parent::tearDown();
	}

}
