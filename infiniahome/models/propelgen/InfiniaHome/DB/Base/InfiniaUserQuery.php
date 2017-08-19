<?php

namespace InfiniaHome\DB\Base;

use \Exception;
use \PDO;
use InfiniaHome\DB\InfiniaUser as ChildInfiniaUser;
use InfiniaHome\DB\InfiniaUserQuery as ChildInfiniaUserQuery;
use InfiniaHome\DB\Map\InfiniaUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'infiniausers' table.
 *
 *
 *
 * @method     ChildInfiniaUserQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildInfiniaUserQuery orderByUserName($order = Criteria::ASC) Order by the user_name column
 * @method     ChildInfiniaUserQuery orderByUserRealname($order = Criteria::ASC) Order by the user_realname column
 * @method     ChildInfiniaUserQuery orderByUserCode($order = Criteria::ASC) Order by the user_code column
 * @method     ChildInfiniaUserQuery orderByUserEmail($order = Criteria::ASC) Order by the user_email column
 * @method     ChildInfiniaUserQuery orderByUserPassword($order = Criteria::ASC) Order by the user_password column
 * @method     ChildInfiniaUserQuery orderByUserIsverified($order = Criteria::ASC) Order by the user_isverified column
 * @method     ChildInfiniaUserQuery orderByUserRank($order = Criteria::ASC) Order by the user_rank column
 *
 * @method     ChildInfiniaUserQuery groupByUserId() Group by the user_id column
 * @method     ChildInfiniaUserQuery groupByUserName() Group by the user_name column
 * @method     ChildInfiniaUserQuery groupByUserRealname() Group by the user_realname column
 * @method     ChildInfiniaUserQuery groupByUserCode() Group by the user_code column
 * @method     ChildInfiniaUserQuery groupByUserEmail() Group by the user_email column
 * @method     ChildInfiniaUserQuery groupByUserPassword() Group by the user_password column
 * @method     ChildInfiniaUserQuery groupByUserIsverified() Group by the user_isverified column
 * @method     ChildInfiniaUserQuery groupByUserRank() Group by the user_rank column
 *
 * @method     ChildInfiniaUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInfiniaUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInfiniaUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInfiniaUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInfiniaUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInfiniaUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInfiniaUser findOne(ConnectionInterface $con = null) Return the first ChildInfiniaUser matching the query
 * @method     ChildInfiniaUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInfiniaUser matching the query, or a new ChildInfiniaUser object populated from the query conditions when no match is found
 *
 * @method     ChildInfiniaUser findOneByUserId(int $user_id) Return the first ChildInfiniaUser filtered by the user_id column
 * @method     ChildInfiniaUser findOneByUserName(string $user_name) Return the first ChildInfiniaUser filtered by the user_name column
 * @method     ChildInfiniaUser findOneByUserRealname(string $user_realname) Return the first ChildInfiniaUser filtered by the user_realname column
 * @method     ChildInfiniaUser findOneByUserCode(string $user_code) Return the first ChildInfiniaUser filtered by the user_code column
 * @method     ChildInfiniaUser findOneByUserEmail(string $user_email) Return the first ChildInfiniaUser filtered by the user_email column
 * @method     ChildInfiniaUser findOneByUserPassword(string $user_password) Return the first ChildInfiniaUser filtered by the user_password column
 * @method     ChildInfiniaUser findOneByUserIsverified(boolean $user_isverified) Return the first ChildInfiniaUser filtered by the user_isverified column
 * @method     ChildInfiniaUser findOneByUserRank(int $user_rank) Return the first ChildInfiniaUser filtered by the user_rank column *

 * @method     ChildInfiniaUser requirePk($key, ConnectionInterface $con = null) Return the ChildInfiniaUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOne(ConnectionInterface $con = null) Return the first ChildInfiniaUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInfiniaUser requireOneByUserId(int $user_id) Return the first ChildInfiniaUser filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOneByUserName(string $user_name) Return the first ChildInfiniaUser filtered by the user_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOneByUserRealname(string $user_realname) Return the first ChildInfiniaUser filtered by the user_realname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOneByUserCode(string $user_code) Return the first ChildInfiniaUser filtered by the user_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOneByUserEmail(string $user_email) Return the first ChildInfiniaUser filtered by the user_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOneByUserPassword(string $user_password) Return the first ChildInfiniaUser filtered by the user_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOneByUserIsverified(boolean $user_isverified) Return the first ChildInfiniaUser filtered by the user_isverified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaUser requireOneByUserRank(int $user_rank) Return the first ChildInfiniaUser filtered by the user_rank column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInfiniaUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInfiniaUser objects based on current ModelCriteria
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserId(int $user_id) Return ChildInfiniaUser objects filtered by the user_id column
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserName(string $user_name) Return ChildInfiniaUser objects filtered by the user_name column
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserRealname(string $user_realname) Return ChildInfiniaUser objects filtered by the user_realname column
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserCode(string $user_code) Return ChildInfiniaUser objects filtered by the user_code column
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserEmail(string $user_email) Return ChildInfiniaUser objects filtered by the user_email column
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserPassword(string $user_password) Return ChildInfiniaUser objects filtered by the user_password column
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserIsverified(boolean $user_isverified) Return ChildInfiniaUser objects filtered by the user_isverified column
 * @method     ChildInfiniaUser[]|ObjectCollection findByUserRank(int $user_rank) Return ChildInfiniaUser objects filtered by the user_rank column
 * @method     ChildInfiniaUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InfiniaUserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \InfiniaHome\DB\Base\InfiniaUserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InfiniaHome\\DB\\InfiniaUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInfiniaUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInfiniaUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInfiniaUserQuery) {
            return $criteria;
        }
        $query = new ChildInfiniaUserQuery();
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
     * @return ChildInfiniaUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InfiniaUserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InfiniaUserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInfiniaUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, user_name, user_realname, user_code, user_email, user_password, user_isverified, user_rank FROM infiniausers WHERE user_id = :p0';
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
            /** @var ChildInfiniaUser $obj */
            $obj = new ChildInfiniaUser();
            $obj->hydrate($row);
            InfiniaUserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInfiniaUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(InfiniaUserTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(InfiniaUserTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the user_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUserName('fooValue');   // WHERE user_name = 'fooValue'
     * $query->filterByUserName('%fooValue%', Criteria::LIKE); // WHERE user_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserName($userName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_NAME, $userName, $comparison);
    }

    /**
     * Filter the query on the user_realname column
     *
     * Example usage:
     * <code>
     * $query->filterByUserRealname('fooValue');   // WHERE user_realname = 'fooValue'
     * $query->filterByUserRealname('%fooValue%', Criteria::LIKE); // WHERE user_realname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userRealname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserRealname($userRealname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userRealname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_REALNAME, $userRealname, $comparison);
    }

    /**
     * Filter the query on the user_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUserCode('fooValue');   // WHERE user_code = 'fooValue'
     * $query->filterByUserCode('%fooValue%', Criteria::LIKE); // WHERE user_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserCode($userCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_CODE, $userCode, $comparison);
    }

    /**
     * Filter the query on the user_email column
     *
     * Example usage:
     * <code>
     * $query->filterByUserEmail('fooValue');   // WHERE user_email = 'fooValue'
     * $query->filterByUserEmail('%fooValue%', Criteria::LIKE); // WHERE user_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserEmail($userEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_EMAIL, $userEmail, $comparison);
    }

    /**
     * Filter the query on the user_password column
     *
     * Example usage:
     * <code>
     * $query->filterByUserPassword('fooValue');   // WHERE user_password = 'fooValue'
     * $query->filterByUserPassword('%fooValue%', Criteria::LIKE); // WHERE user_password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userPassword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserPassword($userPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userPassword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_PASSWORD, $userPassword, $comparison);
    }

    /**
     * Filter the query on the user_isverified column
     *
     * Example usage:
     * <code>
     * $query->filterByUserIsverified(true); // WHERE user_isverified = true
     * $query->filterByUserIsverified('yes'); // WHERE user_isverified = true
     * </code>
     *
     * @param     boolean|string $userIsverified The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserIsverified($userIsverified = null, $comparison = null)
    {
        if (is_string($userIsverified)) {
            $userIsverified = in_array(strtolower($userIsverified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_ISVERIFIED, $userIsverified, $comparison);
    }

    /**
     * Filter the query on the user_rank column
     *
     * @param     mixed $userRank The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function filterByUserRank($userRank = null, $comparison = null)
    {
        $valueSet = InfiniaUserTableMap::getValueSet(InfiniaUserTableMap::COL_USER_RANK);
        if (is_scalar($userRank)) {
            if (!in_array($userRank, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $userRank));
            }
            $userRank = array_search($userRank, $valueSet);
        } elseif (is_array($userRank)) {
            $convertedValues = array();
            foreach ($userRank as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $userRank = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaUserTableMap::COL_USER_RANK, $userRank, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInfiniaUser $infiniaUser Object to remove from the list of results
     *
     * @return $this|ChildInfiniaUserQuery The current query, for fluid interface
     */
    public function prune($infiniaUser = null)
    {
        if ($infiniaUser) {
            $this->addUsingAlias(InfiniaUserTableMap::COL_USER_ID, $infiniaUser->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the infiniausers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaUserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InfiniaUserTableMap::clearInstancePool();
            InfiniaUserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaUserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InfiniaUserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InfiniaUserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InfiniaUserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InfiniaUserQuery
