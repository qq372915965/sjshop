<?php
namespace Home\Controller;
use Think\Controller;
class AccountController extends Controller {
	public function __construct() {
		parent::__construct ();
        $this->company = D('shop_user_company');

         // 校验URL传的ID是否一致
         $this->user_id = A('Home/Loginsso')->is_login();

	}

	// 账户设置show
    public function index()
    {
        if($this->user_id != $_GET['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $this->assign('user_id',$_GET['user_id']);
        $this->display();
    }
    

    // 安全设置
    public function secure_set()
    {
        $this->display();
    }


    // 企业资料
    public function company_list()
    {
        if(IS_POST){
            $data = $this->company->where('user_id='.$_POST['user_id'])->find();
            if($data){
                $res = $this->company->where('user_id='.$_POST['user_id'])->save($_POST['obj']);
                $res = 2;
            }else{
                $_POST['obj']['user_id'] = $_POST['user_id'];
                $res = $this->company->add($_POST['obj']);
                $res = 1;
            }
            echo $res;
            
        }else{
            if($this->user_id != $_GET['user_id']){
                die('<h1>URL错误，请正确输入</h1>');
            }
            $data = $this->company->where('user_id='.$_GET['user_id'])->find();
            $this->assign('data',$data);
            $this->display();
        }
        
    }

    // 用户收获地址
    public function address_list()
    {
        if($this->user_id != $_GET['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $user_address = M('shop_user_address')->where("user_id=".$_GET['user_id'])->select();
        $this->assign('count',count($user_address));
        $this->assign('user_address',$user_address);
        $this->display();

    }

    // 用户删除地址
    public function address_del()
    {
        if($this->user_id != $_POST['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $res = M('shop_user_address')->where('id='.$_POST['address_id'])->delete();
        echo $res;
    }

    // 用户新增加地址
    public function address_add()
    {
        if($_GET['address_id']){
            $list = M('shop_user_address')->where('id='.$_GET['address_id'])->find();
            $checked = '';
            if($list['status'] == 1){
                $checked = 'checked';
            }
            $this->assign('address_id',$_GET['address_id']);
            $this->assign('checked',$checked);
            $this->assign('list',$list);
        }
        
            $user_id = $_GET['user_id'];
            
            $this->assign('user_id',$user_id);
            $this->display();
        
    }

    // 发票信息
    public function invoice_info()
    {
        if($this->user_id != $_GET['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }

        $info = M('shop_make_invoice')->where('user_id='.$_GET['user_id'])->find();
        if($info['invoice_type'] == 2){
            $this->assign('checked','checked');
        }
        $this->assign('user_id',$_GET['user_id']);
        $this->assign('invoice',$info);
        $this->display();
    }

    // 保存开票信息
    public function add_info()
    {
        if($this->user_id != $_POST['user_id']){
            die('<h1>URL错误，请正确输入</h1>');
        }
        $_POST['time'] = time();
        // 查出发票可开总额度 加运费
       
        $_POST['total_invoice'] = 0.00;
        $make = M('shop_make_invoice');
        $user_id = $make->where('user_id='.$_POST['user_id'])->find();
        if($user_id){
            $res = $make->where('user_id='.$_POST['user_id'])->save($_POST);
        }else{
            $res = M('shop_make_invoice')->add($_POST);
        }
         echo $res;
    }
}