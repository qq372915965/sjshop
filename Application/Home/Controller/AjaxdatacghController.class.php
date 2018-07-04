<?php 
namespace Home\Controller;
use Think\Controller;
class AjaxdatacghController extends Controller {
	public function __construct() {
		parent::__construct ();
		$this->CheckModel = D('Check');
	}
	public function ajax_list_cInvName(){
		
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName')->order('sum(baojiacount) desc') ->limit(0,10)->select();
		$sql = "
		   SELECT cInvName,count(*) from 
           (select cInvName,userid from scn_ecms_inventoryexisting_dlxhbj_product group by cInvName ,userid order by cInvName ASC)
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
		
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName') ->order('sum(baojiacount) desc')->limit(10,52)->select();
		$sql = "
		   SELECT cInvName,count(*) from 
           (select cInvName,userid from scn_ecms_inventoryexisting_dlxhbj_product group by cInvName ,userid order by cInvName ASC)
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_product');
		//$data = $xinghao->field('cInvName') -> group('cInvName') ->order('sum(baojiacount) desc')->limit(10,52)->select();
		$sql = "
		   SELECT cInvName,count(*) from 
           (select cInvName,userid from scn_ecms_inventoryexisting_dlxhbj_product group by cInvName ,userid order by cInvName ASC)
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
        $xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
        if($cInvName=="全部"){
           $where['cInvName'] ="POM";
        }else{
           $where['cInvName'] =$cInvName;
        }
		
		//$data = $xinghao->field('cInvName','vendor') ->where($where)-> group('vendor')->order('sum(baojiacount) desc') ->limit(0,11)->select();
		$sql = "
		   SELECT cInvName,vendor,count(*) from 
           (select cInvName,vendor,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."'
		   group by cInvName,vendor ,userid order by cInvName ASC)
          as tabA group by cInvName,vendor ORDER by count(*) desc limit 11;
		";
		$data = $xinghao->query($sql);
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		$where['cInvName'] =$cInvName ;
		//$data = $xinghao->field('cInvName','vendor') ->where($where)-> group('vendor')->order('sum(baojiacount) desc') ->limit(11,26)->select();
		//echo $xinghao ->getLastSql();
		$sql = "
		   SELECT cInvName,vendor,count(*) from 
           (select cInvName,vendor,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."'
		   group by cInvName,vendor ,userid order by cInvName ASC)
          as tabA group by cInvName,vendor ORDER by count(*) desc limit 11,300;
		";
		$data = $xinghao->query($sql);
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		//$where['cInvName'] =$cInvName ;
		//$data = $xinghao->field('cInvName','vendor') ->where($where)-> group('vendor')->order('sum(baojiacount) desc') ->limit(0,1)->select();
		//echo $xinghao ->getLastSql();
		$sql = "
		   SELECT cInvName,vendor,count(*) from 
           (select cInvName,vendor,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."'
		   group by cInvName,vendor ,userid order by cInvName ASC)
          as tabA group by cInvName,vendor ORDER by count(*) desc limit 1;
		";
		$data = $xinghao->query($sql);
		
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		//$where['vendor'] =$vendor ;
		//$where['cInvName'] =$cInvName ;
		//$data = $xinghao->field('cInvName','vendor','cInvStd') ->where($where)-> group('cInvStd')->order('sum(baojiacount) desc') ->limit(0,11)->select();
		//var_dump( $xinghao ->getLastSql());
		$sql = "
		   SELECT cInvName,vendor,cInvStd,count(*) from 
           (select cInvName,vendor,cInvStd,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."' and vendor = '".$vendor."'
		   group by cInvName,vendor,cInvStd,userid order by cInvName ASC)
          as tabA group by cInvName,vendor,cInvStd ORDER by count(*) desc limit 11;
		";
		$data = $xinghao->query($sql);
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		//$where['vendor'] =$vendor ;
		//$where['cInvName'] =$cInvName ;
		//$data = $xinghao->field('cInvName','vendor','cInvStd') ->where($where)-> group('cInvStd')->order('sum(baojiacount) desc') ->limit(11,100)->select();
		//echo $xinghao ->getLastSql();
		$sql = "
		   SELECT cInvName,vendor,cInvStd,count(*) from 
           (select cInvName,vendor,cInvStd,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."' and vendor = '".$vendor."'
		   group by cInvName,vendor,cInvStd,userid order by cInvName ASC)
          as tabA group by cInvName,vendor,cInvStd ORDER by count(*) desc limit 11,300;
		";
		$data = $xinghao->query($sql);
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		//$where['vendor'] =$vendor ;
		//$where['cInvName'] =$cInvName ;
		//$data = $xinghao->field('cInvName','vendor','cInvStd') ->where($where)-> group('cInvStd')->order('sum(baojiacount) desc') ->limit(0,1)->select();
		//echo $xinghao ->getLastSql();
		$sql = "
		   SELECT cInvName,vendor,cInvStd,count(*) from 
           (select cInvName,vendor,cInvStd,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."' and vendor = '".$vendor."'
		   group by cInvName,vendor,cInvStd,userid order by cInvName ASC)
          as tabA group by cInvName,vendor,cInvStd ORDER by count(*) desc limit 1;
		";
		$data = $xinghao->query($sql);
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		//$where['vendor'] =$vendor ;
		//$where['cInvName'] =$cInvName ;
		//$where['cInvStd'] = $cinvstd;
		//$data = $xinghao->field('cInvName','vendor','cInvStd','address') ->where($where)-> group('address')->order('sum(baojiacount) desc') ->limit(0,11)->select();
		$sql = "
		   SELECT cInvName,vendor,cInvStd,address,count(*) from 
           (select cInvName,vendor,cInvStd,address,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."' and vendor = '".$vendor."' and cInvStd = '".$cInvStd."'
		   group by cInvName,vendor,cInvStd,address,userid order by cInvName ASC)
          as tabA group by cInvName,vendor,cInvStd,address ORDER by count(*) desc limit 11;
		";
		$data = $xinghao->query($sql);
		//var_dump( $xinghao ->getLastSql());
		$i = 0;
		foreach ( $data as $key => $value ) {
			$i++;
		  $ajax_data = $data[$key]['address'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort3('
		  ."'{$cInvName}','{$vendor}','{$cInvStd}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		//$where['vendor'] =$vendor ;
		//$where['cInvName'] =$cInvName ;
		//$where['cInvStd'] = $cinvstd;
		//$data = $xinghao->field('cInvName','vendor','cInvStd','address') ->where($where)-> group('address') ->order('sum(baojiacount) desc')->limit(11,100)->select();
		//var_dump( $xinghao ->getLastSql());
		$sql = "SELECT cInvName,vendor,cInvStd,address,count(*) from 
           (select cInvName,vendor,cInvStd,address,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."' and vendor = '".$vendor."' and cInvStd = '".$cInvStd."'
		   group by cInvName,vendor,cInvStd,address,userid order by cInvName ASC)
          as tabA group by cInvName,vendor,cInvStd,address ORDER by count(*) desc  limit 11,300;
		";
		$data = $xinghao->query($sql);
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['address'];
		  //echo ($ajax_data);
		  echo 
		  '<div class="list_sty"><a href="javascript:goSort3('
		  ."'{$cInvName}','{$vendor}','{$cInvStd}','".$ajax_data."');".'"><span class="'.'screen"'.'>'.$ajax_data."<i>&nbsp;</i></span></a></div>";
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
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		//$where['vendor'] =$vendor ;
		//$where['cInvName'] =$cInvName ;
		//$where['cInvStd'] = $cinvstd;
		//$data = $xinghao->field('cInvName','vendor','cInvStd','address') ->where($where)-> group('address') ->order('sum(baojiacount) desc')->limit(0,1)->select();
		$sql = "
		   		   SELECT cInvName,vendor,cInvStd,address,count(*) from 
           (select cInvName,vendor,cInvStd,address,userid from scn_ecms_inventoryexisting_dlxhbj_product 
		   where cInvName = '".$cInvName."' and vendor = '".$vendor."' and cInvStd = '".$cInvStd."'
		   group by cInvName,vendor,cInvStd,address,userid order by cInvName ASC)
          as tabA group by cInvName,vendor,cInvStd,address ORDER by count(*) desc limit 1;
		";
		$data = $xinghao->query($sql);
		//var_dump( $xinghao ->getLastSql());
		foreach ( $data as $key => $value ) {
		  $ajax_data = $data[$key]['address'];
		  //echo ($ajax_data);
		  echo $ajax_data;
		}
		
	}
	
	
	
	/*public function ajax_xinghao_baojia(){
		
		$xinghao = M('scn_ecms_inventoryexisting_dlxhbj_xinghao');
		$data = $xinghao->count();
		echo $data;

	}*/
	
	

	
	//船柜货
	public function ajax_saerch_baojia_count(){
		
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cinvstd = I('post.cinvstd');
        $address = I('post.address');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$cInvStd = $this->CheckModel->CheckStr($cInvStd);
		$address = $this->CheckModel->CheckStr($cInvStd);
		$xinghao = M('scn_ark_product');
		//var_dump($cInvName);
        /*$where['second']=0;
		$where['userfen']=1;
		$where['status']=0;
		$where['baojia']=1;
		$where['validity']=0;*/
		$where="ark_type=2 and second=0 and status=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600";
		if(($cInvName)&&($cInvName != '全部')){
			$where.=" and cInvName='".$cInvName."'";
			if($vendor){
				$where.= " and vendor='".$vendor."'";
			}
			if($cinvstd){
				$where.= " and cinvstd='".$cinvstd."'";	
			}
			if($address){
				$where.=" and address='".$address."'";
			}
						
			echo $data = $xinghao->where($where)->count();
			
		}else{
			echo $data = $xinghao->where($where)->count();
		}
        //var_dump( $xinghao ->getLastSql());
		//exit;
		
	}
	
	

	
	public function ajax_saerch_baojia(){

		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cinvstd = I('post.cinvstd');
        $address = I('post.address');
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$vendor = $this->CheckModel->CheckStr($vendor);
		$cInvStd = $this->CheckModel->CheckStr($cInvStd);
		$address = $this->CheckModel->CheckStr($cInvStd);
		$xinghao = M('scn_ark_product');
		//var_dump(time());
		if(($cInvName)&&($cInvName != '全部')){
			$where ="cInvName='".$cInvName."'";
			if($vendor){
				$where.= " and vendor='".$vendor."'";
			}
			if($cinvstd){
				$where.= " and cInvStd='".$cinvstd."'";	
			}
			if($address){
				$where.=" and address='".$address."'";
			}
			
			$sql="SELECT id, companyreferred,thecontact,companyname, contactphone,cinvname,cinvstd,
					vendor,companyhome,address,truetime,baojiacount,userid,companyconcept,
					COUNT(*) AS prconut, fprice 
					FROM (SELECT id, companyreferred,thecontact,companyname, contactphone,cinvname,cinvstd,
					vendor,companyhome,address,truetime,baojiacount,userid,companyconcept,ark_type,
					STATUS,fprice 
					FROM scn_ark_product where ".$where." 
					and ark_type=2 and second=0 AND STATUS=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 
					ORDER BY fprice ASC )
					 AS tabA  
					GROUP BY cinvname,cinvstd,vendor,address ORDER BY prconut DESC limit 0,200";
            $data=$xinghao->query($sql);
			//$data = $xinghao->where($where)->group('cInvName,vendor,cInvStd,address')->limit(0,200)->select();
			
		}else{
			$sql="SELECT id, companyreferred,thecontact,companyname, contactphone,cinvname,cinvstd,
					vendor,companyhome,address,truetime,baojiacount,userid,companyconcept,
					COUNT(*) AS prconut , fprice 
					FROM (SELECT id, companyreferred,thecontact,companyname, contactphone,cinvname,cinvstd,
					vendor,companyhome,address,truetime,baojiacount,userid,companyconcept,ark_type
					,STATUS,fprice 
					FROM scn_ark_product WHERE ark_type=2 and second=0 AND STATUS=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 ORDER BY fprice ASC )
					 AS tabA  
					GROUP BY cinvname,cinvstd,vendor,address ORDER BY prconut DESC limit 0,200";
            $data=$xinghao->query($sql);
			//$data = $xinghao->where($where)->group('cInvName,vendor,cInvStd,address')->limit(0,200)->select();
		}
        //echo $data;
		//var_dump( $xinghao ->getLastSql());
		//exit;
		
		foreach ( $data as $key => $value ) {  
				$shijian = $data[$key]['truetime'] ; 
				$a=date("Y-m-d H:i:s",time()); 
				$d=date('Y-m-d H:i:s', $shijian);
				$minute=floor((strtotime($a)-strtotime($d))/60);
				if($minute<1){
					  $shijian = "刚刚";
				 }
				 if($minute<60&&$minute>=1){
					  $shijian = $minute."分钟前";
				  }
				 if($minute<1440&&$minute>60){
					  $aa= floor($minute/60);
					  $shijian=  intval($aa)."小时前";
				  }
				  if($minute>1440){
					  $bb= floor($minute/60/24);
					  $shijian =  intval($bb)."天前";
				  }                                        

			$data[$key]['truetime'] = $shijian;
			
				
			
		  } 
		
		
		/*
		var_dump(time());
		$v ='';
		foreach($data as $key => $value){			
		$companyReferred = 	$data[$key]['companyreferred'];
        $Thecontact = 	$data[$key]['thecontact'];
		$companyname = 	$data[$key]['companyname'];
		$Contactphone = $data[$key]['contactphone'];
		$cInvName = 	$data[$key]['cinvname'];
		$cInvStd = 	$data[$key]['cinvstd'];
		$vendor = 	$data[$key]['vendor'];
		$fPrice = 	$data[$key]['fprice'];
		$companyhome = 	$data[$key]['companyhome'];
		$address = 	$data[$key]['address'];
		$shijian = 	$data[$key]['truetime'];
		//$baojiacount = $data[$key]['baojiacount'];
		$baojiacount = $data[$key]['num'];
		$userid= $data[$key]['userid'];
		$companyconcept=$data[$key]['companyconcept'];
		$id = $data[$key]['id'];
		//$shijian = $data[$key]['truetime'] ; 
				$a=date("Y-m-d H:i:s",time()); 
				$d=date('Y-m-d H:i:s', $shijian);
				$minute=floor((strtotime($a)-strtotime($d))/60);
				if($minute<1){
					  $shijian = "刚刚";
				 }
				 if($minute<60&&$minute>=1){
					  $shijian = $minute."分钟前";
				  }
				 if($minute<1440&&$minute>60){
					  $aa= floor($minute/60);
					  $shijian=  intval($aa)."小时前";
				  }
				  if($minute>1440){
					  $bb= floor($minute/60/24);
					  $shijian =  intval($bb)."天前";
				  }                                         

			
			
			
			     
					$v .= '
		            <tr class="dropdown-p" >
                    <td>'.$cInvName.'</td>
                    <td>'.$cInvStd.'</td>
                    <td>'.$vendor.'</td>
                    <td style="color:#ff3300;font-weight:bold;">'.$fPrice.'</td>
                    <td>'.$address.'</td>
                    <td>'.$shijian.'</td>
                    <td>
                    <span class="carte" id="ct_u4"><a data-rel="'.$id.'" style="display:block; z-index:0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; height: 40px;line-height: 40px;">'.$companyReferred.'</a>
       
                    <div class="supplier_tan"  id="thelayer'.$id.'" style="display: none; right: 295px; z-index: 9; margin-top: -140px;"">
					
                    <h2>'.$Thecontact.'('.$companyname.')</h2>
                    <p class="business_p">
                        <span class="gray">平台总成交量：</span>
                        <span class="black">0.0吨</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">最近一次成交：</span>
                        <span class="black">暂无成交记录</span>
                    </p>
                    <p class="business_p">
                    </p>
                    <div class="clear"></div>
                    <p class="business_p">
                        <span class="gray">联系人：</span>
                        <span class="black">'.$Thecontact.'</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">联系方式：</span>
                        <span class="black">'.$Contactphone.'</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">地址：</span>
                        <span class="black">'.$companyhome.'</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">企业经营理念：</span>
                        <span class="black">'.$companyconcept.'</span>
                    </p>
                    <div class="business_logo">
                        <p>
                            <img src="/skin/sjzx/img/yuan.png" width="100" height="100">
                            
                        </p>
                        <p>
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                        </p>
                    </div>
                    <p class="business_p">
                        <a href="/e/space/?userid='.$userid.'" class="business_a">进入店铺</a>
                    </p>
                    </div>
                    <div class="clear"></div>
                    </span> 
                    </td>
                    <td>
                       <a href="/e/action/gongying_zx.php?cInvName='.$cInvName.'&vendor='.$vendor.'&cInvStd='.$cInvStd.'&address='.$address.'&paixu=truetime" class="xd2">'.$baojiacount.'</a>
                   </td>
                   </tr>
					';	
           					
		}
		//echo $v;
		
		**/
		//$this->assign('data', $data);
		//$this->display();
		$data = json_encode($data);
		echo $data;
		//var_dump(time());
		
	}
	
	
	
	//查询城市报价
	
	public function ajax_saerch_baojia_city(){


		$city = I('post.city');
		$city = $this->CheckModel->CheckStr($city);
		$xinghao = M('scn_ark_product');
		if($city){
			 $where = "( province = '".$city."' or address = '".$city."' or district = '".$city."' )";
		}else{
			 $where = '';
		}
			
			$sql="SELECT id, companyreferred,thecontact,companyname, contactphone,cinvname,cinvstd,
					vendor,companyhome,address,truetime,baojiacount,userid,companyconcept,
					COUNT(*) AS prconut, fprice 
					FROM (SELECT id, companyreferred,thecontact,companyname, contactphone,cinvname,cinvstd,
					vendor,companyhome,address,truetime,baojiacount,userid,companyconcept,ark_type
					,STATUS,fprice 
					FROM scn_ecms_inventoryexisting_dlxhbj_product where ".$where." 
					and ark_type=2 and second=0 AND STATUS=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 
					ORDER BY fprice ASC )
					 AS tabA  
					GROUP BY cinvname,cinvstd,vendor,address ORDER BY prconut DESC limit 0,200";
            $data=$xinghao->query($sql);		

  
		foreach ( $data as $key => $value ) {  
				$shijian = $data[$key]['truetime'] ; 
				$a=date("Y-m-d H:i:s",time()); 
				$d=date('Y-m-d H:i:s', $shijian);
				$minute=floor((strtotime($a)-strtotime($d))/60);
				if($minute<1){
					  $shijian = "刚刚";
				 }
				 if($minute<60&&$minute>=1){
					  $shijian = $minute."分钟前";
				  }
				 if($minute<1440&&$minute>60){
					  $aa= floor($minute/60);
					  $shijian=  intval($aa)."小时前";
				  }
				  if($minute>1440){
					  $bb= floor($minute/60/24);
					  $shijian =  intval($bb)."天前";
				  }                                        

			$data[$key]['truetime'] = $shijian;
			
				
			
		  } 		
	
		$data = json_encode($data);
		echo $data;
	
	
	}
	
	
	
	public function ajax_test(){
		$product = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$data = $product->limit(0,200)->select();
		//var_dump( $xinghao ->getLastSql());
		
		$datavalue = 0;
		
		foreach($data as $key => $value){			
		$companyReferred = 	$data[$key]['companyreferred'];
        $Thecontact = 	$data[$key]['thecontact'];
		$companyname = 	$data[$key]['companyname'];
		$Contactphone = 	$data[$key]['contactphone'];
		$cInvName = 	$data[$key]['cinvname'];
		$cInvStd = 	$data[$key]['cinvstd'];
		$vendor = 	$data[$key]['vendor'];
		$fPrice = 	$data[$key]['fprice'];
		$companyhome = 	$data[$key]['companyhome'];
		$address = 	$data[$key]['address'];
		$shijian = 	$data[$key]['truetime'];
		$baojiacount = $data[$key]['baojiacount'];
		$id = $data[$key]['id'];
		//$shijian = $data[$key]['truetime'] ; 
				$a=date("Y-m-d H:i:s",time()); 
				$d=date('Y-m-d H:i:s', $shijian);
				$minute=floor((strtotime($a)-strtotime($d))/60);
				if($minute<1){
					  $shijian = "刚刚";
				 }
				 if($minute<60&&$minute>=1){
					  $shijian = $minute."分钟前";
				  }
				 if($minute<1440&&$minute>60){
					  $aa= floor($minute/60);
					  $shijian=  intval($aa)."小时前";
				  }
				  if($minute>1440){
					  $bb= floor($minute/60/24);
					  $shijian =  intval($bb)."天前";
				  }                                         

			
		$datavalue ++;	
			
			
					echo '
		           
            <tr class="dropdown-p" style="position: relative !important;">
        <td><span class="carte" id="ct_u4"><a data-rel="id" style="display:block; z-index:0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; height: 40px;line-height: 40px;">'.$companyReferred.'</a>
       
        <div class="supplier_tan"  id="thelayerid" style="display: none;">
        <h2>'.$Thecontact.'('.$companyname.')'.'</h2>
        <p class="business_p">
            <span class="gray">平台总成交量：</span>
            <span class="black">0.0吨</span>
        </p>
        <p class="business_p">
            <span class="gray">最近一次成交：</span>
            <span class="black">暂无成交记录</span>
        </p>
        <p class="business_p">
        </p>
        <div class="clear"></div>
        <p class="business_p">
            <span class="gray">联系人：</span>
            <span class="black">'.$Thecontact.'</span>
        </p>
        <p class="business_p">
            <span class="gray">联系方式：</span>
            <span class="black">'.$Contactphone.'</span>
        </p>
        <p class="business_p">
            <span class="gray">地址：</span>
            <span class="black">'.$companyhome.'</span>
        </p>

        <p class="business_p">
            <span class="gray">企业经营理念：</span>
            <span class="black">'.$companyconcept.'</span>
        </p>
        <div class="business_logo">
            <p>
                <img src="/skin/sjzx/img/yuan.png" width="100" height="100">
                
            </p>
            <p>
                <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                <img src="/skin/sjzx/img/xing.png" width="14" height="14">
            </p>
        </div>
        <p class="business_p">
            <a href="/e/space/" class="business_a">进入店铺</a>
        </p>
    </div>
               <div class="clear"></div>
        </span>
       </td>
        <td>Thecontact</td>
        <td>Contactphone</td>
        <td style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Themainvarieties</td>
        <td>shijian</td>
        <td>
              <span>NUM</span>
        </td>

        <td  class="dropdown-btn-show">
              <input type="button" id="" value="展开" data-value="'.$datavalue.'" class="dropdown-btn" />
              <!--展开内容-->
              <div class="table-dropdowm  hide2" style="display: none;">
			     
                 <table class="table">
                     <thead class="table-dropdowm-ttl">
                        <th width="268px">companyReferred</th>
                        <th width="100px">Thecontact</th>
                        <th width="199px">Contactphone</th>
                        <th width="128px">Themainvarieties</th>
                        <th width="128px">shijian</th>
                        <th width="129px">
                            <span>NUM</span>
                        </th>
                        <th width="134px">
                            <a href="#" class="xd2">收回</a>
                        </th>
                     </thead>
                               </table>
                               <table>
                     <tbody>
                    
					
                        <tr>
                            <td width="110"><a href="../../action/Show.php" onclick="visitor_click(this)" class="visitor">cInvName</a></td>
                            <td width="130">cInvStd</td>
                            <td width="160">vendor</td>
                            <td width="120" style="color:#ff3300;font-weight:bold;">￥fPrice</td>
                            <td width="100">fWeight</td>
                                                        <td width="70">delivery</td>
                                                        <td width="140">address</td>
                                                        <td width="70">现货</td>
                                                        <td width="70">piaoju</td>
                                                        <td width="100">shijian</td>
                            <td width="130">
                                <a href="/e/member/chat/Index/add_order.php" class="xd">立即洽谈</a>
                            </td>
                        </tr>
						
					     <tr>
                            <td width="110"><a href="../../action/Show.php" onclick="visitor_click(this)" class="visitor">cInvName</a></td>
                            <td width="130">cInvStd</td>
                            <td width="160">vendor</td>
                            <td width="120" style="color:#ff3300;font-weight:bold;">￥fPrice</td>
                            <td width="100">fWeight</td>
                                                        <td width="70">delivery</td>
                                                        <td width="140">address</td>
                                                        <td width="70">现货</td>
                                                        <td width="70">piaoju</td>
                                                        <td width="100">shijian</td>
                            <td width="130">
                                <a href="/e/member/chat/Index/add_order.php" class="xd">立即洽谈</a>
                            </td>
                         </tr>
						 
						 					     <tr>
                            <td width="110"><a href="../../action/Show.php" onclick="visitor_click(this)" class="visitor">cInvName</a></td>
                            <td width="130">cInvStd</td>
                            <td width="160">vendor</td>
                            <td width="120" style="color:#ff3300;font-weight:bold;">￥fPrice</td>
                            <td width="100">fWeight</td>
                                                        <td width="70">delivery</td>
                                                        <td width="140">address</td>
                                                        <td width="70">现货</td>
                                                        <td width="70">piaoju</td>
                                                        <td width="100">shijian</td>
                            <td width="130">
                                <a href="/e/member/chat/Index/add_order.php" class="xd">立即洽谈</a>
                            </td>
                         </tr>
						 
						 
						 					     <tr>
                            <td width="110"><a href="../../action/Show.php" onclick="visitor_click(this)" class="visitor">cInvName</a></td>
                            <td width="130">cInvStd</td>
                            <td width="160">vendor</td>
                            <td width="120" style="color:#ff3300;font-weight:bold;">￥fPrice</td>
                            <td width="100">fWeight</td>
                                                        <td width="70">delivery</td>
                                                        <td width="140">address</td>
                                                        <td width="70">现货</td>
                                                        <td width="70">piaoju</td>
                                                        <td width="100">shijian</td>
                            <td width="130">
                                <a href="/e/member/chat/Index/add_order.php" class="xd">立即洽谈</a>
                            </td>
                         </tr>
						
					
                      
                    </tbody>
                 </table>
				 
                 <div style="padding-bottom: 10px; margin-top:10px;">
                    <a href="../../action/gongying_bj.php?companyname=companyname&paixu=id desc" class="table-dropdowm-gd">查看更多</a>
                 </div>
             </div>
        </td>
       </tr>
					';
			

			
			
		}
		
		
			

		


	}
	
	
	
	
	//统计消息
	public function ajax_thecompany_mun(){
		$M = M('scn_ecms_thecompany');
		$time = time();
		$date2=date("Y-m-d",$time);
		$date3=strtotime($date2);
		$date4=$date3+3600*24;

		$sql = "
			select count(*) as num FROM scn_ecms_thecompany where yylicense!='' and audit=0  or uscard!='' and audit=0 order by cTime desc;
			";
		
		$data = $M->query($sql);
		//var_dump($data);
		echo $data[0]['num'];
		
	}
	
	
}