<?php
namespace Home\Controller;
use Think\Controller;
class WebservicesController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->webservicesmodel = D('webservices');
		$this->postdatamodel = D('postdata');
		$this->url = "http://113.105.135.250:7018/AisinoFpTest/eliWebService.ws?wsdl";
	    //$this->obj = $this->webservicesmodel->client($url);
	}
	
	
	public function index(){
		echo "Webservices";
	}
	
	public function invEli(){

			$data =
			array(			
				'FPQQLSH' => '11100006676666680366666803',
				'DDH' => 'sn0001',
				'KP_NSRSBH'=> '440101999999033',
				'KP_NSRMC' => 'liuzp',
				'DKBZ' => '0',
				'XHF_NSRSBH' => '440101999999033',
				'XHFMC' => '销货方名称',
				'XHF_DZ' => '销货方地址',
				'XHF_DH' => '销货方电话',
				'GHFMC' => '个人(liuzp)',
				'KPR' => '开票员',
				'KPLX' => 1,
				'CZDM' => '10',
				'KPHJJE' => '20.01',
				'BMB_BBH' => '29.0',
				'details' => '发票明细'
			
			);
			//$data = (object)$data;	
			$data = $this->webservicesmodel->client($this->url,'invEli',array($data));
			var_dump($data);

	}
	
	public function test(){
		/*
		$data = array(array('KP_NSRSHXX' =>"440101999999033"));	
		$data = $this->webservicesmodel->client($this->url,'queryEliStock',$data);
		var_dump($data);
		*/
		$url = 'http://113.105.135.250:7018/AisinoFpTest/eliWebService.ws';
		$xml = '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"><s:Body><queryEliStock xmlns="http://webservice.companyInterface.dzfp.fp.aisinogd.com"><in0> 440101999999033</in0></queryEliStock></s:Body></s:Envelope>';
		$data = $this->postdatamodel->curl_post($url,$xml);
		//$data = $this->postdatamodel->xmltoarray($data);
		var_dump($data);
	}
	
	
	public function test1(){

		$client = new \SoapClient('http://113.105.135.250:7018/AisinoFpTest/eliWebService.ws?wsdl');
		$data = array('KP_NSRSHXX' =>'440101999999033');
		//$data = $this->arrayToXml($data);
		//$data = array($data);
		$method = 'queryEliStock';
		//$data  =$client->__getFunctions();
        $data =  $client->__soapCall($method,$data);
		var_dump($data);
	}
	
	public function test2(){
		$url = 'http://www.aisinogz.com:19876/AisinoFp-test/eliWebService.ws';
		$xml = '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
		<s:Body>
		<invEli xmlns="http://webservice.companyInterface.dzfp.fp.aisinogd.com">
		<in0 xmlns:a="http://pojo.hessian.companyInterface.dzfp.fp.aisinogd.com" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">

		
		<a:FPQQLSH>11100006676666680366666803</a:FPQQLSH>
		<a:DDH>sn0001</a:DDH>
		<a:KP_NSRSBH>440002999999441</a:KP_NSRSBH>
		<a:KP_NSRMC>liuzp</a:KP_NSRMC>
		<a:DKBZ>0</a:DKBZ>
		<a:XHF_NSRSBH>440002999999441</a:XHF_NSRSBH>
		<a:XHF_MC>火影</a:XHF_MC>
		<a:XHF_DZ>销货方地址</a:XHF_DZ>
		<a:XHF_DH>销货方电话</a:XHF_DH>
		<a:GHF_MC>个人(liuzp)</a:GHF_MC>
		<a:KPR>开票员</a:KPR>
		<a:KPLX>1</a:KPLX>
		<a:CZDM>10</a:CZDM>
		<a:KPHJJE>20.01</a:KPHJJE>
		<a:BMB_BBH>29.0</a:BMB_BBH>
		<a:details>
		<a:ElectroniceDetail>
			<a:XMMC>巧克力</a:XMMC>
			<a:XMSL>1</a:XMSL>
			<a:HSBZ>0</a:HSBZ>
			<a:XMDJ>20.01000000</a:XMDJ>
			<a:XMJE>20.01</a:XMJE>
			<a:SL>0</a:SL>
		</a:ElectroniceDetail>
		</a:details>
		
		<a:version i:nil="true"/>
		</in0>
		</invEli></s:Body></s:Envelope>';
		$data = $this->postdatamodel->curl_post($url,$xml);
		//$data = $this->postdatamodel->xmltoarray($data);
		var_dump($data);
	}
	
	    //数组转XML
    public function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                 $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }
	
  /*****************/
  /*
  namespace testApi.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            ViewBag.Title = "Home Page";
            svc.IEliWebServicePortType svc = new svc.EliWebServicePortTypeClient();
            var res = svc.invEli(new svc.ElectroniceInfo() { appId="11111111", userName="werewrewr", content="3242432423423432" , CZDM="24234234"});
          return Json(res, JsonRequestBehavior.AllowGet);
        }
    }
}
  */
  /******************/
   /*
   <s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"><s:Body><invEli xmlns="http://webservice.companyInterface.dzfp.fp.aisinogd.com"><in0 xmlns:a="http://pojo.hessian.companyInterface.dzfp.fp.aisinogd.com" xmlns:i="http://www.w3.org/2001/XMLSchema-instance"><a:BMB_BBH i:nil="true"/><a:BZ i:nil="true"/><a:CHYY i:nil="true"/><a:CZDM>24234234</a:CZDM><a:DDH i:nil="true"/><a:DKBZ i:nil="true"/><a:DSPTBM i:nil="true"/><a:EMAIL i:nil="true"/><a:EWM i:nil="true"/><a:FHR i:nil="true"/><a:FPQQLSH i:nil="true"/><a:FPZT i:nil="true"/><a:FP_DM i:nil="true"/><a:FP_HM i:nil="true"/><a:FP_MW i:nil="true"/><a:GHFQYLX i:nil="true"/><a:GHF_DZ i:nil="true"/><a:GHF_EMAIL i:nil="true"/><a:GHF_GDDH i:nil="true"/><a:GHF_MC i:nil="true"/><a:GHF_NSRSBH i:nil="true"/><a:GHF_SF i:nil="true"/><a:GHF_SJ i:nil="true"/><a:GHF_YHZH i:nil="true"/><a:HJBHSJE>0</a:HJBHSJE><a:HJSE>0</a:HJSE><a:HY_DM i:nil="true"/><a:HY_MC i:nil="true"/><a:JQBH i:nil="true"/><a:JYM i:nil="true"/><a:KPHJJE>0</a:KPHJJE><a:KPLX i:nil="true"/><a:KPR i:nil="true"/><a:KPRQ i:nil="true"/><a:KPXM i:nil="true"/><a:KP_NSRMC i:nil="true"/><a:KP_NSRSBH i:nil="true"/><a:NSRDZDAH i:nil="true"/><a:PYDM i:nil="true"/><a:SJ i:nil="true"/><a:SKR i:nil="true"/><a:SWJG_DM i:nil="true"/><a:TSCHBZ i:nil="true"/><a:TSFS i:nil="true"/><a:XHF_DH i:nil="true"/><a:XHF_DZ i:nil="true"/><a:XHF_MC i:nil="true"/><a:XHF_NSRSBH i:nil="true"/><a:XHF_YHZH i:nil="true"/><a:YFP_DM i:nil="true"/><a:YFP_HM i:nil="true"/><a:appId>11111111</a:appId><a:authorizationCode i:nil="true"/><a:codeType i:nil="true"/><a:content>3242432423423432</a:content><a:dataExchangeId i:nil="true"/><a:details i:nil="true"/><a:encryptCode i:nil="true"/><a:interfaceCode i:nil="true"/><a:passWord i:nil="true"/><a:requestCode i:nil="true"/><a:responseCode i:nil="true"/><a:terminalCode i:nil="true"/><a:userName>werewrewr</a:userName><a:version i:nil="true"/></in0></invEli></s:Body></s:Envelope>
   
   */
	
}