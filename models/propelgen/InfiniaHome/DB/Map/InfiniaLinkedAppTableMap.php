<?php

namespace InfiniaHome\DB\Map;

use InfiniaHome\DB\InfiniaLinkedApp;
use InfiniaHome\DB\InfiniaLinkedAppQuery;
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
 * This class defines the structure of the 'infiniaapplications' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InfiniaLinkedAppTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'InfiniaHome.DB.Map.InfiniaLinkedAppTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'infiniaapplications';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InfiniaHome\\DB\\InfiniaLinkedApp';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InfiniaHome.DB.InfiniaLinkedApp';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the app_id field
     */
    const COL_APP_ID = 'infiniaapplications.app_id';

    /**
     * the column name for the app_name field
     */
    const COL_APP_NAME = 'infiniaapplications.app_name';

    /**
     * the column name for the app_url field
     */
    const COL_APP_URL = 'infiniaapplications.app_url';

    /**
     * the column name for the app_publickey field
     */
    const COL_APP_PUBLICKEY = 'infiniaapplications.app_publickey';

    /**
     * the column name for the app_privatekey field
     */
    const COL_APP_PRIVATEKEY = 'infiniaapplications.app_privatekey';

    /**
     * the column name for the app_registerer field
     */
    const COL_APP_REGISTERER = 'infiniaapplications.app_registerer';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('AppId', 'AppName', 'AppUrl', 'appPublicKey', 'appPrivateKey', 'appCreator', ),
        self::TYPE_CAMELNAME     => array('appId', 'appName', 'appUrl', 'appPublicKey', 'appPrivateKey', 'appCreator', ),
        self::TYPE_COLNAME       => array(InfiniaLinkedAppTableMap::COL_APP_ID, InfiniaLinkedAppTableMap::COL_APP_NAME, InfiniaLinkedAppTableMap::COL_APP_URL, InfiniaLinkedAppTableMap::COL_APP_PUBLICKEY, InfiniaLinkedAppTableMap::COL_APP_PRIVATEKEY, InfiniaLinkedAppTableMap::COL_APP_REGISTERER, ),
        self::TYPE_FIELDNAME     => array('app_id', 'app_name', 'app_url', 'app_publickey', 'app_privatekey', 'app_registerer', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AppId' => 0, 'AppName' => 1, 'AppUrl' => 2, 'appPublicKey' => 3, 'appPrivateKey' => 4, 'appCreator' => 5, ),
        self::TYPE_CAMELNAME     => array('appId' => 0, 'appName' => 1, 'appUrl' => 2, 'appPublicKey' => 3, 'appPrivateKey' => 4, 'appCreator' => 5, ),
        self::TYPE_COLNAME       => array(InfiniaLinkedAppTableMap::COL_APP_ID => 0, InfiniaLinkedAppTableMap::COL_APP_NAME => 1, InfiniaLinkedAppTableMap::COL_APP_URL => 2, InfiniaLinkedAppTableMap::COL_APP_PUBLICKEY => 3, InfiniaLinkedAppTableMap::COL_APP_PRIVATEKEY => 4, InfiniaLinkedAppTableMap::COL_APP_REGISTERER => 5, ),
        self::TYPE_FIELDNAME     => array('app_id' => 0, 'app_name' => 1, 'app_url' => 2, 'app_publickey' => 3, 'app_privatekey' => 4, 'app_registerer' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

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
        $this->setName('infiniaapplications');
        $this->setPhpName('InfiniaLinkedApp');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InfiniaHome\\DB\\InfiniaLinkedApp');
        $this->setPackage('InfiniaHome.DB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('app_id', 'AppId', 'INTEGER', true, null, null);
        $this->addColumn('app_name', 'AppName', 'VARCHAR', true, 255, null);
        $this->addColumn('app_url', 'AppUrl', 'LONGVARCHAR', true, null, null);
        $this->addColumn('app_publickey', 'appPublicKey', 'LONGVARCHAR', true, null, null);
        $this->addColumn('app_privatekey', 'appPrivateKey', 'LONGVARCHAR', true, null, null);
        $this->addColumn('app_registerer', 'appCreator', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AppId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('AppId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InfiniaLinkedAppTableMap::CLASS_DEFAULT : InfiniaLinkedAppTableMap::OM_CLASS;
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
     * @return array           (InfiniaLinkedApp object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InfiniaLinkedAppTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InfiniaLinkedAppTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InfiniaLinkedAppTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InfiniaLinkedAppTableMap::OM_CLASS;
            /** @var InfiniaLinkedApp $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InfiniaLinkedAppTableMap::addInstanceToPool($obj, $key);
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
            $key = InfiniaLinkedAppTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InfiniaLinkedAppTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InfiniaLinkedApp $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InfiniaLinkedAppTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InfiniaLinkedAppTableMap::COL_APP_ID);
            $criteria->addSelectColumn(InfiniaLinkedAppTableMap::COL_APP_NAME);
            $criteria->addSelectColumn(InfiniaLinkedAppTableMap::COL_APP_URL);
            $criteria->addSelectColumn(InfiniaLinkedAppTableMap::COL_APP_PUBLICKEY);
            $criteria->addSelectColumn(InfiniaLinkedAppTableMap::COL_APP_PRIVATEKEY);
            $criteria->addSelectColumn(InfiniaLinkedAppTableMap::COL_APP_REGISTERER);
        } else {
            $criteria->addSelectColumn($alias . '.app_id');
            $criteria->addSelectColumn($alias . '.app_name');
            $criteria->addSelectColumn($alias . '.app_url');
            $criteria->addSelectColumn($alias . '.app_publickey');
            $criteria->addSelectColumn($alias . '.app_privatekey');
            $criteria->addSelectColumn($alias . '.app_registerer');
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
        return Propel::getServiceContainer()->getDatabaseMap(InfiniaLinkedAppTableMap::DATABASE_NAME)->getTable(InfiniaLinkedAppTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InfiniaLinkedAppTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InfiniaLinkedAppTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InfiniaLinkedAppTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InfiniaLinkedApp or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InfiniaLinkedApp object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaLinkedAppTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InfiniaHome\DB\InfiniaLinkedApp) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InfiniaLinkedAppTableMap::DATABASE_NAME);
            $criteria->add(InfiniaLinkedAppTableMap::COL_APP_ID, (array) $values, Criteria::IN);
        }

        $query = InfiniaLinkedAppQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InfiniaLinkedAppTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InfiniaLinkedAppTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the infiniaapplications table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InfiniaLinkedAppQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InfiniaLinkedApp or Criteria object.
     *
     * @param mixed               $criteria Criteria or InfiniaLinkedApp object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InfiniaLinkedAppTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InfiniaLinkedApp object
        }

        if ($criteria->containsKey(InfiniaLinkedAppTableMap::COL_APP_ID) && $criteria->keyContainsValue(InfiniaLinkedAppTableMap::COL_APP_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.InfiniaLinkedAppTableMap::COL_APP_ID.')');
        }


        // Set the correct dbName
        $query = InfiniaLinkedAppQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InfiniaLinkedAppTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InfiniaLinkedAppTableMap::buildTableMap();
