<?php
namespace Home\Controller;
use Think\Controller;
use Org\General\Order;
use Org\General\User;
class OrderController extends Controller
{
	public function _initialize(){

	}

	//验证登录
	public function verify_login(){
		$user_id = I('post.user_id');
		$cookie_id = A('Home/Loginsso')->getuserid();

		if(!$cookie_id){
			$data['code'] = -1;
			$this->ajaxReturn($data, 'JSON');
		}

		if($user_id != $cookie_id){
			$data['code'] = -1;
			$this->ajaxReturn($data, 'JSON');
		}
	}

	public function index(){
		$user_id = I('get.user_id');
		
		if(I('get.contract')){
			$this->assign('contract', I('get.contract'));
		}else{
			$this->assign('contract', 0);
		}

		$this->assign('user_id', $user_id);
		$this->display();
	}

	//买家订单选项卡
	public function order_tab(){
		$params['user_id'] = I('get.user_id');
		$no_finish['order_status'] = 0;
		$payment['order_status'] = 101;
		$shipped['order_status'] = 102;
		
		$no_finish_count = Order::get_order_count($params, $no_finish);
		$payment_count = Order::get_order_count($params, $payment);
		$shipped_count = Order::get_order_count($params, $shipped);

		$this->assign('no_finish_count', $no_finish_count);
		$this->assign('payment_count', $payment_count);
		$this->assign('shipped_count', $shipped_count);
		$this->assign('user_id', $params['user_id']);
		$this->display();
	}

	//买家订单列表
	public function order_list(){
		$params = I('post.');

		if($params['time'] == 3){
			$params['addtime'] = array('lt', time() - 7776000);
		}else{
			$params['addtime'] = array(array('gt', time() - 7776000), array('lt', time()));
		}

		unset($params['time']);

		$orderList = Order::get_order_list($params);
		
		$this->assign('orderList', $orderList);
		$this->assign('page', $orderList[0]['show']);
		$this->display();
	}

	//买家订单详情
	public function order_info(){
		$params = I('get.');
		$orderInfo = Order::get_order_info($params);

		$this->assign('orderInfo', $orderInfo);
		$this->display();
	}

	//买家合同选项卡
	public function contract(){
		$user_id = I('get.user_id');

		$this->assign('user_id', $user_id);
		$this->display();
	}

	//买家合同订单列表
	public function contract_list(){
		$params = I('post.');
		$params['order_status'] = array(array('eq', 104), array('eq', 105), 'or');
		$orderList = Order::get_order_list($params);

		$this->assign('orderList', $orderList);
		$this->assign('page', $orderList[0]['show']);
		$this->display();
	}

	//卖家订单选项卡
	public function seller_order_tab(){
		$params['shop_id'] = I('get.shop_id');
		$no_finish['order_status'] = 0;
		$payment['order_status'] = 101;
		$shipped['order_status'] = 102;
		
		$no_finish_count = Order::get_order_count($params, $no_finish);
		$payment_count = Order::get_order_count($params, $payment);
		$shipped_count = Order::get_order_count($params, $shipped);

		$this->assign('no_finish_count', $no_finish_count);
		$this->assign('payment_count', $payment_count);
		$this->assign('shipped_count', $shipped_count);
		$this->assign('shop_id', $params['shop_id']);
		$this->display();
	}

	//卖家订单列表
	public function seller_order_list(){
		$params = I('post.');
		$orderList = Order::get_order_list($params);

		$this->assign('orderList', $orderList);
		$this->assign('page', $orderList[0]['show']);
		$this->display();
	}

	//卖家订单详情
	public function seller_order_info(){
		$params = I('get.');
		$orderInfo = Order::get_order_info($params);

		$this->assign('orderInfo', $orderInfo);
		$this->display();
	}

	//卖家合同选项卡
	public function seller_contract(){
		$shop_id = I('get.shop_id');

		$this->assign('shop_id', $shop_id);
		$this->display();
	}

	//卖家合同订单列表
	public function seller_contract_list(){
		$params = I('post.');
		$params['order_status'] = array(array('eq', 104), array('eq', 105), 'or');
		$orderList = Order::get_order_list($params);

		$this->assign('orderList', $orderList);
		$this->assign('page', $orderList[0]['show']);
		$this->display();
	}

	//保存取消订单操作
	public function save_order_cancel(){
		$params = I('post.');

		$m = M('shop_order');

		$data['order_status'] = -1;
		$data['cancel_reason'] = $params['content'];
		unset($params['content']);

		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '取消成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '取消失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存取消交易操作
	public function save_transaction_cancel(){
		$params = I('post.');

		$result = Order::get_transaction_cancel($params);

		if($result){
			$error['status'] = 1;
			$error['message'] = '申请成功';
		}else{
			$error['status'] = 0;
			$error['message'] = '申请失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//申请取消交易
	public function transaction_cancel(){
		$params = I('get.');
		$orderInfo = Order::get_order_info($params);

		$this->assign('orderInfo', $orderInfo);
		$this->display();
	}

	//保存卖家发货操作
	public function save_seller_send_goods(){
		$params = I('post.');

		$m = M('shop_order');

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

	//保存买家确认付款操作
	public function save_confirm_payment(){
		$params = I('post.');
		
		$m = M('shop_order');

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
		
		$m = M('shop_order');

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

	//生成合同
	public function generate_contract(){
		$params = I('get.');
		$orderInfo = Order::get_order_info($params);
		
		$shopId['sjdbid'] = $orderInfo['shop_id'];
		$userInfo = User::get_user_info($shopId);
		$contractInfo = Order::get_contract_info($params);

		$shop_id['shop_id'] = $orderInfo['shop_id'];
		$contract_info = Order::get_contract_info($shop_id);

		if($contractInfo){
			$this->error("合同已存在", "/sjshop/index.php/Home/Order?user_id={$orderInfo['shop_id']}");
		}

		if($contract_info){
			$this->assign('contract_info', $contract_info);
		}

		$this->assign('userInfo', $userInfo);
		$this->assign('orderInfo', $orderInfo);
		$this->display();
	}

	//保存合同操作
	public function add_contract(){
		$params = I('post.');
		$opt['shop_id'] = $params['shop_id'];

		$contractInfo = Order::get_contract_info($opt);

		if(!$params['a_company']){
			$params['a_company'] = $contractInfo['a_company'];
		}

		if(!$params['a_address']){
			$params['a_address'] = $contractInfo['a_address'];
		}

		if(!$params['a_legal_representative']){
			$params['a_legal_representative'] = $contractInfo['a_legal_representative'];
		}

		if(!$params['a_contact_number']){
			$params['a_contact_number'] = $contractInfo['a_contact_number'];
		}

		if(!$params['a_email']){
			$params['a_email'] = $contractInfo['a_email'];
		}

		$params['a_contract_time'] = strtotime($params['a_contract_time']);	//甲方签订合同时间
		$params['b_contract_time'] = strtotime($params['b_contract_time']);	//乙方签订合同时间
		$params['start_time'] = strtotime($params['start_time']);	//合同开始时间
		$params['end_time'] = strtotime($params['end_time']);	//合同结束时间
		$params['delivery_time'] = strtotime($params['delivery_time']);	//交货时间

		$m = M('shop_order_contract');

		$result = $m->add($params);

		if($result){
			$res = Order::save_contract_status($params['order_sn']);

			if($res){
				$error['status'] = 1;
				$error['message'] = '合同已生成';
			}else{
				$error['status'] = -1;
				$error['message'] = '合同生成失败';
			}
			$this->ajaxReturn($error, 'JSON');
		}
	}

	//修改合同
	public function edit_contract(){
		$params = I('get.');
		$contractInfo = Order::get_contract_info($params);
		$orderInfo = Order::get_order_info($params);

		$this->assign('contractInfo', $contractInfo);
		$this->assign('orderInfo', $orderInfo);
		$this->display();
	}

	//保存修改合同操作
	public function save_edit_contract(){
		$params = I('post.');
		$order_sn['order_sn'] = $params['order_sn'];
		unset($params['order_sn']);

		if(!$params){
			$error['status'] = -1;
			$error['message'] = '未修改任何数据';
			$this->ajaxReturn($error, 'JSON');
		}

		if($params['a_contract_time']){
			$params['a_contract_time'] = strtotime($params['a_contract_time']);
		}
		
		if($params['b_contract_time']){
			$params['b_contract_time'] = strtotime($params['b_contract_time']);
		}
		
		if($params['start_time']){
			$params['start_time'] = strtotime($params['start_time']);
		}

		if($params['end_time']){
			$params['end_time'] = strtotime($params['end_time']);
		}
		
		if($params['delivery_time']){
			$params['delivery_time'] = strtotime($params['delivery_time']);
		}

		$m = M('shop_order_contract');

		$result = $m->where($order_sn)->save($params);

		if($result){
			Order::save_contract_status($order_sn['order_sn']);
			$error['status'] = 1;
			$error['message'] = '修改成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '修改失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//确认合同
	public function confirm_contract(){
		$params = I('get.');
		$contractInfo = Order::get_contract_info($params);
		$orderInfo = Order::get_order_info($params);

		$this->assign('orderInfo', $orderInfo);
		$this->assign('contractInfo', $contractInfo);
		$this->display();
	}

	//保存确认合同操作
	public function save_confirm_contract(){
		$params = I('post.');

		$m = M('shop_order');

		$data['order_status'] = 0;
		$data['contract_type'] = 2;
		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '确认成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '确认失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存拒绝合同操作
	public function save_refuse_contract(){
		$params = I('post.');

		$m = M('shop_order');

		$data['order_status'] = 104;
		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '拒绝成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '拒绝失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//查看合同详情
	public function view_contract(){
		$params = I('get.');

		$contractInfo = Order::get_contract_info($params);
		$orderInfo = Order::get_order_info($params);

		$this->assign('contractInfo', $contractInfo);
		$this->assign('orderInfo', $orderInfo);
		$this->display();
	}

	//保存修改商品单价数量运费操作
	public function edit_order_info(){
		$params = I('post.');

		$m = M('shop_order_goods');

		$opt['order_id'] = $params['order_id'];
		$opt['goods_id'] = $params['goods_id'];
		unset($params['order_id']);
		unset($params['goods_id']);

		if(!$params){
			$error['status'] = -1;
			$error['message'] = '未做任何修改';
			$this->ajaxReturn($error, 'JSON');
		}

		$goods_list = Order::get_order_goods_list($opt);

		if(!$params['goods_price']){
			$params['goods_price'] = $goods_list[0]['goods_price'];
		}

		if(!$params['goods_num']){
			$params['goods_num'] = $goods_list[0]['goods_num'];
		}

		if(!$params['total_freight']){
			$params['total_freight'] = $goods_list[0]['total_freight'];
			$params['postage'] = $goods_list[0]['total_freight'];
		}else{
			$params['postage'] = $params['total_freight'];
		}
		
		$params['total_price'] = $params['goods_price'] * $params['goods_num'];
		
		$result = $m->where($opt)->save($params);

		if($result){
			self::save_order_total_price($opt['order_id']);
			$error['status'] = 1;
			$error['message'] = '修改成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '修改失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存订单总价格总运费
	public function save_order_total_price($order_id){
		$m = M('shop_order');

		$opt['order_id'] = $order_id;
		$params['id'] = $order_id;
		
		$goods_list = Order::get_order_goods_list($opt);

		foreach ($goods_list as $list) {
			$data['total_price'] += $list['total_price'];
			$data['order_freight'] += $list['total_freight'];
		}

		$data['total_price'] = $data['total_price'] + $data['order_freight'];

		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '修改成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '修改失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存再次购买操作
	public function save_buy_again(){
		$params = I('post.');

		$orderInfo = Order::get_order_info($params);

		$opt['user_id'] = $orderInfo['user_id'];
		$opt['shop_id'] = $orderInfo['shop_id'];

		foreach ($orderInfo['goods'] as $list) {
			$opt['goods_id'] = $list['goods_id'];
			$result = self::save_cart_goods($opt);

			if($result){
				$error['status'] = 1;
				$error['message'] = '成功';
			}else{
				$error['status'] = -1;
				$error['message'] = '失败';
			}
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存再次购买操作购物车加入新商品
	public function save_cart_goods($opt){
		$m = M('shop_cart_goods');

		$goods_info = $m->where($opt)->find();

		$goods_info['status'] = 0;
		unset($goods_info['id']);

		$result = $m->add($goods_info);

		if($result){
			return $result;
		}
	}

	//快速生成合同列表
	public function fast_contract_list(){
		$params = I('get.');
		$params['contract_type'] = 1;

		$m = M('shop_fast_contract');

		$contract_list = $m->where($params)->select();

		foreach ($contract_list as $contract) {
			$data['order_sn'] = $contract['order_sn'];
			$contract['order'] = self::get_fast_contract_order_info($data);
			$contractList[] = $contract;
		}
		
		$this->assign('contract_list', $contractList);
		$this->assign('shop_id', $params['shop_id']);
		$this->display();
	}

	//快速合同订单
	public function get_fast_contract_order_info($params){
		$m = M('shop_fast_contract_order');

		$result = $m->where($params)->find();

		if($result){
			$result['status'] = Order::get_order_status($result['order_status']);
			return $result;
		}
	}

	//快速生成合同
	public function add_fast_contract(){
		$params = I('get.');

		$this->assign('shop_id', $params['shop_id']);
		$this->display();
	}

	//编辑快速生成合同
	public function edit_fast_contract(){
		$params = I('get.');

		$m = M('shop_fast_contract');

		$contractInfo = $m->where($params)->find();
		$contractInfo['goods'] = self::get_fast_contract_order_goods($params);

		$this->assign('contractInfo', $contractInfo);
		$this->display();
	}

	//保存编辑后的快速生成合同
	public function save_edit_fast_contract(){
		$params = I('post.');
		$data['order_sn'] = $params['order_sn'];
		unset($params['order_sn']);

		$m = M('shop_fast_contract');

		if($params['delivery_time']){
			$params['delivery_time'] = strtotime($params['delivery_time']);
		}

		if($params['start_time']){
			$params['start_time'] = strtotime($params['start_time']);
		}

		if($params['end_time']){
			$params['end_time'] = strtotime($params['end_time']);
		}

		if($params['a_contract_time']){
			$params['a_contract_time'] = strtotime($params['a_contract_time']);
		}

		if($params['b_contract_time']){
			$params['b_contract_time'] = strtotime($params['b_contract_time']);
		}

		$result = $m->where($data)->save($params);

		if($result){
			$error['status'] = 1;
			$error['message'] = '修改成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '修改失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//查看快速生成合同
	public function view_fast_contract(){
		$params = I('get.');

		$m = M('shop_fast_contract');

		$contractInfo = $m->where($params)->find();
		$contractInfo['goods'] = self::get_fast_contract_order_goods($params);

		$this->assign('contractInfo', $contractInfo);
		$this->display();
	}

	//快速合同商品列表
	public function get_fast_contract_order_goods($params){
		$m = M('shop_fast_contract_order_goods');

		$goods_list = $m->where($params)->select();

		foreach($goods_list as $list){
			$list['goods'] = explode('-', $list['goods_name']);
			$list['order_total_price'] += $list['total_price'];
			$result[] = $list;
		}

		if($result){
			return $result;
		}
	}

	//查看快速合同列表
	public function view_fast_contract_list(){
		$params = I('get.');
		$params['contract_type'] = 1;

		$m = M('shop_fast_contract');

		$contract_list = $m->where($params)->select();

		foreach ($contract_list as $contract) {
			$data['order_sn'] = $contract['order_sn'];
			$contract['order'] = self::get_fast_contract_order_info($data);
			$contractList[] = $contract;
		}
		
		$this->assign('contract_list', $contractList);
		$this->assign('user_id', $params['user_id']);
		$this->display();
	}

	//买家确认快速合同
	public function confirm_fast_contract(){
		$params = I('get.');

		$m = M('shop_fast_contract');

		$contractInfo = $m->where($params)->find();
		$contractInfo['goods'] = self::get_fast_contract_order_goods($params);

		$this->assign('contractInfo', $contractInfo);
		$this->display();
	}

	//保存确认快速合同操作
	public function save_fast_confirm_contract(){
		$params = I('post.');

		$m = M('shop_fast_contract_order');

		$data['order_status'] = 0;
		$data['contract_type'] = 2;
		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '确认成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '确认失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

	//保存拒绝快速合同操作
	public function save_fast_refuse_contract(){
		$params = I('post.');

		$m = M('shop_fast_contract_order');

		$data['order_status'] = 104;
		$result = $m->where($params)->save($data);

		if($result){
			$error['status'] = 1;
			$error['message'] = '拒绝成功';
		}else{
			$error['status'] = -1;
			$error['message'] = '拒绝失败';
		}
		$this->ajaxReturn($error, 'JSON');
	}

}