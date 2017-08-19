<?php

namespace InfiniaHome\DB\Map;

use InfiniaHome\DB\InfiniaUser;
use InfiniaHome\DB\InfiniaUserQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'infiniausers' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InfiniaUserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'InfiniaHome.DB.Map.InfiniaUserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'infiniausers';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InfiniaHome\\DB\\InfiniaUser';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InfiniaHome.DB.InfiniaUser';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'infiniausers.user_id';

    /**
     * the column name for the user_name field
     */
    const COL_USER_NAME = 'infiniausers.user_name';

    /**
     * the column name for the user_realname field
     */
    const COL_USER_REALNAME = 'infiniausers.user_realname';

    /**
     * the column name for the user_code field
     */
    const COL_USER_CODE = 'infiniausers.user_code';

    /**
     * the column name for the user_email field
     */
    const COL_USER_EMAIL = 'infiniausers.user_email';

    /**
     * the column name for the user_password field
     */
    const COL_USER_PASSWORD = 'infiniausers.user_password';

    /**
     * the column name for the user_isverified field
     */
    const COL_USER_ISVERIFIED = 'infiniausers.user_isverified';

    /**
     * the column name for the user_rank field
     */
    const COL_USER_RANK = 'infiniausers.user_rank';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the user_rank field */
    const COL_USER_RANK_NORMAL = 'Normal';
    const COL_USER_RANK_INFINIABRONZE = 'InfiniaBronze';
    const COL_USER_RANK_INFINIASILVER = 'InfiniaSilver';
    const COL_USER_RANK_INFINIAGOLD = 'InfiniaGold';
    const COL_USER_RANK_INFINIAPLATINIUM = 'InfiniaPlatinium';
    const COL_USER_RANK_INFINIADIAMOND = 'InfiniaDiamond';
    const COL_USER_RANK_ADMIN = 'Admin';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('UserId', 'UserName', 'UserRealname', 'UserCode', 'UserEmail', 'UserPassword', 'UserIsverified', 'UserRank', ),
        self::TYPE_CAMELNAME     => array('userId', 'userName', 'userRealname', 'userCode', 'userEmail', 'userPassword', 'userIsverified', 'userRank', ),
        self::TYPE_COLNAME       => array(InfiniaUserTableMap::COL_USER_ID, InfiniaUserTableMap::COL_USER_NAME, InfiniaUserTableMap::COL_USER_REALNAME, InfiniaUserTableMap::COL_USER_CODE, InfiniaUserTableMap::COL_USER_EMAIL, InfiniaUserTableMap::COL_USER_PASSWORD, InfiniaUserTableMap::COL_USER_ISVERIFIED, InfiniaUserTableMap::COL_USER_RANK, ),
        self::TYPE_FIELDNAME     => array('user_id', 'user_name', 'user_realname', 'user_code', 'user_email', 'user_password', 'user_isverified', 'user_rank', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('UserId' => 0, 'UserName' => 1, 'UserRealname' => 2, 'UserCode' => 3, 'UserEmail' => 4, 'UserPassword' => 5, 'UserIsverified' => 6, 'UserRank' => 7, ),
        self::TYPE_CAMELNAME     => array('userId' => 0, 'userName' => 1, 'userRealname' => 2, 'userCode' => 3, 'userEmail' => 4, 'userPassword' => 5, 'userIsverified' => 6, 'userRank' => 7, ),
        self::TYPE_COLNAME       => array(InfiniaUserTableMap::COL_USER_ID => 0, InfiniaUserTableMap::COL_USER_NAME => 1, InfiniaUserTableMap::COL_USER_REALNAME => 2, InfiniaUserTableMap::COL_USER_CODE => 3, InfiniaUserTableMap::COL_USER_EMAIL => 4, InfiniaUserTableMap::COL_USER_PASSWORD => 5, InfiniaUserTableMap::COL_USER_ISVERIFIED => 6, InfiniaUserTableMap::COL_USER_RANK => 7, ),
        self::TYPE_FIELDNAME     => array('user_id' => 0, 'user_name' => 1, 'user_realname' => 2, 'user_code' => 3, 'user_email' => 4, 'user_password' => 5, 'user_isverified' => 6, 'user_rank' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                InfiniaUserTableMap::COL_USER_RANK => array(
                            self::COL_USER_RANK_NORMAL,
            self::COL_USER_RANK_INFINIABRONZE,
            self::COL_USER_RANK_INFINIASILVER,
            self::COL_USER_RANK_INFINIAGOLD,
            self::COL_USER_RANK_INFINIAPLATINIUM,
            self::COL_USER_RANK_INFINIADIAMOND,
            self::COL_USER_RANK_ADMIN,
        ),
    );

    /**
     * Gets the list of values for all ENUM and SET columns
     * @return array
     */
    public static function getValueSets()
    {
      return static::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM or SET column
     * @param string $colname
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = self::getValueSets();

        return $valueSets[$colname];
    }

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('infiniausers');
        $this->setPhpName('InfiniaUser');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InfiniaHome\\DB\\InfiniaUser');
        $this->setPackage('InfiniaHome.DB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('user_id', 'UserId', 'INTEGER', true, null, null);
        $this->addColumn('user_name', 'UserName', 'VARCHAR', true, 255, null);
        $this->addColumn('user_realname', 'UserRealname', 'VARCHAR', true, 255, null);
        $this->addColumn('user_code', 'UserCode', 'VARCHAR', true, 255, null);
        $this->addColumn('user_email', 'UserEmail', 'VARCHAR', true, 255, null);
        $this->addColumn('user_password', 'UserPassword', 'VARCHAR', true, 255, null);
        $this->addColumn('user_isverified', 'UserIsverified', 'BOOLEAN', true, 1, false);
        $this->addColumn('user_rank', 'UserRank', 'ENUM', true, null, null);
        $this->getColumn('user_rank')->setValueSet(array (
  0 => 'Normal',
  1 => 'InfiniaBronze',
  2 => 'InfiniaSilver',
  3 => 'InfiniaGold',
  4 => 'InfiniaPlatinium',
  5 => 'InfiniaDiamond',
  6 => 'Admin',
));
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? InfiniaUserTableMap::CLASS_DEFAULT : InfiniaUserTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (InfiniaUser object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InfiniaUserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InfiniaUserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InfiniaUserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InfiniaUserTableMap::OM_CLASS;
            /** @var InfiniaUser $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InfiniaUserTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = InfiniaUserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InfiniaUserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InfiniaUser $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InfiniaUserTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_ID);
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_NAME);
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_REALNAME);
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_CODE);
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_EMAIL);
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_PASSWORD);
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_ISVERIFIED);
            $criteria->addSelectColumn(InfiniaUserTableMap::COL_USER_RANK);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.user_name');
            $criteria->addSelectColumn($alias . '.user_realname');
            $criteria->addSelectColumn($alias . '.user_code');
            $criteria->addSelectColumn($alias . '.user_email');
            $criteria->addSelectColumn($alias . '.user_password');
            $criteria->addSelectColumn($alias . '.user_isverified');
            $criteria->addSelectColumn($alias . '.user_rank');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(InfiniaUserTableMap::DATABASE_NAME)->getTable(InfiniaUserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InfiniaUserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InfiniaUserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InfiniaUserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InfiniaUser or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InfiniaUser object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaUserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InfiniaHome\DB\InfiniaUser) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InfiniaUserTableMap::DATABASE_NAME);
            $criteria->add(InfiniaUserTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = InfiniaUserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InfiniaUserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InfiniaUserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the infiniausers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InfiniaUserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InfiniaUser or Criteria object.
     *
     * @param mixed               $criteria Criteria or InfiniaUser object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaUserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InfiniaUser object
        }

        if ($criteria->containsKey(InfiniaUserTableMap::COL_USER_ID) && $criteria->keyContainsValue(InfiniaUserTableMap::COL_USER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.InfiniaUserTableMap::COL_USER_ID.')');
        }


        // Set the correct dbName
        $query = InfiniaUserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InfiniaUserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InfiniaUserTableMap::buildTableMap();
