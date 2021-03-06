<?php

namespace InfiniaHome\DB\Map;

use InfiniaHome\DB\UserStatus;
use InfiniaHome\DB\UserStatusQuery;
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
 * This class defines the structure of the 'infiniauser_status' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UserStatusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'InfiniaHome.DB.Map.UserStatusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'infiniauser_status';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InfiniaHome\\DB\\UserStatus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InfiniaHome.DB.UserStatus';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the userid field
     */
    const COL_USERID = 'infiniauser_status.userid';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'infiniauser_status.status';

    /**
     * the column name for the bannedtime field
     */
    const COL_BANNEDTIME = 'infiniauser_status.bannedtime';

    /**
     * the column name for the banned_forever field
     */
    const COL_BANNED_FOREVER = 'infiniauser_status.banned_forever';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the status field */
    const COL_STATUS_UNREGISTERED = 'Unregistered';
    const COL_STATUS_REGISTERED = 'Registered';
    const COL_STATUS_BANNED = 'Banned';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Userid', 'Status', 'Bannedtime', 'BannedForever', ),
        self::TYPE_CAMELNAME     => array('userid', 'status', 'bannedtime', 'bannedForever', ),
        self::TYPE_COLNAME       => array(UserStatusTableMap::COL_USERID, UserStatusTableMap::COL_STATUS, UserStatusTableMap::COL_BANNEDTIME, UserStatusTableMap::COL_BANNED_FOREVER, ),
        self::TYPE_FIELDNAME     => array('userid', 'status', 'bannedtime', 'banned_forever', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Userid' => 0, 'Status' => 1, 'Bannedtime' => 2, 'BannedForever' => 3, ),
        self::TYPE_CAMELNAME     => array('userid' => 0, 'status' => 1, 'bannedtime' => 2, 'bannedForever' => 3, ),
        self::TYPE_COLNAME       => array(UserStatusTableMap::COL_USERID => 0, UserStatusTableMap::COL_STATUS => 1, UserStatusTableMap::COL_BANNEDTIME => 2, UserStatusTableMap::COL_BANNED_FOREVER => 3, ),
        self::TYPE_FIELDNAME     => array('userid' => 0, 'status' => 1, 'bannedtime' => 2, 'banned_forever' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                UserStatusTableMap::COL_STATUS => array(
                            self::COL_STATUS_UNREGISTERED,
            self::COL_STATUS_REGISTERED,
            self::COL_STATUS_BANNED,
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
        $this->setName('infiniauser_status');
        $this->setPhpName('UserStatus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InfiniaHome\\DB\\UserStatus');
        $this->setPackage('InfiniaHome.DB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('userid', 'Userid', 'INTEGER', true, null, null);
        $this->addColumn('status', 'Status', 'ENUM', true, null, null);
        $this->getColumn('status')->setValueSet(array (
  0 => 'Unregistered',
  1 => 'Registered',
  2 => 'Banned',
));
        $this->addColumn('bannedtime', 'Bannedtime', 'TIMESTAMP', false, null, null);
        $this->addColumn('banned_forever', 'BannedForever', 'BOOLEAN', false, 1, false);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('InfiniaUser', '\\InfiniaHome\\DB\\InfiniaUser', RelationMap::ONE_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':userid',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UserStatusTableMap::CLASS_DEFAULT : UserStatusTableMap::OM_CLASS;
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
     * @return array           (UserStatus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UserStatusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserStatusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserStatusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserStatusTableMap::OM_CLASS;
            /** @var UserStatus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserStatusTableMap::addInstanceToPool($obj, $key);
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
            $key = UserStatusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserStatusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var UserStatus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserStatusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UserStatusTableMap::COL_USERID);
            $criteria->addSelectColumn(UserStatusTableMap::COL_STATUS);
            $criteria->addSelectColumn(UserStatusTableMap::COL_BANNEDTIME);
            $criteria->addSelectColumn(UserStatusTableMap::COL_BANNED_FOREVER);
        } else {
            $criteria->addSelectColumn($alias . '.userid');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.bannedtime');
            $criteria->addSelectColumn($alias . '.banned_forever');
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
        return Propel::getServiceContainer()->getDatabaseMap(UserStatusTableMap::DATABASE_NAME)->getTable(UserStatusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UserStatusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UserStatusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UserStatusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a UserStatus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or UserStatus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UserStatusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InfiniaHome\DB\UserStatus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserStatusTableMap::DATABASE_NAME);
            $criteria->add(UserStatusTableMap::COL_USERID, (array) $values, Criteria::IN);
        }

        $query = UserStatusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserStatusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserStatusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the infiniauser_status table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UserStatusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a UserStatus or Criteria object.
     *
     * @param mixed               $criteria Criteria or UserStatus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserStatusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from UserStatus object
        }

        if ($criteria->containsKey(UserStatusTableMap::COL_USERID) && $criteria->keyContainsValue(UserStatusTableMap::COL_USERID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserStatusTableMap::COL_USERID.')');
        }


        // Set the correct dbName
        $query = UserStatusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UserStatusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UserStatusTableMap::buildTableMap();
