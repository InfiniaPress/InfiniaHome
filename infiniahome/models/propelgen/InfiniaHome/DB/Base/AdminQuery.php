<?php

namespace InfiniaHome\DB\Base;

use \Exception;
use \PDO;
use InfiniaHome\DB\Admin as ChildAdmin;
use InfiniaHome\DB\AdminQuery as ChildAdminQuery;
use InfiniaHome\DB\Map\AdminTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'infiniaadmins' table.
 *
 *
 *
 * @method     ChildAdminQuery orderByAdminid($order = Criteria::ASC) Order by the adminid column
 * @method     ChildAdminQuery orderByRealname($order = Criteria::ASC) Order by the realname column
 * @method     ChildAdminQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildAdminQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildAdminQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     ChildAdminQuery groupByAdminid() Group by the adminid column
 * @method     ChildAdminQuery groupByRealname() Group by the realname column
 * @method     ChildAdminQuery groupByUsername() Group by the username column
 * @method     ChildAdminQuery groupByPassword() Group by the password column
 * @method     ChildAdminQuery groupByEmail() Group by the email column
 *
 * @method     ChildAdminQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdminQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdminQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdminQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdminQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdminQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdmin findOne(ConnectionInterface $con = null) Return the first ChildAdmin matching the query
 * @method     ChildAdmin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAdmin matching the query, or a new ChildAdmin object populated from the query conditions when no match is found
 *
 * @method     ChildAdmin findOneByAdminid(int $adminid) Return the first ChildAdmin filtered by the adminid column
 * @method     ChildAdmin findOneByRealname(string $realname) Return the first ChildAdmin filtered by the realname column
 * @method     ChildAdmin findOneByUsername(string $username) Return the first ChildAdmin filtered by the username column
 * @method     ChildAdmin findOneByPassword(string $password) Return the first ChildAdmin filtered by the password column
 * @method     ChildAdmin findOneByEmail(string $email) Return the first ChildAdmin filtered by the email column *

 * @method     ChildAdmin requirePk($key, ConnectionInterface $con = null) Return the ChildAdmin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOne(ConnectionInterface $con = null) Return the first ChildAdmin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdmin requireOneByAdminid(int $adminid) Return the first ChildAdmin filtered by the adminid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByRealname(string $realname) Return the first ChildAdmin filtered by the realname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByUsername(string $username) Return the first ChildAdmin filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByPassword(string $password) Return the first ChildAdmin filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByEmail(string $email) Return the first ChildAdmin filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdmin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAdmin objects based on current ModelCriteria
 * @method     ChildAdmin[]|ObjectCollection findByAdminid(int $adminid) Return ChildAdmin objects filtered by the adminid column
 * @method     ChildAdmin[]|ObjectCollection findByRealname(string $realname) Return ChildAdmin objects filtered by the realname column
 * @method     ChildAdmin[]|ObjectCollection findByUsername(string $username) Return ChildAdmin objects filtered by the username column
 * @method     ChildAdmin[]|ObjectCollection findByPassword(string $password) Return ChildAdmin objects filtered by the password column
 * @method     ChildAdmin[]|ObjectCollection findByEmail(string $email) Return ChildAdmin objects filtered by the email column
 * @method     ChildAdmin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AdminQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \InfiniaHome\DB\Base\AdminQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InfiniaHome\\DB\\Admin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdminQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdminQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAdminQuery) {
            return $criteria;
        }
        $query = new ChildAdminQuery();
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
     * @return ChildAdmin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdminTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdminTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAdmin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT adminid, realname, username, password, email FROM infiniaadmins WHERE adminid = :p0';
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
            /** @var ChildAdmin $obj */
            $obj = new ChildAdmin();
            $obj->hydrate($row);
            AdminTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAdmin|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdminTableMap::COL_ADMINID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdminTableMap::COL_ADMINID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the adminid column
     *
     * Example usage:
     * <code>
     * $query->filterByAdminid(1234); // WHERE adminid = 1234
     * $query->filterByAdminid(array(12, 34)); // WHERE adminid IN (12, 34)
     * $query->filterByAdminid(array('min' => 12)); // WHERE adminid > 12
     * </code>
     *
     * @param     mixed $adminid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByAdminid($adminid = null, $comparison = null)
    {
        if (is_array($adminid)) {
            $useMinMax = false;
            if (isset($adminid['min'])) {
                $this->addUsingAlias(AdminTableMap::COL_ADMINID, $adminid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adminid['max'])) {
                $this->addUsingAlias(AdminTableMap::COL_ADMINID, $adminid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_ADMINID, $adminid, $comparison);
    }

    /**
     * Filter the query on the realname column
     *
     * Example usage:
     * <code>
     * $query->filterByRealname('fooValue');   // WHERE realname = 'fooValue'
     * $query->filterByRealname('%fooValue%', Criteria::LIKE); // WHERE realname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $realname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByRealname($realname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($realname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_REALNAME, $realname, $comparison);
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
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAdmin $admin Object to remove from the list of results
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function prune($admin = null)
    {
        if ($admin) {
            $this->addUsingAlias(AdminTableMap::COL_ADMINID, $admin->getAdminid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the infiniaadmins table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdminTableMap::clearInstancePool();
            AdminTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdminTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdminTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdminTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AdminQuery
