<?php defined ( 'SYSPATH' ) or die ( 'No direct access allowed.' );

// 系統資源
return array (
		'Wf_WorkItem'	=>	array( 
				'title'	=>	'任务管理', 
				'name'	=>	'任务', 
				'actions'	=>	array( 
						'index'	=>	'列表',
				)
		),
		'Audit_Report' => array(
				'title'	=>	'report管理',
				'name'	=>	'report',
				'actions'	=>	array(
						'index'	=>	'列表',
				)
		),
		'Audit_Record'	=>	array(
				'title'	=>	'record管理',
				'name'	=>	'record',
				'actions'	=>	array(
						'index'	=>	'列表',
				)
		),
		'Audit_Statistics'	=>	array(
				'title'	=>	'统计查看',
				'name'	=>	'统计',
				'actions'	=>	array(
						'persons'	=>	'个人审计',
						'departments'	=>	'部门审计',
						'findbackitems' => '退审项目',
						'intermediaries' => '中介信息',
				)
		),
		'admin/notice' => array(
				'title'	=>	'通知管理',
				'name'	=>	'通知',
				'actions'	=>	array(
						'read'	=>	'标记已读',
				)
		),
		'topic' => array(
				'title'	=>	'问题列表',
				'name'	=>	'问题',
				'actions'	=>	array(
						'index'	=>	'列表',
						'show'	=>	'详情',
						'new'	=>	'新建',
						'edit'	=>	'编辑',
						'delete'=>	'删除',
				)
		),
		'reply' => array(
				'title'	=>	'回答列表',
				'name'	=>	'回答',
				'actions'	=>	array(
						'index'	=>	'列表',
						'new'	=>	'新建',
						'edit'	=>	'编辑',
						'delete'=>	'删除',
				)
		),
);