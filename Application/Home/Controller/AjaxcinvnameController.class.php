<?php 
namespace Home\Controller;
use Think\Controller;
class AjaxcinvnameController extends Controller {
	
	//大陆现货品名
	public function ajax_dlxh_cInvName(){
		$userid = $_GET['userid'];
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName')->order('sum(baojiacount) desc') ->limit(0,10)->select();
		$sql = "
		   SELECT cInvName,count(*) from scn_ecms_inventoryexisting_dlxhbj_product
            where userid='".$userid."' and status<3  group by cInvName ORDER by count(*) desc 
		";
		$data = $xinghao->query($sql);
		$username_data='<li><label for="">品名:</label></li>
		                <li class="item active"><a href="javascript:;">全部</a></li>';
		//echo $xinghao ->getLastSql();
		$i = 0 ;
		foreach ( $data as $key => $value ) {
		  $i++;
		  $ajax_data = $data[$key]['cinvname'];
		  //echo ($ajax_data);
		  $username_data.='<li class="item"><a href="javascript:;">'.$ajax_data.'</a></li>';
		}
		echo $username_data;
		//var_dump($i);
		
	}
    
    //香港现货品名
	public function ajax_xgxh_cInvName(){
		$userid = $_GET['userid'];
		$xinghao = M('scn_ecms_inventoryexisting_xgxhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName')->order('sum(baojiacount) desc') ->limit(0,10)->select();
		$sql = "
		   SELECT cInvName,count(*) from scn_ecms_inventoryexisting_xgxhbj_product
            where userid='".$userid."' and status<3  group by cInvName ORDER by count(*) desc
		";
		$data = $xinghao->query($sql);
		$username_data='<li><label for="">品名:</label></li>
		                <li class="item active"><a href="javascript:;">全部</a></li>';
		//echo $xinghao ->getLastSql();
		$i = 0 ;
		foreach ( $data as $key => $value ) {
		  $i++;
		  $ajax_data = $data[$key]['cinvname'];
		  //echo ($ajax_data);
		  $username_data.='<li class="item"><a href="javascript:;">'.$ajax_data.'</a></li>';
		}
		echo $username_data;
		//var_dump($i);
		
	}
    

    //香港期货品名
	public function ajax_xgqh_cInvName(){
		$userid = $_GET['userid'];
		$xinghao = M('scn_ecms_inventoryexisting_xgqhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName')->order('sum(baojiacount) desc') ->limit(0,10)->select();
		$sql = "
		   SELECT cInvName,count(*) from scn_ecms_inventoryexisting_xgqhbj_product
            where userid='".$userid."' and status<3  group by cInvName ORDER by count(*) desc
		";
		$data = $xinghao->query($sql);
		$username_data='<li><label for="">品名:</label></li>
		                <li class="item active"><a href="javascript:;">全部</a></li>';
		//echo $xinghao ->getLastSql();
		$i = 0 ;
		foreach ( $data as $key => $value ) {
		  $i++;
		  $ajax_data = $data[$key]['cinvname'];
		  //echo ($ajax_data);
		  $username_data.='<li class="item"><a href="javascript:;">'.$ajax_data.'</a></li>';
		}
		echo $username_data;
		//var_dump($i);
		
	}


	//现柜货品名
	public function ajax_xgh_cInvName(){
		$userid = $_GET['userid'];
		$xinghao = M('scn_ark_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName')->order('sum(baojiacount) desc') ->limit(0,10)->select();
		$sql = "
		   SELECT cInvName,count(*) from scn_ark_product
            where userid='".$userid."' and status<3 and ark_type=1 group by cInvName ORDER by count(*) desc
		";
		$data = $xinghao->query($sql);
		$username_data='<li><label for="">品名:</label></li>
		                <li class="item active"><a href="javascript:;">全部</a></li>';
		//echo $xinghao ->getLastSql();
		$i = 0 ;
		foreach ( $data as $key => $value ) {
		  $i++;
		  $ajax_data = $data[$key]['cinvname'];
		  //echo ($ajax_data);
		  $username_data.='<li class="item"><a href="javascript:;">'.$ajax_data.'</a></li>';
		}
		echo $username_data;
		//var_dump($i);
		
	}

	//船柜货品名
	public function ajax_cgh_cInvName(){
		$userid = $_GET['userid'];
		$xinghao = M('scn_ark_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName')->order('sum(baojiacount) desc') ->limit(0,10)->select();
		$sql = "
		   SELECT cInvName,count(*) from scn_ark_product
            where userid='".$userid."' and status<3 and ark_type=2 group by cInvName ORDER by count(*) desc
		";
		$data = $xinghao->query($sql);
		$username_data='<li><label for="">品名:</label></li>
		                <li class="item active"><a href="javascript:;">全部</a></li>';
		//echo $xinghao ->getLastSql();
		$i = 0 ;
		foreach ( $data as $key => $value ) {
		  $i++;
		  $ajax_data = $data[$key]['cinvname'];
		  //echo ($ajax_data);
		  $username_data.='<li class="item"><a href="javascript:;">'.$ajax_data.'</a></li>';
		}
		echo $username_data;
		//var_dump($i);
		
	}
		
	
}