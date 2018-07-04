<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
	public function __construct() {
		parent::__construct ();
        $this->order = D('order');
        // 校验URL传的ID是否一致
        $this->user_id = A('Home/Loginsso')->is_login();

	}

	//购物车
    public function cart(){

        if($this->user_id != $_GET['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

    	// 用户ID
    	$user_id = intval($_GET['user_id']);
    	$obj=M("shop_cart_goods");
    	//$select=$obj->where("status<2")->select();   
    	$select=$obj->query("select * from shop_cart_goods where status=0 and user_id='{$user_id}' group by companyname");
        // dump($select);exit();
        $this->assign('select',$select);    
        $this->assign('user_id',$user_id);
		$this->display();   
    }
	

    // 删除购物车
    public function ajax_del()
    {
        $shop=M("shop_cart_goods");
        $ini['goods_id']=array('in',$_POST['goods_id']); 
        $res = $shop->where($ini)->delete();
        exit(json_encode($res));
    }

    // 购物车结算
    public function order()
    {
         if($this->user_id != $_GET['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $array = explode(',',$_GET['goods_id']);
        $goods_number = explode(',',$_GET['goods_num']);
        $gids['goods_id'] = array('in',$array);
        $gids['user_id'] = $_GET['user_id'];
        $gids['status'] = 0;
        // 修改购物车数量
        for ($i=0; $i < count($array); $i++) { 
            $data['user_id'] = $_GET['user_id'];
            $data['goods_id'] = $array[$i];
            $num['goods_number'] = $goods_number[$i];
            $r = M('shop_cart_goods')->where($data)->save($num);
        }

        $res = M('shop_cart_goods')->where($gids)->select();
        $total_goods = 0;
        $total_postage = 0;
        foreach ($res as $key => $value) {
            $total_goods += $value['goods_price'] * $value['goods_number'];
            $total_postage += $value['postage'];
        }
        // dump($res);exit();
        // 查找用户地址
        $user_address = M('shop_user_address')->where("user_id=".$gids['user_id'])->select();
        $this->assign('user_address',$user_address);
        $this->assign('res',$res);
        $this->assign('user_id',$gids['user_id']);
        $this->assign('total_goods',$total_goods);
        $this->assign('total_postage',$total_postage);
        $this->display();
       
    }

    // 用户添加地址与修改地址
    public function add_address()
    {
        if($this->user_id != $_POST['user_id']){    
            die('<h1>URL错误，请正确输入</h1>');
        }
        
        $data = array();
        $region = explode('-',$_POST['address']['addr']);
        $data['user_id'] = $_POST['user_id'];
        $data['consignee'] = $_POST['address']['consignee'];
        // $data['email'] = $_POST['address']['email'];
        $data['country'] = '中国';
        $data['province'] = $region[0];
        $data['city'] = $region[1];
        $data['district'] = $region[2];
        $data['address'] = $_POST['address']['detaddr'];
        $data['zipcode'] = $_POST['address']['zipcode'];
        $data['mobile'] = $_POST['address']['phone'];
        $data['status'] = $_POST['address']['df'];
        
        // 修改与添加
        if($_POST['address_id'] > 0){
            if($_POST['address']['addrdtl']){
                $data['address'] = $_POST['address']['addrdtl'];
                $data['consignee'] = $_POST['address']['name'];    
            }
            $res = M('shop_user_address')->where('id='.$_POST['address_id'])->save($data);
        }else{
            $res = M('shop_user_address')->add($data);
            $r = M('shop_user_address')->execute("update shop_user_address set status=2 where user_id = {$_POST['user_id']} and id <> {$res}");
        }

        // 设置默认地址
        if($data['status'] == 1 && $_POST['address_id'] > 0){
         $r = M('shop_user_address')->execute("update shop_user_address set status=2 where user_id = {$_POST['user_id']} and id <> {$_POST['address_id']}");
        }
        
        echo $res;

    }

    // 用户设置默认地址
    public function address_default()
    {   
        if($this->user_id != $_POST['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $res = M('shop_user_address')->execute("update shop_user_address set status=1 where id = {$_POST['address_id']} and user_id = {$_POST['user_id']}");
        $r = M('shop_user_address')->execute("update shop_user_address set status=2 where id <> {$_POST['address_id']} and user_id = {$_POST['user_id']}");
        echo $res,$r;
        
    }

    //  提交订单
    public function add_order()
    { 
        if($this->user_id != $_POST['order_info']['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }
        $order_id = $this->order->add_order($_POST);
        echo $order_id;exit;
    }

}