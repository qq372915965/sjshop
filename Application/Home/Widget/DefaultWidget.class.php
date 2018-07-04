<?php
namespace Home\Widget;
use Think\Controller;
class DefaultWidget extends Controller {
	//前端头部
	public function webheader(){
		$this->user_id = A('Home/Loginsso')->getuserid();
		$where['userid'] = $this->user_id;
		$where['type']  = 0;
		$lists = M('scn_hot')->field('keyword')->where($where)->order('num desc')->limit(5)->select();
		$this->assign('keyword',$lists);
		$datacssall[] = "/New_style/skin/sjzx/css/header.css";
		$datacssall[] = "/New_style/skin/sjzx/css/footer.css";
		$datacssall[] = "/New_style/skin/chat/css/form.css";
		$datacssall[] = "/New_style/skin/sjzx/css/home.css";
		$datacssall[] = "/New_style/skin/sjzx/css/home2.css";
		$datacssall[] = "/New_style/skin/sjzx/css/base.css";
		$datacssall[] = "/New_style/skin/sjzx/css/page3.css";
		$datacssall[] = "/New_style/skin/sjzx/css/style.css";
		$datacssall[] = "/New_style/skin/sjzx/css/table.css";
		$datacssall[] = "/New_style/skin/sjzx/css/supply.css";
		$datacssall[] = "/New_style/skin/sjzx/css/iconfont.css";
		$this->assign('datacssall',$datacssall);
		$this->display('Default/webheader');
	}
	//前端尾部
    public function webfooter(){
        $this->display('Default/webfooter');
    }
	
	//前端查询框
	public function websearch(){
		$this->display('Default/websearch');
	}


}