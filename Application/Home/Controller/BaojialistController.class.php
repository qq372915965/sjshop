<?php
namespace Home\Controller;
use Think\Controller;
class BaojialistController extends Controller {
		
	public function __construct() {
		parent::__construct ();
		$this->CheckModel = D('Check');
	}
	
	public function index(){
		echo "Baojialist";
	}
	//大陆现货
	public function baojialist_dlxh(){
		$this->assign('title','大陆现货');
		$this->display();
	}
	//香港现货
	public function baojiaolist_xgxh(){
		$this->assign('title',"香港现货");
		$this->display();
	}
	//香港期货
	public function baojialist_xgqh(){
		$this->assign('title','香港期货');
		$this->display();
	}
	//现柜货
	public function baojialist_xgh(){
		$this->assign('title','现柜货');
		$this->display();		
	}
	//船柜货
	public function baojialist_cgh(){
		$this->assign('title','船柜货');
		$this->display();
	}
	//改性
	public function baojialist_gx(){
		$Page_size = 10 ;
		$page= intval($_GET['page']); 
		if($page<=0){ 
			$page=1; 
		}
		$keyboard = I('get.keyboard');
		$keyboard = $this->CheckModel->CheckStr($keyboard);
		$cInvName = trim(I('get.cInvName'));
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$level = trim(I('get.level'));
		$level = $this->CheckModel->CheckStr($level);
		if($cInvName == "不限"){
			$cInvName = '';
		}
		if($level == "不限"){
			$level = '';
		}
		$table = M('scn_modified_product');
		if(!empty($keyboard)){
			$sql = "select * from scn_modified_product where goodsname like '%".$keyboard."%' and status=0 order by gxtime desc;";
		}else{
			$sql = "select * from scn_modified_product where goodsname like '%".$cInvName."%' and level like '%".$level."%'  and status=0 order by gxtime desc;";
		}
		//var_dump($sql);
		$result = $table->query($sql);
		$count = count($result);  //取得总记录数
        $page_count = ceil($count/$Page_size);
		
		$offset=$Page_size*($page-1); 
		if(!empty($keyboard)){
			$sql = "select * from scn_modified_product where goodsname like '%".$keyboard."%'  and status=0 order by gxtime desc  limit $offset,$Page_size ;";
		}else{
			$sql = "select * from scn_modified_product where goodsname like '%".$cInvName."%' and level like '%".$level."%'  and status=0 order by gxtime desc  limit $offset,$Page_size ;";
		}
        
		$data = $table->query($sql);
		$this->assign('cInvName',$cInvName);
		$this->assign('level',$level);
		$this->assign('keyboard',$keyboard);
		$this->assign('page',$page);
		$this->assign('page_count',$page_count);
		$this->assign('data',$data);
		$this->assign('title','改性塑胶');
		$this->display();
		
	}
	//环保
	public function baojialist_hb(){
		$Page_size = 10 ;
		$page= intval($_GET['page']); 
		if($page<=0){ 
			$page=1; 
		}
		$keyboard = I('get.keyboard');
		$keyboard = $this->CheckModel->CheckStr($keyboard);
		$cInvName = trim(I('get.cInvName'));
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		$level = trim(I('get.level'));
		$level = $this->CheckModel->CheckStr($level);
		if($cInvName == "不限"){
			$cInvName = '';
		}
		if($level == "不限"){
			$level = '';
		}
		$useto = trim(I('get.useto'));
		$useto = $this->CheckModel->CheckStr($useto);
		$cAddress = trim(I('get.cAddress'));
		$cAddress = $this->CheckModel->CheckStr($cAddress);
		if($useto =="不限"){
			$useto = '';
		}
		if($cAddress == "不限"){
			$cAddress = '';
		}
		
		$table = M('scn_modified_product');
		if(!empty($keyboard)){
			$sql = " select a.id id,a.cInvName cInvName,a.vendor vendor,a.cInvStd cInvStd,fPrice,level,b.features features,b.color color,b.useto useto,trial,xuans,companyname,a.truetime truetime,pictureurl,pictureurl2,pictureurl3 from scn_ecms_rebirth_product a left join scn_ecms_property b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd and a.vendor=b.vendor where a.cInvName like '%".$keyboard."%' and status=0 order by a.truetime desc;";
			
		}else{
			$sql = " select a.id id,a.cInvName cInvName,a.vendor vendor,a.cInvStd cInvStd,fPrice,level,b.features features,b.color color,b.useto useto,trial,xuans,companyname,a.truetime truetime,pictureurl,pictureurl2,pictureurl3 from scn_ecms_rebirth_product a left join scn_ecms_property b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd and a.vendor=b.vendor where a.cInvName like '%".$cInvName."%' and a.level like '%".$level."%' and a.useto like '%".$useto."%' and a.cAddress like '%".$cAddress."%' and status=0 order by a.truetime desc;";
		}
		
		$result = $table->query($sql);
		$count = count($result);  //取得总记录数
        $page_count = ceil($count/$Page_size);
		
		$offset=$Page_size*($page-1); 
		if(!empty($keyboard)){
			$sql = "select a.id id,a.cInvName cInvName,a.vendor vendor,a.cInvStd cInvStd,fPrice,level,b.features features,b.color color,b.useto useto,trial,xuans,companyname,a.truetime truetime,pictureurl,pictureurl2,pictureurl3 from scn_ecms_rebirth_product a left join scn_ecms_property b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd and a.vendor=b.vendor where a.cInvName like '%".$keyboard."%' and   status=0 order by a.truetime desc limit $offset,$Page_size ;";
		}else{
			$sql = "select a.id id,a.cInvName cInvName,a.vendor vendor,a.cInvStd cInvStd,fPrice,level,b.features features,b.color color,b.useto useto,trial,xuans,companyname,a.truetime truetime,pictureurl,pictureurl2,pictureurl3 from scn_ecms_rebirth_product a left join scn_ecms_property b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd and a.vendor=b.vendor where  a.cInvName like '%".$cInvName."%' and a.level like '%".$level."%' and a.useto like '%".$useto."%' and a.cAddress like '%".$cAddress."%' and status=0 order by a.truetime desc limit $offset,$Page_size ;";
		}
        
		$data = $table->query($sql);
		$this->assign('cInvName',$cInvName);
		$this->assign('level',$level);
		$this->assign('keyboard',$keyboard);
		$this->assign('useto',$useto);
		$this->assign('cAddress',$cAddress);
		$this->assign('page',$page);
		$this->assign('page_count',$page_count);
		$this->assign('data',$data);
		$this->assign('title','环保再生');
		$this->display();
		
	}
	//助剂
	public function baojialist_zj(){
		$Page_size = 10 ;
		$page= intval($_GET['page']); 
		if($page<=0){ 
			$page=1; 
		}
		$keyboard = I('get.keyboard');
		$keyboard = $this->CheckModel->CheckStr($keyboard);
		$cInvName = trim(I('get.cInvName'));
		$cInvName = $this->CheckModel->CheckStr($cInvName);
		if($cInvName == "不限"){
			$cInvName = '';
		}
		
		$useto = trim(I('get.useto'));
		$useto = $this->CheckModel->CheckStr($useto);
		$cAddress = trim(I('get.cAddress'));
		$cAddress = $this->CheckModel->CheckStr($cAddress);
		if($useto =="不限"){
			$useto = '';
		}
		if($cAddress == "不限"){
			$cAddress = '';
		}
		$table = M('scn_modified_product');
		if(!empty($keyboard)){
			$sql="select a.id id,a.cInvName cInvName,a.pictureurl pictureurl,vendor,a.cInvStd cInvStd,truetime,application,b.useto useto,fPrice,cAddress,a.companyname companyname,address  from scn_ecms_aids_product a left join scn_ecms_brand2 b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd where a.cInvName like '%".$keyboard."%'  and status=0 order by truetime desc ;";
		}else{
			$sql="select a.id id,a.cInvName cInvName,a.pictureurl pictureurl,vendor,a.cInvStd cInvStd,truetime,application,b.useto useto,fPrice,cAddress,a.companyname companyname,address  from scn_ecms_aids_product a left join scn_ecms_brand2 b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd where a.cInvName like '%".$cInvName."%'  and a.useto like '%".$useto."%' and a.cAddress like '%".$cAddress."%' and status=0 order by truetime desc ;";
		}
		
		$result = $table->query($sql);
		$count = count($result);  //取得总记录数
        $page_count = ceil($count/$Page_size);
		
		$offset=$Page_size*($page-1);
		if(!empty($keyboard)){
			$sql="select a.id id,a.cInvName cInvName,a.pictureurl pictureurl,vendor,a.cInvStd cInvStd,truetime,application,b.useto useto,fPrice,cAddress,a.companyname companyname,address  from scn_ecms_aids_product a left join scn_ecms_brand2 b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd where a.cInvName like '%".$keyboard."%'  and status=0 order by truetime desc limit $offset,$Page_size ;";
		}else{
			$sql="select a.id id,a.cInvName cInvName,a.pictureurl pictureurl,vendor,a.cInvStd cInvStd,truetime,application,b.useto useto,fPrice,cAddress,a.companyname companyname,address  from scn_ecms_aids_product a left join scn_ecms_brand2 b on a.cInvName=b.cInvName and a.cInvStd=b.cInvStd where a.cInvName like '%".$cInvName."%'  and a.useto like '%".$useto."%' and a.cAddress like '%".$cAddress."%' and status=0 order by truetime desc limit $offset,$Page_size ;";
		}
        
		$data = $table->query($sql);
		$this->assign('cInvName',$cInvName);
		$this->assign('keyboard',$keyboard);
		$this->assign('useto',$useto);
		$this->assign('cAddress',$cAddress);
		$this->assign('page',$page);
		$this->assign('page_count',$page_count);
		$this->assign('data',$data);
		$this->assign('title','塑料助剂');
		$this->display();
		
	}
	//大陆现货二级页面
	public function baojialist_dlxh_mx(){
		$keyboard = I('get.keyboard');
		$cInvName = I('get.cInvName');
		$vendor = I('get.vendor');
		$cInvStd = I('get.cInvStd');
		$paixu = I('get.paixu');
		$address = I('get.address');
		$table = M('scn_ecms_inventoryexisting_dlxhbj_product');
		if (!empty($keyboard)) {
			$keyboard = $this->CheckModel->CheckStr($keyboard);
			
			$sql="select id,userid,companyid,truetime,cInvName,cInvStd,vendor,dValidDate dValidDate,delivery,fPrice,fWeight,piaoju,cAddress,companyname,vendor,companyReferred,address,Thecontact,Contactphone,companyhome,companyconcept,district from scn_ecms_inventoryexisting_dlxhbj_product where  companyReferred like '%".$keyboard."%' group by companyReferred";
			
			$data = $table->query($sql);
		}elseif((!empty($cInvName)) && (!empty($vendor)) && (!empty($cInvStd)) && (!empty($address)) ){

			$cInvName = $this->CheckModel->CheckStr($cInvName);
			$vendor = $this->CheckModel->CheckStr($vendor);
			$cInvStd = $this->CheckModel->CheckStr($cInvStd);
			$paixu = $this->CheckModel->CheckStr($paixu);
			$address = $this->CheckModel->CheckStr($address);
			$sql="select id,userid,companyid,truetime,cInvName,cInvStd,vendor,dValidDate dValidDate,delivery,fPrice,fWeight,piaoju,cAddress,companyname,vendor,companyReferred,address,Thecontact,Contactphone,companyhome,companyconcept,district from scn_ecms_inventoryexisting_dlxhbj_product where status=0 and baojia=1 and validity=0 and second=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and address='".$address."' order by truetime desc";
			$data = $table->query($sql);
		}else{			
			exit("参数非法！");
		}
		    //var_dump($sql);
			//var_dump($paixu);
			$this->assign('cInvName',$cInvName);
			$this->assign('vendor',$vendor);
			$this->assign('cInvStd',$cInvStd);
			$this->assign('address',$address);
			$this->assign('data',$data);
			$this->assign('title','大陆现货');
			$this->display();
	}
	//香港现货二级页面
	public function baojialist_xgxh_mx(){
		$keyboard = I('get.keyboard');
		$cInvName = I('get.cInvName');
		$vendor = I('get.vendor');
		$cInvStd = I('get.cInvStd');
		$paixu = I('get.paixu');
		$address = I('get.address');
		$table = M('scn_ecms_inventoryexisting_xgxhbj_product');
		if((!empty($cInvName)) && (!empty($vendor)) && (!empty($cInvStd)) && (!empty($address)) ){

			$cInvName = $this->CheckModel->CheckStr($cInvName);
			$vendor = $this->CheckModel->CheckStr($vendor);
			$cInvStd = $this->CheckModel->CheckStr($cInvStd);
			$paixu = $this->CheckModel->CheckStr($paixu);
			$address = $this->CheckModel->CheckStr($address);
			$sql="select id,userid,companyid,truetime,cInvName,cInvStd,vendor,dValidDate dValidDate,delivery,fPrice,fWeight,piaoju,cAddress,companyname,vendor,companyReferred,address,Thecontact,Contactphone,companyhome,companyconcept,valid_day from scn_ecms_inventoryexisting_xgxhbj_product where status=0 and baojia=1 and validity=0 and second=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and address='".$address."' order by truetime desc";
			$data = $table->query($sql);
		}else{
			//var_dump(urldecode(I('get.address')));
			exit("参数非法！");
		}
		    //var_dump($sql);
			//var_dump($paixu);
			$this->assign('cInvName',$cInvName);
			$this->assign('vendor',$vendor);
			$this->assign('cInvStd',$cInvStd);
			$this->assign('address',$address);
			$this->assign('data',$data);
			$this->assign('title','香港现货');
			$this->display();
		
	}
	//香港现货二级页面
	public function baojialist_xgqh_mx(){
		$keyboard = I('get.keyboard');
		$cInvName = I('get.cInvName');
		$vendor = I('get.vendor');
		$cInvStd = I('get.cInvStd');
		$paixu = I('get.paixu');
		$address = I('get.address');
		$table = M('scn_ecms_inventoryexisting_xgqhbj_product');
		if((!empty($cInvName)) && (!empty($vendor)) && (!empty($cInvStd)) && (!empty($address)) ){

			$cInvName = $this->CheckModel->CheckStr($cInvName);
			$vendor = $this->CheckModel->CheckStr($vendor);
			$cInvStd = $this->CheckModel->CheckStr($cInvStd);
			$paixu = $this->CheckModel->CheckStr($paixu);
			$address = $this->CheckModel->CheckStr($address);
			$sql="select id,userid,companyid,truetime,cInvName,cInvStd,vendor,dValidDate dValidDate,delivery,fPrice,fWeight,piaoju,cAddress,companyname,vendor,companyReferred,address,Thecontact,Contactphone,companyhome,companyconcept,valid_day,mian from scn_ecms_inventoryexisting_xgqhbj_product where status=0 and baojia=1 and validity=0 and second=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and address='".$address."' order by truetime desc";
			$data = $table->query($sql);
		}else{
			exit("参数非法！");
		}
		    //var_dump($sql);
			//var_dump($paixu);
			$this->assign('cInvName',$cInvName);
			$this->assign('vendor',$vendor);
			$this->assign('cInvStd',$cInvStd);
			$this->assign('address',$address);
			$this->assign('data',$data);
			$this->assign('title','香港期货');
			$this->display();
		
	}
	//现柜货二级页面
	public function baojialist_xgh_mx(){
		$keyboard = I('get.keyboard');
		$cInvName = I('get.cInvName');
		$vendor = I('get.vendor');
		$cInvStd = I('get.cInvStd');
		$paixu = I('get.paixu');
		$address = I('get.address');
		$table = M('scn_ark_product');
		if((!empty($cInvName)) && (!empty($vendor)) && (!empty($cInvStd)) && (!empty($address)) ){

			$cInvName = $this->CheckModel->CheckStr($cInvName);
			$vendor = $this->CheckModel->CheckStr($vendor);
			$cInvStd = $this->CheckModel->CheckStr($cInvStd);
			$paixu = $this->CheckModel->CheckStr($paixu);
			$address = $this->CheckModel->CheckStr($address);
			$sql="select id,userid,companyid,truetime,cInvName,cInvStd,vendor,delivery,fPrice,fWeight,piaoju,time,cAddress,companyname,companyReferred,address,district,Thecontact,Contactphone,companyhome,companyconcept from scn_ark_product where status=0 and ark_type=1 and second=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and address='".$address."' order by truetime desc";
			$data = $table->query($sql);
		}else{
			exit("参数非法！");
		}
		    //var_dump($sql);
			//var_dump($paixu);
			$this->assign('cInvName',$cInvName);
			$this->assign('vendor',$vendor);
			$this->assign('cInvStd',$cInvStd);
			$this->assign('address',$address);
			$this->assign('data',$data);
			$this->assign('title','现柜货');
			$this->display();
		
	}
	
	//船柜货二级页面
	public function baojialist_cgh_mx(){
		$keyboard = I('get.keyboard');
		$cInvName = I('get.cInvName');
		$vendor = I('get.vendor');
		$cInvStd = I('get.cInvStd');
		$paixu = I('get.paixu');
		$address = I('get.address');
		$table = M('scn_ark_product');
		if((!empty($cInvName)) && (!empty($vendor)) && (!empty($cInvStd)) && (!empty($address)) ){

			$cInvName = $this->CheckModel->CheckStr($cInvName);
			$vendor = $this->CheckModel->CheckStr($vendor);
			$cInvStd = $this->CheckModel->CheckStr($cInvStd);
			$paixu = $this->CheckModel->CheckStr($paixu);
			$address = $this->CheckModel->CheckStr($address);
			$sql="select id,userid,companyid,truetime,cInvName,cInvStd,vendor,delivery,fPrice,fWeight,piaoju,time,cAddress,companyname,companyReferred,address,district,Thecontact,Contactphone,companyhome,companyconcept from scn_ark_product where status=0 and ark_type=2 and second=0 and (UNIX_TIMESTAMP(NOW())-truetime)<15*24*3600 and cInvName='".$cInvName."' and vendor='".$vendor."' and cInvStd='".$cInvStd."' and address='".$address."' order by  truetime desc";
			$data = $table->query($sql);
		}else{
			exit("参数非法！");
		}
		    //var_dump($sql);
			//var_dump($paixu);
			$this->assign('cInvName',$cInvName);
			$this->assign('vendor',$vendor);
			$this->assign('cInvStd',$cInvStd);
			$this->assign('address',$address);
			$this->assign('data',$data);
			$this->assign('title','船柜货');
			$this->display();
		
	}
	


	// 物性表
	public function baojialist_wxb()
	{	
		// 查出物性表的数量
		$count = M('scn_ecms_wuxing')->where('audit=1')->count('*');
		$this->assign('count',$count);
		$this->assign('title','物性表');
		$this->display();
	}

	//物性表搜索
	public function baojialist_wxb_search()
	{	
		$keyword = $this->CheckModel->CheckStr($_GET['keyword']);

		$where['audit'] = 1;
		$where['cInvName|cInvStd'] = array('like','%'.$keyword.'%');
		$count = M('scn_ecms_wuxing')->where($where)->count('*');
		// 分页
		$Page = new \Think\Page($count,20);// 实例化分页类 
        $show = $Page->show();// 分页显示输出 	
        $p = $_GET['p'] ? $_GET['p'] : 0;

		$list = M('scn_ecms_wuxing')->page($p.',20')->where($where)->select();
		

		$this->assign('page',$show);
		$this->assign('count',$count);
		$this->assign('list',$list);
		$this->assign('title','物性表');
		$this->display();
	}


	// 物性详情页
	public function baojialist_wxb_details()
	{	
		$list = M('scn_ecms_wuxing')->where('id='.$_GET['id'])->find();
		// pre($list);
		$this->assign('date',$list);
		$this->assign('title','物性表');
		$this->display();
	}
    //报价查询
	public function baojia_search(){
		$keyboard = I('get.keyboard');
		$type = I('get.type');		
		$keyboard = $this->CheckModel->CheckStr($keyboard);
		$type = $this->CheckModel->CheckStr($type);
		
		$this->postdata = D('postdata');
		switch($type){
			case 1;
				$this->assign('keyboard',$keyboard);
				$this->assign('classid',$type);
				$this->assign('title','大陆现货');
				$this->display();
				break;	
			case 2;
				$this->assign('keyboard',$keyboard);
				$this->assign('classid',$type);
				$this->assign('title','香港现货');
				$this->display();
				break;	
			case 3;
			    $this->assign('keyboard',$keyboard);
				$this->assign('classid',$type);
				$this->assign('title','香港期货');
				$this->display();
				break;	
            case 4;
				$url = "http://".$_SERVER['HTTP_HOST']."/sjshop/index.php/Home/Baojialist/baojialist_gx/keyboard/".$keyboard;
				$data = $this->postdata->curl_get($url);
				print_r($data);
				break;
            case 5;
				$url = "http://".$_SERVER['HTTP_HOST']."/sjshop/index.php/Home/Baojialist/baojialist_hb/keyboard/".$keyboard;
				$data = $this->postdata->curl_get($url);
				print_r($data);
				break;
            case 6;
				$url = "http://".$_SERVER['HTTP_HOST']."/sjshop/index.php/Home/Baojialist/baojialist_zj/keyboard/".$keyboard;
				$data = $this->postdata->curl_get($url);
				print_r($data);
				break;
		}


	}
	//公司查询
	public function baojia_search_company(){
		
		$keyboard = I('get.keyboard');
		$keyboard = $this->CheckModel->CheckStr($keyboard);
		if($keyboard == ''){
			exit('关键字不能为空！');
		}
		$table = M('scn_ark_product');
		$sql="select * from scn_ecms_thecompany where  companyname like '%".$keyboard."%' or companyReferred like '%".$keyboard."%'  group by userid";
		$data = $table->query($sql);
		$this->assign('data',$data);
		$this->assign('title','公司查询');
		$this->display();
	}
	

}
	