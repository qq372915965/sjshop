// JavaScript Document

var isMobile = /^(?:1[3|8|7]\d|15[89])-?\d{5}(\d{3}|\*{3})$/;//验证手机号
//获取ID值;
function getId(id){
	return document.getElementById(id);
}
//根据指定的样式找元素,这个要放在最前面
function getByClass(oParent,sClass){
		var aEle = oParent.getElementsByTagName('*');
		var result = [];
		var re = new RegExp('\\b' + sClass + '\\b','i');
		for(var i=0;i<aEle.length;i++){
			if(re.test(aEle[i].className)){
				result.push(aEle[i]);
			}
		}
return result;
}
//根据自定义样式名获取相应的元素
function getByStyle(oParent,styleName){
		var aEle = oParent.getElementsByTagName('*');
		var result = [];
		for(var i=0;i<aEle.length;i++){
			if(aEle[i].getAttribute(styleName)){
				result.push(aEle[i]);
			}
		}
return result;
}
//根据自定义样式名和值获取相应的元素
function getByValueStyle(oParent,styleName,value){
		var aEle = oParent.getElementsByTagName('*');
		var result = [];
		var re = new RegExp('\\b' + value + '\\b','i');
		for(var i=0;i<aEle.length;i++){
			if(re.test(aEle[i].getAttribute(styleName))){
				result.push(aEle[i]);
			}
		}
return result;
}
//获取所有指定的样式表，包括引用的样式
function getStyle(obj,attr){
	if(obj.currentStyle){
		    return obj.currentStyle[attr];
			
	}else{
			return getComputedStyle(obj,false)[attr];
	}
}
//事件侦听函数
function addEvent(obj,type,fn){
	 if(obj.attachEvent){   
	 	//obj.attachEvent("on"+type,function(){ fn.apply(elem,arguments);})
		var typeRef = "_" + type;
        if(!obj[typeRef]){
           obj[typeRef] = [];
        }
        for(var i in obj[typeRef]){
           if(obj[typeRef][i] == fn){
                return;
           }
        }
        obj[typeRef].push(fn);
        obj["on"+type] = function(){
            for(var i in this[typeRef]){
               this[typeRef][i].apply(this,arguments);
            }
        } 
	 }else if(obj.addEventListener){
		obj.addEventListener(type,fn,false);
	 }else{
      obj["on" + type] = handler;
}}

//移除事件侦听函数 //
function removeEvent(obj,type,fn){
    if(obj.detachEvent){
        if(obj["_"+type]){
            for(var i in obj["_"+type]){
                if(obj["_"+type][i] == fn){
                    obj["_"+type].splice(i,1);
                    break;
                }
            }
        }
    }else{
        obj.removeEventListener(type,fn,false);
    }
}

//兼容浏览器的获取事件源方法，就是确定你点击的是哪个选项卡//
function objParent(e){
	e=e||window.event;
	if(window.event){
		return e.srcElement;
	}else{
		return e.target; 
	}
}
//移除选项卡事件
/*备注：addEventListener()添加的匿名函数无法移除*/
function removeEvent(obj,type,fn){
	 if(obj.detachEvent){   
	 	obj.detachEvent("on"+type,fn)
	 }else if(obj.removeEventListener){
		obj.removeEventListener(type,fn,false);
	 }else{
		 obj["on"+ type] = null;
}}	
	

/**********************************************************以上是公共服务函数********************************************************/

/*
点击消失兼容IE
Date:2013-12-16
Author:Mr LI
Copyright:plasway.com
*/
function stringInput(obj,str){
	addEvent(obj,"focus",function(){
		if(obj.value==str){
			obj.value=""
		}
	});
	addEvent(obj,"blur",function(){
		if(obj.value==str){
			return false;
		}else if(obj.value==""){
			obj.value=str;	
		}
	});
}

/*
选项卡函数(鼠标点击切换)
Date:2013-12-16
Author:Mr LI
Copyright:plasway.com
例：new TabCard({id:id,ac:ac},true,{id:id,},fn).start();
*/
//选项卡被点击事件
function TabCard(json1,iNow,json2,fn){
	this.json1=json1;
	this.json2=json2;
	this.oBox=getId(this.json1.id);
	this.oSmallBth=this.oBox.getElementsByTagName('li');
	this.iNow=iNow;
	this.fn=fn;
	this.tabArray=new Array();
}
TabCard.prototype.start=function(){
	var _this=this;
	for(var i=0;i<this.oSmallBth.length;i++){
		this.tabArray.push(this.oSmallBth[i]);
		addEvent(this.oSmallBth[i],"click",function(e){
			_this.tabClickEvent(_this,e)
			});
	}
	if(this.fn){this.fn()}
}
TabCard.prototype.tabClickEvent=function(_this,e){
	for(var i=0;i<_this.tabArray.length;i++){
		removeEvent(_this.tabArray[i],"click",_this.tabClickEvent);
		if(_this.tabArray[i]==objParent(e)){
			_this.tabArray[i].className=_this.json1.css;
			getId(_this.json1.ac).value=i;
			if(_this.iNow){
				_this.tabDiv(_this,i);
				}
		}else{
			_this.tabArray[i].className="";
		}
	}
}
TabCard.prototype.tabDiv=function(_this,i){
	var obj=getId(_this.json2.id);
	for(var i=0;i<obj.length;i++){
		obj.style.display="none";
		}
	obj[i].style.display="block";
}
/*
选项卡函数(鼠标进入切换)
Date:2014-08-25;
Author:Mr LI
Copyright:plasway.com
例：new BWmenu('on1menu',{css1:"SelectNav",css2:""}).show();
*/
function BWmenu(vArg,json){
	this.obj=document.getElementById(vArg).getElementsByTagName('dl');
	this.Module=document.getElementById(vArg).getElementsByTagName('ul');
	this.menu=this.obj[0].getElementsByTagName('dd');
	this.json=json;
	this.arry=[];
	}
BWmenu.prototype.show=function(){
	var _this=this;
	for(i in this.json){
		this.arry.push(this.json[i]);
		}
	this.Module[0].style.display='block';
	this.menu[0].className=this.arry[0];
	for(var i=0;i<this.menu.length;i++){
		this.menu[i].index=i;
		this.menu[i].onmouseover=function(){
			_this.lab(this)
			}
		}
	}
BWmenu.prototype.lab=function(oBtn){
	
	for(var i=0;i<this.menu.length;i++){
			this.Module[i].style.display='none';
			this.menu[i].className=this.arry[1];
		}
	this.Module[oBtn.index].style.display='block';
	oBtn.className=this.arry[0];
	}

/*
带开关与不带开关的浮动条
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
说明:power:为0时没有开关，为1时有开关；clo:为开关class名;Target:为距顶部消失距离,site:浮动位置,divW:页面宽度,toTop:距顶部距离
new scrollObj(document.getElementById("toTop"),{power:0,clo:0,Target:10,site:"right",divW:1200,toTop:450}).show();
*/
function scrollObj(obj,json){
	this.obj=obj;
	this.json=json;
	}
scrollObj.prototype.show=function(){
	var _this=this
	this.countWidth();
	addEvent(window,"scroll",function(){//窗口滚动事件
		var scrollTop=parseInt(document.documentElement.scrollTop||document.body.scrollTop);
		if(navigator.userAgent.match("MSIE 6.0")){
			_this.srcollTopIE(scrollTop);
		}
		if(_this.json.Target){
			_this.hide(scrollTop,_this.json.Target);//Target距顶部的高度，达到一定高度自动隐藏
	}});
	if(this.json.power){//开关按扭
		this.close(this.json.clo);
	}
	addEvent(window,"resize",function(){//改变窗口大小时执行
		var oWidth=document.documentElement.clientWidth||document.body.clientWidth;
		_this.countWidth();
		if(oWidth<_this.json.divW){
			//_this.obj.style.display="none";
			_this.obj.style[_this.json.site]=0+"px";
		}else{
			_this.obj.style.display="block";
			_this.countWidth();	
		}
	})
}
scrollObj.prototype.close=function(clo){
	var _this=this
	addEvent(getByClass(_this.obj,clo)[0],"click",function(){
		if(getStyle(_this.obj,"display")=="block"){
			_this.obj.style.display="none";
		}
	})
}
scrollObj.prototype.countWidth=function(){
	var oWidth=document.documentElement.clientWidth||document.body.clientWidth;
	this.obj.style[this.json.site]=parseInt((oWidth-this.json.divW)/2)-parseInt(getStyle(this.obj,"width"))+"px";
	}
scrollObj.prototype.hide=function(scrollTop,Target){
	if(scrollTop<=Target){
		this.obj.style.display="none";
	 }else{
		this.obj.style.display="block";  
	}
}
scrollObj.prototype.srcollTopIE=function(num){
	   this.obj.style.top=num+this.json.toTop+"px";
}
/*
弹出层的代码
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
例：
//0为只弹出页面，1为弹出登陆框，2弹出并加载别外的页面	
//new ShowDiv(2,{obj:"MoreYear",oDiv:"DivLand2",close:"close",location:"/about/year_money.jsp?mid=154238&clyf=",speak:"请先完善企业成立年份!"},cyear).show();
*/
function ShowDiv(p,json,fn){
	this.p=p;
	this.json=json;
	this.obj=getId(this.json.obj);
	this.oDiv=getId(this.json.oDiv);
	this.box=getByClass(this.oDiv,"oBox")[0];
	this.divCose=getByClass(this.oDiv,this.json.close||"addclose");
	this.fn=fn;
	}
ShowDiv.prototype.show=function(){ 
	var _this=this,href;
	if(this.p==3){
		for(var i=0;i<this.divCose.length;i++){
			this.DivClose();
		}
	}else{
	addEvent(_this.obj,"click",function(){
		if(_this.fn){
			if(_this.fn()==-1){
				alert(_this.json.speak);
				return false;
			}else{
				 href=_this.json.location+_this.fn();
			}
		}
		if(_this.p==2){
			$.ajax({ url: href,async:false, context: document.body, success: function(rtnValue){_this.box.innerHTML=rtnValue}})
		}
			_this.oDiv.style.display="block";
			_this.divpart();
		
	});
	for(var i=0;i<this.divCose.length;i++){
		addEvent(_this.divCose[i],"click",function(){_this.DivClose()});
	}}
	window.onresize=function(){_this.DivClose()};
};
ShowDiv.prototype.DivClose=function(){//关闭
	if(getStyle(this.oDiv,"display")=="block"){
		this.oDiv.style.display="none";
		this.divpart();
	}
}
ShowDiv.prototype.divpart=function(){//显示或关闭
			var bgObj;
			if(getStyle(this.oDiv,"display")=="block"){
				 var iWidth = document.documentElement.clientWidth||document.body.clientWidth;
				 var iHeight = document.documentElement.clientHeight||document.body.clientHeight; 
				 bgObj= document.createElement("div");
				 bgObj.id="oDiv";
				 bgObj.style.cssText = "position:absolute;left:0px;top:0px;width:"+iWidth+"px;height:"+Math.max(document.body.clientHeight, iHeight)+"px;filter:Alpha(Opacity=30);opacity:0.3;background-color:#000;z-index:10;";
				 document.body.appendChild(bgObj);
				 this.oDiv.style.zIndex=10000;
				 this.oDiv.style.top=document.documentElement.scrollTop + (document.documentElement.clientHeight-this.oDiv.offsetHeight)/2 + "px";
				 this.oDiv.style.left=(iWidth-this.oDiv.clientWidth)/2 + "px";
			}else{
				 document.body.removeChild(document.getElementById("oDiv"));	
			}
		return false;	
}

/*
用来兼容IE6，底部浮动的代码
Date:2014-08-16
Author:Mr LI
Copyright:plasway.com
例：if(navigator.userAgent.match("MSIE 6.0")){
	new ShowFootDiv("footPotDiv").show();
}*/
function ShowFootDiv(obj){
	this.obj=getId(obj);
	//this.json=json;
	 }
ShowFootDiv.prototype.show=function(){
	var _this=this;
	this.obj.style.position='absolute';
	addEvent(window,"scroll",function(){
		var scrollTop=parseInt(document.documentElement.scrollTop||document.body.scrollTop);//被卷去的高
			_this.setDiv(scrollTop);
		})
	}
ShowFootDiv.prototype.setDiv=function(num){
	document.title=document.documentElement.clientHeight ;
	this.obj.style.top=document.documentElement.clientHeight+num-this.obj.offsetHeight-10+"px";
	}

/*
关闭所有的对象
Date:2014-08-16
Author:Mr LI
Copyright:plasway.com
例：new footPopClose(document.getElementById('foot-pop-close'),{name1:"footPotDiv"}).show();
*/
function footPopClose(obj,json){
	this.obj=obj;
	this.json=json;
	}
footPopClose.prototype.show=function(){
	var _this=this;
	addEvent(_this.obj,"click",function(){
		for(i in _this.json){
			getId(_this.json[i]).style.display="none";
			}
		})
	}
/*
通用点击响应事件
Date:2014-09-11
Author:Mr LI
new UseClick("框架ID","css样式名",要响应的函数).execute();
*/
function UseClick(navDiv,name,fn){
	this.navDiv=document.getElementById(navDiv);
	this.fn=fn
	this.obj=getByClass(this.navDiv,name);
	}
UseClick.prototype.execute=function(){
	var _this=this;
	for(var i=0;i<this.obj.length;i++){
		addEvent(_this.obj[i],"click",_this.fn)
		}
	}

/*
添加到收藏夹
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
*/
function addfavor(obj) {
	var url=window.location.href;
	var title=parent.document.title;
	obj.onclick=function(){
		 if(confirm("网站名称："+title+"\n网址："+url+"\n确定添加收藏?")){
			 var ua = navigator.userAgent.toLowerCase();
			 if(ua.indexOf("msie 8")>-1){
				 external.AddToFavoritesBar(url,title,'');//IE8
			 }else{
				 try {
					 window.external.addFavorite(url, title);
				 } catch(e) {
					 try {
						 window.sidebar.addPanel(title, url, "");//firefox
					 } catch(e) {
						 alert("加入收藏失败，请使用Ctrl+D进行添加");
					 }
				 }
			 }
		 }
     return false;}
}
if(document.getElementById("addfavor")){
	addfavor(document.getElementById("addfavor"))
}
/*
繁简体转换
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
*/
var fontChange=function(obj){
	var str_url = window.location.href; 
	if(str_url.match("big5")== null){
		obj.title=obj.innerHTML="繁体";
		obj.onclick=function(){
			window.location.href=str_url.replace("www","big5");
			}
		}else{
		obj.title=obj.innerHTML="简体";	
		obj.onclick=function(){
			window.location.href=str_url.replace("big5","www");
			}
		}
	}
if(document.getElementById("fontChange")){
	fontChange(document.getElementById("fontChange"));
	}

/*
下拉列表,用来兼容ie6
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
例:if(navigator.userAgent.match("MSIE 6.0")){
	plas_ie6("webMarp",{div:"menu-bd-panel"});
}*/
function plas_ie6(id,json){
	var obj=document.getElementById(id);
	obj.onmouseover=function(){
		getByClass(obj,json.div)[0].style.display="block";
		obj.className="ie6";
		}
	obj.onmouseout=function(){
		getByClass(obj,json.div)[0].style.display="none";
		obj.className="";
		}
}

/*
图片自动适应容器大小
Date:2014-11-14
例:autoImgSize(图片对像,容器对像)
*/
function autoImgSize(obj,nav){
	var img=new Image()
	img=obj;
	var Ratio=1;//比例
	var h=img.height;//图片高度
	var w=img.width;//图片宽度
	//图片宽度比窗口宽度,如果大于1，则图片比框小。如果小于1，则图片比框大。
	var wRatio=nav.offsetWidth/w; 
	var hRatio=nav.offsetHeight/h;
	
	if(wRatio==1&&hRatio==1){//如果宽度和高度刚好够，什么都不变
		Ratio=1;
	}else if(wRatio>1){//如果宽度没超过
		if(hRatio<1){Ratio=hRatio}
	}else if(hRatio>1){//如果高度没超出
		if(wRatio<1){Ratio=wRatio}
	}else if(wRatio<1&&hRatio<1){//如果宽度和高度都超出
		Ratio=(wRatio<=hRatio?wRatio:hRatio)
		}
	if(Ratio<1){
		w=w*Ratio;
		h=h*Ratio;
		}
	img.height= h;
    img.width = w;
	}

/*
网站常用的静态属性
Date:2014-07-02
*/
var PLAS_MASK;//遮罩层
var PLAS_TYPE={
	bodyWidth: document.documentElement.clientWidth||document.body.clientWidth,<!--获取显示页面的宽度-->
	bodyHeight: document.documentElement.clientHeight||document.body.clientHeight,<!--获取显示页面的高度-->
	myScrollTop:function(){return document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;},<!--获得当前窗口显示区顶点位置,ie和火狐有差别-->
	mySelfLeft:function(obj){return parseInt((PLAS_TYPE.bodyWidth-obj.clientWidth)/2)},<!--获取自己的左边距离-->
	mySelfHeight:function(obj){return parseInt(PLAS_TYPE.myScrollTop() + (PLAS_TYPE.bodyHeight- obj.offsetHeight)/2)},<!--获取自己的高度-->
	mySelfTop:function(obj){return parseInt(PLAS_TYPE.myScrollTop() + (PLAS_TYPE.bodyHeight- obj.offsetHeight)/2)},<!--获取自己的顶部距离-->
	MASK:function(zIndex){<!--创建遮罩层-->
		PLAS_MASK=document.createElement("div");
		PLAS_MASK.style.cssText = "position:absolute;left:0px;top:0px;width:"+PLAS_TYPE.bodyWidth+"px;height:"+PLAS_TYPE.bodyHeight+"px;filter:Alpha(Opacity=30);opacity:0.3;background-color:#000;z-index:0;"
		document.body.appendChild(PLAS_MASK);
		},
	REMVER_MASK:function(){<!--删除遮罩层-->
		document.body.removeChild(PLAS_MASK);
		},
	Again_MASK_Width:function(){
		PLAS_MASK.style.width=PLAS_TYPE.bodyWidth+"px";
		PLAS_MASK.style.height=PLAS_TYPE.bodyHeight+"px";
		}
	}
	
	
function thensearchtext(obj,json){
	for( i in json){
		if(json[i]==obj.value)
		 obj.value='';
		}
	}
/*
多物体运动框架
Date:2013-12-11
*/
function startMove(obj,json,fn){
	clearInterval(obj.timer);
	obj.timer=setInterval(function(){
		var bStop=true;
		 for(attr in json){
						var iCur=0;
						if(attr=='opacity'){
							iCur=parseInt(parseFloat(getStyle(obj,attr))*100);
							}else{
							iCur=parseInt(getStyle(obj,attr))
							}
					 	var ispeed=(json[attr]-iCur)/8;
						ispeed=ispeed>0?Math.ceil(ispeed):Math.floor(ispeed);
						if(iCur!=json[attr]){
							bStop=false;
							}
								if(attr=='opacity'){
									obj.style.filter='alpha(opacity:'+(iCur+ispeed)+')';
									obj.style.opacity=(iCur+ispeed)/100;
								}else{
									obj.style[attr]=iCur+ispeed+'px';
								}
							   
		 }
			if(bStop){
			 clearInterval(obj.timer);
			  if(fn){fn()}
			}
		},30);
	}