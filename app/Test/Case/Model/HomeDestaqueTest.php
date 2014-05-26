<?php
App::uses('HomeDestaque', 'Model');

/**
 * HomeDestaque Test Case
 *
 */
class HomeDestaqueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.home_destaque'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HomeDestaque = ClassRegistry::init('HomeDestaque');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HomeDestaque);

		parent::tearDown();
	}

}
