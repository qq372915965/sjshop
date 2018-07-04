<?php 
namespace Home\Controller;
use Think\Controller;
class Ajaxdata3Controller extends Controller {
	public function __construct() {
		parent::__construct ();
		$this->CheckModel = D('Check');
	}
	
	public function ajax_list_cInvName(){
		
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName')->order('sum(baojiacount) desc') ->limit(0,10)->select();
		$sql = "
		   SELECT cInvName,count(*) from 
           (select cInvName,userid from scn_ecms_inventoryexisting_xgqhbj_product group by cInvName ,userid order by cInvName ASC)
          as tabA group by cInvName ORDER by count(*) desc limit 0,11;
		";
		$data = $xinghao->query($sql);
		//echo $xinghao ->getLastSql();
		$i = 0 ;
		foreach ( $data as $key => $value ) {
		  $i++;
		  $ajax_data = $data[$key]['cinvname'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort('
		  ."'cInvName','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
		if($i>10){
			echo '<span class="dianji" id="dianji" onclick="change_div('."'con_two_1'".')">更多<img src="/skin/sjzx/img/icon2.jpg"></span>';
		}
		//var_dump($i);
		
	}
	
	
	public function ajax_list_cInvName_more(){
		
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName') ->order('sum(baojiacount) desc')->limit(10,52)->select();
		$sql = "
		   SELECT cInvName,count(*) from 
           (select cInvName,userid from scn_ecms_inventoryexisting_xgqhbj_product group by cInvName ,userid order by cInvName ASC)
          as tabA group by cInvName ORDER by count(*) desc limit 11,100;
		";
		$data = $xinghao->query($sql);
		//echo $xinghao ->getLastSql();
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['cinvname'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort('
		  ."'cInvName','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
		
	}
	
	public function ajax_list_cInvName_one(){
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName') ->order('sum(baojiacount) desc')->limit(10,52)->select();
		$sql = "
		   SELECT cInvName,count(*) from 
           (select cInvName,userid from scn_ecms_inventoryexisting_xgqhbj_product group by cInvName ,userid order by cInvName ASC)
          as tabA group by cInvName ORDER by count(*) desc limit 1;
		";
		$data = $xinghao->query($sql);
		//echo $xinghao ->getLastSql();
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['cinvname'];
		  echo $ajax_data;
		}
		
	}
	
	
		
	public function ajax_list_vendor(){
		$cInvName = I('post.cInvName');
		
		$cInvName = $this->CheckModel->CheckStr($cInvName);
        $xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
        if($cInvName=="全部"){
           $where['cInvName'] ="POM";
        }else{
           $where['cInvName'] =$cInvName;
        }
		$data = $xinghao->field('cInvName','vendor') ->where($where)-> group('vendor')->order('sum(baojiacount) desc') ->limit(0,11)->select();
		$i = 0;
		foreach ( $data as $key => $value ) {
	    $i++;
		$ajax_data = $data[$key]['vendor'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort1('
		  ."'{$cInvName}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
	    if($i>10){
		echo '<span class="dianji" id="dianji3" onclick="change_div('."'con_two_3'".')">更多<img src="/skin/sjzx/img/icon2.jpg"></span>';
	    }
		
	}
	
	public function ajax_list_vendor_more(){
		$cInvName = I('post.cInvName');
		
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['cInvName'] =$cInvName ;
		$data = $xinghao->field('cInvName','vendor') ->where($where)-> group('vendor')->order('sum(baojiacount) desc') ->limit(11,26)->select();
		//echo $xinghao ->getLastSql();
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['vendor'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort1('
		  ."'{$cInvName}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
		
	}
	
	
	public function ajax_list_vendor_one(){
		$cInvName = I('post.cInvName');
		
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['cInvName'] =$cInvName ;
		$data = $xinghao->field('cInvName','vendor') ->where($where)-> group('vendor')->order('sum(baojiacount) desc') ->limit(0,1)->select();
		//echo $xinghao ->getLastSql();
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['vendor'];
		  //echo ($ajax_data);
		  echo $ajax_data;
		}
		
	}
	
	
	public function ajax_list_cInvStd(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['vendor'] =$vendor ;
		$where['cInvName'] =$cInvName ;
		$data = $xinghao->field('cInvName','vendor','cInvStd') ->where($where)-> group('cInvStd')->order('sum(baojiacount) desc') ->limit(0,11)->select();
		//var_dump( $xinghao ->getLastSql());
		$i = 0 ;
		foreach ( $data as $key => $value ) {
			$i++;
		  $ajax_data = $data[$key]['cinvstd'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort2('
		  ."'{$cInvName}','{$vendor}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
		
		if($i > 10){
			echo '<span class="dianji" id="dianji2" onclick="change_div('."'con_two_2'".')">更多<img src="/skin/sjzx/img/icon2.jpg"></span>';
		}
		//var_dump($i);
	}
	
	public function ajax_list_cInvStd_more(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['vendor'] =$vendor ;
		$where['cInvName'] =$cInvName ;
		$data = $xinghao->field('cInvName','vendor','cInvStd') ->where($where)-> group('cInvStd')->order('sum(baojiacount) desc') ->limit(11,100)->select();
		//echo $xinghao ->getLastSql();
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['cinvstd'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort2('
		  ."'{$cInvName}','{$vendor}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
		
	}
	
	
	
	public function ajax_list_cInvStd_one(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['vendor'] =$vendor ;
		$where['cInvName'] =$cInvName ;
		$data = $xinghao->field('cInvName','vendor','cInvStd') ->where($where)-> group('cInvStd')->order('sum(baojiacount) desc') ->limit(0,1)->select();
		//echo $xinghao ->getLastSql();
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['cinvstd'];
		  //echo ($ajax_data);
		  echo $ajax_data;
		}
		
	}
	
	
	public function ajax_list_address(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvStd = I('post.cinvstd');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$cInvStd = $this->CheckModel->CheckStr($cInvStd);
        //var_dump($cinvstd);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['vendor'] =$vendor ;
		$where['cInvName'] =$cInvName ;
		$where['cInvStd'] = $cinvstd;
		$data = $xinghao->field('cInvName','vendor','cInvStd','address') ->where($where)-> group('address')->order('sum(baojiacount) desc') ->limit(0,11)->select();
		//var_dump( $xinghao ->getLastSql());
		$i = 0;
		foreach ( $data as $key => $value ) {
			$i++;
		  $ajax_data = $data[$key]['address'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort3('
		  ."'{$cInvName}','{$vendor}','{$cinvstd}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
		
		if($i>10){
			echo '<span class="dianji" id="dianji4" onclick="change_div('."'con_two_4'".')">更多<img src="/skin/sjzx/img/icon2.jpg"></span> ';
		}
		
	}
	
	
	public function ajax_list_address_more(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvStd = I('post.cinvstd');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$cInvStd = $this->CheckModel->CheckStr($cInvStd);
        //var_dump($cinvstd);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['vendor'] =$vendor ;
		$where['cInvName'] =$cInvName ;
		$where['cInvStd'] = $cinvstd;
		$data = $xinghao->field('cInvName','vendor','cInvStd','address') ->where($where)-> group('address') ->order('sum(baojiacount) desc')->limit(11,100)->select();
		//var_dump( $xinghao ->getLastSql());
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['address'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort3('
		  ."'{$cInvName}','{$vendor}','{$cinvstd}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
		}
		
	}
	
	
	public function ajax_list_address_one(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvStd = I('post.cinvstd');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$cInvStd = $this->CheckModel->CheckStr($cInvStd);
        //var_dump($cinvstd);
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$where['vendor'] =$vendor ;
		$where['cInvName'] =$cInvName ;
		$where['cInvStd'] = $cinvstd;
		$data = $xinghao->field('cInvName','vendor','cInvStd','address') ->where($where)-> group('address') ->order('sum(baojiacount) desc')->limit(0,1)->select();
		//var_dump( $xinghao ->getLastSql());
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['address'];
		  //echo ($ajax_data);
		  echo $ajax_data;
		}
		
	}
	
	
	
	public function ajax_xinghao_baojia(){
		
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_xinghao');
		$data = $xinghao->count();
		echo $data;

	}
			
	
	
}