<?php
App::uses('Proto', 'Model');

/**
 * Proto Test Case
 *
 */
class ProtoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.proto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Proto = ClassRegistry::init('Proto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proto);

		parent::tearDown();
	}

}
