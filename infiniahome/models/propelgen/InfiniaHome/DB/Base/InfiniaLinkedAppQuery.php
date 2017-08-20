<?php

namespace InfiniaHome\DB\Base;

use \Exception;
use \PDO;
use InfiniaHome\DB\InfiniaLinkedApp as ChildInfiniaLinkedApp;
use InfiniaHome\DB\InfiniaLinkedAppQuery as ChildInfiniaLinkedAppQuery;
use InfiniaHome\DB\Map\InfiniaLinkedAppTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'infiniaapplications' table.
 *
 *
 *
 * @method     ChildInfiniaLinkedAppQuery orderByAppId($order = Criteria::ASC) Order by the app_id column
 * @method     ChildInfiniaLinkedAppQuery orderByAppName($order = Criteria::ASC) Order by the app_name column
 * @method     ChildInfiniaLinkedAppQuery orderByAppUrl($order = Criteria::ASC) Order by the app_url column
 * @method     ChildInfiniaLinkedAppQuery orderByappPublicKey($order = Criteria::ASC) Order by the app_publickey column
 * @method     ChildInfiniaLinkedAppQuery orderByappPrivateKey($order = Criteria::ASC) Order by the app_privatekey column
 * @method     ChildInfiniaLinkedAppQuery orderByappCreator($order = Criteria::ASC) Order by the app_registerer column
 *
 * @method     ChildInfiniaLinkedAppQuery groupByAppId() Group by the app_id column
 * @method     ChildInfiniaLinkedAppQuery groupByAppName() Group by the app_name column
 * @method     ChildInfiniaLinkedAppQuery groupByAppUrl() Group by the app_url column
 * @method     ChildInfiniaLinkedAppQuery groupByappPublicKey() Group by the app_publickey column
 * @method     ChildInfiniaLinkedAppQuery groupByappPrivateKey() Group by the app_privatekey column
 * @method     ChildInfiniaLinkedAppQuery groupByappCreator() Group by the app_registerer column
 *
 * @method     ChildInfiniaLinkedAppQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInfiniaLinkedAppQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInfiniaLinkedAppQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInfiniaLinkedAppQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInfiniaLinkedAppQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInfiniaLinkedAppQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInfiniaLinkedApp findOne(ConnectionInterface $con = null) Return the first ChildInfiniaLinkedApp matching the query
 * @method     ChildInfiniaLinkedApp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInfiniaLinkedApp matching the query, or a new ChildInfiniaLinkedApp object populated from the query conditions when no match is found
 *
 * @method     ChildInfiniaLinkedApp findOneByAppId(int $app_id) Return the first ChildInfiniaLinkedApp filtered by the app_id column
 * @method     ChildInfiniaLinkedApp findOneByAppName(string $app_name) Return the first ChildInfiniaLinkedApp filtered by the app_name column
 * @method     ChildInfiniaLinkedApp findOneByAppUrl(string $app_url) Return the first ChildInfiniaLinkedApp filtered by the app_url column
 * @method     ChildInfiniaLinkedApp findOneByappPublicKey(string $app_publickey) Return the first ChildInfiniaLinkedApp filtered by the app_publickey column
 * @method     ChildInfiniaLinkedApp findOneByappPrivateKey(string $app_privatekey) Return the first ChildInfiniaLinkedApp filtered by the app_privatekey column
 * @method     ChildInfiniaLinkedApp findOneByappCreator(string $app_registerer) Return the first ChildInfiniaLinkedApp filtered by the app_registerer column *

 * @method     ChildInfiniaLinkedApp requirePk($key, ConnectionInterface $con = null) Return the ChildInfiniaLinkedApp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaLinkedApp requireOne(ConnectionInterface $con = null) Return the first ChildInfiniaLinkedApp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInfiniaLinkedApp requireOneByAppId(int $app_id) Return the first ChildInfiniaLinkedApp filtered by the app_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaLinkedApp requireOneByAppName(string $app_name) Return the first ChildInfiniaLinkedApp filtered by the app_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaLinkedApp requireOneByAppUrl(string $app_url) Return the first ChildInfiniaLinkedApp filtered by the app_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaLinkedApp requireOneByappPublicKey(string $app_publickey) Return the first ChildInfiniaLinkedApp filtered by the app_publickey column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaLinkedApp requireOneByappPrivateKey(string $app_privatekey) Return the first ChildInfiniaLinkedApp filtered by the app_privatekey column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInfiniaLinkedApp requireOneByappCreator(string $app_registerer) Return the first ChildInfiniaLinkedApp filtered by the app_registerer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInfiniaLinkedApp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInfiniaLinkedApp objects based on current ModelCriteria
 * @method     ChildInfiniaLinkedApp[]|ObjectCollection findByAppId(int $app_id) Return ChildInfiniaLinkedApp objects filtered by the app_id column
 * @method     ChildInfiniaLinkedApp[]|ObjectCollection findByAppName(string $app_name) Return ChildInfiniaLinkedApp objects filtered by the app_name column
 * @method     ChildInfiniaLinkedApp[]|ObjectCollection findByAppUrl(string $app_url) Return ChildInfiniaLinkedApp objects filtered by the app_url column
 * @method     ChildInfiniaLinkedApp[]|ObjectCollection findByappPublicKey(string $app_publickey) Return ChildInfiniaLinkedApp objects filtered by the app_publickey column
 * @method     ChildInfiniaLinkedApp[]|ObjectCollection findByappPrivateKey(string $app_privatekey) Return ChildInfiniaLinkedApp objects filtered by the app_privatekey column
 * @method     ChildInfiniaLinkedApp[]|ObjectCollection findByappCreator(string $app_registerer) Return ChildInfiniaLinkedApp objects filtered by the app_registerer column
 * @method     ChildInfiniaLinkedApp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InfiniaLinkedAppQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \InfiniaHome\DB\Base\InfiniaLinkedAppQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InfiniaHome\\DB\\InfiniaLinkedApp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInfiniaLinkedAppQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInfiniaLinkedAppQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInfiniaLinkedAppQuery) {
            return $criteria;
        }
        $query = new ChildInfiniaLinkedAppQuery();
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
     * @return ChildInfiniaLinkedApp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InfiniaLinkedAppTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InfiniaLinkedAppTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInfiniaLinkedApp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT app_id, app_name, app_url, app_publickey, app_privatekey, app_registerer FROM infiniaapplications WHERE app_id = :p0';
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
            /** @var ChildInfiniaLinkedApp $obj */
            $obj = new ChildInfiniaLinkedApp();
            $obj->hydrate($row);
            InfiniaLinkedAppTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInfiniaLinkedApp|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the app_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAppId(1234); // WHERE app_id = 1234
     * $query->filterByAppId(array(12, 34)); // WHERE app_id IN (12, 34)
     * $query->filterByAppId(array('min' => 12)); // WHERE app_id > 12
     * </code>
     *
     * @param     mixed $appId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByAppId($appId = null, $comparison = null)
    {
        if (is_array($appId)) {
            $useMinMax = false;
            if (isset($appId['min'])) {
                $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_ID, $appId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($appId['max'])) {
                $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_ID, $appId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_ID, $appId, $comparison);
    }

    /**
     * Filter the query on the app_name column
     *
     * Example usage:
     * <code>
     * $query->filterByAppName('fooValue');   // WHERE app_name = 'fooValue'
     * $query->filterByAppName('%fooValue%', Criteria::LIKE); // WHERE app_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByAppName($appName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_NAME, $appName, $comparison);
    }

    /**
     * Filter the query on the app_url column
     *
     * Example usage:
     * <code>
     * $query->filterByAppUrl('fooValue');   // WHERE app_url = 'fooValue'
     * $query->filterByAppUrl('%fooValue%', Criteria::LIKE); // WHERE app_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appUrl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByAppUrl($appUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appUrl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_URL, $appUrl, $comparison);
    }

    /**
     * Filter the query on the app_publickey column
     *
     * Example usage:
     * <code>
     * $query->filterByappPublicKey('fooValue');   // WHERE app_publickey = 'fooValue'
     * $query->filterByappPublicKey('%fooValue%', Criteria::LIKE); // WHERE app_publickey LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appPublicKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByappPublicKey($appPublicKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appPublicKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_PUBLICKEY, $appPublicKey, $comparison);
    }

    /**
     * Filter the query on the app_privatekey column
     *
     * Example usage:
     * <code>
     * $query->filterByappPrivateKey('fooValue');   // WHERE app_privatekey = 'fooValue'
     * $query->filterByappPrivateKey('%fooValue%', Criteria::LIKE); // WHERE app_privatekey LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appPrivateKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByappPrivateKey($appPrivateKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appPrivateKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_PRIVATEKEY, $appPrivateKey, $comparison);
    }

    /**
     * Filter the query on the app_registerer column
     *
     * Example usage:
     * <code>
     * $query->filterByappCreator('fooValue');   // WHERE app_registerer = 'fooValue'
     * $query->filterByappCreator('%fooValue%', Criteria::LIKE); // WHERE app_registerer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appCreator The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function filterByappCreator($appCreator = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appCreator)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_REGISTERER, $appCreator, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInfiniaLinkedApp $infiniaLinkedApp Object to remove from the list of results
     *
     * @return $this|ChildInfiniaLinkedAppQuery The current query, for fluid interface
     */
    public function prune($infiniaLinkedApp = null)
    {
        if ($infiniaLinkedApp) {
            $this->addUsingAlias(InfiniaLinkedAppTableMap::COL_APP_ID, $infiniaLinkedApp->getAppId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the infiniaapplications table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaLinkedAppTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InfiniaLinkedAppTableMap::clearInstancePool();
            InfiniaLinkedAppTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaLinkedAppTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InfiniaLinkedAppTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InfiniaLinkedAppTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InfiniaLinkedAppTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InfiniaLinkedAppQuery
