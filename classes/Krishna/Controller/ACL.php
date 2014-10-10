<?php defined('SYSPATH') or die('No direct script access.');

/**
 * 权限过滤的控制器
 * 
 * @Package package_name Controller 
 * @category acl
 * @author shijianhang
 * @date Dec 20, 2013 10:50:17 AM 
 *
 */
abstract class Krishna_Controller_ACL extends Controller 
{
	protected $_filters = NULL;
	
	/**
	 * 执行过滤
	 *    如果过滤失败直接抛出异常,由上层做处理
	 * 
	 * @see Krishna_Controller::before()
	 */
	public function before()
	{
		parent::before();
	
		if (! empty($this->_filters))
		{
			foreach ($this->_filters as $filter)
			{
				$method = 'filte_'.$filter;
				$this->$method();
			}
		}
	}
	
	public function filte_login()
	{
		$user = Auth::instance()->get_user();
		
		if ($user === NULL)
		{
			//如果用户未登录,直接抛出401异常
			throw new HTTP_Exception_401;
		}
	}
	
	public function filte_acl()
	{
	}
}