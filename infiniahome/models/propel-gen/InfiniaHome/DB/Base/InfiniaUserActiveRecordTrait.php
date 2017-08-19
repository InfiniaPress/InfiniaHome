<?php

namespace InfiniaHome\DB\Base;

/**
 */
trait InfiniaUserActiveRecordTrait {

	use \Propel\Runtime\ActiveRecordTrait;

	/**
	 * Get the value of `userIsverified` field
	 *
	 * @return bool
	 */
	public function isUserIsverified() {
		return $this->userIsverified;
	}
}