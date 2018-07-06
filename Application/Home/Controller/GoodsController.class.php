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

		$result1 = M('scn_cinvname')->where($code1)->find();
		if(!$result1){
			$data['status'] = -1;
			$data['message'] = '品名不正确';
			$this->ajaxReturn($data, 'JSON');
		}

		$code2['ParentCode'] = $result1['areacode'];
		$result2 = M('scn_vendor')->where($code2)->find();
		if(!$result2){
			$data['status'] = -1;
			$data['message'] = '厂商不正确';
			$this->ajaxReturn($data, 'JSON');
		}

		$code3['ParentCode'] = $result2['areacode'];
		$result3 = M('scn_cinvstd')->where($code3)->find();
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
		$user_info = M('scn_enewsmember')->where($user_id)->find();
		if(!$user_info){
			$data['status'] = -1;
			$data['message'] = '未查询到用户数据';
			$this->ajaxReturn($data, 'JSON');
		}

		$param['username'] = $user_info['username'];
		$param['groupid'] = $user_info['groupid'];
		$company_info = M('scn_ecms_thecompany')->where($user_id)->find();
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

		if($param['userfen'] == 1){
			$save_dlxhbj_cache = M('scn_ecms_inventoryexisting_dlxhbj_cache')->add($param, array(), true);
			$save_dlxhbj_product = M('scn_ecms_inventoryexisting_dlxhbj_product')->add($param);

			if($save_dlxhbj_product > 0){
				$save_dlxhbj_xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao')->add($param);
			}
		}

		if($param['userfen'] == 2){
			$save_dlxhbj_cache = M('scn_ecms_inventoryexisting_xgxhbj_cache')->add($param, array(), true);
			$save_dlxhbj_product = M('scn_ecms_inventoryexisting_xgxhbj_product')->add($param);

			if($save_dlxhbj_product > 0){
				$save_dlxhbj_xinghao = M('scn_ecms_inventoryexisting_xgxhbj_xinghao')->add($param);
			}
		}

		if($param['userfen'] == 3){
			$save_dlxhbj_cache = M('scn_ecms_inventoryexisting_xgqhbj_cache')->add($param, array(), true);
			$save_dlxhbj_product = M('scn_ecms_inventoryexisting_xgqhbj_product')->add($param);

			if($save_dlxhbj_product > 0){
				$save_dlxhbj_xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao')->add($param);
			}
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
		$common_goods = M('scn_cinvname')->where($common)->select();
		$other['ParentCode'] = 2;
		$other_goods = M('scn_cinvname')->where($other)->select();

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
		$cinvname_info = M('scn_cinvname')->where($param)->find();
		$opt['cInvName'] = $cinvname_info['name'];
		$opt['audit'] = 1;

		$list = M('scn_ecms_property')->group('vendor')->where($opt)->select();

		if($list){
			$this->ajaxReturn($list, 'JSON');
		}
	}

	//牌号
	public function grade(){
		$param = I('post.');
		$opt['id'] = $param['vendor'];

		$areacode['AreaCode'] = $param['cInvName'];
		$cinvname_info = M('scn_cinvname')->where($areacode)->find();
		$opt['cInvName'] = $cinvname_info['name'];
		$opt['audit'] = 1;

		$list = M('scn_ecms_property')->where($opt)->select();

		if($list){
			$this->ajaxReturn($list, 'JSON');
		}
	}

	public function get_cinvname(){
		$param = I('post.');
		
		$result = M('scn_vendor')->where($param)->select();
		if($result){
			$this->ajaxReturn($result, 'JSON');
		}
	}

	public function get_vendor(){
		$param = I('post.');

		$result = M('scn_cinvstd')->where($param)->select();
		if($result){
			$this->ajaxReturn($result, 'JSON');
		}
	}

	//保存改性塑胶
	public function save_modified_plastic(){
		$param = I('post.');

		if(!$param['outvendor']){
			$data['status'] = -1;
			$data['message'] = '其它生产厂商不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['goodsname']){
			$data['status'] = -1;
			$data['message'] = '品名不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['outstd']){
			$data['status'] = -1;
			$data['message'] = '牌号不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['vendor'] || !$param['model']){
			$data['status'] = -1;
			$data['message'] = '可对比牌号不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['Supplementarymaterial']){
			$data['status'] = -1;
			$data['message'] = '主要辅料及比例不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['level']){
			$data['status'] = -1;
			$data['message'] = '等级不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['features']){
			$data['status'] = -1;
			$data['message'] = '特性不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['pictureurl']){
			$data['status'] = -1;
			$data['message'] = '图片1不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		if($param['Exfactoryprice'] < 1){
			$data['status'] = -1;
			$data['message'] = '出厂价不合法';
			$this->ajaxReturn($data, 'JSON');
		}

		$code_1['AreaCode'] = $param['goodsname'];
		$code_2['AreaCode'] = $param['vendor'];
		$code_3['AreaCode'] = $param['model'];

		$res_1 = M('scn_cinvname')->where($code_1)->find();
		if(!$res_1){
			$data['status'] = -1;
			$data['message'] = '未查询到品名数据';
			$this->ajaxReturn($data, 'JSON');
		}

		$res_2 = M('scn_vendor')->where($code_2)->find();
		if(!$res_2){
			$data['status'] = -1;
			$data['message'] = '未查询到数据';
			$this->ajaxReturn($data, 'JSON');
		}

		$res_3 = M('scn_cinvstd')->where($code_3)->find();
		if(!$res_3){
			$data['status'] = -1;
			$data['message'] = '未查询到数据';
			$this->ajaxReturn($data, 'JSON');
		}

		$param['goodsname'] = $res_1['name'];
		$param['vendor'] = $res_2['name'];
		$param['model'] = $res_3['name'];
		$param['gxtime'] = time();

		if($param['vendor2'] == 0){
			$param['ovendor'] = $param['companyname'];
		}

		$param['ttid'] = 0;
		$param['status'] = 0;
    	$param['visitor'] = 0;
    	$param['modeladd'] = "";
		$param['companyReferred'] = "";
		$param['Thecontact'] = "";
		$param['Contactphone'] = "";
		$param['company_phone'] = "";
		$param['company_email'] = "";
		$param['company_qq'] = "";
		$param['companyhome'] = "";
		$param['moren'] = 1;
		unset($param['vendor2']);

		$save_modified_cache = M('scn_modified_cache')->add($param, array(), true);
		$save_modified_product = M('scn_modified_product')->add($param);

		if($save_modified_product > 0){
			$save_modified_xinghao = M('scn_modified_xinghao')->add($param);
		}

		if($save_modified_cache && $save_modified_product && $save_modified_xinghao){
			$data['status'] = 1;
			$data['message'] = '数据添加成功';
		}else{
			$data['status'] = -1;
			$data['message'] = '数据添加失败';
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//环保再生
	public function environmental_regeneration(){
		$cookie_id = A('Home/Loginsso')->getuserid();

		//品名选择框
		$common['ParentCode'] = 1;
		$common_goods = M('scn_cinvname')->where($common)->select();
		$other['ParentCode'] = 2;
		$other_goods = M('scn_cinvname')->where($other)->select();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->assign('common_goods', $common_goods);
		$this->assign('other_goods', $other_goods);
		$this->display();
	}

	//保存环保再生
	public function save_environmental_regeneration(){
		$param = I('post.');

		if(!$param['cInvName']){
			$data['status'] = -1;
			$data['message'] = '请选择品名';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['vendor']){
			$data['status'] = -1;
			$data['message'] = '请选择生产商';
			$this->ajaxReturn($data, 'JSON');
		}

		if(!$param['cInvStd']){
			$data['status'] = -1;
			$data['message'] = '请选择牌号';
		}

		if(!$param['pictureurl']){
			$data['status'] = -1;
			$data['message'] = '图片1不能为空';
		}

		$code_1['AreaCode'] = $param['cInvName'];

		$res_1 = M('scn_cinvname')->where($code_1)->find();
		if(!$res_1){
			$data['status'] = -1;
			$data['message'] = '未查询到数据';
			$this->ajaxReturn($data, 'JSON');
		}

		$param['cInvName'] = $res_1['name'];
		$param['cAddress'] = $param['province'].$param['city'];
		$param['address'] = $param['city'];
		$param['truetime'] = time();

		if($param['vendor2'] == 0){
			$param['vendor'] = $param['companyname'];
		}

		$param['xuans'] = 1;
		$param['youxiao'] = 1;
		$param['ttid'] = 0;
		$param['status'] = 0;
		$param['visitor'] = 1;
		$param['companyReferred'] = "";
		$param['Thecontact'] = "";
		$param['Contactphone'] = "";
		$param['company_phone'] = "";
		$param['company_email'] = "";
		$param['company_qq'] = "";
		$param['companyhome'] = "";
		$param['moren'] = 1;
		unset($param['vendor2']);
		unset($param['province']);
		unset($param['city']);

		$add_rebirth_cache = M('scn_ecms_rebirth_cache')->add($param, array(), true);
		$add_rebirth_product = M('scn_ecms_rebirth_product')->add($param);

		if($add_rebirth_product > 0){
			$add_rebirth_xinghao = M('scn_ecms_rebirth_xinghao')->add($param);
		}

		if($add_rebirth_cache && $add_rebirth_product && $add_rebirth_xinghao){
			$data['status'] = 1;
			$data['message'] = '数据添加成功';
		}else{
			$data['status'] = -1;
			$data['message'] = '数据添加失败';
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//塑料助剂
	public function plastic_additives(){
		$cookie_id = A('Home/Loginsso')->getuserid();

		$common['audit'] = 1;
		$common_goods = M('scn_categroy')->where($common)->select();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->assign('common_goods', $common_goods);
		$this->display();
	}

	public function save_plastic_additives(){
		$param = I('post.');

		if($param['vendor2'] == 0){
		    $param['ovendor'] = $param['companyname'];
		}

		$param['cAddress'] = $param['province'].$param['city'].$param['area'];
		$param['address'] = $param['city'];
		$param['truetime'] = time();
		$param['features'] = '';
		$param['useto'] = '';
		$param['use2'] = '';
		$param['ttid'] = 0;
		$param['status'] = 0;
		$param['visitor'] = 1;
		$param['companyReferred'] = '';
		$param['Thecontact'] = '';
		$param['Contactphone'] = "";
		$param['company_phone'] = "";
		$param['company_email'] = "";
		$param['company_qq'] = "";
		$param['companyhome'] = "";
		$param['moren'] = 1;
		unset($param['province']);
		unset($param['city']);
		unset($param['vendor2']);

		$add_aids_cache = M('scn_ecms_aids_cache')->add($param, array(), true);
		$add_aids_product = M('scn_ecms_aids_product')->add($param);

		if($add_aids_product > 0){
			$add_aids_xinghao = M('scn_ecms_aids_xinghao')->add($param);
		}

		if($add_aids_cache && $add_aids_product && $add_aids_xinghao){
			$data['status'] = 1;
			$data['message'] = '数据添加成功';
		}else{
			$data['status'] = -1;
			$data['message'] = '数据添加失败';
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//柜货报价
	public function counter_price(){
		$cookie_id = A('Home/Loginsso')->getuserid();

		$this->assign('user_info', User::get_company_info($cookie_id));
		$this->display();
	}

	public function save_counter_price(){
		$param = I('post.');

		if($param['choose'] == 0){
			// $param['cAddress'] = $param['province'].'-'.$param['city'].'-'.$param['area'];
			if($param['province'] == '香港'){
				$param['address'] = $param['city'];
			}else{
				$param['cAddress'] = $param['province'].'-'.$param['city'].'-'.$param['area'];
				$param['address'] = $param['city'];
				$param['district'] = $param['city'];
			}
		}else{
			$param['cAddress'] = '广东省-东莞市-樟木头镇';
			$param['address'] = '东莞';
			$param['province'] = '广东省';
			$param['district'] = '樟木头镇';
		}

		if($param['second'] != 0){
			$param['cInvStd'] = $cInvStd.'(2)';
		}

		$param['truetime'] = time();

		$user['userid'] = $param['userid'];
		$company_info = M('scn_ecms_thecompany')->where($user)->find();
		$user_info = M('scn_enewsmember')->where($user)->find();

		$param['companyReferred'] = $company_info['companyreferred'];
		$param['Thecontact'] = $company_info['thecontact'];
		$param['Contactphone'] = $company_info['contactphone'];
		$param['companyhome'] = $company_info['companyhome'];
		$param['companyconcept'] = $company_info['companyconcept'];
		$param['status'] = 0;
		unset($param['choose']);
		unset($param['city']);
		unset($param['area']);

		$add_ark_cache = M('scn_ark_cache')->add($param, array(), true);
		$add_ark_product = M('scn_ark_product')->add($param);

		if($add_ark_cache > 0){
			$add_ark_xinghao = M('scn_ark_xinghao')->add($param);
		}

		if($add_ark_cache && $add_ark_product && $add_ark_xinghao){
			$data['status'] = 1;
			$data['message'] = '数据添加成功';
		}else{
			$data['status'] = -1;
			$data['message'] = '数据添加失败';
		}
		$this->ajaxReturn($data, 'JSON');
	}

	//塑料助剂其它厂商
	public function other_additives_manufacturers(){
		$param = I('post.');
		$param['audit'] = 1;
		$param['userid'] = array('neq', A('Home/Loginsso')->getuserid());

		$result = M('scn_ecms_brand2')->group('companyname')->where($param)->select();

		if($result){
			$this->ajaxReturn($result, 'JSON');
		}
	}

	//塑料助剂牌号
	public function get_additives_grade(){
		$param = I('post.');
		$param['audit'] = 1;

		$result = M('scn_ecms_brand2')->where($param)->select();

		if($result){
			$this->ajaxReturn($result, 'JSON');
		}
	}
}