<?php
namespace Org\General;
class User
{
	//获取用户详情
	public static function get_user_info($params){
		$m = M('shop_user');

		$user_info = $m->where($params)->find();

		if($user_info){
			return $user_info;
		}
	}

	//获取用户公司详情
	public static function get_company_info($user_id){
		$m = M('scn_ecms_thecompany');

		$opt['userid'] = $user_id;
		$result = $m->where($opt)->find();
		if($result){
			return $result;
		}
	}

	//获取用户地址
	public static function get_user_address_info($params){
		$m = M('shop_user_address');

		$address_info = $m->where($params)->find();

		if($address_info){
			return $address_info;
		}
	}

	//获取后台用户详情
	public static function get_admin_user_info($params){
		$m = M('shop_admin_user');

		$user_info = $m->where($params)->find();

		if($user_info){
			return $user_info;
		}
	}
}