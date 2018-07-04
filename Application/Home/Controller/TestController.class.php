<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->postmodel = D('postdata');
	}
	public function index(){
		echo "Test";
	}
	
	public function send_url(){
		$url ='http://120.79.53.118:88/api/UrlLink/11';
		$postdata['data'] = array('id' => 10 );
		$data = $this->post_send($url,$postdata);
		$data = json_decode($data, true);
		var_dump($data);		
	}
	
	
	//发送数据
	public function post_send($url,$postdata = array("type"=>"json")){
		
		//$url = 'http://localhost/weixin/index.php/Home/Postsend/post_receiv';
		$data =  $this->postmodel->curl_http($url,$postdata);
		return $data;
	}
	
	
	//接受数据
	public function post_receiv(){
		$data=file_get_contents("php://input"); //取得json数据	
        $this->postmodel->calllog(date("Y-m-d H:i:s",time()));		
		$this->postmodel->calllog($data);		
        $data = json_decode($data, TRUE);
		$result = $this->post_type($data);
		$result = json_encode($result);
		print_r($result);
        return $data; 		
	}
	
	//测试
	public function test(){
		$url ='';
		$postdata['type'] = 'test';
		$postdata['data'] = array('0' => 'a' , '1' =>'b'  );
		$data = $this->post_send($url,$postdata);
		var_dump($data);
	}
}