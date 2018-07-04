<?php
namespace Home\Controller;
use Think\Controller;
//new \Org\Util\Mydbda;
class PhoneController extends Controller {
	protected $model;
	
	public function __construct(){
		parent::__construct();
        $this->postdata = D('postdata');		
		$this->sms = '106909291790';
	    $this->phoneX = array('8617160391287','8617160391289','8617160391290','8617160391291','8617160391292','8617160391293','8617160391295','8617160391296','8617160391297','8617160391298','8617160391301','8617160391302','8617160391303','8617160391305','8617160391306','8617160391307','8617160391308','8617160391309','8617160391310','8617160391312','8617160391315','8617160391316','8617160391317','8617160391318','8617160391319','8617160391320','8617160391321','8617160391323','8617160391325','8617160391326','8617160391327','8617160391328','8617160391329','8617160391330','8617160391331','8617160391332','8617160391335','8617160391336','8617160391337','8617160391338','8617160391339','8617160391350','8617160391351','8617160391352','8617160391353','8617160391356','8617160391357','8617160391358','8617160391359','8617160391360');
	}
    

	
	public function index(){
		echo "phone";
	}
	
	
	//配置电话请求头
	public function phone_headers($postdate){
				
		$ip_port ='ecommprotect.huaweiapi.com';
		
        $datatime = time();
		$datatimeT = gmdate("Y-m-d",$datatime);
		$datatimeZ = gmdate("H:i:s",$datatime);
		$header_tm = $datatimeT.'T'.$datatimeZ.'Z';
		
		$datatime = strtotime("+3 Minute",time());
		$datatimeT = gmdate("Y-m-d",$datatime);
		$datatimeZ = gmdate("H:i:s",$datatime);
		$header_ed = $datatimeT.'T'.$datatimeZ.'Z';
		
		$app_id = '5bd884fa6c17499ba9bcde913ffcd1fd';
        $app_secrect = '1cfabd5c8ec9418192529f313f9d179b';
		$header_Nonce = 'liuzp';
		
		$header_pw = hash("sha256", $header_Nonce.$header_tm.$app_secrect,true);
		$header_pw = base64_encode($header_pw);
       	
		$headers = array();
		$headers[] = "Content-Type:application/json; charset=UTF-8";
		$headers[] = "Content-Length:".strlen($postdate);
		$headers[] = "Host:".$ip_port;
		$headers[] = "Accept: application/json";
		$headers[] = "Connection:keep-alive";
		$headers[] = 'Authorization:WSSE realm="SDP", profile="UsernameToken", type="AppKey"';
        $headers[] = 'X-WSSE: UsernameToken Username="'.$app_id.'", PasswordDigest="'.$header_pw.'", Nonce="'.$header_Nonce.'",Created="'.$header_tm.'"';
		
		$data['postdate'] = $postdate;
		$data['headers'] = $headers;
		$data['phoneX'] = $this->phoneX;
		
		return $data ;
		
	}
	
	//配置短信请求头
	public function sms_headers($postdate){
				
		$ip_port ='ecommprotect.huaweiapi.com';
		
        $datatime = time();
		$datatimeT = gmdate("Y-m-d",$datatime);
		$datatimeZ = gmdate("H:i:s",$datatime);
		$header_tm = $datatimeT.'T'.$datatimeZ.'Z';
		
		$datatime = strtotime("+3 Minute",time());
		$datatimeT = gmdate("Y-m-d",$datatime);
		$datatimeZ = gmdate("H:i:s",$datatime);
		$header_ed = $datatimeT.'T'.$datatimeZ.'Z';
		
		/*$app_id = '1d9599bfcf3c4f6ab0e819b06c6e7408';
        $app_secrect = 'a57dccb865424634817e6e3b0cc1287a';*/
        $app_id = '93868024947a48eca922e8e7585f8437';
        $app_secrect = 'f0c148358902481fa3815af9c46a339c';
		$header_Nonce = 'liuzp';
		
		$header_pw = hash("sha256", $header_Nonce.$header_tm.$app_secrect,true);
		$header_pw = base64_encode($header_pw);
       	
		$headers = array();
		$headers[] = "Content-Type:application/x-www-form-urlencoded";
		$headers[] = "Accept: application/json";
		$headers[] = 'Authorization:WSSE realm="SDP", profile="UsernameToken", type="AppKey"';
        $headers[] = 'X-WSSE: UsernameToken Username="'.$app_id.'", PasswordDigest="'.$header_pw.'", Nonce="'.$header_Nonce.'",Created="'.$header_tm.'"';
		
		$data['postdate'] = $postdate;
		$data['headers'] = $headers;
		$data['phoneX'] = $this->phoneX;
		
		return $data ;
		
	}
	//发短信
	public function phone_sms($phoneA,$sms_text){
	    $sms_text = '【塑金在线】:'.$sms_text;
		$url = "http://ecommprotect.huaweiapi.com/sms/batchSendSms/v1";
		$postdate = 'from='.$this->sms.'&to='.$phoneA.'&body='.$sms_text;
		$postdate = $postdate.'&statusCallback=http://www.sujin1688.com/weixin/index.php/Home/Phone/notifyCallEvent';
		$data = $this->sms_headers($postdate);
		$headers = $data['headers'];
		return $this->postdata->curl_http($url,$postdate,$headers);
	}
	
					
	public function phone_ax(){
		
       	/*if(I('get.phoneA')){
			$this->phoneA = I('get.phoneA');
		}else{
			$this->phoneA = '13243839822';
		}*/
		$k=$this->postdata->countlog();
        
        $i=$k%50;

		$phoneid=$_GET['id'];
		$obj=M();
		$select = $obj->query("select Contactphone from scn_ecms_inventoryexisting_dlxhbj_product where id=".$phoneid); 
   		$this->phoneA = $select[0]['contactphone'];	
        
        $postdate = '
		{
		"virtualNumber": "'.$this->phoneX[$i].'",
		"aParty": "86'.$this->phoneA.'",
		"calledNumDisplay": "0",
		"isRecord": "0"
		}
		';
       
        $data = $this->phone_headers($postdate);
		$headers = $data['headers'];
        $url = "http://ecommprotect.huaweiapi.com/ax/bindNumber/v1";
		$result=$this->postdata->curl_http($url,$postdate,$headers);
		if($result['code']=="000000"){
            echo substr($this->phoneX[$i],2);
		}else{
			if($k%51 ==0){
				$this->phone_ax_un_post($this->phoneX[($i+1)%50]);
				$this->postdata->calllog(date("Y-m-d H:i:s",time())."号码被占用".$k);
			}
			$this->phone_ax();
			
		}
         
	}


	
	public function phone_ax_un(){
		if(I('get.phoneX')){
			$this->phoneX = I('get.phoneX');
		}
		
        $postdate = '
		{
		"type": "1",
        "number": "'.$this->phoneX.'"
		}
		';
		
        $data = $this->phone_headers($postdate);
		$headers = $data['headers'];

        $url = "http://ecommprotect.huaweiapi.com/ax/unbindNumber/v1";
		
		echo $data['phoneX'];
	    return $this->postdata->curl_http($url,$postdate,$headers);
		
	}
	
	public function phone_ax_un_post($phoneX){
		$url = "http://localhost/weixin/index.php/Home/Phone/phone_ax_un/phoneX/".$phoneX;
		return $this->postdata->curl_http($url);
	}
	//电话格式
	public function phonestr($phone){
		$type = substr($phone,2,1);
		if($type == '1'){
			$data = substr($phone,2);
		}else{
			$data = '0'.substr($phone,2);
		}
		return $data;
	}
	
	//获取notify
	public function notifyCallEvent(){
		$data=file_get_contents("php://input"); //取得json数据
		
		$this->postdata->calllog($data);
		
        $data = json_decode($data, TRUE); 		//格式化
		
		//电话开始
	    if($data['callEvent']['event'] == "IDP"){
			$phoneB = $data['callEvent']['calling'];
			$phoneA = $data['callEvent']['called'];
			$log = $phoneB. " call to  ".$phoneA."\n ";
			$this->postdata->calllog($log);
            $companyReferred=$this->phone_notic(substr($phoneA,2));
			
			$phoneA = $this->phonestr($phoneA);
			$phoneB = $this->phonestr($phoneB);
            //短信通知
			$sms_text = '尊敬的客户您好，商家'.$companyReferred.'的联系电话为'.$phoneA.'，请注意保存。[回复TD退订]';
            $this->phone_sms($phoneB,$sms_text);
            $sms_text = '有客户通过塑金在线向你询价了，客户电话号码为：'.$phoneB.'，请注意保存。买卖塑胶用塑金、更放心！[回复TD退订]';
            $this->phone_sms($phoneA,$sms_text);
		}
		//电话结束
		if($data['callEvent']['event'] == "Release"){
			$this->phone_log($data);
			$this->phone_ax_un_post($data['callEvent']['virtualNumber']);
		}		
	}
	
	//获取block
	public function blockCallEvent(){		
	}
		
	
	//接收并打印消息头
	public function phone_print(){
        
		$headers = array();
		foreach ($_SERVER as $key => $value) {
			if ('HTTP_' == substr($key, 0, 5)) {
				$headers[str_replace('_', '-', substr($key, 5))] = $value;
			}
		}    
		echo '<pre>';
		//print_r($headers); 
		
        var_dump($_SERVER);
	}
	
	public function test(){
		/*
		$data1 = '{"appKey":"4e9499e1dfbd4c8180b5198ca355921f","callEvent":{"callIdentifier":"65382924572697146251522314841119","called":"8618607554432","calling":"8613243839822","event":"IDP","extInfo":{"extParas":[],"rawCalled":"8615644752472","rawCalledNOA":"4","rawCalling":"8613243839822","rawCallingNOA":"4"},"isRecord":"0","notificationMode":"Notify","timeStamp":"2018-03-29T09:14:01.126Z","virtualNumber":"8617071347436"}}';
		$data2 = '		{"appKey":"4e9499e1dfbd4c8180b5198ca355921f","callEvent":{"callIdentifier":"65382924572697146251522314841119","called":"8618607554432","calling":"8613243839822","event":"Release","extInfo":{"extParas":[{"key":"ReleaseReason","value":"Abandon"},{"key":"Duration","value":""}],"rawCalled":"8615644752472","rawCalledNOA":"4","rawCalling":"8613243839822","rawCallingNOA":"4"},"isRecord":"0","notificationMode":"Notify","timeStamp":"2018-03-29T09:14:23.216Z","virtualNumber":"8617071347436"}}
		';
		//echo $data ;
		$data = json_decode($data1, TRUE);
		echo var_dump($data['callEvent']['calling']);
		*/
			$sms_text = '黄大神，中午吃啥！[回复TD退订]';
			
			$phoneB = '17748644020';
        
            var_dump($this->phone_sms($phoneB,$sms_text));
	}
	
	//获取商家名称
    public function phone_notic($phoneA){
		$obj=M();
		$result=$obj->query("select companyReferred from scn_ecms_inventoryexisting_dlxhbj_product where Contactphone='".$phoneA."' order by id");
		return $result[0]['companyreferred'];	
	}
    
    //获取通话日志存数据库
	public function phone_log($data){
		$calltime=$data['callEvent']['extInfo']['extParas'][1]['value'];
		$phoneB = substr($data['callEvent']['calling'],2);
		$phoneA = substr($data['callEvent']['called'],2);
		$phoneX = substr($data['callEvent']['virtualNumber'],2);
		$vendor=$this->phone_notic($phoneA);
		$time=time();
		if(empty($calltime)){
			$status=1;
			$calltime=0;
		}else{
			$status=0;
		}
        $obj=M();
		$result=$obj->execute("insert into scn_cain (time,calling,called,status,calltime,vendor,middlenum)values('$time','$phoneB','$phoneA','$status','$calltime','$vendor','$phoneX')");
		//$this->calllog($result);
	}
	
	
	
}