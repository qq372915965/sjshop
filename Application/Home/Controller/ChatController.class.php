<?php
namespace Home\Controller;
use Think\Controller;
class ChatController extends Controller {
	public function __construct() {
		parent::__construct ();
        
        $this->user_id = A('Home/Loginsso')->is_login();

	}

	//  聊天记录页面
    public function chat_line(){ 
        
    	$user_id = $_GET;

        $datas = $this->corporation_name($user_id);

    	$this->assign('user_ida',$user_id['user_ida']);
        $this->assign('user_idb',$user_id['user_idb']);
        $this->assign('user_info',$datas['data']['b_res'][0]);
		$this->display();      
    }


    /// 查看聊天记录
    public function chat_json()
    {
    	$keya = 'key_'.$_GET['user_ida'].'_'.$_GET['user_idb'];
    	$keyb = 'key_'.$_GET['user_idb'].'_'.$_GET['user_ida'];
    	$res = D('Redis')->redis_isset($keya);
    	if($res == 1){
    		$list = $keya; // 下标名称 == 两个用户聊天的id组成	
    	}else{
    		$list = $keyb; // 下标名称 == 两个用户聊天的id组成	

    	}

    	$num = '100';  // 查询多少条
        $data = A('Home/Redisdata')->get_list($list,$num);
    	foreach ($data as $key => $value) {
            $data[$key]['o']['status'] = 0;  
    		if($_GET['user_ida'] == $value['o']['user_ida']){
    			$data[$key]['o']['chatType'] = 1;
    		}else{
    			$data[$key]['o']['chatType'] = 0;	
    		}
            $time = substr($_GET['time'],0,strlen($_GET['time'])- 3);
            $date = substr($value['o']['date'],0,strlen($value['o']['date'])- 3);

            if((double)($time) >= (double)($date) && $time > 0){
                unset($data[$key]);
            }
    	}  
            echo json_encode(array_reverse($data));
    	
    }

    // 插入聊天记录
    public function insert_chat()
    {	 
    	$keya = 'key_'.$_POST['o']['user_ida'].'_'.$_POST['o']['user_idb'];
    	$keyb = 'key_'.$_POST['o']['user_idb'].'_'.$_POST['o']['user_ida'];
        
        // 拼接URL地址
        $ida = $_POST['o']['user_ida'];
        $idb = $_POST['o']['user_idb'];
        $usernamea = M('shop_user')->where('sjdbid='.$ida)->getField('username');
        $usernameb = M('shop_user')->where('sjdbid='.$idb)->getField('username');
        $key_a = A('Home/Redisdata')->get_list('key_'.$ida,1);
        $key_b = A('Home/Redisdata')->get_list('key_'.$idb,1);
       
        // 拼接URL地址
        if(empty($key_a) || empty($key_b)){

            $key = 'key_'.$_POST['o']['user_idb'];
            $key_id = 'keyid_'.$_POST['o']['user_ida'];
            
            $urlA['url'] = '/sjshop/index.php/Home/Chat/click_line?user_ida='.$idb.'&user_idb='.$ida;
            $urlA['username'] =  $usernamea;
            $urlA['time'] = time();
            $urlA['userid'] = $_POST['o']['user_idb'];
            $urlA['status'] = 1;
            $data = A('Home/Redisdata')->redis_get_value($key);
            if($data == 'NULL'){
                $data = array();
                $data[$key_id] = $urlA;
            }else{
                unset($data[$key_id]);
                $dataadd[$key_id] = $urlA;
                $data = array_merge($dataadd,$data);
            }
            $r = A('Home/Redisdata')->redis_set_value($key,$data,60*60*24*30);
        }

    	$res = D('Redis')->redis_isset($keya);
    	if($res == 1){
    		$list = $keya; // 下标名称 == 两个用户聊天的id组成	
    	}else{
    		$list = $keyb; // 下标名称 == 两个用户聊天的id组成	

    	}
    	$data = $_POST;
    	$res = A('Home/Redisdata')->set_list($list,$data);
    	if($res){
    		$this->chat_json();
    	}
		
    }


    // 查出消息列表
    public function news_lists()
    {
        $num = '20';  // 查询多少条
        $data = A('Home/Redisdata')->redis_get_value('key_'.$_POST['user_id']);
        foreach ($data as $key => $value) {
            $usernamb = explode('=', $value['url']);
            $data[$key]['username'] = M('shop_user')->where('sjdbid='.$usernamb[2])->getField('username');
            $data[$key]['time'] = date('m-d',$value['time']);
        }
        if($_POST['count'] == 'count'){
            echo count($data);
        }else{
            echo json_encode($data);
        }
        
    }

    // 点击查看聊天记录 让状态改变
    public function click_line()
    {
        $keys = 'key_'.$_GET['user_ida'];
        $key_id = 'keyid_'.$_GET['user_idb'];
        $datas = A('Home/Redisdata')->redis_get_value($keys);
		if(is_array($datas)){
			$datas[$key_id]['status'] = 0;
			$r = A('Home/Redisdata')->redis_set_value($keys,$datas,60*60*24*30);
		}
        
        
        $user_id = $_GET;
        $datas = $this->corporation_name($user_id);
        $this->assign('user_ida',$user_id['user_ida']);
        $this->assign('user_idb',$user_id['user_idb']);
        $this->assign('user_info',$datas['data']['b_res'][0]);

        $this->display('chat_line');

    }

    // 查找聊天界面的 公司信息
    public function corporation_name($data)
    {
        $url = 'http://localhost/weixin/index.php/Home/Postsend/post_receiv';
        $b_sql = "select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = {$data['user_idb']} limit 1";
        $a_sql = "select * from scn_ecms_inventoryexisting_dlxhbj_product where userid = {$data['user_ida']} limit 1";
        $data['type'] = 'sql';
        $data['data']['b_sql'] = $b_sql;
        $data['data']['a_sql'] = $a_sql;
        $datas = A('Home/Postsend')->post_send($url,$data);
        return $datas;
    }

}