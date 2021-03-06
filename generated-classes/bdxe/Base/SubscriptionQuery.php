<?php

namespace bdxe\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use bdxe\Subscription as ChildSubscription;
use bdxe\SubscriptionQuery as ChildSubscriptionQuery;
use bdxe\Map\SubscriptionTableMap;

/**
 * Base class that represents a query for the 'subscription_tb' table.
 *
 * 
 *
 * @method     ChildSubscriptionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSubscriptionQuery orderByStudentId($order = Criteria::ASC) Order by the student_id column
 * @method     ChildSubscriptionQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 *
 * @method     ChildSubscriptionQuery groupById() Group by the id column
 * @method     ChildSubscriptionQuery groupByStudentId() Group by the student_id column
 * @method     ChildSubscriptionQuery groupByCourseId() Group by the course_id column
 *
 * @method     ChildSubscriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSubscriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSubscriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSubscriptionQuery leftJoinStudent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Student relation
 * @method     ChildSubscriptionQuery rightJoinStudent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Student relation
 * @method     ChildSubscriptionQuery innerJoinStudent($relationAlias = null) Adds a INNER JOIN clause to the query using the Student relation
 *
 * @method     ChildSubscriptionQuery leftJoinCourse($relationAlias = null) Adds a LEFT JOIN clause to the query using the Course relation
 * @method     ChildSubscriptionQuery rightJoinCourse($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Course relation
 * @method     ChildSubscriptionQuery innerJoinCourse($relationAlias = null) Adds a INNER JOIN clause to the query using the Course relation
 *
 * @method     ChildSubscriptionQuery leftJoinHomeworkEval($relationAlias = null) Adds a LEFT JOIN clause to the query using the HomeworkEval relation
 * @method     ChildSubscriptionQuery rightJoinHomeworkEval($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HomeworkEval relation
 * @method     ChildSubscriptionQuery innerJoinHomeworkEval($relationAlias = null) Adds a INNER JOIN clause to the query using the HomeworkEval relation
 *
 * @method     ChildSubscriptionQuery leftJoinTestEval($relationAlias = null) Adds a LEFT JOIN clause to the query using the TestEval relation
 * @method     ChildSubscriptionQuery rightJoinTestEval($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TestEval relation
 * @method     ChildSubscriptionQuery innerJoinTestEval($relationAlias = null) Adds a INNER JOIN clause to the query using the TestEval relation
 *
 * @method     ChildSubscriptionQuery leftJoinProjectEval($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectEval relation
 * @method     ChildSubscriptionQuery rightJoinProjectEval($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectEval relation
 * @method     ChildSubscriptionQuery innerJoinProjectEval($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectEval relation
 *
 * @method     ChildSubscriptionQuery leftJoinPack($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pack relation
 * @method     ChildSubscriptionQuery rightJoinPack($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pack relation
 * @method     ChildSubscriptionQuery innerJoinPack($relationAlias = null) Adds a INNER JOIN clause to the query using the Pack relation
 *
 * @method     \bdxe\StudentQuery|\bdxe\CourseQuery|\bdxe\HomeworkEvalQuery|\bdxe\TestEvalQuery|\bdxe\ProjectEvalQuery|\bdxe\PackQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSubscription findOne(ConnectionInterface $con = null) Return the first ChildSubscription matching the query
 * @method     ChildSubscription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSubscription matching the query, or a new ChildSubscription object populated from the query conditions when no match is found
 *
 * @method     ChildSubscription findOneById(int $id) Return the first ChildSubscription filtered by the id column
 * @method     ChildSubscription findOneByStudentId(int $student_id) Return the first ChildSubscription filtered by the student_id column
 * @method     ChildSubscription findOneByCourseId(int $course_id) Return the first ChildSubscription filtered by the course_id column *

 * @method     ChildSubscription requirePk($key, ConnectionInterface $con = null) Return the ChildSubscription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSubscription requireOne(ConnectionInterface $con = null) Return the first ChildSubscription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSubscription requireOneById(int $id) Return the first ChildSubscription filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSubscription requireOneByStudentId(int $student_id) Return the first ChildSubscription filtered by the student_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSubscription requireOneByCourseId(int $course_id) Return the first ChildSubscription filtered by the course_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSubscription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSubscription objects based on current ModelCriteria
 * @method     ChildSubscription[]|ObjectCollection findById(int $id) Return ChildSubscription objects filtered by the id column
 * @method     ChildSubscription[]|ObjectCollection findByStudentId(int $student_id) Return ChildSubscription objects filtered by the student_id column
 * @method     ChildSubscription[]|ObjectCollection findByCourseId(int $course_id) Return ChildSubscription objects filtered by the course_id column
 * @method     ChildSubscription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SubscriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \bdxe\Base\SubscriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\bdxe\\Subscription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSubscriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSubscriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSubscriptionQuery) {
            return $criteria;
        }
        $query = new ChildSubscriptionQuery();
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
     * @return ChildSubscription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SubscriptionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SubscriptionTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
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
     * @return ChildSubscription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, student_id, course_id FROM subscription_tb WHERE id = :p0';
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
            /** @var ChildSubscription $obj */
            $obj = new ChildSubscription();
            $obj->hydrate($row);
            SubscriptionTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSubscription|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SubscriptionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SubscriptionTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SubscriptionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SubscriptionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SubscriptionTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the student_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStudentId(1234); // WHERE student_id = 1234
     * $query->filterByStudentId(array(12, 34)); // WHERE student_id IN (12, 34)
     * $query->filterByStudentId(array('min' => 12)); // WHERE student_id > 12
     * </code>
     *
     * @see       filterByStudent()
     *
     * @param     mixed $studentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByStudentId($studentId = null, $comparison = null)
    {
        if (is_array($studentId)) {
            $useMinMax = false;
            if (isset($studentId['min'])) {
                $this->addUsingAlias(SubscriptionTableMap::COL_STUDENT_ID, $studentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($studentId['max'])) {
                $this->addUsingAlias(SubscriptionTableMap::COL_STUDENT_ID, $studentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SubscriptionTableMap::COL_STUDENT_ID, $studentId, $comparison);
    }

    /**
     * Filter the query on the course_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCourseId(1234); // WHERE course_id = 1234
     * $query->filterByCourseId(array(12, 34)); // WHERE course_id IN (12, 34)
     * $query->filterByCourseId(array('min' => 12)); // WHERE course_id > 12
     * </code>
     *
     * @see       filterByCourse()
     *
     * @param     mixed $courseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (is_array($courseId)) {
            $useMinMax = false;
            if (isset($courseId['min'])) {
                $this->addUsingAlias(SubscriptionTableMap::COL_COURSE_ID, $courseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($courseId['max'])) {
                $this->addUsingAlias(SubscriptionTableMap::COL_COURSE_ID, $courseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SubscriptionTableMap::COL_COURSE_ID, $courseId, $comparison);
    }

    /**
     * Filter the query by a related \bdxe\Student object
     *
     * @param \bdxe\Student|ObjectCollection $student The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByStudent($student, $comparison = null)
    {
        if ($student instanceof \bdxe\Student) {
            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_STUDENT_ID, $student->getId(), $comparison);
        } elseif ($student instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_STUDENT_ID, $student->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStudent() only accepts arguments of type \bdxe\Student or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Student relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function joinStudent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Student');

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
            $this->addJoinObject($join, 'Student');
        }

        return $this;
    }

    /**
     * Use the Student relation Student object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \bdxe\StudentQuery A secondary query class using the current class as primary query
     */
    public function useStudentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStudent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Student', '\bdxe\StudentQuery');
    }

    /**
     * Filter the query by a related \bdxe\Course object
     *
     * @param \bdxe\Course|ObjectCollection $course The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByCourse($course, $comparison = null)
    {
        if ($course instanceof \bdxe\Course) {
            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_COURSE_ID, $course->getId(), $comparison);
        } elseif ($course instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_COURSE_ID, $course->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCourse() only accepts arguments of type \bdxe\Course or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Course relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function joinCourse($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Course');

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
            $this->addJoinObject($join, 'Course');
        }

        return $this;
    }

    /**
     * Use the Course relation Course object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \bdxe\CourseQuery A secondary query class using the current class as primary query
     */
    public function useCourseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCourse($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Course', '\bdxe\CourseQuery');
    }

    /**
     * Filter the query by a related \bdxe\HomeworkEval object
     *
     * @param \bdxe\HomeworkEval|ObjectCollection $homeworkEval the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByHomeworkEval($homeworkEval, $comparison = null)
    {
        if ($homeworkEval instanceof \bdxe\HomeworkEval) {
            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_ID, $homeworkEval->getSubscriptionId(), $comparison);
        } elseif ($homeworkEval instanceof ObjectCollection) {
            return $this
                ->useHomeworkEvalQuery()
                ->filterByPrimaryKeys($homeworkEval->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHomeworkEval() only accepts arguments of type \bdxe\HomeworkEval or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HomeworkEval relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function joinHomeworkEval($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HomeworkEval');

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
            $this->addJoinObject($join, 'HomeworkEval');
        }

        return $this;
    }

    /**
     * Use the HomeworkEval relation HomeworkEval object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \bdxe\HomeworkEvalQuery A secondary query class using the current class as primary query
     */
    public function useHomeworkEvalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHomeworkEval($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HomeworkEval', '\bdxe\HomeworkEvalQuery');
    }

    /**
     * Filter the query by a related \bdxe\TestEval object
     *
     * @param \bdxe\TestEval|ObjectCollection $testEval the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByTestEval($testEval, $comparison = null)
    {
        if ($testEval instanceof \bdxe\TestEval) {
            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_ID, $testEval->getSubscriptionId(), $comparison);
        } elseif ($testEval instanceof ObjectCollection) {
            return $this
                ->useTestEvalQuery()
                ->filterByPrimaryKeys($testEval->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTestEval() only accepts arguments of type \bdxe\TestEval or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TestEval relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function joinTestEval($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TestEval');

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
            $this->addJoinObject($join, 'TestEval');
        }

        return $this;
    }

    /**
     * Use the TestEval relation TestEval object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \bdxe\TestEvalQuery A secondary query class using the current class as primary query
     */
    public function useTestEvalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTestEval($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TestEval', '\bdxe\TestEvalQuery');
    }

    /**
     * Filter the query by a related \bdxe\ProjectEval object
     *
     * @param \bdxe\ProjectEval|ObjectCollection $projectEval the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByProjectEval($projectEval, $comparison = null)
    {
        if ($projectEval instanceof \bdxe\ProjectEval) {
            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_ID, $projectEval->getSubscriptionId(), $comparison);
        } elseif ($projectEval instanceof ObjectCollection) {
            return $this
                ->useProjectEvalQuery()
                ->filterByPrimaryKeys($projectEval->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectEval() only accepts arguments of type \bdxe\ProjectEval or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectEval relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function joinProjectEval($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectEval');

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
            $this->addJoinObject($join, 'ProjectEval');
        }

        return $this;
    }

    /**
     * Use the ProjectEval relation ProjectEval object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \bdxe\ProjectEvalQuery A secondary query class using the current class as primary query
     */
    public function useProjectEvalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProjectEval($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectEval', '\bdxe\ProjectEvalQuery');
    }

    /**
     * Filter the query by a related \bdxe\Pack object
     *
     * @param \bdxe\Pack|ObjectCollection $pack the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSubscriptionQuery The current query, for fluid interface
     */
    public function filterByPack($pack, $comparison = null)
    {
        if ($pack instanceof \bdxe\Pack) {
            return $this
                ->addUsingAlias(SubscriptionTableMap::COL_ID, $pack->getSubscriptionId(), $comparison);
        } elseif ($pack instanceof ObjectCollection) {
            return $this
                ->usePackQuery()
                ->filterByPrimaryKeys($pack->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPack() only accepts arguments of type \bdxe\Pack or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pack relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function joinPack($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pack');

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
            $this->addJoinObject($join, 'Pack');
        }

        return $this;
    }

    /**
     * Use the Pack relation Pack object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \bdxe\PackQuery A secondary query class using the current class as primary query
     */
    public function usePackQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPack($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pack', '\bdxe\PackQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSubscription $subscription Object to remove from the list of results
     *
     * @return $this|ChildSubscriptionQuery The current query, for fluid interface
     */
    public function prune($subscription = null)
    {
        if ($subscription) {
            $this->addUsingAlias(SubscriptionTableMap::COL_ID, $subscription->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the subscription_tb table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SubscriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SubscriptionTableMap::clearInstancePool();
            SubscriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SubscriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SubscriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            SubscriptionTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            SubscriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SubscriptionQuery
