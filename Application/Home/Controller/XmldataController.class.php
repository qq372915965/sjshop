<?php
namespace Home\Controller;
use Think\Controller;
class XmldataController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->Xmlsend = A('Xmlsend');
	}
	
	
	public function xmltest(){
		
	}
	

	
	//发票查询
	public function invoiceget(){
		$data['fplxdm'] = "004";   //发票类型代码（004专,007普,026 电子）
		$data['cxtj'] = "15000000018964567089645670";   //发票代码+发票号码+发票号码
		$url = "http://119.131.210.74:8001";
		$xmlstring = "554433221100001,33498200011303,";
		$data = $this->Xmlsend->invoice_get($data,$url,$xmlstring);
		echo "<pre>";
		var_dump($data);
        //return $data;		
	}
	//发票开具
	public function invoiceset(){
        $data['DJBH'] = "65126";	 //单据编号
		$data['ISPRINT'] = "0";	 //是否打印
		$data['ISPREVIEW'] = "0";	 //是否预览
		
		$data['fplxdm'] = "004";	//发票类型代码
		$data['kplx'] = "0";	 //开票类型
		$data['tspz'] = "00";	 //特殊票种标识
		$data['xhdwsbh'] = "554433221100001";  //销货单位识别号	
		$data['xhdwmc'] = "广东百望测试2";	//销货单位名称
		$data['xhdwdzdh'] = "11111";	 //销货单位地址电话
		$data['xhdwyhzh'] = "22222";	 //销货单位银行帐号
		$data['ghdwsbh'] = "441900692405681";	 //购货单位识别号
		$data['ghdwmc'] = "东莞市亿祥硅胶科技有限公司";	                 //购货单位名称
		$data['ghdwdzdh'] = "穗丰年工业区（穗丰年市场对面）85805860";	//购货单位地址电话
		$data['ghdwyhzh'] = "288000460043311";  //购货单位银行帐号	
		$data['bmbbbh'] = "111";   //编码表版本号
		$data['hsslbs'] = "0";	//含税税率标识	
		$data['zhsl'] = "";	 //综合税率
		$data['hjje'] = "6836.5";	 //合计金额
		$data['hjse'] = "205.1";	  //合计税额
		$data['jshj'] = "7041.6";	//价税合计
		$data['bz'] = "";	//备注
		$data['skr'] = "陈志成";	//收款人
		$data['fhr'] = "陈志成";	 //复核人
		$data['kpr'] = "陈志成";	 //开票人
		$data['zyspmc'] = "";	//主要商品名称
		$data['spsm'] = "";	  //商品税目
		$data['qdbz'] = "0";	 //清单标志
		$data['ssyf'] = "";	    //所属月份
		$data['tzdbh'] = "";	//通知单编号
		$data['yfpdm'] = "";	//原发票代码
		$data['yfphm'] = "";	//原发票号码
		//商品一
		$goods[0]['fphxz'] = '0';  //发票行性质
		$goods[0]['spmc'] = '自来水费';  //商品名称
		$goods[0]['spsm'] = '';  //商品税目
		$goods[0]['dw'] = '吨';   //单位
		$goods[0]['spsl'] = '1467';  //商品数量
		$goods[0]['je'] = '3418.25';  //金额
		$goods[0]['sl'] = '0.03';    //税率
		$goods[0]['se'] = '102.55';   //税额
		$goods[0]['hsbz'] = '1';      //含税标志
		$goods[0]['spbm'] = '1100301010000000000';  //商品编码
		$goods[0]['zxbm'] = '';   //纳税人自行编码
		$goods[0]['yhzcbs'] = '1';  //优惠政策标识
		$goods[0]['slbs'] = '';  //0税率标识
		$goods[0]['zzstsgl'] = '即征即退100%';  //增值税特殊管理
		//商品二
		$goods[1]['fphxz'] = '0';  //发票行性质
		$goods[1]['spmc'] = '自来水费';  //商品名称
		$goods[1]['spsm'] = '';  //商品税目
		$goods[1]['dw'] = '吨';   //单位
		$goods[1]['spsl'] = '1467';  //商品数量
		$goods[1]['je'] = '3418.25';  //金额
		$goods[1]['sl'] = '0.03';    //税率
		$goods[1]['se'] = '102.55';   //税额
		$goods[1]['hsbz'] = '1';      //含税标志
		$goods[1]['spbm'] = '1100301010000000000';  //商品编码
		$goods[1]['zxbm'] = '';   //纳税人自行编码
		$goods[1]['yhzcbs'] = '1';  //优惠政策标识
		$goods[1]['slbs'] = '';  //0税率标识
		$goods[1]['zzstsgl'] = '即征即退100%';  //增值税特殊管理

		
        $url = "http://119.131.210.74:8001";
		$xmlstring = "554433221100001,33498200011303,";
		$data = $this->Xmlsend->invoice_set($data,$url,$xmlstring,$goods);
		echo "<pre>";
		var_dump($data);
        //return $data;		
	}
	//用户验证
	public function invoiceuser(){
		$data['name'] = "554433221100001";           //纳税人识别号
		$data['sn']  =  "F96DFEE0B0D98180AFCC9551209A0DB7B3388B08732AB3E43878232945D4C02B6B00DC122B8DB718C8C72CEB4FC03576D97C8AF3FB90B4D6A7CE26F42E50D087B634902AEF33072C";      //注册码（服务商提供）
		$url = "http://www.bwfapiao.com/fpserver/FpServlet";
		$data = $this->Xmlsend->invoice_user($data,$url);
		echo "<pre>";
		var_dump($data);
		//return $data;
	}
	//发票地址
	public function invoiceaddress(){
		$data['FP_DM'] = "1500000001" ;  //发票代码
		$data['FP_HM'] = "89645670" ;    //发票号码
		$data['JSHJ'] = "7041.6" ;      //价税合计
		$data['KPRQ'] = "20180424141825" ; //开票日期
	
		
		$data['name'] = "554433221100001";           //纳税人识别号
		$data['sn']  =  "F96DFEE0B0D98180AFCC9551209A0DB7B3388B08732AB3E43878232945D4C02B6B00DC122B8DB718C8C72CEB4FC03576D97C8AF3FB90B4D6A7CE26F42E50D087B634902AEF33072C";      //注册码（服务商提供）
		
		$url = "http://www.bwfapiao.com/fpserver/FpServlet";
		$data = $this->Xmlsend->invoice_address($data,$url);
		echo "<pre>";
		var_dump($data);
		//return $data;
	}
	
	
		
}