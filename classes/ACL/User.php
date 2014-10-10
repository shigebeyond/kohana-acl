<?php defined('SYSPATH') or die ('No direct script access.');

/**
 * ACL User interface
 *   用户接口
 *   
 * @Package ACL 
 * @category acl
 * @author shijianhang
 * @date Oct 23, 2013 10:52:46 PM 
 *
 */
interface ACL_User
{
	
	/**
	 * 是否拥有对指定资源的权限
	 * @param array(ACL_Resource) $resources
	 * @return bool
	 */
	public function has_permission(array $resources = NULL);
	
	/**
	 * 是否是管理员
	 * @return bool
	 */
	public function is_admin();
}