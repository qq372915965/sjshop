<?php
namespace Home\Model;
use Think\Model;
class CheckModel extends Model {
	
	protected $tableName = 'shop_order';
  
	public function __construct() {
		parent::__construct ();
	}
	
	public function CheckStr($str){
		$str = $this->inject_check($str);
		$str = $this->str_check($str);
		$str = $this->post_check($str);
		return $str;
	}
	
	public function inject_check($sql_str) {
		$str =  eregi('select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
		if($str){
			exit('提交的参数非法！');
		}
		return $sql_str;
	}
  
	public function str_check( $str ) {
		if(!get_magic_quotes_gpc()) {
			$str = addslashes($str); // 进行过滤
		}
		$str = str_replace("_", "\_", $str);
		$str = str_replace("%", "\%", $str);
		 
		return $str;
	}
	 
   
	public function post_check($post) {
		if(!get_magic_quotes_gpc()) {
			$post = addslashes($post);
		}
		$post = str_replace("_", "\_", $post);
		$post = str_replace("%", "\%", $post);
		$post = nl2br($post);
		$post = htmlspecialchars($post); 
		return $post;
	}
	
	
}