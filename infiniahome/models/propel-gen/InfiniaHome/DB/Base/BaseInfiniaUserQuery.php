<?php

namespace InfiniaHome\DB\Base;

use InfiniaHome\DB\InfiniaUserQuery;
use InfiniaHome\DB\Map\InfiniaUserEntityMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Exception\PropelException;

/**
 */
class BaseInfiniaUserQuery extends \Propel\Runtime\ActiveQuery\ModelCriteria {

	/**
	 * Initializes internal state of InfiniaHome\DB\InfiniaUserQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $entityName The full entity class name
	 * @param string $entityAlias The alias for the entity in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $entityName = 'InfiniaHome\\DB\\InfiniaUser', $entityAlias = null) {
		parent::__construct($dbName, $entityName, $entityAlias);
	}

	/**
	 * Filter the query by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key) {
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by primary key.
	 *
	 * @param array $keys Primary keys to use for the query
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys(array $keys) {
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_ID, $keys, Criteria::IN);
		
		return $this;
	}

	/**
	 * Filter the query on the userCode field.
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserCode('fooValue');   // WHERE userCode = 'fooValue'
	 * $query->filterByUserCode('%fooValue%', Criteria::LIKE); // WHERE userCode LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userCode The value to use as filter.
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserCode($userCode, $comparison = null) {
		if (null === $comparison) {
		    if (is_array($userCode)) {
		        $comparison = Criteria::IN;
		    }
		}
		
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_CODE, $userCode, $comparison);
	}

	/**
	 * Filter the query on the userEmail field.
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserEmail('fooValue');   // WHERE userEmail = 'fooValue'
	 * $query->filterByUserEmail('%fooValue%', Criteria::LIKE); // WHERE userEmail LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userEmail The value to use as filter.
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserEmail($userEmail, $comparison = null) {
		if (null === $comparison) {
		    if (is_array($userEmail)) {
		        $comparison = Criteria::IN;
		    }
		}
		
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_EMAIL, $userEmail, $comparison);
	}

	/**
	 * Filter the query on the userId field.
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserId(1234); // WHERE userId = 1234
	 * $query->filterByUserId(array(12, 34)); // WHERE userId IN (12, 34)
	 * $query->filterByUserId(array('min' => 12)); // WHERE userId > 12
	 * </code>
	 *
	 * @param mixed $userId The value to use as filter.
	 * Use scalar values for equality.
	 * Use array values for in_array() equivalent.
	 * Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId, $comparison = null) {
		if (is_array($userId)) {
		    $useMinMax = false;
		    if (isset($userId['min'])) {
		        $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
		        $useMinMax = true;
		    }
		    if (isset($userId['max'])) {
		        $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
		        $useMinMax = true;
		    }
		    if ($useMinMax) {
		        return $this;
		    }
		    if (null === $comparison) {
		        $comparison = Criteria::IN;
		    }
		}
		
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the userIsverified field.
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserIsverified(true); // WHERE userIsverified = true
	 * $query->filterByUserIsverified('yes'); // WHERE userIsverified = true
	 * </code>
	 *
	 * @param boolean|string $userIsverified The value to use as filter.
	 *  Non-boolean arguments are converted using the following rules:
	 *             1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *  Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserIsverified($userIsverified, $comparison = null) {
		if (is_string($userIsverified)) {
		    $userIsverified = in_array(strtolower($userIsverified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_ISVERIFIED, $userIsverified, $comparison);
	}

	/**
	 * Filter the query on the userName field.
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserName('fooValue');   // WHERE userName = 'fooValue'
	 * $query->filterByUserName('%fooValue%', Criteria::LIKE); // WHERE userName LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userName The value to use as filter.
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserName($userName, $comparison = null) {
		if (null === $comparison) {
		    if (is_array($userName)) {
		        $comparison = Criteria::IN;
		    }
		}
		
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_NAME, $userName, $comparison);
	}

	/**
	 * Filter the query on the userPassword field.
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserPassword('fooValue');   // WHERE userPassword = 'fooValue'
	 * $query->filterByUserPassword('%fooValue%', Criteria::LIKE); // WHERE userPassword LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userPassword The value to use as filter.
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserPassword($userPassword, $comparison = null) {
		if (null === $comparison) {
		    if (is_array($userPassword)) {
		        $comparison = Criteria::IN;
		    }
		}
		
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_PASSWORD, $userPassword, $comparison);
	}

	/**
	 * Filter the query on the userRank field.
	 *
	 * @param mixed $userRank The value to use as filter.
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserRank($userRank, $comparison = null) {
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_RANK, $userRank, $comparison);
	}

	/**
	 * Filter the query on the userRealname field.
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserRealname('fooValue');   // WHERE userRealname = 'fooValue'
	 * $query->filterByUserRealname('%fooValue%', Criteria::LIKE); // WHERE userRealname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param string $userRealname The value to use as filter.
	 * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function filterByUserRealname($userRealname, $comparison = null) {
		if (null === $comparison) {
		    if (is_array($userRealname)) {
		        $comparison = Criteria::IN;
		    }
		}
		
		return $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_REALNAME, $userRealname, $comparison);
	}

	/**
	 * @return \InfiniaHome\DB\InfiniaUser
	 */
	public function findOne() {
		return parent::findOne();
	}

	/**
	 * Exclude object from result.
	 *
	 * @param $infiniaUser Object to remove from the list of results
	 * @return $this|InfiniaUserQuery The current query, for fluid interface
	 */
	public function prune($infiniaUser = null) {
		if ($infiniaUser) {
		    $this->addUsingAlias(InfiniaUserEntityMap::FIELD_USER_ID, $infiniaUser->getUserId(), Criteria::NOT_EQUAL);
		}
		
		return $this;
	}
}