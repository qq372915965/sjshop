<?php
namespace Admin\Controller;
use Think\Controller;
use Org\General\User;
class IndexController extends Controller {
    public function index(){
    	$params = I('get.userId');

    	if($params && $params == session('userId')){
    		$opt['id'] = $params;
    		$this->assign('userInfo', User::get_admin_user_info($opt));
    		$this->display('index');
    	}else{
    		$this->display('login');
    	}
    }

    public function welcome(){
    	echo 'Hello';
    }

    //登录
    public function login(){
    	$params = I('post.');

    	if(!$params['username'] || !$params['password']){
    		$result['code'] = -1;
    		$result['zh'] = '存在空值';

    		$this->ajaxReturn($result, 'JSON');
    	}

    	$params['password'] = md5(md5($params['password']));

    	$userInfo = User::get_admin_user_info($params);

    	if($userInfo){
    		$result['userId'] = $userInfo['id'];
    		$result['code'] = 1;
    		$result['zh'] = '成功';
    		session('userId', $userInfo['id']);
    	}else{
    		$result['code'] = -1;
    		$result['zh'] = '账号或密码错误';
    	}
    	$this->ajaxReturn($result, 'JSON');
    }

    //退出登录
    public function sign_out(){
    	session('userId', null);

    	$this->redirect('/Admin');
    }
}