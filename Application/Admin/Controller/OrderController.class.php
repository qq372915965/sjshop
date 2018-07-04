<?php
namespace Admin\Controller;
use Think\Controller;
use Org\General\Order;
class OrderController extends Controller {
	public function index(){
		echo 'Hello';
	}

	public function order_tab(){
		$params = I('get.');

		$this->display();
	}

	public function order_list(){
		$params = I('post.');

		$orderList = Order::get_order_list($params);

		$this->assign('orderList', $orderList);
		$this->assign('page', $orderList[0]['show']);
		$this->display();
	}

	public function order_info(){
		$params = I('get.');

		$orderInfo = Order::get_order_info($params);

		$this->assign('orderInfo', $orderInfo);
		$this->display();
	}
}