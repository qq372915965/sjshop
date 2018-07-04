<?php if (!defined('THINK_PATH')) exit(); echo W('Default/webheader');?> 


<link rel="stylesheet" type="text/css" href="/sjshop/Public/New_style/skin/sjzx/css/iconfont.css" />
<style type="text/css">
  .market-map-ttl {
    padding: 10px;
    background: #ddd;
    width: 1180px;
    margin: 0px auto;
}
.market-map-ttl a {
    padding: 5px;
    margin-left: 10px;
    text-decoration: none;
	color:red;
}
</style>
<div class="clear"></div>




<div class="clear"></div>
   <div class="seach_content">   
      <div class="clear"></div>




     <div class="market-map-ttl">
 			<label for="" ><font  color="red">热门地区：</font></label>
			
			<a class="" 
						            href="javascript:saerch_baojia_city('樟木头');">东莞(樟木头</a>
			<a class="" 
						            href="javascript:saerch_baojia_city('黄江');">黄江</a>
			<a class="" 
						            href="javascript:saerch_baojia_city('常平');">常平)</a>
			<a class="" 
									href="javascript:saerch_baojia_city('余姚');">浙江(余姚)</a>	
			<a class="" 
									href="javascript:saerch_baojia_city('太仓');">江苏(太仓</a>
			<a class="" 
									href="javascript:saerch_baojia_city('昆山');">昆山)</a>									
			<a class="" 
									href="javascript:saerch_baojia_city('东莞');">东莞</a>
			<a class="" 
									href="javascript:saerch_baojia_city('深圳');">深圳</a>
			<a class="" 
									href="javascript:saerch_baojia_city('广州');">广州</a>
			<a class="" 
									href="javascript:saerch_baojia_city('佛山');">佛山</a>
			<a class="" 
									href="javascript:saerch_baojia_city('汕头');">汕头</a>		
			<a class="" 
									href="javascript:saerch_baojia_city('江苏');">江苏</a>
           	<a class="" 
									href="javascript:saerch_baojia_city('上海');">上海</a>										

                    
    </div>








	  
	  
      <div class="chuanhuo_top" id="chuanhuo_top">
        <div class="chuanhuo_title"><span>现柜货</span>报价
		<a class = "chepan"  href="javascript:;" > 按品名分类</a>
		<a class = "pinmin"  href="javascript:;" > 按品名排序</a></div>
        <div class="chuanhuo_ct">
            <div id="cInvName">
            <span class="chuanhuo_list">
			
<script src="/skin/sjzx/js/mustache.js" type="text/javascript" charset="utf-8"></script>
<script src="/skin/sjzx/js/pinming.js" type="text/javascript" charset="utf-8"></script>			
<script type="text/javascript">


var data1 = '';
var data2 = '';
var data3 = '';
var data4 = '';

/*
$(document).ready(function() { 

// 任何需要执行的js特效 
$("#list_cInvName").text("正在加载数据") 
}); 
*/
$(document).ready(function(){ 
    //在与服务器通讯较慢时给用户提示信息 
    $("#list_cInvName").html('<div class="list_sty">加载中</div>');

    //品名
    //向服务器发送请求(get、post) 
    $.get("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvName",'123',function(data){ 
      $("#list_cInvName").html(data); 
    }).error(function(){ 
      //当服务器出现异常时 
      $("#list_cInvName").html('<div class="list_sty">数据异常</div>') 
    })
    //品名更多
    $("#list_cInvName_more").html('<div class="list_sty">加载中</div>'); 
    $.get("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvName_more",'123',function(data){ 
      $("#list_cInvName_more").html(data); 
    }).error(function(){ 
      $("#list_cInvNamet_more").html('<div class="list_sty">数据异常</div>') 
    })

    /*//厂商
    $("#list_vendor").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor",{cInvName:'POM'},function(data){ 
      $("#list_vendor").html(data); 
    }).error(function(){ 
      $("#list_vendor").html('<div class="list_sty">数据异常</div>') 
    })
    //厂商更多
    $("#list_vendor_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor_more",{cInvName:'POM'},function(data){ 
      $("#list_vendor_more").html(data); 
    }).error(function(){ 
      $("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
    
    //牌号
    $("#list_cInvStd").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd",{cInvName:'POM',vendor:'日本宝理'},function(data){ 
      $("#list_cInvStd").html(data); 
    }).error(function(){ 
      $("#list_cInvStd").html('<div class="list_sty">数据异常</div>') 
    })
    //牌号更多
    $("#list_cInvStd_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd_more",{cInvName:'POM',vendor:'日本宝理'},function(data){ 
      $("#list_cInvStd_more").html(data); 
    }).error(function(){ 
      $("#list_cInvStd_more").html('<div class="list_sty">数据异常</div>') 
    })
    
    //交货地
    $("#list_address").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address",{cInvName:'POM',vendor:'日本宝理',cinvstd:'M90-44'},function(data){ 
      $("#list_address").html(data); 
    }).error(function(){ 
      $("#list_address").html('<div class="list_sty">数据异常</div>') 
    })
    //交货地更多
    $("#list_address_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address_more",{cInvName:'POM',vendor:'日本宝理',cinvstd:'M90-44'},function(data){ 
      $("#list_address_more").html(data); 
    }).error(function(){ 
      $("#list_address_more").html('<div class="list_sty">数据异常</div>') 
    })*/
	
	
    //table追加
    /*
	$("#list_baojia_xinghao").text(''); 
    $.get("http://localhost/sjshop/index.php?s=/Home/Ajaxdata/ajax_test",'123',function(data){ 
      $(".table tbody").append(data); 
	  //$(".table tbody").html(data);
    }).error(function(){ 
      $("#list_baojia_xinghao").text('-1') 
    })
	*/
    saerch_baojia(data1,data2,data3,data4);
	saerch_baojia_count(data1,data2,data3,data4);
	 goSort_1('cInvName','ABS');  
}) 




function goSort(name,value){	
    $("#select-A").html('<div id="selectA"><a><span class="screen">'+value+'&nbsp;<i>&nbsp;</i></span></a></div>'); 
	$("#select-B").html('');
	$("#select-C").html('');
	$("#select-D").html('');
 
    $("#list_vendor").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_vendor",{cInvName:value},function(data){ 
      $("#list_vendor").html(data); 
    }).error(function(){ 
      $("#list_vendor").html('<div class="list_sty">数据异常</div>') 
    })
	
	$("#list_vendor_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_vendor_more",{cInvName:value},function(data){ 
      $("#list_vendor_more").html(data); 
    }).error(function(){ 
      $("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	data1 = value;
    data2 = '';
	data3 = '';
    data4 = '';
	saerch_baojia(data1,data2,data3,data4);
	saerch_baojia_count(data1,data2,data3,data4);
	
	
	$.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_vendor_one",{cInvName:value},function(data){ 
      goSort1_1(value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	
}


function goSort_1(name,value){	

 
    $("#list_vendor").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_vendor",{cInvName:value},function(data){ 
      $("#list_vendor").html(data); 
    }).error(function(){ 
      $("#list_vendor").html('<div class="list_sty">数据异常</div>') 
    })
	
	$("#list_vendor_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_vendor_more",{cInvName:value},function(data){ 
      $("#list_vendor_more").html(data); 
    }).error(function(){ 
      $("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	data1 = value;
    data2 = '';
	data3 = '';
    data4 = '';

	
	
	$.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_vendor_one",{cInvName:value},function(data){ 
      goSort1_1(value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	
}


function goSort1(name,value){
	//alert(name+value);
	$("#select-B").html('<div id="selectA"><a><span class="screen">'+value+'&nbsp;<i>&nbsp;</i></span></a></div>');
	$("#select-C").html('');
	$("#select-D").html('');
	$("#list_cInvStd").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvStd",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd").html(data); 
    }).error(function(){ 
      $("#list_cInvStd").html('<div class="list_sty">数据异常</div>') 
    })
	
	$("#list_cInvStd_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvStd_more",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd_more").html(data); 
    }).error(function(){ 
      $("#list_cInvStd_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	data1 = name;
    data2 = value;
	data3 = '';
    data4 = '';
	saerch_baojia(data1,data2,data3,data4);
	saerch_baojia_count(data1,data2,data3,data4);
	
	$.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvStd_one",{cInvName:name,vendor:value},function(data){ 
      goSort2_1(name,value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
		
}





function goSort1_1(name,value){

	
	data1 = name;
    data2 = value;
	data3 = '';
    data4 = '';
	
	$("#list_cInvStd").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvStd",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd").html(data); 
    }).error(function(){ 
      $("#list_cInvStd").html('<div class="list_sty">数据异常</div>') 
    })
	
	$("#list_cInvStd_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvStd_more",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd_more").html(data); 
    }).error(function(){ 
      $("#list_cInvStd_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvStd_one",{cInvName:name,vendor:value},function(data){ 
      goSort2_1(name,value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	
}





function goSort2(value1,value2,value3){
	
	$("#select-C").html('<div id="selectA"><a><span class="screen">'+value3+'&nbsp;<i>&nbsp;</i></span></a></div>');
	$("#select-D").html('');
	$("#list_address").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_address",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address").html(data); 
    }).error(function(){ 
      $("#list_address").html('<div class="list_sty">数据异常</div>') 
    })
	
	$("#list_address_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_address_more",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address_more").html(data); 
    }).error(function(){ 
      $("#list_address_more").html('<div class="list_sty">数据异常</div>') 
    })
	
	data1 = value1;
    data2 = value2;
	data3 = value3;
    data4 = '';
	saerch_baojia(data1,data2,data3,data4);
	saerch_baojia_count(data1,data2,data3,data4);
	
	
	 $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_address_one",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      goSort3_1(value1,value2,value3,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
	
}



function goSort2_1(value1,value2,value3){

	
	data1 = value1;
    data2 = value2;
	data3 = value3;
    data4 = '';
	
	
   $("#list_address").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_address",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address").html(data); 
    }).error(function(){ 
      $("#list_address").html('<div class="list_sty">数据异常</div>') 
    })
	
	$("#list_address_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_address_more",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address_more").html(data); 
    }).error(function(){ 
      $("#list_address_more").html('<div class="list_sty">数据异常</div>') 
    })

		
	 $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_address_one",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      //goSort3_1(value1,value2,value3,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
	
}


function goSort3(value1,value2,value3,value4){
	$("#select-D").html('<div id="selectA"><a><span class="screen">'+value4+'&nbsp;<i>&nbsp;</i></span></a></div>');
	
	$("#list_baojia_xinghao").html('0'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_xinghao_baojia",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_baojia_xinghao").html(data); 
    }).error(function(){ 
      $("#list_baojia_xinghao").html('-1') 
    })
	
	data1 = value1;
    data2 = value2;
	data3 = value3;
    data4 = value4;
	saerch_baojia(data1,data2,data3,data4);
	saerch_baojia_count(data1,data2,data3,data4);
	
}


function saerch_baojia(value1,value2,value3,value4){
	$("#list_baojia_xinghao").text(''); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_saerch_baojia",{cInvName:value1,vendor:value2,cinvstd:value3,address:value4},function(data){ 
	   //alert(data);
	    data = JSON.parse(data);
      //$(".table tbody").append(data); 
	   //data = JSON.stringify(data);
	   //alert(data);
				$.each(data, function(idx, obj) {
						     //alert(obj.id);
							 dataurl = "/sjshop/index.php/Home/Baojialist/baojialist_xgh_mx?cInvName="+obj.cinvname+"&vendor="+obj.vendor+"&cInvStd="+obj.cinvstd+"&address="+obj.address
							 +"&paixu=truetime desc";
							 obj.dataurl = encodeURI(dataurl);
				});
				
					var html = Mustache.render($("#must").html(), {
						must: data
					});
					//alert(html);
	  $(".table tbody").html(html);
    }).error(function(){ 
      $("#list_baojia_xinghao").text('-1') 
    })

}


function saerch_baojia_count(value1,value2,value3,value4){
	$("#baojia_xinghao_count").text('0'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_saerch_baojia_count",{cInvName:value1,vendor:value2,cinvstd:value3,address:value4},function(data){ 
      //$(".table tbody").append(data); 
	  $("#baojia_xinghao_count").text(data);
    }).error(function(){ 
      $("#baojia_xinghao_count").text('-1') 
    })

}


function saerch_baojia_city(value){
	
	$("#list_baojia_xinghao").text(''); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_saerch_baojia_city",{city:value},function(data){ 
	   //alert(data);
	    data = JSON.parse(data);
      //$(".table tbody").append(data); 
	   //data = JSON.stringify(data);
	   //alert(data);
				//$.each(data, function(idx, obj) {
						     //alert(obj.id);
				//});
				
					var html = Mustache.render($("#must").html(), {
						must: data
					});
					//alert(html);
	  $(".table tbody").html(html);
    }).error(function(){ 
      $("#list_baojia_xinghao").text('-1') 
    })
	
}


$(".pinmin").on("click", function(){
	
	
	var data1 = '';
	var data2 = '';
	var data3 = '';
	var data4 = '';


	  var next = document.getElementById("gengduo")
      next.style.display = "none";

    $("#list_cInvName").html('<div class="list_sty">加载中</div>');

    //品名
    //向服务器发送请求(get、post) 
    $.get("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvName",'123',function(data){ 
      $("#list_cInvName").html(data); 
    }).error(function(){ 
      //当服务器出现异常时 
      $("#list_cInvName").html('<div class="list_sty">数据异常</div>') 
    })
    //品名更多
    $("#list_cInvName_more").html('<div class="list_sty">加载中</div>'); 
    $.get("/sjshop/index.php?s=/Home/Ajaxdatagh/ajax_list_cInvName_more",'123',function(data){ 
      $("#list_cInvName_more").html(data); 
    }).error(function(){ 
      $("#list_cInvNamet_more").html('<div class="list_sty">数据异常</div>') 
    })

    saerch_baojia(data1,data2,data3,data4);
	saerch_baojia_count(data1,data2,data3,data4);
	 goSort_1('cInvName','ABS');  

	
	
})

</script>


		<!--mustache模板-->
		<script type="text/html" id="must">
			
				{{#must}}
				
		            <tr class="dropdown-p" >
                    <td>{{cinvname}}</td>
                    <td>{{cinvstd}}</td>
                    <td>{{vendor}}</td>
                    <td style="color:#ff3300;font-weight:bold;">{{fprice}}</td>
                    <td>{{address}}</td>
					<!--
                    <td>{{truetime}}</td>
					--->
                    <td>
                    <span class="carte" id="ct_u4"><a data-rel="{{id}}" style="display:block; z-index:0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; height: 40px;line-height: 40px;">{{companyreferred}}</a>
       
                    <div class="supplier_tan"  id="thelayer{{id}}" style="display: none; right: 295px; z-index: 9; margin-top: -140px;">
					
                    <h2>{{thecontact}}({{companyname}})</h2>
                    <p class="business_p">
                        <span class="gray">平台总成交量：</span>
                        <span class="black">0.0吨</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">最近一次成交：</span>
                        <span class="black">暂无成交记录</span>
                    </p>
                    <p class="business_p">
                    </p>
                    <div class="clear"></div>
                    <p class="business_p">
                        <span class="gray">联系人：</span>
                        <span class="black">{{thecontact}}</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">联系方式：</span>
                        <span class="black">{{contactphone}}</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">地址：</span>
                        <span class="black">{{companyhome}}</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">企业经营理念：</span>
                        <span class="black">{{companyconcept}}</span>
                    </p>
                    <div class="business_logo">
                        <p>
                            <img src="/skin/sjzx/img/yuan.png" width="100" height="100">
                            
                        </p>
                        <p>
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                        </p>
                    </div>
                    <p class="business_p">
                        <a href="/e/space/?userid={{userid}}" class="business_a" target="_blank">进入店铺</a>
                    </p>
                    </div>
                    <div class="clear"></div>
                    </span> 
                    </td>
                    <td>
                       <a href="{{dataurl}}" class="xd2" target="_blank">{{prconut}}</a>
                   </td>
                   </tr>
				
				{{/must}}
			

		</script>


                    <span style="font-weight: 700; font-size:14px;" class="list_sty">品名:</span>
                    
					<div id ="list_cInvName" >
					
                    <div class="list_sty"><a href="javascript:goSort('cInvName','电木粉');"><span class="screen"><i>&nbsp;</i></span></a></div>
					
                    </div>	
                                      
                </span>
                <span class="gengduo" id="gengduo">
                <span class="chuanhuo_list2">
				    <div id ="list_cInvName_more" >
					  
					</div>

                </span>
                </span>
                </div>

                <div id="vendor">
                <span class="chuanhuo_list">
				    
                    <span style="font-weight: 700;font-size:14px;" class="list_sty">厂商:</span>
                    					
                    
					
                    <div id="list_vendor">
                    <div class="list_sty"><a href="javascript:goSort1('ABS','台湾奇美');"><span class="screen">台湾奇美<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','韩国LG');"><span class="screen">韩国LG<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','台湾台化');"><span class="screen">台湾台化<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','宁波台化');"><span class="screen">宁波台化<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','镇江奇美');"><span class="screen">镇江奇美<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','马来西亚东丽');"><span class="screen">马来西亚东丽<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','韩三星第一毛织（乐天）');"><span class="screen">韩三星第一毛织（乐天）<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','中石油吉化');"><span class="screen">中石油吉化<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','基础创新塑料(美国)');"><span class="screen">基础创新塑料(美国)<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort1('ABS','天津大沽化工');"><span class="screen">天津大沽化工<i>&nbsp;</i></span></a></div>
                    <span class="dianji" id="dianji3" onclick="change_div('con_two_3')">更多<img src="/skin/sjzx/img/icon2.jpg"></span>
                    </div>

                </span>
                <span id="gengduo3" class="gengduo2">
                <span class="chuanhuo_list2">
					
					        <div id="list_vendor_more">
                  <div class="list_sty"><a href="javascript:goSort1('ABS','日本东丽');"><span class="screen">日本东丽<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','日本UMG');"><span class="screen">日本UMG<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','宁波LG');"><span class="screen">宁波LG<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','LG惠州');"><span class="screen">LG惠州<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','韩国锦湖');"><span class="screen">韩国锦湖<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','日本电气化学');"><span class="screen">日本电气化学<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','德国巴斯夫');"><span class="screen">德国巴斯夫<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','台湾国乔');"><span class="screen">台湾国乔<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','台湾台达');"><span class="screen">台湾台达<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','日本TECHNO');"><span class="screen">日本TECHNO<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','韩国巴斯夫');"><span class="screen">韩国巴斯夫<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','泰国石化');"><span class="screen">泰国石化<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','美国英力士');"><span class="screen">美国英力士<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','上海高桥');"><span class="screen">上海高桥<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','广州LG');"><span class="screen">广州LG<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','德国朗盛');"><span class="screen">德国朗盛<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','中石油大庆');"><span class="screen">中石油大庆<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','辽宁华锦化工');"><span class="screen">辽宁华锦化工<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','新湖(常州)石化');"><span class="screen">新湖(常州)石化<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','基础创新塑料(沙特)');"><span class="screen">基础创新塑料(沙特)<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','泰国朗盛');"><span class="screen">泰国朗盛<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','韩国英力士苯领');"><span class="screen">韩国英力士苯领<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','日本油墨');"><span class="screen">日本油墨<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','比利时BASF');"><span class="screen">比利时BASF<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','泰国英力士苯领');"><span class="screen">泰国英力士苯领<i>&nbsp;</i></span></a></div>
                  <div class="list_sty"><a href="javascript:goSort1('ABS','美国盛禧奥（斯泰隆）');"><span class="screen">美国盛禧奥（斯泰隆）<i>&nbsp;</i></span></a></div>
                  </div> 

                </span>
                </span>
                </div>

                <div id="cInvStd">
                <span class="chuanhuo_list">
                    <span style="font-weight: 700;font-size:14px;" class="list_sty">牌号:</span>
					
                   
					
					          <div id="list_cInvStd">
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-757');"><span class="screen">PA-757<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-765A');"><span class="screen">PA-765A<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-758');"><span class="screen">PA-758<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-777D');"><span class="screen">PA-777D<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-709');"><span class="screen">PA-709<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-727');"><span class="screen">PA-727<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-747');"><span class="screen">PA-747<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-747S');"><span class="screen">PA-747S<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-709S');"><span class="screen">PA-709S<i>&nbsp;</i></span></a></div>
                    <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-765');"><span class="screen">PA-765<i>&nbsp;</i></span></a></div>
                    <span class="dianji" id="dianji2" onclick="change_div('con_two_2')">更多<img src="/skin/sjzx/img/icon2.jpg"></span></div>

                </span>
                <span id="gengduo2" class="gengduo2">
                <span class="chuanhuo_list2">
				
					       <div id="list_cInvStd_more">
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-777B');"><span class="screen">PA-777B<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-763');"><span class="screen">PA-763<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-777E');"><span class="screen">PA-777E<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-707');"><span class="screen">PA-707<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-765B');"><span class="screen">PA-765B<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-737');"><span class="screen">PA-737<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-717C');"><span class="screen">PA-717C<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-765A(副牌)');"><span class="screen">PA-765A(副牌)<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-764B');"><span class="screen">PA-764B<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-758R');"><span class="screen">PA-758R<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-764');"><span class="screen">PA-764<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-756S');"><span class="screen">PA-756S<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-757F');"><span class="screen">PA-757F<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-746');"><span class="screen">PA-746<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-756');"><span class="screen">PA-756<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-756H');"><span class="screen">PA-756H<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-718');"><span class="screen">PA-718<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-746H');"><span class="screen">PA-746H<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-763A');"><span class="screen">PA-763A<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-747R');"><span class="screen">PA-747R<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-757(副牌)');"><span class="screen">PA-757(副牌)<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-777D(副牌)');"><span class="screen">PA-777D(副牌)<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-757GJ08');"><span class="screen">PA-757GJ08<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-797');"><span class="screen">PA-797<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-707(钛白)');"><span class="screen">PA-707(钛白)<i>&nbsp;</i></span></a></div>
                 <div class="list_sty"><a href="javascript:goSort2('ABS','台湾奇美','PA-747S（钛白）');"><span class="screen">PA-747S（钛白）<i>&nbsp;</i></span></a></div>
                 </div>

                </span>
                </span>
                </div>

                <div id="cAddress">
                <span class="chuanhuo_list">
                    <span style="font-weight: 700;font-size:14px;" class="list_sty">交货地:</span>
					
                    
					
					           <div id="list_address"><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','东莞');"><span class="screen">东莞<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','深圳');"><span class="screen">深圳<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','佛山');"><span class="screen">佛山<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','中山');"><span class="screen">中山<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','东莞市');"><span class="screen">东莞市<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','广州');"><span class="screen">广州<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','惠州');"><span class="screen">惠州<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','武汉');"><span class="screen">武汉<i>&nbsp;</i></span></a></div><div class="list_sty"><a href="javascript:goSort3('ABS','台湾奇美','PA-757','珠海');"><span class="screen">珠海<i>&nbsp;</i></span></a></div></div>
				
                </span>
                <span id="gengduo4" class="gengduo2">
                    <span class="chuanhuo_list2">
					
					<div id ="list_address_more" >
					
                    <div class="list_sty"><a href="javascript:goSort2('cInvName','电木粉');"><span class="screen"><i>&nbsp;</i></span></a></div>
					
                    </div>
					
                </span>
                </span>
                </div>

                <div class="chuanhuo_list mouseoff" id="select-result">
                    <div style="font-weight: 700;font-size:14px;" class="list_sty">已选条件:</div>
                    <div id="select-A"></div>
                    <div id="select-B"></div>
                    <div id="select-C"></div>
                    <div id="select-D"></div>
                </div>
        </div>
      </div>

      <div class="seach_u2 clearfix">
        <div style="width:1200px; height:auto; margin-bottom:20px; float:left;">
              

                <div class="seach_u3">
 
                    <div class="limit_su fr">共搜到&nbsp;<b class="fcolor_8" id ="baojia_xinghao_count">0</b>&nbsp;条相关数据</div>
               </div>
            <div class="seach-table" id="tbPerson">
			
	
			
              <table class="table">
                <thead>
                    <th width="94" style="padding:8px 0px;">品名</th>
                    <th width="134" style="padding:8px 0px;">牌号</th>
                    <th width="154" style="padding:8px 0px;">厂商</th>
                    <th width="110" style="padding:8px 0px;">最低价格(元/吨)

                    </th>
                    <!-- <th width="94" style="padding:8px 0px;">数量(吨)
                       <div class="a_img">
                       <button onclick="loadXMLDoc(paixu5)" class="a_1" title="数量从低到高排列"></button>
                       <button onclick="loadXMLDoc(paixu6)" class="a_2" title="数量从高到低排列"></button>
                       </div> 
                    </th>-->
                    <!-- <th width="59" style="padding:8px 0px;">配送方式</th>
                    <th width="119" style="padding:8px 0px;">交货地址</th> 
                    <th width="104" style="padding:8px 0px;">票据</th>-->
                    <th width="82" style="padding:8px 0px;">交货地点</th>
                    <!-- <th width="54">票据</th> -->
					<!---
                    <th width="124" style="padding:8px 0px;">最新报价时间
                       <div class="a_img">
                       <button onclick="loadXMLDoc(paixu2)" class="a_1" title="时间从低到高排列"></button>
                       <button onclick="loadXMLDoc(paixu)" class="a_2" title="时间从高到低排列"></button>
                       </div>
                    </th>
					--->
                    <th width="154" style="padding:8px 0px;">最低报价供应商</th>
                    <th width="84" style="padding:8px 0px;">供应商数量</th>
                </thead>
                <input type="hidden" name="paixu" value="truetime desc" id="paixu">
                <input type="hidden" name="paixu" value="truetime" id="paixu2">
                <input type="hidden" name="paixu" value="fPrice" id="paixu3">
                <input type="hidden" name="paixu" value="fPrice desc" id="paixu4">
                <input type="hidden" name="paixu" value="fWeight" id="paixu5">
                <input type="hidden" name="paixu" value="fWeight desc" id="paixu6">
                <input type="hidden" name="cInvName" value="cInvName'" id="keyword">
                <input type="hidden" name="cInvStd" value="cInvStd" id="keyword2">
                <input type="hidden" name="vendor" value="vendor" id="keyword3">
                <input type="hidden" name="cAddress" value="cAddress" id="keyword4">
                <tbody id="seach_u10">
				


<!-- 循环开始--->
<!--
                  <tr class="dropdown-p" >
                    <td> cInvName</td>
                    <td>cInvStd</td>
                    <td>vendor</td>
                    <td style='color:#ff3300;font-weight:bold;'>fPrice</td>
                    <td>address</td>
                    <td>shijian</td>
                    <td>
                    <span class="carte" id="ct_u4"><a data-rel="id" style="display:block; z-index:0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; height: 40px;line-height: 40px;">companyReferred</a>
       
                    <div class="supplier_tan"  id="thelayerid" style="display: none;">
                    <h2>Thecontact-companyname</h2>
                    <p class="business_p">
                        <span class="gray">平台总成交量：</span>
                        <span class="black">0.0吨</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">最近一次成交：</span>
                        <span class="black">暂无成交记录</span>
                    </p>
                    <p class="business_p">
                    </p>
                    <div class="clear"></div>
                    <p class="business_p">
                        <span class="gray">联系人：</span>
                        <span class="black">Thecontact</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">联系方式：</span>
                        <span class="black">Contactphone</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">地址：</span>
                        <span class="black">companyhome</span>
                    </p>
                    <p class="business_p">
                        <span class="gray">企业经营理念：</span>
                        <span class="black">companyconcept</span>
                    </p>
                    <div class="business_logo">
                        <p>
                            <img src="/skin/sjzx/img/yuan.png" width="100" height="100">
                            
                        </p>
                        <p>
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                            <img src="/skin/sjzx/img/xing.png" width="14" height="14">
                        </p>
                    </div>
                    <p class="business_p">
                        <a href="/e/space/?userid=userid" class="business_a">进入店铺</a>
                    </p>
                    </div>
                    <div class="clear"></div>
                    </span> 
                    </td>
                    <td>
                       <a href="/e/action/gongying_zx.php" class="xd2">baojiacount</a>
                   </td>
                   </tr>
-->
<!-- 循环结束 --->



                </tbody>
              </table>

              </div>
                    <!--[!--show.listpage--]-->
              </div>
          </div>
         <!--  <div class="seach_banner"><img src="../../skin/sjzx/img/end.jpg" width="1200" height="120"></div> -->
     </div>
	 
 
<script type="text/javascript">
/*更多*/
 function change_div(id){
      if (id == 'con_two_1' )
      {
         var next = document.getElementById("gengduo")
        next.style.display = (next.style.display =="block")?"none":"block";
      }
      else if(id == 'con_two_2')
      {
         var next = document.getElementById("gengduo2") 
         next.style.display = (next.style.display =="block")?"none":"block";
      }
      else if(id == 'con_two_3')
      {
         var next = document.getElementById("gengduo3") 
         next.style.display = (next.style.display =="block")?"none":"block";
      }
      else if(id == 'con_two_4')
      {
         var next = document.getElementById("gengduo4") 
         next.style.display = (next.style.display =="block")?"none":"block";
      }
    }
</script>
<script type="text/javascript">
  function getQueryString(){
     var result = location.search.match(new RegExp("[\?\&][^\?\&]+=[^\?\&]+","g"));
     if(result == null){
         return "";
     }
     for(var i = 0; i < result.length; i++){
         result[i] = result[i].substring(1);
     }
     return result;
}
/*
function goSort(name,value){
    var string_array = getQueryString();
	alert(value);
    var oldUrl = (document.URL.indexOf("list_bjnew.php")==-1)?document.URL+"list_bjnew.php?page=1":document.URL;
    var newUrl;
    if(string_array.length>0)//如果已经有筛选条件
    {   var repeatField = false;
        for(var i=0;i<string_array.length;i++){
            if(!(string_array[i].indexOf(name)==-1)){
                repeatField = true;//如果有重复筛选条件，替换条件值
                newUrl = oldUrl.replace(string_array[i],name+"="+value);
            }
        }
        //如果没有重复的筛选字段
        if(repeatField == false){
            newUrl = oldUrl+"&"+name+"="+value;
        }
    }else
    //跳转
    window.location = newUrl;
*/
</script> 
<script type="text/javascript">
/*鼠标弹出*/
  function toushu(){ 
   if(owner_id==""){owner_id=this.getAttribute('data-id')}
   if(className==""){className=this.className;}
   new PopUpDiv(owner_id,className,this).execute();
  }

function AutoUp(arry){
  this.arry=arry;
  this.iNow=true;
  this.browser=navigator.appVersion;
  }
AutoUp.prototype.show=function(){
  var _this=this,Num=0;
  //alert(this.arry.length);
  for(var i=0;i<this.arry.length;i++){
    this.arry[i].index;
    this.arry[i].onmouseover=function(){
      Num=this.getElementsByTagName('a')[0].getAttribute("data-rel");
      var obj=document.getElementById("thelayer"+Num);
       //obj.style.left=this.getElementsByTagName('a')[1].offsetWidth+'px';
       obj.style.right=295+'px';
       obj.style.display='block';
       obj.style.zIndex=9;
       //obj.style.marginTop=-obj.offsetHeight/2+'px';
       obj.style.marginTop=-140+'px';
      };
    this.arry[i].onmouseout=function(){
       //alert(Num);
       document.getElementById("thelayer"+Num).style.display="none";
      }
  }
  }
new AutoUp(getByClass(document.getElementById('tbPerson'),"carte")).show();//鼠标进出弹出，移出消失

</script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/search.js"></script>
 <!--[if lte IE 9]>
         <script type="text/javascript" src="/skin/sjzx/js/ie8.js"></script>
 <![endif]-->

<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/public.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/tab.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/tab4.js"></script>


<script src="/sjshop/Public/New_style/skin/sjzx/js/mustache.js" type="text/javascript" charset="utf-8"></script>
<script src="/sjshop/Public/New_style/skin/sjzx/js/pinming.js" type="text/javascript" charset="utf-8"></script>	
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/dropdown.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/shuaixuan.js"></script>
<script>

$(function(){
/*	
	$(".table tbody").on("mouseenter",".carte ",function(e){
		//var h=$(this).find(".supplier_tan").show();
		var h=$(this).find(".supplier_tan").css("display","block")
	});
	$(".table tbody ").on("mouseout",".carte",function(){
	
		$(this).find(".supplier_tan").hide();
		
	});
*/

    $(".table tbody").on("mouseenter",".carte ",function(e){
		
	
		var h=$(this).find(".supplier_tan").show();

	});
	
	$(".table tbody").on("mouseleave",".dropdown-p",function(e){
		
		$(e.delegateTarget).find(".supplier_tan").hide();
		
	
	
	});

	
	
})

$("#list_cInvName >.list_sty,.chuanhuo_list,.gengduo2,.gengduo").on("mouseenter", "a", function() {
        //$(this).css("position","relative");
        var div = document.createElement("div");
        div.className = "tooltip";
        div.innerText = $(this).text();
        div.style.border = "1px solid #ddd";
        div.style.borderRadius = "5px";
        div.style.position = "absolute";
        div.style.background = "#fff";
        div.style.padding = "3px 10px ";
        div.style.height = "30px";
        div.style.lineHeight = "30px";
        div.style.boxShadow = "2px 2px 5px #ddd,-2px 0px 5px #ddd";
        div.style.zIndex = "999";
        //  div.style.left= "10px";
        div.style.width = "auto";

        $(this).append(div);

        return false;

      });

      $("#list_cInvName >.list_sty,.chuanhuo_list,.gengduo2,.gengduo").on("mouseleave", "a", function() {
        $(this).find(".tooltip").remove();
      });

$(".chuanhuo_list.mouseoff").off("mouseenter");

</script> 
<!-- 尾部 -->
<?php echo W('Default/webfooter');?>