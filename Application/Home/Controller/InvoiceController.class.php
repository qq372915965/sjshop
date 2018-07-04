<?php
namespace Home\Controller;
use Think\Controller;
class InvoiceController extends Controller {
	
	public function __construct() {
		parent::__construct ();
        $this->order = M('shop_order');
        $this->order_goods = M('shop_order_goods');
         // 校验URL传的ID是否一致
        $this->user_id = A('Home/Loginsso')->is_login();


	}


    // 买家发票管理
    public function buyer_invoice()
    {

        if($this->user_id != $_GET['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

       $where['user_id'] = $_GET['user_id'];
       // 查找订单号
       if($_GET['order_sn']){
        $where['order_sn'] = array('like' ,'%'.$_GET['order_sn'].'%');
        $order_sn = $_GET['order_sn'];
       }

       if(isset($_GET['status'])){

            $sn =  M('shop_money_invoice')->field('order_sn')->group('order_sn')->select();
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
            $open_inv = M('shop_money_invoice')->where('order_sn='.$v['order_sn'])->sum('invoice_money');
            $order_list[$k]['open_inv'] = $open_inv ? $open_inv : 0.00;
            $order_list[$k]['not_inv'] =  sprintf('%.2f',$v['total_price'] - $open_inv);
       }
       $this->assign('page',$show);
       $this->assign('order_list',$order_list);
       $this->assign('user_id',$_GET['user_id']);
       $this->assign('order_sn',$order_sn);
       $this->display();
    }


    // 买家发票详情
    public function buyer_info()
    {
        $order_info = $this->order_goods->where('order_sn='.$_GET['order_sn'])->select();
        $invoice_info = M('shop_money_invoice')->where('order_sn='.$_GET['order_sn'])->select();
        $open_t = M('shop_money_invoice')->where('order_sn='.$_GET['order_sn'])->sum('invoice_money');
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

    // 卖家发票管理
    public function seller_invoice()
    {
        if($this->user_id != $_GET['shop_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

       $sql['shop_id'] = $_GET['shop_id'];
       // $sql['shop_id'] = 3500;
       if($_GET['order_sn']){
        $sql['order_sn'] = array('like','%'.$_GET['order_sn'].'%');
        $order_sn = $_GET['order_sn'];
       }
       if(isset($_GET['status'])){
            $sn =  M('shop_money_invoice')->field('order_sn')->group('order_sn')->select();
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
        $seller  = $this->order->where($sql)->page($p.',5')->order('id desc')->select();
        foreach ($seller as $k => $v) {
            $open_inv = M('shop_money_invoice')->where('order_sn='.$v['order_sn'])->sum('invoice_money');
            $seller[$k]['open_inv'] = $open_inv ? $open_inv : 0.00;
            $seller[$k]['not_inv'] = sprintf('%.2f', $v['total_price'] - $open_inv);
        }
       $this->assign('page',$show);
       $this->assign('seller',$seller);
       $this->assign('shop_id',$sql['shop_id']);
       $this->assign('order_sn',$order_sn);
       $this->display();
    }

    // 卖家发票详情
    public function seller_info()
    {
        $order_info = $this->order_goods->where('order_sn='.$_GET['order_sn'])->select();
        $invoice_info = M('shop_money_invoice')->where('order_sn='.$_GET['order_sn'])->select();
        $open_t = M('shop_money_invoice')->where('order_sn='.$_GET['order_sn'])->sum('invoice_money');
        $total = 0;
        foreach ($order_info as $key => $value) {
           $total += $value['total_price'] + $value['total_freight'];
        }
        $this->assign('invoice_info',$invoice_info);
        $this->assign('open_t',$open_t);
        $this->assign('order_info',$order_info);
        $this->assign('total',$total);
        $this->display();
    }

    // 卖家开票
    public function make_invoice()
    {
        if($this->user_id != $_GET['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $info = $this->order_goods->where('order_sn='.$_GET['order_sn'])->select();
        $invoice = M('shop_make_invoice')->where('user_id='.$_GET['user_id'])->find();
        if($invoice){
            $this->assign('invoice',$invoice);
        }
        $this->assign('user_id',$_GET['user_id']);
        $this->assign('info',$info);
        $this->assign('order_sn',$_GET['order_sn']);
        $this->display();
    }


    // 开票保存信息
    public function add_invoice()
    {

        if($this->user_id != $_POST['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $_POST['time'] = time();
        // 查出发票可开总额度 加运费
        $res = $this->order->field('total_price,order_freight')->where('order_sn='.$_POST['order_sn'])->find();
        $total_invoice = $res['total_price'];
        $_POST['total_invoice'] = $total_invoice;
        $make = M('shop_make_invoice');
        $is_user = $make->where('user_id='.$_POST['user_id'])->find();
        if($is_user){
            $r = $make->where('user_id='.$_POST['user_id'])->save($_POST);
            $id = $make->where('user_id='.$_POST['user_id'])->getField('id');
            $res = $id;
        }else{
            $res = $make->add($_POST);
        }
         echo $res;

    }

    // 卖家开票保存图片
    public function add_picture()
    {
        if(IS_POST){
            foreach ($_POST['arr'] as $key => $value) {
                    $data = array();
                    $data['invoice_id'] = $value['invoice'];
                    $data['invoice_pic'] = $value['src'];
                    $data['invoice_money'] = $value['meny'];
                    $data['addtime'] = time();
                    $data['order_sn'] = M('shop_make_invoice')->where('id='.$value['invoice'])->getField('order_sn');
                    $data['status'] = 1;
                    $res = M('shop_money_invoice')->add($data);
                    echo $res;
            }
        }else{
            // 查出已开 和 未开的 额度
            $open = M('shop_make_invoice')->field('total_invoice,order_sn,time')->where('id='.$_GET['invoice_id'])->find();
            $not = M('shop_money_invoice')->field('invoice_money')->where('order_sn='.$open['order_sn'])->select();
            $open_inv = 0;
            foreach ($not as $k => $v) {
                $open_inv += $v['invoice_money'];
            }
            $not_inv = $open['total_invoice'] - $open_inv;
            $this->assign('open_inv',$open_inv);
            $this->assign('not_inv',$not_inv);
            $this->assign('shop_id',$_GET['user_id']);
            $this->assign('open',$open);
            $this->assign('invoice_id',$_GET['invoice_id']);
            $this->display();
        }
        
    }

    //修改发票
    public function edit_invoice()
    {
        $res = M('shop_money_invoice')->where('id='.$_POST['data']['id'])->save($_POST['data']);
         echo $res;
    }
    
}

   