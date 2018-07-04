<?php
namespace Home\Controller;
use Think\Controller;
class MysellerController extends Controller {
	public function __construct() {
		parent::__construct ();

        $this->enewsmember = M('scn_enewsmember'); // 用户表
        $this->ecms_thecompany = M('scn_ecms_thecompany'); // 公司信息表
        $this->ecms_inventoryexisting_dlxhbj_product = M('scn_ecms_inventoryexisting_dlxhbj_product');  // 信息表
        $this->scn_enewsplayer = M('scn_enewsplayer'); // 投诉商品记录表
        $this->ecms_inventoryexisting_xgxhbj_product = M('scn_ecms_inventoryexisting_xgxhbj_product'); // 香港现货表
        $this->ecms_inventoryexisting_xgqhbj_product = M('scn_ecms_inventoryexisting_xgqhbj_product'); // 香港船货表
        $this->modified_product = M('scn_modified_product');// 改性塑胶表;
        $this->ecms_rebirth_product = M('scn_ecms_rebirth_product'); // 环保再生;
        $this->ecms_aids_product = M('scn_ecms_aids_product');// 塑料助剂;
        $this->ark_product = M('scn_ark_product'); // 柜货交易表

        // 校验参数是否正确
        if($_GET['user_id']){
            $is_user = $this->enewsmember->where('userid='.$_GET['user_id'])->find();
            if($is_user){
                 $this->user_id = $_GET['user_id'];
                $this->assign('user_id',$this->user_id);
            }else{
                exit('店铺不存在');
            }
           
        }
        // 登入用户的ID
        $this->login_user_id = A('Home/Loginsso')->getuserid();
        $this->assign('login_user_id',$this->login_user_id);


	}


    // 店铺首页
    public function seller_index()
    {
       $img = $this->enewsmember->where('userid='.$this->user_id)->find();
       $companyname = $this->ecms_thecompany->where('userid='.$this->user_id)->getField('companyname');
       $certificate = $this->ecms_thecompany->where('userid='.$this->user_id)->find();
       $sql['muserid'] = $this->user_id;
       $sql['ctype'] = 66;
       $news_center = M('scn_ecms_mnews')->where($sql)->limit('12')->select();
       $this->assign('type',0);
       $this->assign('news_center',$news_center);
       $this->assign('certificate',$certificate);
       $this->assign('img',$img);
       $this->assign('companyname',$companyname);
       $this->assign('user_id',$this->user_id);
       $this->display();
    }


    // 大陆现货 店铺
    public function seller_spot()
    {   
        // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();
        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();
        // 查现货表
        $where['second'] = 0;
        $where['userfen'] = 1;
        $where['status'] = 0;
        $where['baojia'] = 1;
        $where['validity'] = 0;
        $where['userid'] = $this->user_id;
        $goods_info = $this->ecms_inventoryexisting_dlxhbj_product->where($where)->order('cInvName')->select();

        $this->assign('type',1);
        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);
        $this->assign('goods_info',$goods_info);
        $this->display();
    }

    // 香港现货 店铺
    public function hongkong_spot()
    {
         // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();
        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        $where['second'] = 0;
        $where['userfen'] = 2;
        $where['status'] = 0;
        $where['baojia'] = 1;
        $where['validity'] = 0;
        $where['userid'] = $this->user_id;
        $goods_info = $this->ecms_inventoryexisting_xgxhbj_product->where($where)->order('cInvName')->select();

        $this->assign('goods_info',$goods_info);
        $this->assign('company_info',$company_info);
        $this->assign('user_info',$user_info);
        $this->assign('type',2);
        $this->display();
    }

    // 香港船货 店铺
    public function hongkong_cargo()
    {

         // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();
        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        $where['second'] = 0;
        $where['userfen'] = 3;
        $where['status'] = 0;
        $where['baojia'] = 1;
        $where['validity'] = 0;
        $where['userid'] = $this->user_id;
        $goods_info = $this->ecms_inventoryexisting_xgqhbj_product->where($where)->order('cInvName')->select();
        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);
        $this->assign('goods_info',$goods_info);
        $this->assign('type',3);
        $this->display();
    }

    // 改性塑胶
    public function modified_plastic()
    {   
         // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();

        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        $where['status'] = 0;
        $where['userid'] = $this->user_id;
        $goods_info = $this->modified_product->where($where)->order('goodsname')->select();
        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);
        $this->assign('goods_info',$goods_info);
        $this->assign('type',4);
        $this->display();
    }

    //  环保再生
    public function environmental_recycle()
    {   
         // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();

        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        // 商品信息
        $where['status'] = 0;
        $where['userid'] = $this->user_id;
        $goods_info = $this->ecms_rebirth_product->where($where)->order('cInvName')->select();

        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);
        $this->assign('goods_info',$goods_info);
        $this->assign('type',5);
        $this->display();
    }
	

    // 塑料助剂
    public function plastic_aids()
    {   
          // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();

        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        $where['status'] = 0;
        $where['userid'] = $this->user_id;

        $goods_info = $this->ecms_aids_product->where($where)->order('cInvName')->select();
        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);
        $this->assign('goods_info',$goods_info);
        $this->assign('type',6);
        $this->display();
    }

    // 柜货交易
    public function pbt_deal()
    {
         // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();

        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        $where['status'] = 0;
        $where['userid'] = $this->user_id;

        $goods_info = $this->ark_product->where($where)->order('cInvName')->select();

        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);
        $this->assign('goods_info',$goods_info);
        $this->assign('type',7);
        $this->display();
    }

    //关于我们
    public function about_we()
    {
         // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();

        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);
        $this->assign('type',8);
        $this->display();
    }

    // 联系方式
    public function contact_way()
    {
         // 查用户
        $user_info = $this->enewsmember->where('userid='.$this->user_id)->find();

        // 查公司信息
        $sql['moren'] = 1;
        $sql['userid'] = $this->user_id;
        $company_info = $this->ecms_thecompany->where($sql)->find();

        $this->assign('user_info',$user_info);
        $this->assign('company_info',$company_info);

        $this->assign('type',9);
        $this->display();
    }

    // 投诉商品
    public function complaint_goods()
    {
        
        $_POST['userid'] = $this->user_id;
        $_POST['tstime'] = date('Y-m-d H:i:s',time());
        $res =  $this->scn_enewsplayer->add($_POST);

        if ($res) {
            echo "<script>alert('提交成功！');history.go(-1);</script>";
            exit();
        }else{
            echo "<script>alert('提交失败！');history.go(-1);</script>";
            exit();
        }
    }


    // 在线留言
    public function line_word()
    {

            if(empty($_POST['lname'])){
                echo "<script>alert('姓名不能为空');history.back();</script>";
                exit;
            }
            if(empty($_POST['lemail'])) {
                echo "<script>alert('邮箱不能为空');history.back();</script>";
                exit;
            }

            if(empty($_POST['lphone'])) {
                echo "<script>alert('联系手机不能为空');history.back();</script>";
                exit;
            }

          if(empty($_POST['ltext'])) {
            echo "<script>alert('内容不能为空');history.back();</script>";
            exit;
          }

        if(!preg_match('/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/',$_POST['lemail'])){
            echo "<script>alert('邮箱格式不正确');history.back();</script>";
            exit;
          }

           //验证手机
          if(!preg_match('/^1(3|4|5|7|8)\d{9}$/',$_POST['lphone'])){
            echo "<script>alert('联系手机格式不正确');history.back();</script>";
            exit;
          }
          $_POST['address'] = $_POST['provinces'].'-'.$_POST['city'];
          $_POST['sj'] = time();
          $res = M('scn_liuyan')->add($_POST);
          if($res){
             echo "<script>alert('留言成功,感谢您的留言！');history.back();</script>";
          }else{
            echo "<script>alert('留言失败！');history.back();</script>";
          }
    }


    // 商品详情页
    public function goods_details()
    {
        echo 'hello world';
    }
}