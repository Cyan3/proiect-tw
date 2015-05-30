<?php

namespace bdxe\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use bdxe\Course;
use bdxe\CourseQuery;


/**
 * This class defines the structure of the 'course_tb' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CourseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bdxe.Map.CourseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'course_tb';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\bdxe\\Course';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'bdxe.Course';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'course_tb.id';

    /**
     * the column name for the profesor_id field
     */
    const COL_PROFESOR_ID = 'course_tb.profesor_id';

    /**
     * the column name for the subject_id field
     */
    const COL_SUBJECT_ID = 'course_tb.subject_id';

    /**
     * the column name for the Subject_Name field
     */
    const COL_SUBJECT_NAME = 'course_tb.Subject_Name';

    /**
     * the column name for the Class_Capacity field
     */
    const COL_CLASS_CAPACITY = 'course_tb.Class_Capacity';

    /**
     * the column name for the Start_Date field
     */
    const COL_START_DATE = 'course_tb.Start_Date';

    /**
     * the column name for the Finish_Date field
     */
    const COL_FINISH_DATE = 'course_tb.Finish_Date';

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
        self::TYPE_PHPNAME       => array('Id', 'ProfesorId', 'SubjectId', 'SubjectName', 'ClassCapacity', 'StartDate', 'FinishDate', ),
        self::TYPE_CAMELNAME     => array('id', 'profesorId', 'subjectId', 'subjectName', 'classCapacity', 'startDate', 'finishDate', ),
        self::TYPE_COLNAME       => array(CourseTableMap::COL_ID, CourseTableMap::COL_PROFESOR_ID, CourseTableMap::COL_SUBJECT_ID, CourseTableMap::COL_SUBJECT_NAME, CourseTableMap::COL_CLASS_CAPACITY, CourseTableMap::COL_START_DATE, CourseTableMap::COL_FINISH_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'profesor_id', 'subject_id', 'Subject_Name', 'Class_Capacity', 'Start_Date', 'Finish_Date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProfesorId' => 1, 'SubjectId' => 2, 'SubjectName' => 3, 'ClassCapacity' => 4, 'StartDate' => 5, 'FinishDate' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'profesorId' => 1, 'subjectId' => 2, 'subjectName' => 3, 'classCapacity' => 4, 'startDate' => 5, 'finishDate' => 6, ),
        self::TYPE_COLNAME       => array(CourseTableMap::COL_ID => 0, CourseTableMap::COL_PROFESOR_ID => 1, CourseTableMap::COL_SUBJECT_ID => 2, CourseTableMap::COL_SUBJECT_NAME => 3, CourseTableMap::COL_CLASS_CAPACITY => 4, CourseTableMap::COL_START_DATE => 5, CourseTableMap::COL_FINISH_DATE => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'profesor_id' => 1, 'subject_id' => 2, 'Subject_Name' => 3, 'Class_Capacity' => 4, 'Start_Date' => 5, 'Finish_Date' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('course_tb');
        $this->setPhpName('Course');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\bdxe\\Course');
        $this->setPackage('bdxe');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('course_tb_SEQ');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('profesor_id', 'ProfesorId', 'INTEGER', 'profesor_tb', 'id', false, null, null);
        $this->addForeignKey('subject_id', 'SubjectId', 'INTEGER', 'subject_tb', 'id', false, null, null);
        $this->addColumn('Subject_Name', 'SubjectName', 'VARCHAR', false, 255, null);
        $this->addColumn('Class_Capacity', 'ClassCapacity', 'INTEGER', false, null, null);
        $this->addColumn('Start_Date', 'StartDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('Finish_Date', 'FinishDate', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Profesor', '\\bdxe\\Profesor', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':profesor_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Subject', '\\bdxe\\Subject', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':subject_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Subscription', '\\bdxe\\Subscription', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':course_id',
    1 => ':id',
  ),
), null, null, 'Subscriptions', false);
        $this->addRelation('Homework', '\\bdxe\\Homework', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':course_id',
    1 => ':id',
  ),
), null, null, 'Homeworks', false);
        $this->addRelation('Test', '\\bdxe\\Test', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':course_id',
    1 => ':id',
  ),
), null, null, 'Tests', false);
        $this->addRelation('Project', '\\bdxe\\Project', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':course_id',
    1 => ':id',
  ),
), null, null, 'Projects', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CourseTableMap::CLASS_DEFAULT : CourseTableMap::OM_CLASS;
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
     * @return array           (Course object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CourseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CourseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CourseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CourseTableMap::OM_CLASS;
            /** @var Course $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CourseTableMap::addInstanceToPool($obj, $key);
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
            $key = CourseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CourseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Course $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CourseTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CourseTableMap::COL_ID);
            $criteria->addSelectColumn(CourseTableMap::COL_PROFESOR_ID);
            $criteria->addSelectColumn(CourseTableMap::COL_SUBJECT_ID);
            $criteria->addSelectColumn(CourseTableMap::COL_SUBJECT_NAME);
            $criteria->addSelectColumn(CourseTableMap::COL_CLASS_CAPACITY);
            $criteria->addSelectColumn(CourseTableMap::COL_START_DATE);
            $criteria->addSelectColumn(CourseTableMap::COL_FINISH_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.profesor_id');
            $criteria->addSelectColumn($alias . '.subject_id');
            $criteria->addSelectColumn($alias . '.Subject_Name');
            $criteria->addSelectColumn($alias . '.Class_Capacity');
            $criteria->addSelectColumn($alias . '.Start_Date');
            $criteria->addSelectColumn($alias . '.Finish_Date');
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
        return Propel::getServiceContainer()->getDatabaseMap(CourseTableMap::DATABASE_NAME)->getTable(CourseTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CourseTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CourseTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CourseTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Course or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Course object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \bdxe\Course) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CourseTableMap::DATABASE_NAME);
            $criteria->add(CourseTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CourseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CourseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CourseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the course_tb table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CourseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Course or Criteria object.
     *
     * @param mixed               $criteria Criteria or Course object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Course object
        }

        if ($criteria->containsKey(CourseTableMap::COL_ID) && $criteria->keyContainsValue(CourseTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CourseTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CourseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CourseTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CourseTableMap::buildTableMap();