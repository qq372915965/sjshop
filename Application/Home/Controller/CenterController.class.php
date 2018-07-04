<?php 
namespace Home\controller;
use Think\Controller;
class CenterController extends Controller{

	 public function __construct(){
	 	   parent::__construct();
	 	  

	 }


	 // 个人中心
	 public function personage_center()
	 {
	 	$this->display();


	 }

	 // 报价列表->大陆现货
	 public function quote_list()
	 {
	 	$this->display();
	 }

	 // 个人中心->商品信息
	 public function goods_list()
	 {
	
	 	$this->display();
	 }

	 // 个人中心->香港现货
	 public function hongkong_goods()
	 {
	 	$this->display();
	 }

	 // 个人中心->香港船货
	 public function hongkong_cargo()
	 {
	 	$this->display();
	 }


	 // 个人中心->改性塑料
	 public function modified_plastic()
	 {
	 	$this->display();
	 }

	 // 个人中心->环保再生
	 public function environmental()
	 {
	 	$this->display();
	 }

	 // 个人中心->塑料助剂
	 public function plastic_auxiliaries()
	 {
	 	$this->display();
	 }

	 // 个人中心->现货柜
	 public function spot_cabinet()
	 {
	 	$this->display();
	 }

	 // 个人中心->船货柜
	 public function ship_cabinet()
	 {
	 	$this->display();
	 }

	 // 个人中心->定时刷新跳转页面
	 public function timing_skip()
	 {
	 	$this->display();
	 }

	 // 个人中心->自动刷新页面
	 public function auto_flush()
	 {

	 	$this->display();
	 }

}
