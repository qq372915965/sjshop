// JavaScript Document

var isMobile = /^(?:1[3|8|7]\d|15[89])-?\d{5}(\d{3}|\*{3})$/;//��֤�ֻ���
//��ȡIDֵ;
function getId(id){
	return document.getElementById(id);
}
//����ָ������ʽ��Ԫ��,���Ҫ������ǰ��
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
//�����Զ�����ʽ����ȡ��Ӧ��Ԫ��
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
//�����Զ�����ʽ����ֵ��ȡ��Ӧ��Ԫ��
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
//��ȡ����ָ������ʽ���������õ���ʽ
function getStyle(obj,attr){
	if(obj.currentStyle){
		    return obj.currentStyle[attr];
			
	}else{
			return getComputedStyle(obj,false)[attr];
	}
}
//�¼���������
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

//�Ƴ��¼��������� //
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

//����������Ļ�ȡ�¼�Դ����������ȷ�����������ĸ�ѡ�//
function objParent(e){
	e=e||window.event;
	if(window.event){
		return e.srcElement;
	}else{
		return e.target; 
	}
}
//�Ƴ�ѡ��¼�
/*��ע��addEventListener()��ӵ����������޷��Ƴ�*/
function removeEvent(obj,type,fn){
	 if(obj.detachEvent){   
	 	obj.detachEvent("on"+type,fn)
	 }else if(obj.removeEventListener){
		obj.removeEventListener(type,fn,false);
	 }else{
		 obj["on"+ type] = null;
}}	
	

/**********************************************************�����ǹ���������********************************************************/

/*
�����ʧ����IE
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
ѡ�����(������л�)
Date:2013-12-16
Author:Mr LI
Copyright:plasway.com
����new TabCard({id:id,ac:ac},true,{id:id,},fn).start();
*/
//ѡ�������¼�
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
ѡ�����(�������л�)
Date:2014-08-25;
Author:Mr LI
Copyright:plasway.com
����new BWmenu('on1menu',{css1:"SelectNav",css2:""}).show();
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
�������벻�����صĸ�����
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
˵��:power:Ϊ0ʱû�п��أ�Ϊ1ʱ�п��أ�clo:Ϊ����class��;Target:Ϊ�ඥ����ʧ����,site:����λ��,divW:ҳ����,toTop:�ඥ������
new scrollObj(document.getElementById("toTop"),{power:0,clo:0,Target:10,site:"right",divW:1200,toTop:450}).show();
*/
function scrollObj(obj,json){
	this.obj=obj;
	this.json=json;
	}
scrollObj.prototype.show=function(){
	var _this=this
	this.countWidth();
	addEvent(window,"scroll",function(){//���ڹ����¼�
		var scrollTop=parseInt(document.documentElement.scrollTop||document.body.scrollTop);
		if(navigator.userAgent.match("MSIE 6.0")){
			_this.srcollTopIE(scrollTop);
		}
		if(_this.json.Target){
			_this.hide(scrollTop,_this.json.Target);//Target�ඥ���ĸ߶ȣ��ﵽһ���߶��Զ�����
	}});
	if(this.json.power){//���ذ�Ť
		this.close(this.json.clo);
	}
	addEvent(window,"resize",function(){//�ı䴰�ڴ�Сʱִ��
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
������Ĵ���
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
����
//0Ϊֻ����ҳ�棬1Ϊ������½��2���������ر����ҳ��	
//new ShowDiv(2,{obj:"MoreYear",oDiv:"DivLand2",close:"close",location:"/about/year_money.jsp?mid=154238&clyf=",speak:"����������ҵ�������!"},cyear).show();
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
ShowDiv.prototype.DivClose=function(){//�ر�
	if(getStyle(this.oDiv,"display")=="block"){
		this.oDiv.style.display="none";
		this.divpart();
	}
}
ShowDiv.prototype.divpart=function(){//��ʾ��ر�
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
��������IE6���ײ������Ĵ���
Date:2014-08-16
Author:Mr LI
Copyright:plasway.com
����if(navigator.userAgent.match("MSIE 6.0")){
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
		var scrollTop=parseInt(document.documentElement.scrollTop||document.body.scrollTop);//����ȥ�ĸ�
			_this.setDiv(scrollTop);
		})
	}
ShowFootDiv.prototype.setDiv=function(num){
	document.title=document.documentElement.clientHeight ;
	this.obj.style.top=document.documentElement.clientHeight+num-this.obj.offsetHeight-10+"px";
	}

/*
�ر����еĶ���
Date:2014-08-16
Author:Mr LI
Copyright:plasway.com
����new footPopClose(document.getElementById('foot-pop-close'),{name1:"footPotDiv"}).show();
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
ͨ�õ����Ӧ�¼�
Date:2014-09-11
Author:Mr LI
new UseClick("���ID","css��ʽ��",Ҫ��Ӧ�ĺ���).execute();
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
��ӵ��ղؼ�
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
*/
function addfavor(obj) {
	var url=window.location.href;
	var title=parent.document.title;
	obj.onclick=function(){
		 if(confirm("��վ���ƣ�"+title+"\n��ַ��"+url+"\nȷ������ղ�?")){
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
						 alert("�����ղ�ʧ�ܣ���ʹ��Ctrl+D�������");
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
������ת��
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
*/
var fontChange=function(obj){
	var str_url = window.location.href; 
	if(str_url.match("big5")== null){
		obj.title=obj.innerHTML="����";
		obj.onclick=function(){
			window.location.href=str_url.replace("www","big5");
			}
		}else{
		obj.title=obj.innerHTML="����";	
		obj.onclick=function(){
			window.location.href=str_url.replace("big5","www");
			}
		}
	}
if(document.getElementById("fontChange")){
	fontChange(document.getElementById("fontChange"));
	}

/*
�����б�,��������ie6
Date:2013-12-11
Author:Mr LI
Copyright:plasway.com
��:if(navigator.userAgent.match("MSIE 6.0")){
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
ͼƬ�Զ���Ӧ������С
Date:2014-11-14
��:autoImgSize(ͼƬ����,��������)
*/
function autoImgSize(obj,nav){
	var img=new Image()
	img=obj;
	var Ratio=1;//����
	var h=img.height;//ͼƬ�߶�
	var w=img.width;//ͼƬ���
	//ͼƬ��ȱȴ��ڿ��,�������1����ͼƬ�ȿ�С�����С��1����ͼƬ�ȿ��
	var wRatio=nav.offsetWidth/w; 
	var hRatio=nav.offsetHeight/h;
	
	if(wRatio==1&&hRatio==1){//�����Ⱥ͸߶ȸպù���ʲô������
		Ratio=1;
	}else if(wRatio>1){//������û����
		if(hRatio<1){Ratio=hRatio}
	}else if(hRatio>1){//����߶�û����
		if(wRatio<1){Ratio=wRatio}
	}else if(wRatio<1&&hRatio<1){//�����Ⱥ͸߶ȶ�����
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
��վ���õľ�̬����
Date:2014-07-02
*/
var PLAS_MASK;//���ֲ�
var PLAS_TYPE={
	bodyWidth: document.documentElement.clientWidth||document.body.clientWidth,<!--��ȡ��ʾҳ��Ŀ��-->
	bodyHeight: document.documentElement.clientHeight||document.body.clientHeight,<!--��ȡ��ʾҳ��ĸ߶�-->
	myScrollTop:function(){return document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;},<!--��õ�ǰ������ʾ������λ��,ie�ͻ���в��-->
	mySelfLeft:function(obj){return parseInt((PLAS_TYPE.bodyWidth-obj.clientWidth)/2)},<!--��ȡ�Լ�����߾���-->
	mySelfHeight:function(obj){return parseInt(PLAS_TYPE.myScrollTop() + (PLAS_TYPE.bodyHeight- obj.offsetHeight)/2)},<!--��ȡ�Լ��ĸ߶�-->
	mySelfTop:function(obj){return parseInt(PLAS_TYPE.myScrollTop() + (PLAS_TYPE.bodyHeight- obj.offsetHeight)/2)},<!--��ȡ�Լ��Ķ�������-->
	MASK:function(zIndex){<!--�������ֲ�-->
		PLAS_MASK=document.createElement("div");
		PLAS_MASK.style.cssText = "position:absolute;left:0px;top:0px;width:"+PLAS_TYPE.bodyWidth+"px;height:"+PLAS_TYPE.bodyHeight+"px;filter:Alpha(Opacity=30);opacity:0.3;background-color:#000;z-index:0;"
		document.body.appendChild(PLAS_MASK);
		},
	REMVER_MASK:function(){<!--ɾ�����ֲ�-->
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
�������˶����
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