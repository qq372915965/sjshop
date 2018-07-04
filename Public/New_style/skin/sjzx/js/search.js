
(function(){
	
	
	$(function(){
	
	//选择初始值
	$(".nav-search-label").text($(".nav-dropdown .active2").text());
	$("#select_v").val($(".nav-dropdown .active2").attr('data-val'));
	
		$(".nav-search-btn a").click(function(event){
			$(".nav-search-btn a").removeClass("active2");
			$(this).addClass("active2");
			var v_label=$(this).attr("data-txt");
			
				$("#select_btn").val($(this).attr('data-id'));//按钮值
				
			if(v_label!='drop'){
				var obj=$(".nav-search-label");
				$(obj).text(v_label);//关键字
				$(obj).attr("data-select",0);
			//	$("#select_btn").val(1);//按钮值
				$(".nav-search-txt").attr("placeholder","请输入供应商");//placeholder
				$(".nav_right_img").hide();

				$(".nav-search").attr("action",$(this).attr("data-url"));
				$(".nav-search").attr("method",$(this).attr("data-met"));



				
			}else{
				//$("#select_btn").val(0);//按钮值
				//列表
				var v_select=$(".nav-dropdown .active2").text();
				$(".nav-search-label").text(v_select);
				$(".nav-search-label").attr("data-select",1);
				$(".nav-search-txt").attr("placeholder","输入品名/牌号/厂号");//placeholder
				$(".nav_right_img").show();
				
			    $(".nav-search").attr("action",$(this).attr("data-url"));
			    $(".nav-search").attr("method",$(this).attr("data-met"));				
			}
			
			
		})
		
		$(".nav-search-label").click(function(){
			
			var v=$(this).attr('data-select');
			if(v=='1'){
				$(".nav-dropdown").show();
			}
		});
		
		
	
		
		$(".nav-dropdown li").click(function(){
			
			$(".nav-dropdown li").removeClass('active2');
			$(this).addClass('active2');
			$(".nav-search-label").text($(this).text());
			$("#select_v").val($(this).attr('data-val'));
			$(this).parents('.nav-dropdown').hide();
		})
		
	
		$(".nav-dropdown").mouseenter(function(e){
			
			$(".nav-dropdown").show();
		})
		
		$(".nav-dropdown").mouseleave(function(e){
			
			$(".nav-dropdown").hide();
		})
		
		$(".nav-search-label").mouseenter(function(e){
			var v=$(this).attr('data-select');
			if(v=='1'){
				$(".nav-dropdown").show();
			}
		})
		
		$(".nav-search-label-big").mouseleave(function(e){
			
			$(".nav-dropdown").hide();
		})



		
	});
	


})()



function visitor_click(obj){
     var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("seach_u10").innerHTML=xmlhttp.responseText;
	    }
	  }
	  var visitor=$(obj).attr("href");
	  var index=visitor.indexOf("=")+1;
	  var id=visitor.substr(index,3);
	xmlhttp.open("get","/e/action/visitor.php?visitor="+id,true);
	//设置post请求头
	/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
	//获取数据
	xmlhttp.send();
}

function visitor_gx(obj){
     var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("seach_u10").innerHTML=xmlhttp.responseText;
	    }
	  }
	  var visitor=$(obj).attr("href");
	  var index=visitor.indexOf("=")+1;
	  var id=visitor.substr(index,3);
	xmlhttp.open("get","/e/action/visitor_gx.php?visitor="+id,true);
	//设置post请求头
	/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
	//获取数据
	xmlhttp.send();
}


function visitor_zs(obj){
     var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("seach_u10").innerHTML=xmlhttp.responseText;
	    }
	  }
	  var visitor=$(obj).attr("href");
	  var index=visitor.indexOf("=")+1;
	  var id=visitor.substr(index,3);
	xmlhttp.open("get","/e/action/visitor_zs.php?visitor="+id,true);
	//设置post请求头
	/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
	//获取数据
	xmlhttp.send();
}

function visitor_zj(obj){
     var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("seach_u10").innerHTML=xmlhttp.responseText;
	    }
	  }
	  var visitor=$(obj).attr("href");
	  var index=visitor.indexOf("=")+1;
	  var id=visitor.substr(index,3);
	xmlhttp.open("get","/e/action/visitor_zj.php?visitor="+id,true);
	//设置post请求头
	/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
	//获取数据
	xmlhttp.send();
}




