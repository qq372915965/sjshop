<?php if (!defined('THINK_PATH')) exit();?><!-- 导航 -->
<div class="search">
    <div class="nav_cat">
        <div class="nav_left">
            <a href="/"><div class="logo">
            </div></a>
            <div class="logo_text">
                <p class="logo_text_s1">市场报价</p>
                <p class="logo_text_s2">樟木头国际塑胶电商交易中心</p>
            </div>
        </div>
        <div class="nav_right">
            <form id="" class="nav-search" action="/sjshop/index.php/Home/Baojialist/baojia_search" method="get" name="searchform">
            <img src="/skin/sjzx/img/icon2.jpg" class="nav_right_img">
                <div id="" class="nav-search-btn">
                    <a href="#" class="nav-search-btn-1 active2" data-txt="drop" data-id="0" data-url="/sjshop/index.php/Home/Baojialist/baojia_search" data-met="get">报价</a>
                    <a href="#" class="nav-search-btn-2" data-txt="关键字" data-id="1"  data-url="/sjshop/index.php/Home/Baojialist/baojia_search_company" data-met="get">供应商</a>
                </div>
                <div class="nav-search-bar">
                    <div class="nav-search-label-big">
                        <label id="" class="nav-search-label" data-select="1"></label>
                            <!--下拉列表-->
                      <ul class="nav-dropdown hide">
                          <li class="active2" data-txt="" data-val="1">大陆现货</li>
                          <li class="" data-txt="" data-val="2">香港现货</li>
                          <li class="" data-txt="" data-val="3">香港船货</li>
						  <li class="" data-txt="" data-val="4">改性塑料</li>
                          <li class="" data-txt="" data-val="5">环保再生</li>
						  <li class="" data-txt="" data-val="6">塑料助剂</li>
                     </ul>
                    </div>
                    
                    
                    <input type="text" name="keyboard" id=""  class="nav-search-txt" placeholder="输入品名/牌号/厂商" />

                    <input type="submit" id="" name=""  class="nav-search-submit serach_text"  value=""/>
                    <div id="" class="clearfix"></div>
                    
                    <input type="text" id="select_v" value="" class="hide"  name="type" />
                    <input type="text" id="select_btn" value="0" class="hide" />                    
                </div>      
            </form>

            <div class="seach_hot">
                <span>热门搜索：</span>
                <span class="seach_hot_info">

                    <?php if(is_array($keyword)): foreach($keyword as $key=>$val): ?><a target="_blank" href="/sjshop/index.php/Home/Baojialist/baojia_search?keyboard=<?php echo $val['keyword']; ?>&paixu=id desc&classid2=1" class="seach_hot_info1"><?php echo $val['keyword'];?></a>|<?php endforeach; endif; ?>
                </span>
            </div>
        </div>
<div class="nav_scan fr"> 
<img src="/skin/sjzx/img/sjzx.png" width="82" height="82"> 
<p>塑金在线</p>
</div>
    </div>
</div>

<!-- 导航 -->