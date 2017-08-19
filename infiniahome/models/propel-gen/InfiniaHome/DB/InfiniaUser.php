<?php

namespace InfiniaHome\DB;

use InfiniaHome\DB\Base\InfiniaUserActiveRecordTrait;
#use InfiniaHome\DB\InfiniaUser;
use Propel\Runtime\Exception\PropelException;

/**
 */
class InfiniaUser {

	/**
	 * @var string
	 */
	const USERRANK_TYPE_ADMIN = 'Admin';

	/**
	 * @var string
	 */
	const USERRANK_TYPE_INFINIABRONZE = 'InfiniaBronze';

	/**
	 * @var string
	 */
	const USERRANK_TYPE_INFINIADIAMOND = 'InfiniaDiamond';

	/**
	 * @var string
	 */
	const USERRANK_TYPE_INFINIAGOLD = 'InfiniaGold';

	/**
	 * @var string
	 */
	const USERRANK_TYPE_INFINIAPLATINIUM = 'InfiniaPlatinium';

	/**
	 * @var string
	 */
	const USERRANK_TYPE_INFINIASILVER = 'InfiniaSilver';

	/**
	 * @var string
	 */
	const USERRANK_TYPE_NORMAL = 'Normal';

	/**
	 * @var array|string[]
	 */
	const USERRANK_TYPES = [self::USERRANK_TYPE_NORMAL, self::USERRANK_TYPE_INFINIABRONZE, self::USERRANK_TYPE_INFINIASILVER, self::USERRANK_TYPE_INFINIAGOLD, self::USERRANK_TYPE_INFINIAPLATINIUM, self::USERRANK_TYPE_INFINIADIAMOND, self::USERRANK_TYPE_ADMIN];

	/**
	 * The value for the userCode field.
	 *
	 * @var string
	 */
	public $userCode;

	/**
	 * The value for the userEmail field.
	 *
	 * @var string
	 */
	public $userEmail;

	/**
	 * The value for the userId field.
	 *
	 * @var int
	 */
	public $userId;

	/**
	 * The value for the userIsverified field.
	 *
	 * @var boolean
	 */
	public $userIsverified = 'False';

	/**
	 * The value for the userName field.
	 *
	 * @var string
	 */
	public $userName;

	/**
	 * The value for the userPassword field.
	 *
	 * @var string
	 */
	public $userPassword;

	/**
	 * The value for the userRank field.
	 *
	 * @var string
	 */
	public $userRank;

	/**
	 * The value for the userRealname field.
	 *
	 * @var string
	 */
	public $userRealname;

	/**
	 */
	public function __construct() {
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString() {
		return (string) serialize($this);
	}

	/**
	 * Returns the value of userCode.
	 *
	 * @return string
	 */
	public function getUserCode() {
		return $this->userCode;
	}

	/**
	 * Returns the value of userEmail.
	 *
	 * @return string
	 */
	public function getUserEmail() {
		return $this->userEmail;
	}

	/**
	 * Returns the value of userId.
	 *
	 * @return int
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * Returns the value of userIsverified.
	 *
	 * @return boolean
	 */
	public function getUserIsverified() {
		//Sometimes the default value is not a boolean
		if (!is_bool($this->userIsverified)) {
		    $this->setUserIsverified($this->userIsverified);
		}
		
		return $this->userIsverified;
	}

	/**
	 * Returns the value of userName.
	 *
	 * @return string
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * Returns the value of userPassword.
	 *
	 * @return string
	 */
	public function getUserPassword() {
		return $this->userPassword;
	}

	/**
	 * Returns the value of userRank.
	 *
	 * @return string
	 */
	public function getUserRank() {
		return $this->userRank;
	}

	/**
	 * Returns the value of userRealname.
	 *
	 * @return string
	 */
	public function getUserRealname() {
		return $this->userRealname;
	}

	/**
	 * Sets the value of userCode.
	 *
	 * @param string $userCode
	 * @return InfiniaUser|$this
	 */
	public function setUserCode($userCode) {
		$this->userCode = $userCode;
		
		return $this;
	}

	/**
	 * Sets the value of userEmail.
	 *
	 * @param string $userEmail
	 * @return InfiniaUser|$this
	 */
	public function setUserEmail($userEmail) {
		$this->userEmail = $userEmail;
		
		return $this;
	}

	/**
	 * Sets the value of userId.
	 *
	 * @param int $userId
	 * @return InfiniaUser|$this
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
		
		return $this;
	}

	/**
	 * Sets the value of userIsverified.
	 *
	 * @param boolean $userIsverified
	 * @return InfiniaUser|$this
	 */
	public function setUserIsverified($userIsverified) {
		if ($userIsverified !== null) {
		    if (is_string($userIsverified)) {
		        $userIsverified = in_array(strtolower($userIsverified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		    } else {
		        $userIsverified = (boolean) $userIsverified;
		    }
		}
		
		$this->userIsverified = $userIsverified;
		
		return $this;
	}

	/**
	 * Sets the value of userName.
	 *
	 * @param string $userName
	 * @return InfiniaUser|$this
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
		
		return $this;
	}

	/**
	 * Sets the value of userPassword.
	 *
	 * @param string $userPassword
	 * @return InfiniaUser|$this
	 */
	public function setUserPassword($userPassword) {
		$this->userPassword = $userPassword;
		
		return $this;
	}

	/**
	 * Sets the value of userRank.
	 *
	 * @param string $userRank
	 * @return InfiniaUser|$this
	 */
	public function setUserRank($userRank) {
		if ($userRank !== null) {
		    if (!in_array($userRank, static::USERRANK_TYPES, true)) {
		        throw new \InvalidArgumentException(sprintf('Value "%s" is not accepted in this enumerated column', $userRank));
		    }
		}
		
		$this->userRank = $userRank;
		
		return $this;
	}

	/**
	 * Sets the value of userRealname.
	 *
	 * @param string $userRealname
	 * @return InfiniaUser|$this
	 */
	public function setUserRealname($userRealname) {
		$this->userRealname = $userRealname;
		
		return $this;
	}
}