//封装创建ajax对象的方法
function createXHR(){
	var xhr;
	try{
		xhr=new XMLHttpRequest();
		return xhr;
	}catch(e){

	}
	//低版本IE
	try{
		xhr=new ActiveXObject("Microsoft.XMLHttp");
	}catch(e){

	}
	//其他
	alert("请升级你的浏览器！");
	
}