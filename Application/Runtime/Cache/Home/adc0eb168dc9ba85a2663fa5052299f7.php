<?php if (!defined('THINK_PATH')) exit(); echo W('Default/webheader');?> 
 


<div class="clear"></div>



  <div class="supply_content">
    <div class="supply_content_list">
      <div class="supply_content_position">
        当前位置：<a href="/">首页</a>&nbsp;>&nbsp;<a href="/e/action/ListInfo/list_bj.php?paixu=id">市场报价</a>&nbsp;>&nbsp;<span class="supply_cp"><?php echo $cInvName; ?>&nbsp;<?php echo $vendor; ?>&nbsp;<?php echo $cInvStd; ?>&nbsp;<?php echo $address; ?>&nbsp;报价</span>
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
          <script>
             window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
          </script>   
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
            <!-- <a href="gongying_zxfp.php?cInvName=<?php echo $cInvName;?>&vendor=<?php echo $vendor;?>&cInvStd=<?php echo $cInvStd;?>(2)&address=<?php echo $address;?>&paixu=truetime desc" target="_blank">查看副牌报价</a> -->
          </div>
        <!-- <div class="supply_allinfo_one">
          <div class="supply_allinfo_list" id="supply_allinfo_list">
            <div class="general_div">
                <span>时间</span>
                <div class="a_img">
                    <a href="gongying_bj.php?companyname=<?php echo $companyname;?>&paixu=truetime" class="a_1" title="时间从低到高排列"></a>
                    <a href="gongying_bj.php?companyname=<?php echo $companyname;?>&paixu=truetime desc" class="a_2" title="时间从高到低排列"></a>
                </div>
            </div> 
            <div class="general_div">
                <span>价格</span>
                <div class="a_img">
                    <a href="gongying_bj.php?companyname=<?php echo $companyname;?>&paixu=fPrice" class="a_1" title="价格从低到高排列"></a>
                    <a href="gongying_bj.php?companyname=<?php echo $companyname;?>&paixu=fPrice desc" class="a_2" title="价格从高到低排列"></a>
                </div>
            </div>
            <div class="general_div">
                <span>数量</span>
                <div class="a_img">
                    <a href="gongying_bj.php?companyname=<?php echo $companyname;?>&paixu=fWeight" class="a_1" title="数量从低到高排列"></a>
                    <a href="gongying_bj.php?companyname=<?php echo $companyname;?>&paixu=fWeight desc" class="a_2" title="数量从高到低排列"></a>
                </div>
            </div>
        
          </div>
        </div> -->
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
            <th width="95">供应商</th>
            <th width="127">联系人</th>
            <th width="158">主营产品</th>
            <th width="96">地址</th>
            <th width="98">供应商简称</th>
            <th width="92">我要采购</th>
           <!--  <th>投诉</th> -->
          </tr>
          </thead>
          <tbody id="seach_u10">
            


<?php if(is_array($data)): foreach($data as $key=>$value): ?><tr class='even' style='position: relative !important;'>
      <td><?php echo $value['companyname']?></td>
      <td><?php echo $value['thecontact']?></td>
      <td><?php echo $value['themainvarieties']?></td>
      <td><?php echo $value['companyhome']?></td>
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
                  <span class='gray'>主营产品：</span>
                  <span class='black'><?php echo $value['themainvarieties']?></span>
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
      <td><!-- <a href='/e/member/chat/Index/add_order.php?action=edit&userid=<?php echo $value['userid']?>&companyid=<?php echo $value['companyid']?>&id=<?php echo $value['id']?>&addid=1' class='supply_table_a'>立即洽谈</a> -->
  

      <a target="_blank" href="/e/space/?userid=<?php echo $value['userid']?>" class='supply_table_a'>进入店铺</a></td></tr><?php endforeach; endif; ?>

          </tbody>
        </table>
      </div>

 <div id="fade" class="black_overlay"></div>





    </div>
  </div>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/search.js"></script>
<?php echo W('Default/webfooter');?>