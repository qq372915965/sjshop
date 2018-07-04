<?php
namespace Home\Controller;
use Think\Controller;
class PostsendController extends Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->postmodel = D('postdata');
	}
	
	public function index(){
		echo "Postsend";
	}
	
	//发送数据
	public function post_send($url,$postdata = array("type"=>"json")){
		
		$url = 'http://localhost/weixin/index.php/Home/Postsend/post_receiv';
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
	
	
	//发送数据例子
	public function postsendset(){	
		$url = "http://localhost/weixin/index.php/Home/Postsend/post_receiv";
		$postdata['type'] = 'json';
		$postdata['data'] = array("josndata"=>"hello");
		$this->post_send($url,$postdata);
	}
	//接收数据判断执行方法
	public function post_type($data){
		switch($data['type']){
			case 'json':
				$this->postmodel->calllog($data['type']);

				$result = A('Home/Addcart')->add_cart($data);

				$this->postmodel->calllog($result);
				break;
			case 'post':
				$this->postmodel->calllog($data['type']);
				break;
			case 'sql':
				$this->postmodel->calllog($data['type']);
				$result = A('Home/Addcart')->accept_data($data);
				break;
		}
		return $result;
		
	}

	//发送搜索用户数据
	public function post_user_data(){
		$params = I('post.');
		$url = "http://localhost/weixin/index.php/Home/Postsend/post_receiv";
		$postdata['type'] = 'search_user';
		$postdata['data'] = $params;
		$result = $this->post_send($url, $postdata);
		$this->ajaxReturn($result, 'JSON');
	}

	public function post_userid($data){
		$url = "http://localhost/weixin/index.php/Home/Postsend/post_receiv";
		$postdata['type'] = 'search_userid';
		$postdata['data'] = $data;
		$result = $this->post_send($url, $postdata);
		return $result;
	}

	//发送搜索商品数据
	public function post_goods_data(){
		$params = I('post.');
		$url = 'http://localhost/weixin/index.php/Home/Postsend/post_receiv';
		$postdata['type'] = 'search_goods';
		$postdata['data'] = $params;
		$result = $this->post_send($url, $postdata);
		$this->ajaxReturn($result, 'JSON');
	}
		
}