<?php
namespace Home\Controller;
use Think\Controller;
class LoginssoController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		header("Content-type:text/html;charset=UTF-8"); 
		session(array('name'=>'username','expire'=>3600*24*3));
	}
	
	public function index(){
		echo $this->getuserid();
		echo $this->is_login();
	}
	
	
	//登陆判断
	public function is_login(){
		if($this->getuserid()){
			return $this->getuserid();
		}else{
			$url = "/e/member/login/";
			header("Location: ".$url); 
			exit;
		}
		
	}
	
	
	public function getuserid(){
		$userid = $_COOKIE['sjshopuserid'];
		if($userid){
			$userid = $this->decrypt($userid,'liuzp');
		}
		return $userid;
	}
	
	// ajax 获取用户名
	public function ajax_name()
	{	
		 $name = $this->getshopuser('username');
		 echo $name;
	}

    //获取用户名 getshopuser('username')
	public function getshopuser($name){
		$userid = $this->getuserid();
		$usertab = M('shop_user');
		$shopuser = $usertab->where('sjdbid ='.$userid)->select();
		return $shopuser[0][$name];
	}
	
	//加密
	public function encrypt($data,$key){  
		$module=mcrypt_module_open('des','', MCRYPT_MODE_CBC,'');  
		$key=substr(md5($key),0,mcrypt_enc_get_key_size($module));  
		srand();  
		$iv=mcrypt_create_iv(mcrypt_enc_get_iv_size($module), MCRYPT_RAND);  
		mcrypt_generic_init($module,$key,$iv);  
		$encrypted=$iv.mcrypt_generic($module,$data);  
		mcrypt_generic_deinit($module);  
		mcrypt_module_close($module);  
		return md5($data).'_'.base64_encode($encrypted);  
	}  
    //解密
	public function decrypt($data,$key){      
		$_data = explode('_',$data,2);  
		if(count($_data)<2){  
			return false;  
		}  
		$data = base64_decode($_data[1]);        
		$module=mcrypt_module_open('des','', MCRYPT_MODE_CBC,'');  
		$key=substr(md5($key),0,mcrypt_enc_get_key_size($module));  
		$ivSize=mcrypt_enc_get_iv_size($module);  
		$iv=substr($data,0,$ivSize);  
		mcrypt_generic_init($module,$key,$iv);  
		$decrypted=mdecrypt_generic($module,substr($data,$ivSize,strlen($data)));  
		mcrypt_generic_deinit($module);  
		mcrypt_module_close($module);  
		$decrypted = rtrim($decrypted,"\0");         
		if($_data[0]!=md5($decrypted)){  
			return false;  
		}  
		return $decrypted;  
	} 
	
}