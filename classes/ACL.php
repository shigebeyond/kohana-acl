<?php defined('SYSPATH') or die ('No direct script access.');

/**
 * ACL
 * 
 * @Package  
 * @category acl
 * @author shijianhang
 * @date Oct 23, 2013 10:55:30 PM 
 *
 */
class ACL
{
	/**
	 * Returns a list of all valid resource objects
	 *
	 * @param	string	$resource_type	resource's type
	 * @return	array
	 */
	public static function list_resources($resource_type = NULL)
	{
		switch ($resource_type)
		{
			case ACL_Resource::RESOURCE_FUNCTION: // 功能资源
				$sys_res = static::sys_resources($resource_type); // 系统资源
				$biz_res = ORM::factory('Txn_Task')->find_list('id', 'title', '--', true); // 业务资源
				return array_merge($sys_res, $biz_res);
			
			case ACL_Resource::RESOURCE_DATA: // 数据资源
				$sys_res = static::sys_resources($resource_type); // 系统资源
				$biz_res = ORM::factory('Dat_Object')->find_all()->as_array();
				return array_merge($sys_res, $biz_res);
			
			default:
				throw new Krishna_Exception("未知的权限资源类型[$resource_type]");
		}
	}
	
	/**
	 * 获得系统资源
	 * 
	 * @param string $resource_type
	 * @return array(ACL_Resource_Impl)
	 */
	public static function sys_resources($resource_type)
	{
		$result = array();
		
		foreach (Krishna::$config->load('resources') as $name => $prop)
		{
			if ($resource_type === ACL_Resource::RESOURCE_FUNCTION) // 功能資源
			{
				$res = new ACL_Resource_Impl($resource_type, $name, $prop['title']);
			}
			else // 數據資源
			{
				$res = new ACL_Resource_Impl($resource_type, $name, $prop['name'], $prop['actions']);
			}
			
			$result[] = $res;
		}
		
		return $result;
	}
	
	/**
	 * Checks user has permission to access resource
	 * 
	 * @param	ACL_User		current logined user
	 * @param	array(ACL_Resource)	ACL_Resource objects being requested
	 * @throw	HTTP_Exception	To identify permission or authentication failure
	 * @return	void
	 */
	public static function check(ACL_User $user, array $resources)
	{
		// 1 管理员跳过检查
		if ($user->is_admin()) 
		{
			return TRUE;
		}
		
		// 2 检查权限
		if (!$user->has_permission($resources)) 
		{
			return FALSE;
		}
		
		// 3 检查条件
		foreach ($resources as $resource)
		{
			if (! $resource->check_acl_condition($user)) 
			{
				return FALSE;
			}
		}
			
		return TRUE;
	}
	
	/**
	 * Force static access
	 * 
	 * @return	void 
	 */
	protected function __construct() {}
	
	/**
	 * Force static access
	 * 
	 * @return	void 
	 */
	protected function __clone() {}
	
} // End  ACL