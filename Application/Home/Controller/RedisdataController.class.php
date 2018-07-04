<?php
namespace Home\Controller;
use Think\Controller;
class RedisdataController extends Controller {
	public function __construct() {
		parent::__construct ();
		$this->redismodel = D('Redis');
	}
    public function index(){
		echo "sjshop";    
    }


	
	//取值
	public function redis_get_value($name){
		if($this->redismodel->redis_isset($name)){
			 return  $this->redismodel->redis_get($name);  
		}else{
			 return  'NULL';
		}
	}
	
	//存值
	public function redis_set_value($name,$value,$settime = 300){
		return $this->redismodel->redis_set($name,$value,$settime);
	}
	
	//取list
	public function redis_get_list($name,$len = 30){
		return $this->redismodel->redis_get_list($name,$len);
	}
	
	//存list
	public function redis_set_list($name,$value){
		return $this->redismodel->redis_set_list($name,$value);
	}

/**************************************/	
	public function set_test(){
		echo $this->redis_set_value('liuzp','liuzpstring');
	}
	
	public function get_test(){
		echo $this->redis_get_value('liuzp');
	}
	
	public function set_list($list,$data){
		$data =  $this->redis_set_list($list,$data);
		echo $data;
	}
	
	public function get_list($list,$num){
		$data = $this->redis_get_list($list,$num);
		return $data;
		// var_dump($data);
	}
	
	

	
}