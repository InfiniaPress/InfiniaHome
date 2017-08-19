<?php

namespace InfiniaHome\DB\Base;

/**
 */
class InfiniaUserProxy extends \InfiniaHome\DB\InfiniaUser implements \Propel\Runtime\EntityProxyInterface {

	/**
	 */
	public $__duringInitializing__ = false;

	/**
	 */
	private $_repository = false;

	/**
	 */
	public function __debugInfo() {
		$fn = \Closure::bind(function(){
		    return get_object_vars($this);
		}, $this, get_parent_class($this)); 
		return $fn();
	}

	/**
	 * @param $name
	 */
	public function __get($name) {
		if (!isset($this->__duringInitializing__) && 'userId' === $name && !isset($this->userId)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userId');
		
		    unset($this->__duringInitializing__);
		}
		
		if (!isset($this->__duringInitializing__) && 'userName' === $name && !isset($this->userName)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userName');
		
		    unset($this->__duringInitializing__);
		}
		
		if (!isset($this->__duringInitializing__) && 'userRealname' === $name && !isset($this->userRealname)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userRealname');
		
		    unset($this->__duringInitializing__);
		}
		
		if (!isset($this->__duringInitializing__) && 'userCode' === $name && !isset($this->userCode)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userCode');
		
		    unset($this->__duringInitializing__);
		}
		
		if (!isset($this->__duringInitializing__) && 'userEmail' === $name && !isset($this->userEmail)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userEmail');
		
		    unset($this->__duringInitializing__);
		}
		
		if (!isset($this->__duringInitializing__) && 'userPassword' === $name && !isset($this->userPassword)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userPassword');
		
		    unset($this->__duringInitializing__);
		}
		
		if (!isset($this->__duringInitializing__) && 'userIsverified' === $name && !isset($this->userIsverified)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userIsverified');
		
		    unset($this->__duringInitializing__);
		}
		
		if (!isset($this->__duringInitializing__) && 'userRank' === $name && !isset($this->userRank)) {
		
		    $this->__duringInitializing__ = true;
		
		    $this->_repository->getEntityMap()->loadField($this, 'userRank');
		
		    unset($this->__duringInitializing__);
		}
		
		return $this->$name;
	}

	/**
	 * @param $name
	 * @param $value
	 */
	public function __set($name, $value) {
		$this->$name = $value;
	}
}