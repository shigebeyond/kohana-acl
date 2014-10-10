<?php defined('SYSPATH') or die ('No direct script access.');

/**
 * ACL Resource 接口的简单实现
 *   
 * @Package ACL 
 * @category acl
 * @author shijianhang
 * @date Oct 23, 2013 10:52:46 PM 
 *
 */
class ACL_Resource_Impl implements ACL_Resource
{
	/** 类型 */
	protected $_type;
	
	/** 名称 */
	protected $_name;
	
	/** 标题 */
	protected $_title;
	
	/** 動作 */
	protected $_actions;
	
	public function __construct($type, $name, $title = NULL, $action = NULL)
	{
		$this->_type = $type;
		$this->_name = $name;
		$this->_title = $title;
		$this->_actions = $action;
	}
	
	/**
	 * 获得资源类型
	 * 
	 * @see ACL_Resource::acl_type()
	 */
	public function acl_type()
	{
		return $this->_type;
	}
	
	/**
	 * 获得资源名
	 * 
	 * @see ACL_Resource::acl_name()
	 */
	public function acl_name()
	{
		return $this->_name;
	}
	
	/**
	 * 获得资源标题
	 * 
	 * @see ACL_Resource::acl_title()
	 */
	public function acl_title()
	{
		return $this->_title;
	}
	
	/**
	 * 獲得某類資源的所有動作, 只對數據資源有效
	 * 
	 * @return array
	 */
	public function acl_actions()
	{
		return $this->_actions;
	}
	
	/**
	 * 检查过滤条件: 直接通过
	 * 
	 * @see ACL_Resource::check_acl_condition()
	 */
	public function check_acl_condition($user = NULL)
	{
		return TRUE;
	}
	
} // End  ACL_Resource