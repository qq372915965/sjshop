<?php
namespace Org\General;
use Org\General\User;
class Order{
	const ORDER_STATUS_NO_FINISH = 0;				//等待买家付款
	const ORDER_STATUS_PAYMENT = 101;				//买家已付款
	const ORDER_STATUS_SHIPPED = 102;				//卖家已发货
	const ORDER_STATUS_GENERATE_CONTRACT = 104;		//等待生成合同
	const ORDER_STATUS_CONFIRM_CONTRACT = 105;		//待买方确认合同
	const ORDER_STATUS_WAIT_STAMP = 109;			//等待签章
	const ORDER_STATUS_WAIT_CANCEL = 110;			//交易取消中
	const ORDER_STATUS_FINISH = 1;					//已完成
	const ORDER_STATUS_CANCEL = -1;					//订单关闭
	const TRANSACTION_CANCEL = -2;					//交易关闭

	//订单状态
	public static function get_order_status($sign){
		$status = '';
		switch ($sign) {
			case self::ORDER_STATUS_NO_FINISH:
				$status = '等待买家付款';
				break;
			case self::ORDER_STATUS_PAYMENT:
				$status = '买家已付款';
				break;
			case self::ORDER_STATUS_SHIPPED:
				$status = '卖家已发货';
				break;
			case self::ORDER_STATUS_GENERATE_CONTRACT:
				$status = '等待生成合同';
				break;
			case self::ORDER_STATUS_CONFIRM_CONTRACT:
				$status = '待买方确认合同';
				break;
			case self::ORDER_STATUS_WAIT_STAMP:
				$status = '等待签章';
				break;
			case self::ORDER_STATUS_WAIT_CANCEL:
				$status = '交易取消中';
				break;			
			case self::ORDER_STATUS_FINISH:
				$status = '已完成';
				break;
			case self::ORDER_STATUS_CANCEL:
				$status = '订单关闭';
				break;
			case self::TRANSACTION_CANCEL:
				$status = '交易关闭';
				break;	
			default:
				$status = '未知';
				break;
		}
		return $status;
	}

	//获取订单列表
	public static function get_order_list($params){
		$m = M('shop_order');

		if($params['order_status'] == 'all'){
			unset($params['order_status']);
		}

		if($params['contract_type'] == 'all-contract'){
			unset($params['contract_type']);
		}
		
		$count = $m->where($params)->count();
		$page = new \Think\Page($count, 20);
		$show = $page->show();
		$order_list = $m->where($params)->limit($page->firstRow.','.$page->listRows)->order('addtime desc')->select();

		foreach($order_list as $key => $list){
			$opt['order_id'] .= $list['id'].',';
			$opt['order_id'] = $list['id'];
			$list['goods'] = self::get_order_goods_list($opt);
			$list['status'] = self::get_order_status($list['order_status']);
			$list['show'] = $show;
			$result[] = $list;
		}

		// $opt['order_id'] = trim($opt['order_id'], ',');
		// $result = self::get_order_goods_list($opt);

		if($result){
			return $result;
		}
	}

	//获取订单商品列表
	public static function get_order_goods_list($params){
		$m = M('shop_order_goods');

		// $params['order_id'] = array('in', $params['order_id']);
		$goods_list = $m->where($params)->select();

		foreach($goods_list as $list){
			$list['img'] = self::get_goods_img($list['goods_id']);
			$list['goods'] = explode('-', $list['goods_name']);
			$result[] = $list;
		}
		
		if($result){
			return $result;
		}
	}

	//获取订单详情
	public static function get_order_info($params){
		$m = M('shop_order');

		$order_info = $m->where($params)->find();

		$opt['order_id'] = $order_info['id'];
		$order_info['goods'] = self::get_order_goods_list($opt);
		$order_info['status'] = self::get_order_status($order_info['order_status']);

		$shopId['sjdbid'] = $order_info['shop_id'];
		$order_info['shop_info'] = User::get_user_info($shopId);

		$addressId['id'] = $order_info['user_address_id'];
		$order_info['address'] = User::get_user_address_info($addressId);
		// $order_info['sum'] = $order_info['total_price'] + $order_info['order_freight'];

		if($order_info){
			return $order_info;
		}
	}

	//获取订单数量
	public static function get_order_count($params, $status){
		$m = M('shop_order');

		$params['order_status'] = $status['order_status'];

		$order_count = $m->where($params)->count();

		if($order_count){
			return $order_count;
		}
	}

	//获取商品图片
	public static function get_goods_img($goods_id){
		$m = M('shop_goods_pic');

		$params['goods_id'] = $goods_id;
		$goods_list = $m->where($params)->find();

		if($goods_list){
			return $goods_list;
		}
	}

	//取消交易
	public static function get_transaction_cancel($params){
		$m = M('shop_order');

		$data['order_status'] = 110;
		$data['cancel_content'] = $params['content'];
		unset($params['content']);
		if($params['file']){
			$data['cancel_img'] = $params['file'];
			unset($params['file']);
		}
		
		$result = $m->where($params)->save($data);

		if($result){
			return $result;
		}
	}

	//获取合同列表
	public static function get_contract_list($params){
		$m = M('shop_order_contract');

		$result = $m->where($params)->select();

		if($result){
			return $result;
		}
	}

	//获取合同详情
	public static function get_contract_info($params){
		$m = M('shop_order_contract');

		$result = $m->where($params)->find();

		if($result){
			return $result;
		}
	}

	//更改订单合同状态
	public static function save_contract_status($order_sn){
		$m = M('shop_order');

		$data['order_status'] = 105;
		$data['contract_type'] = 1;

		$params['order_sn'] = $order_sn;

		$result = $m->where($params)->save($data);

		if($result){
			return $result;
		}
	}
}