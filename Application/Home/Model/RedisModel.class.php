<?php
namespace Home\Model;
use Think\Model;
class RedisModel extends Model {
	
	protected $tableName = 'shop_user';
  
	public function __construct() {
		parent::__construct ();
		$this->redisdata = new \Redis();  
	    $this->redisdata->connect('127.0.0.1',6379)or die("redis is dead");
	}
	
	
	//存值
	public function redis_set($name,$value,$settime){
				   
		//数组转JSON
		$value = json_encode($value);
		return $this->redisdata->setex($name,$settime,$value); 		   
	}
	//取值
	public function redis_get($name){		   
		$value = $this->redisdata->get($name);
		//解析传递过来的json字符串
		//$value = stripslashes(html_entity_decode($value)); 
		$value = json_decode($value,TRUE);
		//$value = json_decode($value);
		return $value;		  
	}
	//判断值是否存在
	public function redis_isset($name){
		return $this->redisdata->exists($name);
	}
	
	//存list
	public function redis_set_list($name,$value){
		$value = json_encode($value);
		return $this->redisdata->lpush($name,$value);		
	}
	
	//取list
	public function redis_get_list($name,$len = 10){
		$value = $this->redisdata->lrange($name, 0, -1);
		$lengths = $this->redis_list_length($name);
		if($lengths > $len){
			$lengths = $len;
		}
		for($i = 0 ;$i < $lengths ; $i++){
			$newvalue[$i] = json_decode($value[$i],TRUE);
		}
		return $newvalue;
	}
	//list长度
	public function redis_list_length($name){
		$value = $this->redisdata->lsize($name);
		return $value;
	}
	
	
}