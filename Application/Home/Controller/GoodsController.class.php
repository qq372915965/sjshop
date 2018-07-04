<?php
namespace Home\Controller;
use Think\Controller;
use Org\General\User;
class GoodsController extends Controller{

	public function _initialize(){
		// A('Home/Loginsso')->is_login();
	}

	public function index(){
		echo 'index';
	}

	//塑胶原料
	public function plastic_material(){
		$cookie_id = A('Home/Loginsso')->getuserid();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->display();
	}

	//保存塑胶原料
	public function save_plastic_material(){
		$param = I('post.');

		if(!$param['cPartnerCode']){
			$data['status'] = -1;
			$data['message'] = '交易公司不能为空';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['cInvName']){
			$data['status'] = -1;
			$data['message'] = '品名不能为空';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['vendor']){
			$data['status'] = -1;
			$data['message'] = '厂商不能为空';
			$this->ajaxReturn($data, "JSON");
		}

		if(!$param['cInvStd']){
			$data['status'] = -1;
			$data['message'] = '牌号不能为空';
			$this->ajaxReturn($data, 'JSON');
		}

		if($param['choose'] == 0){
			if($param['province'] == '省份'){
				$data['status'] = -1;
				$data['message'] = '未选择省份';
				$this->ajaxReturn($data, 'JSON');
			}

			if($param['city'] == '地级市'){
				$data['status'] = -1;
				$data['message'] = '未选择地级市';
				$this->ajaxReturn($data, 'JSON');
			}

			if($param['area'] == '市、县级市、县'){
		  		$data['status'] = -1;
		  		$data['message'] = '还没选择市、县级市、县';
		  		$this->ajaxReturn($data, 'JSON');
			}
		}

		if(!is_numeric($param['fWeight'])){
			$data['status'] = -1;
			$data['message'] = '数量不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if($param['fWeight'] < 1){
			$data['status'] = -1;
			$data['message'] = '数量不能小于1';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!is_numeric($param['fPrice'])){
			$data['status'] = -1;
			$data['message'] = '价格不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if($param['fPrice'] < 1000){
			$data['status'] = -1;
			$data['message'] = '价格不能小于1000';
			$this->ajaxReturn($data, 'JSON');
		}

		$code1['Name'] = $param['cInvName'];	//品名
		$code2['Name'] = $param['vendor'];		//厂商
		$code3['Name'] = $param['cInvStd'];		//牌号

		$result1 = M('shop_cinvname')->where($code1)->find();
		if(!$result1){
			$data['status'] = -1;
			$data['message'] = '品名不正确';
			$this->ajaxReturn($data, 'JSON');
		}

		$code2['ParentCode'] = $result1['areacode'];
		$result2 = M('shop_vendor')->where($code2)->find();
		if(!$result2){
			$data['status'] = -1;
			$data['message'] = '厂商不正确';
			$this->ajaxReturn($data, 'JSON');
		}

		$code3['ParentCode'] = $result2['areacode'];
		$result3 = M('shop_cinvstd')->where($code3)->find();
		if(!$result3){
			$data['status'] = -1;
			$data['message'] = '牌号不正确';
			$this->ajaxReturn($data, 'JSON');
		}

		if($param['choose'] == 0){
			if($param['province'] == '香港'){
				$param['address'] = $param['city'];
			}else{
				$param['address'] = str_replace('市', '', $param['city']);
				$param['cAddress'] = $param['province'].'-'.$param['address'].'-'.$param['area'];
			}
		}else{
			$param['cAddress'] = '广东省-东莞市-樟木头镇';
			$param['address'] = '东莞';
			$param['province'] = '广东省';
			$param['district'] = '樟木头镇';
		}

		if($param['second'] == 1){
			$param['cInvStd'] = $param['cInvStd'].'(2)';
		}
		
		$user_id['userid'] = $param['userid'];
		$user_info = M('shop_member')->where($user_id)->find();
		if(!$user_info){
			$data['status'] = -1;
			$data['message'] = '未查询到用户数据';
			$this->ajaxReturn($data, 'JSON');
		}

		$param['username'] = $user_info['username'];
		$param['groupid'] = $user_info['groupid'];
		$company_info = M('shop_company')->where($user_id)->find();
		if(!$company_info){
			$data['status'] = -1;
			$data['message'] = '未查询到公司数据';
			$this->ajaxReturn($data, 'JSON');
		}

		$param['truetime'] = time();
		$param['companyReferred'] = $company_info['companyreferred'];
		$param['companyname'] = $param['cPartnerCode'];
		$param['Thecontact'] = $company_info['thecontact'];
		$param['Contactphone'] = $company_info['contactphone'];
		$param['companyhome'] = $company_info['companyhome'];
		$param['companyconcept'] = $user_info['companyconcept'];
		$param['validity'] = 0;
		$param['status'] = 0;
		$param['baojia'] = 1;
		$param['moren'] = $company_info['moren'];
		unset($param['choose']);
		unset($param['city']);
		unset($param['area']);

		$save_dlxhbj_cache = M('shop_inventoryexisting_dlxhbj_cache')->add($param, array(), true);
		$save_dlxhbj_product = M('shop_inventoryexisting_dlxhbj_product')->add($param);

		if($save_dlxhbj_product > 0){
			$save_dlxhbj_xinghao = M('shop_inventoryexisting_dlxhbj_xinghao')->add($param);
		}

		if($save_dlxhbj_cache && $save_dlxhbj_product && $save_dlxhbj_xinghao){
			$data['status'] = 1;
			$data['message'] = '数据添加成功';
		}else{
			$data['status'] = -1;
			$data['message'] = '数据添加失败';
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//改性塑胶
	public function modified_plastic(){
		$cookie_id = A('Home/Loginsso')->getuserid();
		
		//品名选择框
		$common['ParentCode'] = 1;
		$common_goods = M('shop_cinvname')->where($common)->select();
		$other['ParentCode'] = 2;
		$other_goods = M('shop_cinvname')->where($other)->select();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->assign('common_goods', $common_goods);
		$this->assign('other_goods', $other_goods);
		$this->display();
	}

	//其它生产企业
	public function other_manufacturers(){
		$param = I('post.');
		$opt['userid'] = array('neq', A('Home/Loginsso')->getuserid());

		// $areacode['AreaCode'] = $param['cInvName'];
		$cinvname_info = M('shop_cinvname')->where($param)->find();
		$opt['cInvName'] = $cinvname_info['name'];
		$opt['audit'] = 1;

		$list = M('shop_property')->group('vendor')->where($opt)->select();

		echo '<select name="outvendor" style="margin-left:20px;height:28px;" class="sl_style1 outvendor" 
		id="change_select" onchange="change_3()">';
		echo "<option value=''>请选择生产商</option>";
		foreach($list as $v){
			echo "<option value='".$v['id']."'>".$v['vendor']."</option>";
		}
		echo '</select>';
	}

	//牌号
	public function grade(){
		$param = I('post.');
		$opt['id'] = $param['vendor'];

		$areacode['AreaCode'] = $param['cInvName'];
		$cinvname_info = M('shop_cinvname')->where($areacode)->find();
		$opt['cInvName'] = $cinvname_info['name'];
		$opt['audit'] = 1;

		$list = M('shop_property')->where($opt)->select();

		echo "<select class='sl_style outstd' name='outstd' style='margin-top:-2px;'>";
		echo "<option value=''>请选择</option>";
		foreach($list as $v){
			echo "<option value='".$v['cinvstd']."'>".$v['cinvstd']."</option>";
		}
		echo "</select>";
	}

	public function get_cinvname(){
		$param = I('post.');
		
		$result = M('shop_vendor')->where($param)->select();
		if($result){
			$this->ajaxReturn($result, 'JSON');
		}
	}

	public function get_vendor(){
		$param = I('post.');

		$result = M('shop_cinvstd')->where($param)->select();
		if($result){
			$this->ajaxReturn($result, 'JSON');
		}
	}

	//保存改性塑胶
	public function save_modified_plastic(){
		$param = I('post.');
	}

	//环保再生
	public function environmental_regeneration(){
		$cookie_id = A('Home/Loginsso')->getuserid();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->display();
	}

	//塑料助剂
	public function plastic_additives(){
		$cookie_id = A('Home/Loginsso')->getuserid();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->display();
	}

	//柜货报价
	public function counter_price(){
		$cookie_id = A('Home/Loginsso')->getuserid();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->display();
	}
}