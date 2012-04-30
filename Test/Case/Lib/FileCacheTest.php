<?php
App::import('Lib', 'FileCache.FileCache');

class FileCacheTestCase extends CakeTestCase {
	public $File;

	public function startTest() {
		$this->File = new FileCache(__FILE__);
	}

	public function endTest() {
		$this->File = null;
	}

	public function testExpired() {
		$time = 1000000000;
		$duration = '+4 hours';
		$lastChange = $time - strtotime('+8 hours');
		$this->assertTrue($this->File->_expired($duration, $lastChange, $time));
		$lastChange = $time - strtotime('+2 hours');
		$this->assertFalse($this->File->_expired($duration, $lastChange, $time));
	}

}

