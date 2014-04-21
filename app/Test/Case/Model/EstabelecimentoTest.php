<?php
App::uses('Estabelecimento', 'Model');

/**
 * Estabelecimento Test Case
 *
 */
class EstabelecimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estabelecimento',
		'app.comentario',
		'app.usuario',
		'app.comentarios_estabelecimento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Estabelecimento = ClassRegistry::init('Estabelecimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estabelecimento);

		parent::tearDown();
	}

}
