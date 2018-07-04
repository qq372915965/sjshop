<?php
namespace Home\Controller;
use Think\Controller;
//new \Org\Util\Mydbda;
class BaojiazsController extends Controller {
	protected $model;
	
 ///////////////////////////再生/////////////////////////////////////



     public function baojiazs_list(){  //改性
     	$userid = I('post.userid');
     	$status = I('post.grade');
		$Mybj = M('scn_ecms_rebirth_product');

		if ($status==='') {
        $data_list=$Mybj->where("userid={$userid} AND status<3")->order('id desc')->select();
        }elseif(($status=="0")||($status=="1")){
        $map['status'] =$status;
        $map['userid'] =$userid;
        $data_list=$Mybj->where($map)->order('id desc')->select();
        }

        //$sql =  "select * from scn_ecms_rebirth_product where userid = '".$userid."' and status<3 order by id desc;";	

		//$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojiazs_list');
		//var_dump($data_list);
	}



	public function baojiazs_list_save(){
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
           $baojia = $this -> baojiazs_user_search($value['id']);	
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
		   $baojia[0]['cAddress'] = $baojia[0]['caddress'];
		   $baojia[0]['cInvName'] = $baojia[0]['cinvname'];
		   $baojia[0]['cInvStd'] = $baojia[0]['cinvstd'];
		   $baojia[0]['fPrice'] = $baojia[0]['fprice'];
		   $baojia[0]['companyReferred'] = $baojia[0]['companyreferred'];
		   $baojia[0]['Thecontact'] = $baojia[0]['thecontact'];
		   $baojia[0]['Contactphone'] = $baojia[0]['contactphone'];

		   //修改数据
           // $baojia[0]['fPrice']	=  $value['fprice'];	 
           // $baojia[0]['valid_day']	=  $value['valid_day'];	
           // $baojia[0]['fWeight']	=  $value['fweight'];
           //$dataList[] = $baojia[0];
           $this ->baojiazs_save_add($baojia[0]);	
   		   //var_dump($baojia[0]);
		}
		//$this->baojia_save_add($dataList);
		
		//重新加载视图
		$Mybj = M('scn_ecms_rebirth_product');
		$sql =  "
		  select * from scn_ecms_rebirth_product where userid = '".$userid."' and status<3 order by id desc;
		";
		$data_list = $Mybj->query($sql);
		$this->assign('data_list',$data_list);
		$this->display('baojiazs_list');
		//var_dump($sql);
	}
	
	//传Id查询报价
	public function baojiazs_user_search($id){
		//$id = I('get.id');
		$Mybj = M('scn_ecms_rebirth_product');
		$sql = "
		  select * from scn_ecms_rebirth_product where id = ".$id.";
		";
        $data_list = $Mybj->query($sql);
		return $data_list;
        //var_dump($data_list);		
	}
	
	//插入单条数据
	public function baojiazs_save_add($data){

		$Mybj = M('scn_ecms_rebirth_cache');
	
	    $Mybj ->add($data);
		//$Mybj->addAll($data);
		
		$Mybj = M('scn_ecms_rebirth_product');
		
		$Mybj->add($data,array(),true);
		//$Mybj->addAll($data,array(),true);
		//var_dump( $Mybj ->getLastSql());
	}



	
}