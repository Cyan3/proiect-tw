<?php

namespace bdxe\Base;

use \Exception;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use bdxe\DateTest as ChildDateTest;
use bdxe\DateTestQuery as ChildDateTestQuery;
use bdxe\Map\DateTestTableMap;

/**
 * Base class that represents a query for the 'DateTest' table.
 *
 * 
 *
 * @method     ChildDateTestQuery orderByDuetime($order = Criteria::ASC) Order by the DueTime column
 *
 * @method     ChildDateTestQuery groupByDuetime() Group by the DueTime column
 *
 * @method     ChildDateTestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDateTestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDateTestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDateTest findOne(ConnectionInterface $con = null) Return the first ChildDateTest matching the query
 * @method     ChildDateTest findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDateTest matching the query, or a new ChildDateTest object populated from the query conditions when no match is found
 *
 * @method     ChildDateTest findOneByDuetime(string $DueTime) Return the first ChildDateTest filtered by the DueTime column *

 * @method     ChildDateTest requirePk($key, ConnectionInterface $con = null) Return the ChildDateTest by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDateTest requireOne(ConnectionInterface $con = null) Return the first ChildDateTest matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDateTest requireOneByDuetime(string $DueTime) Return the first ChildDateTest filtered by the DueTime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDateTest[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDateTest objects based on current ModelCriteria
 * @method     ChildDateTest[]|ObjectCollection findByDuetime(string $DueTime) Return ChildDateTest objects filtered by the DueTime column
 * @method     ChildDateTest[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DateTestQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \bdxe\Base\DateTestQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\bdxe\\DateTest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDateTestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDateTestQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDateTestQuery) {
            return $criteria;
        }
        $query = new ChildDateTestQuery();
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
     * @return ChildDateTest|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The DateTest object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The DateTest object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDateTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The DateTest object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDateTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The DateTest object has no primary key');
    }

    /**
     * Filter the query on the DueTime column
     *
     * Example usage:
     * <code>
     * $query->filterByDuetime('2011-03-14'); // WHERE DueTime = '2011-03-14'
     * $query->filterByDuetime('now'); // WHERE DueTime = '2011-03-14'
     * $query->filterByDuetime(array('max' => 'yesterday')); // WHERE DueTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $duetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDateTestQuery The current query, for fluid interface
     */
    public function filterByDuetime($duetime = null, $comparison = null)
    {
        if (is_array($duetime)) {
            $useMinMax = false;
            if (isset($duetime['min'])) {
                $this->addUsingAlias(DateTestTableMap::COL_DUETIME, $duetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duetime['max'])) {
                $this->addUsingAlias(DateTestTableMap::COL_DUETIME, $duetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DateTestTableMap::COL_DUETIME, $duetime, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDateTest $dateTest Object to remove from the list of results
     *
     * @return $this|ChildDateTestQuery The current query, for fluid interface
     */
    public function prune($dateTest = null)
    {
        if ($dateTest) {
            throw new LogicException('DateTest object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the DateTest table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DateTestTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DateTestTableMap::clearInstancePool();
            DateTestTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DateTestTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DateTestTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            DateTestTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            DateTestTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DateTestQuery
