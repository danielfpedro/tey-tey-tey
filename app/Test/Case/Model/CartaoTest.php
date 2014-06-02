<?php
App::uses('Cartao', 'Model');

/**
 * Cartao Test Case
 *
 */
class CartaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cartao',
		'app.estabelecimento',
		'app.categoria',
		'app.usuarios_administrativo',
		'app.comentario',
		'app.usuario',
		'app.perfil',
		'app.cartoes_estabelecimento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cartao = ClassRegistry::init('Cartao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cartao);

		parent::tearDown();
	}

}
