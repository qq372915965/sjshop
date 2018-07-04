<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller
{
	public function upload_img(){
      	$upload = new \Think\Upload();// 实例化上传类
      	$upload->maxSize   =     31457280 ;// 设置附件上传大小
      	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      	$upload->rootPath  =     $_SERVER['DOCUMENT_ROOT'].'/sjshop/Public/Home/upload/'; // 设置附件上传根目录
      	$upload->savePath  =     ''; // 设置附件上传（子）目录

      	$info   =   $upload->upload();
      	if(!$info) {// 上传错误提示错误信息  
       		echo "上传失败"; 
      		$this->error($upload->getError());
      	}else{// 上传成功 获取上传文件信息  
      		foreach ($info as $i) {
      			echo '/sjshop/Public/Home/upload/'.$i['savepath'].$i['savename'];
      		}
    	}
	}
}