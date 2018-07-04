<?php
namespace Home\Controller;
use Think\Controller;
//new \Org\Util\Mydbda;
class BaojialistxgqhController extends Controller {
	protected $model;
	
    public function baojia_list(){
		$userid = I('post.userid');
		
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		$sql =  "
		  select * from scn_ecms_inventoryexisting_xgqhbj_product where userid = '".$userid."' and status<3 order by id desc;
		";
		$data_list = $Mybj->query($sql);
		$daytime=$data_list[0]['truetime']+7*24*3600;
	    $today=time();
        $shijian=$daytime-$today;
        if($shijian<=0){
        	$Mybj2 = M('scn_ecms_inventoryexisting_xgqhbj_product');
        	$s_data['status']=1;
            $w_data['id']=$data_list[0]['id'];
        	$result=$Mybj2->where($w_data)->save($s_data);
        }
		$this->assign('data_list',$data_list);
		$this->display('baojia_list');
		//var_dump($data_list);
	}
    
    //报价查询
	/*public function baojia_list_search(){
		$userid = I('post.userid');
		$keyword= I('post.keyword');
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		$sql =  "select * from scn_ecms_inventoryexisting_xgqhbj_product where userid = '".$userid."' and concat(cInvName,cInvStd,vendor) like '%$keyword%' order by truetime desc;";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojia_list');
		//var_dump($data_list);
	}*/

	//品名状态查询
	public function baojia_list_cinvname(){
		$userid = I('post.userid');
		$cinvname= I('post.cinvname');
		$status= I('post.status');
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		if($cinvname=="全部"){
			if($status=="上架"){
				$where=" and status=0";
			}else if($status=="已下架"){
	            $where=" and status=1";
			}else if($status=="全部"){
				$where=" and status<3";
			}
		}else{
			if($status=="上架"){
				$where=" and cinvname='".$cinvname."' and status=0";
			}else if($status=="已下架"){
	            $where=" and cinvname='".$cinvname."' and status=1";
			}else if($status=="全部"){
				$where=" and cinvname='".$cinvname."' and status<3";
			}
	    }
		//echo $where;
		//exit;
	    $sql =  "select * from scn_ecms_inventoryexisting_xgqhbj_product where userid = '".$userid."' ".$where." order by truetime desc";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojia_list');
		//var_dump($data_list);
	}

	//报价统计
	public function baojia_list_count(){
		$userid = I('post.userid');
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		$sql =  "select * from scn_ecms_inventoryexisting_xgqhbj_product where userid = '".$userid."' and status<3";
        $result=$Mybj->query($sql);
        echo $data=count($result);
	}
	public function baojia_list_count2(){
		$userid = I('post.userid');
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		$sql =  "select * from scn_ecms_inventoryexisting_xgqhbj_product where userid = '".$userid."' and status=0";
        $result=$Mybj->query($sql);
        echo $data=count($result);
	}

	
	public function baojia_list_save(){
		$status = I('get.status');
		$data = I('post.data');
		$data = stripslashes(html_entity_decode($data)); //解析传递过来的json字符串
        $data = json_decode($data,TRUE);
		/*
		$data = Array(Array('id' => 3 ,'fprice' => 3001.00 ,'valid_day' => 1 ,'fweight' => 30 ) , Array ( 'id' => 1 ,'fprice' => 3001.00 ,'valid_day' => 1 ,'fweight' => 30 ) );
		*/
		//print_r($data);
		//exit;
		foreach($data as $key => $value){
			
			//echo $value['id']."<br>";
			//echo $value['fprice']."<br>";
			//echo $value['valid_day']."<br>";
			//echo $value['fweight']."<br>";
           $baojia = $this -> baojia_user_search($value['id']);	
		   //保存USERID
		   $userid =  $baojia[0]['userid'];
		   //下架1  上架0  删除3
		   if($status == 1){
			  $baojia[0]['status'] = 1;
		   }elseif($status == 0){
			  $baojia[0]['status'] = 0;
		   }elseif($status ==3){
			  $baojia[0]['status'] = 3;
		   }
		   //var_dump($baojia[0]['status']);
           //移除ID
           unset($baojia[0]['id']);  
		   unset($baojia[0]['mian']);
           //默认配值
		   $baojia[0]['Description'] = '';
		   $baojia[0]['MobileDescription'] ='';
		   //严格大小写
		   $baojia[0]['cAddress'] = $baojia[0]['caddress'];
		   $baojia[0]['cInvStd'] = $baojia[0]['cinvstd'];
		   $baojia[0]['dValidDate'] = $baojia[0]['dvaliddate'];
		   $baojia[0]['cImgURL1'] = $baojia[0]['cimgurl1'];
		   $baojia[0]['cImgURL2'] = $baojia[0]['cimgurl2'];
		   $baojia[0]['cImgURL3'] = $baojia[0]['cimgurl3'];
		   $baojia[0]['cImgURL4'] = $baojia[0]['cimgurl4'];
		   $baojia[0]['Thecontact'] = $baojia[0]['thecontact'];
		   $baojia[0]['cPartnerCode'] = $baojia[0]['cpartnercode'];
		   $baojia[0]['Contactphone'] = $baojia[0]['contactphone'];
		   $baojia[0]['cInvName'] = $baojia[0]['cinvname'];
		   $baojia[0]['companyReferred'] = $baojia[0]['companyreferred'];

		   //修改数据
		   $baojia[0]['dValidDate']	=  $value['dvaliddate'];	
           $baojia[0]['fPrice']	=  $value['fprice'];	 
           $baojia[0]['fWeight']	=  $value['fweight'];
           $baojia[0]['valid_day']	=  $value['valid_day'];
           $baojia[0]['truetime']  = time();	
           $dataList[] = $$baojia[0];
           //print_r($baojia[0]);
           $this ->baojia_save_add($baojia[0]);	
		}
		//$this->baojia_save_add($dataList);
		
		//重新加载视图
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		$sql =  "
		  select * from scn_ecms_inventoryexisting_xgqhbj_product where userid = '".$userid."' and status<3 order by id desc;
		";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojia_list');
		
	}
	
	//传Id查询报价
	public function baojia_user_search($id){
		//$id = I('get.id');
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		$sql = "
		  select * from scn_ecms_inventoryexisting_xgqhbj_product where id = ".$id.";
		";
        $data_list = $Mybj->query($sql);
		return $data_list;
        //var_dump($data_list);		
	}
	
	//插入单条数据
	public function baojia_save_add($data){
		/**
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql = "
		  select * from scn_ecms_inventoryexisting_dlxhbj_product where id = 3;
		";
        $baojia = $Mybj->query($sql);	
           //移除ID
           unset($baojia[0]['id']);  
		   unset($baojia[0]['mian']);
           //默认配值
		   $baojia[0]['Description'] = '';
		   $baojia[0]['MobileDescription'] ='';
		   
           $data =  $baojia[0];
		 ***/
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_cache');
	    $Mybj ->add($data);
		//$Mybj->addAll($data);
		
		$Mybj = M('scn_ecms_inventoryexisting_xgqhbj_product');
		
		$Mybj->add($data,array(),true);
		//$Mybj->addAll($data,array(),true);
		//var_dump( $Mybj ->getLastSql());
	}
	
}