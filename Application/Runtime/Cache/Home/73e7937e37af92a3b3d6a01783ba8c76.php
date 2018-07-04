<?php if (!defined('THINK_PATH')) exit(); echo W('Default/webheader');?> 


<link rel="stylesheet" type="text/css" href="/sjshop/Public/New_style/skin/sjzx/css/iconfont.css"/>



<div class="clear"></div>


<div class="clear"></div>
   <div class="seach_content">   
      <div class="clear"></div>
      <div class="lpart_position">
      您现在的位置：
      <a href="/">首页</a> &gt; 市场报价 &gt;
      香港期货
     </div>
      <div class="chuanhuo_top" id="chuanhuo_top">
        <div class="chuanhuo_title"><span>市场</span>报价</div>
        <div class="chuanhuo_ct">
            <div id="cInvName">
            <span class="chuanhuo_list">

            
                    <span style="font-weight: 700; font-size:14px;" class="list_sty">品名:</span>
                    <!-- <div class="list_sty"><a href="javascript:goSort('cInvName','全部');"><span class="screen">全部<i>&nbsp;</i></span></a></div> -->
                   <div id ="list_cInvName" >
          
          
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
                              
                    <!-- <div class="list_sty"><a href="javascript:;"><span class="screen">全部<i>&nbsp;</i></span></a></div> -->
          
                    <div id="list_vendor">
                    </div>

                </span>
                <span id="gengduo3" class="gengduo2">
                <span class="chuanhuo_list2">
          
                  <div id="list_vendor_more">
                  </div> 

                </span>
                </span>
                </div>

                <div id="cInvStd">
                <span class="chuanhuo_list">
                    <span style="font-weight: 700;font-size:14px;" class="list_sty">牌号:</span>
          
                    <!-- <div class="list_sty"><a href="javascript:;"><span class="screen">全部<i>&nbsp;</i></span></a></div> -->
          
                    <div id="list_cInvStd">
                    </div>

                </span>
                <span id="gengduo2" class="gengduo2">
                <span class="chuanhuo_list2">
        
                 <div id="list_cInvStd_more">

                 </div>

                </span>
                </span>
                </div>

                <div id="cAddress">
                <span class="chuanhuo_list">
                    <span style="font-weight: 700;font-size:14px;" class="list_sty">交货地:</span>
          
                    <!-- <div class="list_sty"><a href="javascript:;"><span class="screen">全部<i>&nbsp;</i></span></a></div> -->
          
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
                <div class="chuanhuo_list" id="select-result">
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
                    <th width="110" style="padding:8px 0px;">最低价格(美元/公吨)
                       <!-- <div class="a_img">
                       <button onclick="loadXMLDoc(paixu3)" class="a_1" title="价格从低到高排列"></button>
                       <button onclick="loadXMLDoc(paixu4)" class="a_2" title="价格从高到低排列"></button>
                       </div> -->
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

                    <th width="154" style="padding:8px 0px;">最低报价供应商</th>
                    <th width="84" style="padding:8px 0px;">供应商数量</th>
                </thead>
                <input type="hidden" name="paixu" value="truetime desc" id="paixu">
                <input type="hidden" name="paixu" value="truetime" id="paixu2">
                <input type="hidden" name="paixu" value="fPrice" id="paixu3">
                <input type="hidden" name="paixu" value="fPrice desc" id="paixu4">
                <input type="hidden" name="paixu" value="fWeight" id="paixu5">
                <input type="hidden" name="paixu" value="fWeight desc" id="paixu6">
                <input type="hidden" name="cInvName" value="<?php echo $_GET['cInvName']?>" id="keyword">
                <input type="hidden" name="cInvStd" value="<?php echo $_GET['cInvStd']?>" id="keyword2">
                <input type="hidden" name="vendor" value="<?php echo $_GET['vendor']?>" id="keyword3">
                <input type="hidden" name="cAddress" value="<?php echo $_GET['cAddress']?>" id="keyword4">
                <tbody id="seach_u10">

                </tbody>
              </table>

              </div>
                    <!--[!--show.listpage--]-->
              </div>
          </div>
         <!--  <div class="seach_banner"><img src="../../skin/sjzx/img/end.jpg" width="1200" height="120"></div> -->
     </div>

	 
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

<script>
$(function(){
    $(".table tbody").on("mouseenter",".carte ",function(e){
    var h=$(this).find(".supplier_tan").show();
  });
  $(".table tbody").on("mouseleave",".dropdown-p",function(e){  
    $(e.delegateTarget).find(".supplier_tan").hide();
  });
  
})
</script>
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
    $.get("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvName",'123',function(data){ 
      $("#list_cInvName").html(data); 
    }).error(function(){ 
      //当服务器出现异常时 
      $("#list_cInvNamet").html('<div class="list_sty">数据异常</div>') 
    })
    //品名更多
    $("#list_cInvName_more").html('<div class="list_sty">加载中</div>'); 
    $.get("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvName_more",'123',function(data){ 
      $("#list_cInvName_more").html(data); 
    }).error(function(){ 
      $("#list_cInvNamet_more").html('<div class="list_sty">数据异常</div>') 
    })
 
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
    ajax_xgqh_baojia(data1,data2,data3,data4);
  ajax_xgqh_baojia_count(data1,data2,data3,data4);
  goSort_1('cInvName','ABS'); 
     
}) 




function goSort(name,value){  
    $("#select-A").html('<div id="selectA"><a><span class="screen">'+value+'&nbsp;<i>&nbsp;</i></span></a></div>'); 
  $("#select-B").html('');
  $("#select-C").html('');
  $("#select-D").html('');
 
    $("#list_vendor").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_vendor",{cInvName:value},function(data){ 
      $("#list_vendor").html(data); 
    }).error(function(){ 
      $("#list_vendor").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_vendor_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_vendor_more",{cInvName:value},function(data){ 
      $("#list_vendor_more").html(data); 
    }).error(function(){ 
      $("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = value;
    data2 = '';
  data3 = '';
    data4 = '';
  ajax_xgqh_baojia(data1,data2,data3,data4);
  ajax_xgqh_baojia_count(data1,data2,data3,data4);

  $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_vendor_one",{cInvName:value},function(data){ 
      goSort1_1(value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
}


function goSort_1(name,value){  
    $("#list_vendor").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_vendor",{cInvName:value},function(data){ 
      $("#list_vendor").html(data); 
    }).error(function(){ 
      $("#list_vendor").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_vendor_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_vendor_more",{cInvName:value},function(data){ 
      $("#list_vendor_more").html(data); 
    }).error(function(){ 
      $("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = value;
    data2 = '';
  data3 = '';
    data4 = '';
  $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_vendor_one",{cInvName:value},function(data){ 
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
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvStd",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd").html(data); 
    }).error(function(){ 
      $("#list_cInvStd").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_cInvStd_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvStd_more",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd_more").html(data); 
    }).error(function(){ 
      $("#list_cInvStd_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = name;
    data2 = value;
  data3 = '';
    data4 = '';
  ajax_xgqh_baojia(data1,data2,data3,data4);
  ajax_xgqh_baojia_count(data1,data2,data3,data4);
  $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvStd_one",{cInvName:name,vendor:value},function(data){ 
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
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvStd",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd").html(data); 
    }).error(function(){ 
      $("#list_cInvStd").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_cInvStd_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvStd_more",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd_more").html(data); 
    }).error(function(){ 
      $("#list_cInvStd_more").html('<div class="list_sty">数据异常</div>') 
    }) 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_cInvStd_one",{cInvName:name,vendor:value},function(data){ 
      goSort2_1(name,value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
}

function goSort2(value1,value2,value3){
  
  $("#select-C").html('<div id="selectA"><a><span class="screen">'+value3+'&nbsp;<i>&nbsp;</i></span></a></div>');
  $("#select-D").html('');
  $("#list_address").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_address",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address").html(data); 
    }).error(function(){ 
      $("#list_address").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_address_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_address_more",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address_more").html(data); 
    }).error(function(){ 
      $("#list_address_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = value1;
    data2 = value2;
  data3 = value3;
    data4 = '';
  ajax_xgqh_baojia(data1,data2,data3,data4);
  ajax_xgqh_baojia_count(data1,data2,data3,data4);
  $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_address_one",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
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
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_address",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address").html(data); 
    }).error(function(){ 
      $("#list_address").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_address_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_address_more",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address_more").html(data); 
    }).error(function(){ 
      $("#list_address_more").html('<div class="list_sty">数据异常</div>') 
    })
   $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_list_address_one",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      //goSort3_1(value1,value2,value3,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
}


function goSort3(value1,value2,value3,value4){
  $("#select-D").html('<div id="selectA"><a><span class="screen">'+value4+'&nbsp;<i>&nbsp;</i></span></a></div>');
  
  $("#list_baojia_xinghao").html('0'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata3/ajax_xinghao_baojia",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_baojia_xinghao").html(data); 
    }).error(function(){ 
      $("#list_baojia_xinghao").html('-1') 
    })
  
  data1 = value1;
    data2 = value2;
  data3 = value3;
    data4 = value4;
  ajax_xgqh_baojia(data1,data2,data3,data4);
  ajax_xgqh_baojia_count(data1,data2,data3,data4);
  
}


function ajax_xgqh_baojia(value1,value2,value3,value4){
  $("#list_baojia_xinghao").text(''); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_xgqh_baojia",{cInvName:value1,vendor:value2,cinvstd:value3,address:value4},function(data){ 
      //$(".table tbody").append(data); 
    $(".table tbody").html(data);
    }).error(function(){ 
      $("#list_baojia_xinghao").text('-1') 
    })

}


function ajax_xgqh_baojia_count(value1,value2,value3,value4){
  $("#baojia_xinghao_count").text('0'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_xgqh_baojia_count",{cInvName:value1,vendor:value2,cinvstd:value3,address:value4},function(data){ 
      //$(".table tbody").append(data); 
    $("#baojia_xinghao_count").text(data);
    }).error(function(){ 
      $("#baojia_xinghao_count").text('-1') 
    })

}

</script>
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
function goSort(name,value){
    var string_array = getQueryString();
    var oldUrl = (document.URL.indexOf("list_bj.php")==-1)?document.URL+"list_bj.php?page=1":document.URL;
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
}
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
</script>
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
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/fuchuang.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/search.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/tab4.js"></script>
<!-- 尾部 -->
<?php echo W('Default/webfooter');?>