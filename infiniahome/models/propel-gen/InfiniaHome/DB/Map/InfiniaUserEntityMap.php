<?php

namespace InfiniaHome\DB\Map;

use InfiniaHome\DB\Map\InfiniaUserEntityMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Map\EntityMap;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Session\DependencyGraph;
use Propel\Runtime\Session\Session;

/**
 */
class InfiniaUserEntityMap extends \Propel\Runtime\Map\EntityMap {

	/**
	 * The database and connection name for the InfiniaUser entity.
	 */
	const DATABASE_NAME = 'default';

	/**
	 */
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * The full entity class name
	 */
	const ENTITY_CLASS = 'InfiniaHome\\DB\\InfiniaUser';

	/**
	 * The qualified name for the userCode field.
	 */
	const FIELD_USER_CODE = 'InfiniaHome\\DB\\InfiniaUser.userCode';

	/**
	 * The qualified name for the userEmail field.
	 */
	const FIELD_USER_EMAIL = 'InfiniaHome\\DB\\InfiniaUser.userEmail';

	/**
	 * The qualified name for the userId field.
	 */
	const FIELD_USER_ID = 'InfiniaHome\\DB\\InfiniaUser.userId';

	/**
	 * The qualified name for the userIsverified field.
	 */
	const FIELD_USER_ISVERIFIED = 'InfiniaHome\\DB\\InfiniaUser.userIsverified';

	/**
	 * The qualified name for the userName field.
	 */
	const FIELD_USER_NAME = 'InfiniaHome\\DB\\InfiniaUser.userName';

	/**
	 * The qualified name for the userPassword field.
	 */
	const FIELD_USER_PASSWORD = 'InfiniaHome\\DB\\InfiniaUser.userPassword';

	/**
	 * The qualified name for the userRank field.
	 */
	const FIELD_USER_RANK = 'InfiniaHome\\DB\\InfiniaUser.userRank';

	/**
	 * The qualified name for the userRealname field.
	 */
	const FIELD_USER_REALNAME = 'InfiniaHome\\DB\\InfiniaUser.userRealname';

	/**
	 * The full qualified table name (with schema name)
	 */
	const FQ_TABLE_NAME = 'infiniausers';

	/**
	 * The full proxy class name
	 */
	const PROXY_CLASS = 'InfiniaHome\\DB\\Base\\InfiniaUserProxy';

	/**
	 * The full query class name
	 */
	const QUERY_CLASS = 'InfiniaHome\\DB\\InfiniaUserQuery';

	/**
	 * The table name
	 */
	const TABLE_NAME = 'infiniausers';

	/**
	 */
	public $fieldKeys = array (
	  'phpName' => 
	  array (
	    'UserId' => 0,
	    'UserName' => 1,
	    'UserRealname' => 2,
	    'UserCode' => 3,
	    'UserEmail' => 4,
	    'UserPassword' => 5,
	    'UserIsverified' => 6,
	    'UserRank' => 7,
	  ),
	  'colName' => 
	  array (
	    'user_id' => 0,
	    'user_name' => 1,
	    'user_realname' => 2,
	    'user_code' => 3,
	    'user_email' => 4,
	    'user_password' => 5,
	    'user_isverified' => 6,
	    'user_rank' => 7,
	  ),
	  'fullColName' => 
	  array (
	    'infiniausers.user_id' => 0,
	    'infiniausers.user_name' => 1,
	    'infiniausers.user_realname' => 2,
	    'infiniausers.user_code' => 3,
	    'infiniausers.user_email' => 4,
	    'infiniausers.user_password' => 5,
	    'infiniausers.user_isverified' => 6,
	    'infiniausers.user_rank' => 7,
	  ),
	  'fieldName' => 
	  array (
	    'userId' => 0,
	    'userName' => 1,
	    'userRealname' => 2,
	    'userCode' => 3,
	    'userEmail' => 4,
	    'userPassword' => 5,
	    'userIsverified' => 6,
	    'userRank' => 7,
	  ),
	  'num' => 
	  array (
	    0 => 0,
	    1 => 1,
	    2 => 2,
	    3 => 3,
	    4 => 4,
	    5 => 5,
	    6 => 6,
	    7 => 7,
	  ),
	);

	/**
	 */
	public $fieldNames = array (
	  'phpName' => 
	  array (
	    0 => 'UserId',
	    1 => 'UserName',
	    2 => 'UserRealname',
	    3 => 'UserCode',
	    4 => 'UserEmail',
	    5 => 'UserPassword',
	    6 => 'UserIsverified',
	    7 => 'UserRank',
	  ),
	  'colName' => 
	  array (
	    0 => 'user_id',
	    1 => 'user_name',
	    2 => 'user_realname',
	    3 => 'user_code',
	    4 => 'user_email',
	    5 => 'user_password',
	    6 => 'user_isverified',
	    7 => 'user_rank',
	  ),
	  'fullColName' => 
	  array (
	    0 => 'infiniausers.user_id',
	    1 => 'infiniausers.user_name',
	    2 => 'infiniausers.user_realname',
	    3 => 'infiniausers.user_code',
	    4 => 'infiniausers.user_email',
	    5 => 'infiniausers.user_password',
	    6 => 'infiniausers.user_isverified',
	    7 => 'infiniausers.user_rank',
	  ),
	  'fieldName' => 
	  array (
	    0 => 'userId',
	    1 => 'userName',
	    2 => 'userRealname',
	    3 => 'userCode',
	    4 => 'userEmail',
	    5 => 'userPassword',
	    6 => 'userIsverified',
	    7 => 'userRank',
	  ),
	  'num' => 
	  array (
	    0 => 0,
	    1 => 1,
	    2 => 2,
	    3 => 3,
	    4 => 4,
	    5 => 5,
	    6 => 6,
	    7 => 7,
	  ),
	);

	/**
	 * @param Criteria $criteria
	 * @param string $alias
	 */
	public function addSelectFields(Criteria $criteria, $alias = null) {
		if (null === $alias) {
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_ID);
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_NAME);
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_REALNAME);
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_CODE);
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_EMAIL);
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_PASSWORD);
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_ISVERIFIED);
		    $criteria->addSelectField(InfiniaUserEntityMap::FIELD_USER_RANK);
		} else {
		    $criteria->addSelectField($alias . '.userId');
		    $criteria->addSelectField($alias . '.userName');
		    $criteria->addSelectField($alias . '.userRealname');
		    $criteria->addSelectField($alias . '.userCode');
		    $criteria->addSelectField($alias . '.userEmail');
		    $criteria->addSelectField($alias . '.userPassword');
		    $criteria->addSelectField($alias . '.userIsverified');
		    $criteria->addSelectField($alias . '.userRank');
		}
	}

	/**
	 * @param object $entity
	 * @return array|false Returns false when no changes are detected
	 */
	public function buildChangeSet($entity) {
		$changes = [];
		$changed = false;
		$reader = $this->getPropReader();
		$isset = $this->getPropIsset();
		$id = spl_object_hash($entity);
		$originValues = $this->getLastKnownValues($id);
		
		// field userId
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userId'), 'userId');
		    if (!isset($originValues['userId'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userId'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userId'] = $this->propertyToDatabase($reader($entity, 'userId'), 'userId');
		    $changed = true;
		}
		
		// field userName
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userName'), 'userName');
		    if (!isset($originValues['userName'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userName'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userName'] = $this->propertyToDatabase($reader($entity, 'userName'), 'userName');
		    $changed = true;
		}
		
		// field userRealname
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userRealname'), 'userRealname');
		    if (!isset($originValues['userRealname'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userRealname'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userRealname'] = $this->propertyToDatabase($reader($entity, 'userRealname'), 'userRealname');
		    $changed = true;
		}
		
		// field userCode
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userCode'), 'userCode');
		    if (!isset($originValues['userCode'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userCode'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userCode'] = $this->propertyToDatabase($reader($entity, 'userCode'), 'userCode');
		    $changed = true;
		}
		
		// field userEmail
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userEmail'), 'userEmail');
		    if (!isset($originValues['userEmail'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userEmail'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userEmail'] = $this->propertyToDatabase($reader($entity, 'userEmail'), 'userEmail');
		    $changed = true;
		}
		
		// field userPassword
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userPassword'), 'userPassword');
		    if (!isset($originValues['userPassword'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userPassword'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userPassword'] = $this->propertyToDatabase($reader($entity, 'userPassword'), 'userPassword');
		    $changed = true;
		}
		
		// field userIsverified
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userIsverified'), 'userIsverified');
		    if (!isset($originValues['userIsverified'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userIsverified'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userIsverified'] = $this->propertyToDatabase($reader($entity, 'userIsverified'), 'userIsverified');
		    $changed = true;
		}
		
		// field userRank
		$different = null;
		
		if (null === $different) {
		    $currentValue = $this->propertyToSnapshot($reader($entity, 'userRank'), 'userRank');
		    if (!isset($originValues['userRank'])) {
		        $lastValue = null;
		    } else {
		        $lastValue = $originValues['userRank'];
		    }
		    $different = $lastValue !== $currentValue;
		}
		if ($different) {
		    $changes['userRank'] = $this->propertyToDatabase($reader($entity, 'userRank'), 'userRank');
		    $changed = true;
		}
		
		if ($changed) {
		    return $changes;
		}
		
		return false;
	}

	/**
	 */
	public function buildFields() {
		$this->addPrimaryKey(
		    'userId',
		    'INTEGER',
		    true,
		    null,
		    null,
		    false
		);
		$this->getField('userId')->setAutoIncrement(true);
		$this->getField('userId')->setColumnName('user_id');
		$this->addField(
		    'userName',
		    'VARCHAR',
		    true,
		    255,
		    null,
		    false
		);
		$this->getField('userName')->setColumnName('user_name');
		$this->addField(
		    'userRealname',
		    'VARCHAR',
		    true,
		    255,
		    null,
		    false
		);
		$this->getField('userRealname')->setColumnName('user_realname');
		$this->addField(
		    'userCode',
		    'VARCHAR',
		    true,
		    255,
		    null,
		    false
		);
		$this->getField('userCode')->setColumnName('user_code');
		$this->addField(
		    'userEmail',
		    'VARCHAR',
		    true,
		    255,
		    null,
		    false
		);
		$this->getField('userEmail')->setColumnName('user_email');
		$this->addField(
		    'userPassword',
		    'VARCHAR',
		    true,
		    255,
		    null,
		    false
		);
		$this->getField('userPassword')->setColumnName('user_password');
		$this->addField(
		    'userIsverified',
		    'BOOLEAN',
		    true,
		    1,
		    false,
		    false
		);
		$this->getField('userIsverified')->setColumnName('user_isverified');
		$this->addField(
		    'userRank',
		    'ENUM',
		    true,
		    null,
		    null,
		    false
		);
		$this->getField('userRank')->setValueSet(array (
		  0 => 'Normal',
		  1 => 'InfiniaBronze',
		  2 => 'InfiniaSilver',
		  3 => 'InfiniaGold',
		  4 => 'InfiniaPlatinium',
		  5 => 'InfiniaDiamond',
		  6 => 'Admin',
		));
		$this->getField('userRank')->setColumnName('user_rank');
	}

	/**
	 * @param object $entity
	 * @return Criteria
	 */
	public function buildPkeyCriteria($entity) {
		$entityReader = $this->getPropReader();
		
		$criteria = $this->getRepository()->createQuery();
		$criteria->add(\InfiniaHome\DB\Map\InfiniaUserEntityMap::FIELD_USER_ID, $entityReader($entity, 'userId'));
		return $criteria;
	}

	/**
	 */
	public function buildRelations() {
	}

	/**
	 * @param $entity
	 * @param array $outgoingParams
	 */
	public function buildSqlBulkInsertPart($entity, array &$outgoingParams) {
		$params = [];
		$placeholder = [];
		$entityReader = $this->getPropReader();
		        
		//field:userName
		$value = $entityReader($entity, 'userName');
		$value = $this->propertyToDatabase($value, 'userName');
		if (null !== $value) {
		    $params['userName'] = $value;
		    $outgoingParams[] = $value;
		    $placeholder[] = '?';
		} else {
		    $placeholder[] = 'NULL';
		}
		//end field:userName
		
		//field:userRealname
		$value = $entityReader($entity, 'userRealname');
		$value = $this->propertyToDatabase($value, 'userRealname');
		if (null !== $value) {
		    $params['userRealname'] = $value;
		    $outgoingParams[] = $value;
		    $placeholder[] = '?';
		} else {
		    $placeholder[] = 'NULL';
		}
		//end field:userRealname
		
		//field:userCode
		$value = $entityReader($entity, 'userCode');
		$value = $this->propertyToDatabase($value, 'userCode');
		if (null !== $value) {
		    $params['userCode'] = $value;
		    $outgoingParams[] = $value;
		    $placeholder[] = '?';
		} else {
		    $placeholder[] = 'NULL';
		}
		//end field:userCode
		
		//field:userEmail
		$value = $entityReader($entity, 'userEmail');
		$value = $this->propertyToDatabase($value, 'userEmail');
		if (null !== $value) {
		    $params['userEmail'] = $value;
		    $outgoingParams[] = $value;
		    $placeholder[] = '?';
		} else {
		    $placeholder[] = 'NULL';
		}
		//end field:userEmail
		
		//field:userPassword
		$value = $entityReader($entity, 'userPassword');
		$value = $this->propertyToDatabase($value, 'userPassword');
		if (null !== $value) {
		    $params['userPassword'] = $value;
		    $outgoingParams[] = $value;
		    $placeholder[] = '?';
		} else {
		    $placeholder[] = 'NULL';
		}
		//end field:userPassword
		
		//field:userIsverified
		$value = $entityReader($entity, 'userIsverified');
		$value = $this->propertyToDatabase($value, 'userIsverified');
		if (null !== $value) {
		    $params['userIsverified'] = $value;
		    $outgoingParams[] = $value;
		    $placeholder[] = '?';
		} else {
		    $placeholder[] = 'NULL';
		}
		//end field:userIsverified
		
		//field:userRank
		$value = $entityReader($entity, 'userRank');
		$value = $this->propertyToDatabase($value, 'userRank');
		if (null !== $value) {
		    $params['userRank'] = $value;
		    $outgoingParams[] = $value;
		    $placeholder[] = '?';
		} else {
		    $placeholder[] = 'NULL';
		}
		//end field:userRank
		
		return '(' . implode(',', $placeholder) . ')';
	}

	/**
	 * @param $entity
	 * @param array $params
	 */
	public function buildSqlPrimaryCondition($entity, array &$params) {
		$entityReader = $this->getPropReader();
		
		//userId
		$value = null;
		$value = $entityReader($entity, 'userId');
		
		$params[] = $value;
		
		return 'user_id = ?';
	}

	/**
	 * @param $entity
	 * @param $target
	 * @param array $excludeFields
	 */
	public function copyInto($entity, $target, array $excludeFields = []) {
		$excludeFields = array_flip($excludeFields);
		$entityReader = $this->getPropReader();
		$targetWriter = $this->getConfiguration()->getEntityMapForEntity($target)->getPropWriter();
		
		if (!isset($excludeFields['userId'])) {
		    $targetWriter($target, 'userId', $entityReader($entity, 'userId'));
		}
		
		if (!isset($excludeFields['userName'])) {
		    $targetWriter($target, 'userName', $entityReader($entity, 'userName'));
		}
		
		if (!isset($excludeFields['userRealname'])) {
		    $targetWriter($target, 'userRealname', $entityReader($entity, 'userRealname'));
		}
		
		if (!isset($excludeFields['userCode'])) {
		    $targetWriter($target, 'userCode', $entityReader($entity, 'userCode'));
		}
		
		if (!isset($excludeFields['userEmail'])) {
		    $targetWriter($target, 'userEmail', $entityReader($entity, 'userEmail'));
		}
		
		if (!isset($excludeFields['userPassword'])) {
		    $targetWriter($target, 'userPassword', $entityReader($entity, 'userPassword'));
		}
		
		if (!isset($excludeFields['userIsverified'])) {
		    $targetWriter($target, 'userIsverified', $entityReader($entity, 'userIsverified'));
		}
		
		if (!isset($excludeFields['userRank'])) {
		    $targetWriter($target, 'userRank', $entityReader($entity, 'userRank'));
		}
	}

	/**
	 * Populates the object using an array.
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the field
	 * names and sets all values through its setter or directly into the property.
	 * 
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants EntityMap::TYPE_PHPNAME, EntityMap::TYPE_CAMELNAME,
	 * EntityMap::TYPE_COLNAME, EntityMap::TYPE_FIELDNAME, EntityMap::TYPE_NUM.
	 * The default key type is the column's EntityMap::TYPE_FIELDNAME.
	 *
	 * @param array $data
	 * @param string $keyType EntityMap::TYPE_*
	 * @param object $entity pass an object if you dont want to create a new one.
	 */
	public function fromArray(array $data, $keyType = EntityMap::TYPE_FIELDNAME, $entity = null) {
		if ($keyType !== EntityMap::TYPE_FIELDNAME) {
		    $data = $this->translateFieldNames($data, $keyType, EntityMap::TYPE_FIELDNAME);
		}
		        
		$entity = $entity ?: $this->createObject();
		$writer = $this->getPropWriter();
		//userId
		if (isset($data['userId'])) {
		    $value = $data['userId'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserId') && is_callable([$entity, 'setUserId'])) {
		    $entity->setUserId($value);
		} else {
		    $writer($entity, 'userId', $value);
		}
		        
		//userName
		if (isset($data['userName'])) {
		    $value = $data['userName'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserName') && is_callable([$entity, 'setUserName'])) {
		    $entity->setUserName($value);
		} else {
		    $writer($entity, 'userName', $value);
		}
		        
		//userRealname
		if (isset($data['userRealname'])) {
		    $value = $data['userRealname'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserRealname') && is_callable([$entity, 'setUserRealname'])) {
		    $entity->setUserRealname($value);
		} else {
		    $writer($entity, 'userRealname', $value);
		}
		        
		//userCode
		if (isset($data['userCode'])) {
		    $value = $data['userCode'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserCode') && is_callable([$entity, 'setUserCode'])) {
		    $entity->setUserCode($value);
		} else {
		    $writer($entity, 'userCode', $value);
		}
		        
		//userEmail
		if (isset($data['userEmail'])) {
		    $value = $data['userEmail'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserEmail') && is_callable([$entity, 'setUserEmail'])) {
		    $entity->setUserEmail($value);
		} else {
		    $writer($entity, 'userEmail', $value);
		}
		        
		//userPassword
		if (isset($data['userPassword'])) {
		    $value = $data['userPassword'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserPassword') && is_callable([$entity, 'setUserPassword'])) {
		    $entity->setUserPassword($value);
		} else {
		    $writer($entity, 'userPassword', $value);
		}
		        
		//userIsverified
		if (isset($data['userIsverified'])) {
		    $value = $data['userIsverified'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserIsverified') && is_callable([$entity, 'setUserIsverified'])) {
		    $entity->setUserIsverified($value);
		} else {
		    $writer($entity, 'userIsverified', $value);
		}
		        
		//userRank
		if (isset($data['userRank'])) {
		    $value = $data['userRank'];
		} else {
		    $value = null;
		}
		if (method_exists($entity, 'setUserRank') && is_callable([$entity, 'setUserRank'])) {
		    $entity->setUserRank($value);
		} else {
		    $writer($entity, 'userRank', $value);
		}
		        
		return $entity;
	}

	/**
	 * @return string[]
	 */
	public function getAutoIncrementFieldNames() {
		return array (
		  0 => 'userId',
		);
	}

	/**
	 * @return array
	 */
	public function getBehaviors() {
		return array(
		);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string
	 *
	 * @param object $entity
	 * @param string $name name of the field
	 * @param string $type The type of fieldname the $name is of:
	 * one of the class type constants EntityMap::TYPE_PHPNAME, EntityMap::TYPE_CAMELNAME
	 * EntityMap::TYPE_COLNAME, EntityMap::TYPE_FIELDNAME, EntityMap::TYPE_NUM.
	 * Defaults to EntityMap::TYPE_FIELDNAME.
	 */
	public function getByName($entity, $name, $type = EntityMap::TYPE_FIELDNAME) {
		$pos = $this->translateFieldName($name, $type, EntityMap::TYPE_NUM);
		
		return $this->getByPosition($entity, $pos);
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema. Zero-based
	 *
	 * @param object $entity
	 * @param integer $pos position in xml schema
	 * @return $this|InfiniaUserEntityMap
	 */
	public function getByPosition($entity, $pos) {
		$reader = $this->getPropReader();
		switch ($pos) {
		    case 0:
		        if (method_exists($entity, 'getUserId') && is_callable([$entity, 'getUserId'])) {
		            return $entity->getUserId();
		        } else {
		            return $reader($entity, 'userId');
		        }
		        break;
		    case 1:
		        if (method_exists($entity, 'getUserName') && is_callable([$entity, 'getUserName'])) {
		            return $entity->getUserName();
		        } else {
		            return $reader($entity, 'userName');
		        }
		        break;
		    case 2:
		        if (method_exists($entity, 'getUserRealname') && is_callable([$entity, 'getUserRealname'])) {
		            return $entity->getUserRealname();
		        } else {
		            return $reader($entity, 'userRealname');
		        }
		        break;
		    case 3:
		        if (method_exists($entity, 'getUserCode') && is_callable([$entity, 'getUserCode'])) {
		            return $entity->getUserCode();
		        } else {
		            return $reader($entity, 'userCode');
		        }
		        break;
		    case 4:
		        if (method_exists($entity, 'getUserEmail') && is_callable([$entity, 'getUserEmail'])) {
		            return $entity->getUserEmail();
		        } else {
		            return $reader($entity, 'userEmail');
		        }
		        break;
		    case 5:
		        if (method_exists($entity, 'getUserPassword') && is_callable([$entity, 'getUserPassword'])) {
		            return $entity->getUserPassword();
		        } else {
		            return $reader($entity, 'userPassword');
		        }
		        break;
		    case 6:
		        if (method_exists($entity, 'getUserIsverified') && is_callable([$entity, 'getUserIsverified'])) {
		            return $entity->getUserIsverified();
		        } else {
		            return $reader($entity, 'userIsverified');
		        }
		        break;
		    case 7:
		        $valueSet = InfiniaUserEntityMap::getValueSet(FIELD_USER_RANK);
		        if (isset($valueSet[$value])) {
		            $value = $valueSet[$value];
		        }
		        if (method_exists($entity, 'getUserRank') && is_callable([$entity, 'getUserRank'])) {
		            return $entity->getUserRank();
		        } else {
		            return $reader($entity, 'userRank');
		        }
		        break;
		} // switch()
		
		return $this;
	}

	/**
	 * @param object $entity
	 * @return array|integer|string
	 */
	public function getPrimaryKey($entity) {
		$reader = $this->getPropReader();
		return $reader($entity, 'userId' );
	}

	/**
	 */
	public function getPropIsset() {
		return $this->getClassPropIsset('InfiniaHome\DB\InfiniaUser');
	}

	/**
	 */
	public function getPropReader() {
		return $this->getClassPropReader('InfiniaHome\DB\InfiniaUser');
	}

	/**
	 */
	public function getPropUnsetter() {
		return $this->getClassPropUnsetter('InfiniaHome\DB\InfiniaUser');
	}

	/**
	 */
	public function getPropWriter() {
		return $this->getClassPropWriter('InfiniaHome\DB\InfiniaUser');
	}

	/**
	 * @return string full call name of the repository
	 */
	public function getRepositoryClass() {
		return 'InfiniaHome\DB\Base\BaseInfiniaUserRepository';
	}

	/**
	 * @param object $entity
	 * @return array
	 */
	public function getSnapshot($entity) {
		$reader = $this->getPropReader();
		$isset = $this->getPropIsset();
		$snapshot = [];
		$snapshot['userId'] = $this->propertyToSnapshot($reader($entity, 'userId'), 'userId');
		$snapshot['userName'] = $this->propertyToSnapshot($reader($entity, 'userName'), 'userName');
		$snapshot['userRealname'] = $this->propertyToSnapshot($reader($entity, 'userRealname'), 'userRealname');
		$snapshot['userCode'] = $this->propertyToSnapshot($reader($entity, 'userCode'), 'userCode');
		$snapshot['userEmail'] = $this->propertyToSnapshot($reader($entity, 'userEmail'), 'userEmail');
		$snapshot['userPassword'] = $this->propertyToSnapshot($reader($entity, 'userPassword'), 'userPassword');
		$snapshot['userIsverified'] = $this->propertyToSnapshot($reader($entity, 'userIsverified'), 'userIsverified');
		$snapshot['userRank'] = $this->propertyToSnapshot($reader($entity, 'userRank'), 'userRank');
		
		return $snapshot;
	}

	/**
	 */
	public function initialize() {
		parent::initialize();
		
		        $this->setName('InfiniaUser');
		        $this->setDatabaseName('default');
		        $this->setFullClassName('InfiniaHome\DB\InfiniaUser');
		        $this->setTableName('infiniausers');
		        $this->setAllowPkInsert(false);
		        $this->setIdentifierQuoting(false);
		        $this->setAutoIncrement(true);
		        $this->setReloadOnInsert(false);
		        $this->setReloadOnUpdate(false);
		        
		        $this->setUseIdGenerator(true);
		        $this->buildFields();
	}

	/**
	 * Checks whether all primary key fields are valid (not null) in $row.
	 *
	 * @param array $row
	 * @param integer $offset
	 * @param string $indexType
	 */
	public function isValidRow(array $row, $offset = 0, $indexType = EntityMap::TYPE_NUM) {
		if (EntityMap::TYPE_NUM === $indexType) {
		
		    if (null === $row[$offset + 0]) return false;
		} else if (EntityMap::TYPE_PHPNAME === $indexType) {
		    //ColumnName
		
		    if (null === $row['userId']) return false;
		} else if (EntityMap::TYPE_COLNAME === $indexType) {
		    //columnName
		
		    if (null === $row['userId']) return false;
		} else if (EntityMap::TYPE_FIELDNAME === $indexType) {
		    //column_name
		
		    if (null === $row['userId']) return false;
		} else if (EntityMap::TYPE_FULLCOLNAME === $indexType) {
		    //book.column_name
		
		    if (null === $row['InfiniaUser.userId']) return false;
		}
		
		return true;
	}

	/**
	 * @param Session $session
	 * @param object $entity
	 * @param boolean $deep
	 */
	public function persistDependencies(Session $session, $entity, $deep = false) {
		$reader = $this->getPropReader();
		$isset = $this->getPropIsset();
		$lastValues = $this->hasKnownValues($entity) ? $this->getLastKnownValues($entity) : [];
	}

	/**
	 * @param object $entity
	 * @param object $autoIncrementValues
	 */
	public function populateAutoIncrementFields($entity, $autoIncrementValues) {
		$reader = $this->getPropReader();
		$writer = $this->getPropWriter();
		        
		if ($value = $reader($entity, 'userId')) {
		    $autoIncrementValues->userId = $value;
		} else {
		    $writer($entity, 'userId', $autoIncrementValues->userId);
		    $autoIncrementValues->userId++;
		}
	}

	/**
	 * @param object $entity
	 * @param DependencyGraph $dependencyGraph
	 */
	public function populateDependencyGraph($entity, DependencyGraph $dependencyGraph) {
		$reader = $this->getPropReader();
		$isset = $this->getPropIsset();
		$dependencies = [];
		
		$dependencyGraph->add($entity, $dependencies);
	}

	/**
	 * @param array $row
	 * @param integer $offset
	 * @param string $indexType
	 * @param object $entity
	 */
	public function populateObject(array $row, &$offset = 0, $indexType = EntityMap::TYPE_NUM, $entity = null) {
		if (EntityMap::TYPE_NUM === $indexType) {
		    //0
		
		    $pk[] = $this->databaseToProperty($row[$offset + 0], 'userId');
		} else if (EntityMap::TYPE_COLNAME === $indexType) {
		    //columnName
		
		    $pk[] = $this->databaseToProperty($row['userId'], 'userId');
		} else if (EntityMap::TYPE_FIELDNAME === $indexType) {
		    //column_name
		
		    $pk[] = $this->databaseToProperty($row['user_id'], 'userId');
		} else if (EntityMap::TYPE_FULLCOLNAME === $indexType) {
		    //book.column_name
		
		    $pk[] = $this->databaseToProperty($row['InfiniaUser.user_id'], 'userId');
		}
		        $pk = $pk[0];
		
		$hashcode = json_encode($pk);
		if (null === $entity && $object = $this->getConfiguration()->getSession()->getInstanceFromFirstLevelCache('InfiniaHome\DB\InfiniaUser', $hashcode)) {
		    $offset += 8;
		    return $object;
		}
		
		$writer = $this->getPropWriter();
		if ($entity) {
		    $obj = $entity;
		} else {
		    $obj = $this->createProxy();
		}
		$obj->__duringInitializing__ = true;
		$objectValues = [];
		
		if (EntityMap::TYPE_NUM === $indexType) {
		    //0
		
		    $objectValues['userId'] = $this->databaseToProperty($row[$offset + 0], 'userId');
		    $writer($obj, 'userId', $objectValues['userId']);
		    $objectValues['userName'] = $this->databaseToProperty($row[$offset + 1], 'userName');
		    $writer($obj, 'userName', $objectValues['userName']);
		    $objectValues['userRealname'] = $this->databaseToProperty($row[$offset + 2], 'userRealname');
		    $writer($obj, 'userRealname', $objectValues['userRealname']);
		    $objectValues['userCode'] = $this->databaseToProperty($row[$offset + 3], 'userCode');
		    $writer($obj, 'userCode', $objectValues['userCode']);
		    $objectValues['userEmail'] = $this->databaseToProperty($row[$offset + 4], 'userEmail');
		    $writer($obj, 'userEmail', $objectValues['userEmail']);
		    $objectValues['userPassword'] = $this->databaseToProperty($row[$offset + 5], 'userPassword');
		    $writer($obj, 'userPassword', $objectValues['userPassword']);
		    $objectValues['userIsverified'] = $this->databaseToProperty($row[$offset + 6], 'userIsverified');
		    $writer($obj, 'userIsverified', $objectValues['userIsverified']);
		    $objectValues['userRank'] = $this->databaseToProperty($row[$offset + 7], 'userRank');
		    $writer($obj, 'userRank', $objectValues['userRank']);
		} else if (EntityMap::TYPE_COLNAME === $indexType) {
		    //columnName
		
		    $objectValues['userId'] = $this->databaseToProperty($row['userId'], 'userId');
		    $writer($obj, 'userId', $objectValues['userId']);
		    $objectValues['userName'] = $this->databaseToProperty($row['userName'], 'userName');
		    $writer($obj, 'userName', $objectValues['userName']);
		    $objectValues['userRealname'] = $this->databaseToProperty($row['userRealname'], 'userRealname');
		    $writer($obj, 'userRealname', $objectValues['userRealname']);
		    $objectValues['userCode'] = $this->databaseToProperty($row['userCode'], 'userCode');
		    $writer($obj, 'userCode', $objectValues['userCode']);
		    $objectValues['userEmail'] = $this->databaseToProperty($row['userEmail'], 'userEmail');
		    $writer($obj, 'userEmail', $objectValues['userEmail']);
		    $objectValues['userPassword'] = $this->databaseToProperty($row['userPassword'], 'userPassword');
		    $writer($obj, 'userPassword', $objectValues['userPassword']);
		    $objectValues['userIsverified'] = $this->databaseToProperty($row['userIsverified'], 'userIsverified');
		    $writer($obj, 'userIsverified', $objectValues['userIsverified']);
		    $objectValues['userRank'] = $this->databaseToProperty($row['userRank'], 'userRank');
		    $writer($obj, 'userRank', $objectValues['userRank']);
		} else if (EntityMap::TYPE_FIELDNAME === $indexType) {
		    //column_name
		
		    $objectValues['userId'] = $this->databaseToProperty($row['user_id'], 'userId');
		    $writer($obj, 'userId', $objectValues['userId']);
		    $objectValues['userName'] = $this->databaseToProperty($row['user_name'], 'userName');
		    $writer($obj, 'userName', $objectValues['userName']);
		    $objectValues['userRealname'] = $this->databaseToProperty($row['user_realname'], 'userRealname');
		    $writer($obj, 'userRealname', $objectValues['userRealname']);
		    $objectValues['userCode'] = $this->databaseToProperty($row['user_code'], 'userCode');
		    $writer($obj, 'userCode', $objectValues['userCode']);
		    $objectValues['userEmail'] = $this->databaseToProperty($row['user_email'], 'userEmail');
		    $writer($obj, 'userEmail', $objectValues['userEmail']);
		    $objectValues['userPassword'] = $this->databaseToProperty($row['user_password'], 'userPassword');
		    $writer($obj, 'userPassword', $objectValues['userPassword']);
		    $objectValues['userIsverified'] = $this->databaseToProperty($row['user_isverified'], 'userIsverified');
		    $writer($obj, 'userIsverified', $objectValues['userIsverified']);
		    $objectValues['userRank'] = $this->databaseToProperty($row['user_rank'], 'userRank');
		    $writer($obj, 'userRank', $objectValues['userRank']);
		} else if (EntityMap::TYPE_FULLCOLNAME === $indexType) {
		    //book.column_name
		
		    $objectValues['userId'] = $this->databaseToProperty($row['InfiniaUser.user_id'], 'userId');
		    $writer($obj, 'userId', $objectValues['userId']);
		    $objectValues['userName'] = $this->databaseToProperty($row['InfiniaUser.user_name'], 'userName');
		    $writer($obj, 'userName', $objectValues['userName']);
		    $objectValues['userRealname'] = $this->databaseToProperty($row['InfiniaUser.user_realname'], 'userRealname');
		    $writer($obj, 'userRealname', $objectValues['userRealname']);
		    $objectValues['userCode'] = $this->databaseToProperty($row['InfiniaUser.user_code'], 'userCode');
		    $writer($obj, 'userCode', $objectValues['userCode']);
		    $objectValues['userEmail'] = $this->databaseToProperty($row['InfiniaUser.user_email'], 'userEmail');
		    $writer($obj, 'userEmail', $objectValues['userEmail']);
		    $objectValues['userPassword'] = $this->databaseToProperty($row['InfiniaUser.user_password'], 'userPassword');
		    $writer($obj, 'userPassword', $objectValues['userPassword']);
		    $objectValues['userIsverified'] = $this->databaseToProperty($row['InfiniaUser.user_isverified'], 'userIsverified');
		    $writer($obj, 'userIsverified', $objectValues['userIsverified']);
		    $objectValues['userRank'] = $this->databaseToProperty($row['InfiniaUser.user_rank'], 'userRank');
		    $writer($obj, 'userRank', $objectValues['userRank']);
		}
		
		$this->getConfiguration()->getSession()->snapshot($obj);
		unset($obj->__duringInitializing__);
		$offset += 8;
		
		return $obj;
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema. Zero-based
	 *
	 * @param object $entity
	 * @param string $name name of the field
	 * @param mixed $value field value
	 * @param string $type The type of fieldname the $name is of:
	 * one of the class type constants EntityMap::TYPE_PHPNAME, EntityMap::TYPE_CAMELNAME
	 * EntityMap::TYPE_COLNAME, EntityMap::TYPE_FIELDNAME, EntityMap::TYPE_NUM.
	 * Defaults to EntityMap::TYPE_FIELDNAME.
	 */
	public function setByName($entity, $name, $value, $type = EntityMap::TYPE_FIELDNAME) {
		$pos = $this->translateFieldName($name, $type, EntityMap::TYPE_NUM);
		
		return $this->setByPosition($entity, $pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema. Zero-based
	 *
	 * @param object $entity
	 * @param integer $pos position in xml schema
	 * @param mixed $value field value
	 * @return $this|InfiniaUserEntityMap
	 */
	public function setByPosition($entity, $pos, $value) {
		$writer = $this->getPropWriter();
		switch ($pos) {
		    case 0:
		        if (method_exists($entity, 'setUserId') && is_callable([$entity, 'setUserId'])) {
		            return $entity->setUserId($value);
		        } else {
		            $writer($entity, 'userId', $value);
		        }
		        break;
		    case 1:
		        if (method_exists($entity, 'setUserName') && is_callable([$entity, 'setUserName'])) {
		            return $entity->setUserName($value);
		        } else {
		            $writer($entity, 'userName', $value);
		        }
		        break;
		    case 2:
		        if (method_exists($entity, 'setUserRealname') && is_callable([$entity, 'setUserRealname'])) {
		            return $entity->setUserRealname($value);
		        } else {
		            $writer($entity, 'userRealname', $value);
		        }
		        break;
		    case 3:
		        if (method_exists($entity, 'setUserCode') && is_callable([$entity, 'setUserCode'])) {
		            return $entity->setUserCode($value);
		        } else {
		            $writer($entity, 'userCode', $value);
		        }
		        break;
		    case 4:
		        if (method_exists($entity, 'setUserEmail') && is_callable([$entity, 'setUserEmail'])) {
		            return $entity->setUserEmail($value);
		        } else {
		            $writer($entity, 'userEmail', $value);
		        }
		        break;
		    case 5:
		        if (method_exists($entity, 'setUserPassword') && is_callable([$entity, 'setUserPassword'])) {
		            return $entity->setUserPassword($value);
		        } else {
		            $writer($entity, 'userPassword', $value);
		        }
		        break;
		    case 6:
		        if (method_exists($entity, 'setUserIsverified') && is_callable([$entity, 'setUserIsverified'])) {
		            return $entity->setUserIsverified($value);
		        } else {
		            $writer($entity, 'userIsverified', $value);
		        }
		        break;
		    case 7:
		        $valueSet = InfiniaUserEntityMap::getValueSet(FIELD_USER_RANK);
		        if (isset($valueSet[$value])) {
		            $value = $valueSet[$value];
		        }
		        if (method_exists($entity, 'setUserRank') && is_callable([$entity, 'setUserRank'])) {
		            return $entity->setUserRank($value);
		        } else {
		            $writer($entity, 'userRank', $value);
		        }
		        break;
		} // switch()
		
		return $this;
	}

	/**
	 * Exports the object as an array.
	 * 
	 * You can specify the key type of the array by passing one of the class
	 * type constants. The default key type is the column's EntityMap::TYPE_FIELDNAME.
	 *
	 * @param object $entity
	 * @param string $keyType The type of fieldname the $name is of:
	 * one of the class type constants EntityMap::TYPE_PHPNAME, EntityMap::TYPE_CAMELNAME
	 * EntityMap::TYPE_COLNAME, EntityMap::TYPE_FIELDNAME, EntityMap::TYPE_NUM.
	 * Defaults to EntityMap::TYPE_FIELDNAME.
	 * @param boolean $includeLazyLoadColumns Whether to include lazy loaded columns
	 * @param boolean $includeForeignObjects Whether to include hydrated related objects
	 * @param object $alreadyDumpedObjectsWatcher
	 * @return array
	 */
	public function toArray($entity, $keyType = EntityMap::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false, $alreadyDumpedObjectsWatcher = null) {
		if (!($alreadyDumpedObjectsWatcher instanceof \stdClass)) {
		    $alreadyDumpedObjectsWatcher = new \stdClass;
		    $alreadyDumpedObjectsWatcher->objects = [];
		}
		
		if (isset($alreadyDumpedObjectsWatcher->objects[spl_object_hash($entity)])) {
		    return '*RECURSION*';
		}
		
		$alreadyDumpedObjectsWatcher->objects[spl_object_hash($entity)] = true;
		$reader = $this->getPropReader();
		$keys = $this->getFieldNames($keyType);
		$array = [];
		//userId
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserId') && is_callable([$entity, 'getUserId'])) {
		        $value = $entity->getUserId();
		    } else {
		        $value = $reader($entity, 'userId');
		    }
		    $array[$keys[0]] = $value;
		}
		        
		//userName
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserName') && is_callable([$entity, 'getUserName'])) {
		        $value = $entity->getUserName();
		    } else {
		        $value = $reader($entity, 'userName');
		    }
		    $array[$keys[1]] = $value;
		}
		        
		//userRealname
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserRealname') && is_callable([$entity, 'getUserRealname'])) {
		        $value = $entity->getUserRealname();
		    } else {
		        $value = $reader($entity, 'userRealname');
		    }
		    $array[$keys[2]] = $value;
		}
		        
		//userCode
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserCode') && is_callable([$entity, 'getUserCode'])) {
		        $value = $entity->getUserCode();
		    } else {
		        $value = $reader($entity, 'userCode');
		    }
		    $array[$keys[3]] = $value;
		}
		        
		//userEmail
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserEmail') && is_callable([$entity, 'getUserEmail'])) {
		        $value = $entity->getUserEmail();
		    } else {
		        $value = $reader($entity, 'userEmail');
		    }
		    $array[$keys[4]] = $value;
		}
		        
		//userPassword
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserPassword') && is_callable([$entity, 'getUserPassword'])) {
		        $value = $entity->getUserPassword();
		    } else {
		        $value = $reader($entity, 'userPassword');
		    }
		    $array[$keys[5]] = $value;
		}
		        
		//userIsverified
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserIsverified') && is_callable([$entity, 'getUserIsverified'])) {
		        $value = $entity->getUserIsverified();
		    } else {
		        $value = $reader($entity, 'userIsverified');
		    }
		    $array[$keys[6]] = $value;
		}
		        
		//userRank
		if ($includeLazyLoadColumns || $includeLazyLoadColumns === false) {
		    if (method_exists($entity, 'getUserRank') && is_callable([$entity, 'getUserRank'])) {
		        $value = $entity->getUserRank();
		    } else {
		        $value = $reader($entity, 'userRank');
		    }
		    $array[$keys[7]] = $value;
		}
		        
		return $array;
	}
}