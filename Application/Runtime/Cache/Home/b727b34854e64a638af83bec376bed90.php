<?php if (!defined('THINK_PATH')) exit(); echo W('Default/webheader');?> 

<div class="clear"></div>
   <div class="seach_content">   
      <div class="clear"></div>
     
	 
	<script type="text/javascript">
var data1 = '';
var data2 = '';
var data3 = '';
var data4 = '';
var data5 = '';
var data6 = '';
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
    $.get("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvName",'123',function(data){ 
      $("#list_cInvName").html(data); 
    }).error(function(){ 
      //当服务器出现异常时 
      $("#list_cInvNamet").html('<div class="list_sty">数据异常</div>') 
    })
    //品名更多
    $("#list_cInvName_more").html('<div class="list_sty">加载中</div>'); 
    $.get("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvName_more",'123',function(data){ 
      $("#list_cInvName_more").html(data); 
    }).error(function(){ 
      $("#list_cInvNamet_more").html('<div class="list_sty">数据异常</div>') 
    })
    saerch_baojia_text(data1,data2,data3,data4,data5,data6);
    saerch_baojia_text_count(data1,data2,data3,data4,data5,data6);
     
}) 




function goSort(name,value){  
    $("#select-A").html('<div id="selectA"><a><span class="screen">'+value+'&nbsp;<i>&nbsp;</i></span></a></div>'); 
  $("#select-B").html('');
  $("#select-C").html('');
  $("#select-D").html('');
 
    $("#list_vendor").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor",{cInvName:value},function(data){ 
      $("#list_vendor").html(data); 
    }).error(function(){ 
      $("#list_vendor").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_vendor_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor_more",{cInvName:value},function(data){ 
      $("#list_vendor_more").html(data); 
    }).error(function(){ 
      $("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = value;
    data2 = '';
  data3 = '';
    data4 = '';
    data5 = '';
    data6 = '';
  saerch_baojia_text(data1,data2,data3,data4,data5,data6);
  saerch_baojia_text_count(data1,data2,data3,data4,data5,data6);

  $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor_one",{cInvName:value},function(data){ 
      goSort1_1(value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  
}

function goSort_1(name,value){  
    $("#list_vendor").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor",{cInvName:value},function(data){ 
      $("#list_vendor").html(data); 
    }).error(function(){ 
      $("#list_vendor").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_vendor_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor_more",{cInvName:value},function(data){ 
      $("#list_vendor_more").html(data); 
    }).error(function(){ 
      $("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = value;
    data2 = '';
  data3 = '';
    data4 = '';
    data5 = '';
    data6 = '';
  $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_vendor_one",{cInvName:value},function(data){ 
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
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd").html(data); 
    }).error(function(){ 
      $("#list_cInvStd").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_cInvStd_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd_more",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd_more").html(data); 
    }).error(function(){ 
      $("#list_cInvStd_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = name;
    data2 = value;
  data3 = '';
    data4 = '';
    data5 = '';
    data6 = '';
  saerch_baojia_text(data1,data2,data3,data4,data5,data6);
  saerch_baojia_text_count(data1,data2,data3,data4,data5,data6);

  $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd_one",{cInvName:name,vendor:value},function(data){ 
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
    data5 = '';
    data6 = '';
  
  $("#list_cInvStd").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd").html(data); 
    }).error(function(){ 
      $("#list_cInvStd").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_cInvStd_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd_more",{cInvName:name,vendor:value},function(data){ 
      $("#list_cInvStd_more").html(data); 
    }).error(function(){ 
      $("#list_cInvStd_more").html('<div class="list_sty">数据异常</div>') 
    }) 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_cInvStd_one",{cInvName:name,vendor:value},function(data){ 
      goSort2_1(name,value,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
}


function goSort2(value1,value2,value3){
  
  $("#select-C").html('<div id="selectA"><a><span class="screen">'+value3+'&nbsp;<i>&nbsp;</i></span></a></div>');
  $("#select-D").html('');
  $("#list_address").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address").html(data); 
    }).error(function(){ 
      $("#list_address").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_address_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address_more",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address_more").html(data); 
    }).error(function(){ 
      $("#list_address_more").html('<div class="list_sty">数据异常</div>') 
    })
  
  data1 = value1;
    data2 = value2;
  data3 = value3;
    data4 = '';
    data5 = '';
    data6 = '';
  saerch_baojia_text(data1,data2,data3,data4,data5,data6);
  saerch_baojia_text_count(data1,data2,data3,data4,data5,data6);

  $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address_one",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
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
    data5 = '';
    data6 = '';
   
   $("#list_address").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address").html(data); 
    }).error(function(){ 
      $("#list_address").html('<div class="list_sty">数据异常</div>') 
    })
  
  $("#list_address_more").html('<div class="list_sty">加载中</div>'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address_more",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_address_more").html(data); 
    }).error(function(){ 
      $("#list_address_more").html('<div class="list_sty">数据异常</div>') 
    })
   $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_list_address_one",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      //goSort3_1(value1,value2,value3,data);
    }).error(function(){ 
      //$("#list_vendor_more").html('<div class="list_sty">数据异常</div>') 
    })
}


function goSort3(value1,value2,value3,value4){
  $("#select-D").html('<div id="selectA"><a><span class="screen">'+value4+'&nbsp;<i>&nbsp;</i></span></a></div>');
  
  $("#list_baojia_xinghao").html('0'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/ajax_xinghao_baojia",{cInvName:value1,vendor:value2,cinvstd:value3},function(data){ 
      $("#list_baojia_xinghao").html(data); 
    }).error(function(){ 
      $("#list_baojia_xinghao").html('-1') 
    })
  
  data1 = value1;
    data2 = value2;
  data3 = value3;
    data4 = value4;
    data5 = '';
    data6 = '';
  saerch_baojia_text(data1,data2,data3,data4,data5,data6);
  saerch_baojia_text_count(data1,data2,data3,data4,data5,data6);
  
}


function saerch_baojia_text(value1,value2,value3,value4,value5,value6){
  $("#list_baojia_xinghao").text(''); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/saerch_baojia_text",{cInvName:value1,vendor:value2,cinvstd:value3,address:value4,keyboard:'<?php echo $keyboard;?>',classid:'<?php echo $classid;?>'},function(data){ 
      //$(".table tbody").append(data); 
      //data = JSON.parse(data);
      /*var html = Mustache.render($("#must").html(), {
            must: data
          });*/
    $(".table tbody").html(data);
    }).error(function(){ 
      $("#list_baojia_xinghao").text('-1') 
    })
}

function saerch_baojia_text_count(value1,value2,value3,value4,value5,value6){
  $("#baojia_xinghao_count").text('0'); 
    $.post("/sjshop/index.php?s=/Home/Ajaxdata/saerch_baojia_text_count",{cInvName:value1,vendor:value2,cinvstd:value3,address:value4,keyboard:'<?php echo $keyboard;?>',classid:'<?php echo $classid;?>'},function(data){ 
      //$(".table tbody").append(data); 
    $("#baojia_xinghao_count").text(data);
    }).error(function(){ 
      $("#baojia_xinghao_count").text('-1') 
    })

}

</script> 

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
                    <th width="124" style="padding:8px 0px;"><!-- <span style="text-indent: 0px;width:100px;"> --><?php if($classid=="1"){echo "最低价格(元/吨)";}else{echo "最低价格(美元/公吨)";}?><!-- </span> -->
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
                    </th> -->
                    <!-- <th width="62" style="padding:8px 0px;">票据</th>
                    <th width="59" style="padding:8px 0px;">配送方式</th>
                    <th width="119" style="padding:8px 0px;">交货地址</th>-->
                    <th width="82" style="padding:8px 0px;">交货地点</th>
                    <!-- <th width="54">票据</th> -->
                    <th width="124" style="padding:8px 0px;"><!-- <span style="width:90px;"> -->最新报价时间<!-- </span> -->
                       <!-- <div class="a_img">
                       <button onclick="loadXMLDoc(paixu2)" class="a_1" title="时间从低到高排列"></button>
                       <button onclick="loadXMLDoc(paixu)" class="a_2" title="时间从高到低排列"></button>
                       </div> -->
                    </th>
                    <th width="154" style="padding:8px 0px;">最新报价供应商</th>
                    <th width="94" style="padding:8px 0px;">供应商数量</th>
                </thead>
                <input type="hidden" name="paixu" value="truetime desc" id="paixu">
                <input type="hidden" name="paixu" value="truetime" id="paixu2">
                <tbody id="seach_u10">


                </tbody>
</table>

               </div>
             </div>
          </div>
         <!--  <div class="seach_banner"><img src="../../skin/sjzx/img/end.jpg" width="1200" height="120"></div> -->
     </div>

<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/search.js"></script>	 
<?php echo W('Default/webfooter');?>