<?php
App::uses('ComentariosEstabelecimento', 'Model');

/**
 * ComentariosEstabelecimento Test Case
 *
 */
class ComentariosEstabelecimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comentarios_estabelecimento',
		'app.estabelecimento',
		'app.comentario',
		'app.usuario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ComentariosEstabelecimento = ClassRegistry::init('ComentariosEstabelecimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ComentariosEstabelecimento);

		parent::tearDown();
	}

}
