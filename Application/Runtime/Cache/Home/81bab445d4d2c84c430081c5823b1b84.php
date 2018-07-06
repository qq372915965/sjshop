<?php if (!defined('THINK_PATH')) exit(); echo W('Default/webheader');?> 


<!--显示电话号码-->
<link rel="stylesheet" type="text/css" href="/sjshop/Public/New_style/skin/sjzx/css/phone/showphone.css" />
<!--显示电话号码icon-->
<link rel="stylesheet" type="text/css" href="/sjshop/Public/New_style/skin/sjzx/css/phone/iconfont.css" />

<div class="clear"></div>
  <div class="supply_content">
    <div class="supply_content_list">
      <div class="supply_content_position">
        当前位置：<a href="/">首页</a>&nbsp;>&nbsp;<a href="/e/action/ListInfo/list_bj.php?paixu=id">市场报价</a>&nbsp;>&nbsp;<span class="supply_cp"><?php echo $cInvName; ?>&nbsp;<?php echo $vendor; ?>&nbsp;<?php echo $cInvStd; ?>&nbsp;<?php echo $address; ?>&nbsp;原料报价</span>
      </div>
      <div class="supply_info">
        <h3 class="supply_info_cp"><?php echo $cInvName; ?>&nbsp;<?php echo $vendor; ?>&nbsp;<?php echo $cInvStd; ?>&nbsp;<?php echo $address; ?></h3>
        <div class="supply_info_left">
          <div class="bdsharebuttonbox fl bdshare-button-style0-16" data-bd-bind="1488686608079">
            <span class="fl">分享到:&nbsp;</span>
            <a href="" class="bds_more" data-cmd="more"></a>
                        <a href="" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        <a href="" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a href="" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                        <a href="" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                        <a href="" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
          </div>
  
        </div>
      </div>
      <div class="supply_quotation">
        
      </div>
<script type="text/javascript">
/*$(document).ready(function(){ 
  $(".supply_allinfo_list a").each(function(){ 
    $this = $(this);
    if($this[0].href==String(window.location)){
      var aa=$this[0].href.indexOf("desc");
      if(aa==-1){
         $this.addClass("general"); 
       }else{
         $this.addClass("general2"); 
       }
    } 
  }); 
}); */
</script>
      <div class="supply_allinfo">
         <div class="supply_allinfo_one">
            <a href="gongying_zxfp.php?cInvName=<?php echo $cInvName;?>&vendor=<?php echo $vendor;?>&cInvStd=<?php echo $cInvStd;?>(2)&address=<?php echo $address;?>&paixu=truetime desc" target="_blank">查看副牌报价</a>
          </div>

        <table class="supply_table" id="tbPerson">
          <input type="hidden" name="paixu" value="truetime desc" id="paixu">
          <input type="hidden" name="paixu" value="fPrice" id="paixu3">
          <input type="hidden" name="paixu" value="fPrice desc" id="paixu4">
          <input type="hidden" name="paixu" value="fWeight" id="paixu5">
          <input type="hidden" name="paixu" value="fWeight desc" id="paixu6">
          <input type="hidden" name="cInvName" value="<?php echo $_GET['cInvName']?>" id="keyword">
          <input type="hidden" name="vendor" value="<?php echo $_GET['vendor']?>" id="keyword2">
          <input type="hidden" name="cInvStd" value="<?php echo $_GET['cInvStd']?>" id="keyword3">
          <thead>
          <tr class="odd">
            <!-- <th width="95">品种</th>
            <th width="127">牌号</th>
            <th width="158">厂商</th> -->
            <th width="125"><span style="text-indent: 0px;padding-left:5px;width:75px;">价格(元/吨)</span>
                       <div class="a_img">
                       <button onclick="JavaScript:sortTable('tbPerson',0,'float',0)" class="a_1" title="价格从低到高排列"></button>
                       <button onclick="JavaScript:sortTable('tbPerson',0,'float',1)" class="a_2" title="价格从高到低排列"></button>
                       </div></th>
            <th width="100"><span style="width:65px;">数量(吨)</span>
                       <div class="a_img">
                       <button onclick="JavaScript:sortTable('tbPerson',1,'float',0)" class="a_1" title="数量从低到高排列"></button>
                       <button onclick="JavaScript:sortTable('tbPerson',1,'float',1)" class="a_2" title="数量从高到低排列"></button>
                       </div></th>
            <th width="100">发布时间</th>
            <th width="120">票据</th>           
            <th width="95">配送方式</th>
            <th width="140">交货地点</th>
            <th width="100">供应商</th>
            <th width="120">联系方式</th>
            <th width="200">我要采购</th>
           <!--  <th>投诉</th> -->
          </tr>
          </thead>
          <tbody id="seach_u10">
            


<?php if(is_array($data)): foreach($data as $key=>$value): ?><tr class='even' style='position: relative !important;'>
      <!-- <td><a href='/e/action/Show.php?id=<?php echo $value['id']?>' onclick='visitor_click(this)' class='visitor' target="_blank"><?php echo $value['cInvName']?></a></td>
      <td><?php echo $value['cInvStd']?></td>
      <td><?php echo $value['vendor']?></td> -->
      <td style='color:red;font-weight: bold;'><?php echo $value['fprice']?></td>
      <td><?php echo $value['fweight']?></td>
      <td><?php  $a=time(); $d=date('Y-m-d H:i:s', $value['truetime']); $minute=floor(($a-strtotime($d))/60); if($minute<1){ $shijian = "刚刚"; } if($minute<60&&$minute>=1){ $shijian = $minute."分钟前"; } if($minute<1440&&$minute>60){ $aa= floor($minute/60); $shijian= intval($aa)."小时前"; } if($minute>1440){ $bb= floor($minute/60/24); $shijian = intval($bb)."天前"; }; echo $shijian;?></td>
      <td><?php echo $value['piaoju']?></td>
      <td><?php echo $value['delivery']?></td>
      <td><?php echo $value['address']?>-<?php echo $value['district']?></td>
      <td style='position: relative !important;'>
          <span class='carte' id='ct_u4'><a data-rel='<?php echo $value['id']?>' style='display:block; z-index:0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; height: 40px;line-height: 40px;'><?php echo $value['companyreferred']?></a>
              <div class='supplier_tan'  id='thelayer<?php echo $value['id']?>' style='display: none;'>
              <h2><?php echo $value['thecontact']?>(<?php echo $value['companyname']?>)</h2>
              <p class='business_p'>
                  <span class='gray'>平台总成交量：</span>
                  <span class='black'>0.0吨</span>
              </p>
              <p class='business_p'>
                  <span class='gray'>最近一次成交：</span>
                  <span class='black'>暂无成交记录</span>
              </p>
              <p class='business_p'>
              </p>
              <div class='clear'></div>
              <p class='business_p'>
                  <span class='gray'>联系人：</span>
                  <span class='black'><?php echo $value['thecontact']?></span>
              </p>
              <!-- <p class='business_p'>
                  <span class='gray'>联系方式：</span>
                  <span class='black'><?php echo $value['contactphone']?></span>
              </p> -->
              <p class='business_p'>
                  <span class='gray'>地址：</span>
                  <span class='black'><?php echo $value['companyhome']?></span>
              </p>
              <p class='business_p'>
                  <span class='gray'>企业经营理念：</span>
                  <span class='black'><?php echo $value['companyconcept']?></span>
              </p>
              <div class='business_logo'>
              <p>
                  <img src='/skin/sjzx/img/yuan.png' width='100' height='100'>
                  
              </p>
              <p>
                  <img src='/skin/sjzx/img/xing.png' width='14' height='14'>
                  <img src='/skin/sjzx/img/xing.png' width='14' height='14'>
                  <img src='/skin/sjzx/img/xing.png' width='14' height='14'>
                  <img src='/skin/sjzx/img/xing.png' width='14' height='14'>
                  <img src='/skin/sjzx/img/xing.png' width='14' height='14'>
              </p>
              </div>
              <p class='business_p'>
              <a href='/e/space/?userid=<?php echo $value['userid']?>' class='business_a' target="_blank">进入店铺</a>
              </p>
              </div>
                 <div class='clear'></div>
              </span>
          </td>
      <td>
          <!--显示电话号码-->
          <button class="phone-modal-btn" type="button" data-id="<?php echo $value['id']?>" data-name="<?php echo $value['thecontact']?>" data-vendor="<?php echo $value['companyname']?>">
              <span class="iconfont icon-dianhua"></span>
              <span class="phone">联系卖家</span>
          </button>
      </td>
      <td>


      <a target="_blank" href="/sjshop/index.php/Home/Chat/chat_line?user_ida=<?php echo $lguserid?>&user_idb=<?php echo $value['userid']?>" class='supply_table_a'>立即洽谈</a>
      <a target="_blank" class='supply_table_a' style="margin-left:8px;cursor:pointer;" id="join_cart" data-id="<?php echo $value['id']?>">加入购物车</a>
      </td></tr><?php endforeach; endif; ?>
      <!--<tr><td>没有相关信息</td></tr>-->


          </tbody>
        </table>
      </div>

 <div id="fade" class="black_overlay"></div>





    </div>
  </div>

<script>
    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script> 
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/fuchuang.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/search.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/tab4.js"></script>


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
  for(var i=0;i<this.arry.length;i++){
    this.arry[i].index;
    this.arry[i].onmouseover=function(){
      Num=this.getElementsByTagName('a')[0].getAttribute("data-rel");
      var obj=document.getElementById("thelayer"+Num);
       //obj.style.left=this.getElementsByTagName('a')[1].offsetWidth+'px';
       obj.style.right=100+'px';
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

<!--点击显示电话码 -->
<script src="/sjshop/Public/New_style/skin/sjzx/js/phone/showhpone.js" type="text/javascript" charset="utf-8"></script>

<!--点击加入购物车 -->
<script type="text/javascript">
  $(function(){
    $(".even").on("click","#join_cart",function(){
      var data_id=$(this).attr("data-id");
      var userid="<?php echo $userid;?>";
      var type_case = 1; // 大陆现货
      if(userid==0){
        alert("请先登录");
        window.location.href='/e/member/login/';
        return;
      }
      $.post("/weixin/index.php/Home/Postsend/member_info",{id:data_id,userid:userid,type_case:type_case},function(data){
          if(data){
            alert("加入成功!");
          }
          //window.open("/sjshop/index.php/Home/Cart/cart");
      })
    });
    // 没登入隐藏购物车
    var user_id="<?php echo $userid;?>";
    if(user_id == 0){
      $('.hide_cart').hide();
    }
      
})

 

</script>

<!--madal 弹出框 -->
    <div class="phone-modal">
      <div class="phone-modal-mask"></div>

      <!-- 显示电话号码 start-->
      <div class=" phone-modal-box" data-url="/weixin/index.php/Home/Phone/phone_ax" data-text="号码加载中..." data-time="180" data-id="0">
        <h4>
          查看联系方式
          <span class="phone-modal-close">&times;</span> 
        </h4>
        
        <div style="padding:10px 30px 0px 30px;font-size:13px;color:red;">商家名称：<span class="vendor-name"></span></div>
        <div style="padding:10px 30px 0px 30px;font-size:13px;color:red;">联系人：<span class="phone-name"></span></div>
        
        <div class="phone-modal-call" style="margin-top:10px;">
          <div class="tel">
            <span class="iconfont icon-dianhua"></span>
            <span class="num">13899998888</span>
          </div>
          
          <div class="tel-txt">
            电话<span class="time">180</span>s后失效,请尽快拨打.
          </div>
          
        </div>

        <div style="padding:10px 30px 0px 30px;font-size:13px;color:red;">温馨提示：此号码不支持回拨及收发短信功能。</div>
        
        <div class="phone-wx">
          <p style="margin:20px 0px;">您可以微信扫一扫下方的二维码<span class="gz">关注我们</span>,请客服协助</p>
          
          <img src="/skin/sjzx/img/wx.png" alt="微信图" />
          
        </div>

      </div>
      <!-- 显示电话号码 end-->
</div>



<?php echo W('Default/webfooter');?>