<?php
namespace Home\Controller;
use Think\Controller;
class WriteoffController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->shop_order_contract = M('shop_order_contract');
		$this->shop_order_goods = M('shop_order_goods');
		$this->order = M('shop_order');
		$this->shop_seller_write_off = M('shop_seller_write_off');
	
	}

	// 展示购销合同
	public function writeoff_list()
	{
		$where['order_sn'] = array('like' ,'%'.$_GET['order_sn'].'%');
		$where['a_id'] = $_GET['shop_id'];
		$count = $this->shop_seller_write_off->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,5);// 实例化分页类 
        $show = $Page->show();// 分页显示输出
        $p = $_GET['p'] ? $_GET['p'] : 0;
        $data  = $this->shop_seller_write_off->where($where)->page($p.',5')->order('id desc')->select();
		$this->assign('data',$data);
		$this->assign('shop_id',$where['a_id']);
        $this->assign('order_sn',$_GET['order_sn']);
		$this->display();
	}
	

	// 生成订单合同 或者修改
	public function writeoff_add()
	{
		if(IS_POST){
			if($_POST['company_name_b']){
				$_POST['b_id'] = M('shop_user')->where(array('username'=>array('like','%'.$_POST['company_name_b'].'%')))->getField('sjdbid');
			}
			
			if($_POST['b_id'] && empty($_POST['id'])){
				$result = $this->shop_seller_write_off->add($_POST);
			}else{
				$result = $this->shop_seller_write_off->where('id='.$_POST['id'])->save($_POST);
			}

			// 购销合同生成成功，则改变状态
			if($result){
				 $data['status'] = 1;
				 $res =  $this->shop_order_contract->where('order_sn='.$_POST['order_sn'])->save($data);
			}	
			if(!$_POST['b_id']){
				echo 0;
			}else{
				echo $result;	
			}
				
		}else{
			// 查出商品信息
			$res = $this->shop_order_goods->where('order_sn='.$_GET['contract_number'])->select();
			$user = $this->order->field('user_id,shop_id,order_sn')->where('order_sn='.$_GET['contract_number'])->find();
			$total = 0;
			foreach ($res as $key => $value) {
				$res[$key]['goods_name'] = explode('-',$value['goods_name']);
				$total += $value['total_price'] + $value['total_freight'];
				
			}
			// 查出购销合同信息
			$list = $this->shop_seller_write_off->where('order_sn='.$_GET['contract_number'])->find();
			$time = strtotime($list['a_date']);
			$list['contract_number'] = 'DXTPO'.date('Ymd',$time).'-'.$list['id'];
			$this->assign('writeoff_info',$list);
			$this->assign('user_id',$user);
			$this->assign('goods_info',$res);
			$this->assign('total',$total);
			$this->display();
		}
		
	}


	// 查出用户ID
	public function seek_user_id()
	{
        $user_id = A('Home/Loginsso')->is_login();
        echo $user_id;
	}

	// 第三方合同确认
	public function thirdparty_affirm()
	{
		// $sql['b_id'] = $_GET['shop_id'];
		$sql['order_sn'] = array('like' ,'%'.$_GET['order_sn'].'%');

		$sql['b_id'] = 4651;
		$list = $this->shop_seller_write_off->where($sql)->select();
		$this->assign('list',$list);
		$this->assign('shop_id',$sql['b_id']);
		if($_GET['order_sn']){
			$this->assign('order_sn',$_GET['order_sn']);
		}
        
		$this->display();
	}

	// 确认第三方合同
	public function affirm_contract()
	{
		$data['status'] = 1;
		$res =  $this->shop_seller_write_off->where('order_sn='.$_POST['order_sn'])->save($data);
		echo $res;
	}

}