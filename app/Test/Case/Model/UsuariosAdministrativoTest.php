<?php
App::uses('UsuariosAdministrativo', 'Model');

/**
 * UsuariosAdministrativo Test Case
 *
 */
class UsuariosAdministrativoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usuarios_administrativo',
		'app.estabelecimento',
		'app.categoria',
		'app.comentario',
		'app.usuario',
		'app.perfil'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsuariosAdministrativo = ClassRegistry::init('UsuariosAdministrativo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsuariosAdministrativo);

		parent::tearDown();
	}

}
