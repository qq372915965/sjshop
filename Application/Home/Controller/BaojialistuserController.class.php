<?php
namespace Home\Controller;
use Think\Controller;
//new \Org\Util\Mydbda;
class BaojialistuserController extends Controller {
	protected $model;
	
    public function baojia_list(){
		$userid = I('post.userid');
		
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "
		   select * from 
		  (select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = '".$userid."' and status = 0 order by cInvName asc) as tabA
		  union 
		  select * from 
		  (select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = '".$userid."' and status = 1 order by cInvName asc) as tabB
		  ;
		";
		$data_list = $Mybj->query($sql);
		$daytime=$data_list[0]['truetime']+$data_list[0]['valid_day']*24*3600;
	    $today=time();
        $shijian=$daytime-$today;
        if($shijian<=0){
        	$Mybj2 = M('scn_ecms_inventoryexisting_dlxhbj_product');
        	$s_data['status']=1;
        	$s_data['valid_day']=0;
            $w_data['id']=$data_list[0]['id'];
        	$result=$Mybj2->where($w_data)->save($s_data);
        }
        $this->assign('data_list',$data_list);
		$this->display('baojia_list');
		//var_dump($data_list);
	}
    
    //报价查询
	public function baojia_list_search(){
		$userid = I('post.userid');
		$keyword= I('post.keyword');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = '".$userid."' and concat(cInvName,cInvStd,vendor) like '%$keyword%' order by truetime desc;";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojia_list');
		//var_dump($data_list);
	}

	//品名状态查询
	public function baojia_list_cinvname(){
		$userid = I('post.userid');
		$cinvname= I('post.cinvname');
		$status= I('post.status');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
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
	    $sql =  "select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = '".$userid."' ".$where." order by truetime desc";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojia_list');
		//var_dump($data_list);
	}

	//报价统计
	public function baojia_list_count(){
		$userid = I('post.userid');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = '".$userid."' and status<3";
        $result=$Mybj->query($sql);
        echo $data=count($result);
	}
	public function baojia_list_count2(){
		$userid = I('post.userid');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = '".$userid."' and status=0";
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
		foreach($data as $key => $value){
			
			//echo $value['id']."<br>";
			//echo $value['fprice']."<br>";
			//echo $value['valid_day']."<br>";
			//echo $value['fweight']."<br>";
           $baojia = $this -> baojia_user_search($value['id']);	
		   //保存USERID
		   $userid =  $baojia[0]['userid'];
		   //下架1  上架0  删除3
		   //var_dump($status);
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
           $baojia[0]['fPrice']	=  $value['fprice'];	 
           $baojia[0]['valid_day']	=  $value['valid_day'];	
           $baojia[0]['fWeight']	=  $value['fweight'];
		   $baojia[0]['Thecontact']	=  $value['thecontact'];
           $baojia[0]['truetime']  = time();
           $dataList[] = $baojia[0];
           $this ->baojia_save_add($baojia[0]);	
   		   //var_dump($baojia[0]);
		}
		//$this->baojia_save_add($dataList);
		
		//重新加载视图
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "
		  select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = '".$userid."' and status<3 order by id desc;
		";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojia_list');
		
	}
	
	
	//现货定时保存
	public function baojia_list_save_ds(){		
		$data = I('post.data');
		$data = stripslashes(html_entity_decode($data)); //解析传递过来的json字符串
        $data = json_decode($data,TRUE);
		
		$Myds = M('scn_ecms_inventoryexisting_dlxhbj_ds');
		
		$where['userid'] = $data[0]['userid'];
		$listdata = $Myds->where($where)->count();
		$datacount = count($data);		

		
        if(($listdata+$datacount)>50){
			echo 0;
			exit();
		}else{
			foreach($data as $key => $value){
			    $baojia = $this -> baojia_user_search($value['id']);
			    $userdata['userid'] =  $baojia[0]['userid'];						
				$userdata['cinvname'] = $baojia[0]['cinvname'];
				$userdata['vendor'] =  $baojia[0]['vendor'];
				$userdata['cinvstd'] =  $baojia[0]['cinvstd'];
				$userdata['province'] =  $baojia[0]['province'];
				$userdata['address'] =  $baojia[0]['address'];
				$userdata['district'] =  $baojia[0]['district'];
				$userdata['lasttime'] =  time();			
				$Myds->where($where)->select();
				$Myds->add($userdata,array(),true);			   
			   		
		    }

			
		}
		 echo $listdata+$datacount;
		
	}
	
	//定时开刷
	public function baojia_list_save_ds_st(){
		$userid = I('get.userid');
		//$time = I('get.time');
		$Myds = M('scn_ecms_inventoryexisting_dlxhbj_ds');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$where['userid'] = $userid;
		$data = $Myds->where($where)->select();
		
		if((time()-$data[0]['lasttime'])<49*60){
			echo  "刷新时间太短,必须大于50min,上次刷新:".date("Y-m-d H:i:s",$data[0]['lasttime'])."<br>";
			exit();
		}
		
		foreach($data as $key => $value){
			
			
			$where['userid'] = $value['userid'];
			$where['cInvName'] = $value['cinvname'];
			$where['vendor'] = $value['vendor'];
			$where['cInvStd'] = $value['cinvstd'];
			$where['province'] = $value['province'];
			$where['address'] = $value['address'];
			$where['district'] = $value['district'];
		    $databj = $Mybj->where($where)->select();


		   $baojia = $this -> baojia_user_search($databj[0]['id']);
           
		   //保存USERID
		   $userid =  $baojia[0]['userid'];
		   //下架1  上架0  删除3
	
		   $baojia[0]['status'] = 0;

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
		   $baojia[0]['fPrice'] = $baojia[0]['fprice'];
		   $baojia[0]['fWeight'] = $baojia[0]['fweight'];

		   //修改数据
           $baojia[0]['truetime']  = time();

           $dataList[] = $baojia[0];
           $printdata = $this ->baojia_save_add($baojia[0]);
		   //echo $prinetdata;
		   //var_dump($prinetdata);
		   if($prinetdata > 0){
			   $prinetdata = 1;
		   }else{
			   $prinetdata = 0;
		   }
		   
		   $returndata = $prinetdata * $returndata ;
		   
		}
		//var_dump($data);
		$whereuserid['userid'] = $userid;
		$wherelasttime['lasttime'] = time();
		
		$Myds->where($whereuserid)->save($wherelasttime);
		
		$sxtime = date("Y-m-d H:i:s",time());
		echo "刷新时间:".$sxtime."<br>";
	}

	
	//定时列表
	
	public function baojia_list_ds(){
		
		$userid = I('get.userid');
		$Mydsbj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql = "
		
		SELECT tabA.*  from scn_ecms_inventoryexisting_dlxhbj_product AS tabA
		left join scn_ecms_inventoryexisting_dlxhbj_ds AS tabB
		on 
		( tabA.userid = tabB.userid and
		tabA.cInvName = tabB.cinvname and
		tabA.vendor = tabB.vendor and
		tabA.cInvStd = tabB.cinvstd and
		tabA.province = tabB.province and
		tabA.address = tabB.address and
		tabA.district = tabB.district )
		where tabB.userid =  {$userid}
		;
		 
		";
		
		$data_list = $Mydsbj->query($sql);
		//var_dump($data_list);
		
	    $this->assign('data_list',$data_list);
		$this->display('baojia_list_ds');
	}
	
	//删除定时
	public function baojia_list_dsdel(){
		$data =  I('post.data');
		$data = stripslashes(html_entity_decode($data)); //解析传递过来的json字符串
        $data = json_decode($data,TRUE);
		$Mybjds = M('scn_ecms_inventoryexisting_dlxhbj_ds');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		
		$where['id'] = $data[0]['id'];
		$data = $Mybj->where($where)->select();
		
		$wheredata['userid'] = $data[0]['userid']; 
        $wheredata['cInvName'] = $data[0]['cinvname'];
        $wheredata['vendor'] = $data[0]['vendor'];
        $wheredata['cInvStd '] = $data[0]['cinvstd'];
        $wheredata['province'] = $data[0]['province'];	        
        $wheredata['address'] = $data[0]['address'];	
        $wheredata['district'] = $data[0]['district'];	

        $data = $Mybjds->where($wheredata)->delete();
        echo $data;		
	}
	
	
	
	
	//传Id查询报价
	public function baojia_user_search($id){
		//$id = I('get.id');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql = "
		  select * from scn_ecms_inventoryexisting_dlxhbj_product where id = ".$id.";
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
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_cache');
	
	    $Mybj ->add($data);
		//$Mybj->addAll($data);
		
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		
		$prinetdata = $Mybj->add($data,array(),true);
		return $prinetdata;
		//$Mybj->addAll($data,array(),true);
		//var_dump( $Mybj ->getLastSql());
	}


///////////////////////////改性/////////////////////////////////////



     public function baojiagx_list(){  //改性
     	$userid = I('post.userid');
		$Mybj = M('scn_modified_product');
        $status = I('post.grade');
        if ($status==='') {
        $data_list=$Mybj->where("userid={$userid} AND status<3")->order('id desc')->select();
        }elseif(($status=="0")||($status=="1")){
        $map['status'] =$status;
        $map['userid'] =$userid;
        $data_list=$Mybj->where($map)->order('id desc')->select();
        }
        
       //var_dump( $Mybj ->getLastSql());
		//$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojiagx_list');
		//var_dump($data_list);
	}



	public function baojiagx_list_save(){
		$status = I('get.status');
		$data = I('post.data');
		$data = stripslashes(html_entity_decode($data)); //解析传递过来的json字符串
        $data = json_decode($data,TRUE);
		/*
		$data = Array(Array('id' => 3 ,'fprice' => 3001.00 ,'valid_day' => 1 ,'fweight' => 30 ) , Array ( 'id' => 1 ,'fprice' => 3001.00 ,'valid_day' => 1 ,'fweight' => 30 ) );
		*/
		//print_r($data);
		foreach($data as $key => $value){
			
			//echo $value['id']."<br>";
			//echo $value['fprice']."<br>";
			//echo $value['valid_day']."<br>";
			//echo $value['fweight']."<br>";
           $baojia = $this -> baojiagx_user_search($value['id']);	
		   //保存USERID
		   $userid =  $baojia[0]['userid'];
		   //下架1  上架0  删除3
		   //var_dump($status);
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
		   //unset($baojia[0]['mian']);
           //默认配值
		   $baojia[0]['Description'] = '';
		   $baojia[0]['MobileDescription'] ='';
		   //严格大小写
		   $baojia[0]['Basematerial'] = $baojia[0]['basematerial'];
		   $baojia[0]['Supplementarymaterial'] = $baojia[0]['supplementarymaterial'];
		   $baojia[0]['Exfactoryprice'] = $baojia[0]['exfactoryprice'];
		   $baojia[0]['companyReferred'] = $baojia[0]['companyreferred'];
		   $baojia[0]['Thecontact'] = $baojia[0]['thecontact'];
		   $baojia[0]['Contactphone'] = $baojia[0]['contactphone'];

		   //修改数据
           // $baojia[0]['fPrice']	=  $value['fprice'];	 
           // $baojia[0]['valid_day']	=  $value['valid_day'];	
           // $baojia[0]['fWeight']	=  $value['fweight'];
           //$dataList[] = $baojia[0];
           $this ->baojiagx_save_add($baojia[0]);	
   		   //var_dump($baojia[0]);
		}
		//$this->baojia_save_add($dataList);
		
		//重新加载视图
		$Mybj = M('scn_modified_product');
		$sql =  "
		  select * from scn_modified_product where userid = '".$userid."' and status<3 order by id desc;
		";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojiagx_list');
		//var_dump($sql);
	}
	
	//传Id查询报价
	public function baojiagx_user_search($id){
		//$id = I('get.id');
		$Mybj = M('scn_modified_product');
		$sql = "
		  select * from scn_modified_product where id = ".$id.";
		";
        $data_list = $Mybj->query($sql);
		return $data_list;
        //var_dump($data_list);		
	}
	
	//插入单条数据
	public function baojiagx_save_add($data){

		$Mybj = M('scn_modified_cache');
	
	    $Mybj ->add($data);
		//$Mybj->addAll($data);
		
		$Mybj = M('scn_modified_product');
		
		$Mybj->add($data,array(),true);
		//$Mybj->addAll($data,array(),true);
		//var_dump( $Mybj ->getLastSql());
	}

	//其他供应商
    public function baojia_other(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvStd = I('post.cInvStd');
		$userid = I('post.userid');
		
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "
		  select * from scn_ecms_inventoryexisting_dlxhbj_product where userid != '".$userid."' and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and baojia=1 and status=0 and validity=0 order by id;
		";
		$data_list = $Mybj->query($sql);
        $this->assign('data_list',$data_list);
		$this->display('baojia_other');
		//var_dump($data_list);
	}

	//其他供应商报价统计
	public function baojia_other_count(){
		$userid = I('post.userid');
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvStd = I('post.cInvStd');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "select * from scn_ecms_inventoryexisting_dlxhbj_product where userid != '".$userid."' and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and baojia=1 and status=0 and validity=0";
        $result=$Mybj->query($sql);
        echo $data=count($result);
	}


	//其他供应商排序
    public function baojia_paixu(){
		$cInvName = I('post.cInvName');
		$vendor = I('post.vendor');
		$cInvStd = I('post.cInvStd');
		$userid = I('post.userid');
		$paixu = I('post.paixu');
		$Mybj = M('scn_ecms_inventoryexisting_dlxhbj_product');
		$sql =  "
		  select * from scn_ecms_inventoryexisting_dlxhbj_product where userid != '".$userid."' and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and baojia=1 and status=0 and validity=0 order by  ".$paixu;
		$data_list = $Mybj->query($sql);
        $this->assign('data_list',$data_list);
		$this->display('baojia_other');
		//var_dump($data_list);
	}
	



	
}