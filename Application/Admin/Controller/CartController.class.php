<?php
namespace Admin\Controller;
use Think\Controller;
class CartController extends Controller {
	public function index(){
		echo 'Hello';
	}

	public function cart_list(){
		$params = I('get.');

		$m = M('shop_cart_goods');

		$cartList = $m->where($params)->select();

		$this->assign('cartList', $cartList);
		$this->display();
	}
}