<?php
namespace Home\Model;
use Think\Model;
class WebservicesModel extends Model {
	
	protected $tableName = 'shop_user';
  
	public function __construct() {
		parent::__construct ();
	}
	//Webservices 调用
	public function client($url,$method,$data){
		
				//解决OpenSSL Error问题需要加第二个array参数，具体参考 http://stackoverflow.com/questions/25142227/unable-to-connect-to-wsdl
			$client = new \SoapClient($url,
				array(
					"stream_context" => stream_context_create(
						array(
							'ssl' => array(
								'verify_peer' => false,
								'verify_peer_name' => false,
							)
						)
					)
				)
			);
			//var_dump($client->__getFunctions());
			//var_dump($client->__getTypes());			
			//$result = $client->queryEliStock($data);
			//$method = 'queryEliStock';
 
            $result = $client->__soapCall($method,$data);
			//print_r($result);
			//将stdclass object的$result转换为array
			$result = get_object_vars($result);  
			//输出结果 
			return $result;
		
	}
	
	
}