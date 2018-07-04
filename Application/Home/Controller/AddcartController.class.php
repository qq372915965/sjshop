<?php
namespace Home\Controller;
use Think\Controller;
class AddcartController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->postmodel = D('postdata');
	}


	// 执行添加购物车的语句
	public function add_cart($data)
	{
		//$this->postmodel->calllog($data['data']['id']);
				$time=date("Y-m-d H:i:s",time());
				$goods_id=$data['data']['id'];
				$goods_name=$data['data']['cinvname']."-".$data['data']['vendor']."-".$data['data']['cinvstd'];
                $goods_price=$data['data']['fprice'];
                if($data['goods_num'] > 0){
                    $goods_number = $data['goods_num'];
                }else{
                    $goods_number=$data['data']['fweight'];
                }
                
                $companyname=$data['data']['companyname'];
                $address=$data['data']['address']."-".$data['data']['district'];
                // 用户信息
                $userid=$data['member']['userid'];
                $username=$data['member']['username'];
                $password=$data['member']['password'];

                // 卖家信息
                $sellerid = $data['seller']['userid'];
                $sellername = $data['seller']['username'];
                $sellerpass = $data['seller']['password'];

                // 货物类型
                $type = $data['type_case'];

				$obj=M();
				$obj2=M();
				$sql=$obj->query("select id,goods_number from shop_cart_goods where goods_id='".$goods_id."' and status=0 and user_id={$userid} and type = {$type}");

				if($sql[0]['id']){
					$number=$sql[0]['goods_number'];

                    if($data['goods_num'] > 1){
                        $goods_number = $number + $data['goods_num'];
                    }else{
                        $goods_number=$number+1;
                    } 
					
					$result=$obj->execute("update shop_cart_goods set goods_number='".$goods_number."' where goods_id='".$goods_id."' and status=0");
				}else{
					$result=$obj->execute("insert into shop_cart_goods (user_id,goods_id,goods_name,goods_price,goods_number,rec_type,companyname,address,status,shop_id,type)values('$userid','$goods_id','$goods_name','$goods_price','$goods_number','0','$companyname','$address','0','$sellerid','$type')");
				}
                $sql2=$obj2->query("select sjdbid from shop_user where sjdbid=".$userid);
                $seller = $obj2->query("select sjdbid from shop_user where sjdbid=".$sellerid);
                if($sql2[0]['sjdbid']){
                    $result2=$obj2->execute("update shop_user set lastlogindatetime='".$time."' where sjdbid=".$userid);
                }else{
                	// 插入用户数据到 db_shop 库
                	$result2=$obj2->execute("insert into shop_user (username,password,nickname,state,lastlogindatetime,sjdbid,createtime)values('$username','$password','$username','0','$time','$userid','$time')");
                }

                if(!$seller[0]['sjdbid']){
                	// 插入卖家信息到db_shop 库
                	$result3=$obj2->execute("insert into shop_user (username,password,nickname,state,lastlogindatetime,sjdbid,createtime)values('$sellername','$sellerpass','$sellername','0','$time','$sellerid','$time')");
                }
                return $result;

	}

    // 接受数据
    public function accept_data($data)
    {


        //$phone = $data['data']['a_res'][0]['contactphone'];
        $text = '会员：'.$data['data']['a_res'][0]['username'].' 电话：'.$data['data']['a_res'][0]['contactphone'].'到您店铺咨询，请尽快登入';

        D("postdata")->calllog($text);
        // $data = json_encode($data);
        //$list = json_decode($data,TRUE);
        // D("postdata")->calllog($data);
        // 短信通知
        // $res = A('Home/Phone')->phone_sms('18028776074',$text);
        return $data;

    }
}