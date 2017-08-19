<?php

namespace InfiniaHome\DB\Base;

use InfiniaHome\DB\InfiniaUser;
use InfiniaHome\DB\InfiniaUserQuery;
use InfiniaHome\DB\Map\InfiniaUserEntityMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Exception\PropelException;

/**
 */
class BaseInfiniaUserRepository extends \Propel\Runtime\Repository\Repository {

	/**
	 * Create a new instance of $entityClassName.
	 *
	 * @return InfiniaUser
	 */
	public function createObject() {
		throw \InvalidArgumentException('Not Implemented. Will be removed.');
	}

	/**
	 * Create a new query instance of InfiniaUser.
	 *
	 * @param string $alias
	 * @param Criteria $criteria
	 * @return InfiniaUserQuery
	 */
	public function createQuery($alias = null, Criteria $criteria = null) {
		$query = new InfiniaUserQuery();
		if (null !== $alias) {
		    $query->setEntityAlias($alias);
		}
		if ($criteria instanceof Criteria) {
		    $query->mergeWith($criteria);
		}
		
		$query->setEntityMap($this->getEntityMap());
		$query->setConfiguration($this->getConfiguration());
		
		return $query;
	}

	/**
	 * @param int $key
	 * @return InfiniaUser
	 */
	public function find($key) {
		if (null === $key) {
		    return null;
		}
		if ((null !== ($obj = $this->getInstanceFromFirstLevelCache('InfiniaHome\DB\InfiniaUser', $key)))) {
		    // the object is already in the instance pool
		    return $obj;
		}
		
		return $this->doFind($key);
	}

	/**
	 * Removes a instance of InfiniaUser.
	 *
	 * @param InfiniaUser $entity
	 */
	public function remove(InfiniaUser $entity) {
		$session = $this->getConfiguration()->getSession();
		$session->remove($entity);
		$session->commit();
	}

	/**
	 * Saves a instance of InfiniaUser.
	 *
	 * @param InfiniaUser $entity
	 */
	public function save(InfiniaUser $entity) {
		$session = $this->getConfiguration()->getSession();
		$session->persist($entity, true);
		$session->commit();
	}

	/**
	 * doDeleteAll implementation for SQL Platforms
	 */
	protected function doDeleteAll() {
		$connection = $this->getConfiguration()->getConnectionManager('default')->getWriteConnection();
		        $sql = 'DELETE FROM infiniausers';
		        try {
		            $stmt = $connection->prepare($sql);
		            $stmt->execute();
		        } catch (Exception $e) {
		            $this->getConfiguration()->log($e->getMessage(), Propel::LOG_ERR);
		            throw new PropelException(sprintf('Unable to execute DELETE statement [%s]', $sql), 0, $e);
		        }
	}

	/**
	 * doFind implementation for SQL Platforms
	 *
	 * @param $key
	 * @return InfiniaUser
	 */
	protected function doFind($key) {
		$connection = $this->getConfiguration()->getConnectionManager('default')->getWriteConnection();
		        $sql = 'SELECT user_id, user_name, user_realname, user_code, user_email, user_password, user_isverified, user_rank FROM infiniausers WHERE userId = :p0';
		        try {
		            $stmt = $connection->prepare($sql);            
		            $stmt->bindValue(':p0', $key, \PDO::PARAM_INT);
		            $stmt->execute();
		        } catch (Exception $e) {
		            Propel::log($e->getMessage(), Propel::LOG_ERR);
		            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
		        }
		
		        $obj = null;
		        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
		            $populateInfo = $this->getEntityMap()->populateObject($row);
		        } else {
		            return null;
		        }
		
		        //$this->addFirstLevelCache($key, $obj);
		
		        return $populateInfo[0];
	}
}