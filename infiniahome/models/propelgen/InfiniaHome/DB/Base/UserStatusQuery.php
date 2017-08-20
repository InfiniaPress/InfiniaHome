<?php

namespace InfiniaHome\DB\Base;

use \Exception;
use \PDO;
use InfiniaHome\DB\UserStatus as ChildUserStatus;
use InfiniaHome\DB\UserStatusQuery as ChildUserStatusQuery;
use InfiniaHome\DB\Map\UserStatusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'infiniauser_status' table.
 *
 *
 *
 * @method     ChildUserStatusQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     ChildUserStatusQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildUserStatusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildUserStatusQuery orderByMutedtime($order = Criteria::ASC) Order by the mutedtime column
 * @method     ChildUserStatusQuery orderByMutedForever($order = Criteria::ASC) Order by the muted_forever column
 * @method     ChildUserStatusQuery orderByBannedtime($order = Criteria::ASC) Order by the bannedtime column
 * @method     ChildUserStatusQuery orderByBannedForever($order = Criteria::ASC) Order by the banned_forever column
 *
 * @method     ChildUserStatusQuery groupByUserid() Group by the userid column
 * @method     ChildUserStatusQuery groupByUsername() Group by the username column
 * @method     ChildUserStatusQuery groupByStatus() Group by the status column
 * @method     ChildUserStatusQuery groupByMutedtime() Group by the mutedtime column
 * @method     ChildUserStatusQuery groupByMutedForever() Group by the muted_forever column
 * @method     ChildUserStatusQuery groupByBannedtime() Group by the bannedtime column
 * @method     ChildUserStatusQuery groupByBannedForever() Group by the banned_forever column
 *
 * @method     ChildUserStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserStatusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserStatusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserStatusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserStatusQuery leftJoinInfiniaUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the InfiniaUser relation
 * @method     ChildUserStatusQuery rightJoinInfiniaUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InfiniaUser relation
 * @method     ChildUserStatusQuery innerJoinInfiniaUser($relationAlias = null) Adds a INNER JOIN clause to the query using the InfiniaUser relation
 *
 * @method     ChildUserStatusQuery joinWithInfiniaUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InfiniaUser relation
 *
 * @method     ChildUserStatusQuery leftJoinWithInfiniaUser() Adds a LEFT JOIN clause and with to the query using the InfiniaUser relation
 * @method     ChildUserStatusQuery rightJoinWithInfiniaUser() Adds a RIGHT JOIN clause and with to the query using the InfiniaUser relation
 * @method     ChildUserStatusQuery innerJoinWithInfiniaUser() Adds a INNER JOIN clause and with to the query using the InfiniaUser relation
 *
 * @method     \InfiniaHome\DB\InfiniaUserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUserStatus findOne(ConnectionInterface $con = null) Return the first ChildUserStatus matching the query
 * @method     ChildUserStatus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUserStatus matching the query, or a new ChildUserStatus object populated from the query conditions when no match is found
 *
 * @method     ChildUserStatus findOneByUserid(int $userid) Return the first ChildUserStatus filtered by the userid column
 * @method     ChildUserStatus findOneByUsername(string $username) Return the first ChildUserStatus filtered by the username column
 * @method     ChildUserStatus findOneByStatus(int $status) Return the first ChildUserStatus filtered by the status column
 * @method     ChildUserStatus findOneByMutedtime(string $mutedtime) Return the first ChildUserStatus filtered by the mutedtime column
 * @method     ChildUserStatus findOneByMutedForever(boolean $muted_forever) Return the first ChildUserStatus filtered by the muted_forever column
 * @method     ChildUserStatus findOneByBannedtime(string $bannedtime) Return the first ChildUserStatus filtered by the bannedtime column
 * @method     ChildUserStatus findOneByBannedForever(boolean $banned_forever) Return the first ChildUserStatus filtered by the banned_forever column *

 * @method     ChildUserStatus requirePk($key, ConnectionInterface $con = null) Return the ChildUserStatus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserStatus requireOne(ConnectionInterface $con = null) Return the first ChildUserStatus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserStatus requireOneByUserid(int $userid) Return the first ChildUserStatus filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserStatus requireOneByUsername(string $username) Return the first ChildUserStatus filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserStatus requireOneByStatus(int $status) Return the first ChildUserStatus filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserStatus requireOneByMutedtime(string $mutedtime) Return the first ChildUserStatus filtered by the mutedtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserStatus requireOneByMutedForever(boolean $muted_forever) Return the first ChildUserStatus filtered by the muted_forever column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserStatus requireOneByBannedtime(string $bannedtime) Return the first ChildUserStatus filtered by the bannedtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUserStatus requireOneByBannedForever(boolean $banned_forever) Return the first ChildUserStatus filtered by the banned_forever column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUserStatus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUserStatus objects based on current ModelCriteria
 * @method     ChildUserStatus[]|ObjectCollection findByUserid(int $userid) Return ChildUserStatus objects filtered by the userid column
 * @method     ChildUserStatus[]|ObjectCollection findByUsername(string $username) Return ChildUserStatus objects filtered by the username column
 * @method     ChildUserStatus[]|ObjectCollection findByStatus(int $status) Return ChildUserStatus objects filtered by the status column
 * @method     ChildUserStatus[]|ObjectCollection findByMutedtime(string $mutedtime) Return ChildUserStatus objects filtered by the mutedtime column
 * @method     ChildUserStatus[]|ObjectCollection findByMutedForever(boolean $muted_forever) Return ChildUserStatus objects filtered by the muted_forever column
 * @method     ChildUserStatus[]|ObjectCollection findByBannedtime(string $bannedtime) Return ChildUserStatus objects filtered by the bannedtime column
 * @method     ChildUserStatus[]|ObjectCollection findByBannedForever(boolean $banned_forever) Return ChildUserStatus objects filtered by the banned_forever column
 * @method     ChildUserStatus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserStatusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \InfiniaHome\DB\Base\UserStatusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InfiniaHome\\DB\\UserStatus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserStatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserStatusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserStatusQuery) {
            return $criteria;
        }
        $query = new ChildUserStatusQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUserStatus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserStatusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserStatusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUserStatus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT userid, username, status, mutedtime, muted_forever, bannedtime, banned_forever FROM infiniauser_status WHERE userid = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUserStatus $obj */
            $obj = new ChildUserStatus();
            $obj->hydrate($row);
            UserStatusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUserStatus|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserStatusTableMap::COL_USERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserStatusTableMap::COL_USERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE userid = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE userid IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE userid > 12
     * </code>
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(UserStatusTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(UserStatusTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserStatusTableMap::COL_USERID, $userid, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserStatusTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        $valueSet = UserStatusTableMap::getValueSet(UserStatusTableMap::COL_STATUS);
        if (is_scalar($status)) {
            if (!in_array($status, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $status));
            }
            $status = array_search($status, $valueSet);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserStatusTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the mutedtime column
     *
     * Example usage:
     * <code>
     * $query->filterByMutedtime('2011-03-14'); // WHERE mutedtime = '2011-03-14'
     * $query->filterByMutedtime('now'); // WHERE mutedtime = '2011-03-14'
     * $query->filterByMutedtime(array('max' => 'yesterday')); // WHERE mutedtime > '2011-03-13'
     * </code>
     *
     * @param     mixed $mutedtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByMutedtime($mutedtime = null, $comparison = null)
    {
        if (is_array($mutedtime)) {
            $useMinMax = false;
            if (isset($mutedtime['min'])) {
                $this->addUsingAlias(UserStatusTableMap::COL_MUTEDTIME, $mutedtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mutedtime['max'])) {
                $this->addUsingAlias(UserStatusTableMap::COL_MUTEDTIME, $mutedtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserStatusTableMap::COL_MUTEDTIME, $mutedtime, $comparison);
    }

    /**
     * Filter the query on the muted_forever column
     *
     * Example usage:
     * <code>
     * $query->filterByMutedForever(true); // WHERE muted_forever = true
     * $query->filterByMutedForever('yes'); // WHERE muted_forever = true
     * </code>
     *
     * @param     boolean|string $mutedForever The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByMutedForever($mutedForever = null, $comparison = null)
    {
        if (is_string($mutedForever)) {
            $mutedForever = in_array(strtolower($mutedForever), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserStatusTableMap::COL_MUTED_FOREVER, $mutedForever, $comparison);
    }

    /**
     * Filter the query on the bannedtime column
     *
     * Example usage:
     * <code>
     * $query->filterByBannedtime('2011-03-14'); // WHERE bannedtime = '2011-03-14'
     * $query->filterByBannedtime('now'); // WHERE bannedtime = '2011-03-14'
     * $query->filterByBannedtime(array('max' => 'yesterday')); // WHERE bannedtime > '2011-03-13'
     * </code>
     *
     * @param     mixed $bannedtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByBannedtime($bannedtime = null, $comparison = null)
    {
        if (is_array($bannedtime)) {
            $useMinMax = false;
            if (isset($bannedtime['min'])) {
                $this->addUsingAlias(UserStatusTableMap::COL_BANNEDTIME, $bannedtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bannedtime['max'])) {
                $this->addUsingAlias(UserStatusTableMap::COL_BANNEDTIME, $bannedtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserStatusTableMap::COL_BANNEDTIME, $bannedtime, $comparison);
    }

    /**
     * Filter the query on the banned_forever column
     *
     * Example usage:
     * <code>
     * $query->filterByBannedForever(true); // WHERE banned_forever = true
     * $query->filterByBannedForever('yes'); // WHERE banned_forever = true
     * </code>
     *
     * @param     boolean|string $bannedForever The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByBannedForever($bannedForever = null, $comparison = null)
    {
        if (is_string($bannedForever)) {
            $bannedForever = in_array(strtolower($bannedForever), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserStatusTableMap::COL_BANNED_FOREVER, $bannedForever, $comparison);
    }

    /**
     * Filter the query by a related \InfiniaHome\DB\InfiniaUser object
     *
     * @param \InfiniaHome\DB\InfiniaUser|ObjectCollection $infiniaUser the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserStatusQuery The current query, for fluid interface
     */
    public function filterByInfiniaUser($infiniaUser, $comparison = null)
    {
        if ($infiniaUser instanceof \InfiniaHome\DB\InfiniaUser) {
            return $this
                ->addUsingAlias(UserStatusTableMap::COL_USERID, $infiniaUser->getUserId(), $comparison);
        } elseif ($infiniaUser instanceof ObjectCollection) {
            return $this
                ->useInfiniaUserQuery()
                ->filterByPrimaryKeys($infiniaUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInfiniaUser() only accepts arguments of type \InfiniaHome\DB\InfiniaUser or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InfiniaUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function joinInfiniaUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InfiniaUser');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'InfiniaUser');
        }

        return $this;
    }

    /**
     * Use the InfiniaUser relation InfiniaUser object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InfiniaHome\DB\InfiniaUserQuery A secondary query class using the current class as primary query
     */
    public function useInfiniaUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInfiniaUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InfiniaUser', '\InfiniaHome\DB\InfiniaUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUserStatus $userStatus Object to remove from the list of results
     *
     * @return $this|ChildUserStatusQuery The current query, for fluid interface
     */
    public function prune($userStatus = null)
    {
        if ($userStatus) {
            $this->addUsingAlias(UserStatusTableMap::COL_USERID, $userStatus->getUserid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the infiniauser_status table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserStatusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserStatusTableMap::clearInstancePool();
            UserStatusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserStatusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserStatusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserStatusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserStatusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserStatusQuery
