<?php 
namespace Home\controller;
use Think\Controller;
class SpeedmemoController extends Controller{

	 public function __construct(){
	 	parent::__construct();
	 	$this->order = M('shop_fast_contract_order'); //快速 生成合同订单表
       $this->order_goods = M('shop_fast_contract_order_goods'); // 快速生成合同订单商品表
       $this->user_id = A('Home/Loginsso')->is_login();
       $this->shop_speed_exchange_memo = M('shop_speed_exchange_memo'); // 快速生成订单 买家上传水单信息

	 }


	 // 快速生成订单 买家水单
	 public function memo_list()
	 {

	 	 $where['user_id'] = $_GET['user_id'];
       // 查找订单号
       if($_GET['order_sn']){
        $where['order_sn'] = array('like' ,'%'.$_GET['order_sn'].'%');
        $order_sn = $_GET['order_sn'];
       }
       if(isset($_GET['status'])){
       		$sn =  $this->shop_speed_exchange_memo->field('order_sn')->group('order_sn')->select();
       		$o_sn = array();
       		foreach ($sn as $key => $value) {
       			$o_sn[$key] = $value['order_sn'];
       		}
       		if($o_sn){
                if($_GET['status'] ==1){
                    $where['order_sn'] = array('in', $o_sn);
                }else{
                    $where['order_sn'] = array('not in', $o_sn);
                }
            }
            
            if(empty($o_sn) && $_GET['status']==1){
                $where['order_sn'] = 1;
            }
       		
       }
       $count = $this->order->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,5);// 实例化分页类 
        $show = $Page->show();// 分页显示输出
        $p = $_GET['p'] ? $_GET['p'] : 0;
        $order_list  = $this->order->where($where)->page($p.',5')->order('id desc')->select();
        foreach ($order_list as $k => $v) {
        	$sql['order_sn'] = $v['order_sn'];

            $open_inv = $this->shop_speed_exchange_memo->where($sql)->sum('invoice_money');
            $order_list[$k]['open_inv'] = $open_inv ? $open_inv : 0.00;
            $order_list[$k]['not_inv'] = sprintf('%.2f', $v['total_price'] - $open_inv);
       }
       $this->assign('page',$show);
       $this->assign('order_list',$order_list);
       $this->assign('user_id',$_GET['user_id']);
       $this->assign('order_sn',$order_sn);
       $this->display();

	 }

	 //快速生成订单 买家详情水单
	 public function memo_info()
	 {
	 	$sql['order_sn'] = $_GET['order_sn'];

	 	$order_info = $this->order_goods->where($sql)->select();
        $invoice_info = $this->shop_speed_exchange_memo->where($sql)->select();
        $open_t = $this->shop_speed_exchange_memo->where($sql)->sum('invoice_money');
        $total = 0;
        foreach ($order_info as $key => $value) {
           $total += $value['total_price'] + $value['total_freight'];
        }
        $this->assign('open_t',$open_t);
        $this->assign('order_info',$order_info);
        $this->assign('invoice_info',$invoice_info);
        $this->assign('total',$total);
        $this->display();
	 }

	  //快速生成订单 买家开票保存图片
    public function add_picture()
    {
    	if(IS_POST){
    		foreach ($_POST['arr'] as $key => $value) {
                    $data = array();
                    $data['invoice_pic'] = $value['src'];
                    $data['invoice_money'] = $value['meny'];
                    $data['addtime'] = time();
               		$data['order_sn'] = $value['order_sn'];
               		$data['status'] = 1;
                    $res = $this->shop_speed_exchange_memo->add($data);
                    echo $res;
            }

    	}else{
    		$sql['order_sn'] = $_GET['order_sn'];

    		$open = $this->order->field('total_price,order_sn,addtime,user_id,order_freight')->where($sql)->find();
            $not = $this->shop_speed_exchange_memo->where($sql)->sum('invoice_money');
     
            $surplus = sprintf('%.2f',$open['total_price'] - $not);
            $this->assign('surplus',$surplus);
            $this->assign('not',$not);
            $this->assign('open',$open);
            $this->assign('order_sn',$_GET['order_sn']);
            $this->display();
    	}   
    }

    //快速生成订单 卖家水单管理
    public function memo_seller()
    {
    	 $sql['shop_id'] = $_GET['shop_id'];
       // $sql['shop_id'] = 3500;
       if($_GET['order_sn']){
        $sql['order_sn'] = array('like','%'.$_GET['order_sn'].'%');
        $order_sn = $_GET['order_sn'];
       }
       if(isset($_GET['status'])){
       		$sn =  $this->shop_speed_exchange_memo->field('order_sn')->group('order_sn')->select();
       		$o_sn = array();
       		foreach ($sn as $key => $value) {
       			$o_sn[$key] = $value['order_sn'];
       		}
       		if($o_sn){
                if($_GET['status'] ==1){
                    $sql['order_sn'] = array('in', $o_sn);
                }else{
                    $sql['order_sn'] = array('not in', $o_sn);
                }
            }
            
            if(empty($o_sn) && $_GET['status']==1){
                $sql['order_sn'] = 1;
            }
       		
       }  
        $count = $this->order->where($sql)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,5);// 实例化分页类 
        $show = $Page->show();// 分页显示输出
        $p = $_GET['p'] ? $_GET['p'] : 0;
        $seller  = $this->order->where($sql)->page($p.',5')->select();
       foreach ($seller as $k => $v) {
       		$where['order_sn'] = $v['order_sn'];

            $open_inv = $this->shop_speed_exchange_memo->where($where)->sum('invoice_money');
            $seller[$k]['open_inv'] = $open_inv ? $open_inv : 0.00;
            $seller[$k]['not_inv'] = $v['total_price'] - $open_inv;
       }
       $this->assign('page',$show);
       $this->assign('seller',$seller);
       $this->assign('shop_id',$sql['shop_id']);
       $this->assign('order_sn',$order_sn);
       $this->display();
    }

    //快速生成订单 卖家水单详情
    public function seller_info()
    {
    	$sql['order_sn'] = $_GET['order_sn'];

        $order_info = $this->order_goods->where($sql)->select();
        $invoice_info = $this->shop_speed_exchange_memo->where($sql)->select();
        $open_t = $this->shop_speed_exchange_memo->where($sql)->sum('invoice_money');
        $total = 0;
        foreach ($order_info as $key => $value) {
           $total += $value['total_price'] + $value['total_freight'];
        }
        $this->assign('open_t',$open_t);
        $this->assign('order_info',$order_info);
        $this->assign('invoice_info',$invoice_info);
        $this->assign('total',$total);
        $this->display();
    }

    //快速生成订单 买家修改水单
    public function edit_memo()
    {
    	$res = $this->shop_speed_exchange_memo->where('id='.$_POST['data']['id'])->save($_POST['data']);
    	echo $res;
    }
}