<?php
App::uses('Destaque', 'Model');

/**
 * Destaque Test Case
 *
 */
class DestaqueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.destaque',
		'app.estabelecimento',
		'app.categoria',
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
		$this->Destaque = ClassRegistry::init('Destaque');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Destaque);

		parent::tearDown();
	}

}
