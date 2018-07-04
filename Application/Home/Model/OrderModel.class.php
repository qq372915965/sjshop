<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model {
	
	protected $tableName = 'shop_order';
  
	public function __construct() {
		parent::__construct ();
	}
  	

  	// 处理用户下单
  	public function add_order($data)
  	{
  		$where['goods_id'] = array('in',$data['order_info']['goods_id']);
  		$where['status'] = 0;
  		if(!$data['order_info']['goods_id']){
  			return 0;exit();
  		}
        $res = M('shop_cart_goods')->where($where)->select();

        $username = M('shop_user')->where('sjdbid='.$data['order_info']['user_id'])->getField('username');// 用户名称
        $order = array();
        $order['user_id'] = $data['order_info']['user_id'];    
        $order['order_sn'] = date('YmdHis').rand(100000,999999); 
        $order['contract_type'] = 0;  
        $order['send_type'] = 0;   
        $order['pay_type'] = 0; // 暂时不支持线上付款    
        $order['pay_code'] = $data['order_info']['pay_code'];   
        $order['postage_code'] = $data['order_info']['postage_code'];    
        $order['remark'] = $data['order_info']['remark'];    
        $order['total_price'] = $data['order_info']['order_total'];
        $order['addtime'] = time();
        $order['user_address_id'] = $data['order_info']['address_id'];

        $total_f = 0;
        for ($i=0; $i < count($data['order_info']['order_freight']); $i++) { 
          $total_f += $data['order_info']['order_freight'][$i];
        }

        $order['order_freight'] = $total_f;
        $order['companyname'] = $res[0]['companyname'];
        $order['user_name'] = $username;
        $order['shop_id'] = $res[0]['shop_id'];
        $order['invoice_type'] = $data['order_info']['invoice_type'];
        $order['order_status'] = 104;
        // 订单表入库
        $order_id = M('shop_order')->add($order);

        // 订单商品表入库
        foreach ($res as $key => $value) {
        	$order_sub = array();
        	$order_sub['order_id'] = $order_id;
        	$order_sub['goods_id'] = $value['goods_id'];
        	$order_sub['goods_name'] = $value['goods_name'];
        	$order_sub['goods_num'] = $value['goods_number'];
        	$order_sub['goods_price'] = $value['goods_price'];
        	$order_sub['postage'] = $data['order_info']['order_freight'][$key];
        	$order_sub['total_price'] = $value['goods_price'] * $value['goods_number'];
        	$order_sub['total_freight'] = $data['order_info']['order_freight'][$key];
          $order_sub['order_sn'] = $order['order_sn'];
          $order_sub['type_goods'] = $value['type']; // 商品类型
        	$r = M('shop_order_goods')->add($order_sub);

        	// 改变购物车商品的状态
        	if($order_id > 1){
       $r = M('shop_cart_goods')->execute("update shop_cart_goods set status=1 where user_id={$data['order_info']['user_id']} and goods_id = {$value['goods_id']}");
        		
        	}
        }
       	
        return $order_id;
  	}
	
}