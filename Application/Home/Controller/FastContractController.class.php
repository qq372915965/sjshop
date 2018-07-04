<?php
namespace Home\Controller;
use Think\Controller;
use Org\General\User;
class FastContractController extends Controller{
	
	public function index(){
		echo "fast_contract";
	}

	//保存合同商品
	public function save_contract_goods(){
		$params = I('post.');

		$check = self::check_contract_goods($params);

		if($check){
			$data['status'] = 1;
			$data['message'] = '商品存在';
			$data['goods'] = $check;

			$this->ajaxReturn($data, 'JSON');
		}

		$params['truetime'] = time();

		$m = M('shop_fast_contract_goods');

		$result = $m->add($params);

		if($result){
			$data['status'] = 1;
			$data['message'] = '添加成功';
			$data['goods'] = self::get_contract_goods_info($result);
		}else{
			$data['status'] = -1;
			$data['message'] = '添加失败';
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//检查商品是否存在
	public function check_contract_goods($data){
		$m = M('shop_fast_contract_goods');

		$result = $m->where($data)->find();

		if($result){
			return $result;
		}
	}

	//获取合同商品详情
	public function get_contract_goods_info($data){
		$params['id'] = $data;

		$m = M('shop_fast_contract_goods');

		$result = $m->where($params)->find();

		if($result){
			return $result;
		}
	}

	//保存快速生成合同
	public function save_add_fast_contract(){
		$contract = I('post.contract_info');
		$goods = I('post.goods_info');

		$contract['order_sn'] = date('YmdHis').rand(100000,999999).'x';	//订单号
		$contract['delivery_time'] = strtotime($contract['delivery_time']);		//交货时间
		$contract['start_time'] = strtotime($contract['start_time']);	//合同开始时间
		$contract['end_time'] = strtotime($contract['end_time']);	//合同结束时间
		$contract['a_contract_time'] = strtotime($contract['a_contract_time']);		//甲方签订合同时间
		$contract['b_contract_time'] = strtotime($contract['b_contract_time']);		//乙方签订合同时间

		$goods['order_sn'] = $contract['order_sn'];
		
		$m = M('shop_fast_contract');

		$result = $m->add($contract);

		if($result){
			$add_order = self::save_contract_order($goods, $contract);
			// $data['status'] = 1;
			// $data['message'] = '合同添加成功';
		}else{
			$data['status'] = -1;
			$data['message'] = '合同添加失败';
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//保存快速合同订单
	public function save_contract_order($goods_info, $contract_info){
		$m = M('shop_fast_contract_order');
		
		$opt['userid'] = $contract_info['shop_id'];
		$user_info = A('Home/Postsend')->post_userid($opt);

		$params['user_id'] = $contract_info['user_id'];		// 用户id
		$params['shop_id'] = $contract_info['shop_id'];		// 卖家id
		$params['order_sn'] = $contract_info['order_sn'];	// 订单号
		
		foreach ($goods_info as $goods) {
			$params['total_price'] += $goods['total_price'];	// 商品总价
		}

		$params['order_freight'] = 0;						// 运费
		$params['companyname'] = $user_info['username'];	// 卖家名称
		$params['user_name'] = $contract_info['username'];	// 买家名称
		$params['user_address_id'] = 0;						// 地址id
		$params['contract_type'] = 1;						// 合同状态
		$params['send_type'] = 0;							// 发货状态
		$params['pay_type'] = 0;							// 支付状态
		$params['pay_code'] = 0;							// 支付方式
		$params['postage_code'] = 0;						// 物流类别
		$params['invoice_code'] = 0;						// 发票状态
		$params['invoice_type'] = 1;						// 发票类别
		$params['order_status'] = 105;						// 订单状态
		$params['addtime'] = time();						// 下单时间
		
		$result = $m->add($params);

		if($result){
			$add_order_goods = self::save_order_goods($goods_info, $result);
			// $data['status'] = 1;
			// $data['message'] = '订单添加成功';
		}else{
			$data['status'] = -1;
			$data['message'] = '订单添加失败';
		}
	}

	//保存订单中商品
	public function save_order_goods($goods_info, $order_id){
		$m = M('shop_fast_contract_order_goods');

		$params['order_sn'] = $goods_info['order_sn'];		//商品订单号
		unset($goods_info['order_sn']);

		foreach ($goods_info as $goods) {
			$params['goods_id'] = $goods['id'];		// 商品id
			$params['order_id'] = $order_id;		// 订单id
			$params['goods_name'] = $goods['cinvname'].'-'.$goods['vendor'].'-'.$goods['cinvstd'];						//	商品名称
			$params['goods_price'] = $goods['fprice'];		// 商品单价
			$params['total_freight'] = 0;						// 商品运费
			$params['goods_num'] = $goods['fweight'];		// 商品数量
			$params['total_price'] = $goods['total_price'];	// 商品总价
			$params['postage'] = 0;								// 商品总运费

			$result = $m->add($params);

			if($result){
				$data['status'] = 1;
				$data['message'] = '添加成功';
			}else{
				$data['status'] = -1;
				$data['message'] = '订单商品添加失败';
			}
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//保存买家确认付款操作
	public function save_confirm_payment(){
		$params = I('post.');
		
		$m = M('shop_fast_contract_order');

		$data['order_status'] = 101;
		$data['pay_type'] = 1;

		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '确认付款成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '确认付款失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存买家确认收货操作
	public function save_confirm_receive(){
		$params = I('post.');
		
		$m = M('shop_fast_contract_order');

		$data['order_status'] = 1;
		$data['finish_time'] = time();

		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '确认收货成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '确认收货失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存卖家发货操作
	public function save_seller_send_goods(){
		$params = I('post.');

		$m = M('shop_fast_contract_order');

		$data['order_status'] = 102;
		$data['send_type'] = 1;

		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '发货成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '发货失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}
}