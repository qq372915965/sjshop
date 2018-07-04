<?php
namespace Home\Model;
use Think\Model;
class PostdataModel extends Model {
	
	protected $tableName = 'shop_user';
  
	public function __construct() {
		parent::__construct ();
	}
  
	//打印日志
	public function calllog($txt){
		$myfile = fopen( $_SERVER['DOCUMENT_ROOT']."/sjshop/log/calllog.txt", "a+") or die("Unable to open file!");
		fwrite($myfile, $txt);
		fwrite($myfile, "\r\n\r\n");
		fclose($myfile);
	}
	
	//访问计数
	public function countlog(){
		if(file_exists($_SERVER['DOCUMENT_ROOT']."/sjshop/log/countlog.txt")){
			$fp = fopen($_SERVER['DOCUMENT_ROOT']."/sjshop/log/countlog.txt","r");
			$counter = fread($fp,100);
			if(is_numeric($counter)){					
			  $counter++;
			}else{
			  $counter = 0;
			}
			fclose($fp);		
		}else{
		   $counter = 0;
		}
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/sjshop/log/countlog.txt","w");
		fwrite($fp,$counter);
		fclose($fp);
		return $counter;
	}
	

	//发送get	
	public function curl_get($url,$headers = NULL){
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$dom = curl_exec($ch);
		curl_close($ch);
		return $dom;
	}
	
	//发送post
	public function curl_post($url,$postdate,$headers = NULL){

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);	
        curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);		
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$postdate);		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		return $result;
	}
	//post json数据
	public function curl_http($url, $data = NULL, $headers = NULL ,$json = true){
		
       $curl = curl_init();
	   
       curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	   if(!empty($data)){
		   if($json && is_array($data)){
				$data = json_encode($data);
		   }
		   curl_setopt($curl, CURLOPT_POST, 1);
		   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
           if($json){ 
		        //发送JSON数据
				curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
           }		   
	   }
	   
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   $res = curl_exec($curl);
	   $errorno = curl_errno($curl);
	   if ($errorno){
		   return array('errorno' => false, 'errmsg' => $errorno);
	   }
	   curl_close($curl);
	   //print_r($res);
	   return json_decode($res, true);
	}
	
	
	//post xml数据	
	public function curl_xml($url,$xmldata){
		
		if (!extension_loaded("curl")) {
			trigger_error("对不起，请开启curl功能模块！", E_USER_ERROR);
		}

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,$url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $xmldata);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$return_xml = curl_exec($curl);
		curl_close($curl);

		//echo $return_xml;
		//exit;

		//禁止引用外部xml实体
		libxml_disable_entity_loader(true);
		//先把xml转换为simplexml对象，再把simplexml对象转换成 json，再将 json 转换成数组。
		$data = json_decode(json_encode(simplexml_load_string($return_xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		return $data;
		
	}
    
	//xml转换格式
	public function xmltoarray($xmldata){
		//获取xml的编码
		$data =  mb_detect_encoding($xmldata); 
		//转成指定的编码
		$xmldata =  mb_convert_encoding($xmldata,'utf-8',$data);
		
		$xmldata = str_replace('<?xml version="1.0" encoding="gbk"?>','<?xml version="1.0" encoding="utf-8"?>',$xmldata);
		//xml乱码
		$xmldata = str_replace('<skm>','<skm><![CDATA[',$xmldata);
		$xmldata = str_replace('</skm>',']]></skm>',$xmldata);
		
		//XML 字符串为 SimpleXMLElement 对象
		$xmldata = simplexml_load_string($xmldata);
		$data = json_decode(json_encode($xmldata),TRUE);
		return $data;
	}

}