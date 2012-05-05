<?php
/**
 * Cache File and read cache file if is not expired. extending CakePHP's File
 *
 * PHP 5
 *
 * FileCache : CakePHP Plugin
 * Copyright 2012, mon_sat (https://github.com/monsat)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012, mon_sat (https://github.com/monsat)
 * @link          https://github.com/monsat 
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('File', 'Utility');

class FileCache extends File {
	public $duration = '+1 hours';

	public function read($bytes = false, $mode = 'rb', $force = false) {
		if (!$this->exists() || $this->_expired()) {
			return false;
		}
		return parent::read($bytes, $mode, $force);
	}

	public function _expired($duration = '', $lastChange = false, $time = false) {
		if (empty($duration) && !empty($this->duration)) {
			$duration = $this->duration;
		}
		if (empty($lastChange)) {
			$lastChange = $this->lastChange();
		}
		if (!is_numeric($duration)) {
			$duration = strtotime($duration, $lastChange);
		}
		if (empty($time)) {
			$time = time();
		}
		return $time > $duration;
	}
}
