<?php
namespace Home\Controller;
use Think\Controller;
class XmlsendController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->postmodel = D('postdata');
	}
	

	
	//发票查询
	public function invoice_get($data,$url,$xmlstring = ''){
		$xmldata = '<?xml version="1.0" encoding="gbk"?>
					<business comment="发票查询" id="FPCX">
					<body yylxdm="1">
					<input>
					<fplxdm>'.$data['fplxdm'].'</fplxdm>
					<cxtj>'.$data['cxtj'].'</cxtj>
					</input>
					</body>
					</business>
					';
		$xmldata = base64_encode($xmldata);			
		$xmldata = $xmlstring.$xmldata;
		$data = $this->postmodel->curl_post($url,$xmldata);
		$data = base64_decode($data);
		$data = $this->postmodel->xmltoarray($data);
		return $data;	
	}
	
	
    //xml开票
	public function invoice_set($data,$url,$xmlstring,$goods){
        $lengths = count($goods);
		$xmlgoods = '';
        for($i = 0 ; $i < $lengths ;$i++){
			$xmlgoods  = $xmlgoods.'<group xh="'.$i.'">
						<fphxz>'.$goods[$i]['fphxz'].'</fphxz>
						<spmc>'.$goods[$i]['spmc'].'</spmc>
						<spsm>'.$goods[$i]['spsm'].'</spsm>
						<dw>'.$goods[$i]['dw'].'</dw>
						<spsl>'.$goods[$i]['spsl'].'</spsl>
						<je>'.$goods[$i]['je'].'</je>
						<sl>'.$goods[$i]['sl'].'</sl>
						<se>'.$goods[$i]['se'].'</se>
						<hsbz>'.$goods[$i]['hsbz'].'</hsbz>
						<spbm>'.$goods[$i]['spbm'].'</spbm>
						<zxbm>'.$goods[$i]['zxbm'].'</zxbm>
						<yhzcbs>'.$goods[$i]['yhzcbs'].'</yhzcbs>
						<slbs>'.$goods[$i]['slbs'].'</slbs>
						<zzstsgl>'.$goods[$i]['zzstsgl'].'</zzstsgl>
						</group>
					   ';
		}		

		$xmldata = '<?xml version="1.0" encoding="gbk"?>
				<business comment="发票开具" id="FPKJ">
				<body yylxdm="1">
				<input>
				<fplxdm>'.$data['fplxdm'].'</fplxdm>
				<kplx>'.$data['kplx'].'</kplx>
				<tspz>'.$data['tspz'].'</tspz>
				<xhdwsbh>'.$data['xhdwsbh'].'</xhdwsbh>
				<xhdwmc>'.$data['xhdwmc'].'</xhdwmc>
				<xhdwdzdh>'.$data['xhdwdzdh'].'</xhdwdzdh>
				<xhdwyhzh>'.$data['xhdwyhzh'].'</xhdwyhzh>
				<ghdwsbh>'.$data['ghdwsbh'].'</ghdwsbh>
				<ghdwmc>'.$data['ghdwmc'].'</ghdwmc>
				<ghdwdzdh>'.$data['ghdwdzdh'].'</ghdwdzdh>
				<ghdwyhzh>'.$data['ghdwyhzh'].'</ghdwyhzh>
				<bmbbbh>'.$data['bmbbbh'].'</bmbbbh>
				<hsslbs>'.$data['hsslbs'].'</hsslbs>
				<fyxm count="'.$lengths.'">'.$xmlgoods.'</fyxm>
				<zhsl>'.$data['zhsl'].'</zhsl>
				<hjje>'.$data['hjje'].'</hjje>
				<hjse>'.$data['hjse'].'</hjse>
				<jshj>'.$data['jshj'].'</jshj>
				<bz>'.$data['bz'].'</bz>
				<skr>'.$data['skr'].'</skr>
				<fhr>'.$data['fhr'].'</fhr>
				<kpr>'.$data['kpr'].'</kpr>
				<zyspmc>'.$data['zyspmc'].'</zyspmc>
				<spsm>'.$data['spsm'].'</spsm>
				<qdbz>'.$data['qdbz'].'</qdbz>
				<ssyf>'.$data['ssyf'].'</ssyf>
				<tzdbh>'.$data['tzdbh'].'</tzdbh>
				<yfpdm>'.$data['yfpdm'].'</yfpdm>
				<yfphm>'.$data['yfphm'].'</yfphm>
				</input>
				</body>
				</business>
				';
		$xmldata = base64_encode($xmldata);
		$xmldatas = '<?xml version="1.0" encoding="gbk"?>
					<business comment="发票开具打印" id="FP_PRINTYTH">
					<body yylxdm="1">
					<input>
					<DJBH>'.$data['DJBH'].'</DJBH>
					<KPXML>'.$xmldata.'</KPXML>
					<ISPRINT>'.$data['ISPRINT'].'</ISPRINT>
					<ISPREVIEW>'.$data['ISPREVIEW'].'</ISPREVIEW>
					</input>
					</body>
					</business>
					'
					;
		
		$xmldata = base64_encode($xmldatas);			
		$xmldata = $xmlstring.$xmldata;
		$data = $this->postmodel->curl_post($url,$xmldata);
		$data = base64_decode($data);
		$data = $this->postmodel->xmltoarray($data);
		return $data;
	}
	
	//用户验证
	public function invoice_user($data,$url){
		$xmldata = '<?xml version="1.0" encoding="gbk"?>
					<business id="YHYZ" comment="用户验证">
					<user lxdm="用户类型">
					<name>'.$data['name'].'</name>					
					<sn>'.$data['sn'].'</sn>
					</user>
					</business>
					';
		$data = $this->postmodel->curl_xml($url,$xmldata);
        return $data; 		
	}
	
	//发票地址
	public function invoice_address($data,$url){
		$returndata = $this->invoice_user($data,$url);
		$access_token = $returndata['user']['access_token'];
		$xmldata = '<?xml version="1.0" encoding="gbk"?>
					<business id="FPCFDZ" comment="发票存放地址">
					<user lxdm="用户类型">
					<name>'.$data['name'].'</name>
					<access_token>'.$access_token.'</access_token>
					</user>
					<COMMON_FPXX_CFDZS size="存放地址数量">
					  <COMMON_FPXX_CFDZ>
						<FP_DM>'.$data['FP_DM'].'</FP_DM>
						<FP_HM>'.$data['FP_HM'].'</FP_HM>
						<JSHJ>'.$data['JSHJ'].'</JSHJ>  
						<KPRQ>'.$data['KPRQ'].'</KPRQ>
					  </COMMON_FPXX_CFDZ>
					</COMMON_FPXX_CFDZS>
					</business>
					';
		$url = "http://www.bwfapiao.com/fpserver/FpServlet";
		$data = $this->postmodel->curl_xml($url,$xmldata);
		return $data;	
	}
	
		
}