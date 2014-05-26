<?php
App::uses('Carrossel', 'Model');

/**
 * Carrossel Test Case
 *
 */
class CarrosselTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.carrossel'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Carrossel = ClassRegistry::init('Carrossel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Carrossel);

		parent::tearDown();
	}

}
