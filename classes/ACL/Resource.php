<?php defined('SYSPATH') or die ('No direct script access.');

/**
 * ACL Resource interface
 *   资源,分两类:
 *   1 功能资源,就是uri
 *   2 数据资源,就是model+screen,即数据操作
 *   
 * @Package ACL 
 * @category acl
 * @author shijianhang
 * @date Oct 23, 2013 10:52:46 PM 
 *
 */
interface ACL_Resource
{
	/** 功能资源 */
	const RESOURCE_FUNCTION = 'FUNC';
	
	/** 数据资源 */
	const RESOURCE_DATA = 'DAT';
	
	/**
	 * Gets the type for this resource
	 * 
	 * @return string
	 */
	public function acl_type();
	
	/**
	 * Gets a unique name string for this resource
	 * 
	 * @return	string
	 */
	public function acl_name();
	
	/**
	 * Get a title for this resource
	 */
	public function acl_title();
	
	/**
	 * Gets actions, only site for the data resource
	 */
	public function acl_actions();
	
	/**
	 * Check the condition for this resource
	 * 
	 * For example, check whether $user is the owner of the $subject 
	 * 
	 * returns a boolean indicating whether $user meets special condition 
	 * 
	 * @param	Model_User	$user logged in user model
	 * @return	bool
	 */
	public function check_acl_condition($user = NULL);
	
} // End  ACL_Resource