<?php if (!defined('THINK_PATH')) exit(); echo W('Default/webheader');?> 
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/tab2.js"></script>
<script type="text/javascript" src="/sjshop/Public/New_style/skin/sjzx/js/search.js"></script>

<style type="text/css">
.wuxing_content{width: 100%; height: auto; margin-top: 10px; min-width: 1300px; font-weight:400;}
.wuxing_table{background: #E9F2FB url(/sjshop/Public/New_style/skin/sjzx/image/title_bg.gif) repeat-x left top;border: 1px solid #AACCEE; margin-bottom: 2px; border-bottom:none; width: 1100px;margin: 0px auto;}
.wuxing_table table{width: 1100px;margin: 0px auto;}
.wuxing_table table tr td a{color: #07519A; }
.wuxing_table table tr td{line-height: 26px;padding: 0px 10px;font-family: "宋体";font-size: 13px;color: #333;}
.property{width: 1100px;border: 1px solid #ddd;margin: 20px auto;overflow: hidden;}
.hot_varieties{height: 40px;border-bottom: 1px solid #ddd;background: #F5F5F5;}
.hot_varieties_bg {display: block;float: left;width: 17px;height: 13px;background: url(/sjshop/Public/New_style/skin/sjzx/img/icon3.png) no-repeat left center;margin: 14px 0 0 10px;}
.hot_varieties_text {display: block;float: left;margin-left: 10px;line-height: 40px;font-size: 16px;color: #48A0EE; font-weight: 400;}
.search_wuxing{height: 44px;border-bottom: 1px solid #3399EE;}
.search_wuxing i{display: block;float: left;width: 31px;height: 31px;background: url(/sjshop/Public/New_style/skin/sjzx/img/icon4.gif) no-repeat;margin: 6px 0 0 10px;}
.hot_name{line-height: 44px;float: left;margin-left: 5px;font-size: 14px;width: 450px;}
.search_zm{line-height: 44px;font-size: 14px;display: block;float: right;width: 90px;margin-left: 20px; color: #ff7300;}
.tab_p {width: 40%;margin-left: 10px;height: 44px;float: right;position: relative;}
.tab_p a { height: 25px; line-height: 25px;font-size: 14px;display: block;float: left;width: 6%;text-decoration: none;color: #333; text-align: center; margin-top: 9px; cursor: pointer;}
.tab_p a:hover{color: #ff7300;}
.tab_p a.off{color: #ff7300; font-weight: bold;}
.search_ct{width: 95%; margin: 0px auto; padding: 20px;}
.search_box{width: 100%;overflow: hidden;}
.search_box .box{width: 100%;}
.box_model{width: 23%;float: left;margin-right: 2%;margin-bottom: 30px;}
.model_title {border-bottom: 1px solid #ddd;height: 40px;line-height: 44px;padding-left: 25px;color: #3399ee;font-size: 14px;}
.model_title a {color: #3399EE;}
.model_content {padding-left: 10px;overflow: hidden;}
.model_content a {display: block;float: left;overflow: hidden;width: 47%;height: 40px;line-height: 40px;padding-left: 3%;text-overflow: ellipsis;white-space: nowrap; font-size: 12px; color: #333;}
.model_content a:hover{color: #ff7300;}


.searchbox {width: 1100px;border: 1px solid #ddd;background: #F5F5F5;height: 200px;margin: 0 auto;margin-top: 20px;}
.searchbox_inp {margin-top: 60px;height: 50px;margin-left: 155px;}
.searchbox_inp_text {float: left;height: 47px;line-height: 47px;font-size: 34px;color: #3399EE;margin-right: 20px;}
.searchbox_inp_input {height: 47px;width: 688px;float: left;}
.input_left_radius {width: 4px;height: 47px;background: url(/sjshop/Public/New_style/skin/sjzx/img/icon1.png) no-repeat;float: left;}
.input_mid_radius {width: 680px;height: 43px;float: left;border-top: 2px solid #3399EE;border-bottom: 2px solid #3399EE;background: #fff;}
.input_right_radius {width: 4px;height: 47px;background: url(/sjshop/Public/New_style/skin/sjzx/img/icon2.png) no-repeat;float: right;}
.wxb_search {width: 550px;height: 17px;padding: 13px 0 13px 20px;display: block;float: left;font-size: 14px;float: left;color: #999; border: 0;line-height:40px;}
.wxb_btn {width: 110px;display: block;float: left;height: 43px;background: #3399EE;float: left;color: #fff;font-size: 24px;font-family: "微软雅黑";cursor: pointer; border: none;}
.search_hot {height: 25px;margin-top: 15px;line-height: 25px;margin-left: 276px;font-size: 14px;}

</style>

<div class="clear"></div>


<div class="wuxing_content">
    <div class="wuxing_table">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>现在的位置：<a href='baojialist_dlxh'>市场报价</a>&nbsp;>&nbsp;<a href="#">物性表</a>&nbsp;></td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>
    <div class="searchbox">
        <div class="searchbox_inp">
            <a class="searchbox_inp_text" href="baojialist_wxb">物性表</a>
            <div class="searchbox_inp_input">
                <div class="input_left_radius"></div>
                <div class="input_mid_radius">
                <form action="baojialist_wxb_search" method="get">
                    <input type="text" name="keyword" id="word" class="wxb_search" style="color: rgb(0, 0, 0);" placeholder="请输入品名、牌号">
                    <input type="submit" class="wxb_btn" value="搜 索" id="search">
                </form>
                </div>
                <div class="input_right_radius"></div>
            </div>
        </div>
      
        <div class="search_hot">
        <span>已收录可查物性表牌号<a href="baojialist_wxb" style="margin-right: 0; color: #FF7300;"><?php echo ($count); ?></a>个</span>
        </div>
    </div>


    <div class="property" id="gengduo">
      <h3 class="hot_varieties">
      <i class="hot_varieties_bg"></i><span class="hot_varieties_text">热门品类</span>
      </h3>
      <div class="search_wuxing" id="tab1">
        <i></i>
        <p class="hot_name">热门品类仅显示部分热门牌号，查阅更多牌号物性表请使用搜索功能</p>
        <p class="tab_p">
            <a id="one1" onclick="setTab('one',1)" class="off">A</a>
            <a id="one2" onclick="setTab('one',2)">B</a>
            <a id="one3" onclick="setTab('one',3)">C</a>
            <a id="one4" onclick="setTab('one',4)">E</a>
            <a id="one5" onclick="setTab('one',5)">F</a>
            <a id="one6" onclick="setTab('one',6)">G</a>
            <a id="one7" onclick="setTab('one',7)">H</a>
            <a id="one8" onclick="setTab('one',8)">K</a>
            <a id="one9" onclick="setTab('one',9)">L</a>
            <a id="one10" onclick="setTab('one',10)">M</a>
            <a id="one11" onclick="setTab('one',11)">N</a>
            <a id="one12" onclick="setTab('one',12)">P</a>
            <a id="one13" onclick="setTab('one',13)">S</a>
            <a id="one14" onclick="setTab('one',14)">T</a>
            <a id="one15" onclick="setTab('one',15)">U</a>
            <span class="tab_arrow"></span>
        </p>
        <span class="search_zm">按字母查找：</span>
      </div>

      <div class="search_ct">
        <div class="search_box" id="con_one_1">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=ABS" title="ABS">ABS</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=GP2100" title="GP2100">GP2100</a>
                        <a href="baojialist_wxb_search?keyword=UH 034" title="UH 034">UH 034</a>
                        <a href="baojialist_wxb_search?keyword=U-PE350" title="U-PE350">U-PE350</a>
                        <a href="baojialist_wxb_search?keyword=1000 UV Stabilized Black" title="1000 UV Stabilized Black">1000 UV Stabilized Black</a>
                        <a href="baojialist_wxb_search?keyword=PE-UHMW" title="PE-UHMW">PE-UHMW</a>
                        <a href="baojialist_wxb_search?keyword=GUR 5113" title="GUR 5113">GUR 5113</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4113" title="GUR 4113">GUR 4113</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4120" title="GUR 4120">GUR 4120</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4152" title="GUR 4152">GUR 4152</a>
                        <a href="baojialist_wxb_search?keyword=ABS">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="baojialist_wxb_search?keyword=ABS/PC" title="ABS/PC">ABS/PC</a></p>
                    <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=2503 A" title="2503 A">2503 A</a>
                        <a href="baojialist_wxb_search?keyword=HR-5009A" title="HR-5009A">HR-5009A</a>
                        <a href="baojialist_wxb_search?keyword=GP-5300F" title="GP-5300F">GP-5300F</a>
                        <a href="baojialist_wxb_search?keyword=GP-5008A" title="GP-5008A">GP-5008A</a>
                        <a href="baojialist_wxb_search?keyword=GN-5001SF" title="GN-5001SF">GN-5001SF</a>
                        <a href="baojialist_wxb_search?keyword=HAC-8250FR" title="HAC-8250FR">HAC-8250FR</a>
                        <a href="baojialist_wxb_search?keyword=PCA 839" title="PCA 839">PCA 839</a>
                        <a href="baojialist_wxb_search?keyword=AC2000" title="AC2000">AC2000</a>
                        <a href="baojialist_wxb_search?keyword=001SC" title="001SC">001SC</a>
                        <a href="baojialist_wxb_search?keyword=ABS/PC">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="baojialist_wxb_search?keyword=AES" title="AES">AES</a></p>
                    <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=AES+GF20" title="AES+GF20">AES+GF20</a>
                        <a href="baojialist_wxb_search?keyword=AES+30GF" title="AES+30GF">AES+30GF</a>
                        <a href="baojialist_wxb_search?keyword=AES+10GF" title="AES+10GF">AES+10GF</a>
                        <a href="baojialist_wxb_search?keyword=DGK-918L" title="DGK-918L">DGK-918L</a>
                        <a href="baojialist_wxb_search?keyword=813" title="813">813</a>
                        <a href="baojialist_wxb_search?keyword=HW600G" title="HW600G">HW600G</a>
                        <a href="baojialist_wxb_search?keyword=UVA1" title="UVA1">UVA1</a>
                        <a href="baojialist_wxb_search?keyword=SK50" title="SK50">SK50</a>
                        <a href="baojialist_wxb_search?keyword=SE20" title="SE20">SE20</a>
                        <a href="baojialist_wxb_search?keyword=AES">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="baojialist_wxb_search?keyword=AS" title="AS">AS</a></p>
                    <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=PN-117H L150" title="PN-117H L150">PN-117H L150</a>
                        <a href="baojialist_wxb_search?keyword=SAN 1400" title="SAN 1400">SAN 1400</a>
                        <a href="baojialist_wxb_search?keyword=PN-107 L125 FG" title="PN-107 L125 FG">PN-107 L125 FG</a>
                        <a href="baojialist_wxb_search?keyword=PN-127 L100 FG" title="PN-127 L100 FG">PN-127 L100 FG</a>
                        <a href="baojialist_wxb_search?keyword=AS530G" title="AS530G">AS530G</a>
                        <a href="baojialist_wxb_search?keyword=AS520G" title="AS520G">AS520G</a>
                        <a href="baojialist_wxb_search?keyword=NF2100" title="NF2100">NF2100</a>
                        <a href="baojialist_wxb_search?keyword=ENV26-NC880" title="ENV26-NC880">ENV26-NC880</a>
                        <a href="baojialist_wxb_search?keyword=SA50" title="SA50">SA50</a>
                        <a href="baojialist_wxb_search?keyword=AS">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="baojialist_wxb_search?keyword=ASA" title="ASA">ASA</a></p>
                    <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=ASA-GF30" title="ASA-GF30">ASA-GF30</a>
                        <a href="baojialist_wxb_search?keyword=ASA-GF25" title="ASA-GF25">ASA-GF25</a>
                        <a href="baojialist_wxb_search?keyword=ASA-GF20" title="ASA-GF20">ASA-GF20</a>
                        <a href="baojialist_wxb_search?keyword=ASA-GF10" title="ASA-GF10">ASA-GF10</a>
                        <a href="baojialist_wxb_search?keyword=ASA-CF30" title="ASA-CF30">ASA-CF30</a>
                        <a href="baojialist_wxb_search?keyword=ASA-CF20" title="ASA-CF20">ASA-CF20</a>
                        <a href="baojialist_wxb_search?keyword=ASA-CF10" title="ASA-CF10">ASA-CF10</a>
                        <a href="baojialist_wxb_search?keyword=ASA+GF30" title="ASA+GF30">ASA+GF30</a>
                        <a href="baojialist_wxb_search?keyword=ASA+GF30%" title="ASA+GF30%">ASA+GF30%</a>
                        <a href="baojialist_wxb_search?keyword=ASA">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="baojialist_wxb_search?keyword=ASA/PC" title="ASA/PC">ASA/PC</a></p>
                    <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=PCS003L" title="PCS003L">PCS003L</a>
                        <a href="baojialist_wxb_search?keyword=A6020" title="A6020">A6020</a>
                        <a href="baojialist_wxb_search?keyword=A3525" title="A3525">A3525</a>
                        <a href="baojialist_wxb_search?keyword=KR2867FR" title="KR2867FR">KR2867FR</a>
                        <a href="baojialist_wxb_search?keyword=KR2863T" title="KR2863T">KR2863T</a>
                        <a href="baojialist_wxb_search?keyword=ENV32-NC780" title="ENV32-NC780">ENV32-NC780</a>
                        <a href="baojialist_wxb_search?keyword=ENV32-NC090" title="ENV32-NC090">ENV32-NC090</a>
                        <a href="baojialist_wxb_search?keyword=SC KR2867CWU" title="SC KR2867CWU">SC KR2867CWU</a>
                        <a href="baojialist_wxb_search?keyword=SC KR2866C" title="SC KR2866C">SC KR2866C</a>
                        <a href="baojialist_wxb_search?keyword=ASA/PC">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_2" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=BOPP" title="BOPP">BOPP</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=L5D98" title="L5D98">L5D98</a>
                        <a href="baojialist_wxb_search?keyword=PPR-FT03-S" title="PPR-FT03-S">PPR-FT03-S</a>
                        <a href="baojialist_wxb_search?keyword=SHangzhou Jinxin VMBOPP Film" title="SHangzhou Jinxin VMBOPP Film">SHangzhou Jinxin VMBOPP Film</a>
                        <a href="baojialist_wxb_search?keyword=HP524J" title="HP524J">HP524J</a>
                        <a href="baojialist_wxb_search?keyword=PP-124M" title="PP-124M">PP-124M</a>
                        <a href="baojialist_wxb_search?keyword=F1001" title="F1001">F1001</a>
                        <a href="baojialist_wxb_search?keyword=F300M" title="F300M">F300M</a>
                        <a href="baojialist_wxb_search?keyword=HP525J" title="HP525J">HP525J</a>
                        <a href="baojialist_wxb_search?keyword=PP-124T" title="PP-124T">PP-124T</a>
                        <a href="baojialist_wxb_search?keyword=BOPP">更多&gt;&gt;</a>
              </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_3" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=CA" title="CA">CA</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=CM155" title="CM155">CM155</a>
                        <a href="baojialist_wxb_search?keyword=H4" title="H4">H4</a>
                        <a href="baojialist_wxb_search?keyword=2111A" title="2111A">2111A</a>
                        <a href="baojialist_wxb_search?keyword=NG-100" title="NG-100">NG-100</a>
                        <a href="baojialist_wxb_search?keyword=MS" title="MS">MS</a>
                        <a href="baojialist_wxb_search?keyword=MSS" title="MSS">MSS</a>
                        <a href="baojialist_wxb_search?keyword=H3" title="H3">H3</a>
                        <a href="baojialist_wxb_search?keyword=AB33" title="AB33">AB33</a>
                        <a href="baojialist_wxb_search?keyword=MG-100" title="MG-100">MG-100</a>
                        <a href="baojialist_wxb_search?keyword=CA">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="COC">COC</a></p>
                    <div class="model_content">
                        <a href="#" title="ZEONEX® E48R">ZEONEX® E48R</a>
                        <a href="#" title="APL5514ML">APL5514ML</a>
                        <a href="#" title="8007F-400">8007F-400</a>
                        <a href="#" title="8007F-500">8007F-500</a>
                        <a href="#" title="8007F-04">8007F-04</a>
                        <a href="#" title="8007D-61">8007D-61</a>
                        <a href="#" title="6017S-04">6017S-04</a>
                        <a href="#" title="6013S-04">6013S-04</a>
                        <a href="#" title="8007X10">8007X10</a>
                        <a href="#" title="COC">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="COP">COP</a></p>
                    <div class="model_content">
                        <a href="#" title="E48R">E48R</a>
                        <a href="#" title="F52R">F52R</a>
                        <a href="#" title="E28R">E28R</a>
                        <a href="#" title="450">450</a>
                        <a href="#" title="280R">280R</a>
                        <a href="#" title="330R">330R</a>
                        <a href="#" title="1600R">1600R</a>
                        <a href="#" title="ZEONEX® RS420-LDS">ZEONEX® RS420-LDS</a>
                        <a href="#" title="480">480</a>
                        <a href="#" title="COP">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="CPE">CPE</a></p>
                    <div class="model_content">
                        <a href="#" title="2135">2135</a>
                        <a href="#" title="135A">135A</a>
                        <a href="#" title="4135">4135</a>
                        <a href="#" title="3135">3135</a>
                        <a href="#" title="3035">3035</a>
                        <a href="#" title="1240 NATURAL">1240 NATURAL</a>
                        <a href="#" title="702P">702P</a>
                        <a href="#" title="Honghai CPE 135A">Honghai CPE 135A</a>
                        <a href="#" title="2500P">2500P</a>
                        <a href="#" title="CPE">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="CPVC">CPVC</a></p>
                    <div class="model_content">
                        <a href="#" title="4303">4303</a>
                        <a href="#" title="4510">4510</a>
                        <a href="#" title="817">817</a>
                        <a href="#" title="4345">4345</a>
                        <a href="#" title="4353">4353</a>
                        <a href="#" title="4351">4351</a>
                        <a href="#" title="MC200">MC200</a>
                        <a href="#" title="ProTherm® 4303">ProTherm® 4303</a>
                        <a href="#" title="KANEKA H727">KANEKA H727</a>
                        <a href="#" title="CPVC">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_4" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=EAA" title="EAA">EAA</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=5986" title="5986">5986</a>
                        <a href="baojialist_wxb_search?keyword=2174" title="2174">2174</a>
                        <a href="baojialist_wxb_search?keyword=6100" title="6100">6100</a>
                        <a href="baojialist_wxb_search?keyword=A210M" title="A210M">A210M</a>
                        <a href="baojialist_wxb_search?keyword=5050" title="5050">5050</a>
                        <a href="baojialist_wxb_search?keyword=MB-6003" title="MB-6003">MB-6003</a>
                        <a href="baojialist_wxb_search?keyword=2022" title="2022">2022</a>
                        <a href="baojialist_wxb_search?keyword=5990I" title="5990I">5990I</a>
                        <a href="baojialist_wxb_search?keyword=5980I" title="5980I">5980I</a>
                        <a href="baojialist_wxb_search?keyword=EAA" title="EAA">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="EBA">EBA</a></p>
                    <div class="model_content">
                        <a href="#" title="PA-1770">PA-1770</a>
                        <a href="#" title="3427 AC">3427 AC</a>
                        <a href="#" title="35BA40">35BA40</a>
                        <a href="#" title="FA3036">FA3036</a>
                        <a href="#" title="CA-3230B">CA-3230B</a>
                        <a href="#" title="PA-1704">PA-1704</a>
                        <a href="#" title="FA4083">FA4083</a>
                        <a href="#" title="CA-1421BG">CA-1421BG</a>
                        <a href="#" title="CA-3430B">CA-3430B</a>
                        <a href="#" title="EBA">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="EPDM">EPDM</a></p>
                    <div class="model_content">
                        <a href="#" title="EPT K-9720">EPT K-9720</a>
                        <a href="#" title="J-3080P">J-3080P</a>
                        <a href="#" title="3092PM">3092PM</a>
                        <a href="#" title="4770R">4770R</a>
                        <a href="#" title="8120E">8120E</a>
                        <a href="#" title="512F">512F</a>
                        <a href="#" title="3720P">3720P</a>
                        <a href="#" title="J-4045">J-4045</a>
                        <a href="#" title="EP27">EP27</a>
                        <a href="#" title="EPDM">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="EPS">EPS</a></p>
                    <div class="model_content">
                        <a href="#" title="CP303">CP303</a>
                        <a href="#" title="F-303">F-303</a>
                        <a href="#" title="FR16">FR16</a>
                        <a href="#" title="CS40">CS40</a>
                        <a href="#" title="LN 2000">LN 2000</a>
                        <a href="#" title="763">763</a>
                        <a href="#" title="F 1111">F 1111</a>
                        <a href="#" title="KD16">KD16</a>
                        <a href="#" title="EH 3000">EH 3000</a>
                        <a href="#" title="EPS">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="EVA">EVA</a></p>
                    <div class="model_content">
                        <a href="#" title="750">750</a>
                        <a href="#" title="634">634</a>
                        <a href="#" title="720">720</a>
                        <a href="#" title="722">722</a>
                        <a href="#" title="39E660">39E660</a>
                        <a href="#" title="40W">40W</a>
                        <a href="#" title="VE430A">VE430A</a>
                        <a href="#" title="PA-465">PA-465</a>
                        <a href="#" title="E120A">E120A</a>
                        <a href="#" title="EVA">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="EVOH">EVOH</a></p>
                    <div class="model_content">
                        <a href="#" title="E171B">E171B</a>
                        <a href="#" title="L104B">L104B</a>
                        <a href="#" title="F101B">F101B</a>
                        <a href="#" title="C109B">C109B</a>
                        <a href="#" title="SP482B">SP482B</a>
                        <a href="#" title="LT171B">LT171B</a>
                        <a href="#" title="GF-20">GF-20</a>
                        <a href="#" title="F100B">F100B</a>
                        <a href="#" title="C109A">C109A</a>
                        <a href="#" title="EVOH">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_5" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=FEP" title="FEP">FEP</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=3505" title="3505">3505</a>
                        <a href="baojialist_wxb_search?keyword=FR468" title="FR468">FR468</a>
                        <a href="baojialist_wxb_search?keyword=FR461" title="FR461">FR461</a>
                        <a href="baojialist_wxb_search?keyword=X 6322" title="X 6322">X 6322</a>
                        <a href="baojialist_wxb_search?keyword=E-200B" title="E-200B">E-200B</a>
                        <a href="baojialist_wxb_search?keyword=FLEX6309Z" title="FLEX6309Z">FLEX6309Z</a>
                        <a href="baojialist_wxb_search?keyword=NP-40" title="NP-40">NP-40</a>
                        <a href="baojialist_wxb_search?keyword=NC-1539N" title="NC-1539N">NC-1539N</a>
                        <a href="baojialist_wxb_search?keyword=E-200S" title="E-200S">E-200S</a>
                        <a href="baojialist_wxb_search?keyword=FEP">更多&gt;&gt;</a>
              </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_6" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=GPPS" title="GPPS">GPPS</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=GP-535N" title="GP-535N">GP-535N</a>
                        <a href="baojialist_wxb_search?keyword=PG-33" title="PG-33">PG-33</a>
                        <a href="baojialist_wxb_search?keyword=MC3500" title="MC3500">MC3500</a>
                        <a href="baojialist_wxb_search?keyword=GPPS-123" title="GPPS-123">GPPS-123</a>
                        <a href="baojialist_wxb_search?keyword=666D" title="666D">666D</a>
                        <a href="baojialist_wxb_search?keyword=680X" title="680X">680X</a>
                        <a href="baojialist_wxb_search?keyword=634" title="634">634</a>
                        <a href="baojialist_wxb_search?keyword=202" title="202">202</a>
                        <a href="baojialist_wxb_search?keyword=PG33" title="PG33">PG33</a>
                        <a href="baojialist_wxb_search?keyword=GPPS">更多&gt;&gt;</a>
              </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_7" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=HDPE" title="HDPE">HDPE</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=5421B" title="5421B">5421B</a>
                        <a href="baojialist_wxb_search?keyword=DGDB-6097" title="DGDB-6097">DGDB-6097</a>
                        <a href="baojialist_wxb_search?keyword=BL3" title="BL3">BL3</a>
                        <a href="baojialist_wxb_search?keyword=HF5110" title="HF5110">HF5110</a>
                        <a href="baojialist_wxb_search?keyword=FB1460" title="FB1460">FB1460</a>
                        <a href="baojialist_wxb_search?keyword=FL7000" title="UFL7000">FL7000</a>
                        <a href="baojialist_wxb_search?keyword=6200B" title="6200B">6200B</a>
                        <a href="baojialist_wxb_search?keyword=225B2" title="225B2">225B2</a>
                        <a href="baojialist_wxb_search?keyword=5000S" title="5000S">5000S</a>
                        <a href="baojialist_wxb_search?keyword=HDPE">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="HIPS">HIPS</a></p>
                    <div class="model_content">
                        <a href="#" title="GH-660">GH-660</a>
                        <a href="#" title="325">325</a>
                        <a href="#" title="PH888G">PH888G</a>
                        <a href="#" title="4241">4241</a>
                        <a href="#" title="166ZD">166ZD</a>
                        <a href="#" title="EA9600">EA9600</a>
                        <a href="#" title="486">486</a>
                        <a href="#" title="1802">1802</a>
                        <a href="#" title="PH88H">PH88H</a>
                        <a href="#" title="HIPS">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_8" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=K树脂" title="K树脂">K树脂</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=SL-803" title="SL-803">SL-803</a>
                        <a href="baojialist_wxb_search?keyword=PB-5910" title="PB-5910">PB-5910</a>
                        <a href="baojialist_wxb_search?keyword=PB-5903" title="PB-5903">PB-5903</a>
                        <a href="baojialist_wxb_search?keyword=KR01" title="KR01">KR01</a>
                        <a href="baojialist_wxb_search?keyword=K885S" title="K885S">K885S</a>
                        <a href="baojialist_wxb_search?keyword=684D" title="684D">684D</a>
                        <a href="baojialist_wxb_search?keyword=NSBC711" title="NSBC711">NSBC711</a>
                        <a href="baojialist_wxb_search?keyword=KR03" title="KR03">KR03</a>
                        <a href="baojialist_wxb_search?keyword=3G55" title="3G55">3G55</a>
                        <a href="baojialist_wxb_search?keyword=K树脂">更多&gt;&gt;</a>
              </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_9" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=LCP" title="LCP">LCP</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=E130I" title="E130I">E130I</a>
                        <a href="baojialist_wxb_search?keyword=UH 034" title="UH 034">UH 034</a>
                        <a href="baojialist_wxb_search?keyword=U-PE350" title="U-PE350">U-PE350</a>
                        <a href="baojialist_wxb_search?keyword=1000 UV Stabilized Black" title="1000 UV Stabilized Black">1000 UV Stabilized Black</a>
                        <a href="baojialist_wxb_search?keyword=PE-UHMW" title="PE-UHMW">PE-UHMW</a>
                        <a href="baojialist_wxb_search?keyword=GUR 5113" title="GUR 5113">GUR 5113</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4113" title="GUR 4113">GUR 4113</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4120" title="GUR 4120">GUR 4120</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4152" title="GUR 4152">GUR 4152</a>
                        <a href="baojialist_wxb_search?keyword=LCP">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="LDPE">LDPE</a></p>
                    <div class="model_content">
                        <a href="#" title="2426H">2426H</a>
                        <a href="#" title="2426H">2426H</a>
                        <a href="#" title="2420D">2420D</a>
                        <a href="#" title="2426K">2426K</a>
                        <a href="#" title="2420H">2420H</a>
                        <a href="#" title="FD0274">FD0274</a>
                        <a href="#" title="2426H">2426H</a>
                        <a href="#" title="2420K">2420K</a>
                        <a href="#" title="1C7A">1C7A</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="LLDPE">LLDPE</a></p>
                    <div class="model_content">
                        <a href="#" title="DFDA-7042">DFDA-7042</a>
                        <a href="#" title="LL6201XR">LL6201XR</a>
                        <a href="#" title="LL1002KZ">LL1002KZ</a>
                        <a href="#" title="LL1002YB">LL1002YB</a>
                        <a href="#" title="LL1003.05">LL1003.05</a>
                        <a href="#" title="LL2001.09">LL2001.09</a>
                        <a href="#" title="LL6301XR">LL6301XR</a>
                        <a href="#" title="AL3301YB">AL3301YB</a>
                        <a href="#" title="LPX56">LPX56</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_10" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=MABS" title="MABS">MABS</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=TX-0520IM" title="TX-0520IM">TX-0520IM</a>
                        <a href="baojialist_wxb_search?keyword=8434" title="8434">8434</a>
                        <a href="baojialist_wxb_search?keyword=3504" title="3504">3504</a>
                        <a href="baojialist_wxb_search?keyword=2802TR" title="2802TR">2802TR</a>
                        <a href="baojialist_wxb_search?keyword=TX-0520K" title="TX-0520K">TX-0520K</a>
                        <a href="baojialist_wxb_search?keyword=GUR 5113" title="GUR 5113">GUR 5113</a>
                        <a href="baojialist_wxb_search?keyword=2802TR HD" title="2802TR HD">2802TR HD</a>
                        <a href="baojialist_wxb_search?keyword=2812TR" title="2812TR">2812TR</a>
                        <a href="baojialist_wxb_search?keyword=9202 A" title="9202 A">9202 A</a>
                        <a href="baojialist_wxb_search?keyword=MABS">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="MBS">MBS</a></p>
                    <div class="model_content">
                        <a href="#" title="TH-21">TH-21</a>
                        <a href="#" title="S050">S050</a>
                        <a href="#" title="M-080">M-080</a>
                        <a href="#" title="H050">H050</a>
                        <a href="#" title="TP-803">TP-803</a>
                        <a href="#" title="EM500">EM500</a>
                        <a href="#" title="SA505">SA505</a>
                        <a href="#" title="TP-SX">TP-SX</a>
                        <a href="#" title="TP-SX-301">TP-SX-301</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="MDPE">MDPE</a></p>
                    <div class="model_content">
                        <a href="#" title="YGM091T">YGM091T</a>
                        <a href="#" title="ME3441">ME3441</a>
                        <a href="#" title="3802">3802</a>
                        <a href="#" title="D353">D353</a>
                        <a href="#" title="3321C">3321C</a>
                        <a href="#" title="L 3810X03">L 3810X03</a>
                        <a href="#" title="345F">345F</a>
                        <a href="#" title="TR-0735-UG">TR-0735-UG</a>
                        <a href="#" title="PE-L M2750（YLJ-2650）">PE-L M2750（YLJ-2650）</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="MLLDPE">MLLDPE</a></p>
                    <div class="model_content">
                        <a href="#" title="3518CB">3518CB</a>
                        <a href="#" title="1018FA">1018FA</a>
                        <a href="#" title="SP1520">SP1520</a>
                        <a href="#" title="2018CA">2018CA</a>
                        <a href="#" title="3518PA">3518PA</a>
                        <a href="#" title="1018EA">1018EA</a>
                        <a href="#" title="SP3010">SP3010</a>
                        <a href="#" title="SP9048">SP9048</a>
                        <a href="#" title="SP1520">SP1520</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="MPPO">MPPO</a></p>
                    <div class="model_content">
                        <a href="#" title="M109-G20">M109-G20</a>
                        <a href="#" title="FRMPPOG20">FRMPPOG20</a>
                        <a href="#" title="M106">M106</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
             <div class="box_model">
                  <p class="model_title"><a href="#" title="MS">MS</a></p>
                    <div class="model_content">
                        <a href="#" title="DS-60">DS-60</a>
                        <a href="#" title="600">600</a>
                        <a href="#" title="XT560">XT560</a>
                        <a href="#" title="MM-70">MM-70</a>
                        <a href="#" title="PM-600">PM-600</a>
                        <a href="#" title="TX-100S">TX-100S</a>
                        <a href="#" title="MM-60">MM-60</a>
                        <a href="#" title="ARPS 100-2">ARPS 100-2</a>
                        <a href="#" title="TX-651A">TX-651A</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_11" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=NBR" title="NBR">NBR</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=N 3345" title="N 3345">N 3345</a>
                        <a href="baojialist_wxb_search?keyword=N 3980" title="N 3980">N 3980</a>
                        <a href="baojialist_wxb_search?keyword=N 2860" title="N 2860">N 2860</a>
                        <a href="baojialist_wxb_search?keyword=N 2845 GRN" title="N 2845 GRN">N 2845 GRN</a>
                        <a href="baojialist_wxb_search?keyword=N 4560" title="E471N 4560i">N 4560</a>
                        <a href="baojialist_wxb_search?keyword=N 3380 GRN" title="N 3380 GRN">N 3380 GRN</a>
                        <a href="baojialist_wxb_search?keyword=N 3345 GRN" title="N 3345 GRN">N 3345 GRN</a>
                        <a href="baojialist_wxb_search?keyword=2620" title="2620">2620</a>
                        <a href="baojialist_wxb_search?keyword=N 3960" title="N 3960">N 3960</a>
                        <a href="baojialist_wxb_search?keyword=NBR">更多&gt;&gt;</a>
              </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_12" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=PA6" title="PA6">PA6</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=B3WG6" title="B3WG6">B3WG6</a>
                        <a href="baojialist_wxb_search?keyword=B35K" title="B35K">B35K</a>
                        <a href="baojialist_wxb_search?keyword=B3EG3" title="B3EG3">B3EG3</a>
                        <a href="baojialist_wxb_search?keyword=B36FN" title="B36FN">B36FN</a>
                        <a href="baojialist_wxb_search?keyword=B3S" title="B3S">B3S</a>
                        <a href="baojialist_wxb_search?keyword=GUR 5113" title="GUR 5113">GUR 5113</a>
                        <a href="baojialist_wxb_search?keyword=B3WG5" title="B3WG5">B3WG5</a>
                        <a href="baojialist_wxb_search?keyword=B3UM6" title="B3UM6">B3UM6</a>
                        <a href="baojialist_wxb_search?keyword=B36F" title="B36F">B36F</a>
                        <a href="baojialist_wxb_search?keyword=PA6">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="PA66">PA66</a></p>
                    <div class="model_content">
                        <a href="#" title="A3EG3">A3EG3</a>
                        <a href="#" title="MN301-G30">MN301-G30</a>
                        <a href="#" title="EPR27">EPR27</a>
                        <a href="#" title="FR7026V0F">FR7026V0F</a>
                        <a href="#" title="A3HG5">A3HG5</a>
                        <a href="#" title="1300S">1300SR</a>
                        <a href="#" title="A 218 V40 BLACK 21 N">A 218 V40 BLACK 21 N</a>
                        <a href="#" title="AN0F">AN0F</a>
                        <a href="#" title="2730G">2730G</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="PBT">PBT</a></p>
                    <div class="model_content">
                        <a href="#" title="D202G30">D202G30</a>
                        <a href="#" title="PBT-RG301">PBT-RG301</a>
                        <a href="#" title="1100-600S">1100-600S</a>
                        <a href="#" title="1100-211M">1100-211M</a>
                        <a href="#" title="4130">4130</a>
                        <a href="#" title="IDES 243032">IDES 243032</a>
                        <a href="#" title="E202G30">E202G30</a>
                        <a href="#" title="ENV08-NC830">ENV08-NC830</a>
                        <a href="#" title="DURANEX3300">DURANEX3300</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="PC">PC</a></p>
                    <div class="model_content">
                        <a href="#" title="PC02-10R">PC02-10R</a>
                        <a href="#" title="2407">2407</a>
                        <a href="#" title="PC-1100">PC-1100</a>
                        <a href="#" title="PC-1220R">PC-1220R</a>
                        <a href="#" title="LC1500">LC1500</a>
                        <a href="#" title="URZ2501">URZ2501</a>
                        <a href="#" title="3025U(400)">3025U(400)</a>
                        <a href="#" title="HN-1064I">HN-1064I</a>
                        <a href="#" title="5210G2">5210G2</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="PP">PP</a></p>
                    <div class="model_content">
                        <a href="#" title="PP">PP</a>
                        <a href="#" title="K8009（PPB-M09）">K8009（PPB-M09）</a>
                        <a href="#" title="1102K">1102K</a>
                        <a href="#" title="6345">6345</a>
                        <a href="#" title="AP03B">AP03B</a>
                        <a href="#" title="100-GA09">100-GA09</a>
                        <a href="#" title="100-GA03">100-GA03</a>
                        <a href="#" title="6219">6219</a>
                        <a href="#" title="6015">6015</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="PVC">PVC</a></p>
                    <div class="model_content">
                        <a href="#" title="J-70">J-70</a>
                        <a href="#" title="LS-100">LS-100</a>
                        <a href="#" title="HS-888AE516">HS-888AE516</a>
                        <a href="#" title="268RE">268RE</a>
                        <a href="#" title="P-1000">P-1000</a>
                        <a href="#" title="H-70">H-70</a>
                        <a href="#" title="SG-8">SG-8</a>
                        <a href="#" title="SG-8">SG-8</a>
                        <a href="#" title="SG-7">SG-7</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_13" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=SBR" title="SBR">SBR</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=SOL 1205" title="SOL 1205">SOL 1205</a>
                        <a href="baojialist_wxb_search?keyword=1502" title="1502">1502</a>
                        <a href="baojialist_wxb_search?keyword=257AX4" title="257AX4">257AX4</a>
                        <a href="baojialist_wxb_search?keyword=1712" title="1712">1712</a>
                        <a href="baojialist_wxb_search?keyword=1712" title="1712">1712</a>
                        <a href="baojialist_wxb_search?keyword=5564 T" title="5564 T">5564 T</a>
                        <a href="baojialist_wxb_search?keyword=SOL R 72612" title="SOL R 72612">SOL R 72612</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4120" title="GUR 4120">GUR 4120</a>
                        <a href="baojialist_wxb_search?keyword=1500" title="1500">1500</a>
                        <a href="baojialist_wxb_search?keyword=SBR">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="SBS">SBS</a></p>
                    <div class="model_content">
                        <a href="#" title="LG501">LG501</a>
                        <a href="#" title="T161B">T161B</a>
                        <a href="#" title="LG411">LG411</a>
                        <a href="#" title="TPE-475E">TPE-475E</a>
                        <a href="#" title="TPE-S 50A 2039">TPE-S 50A 2039</a>
                        <a href="#" title="1475">1475</a>
                        <a href="#" title="5404A77">5404A77</a>
                        <a href="#" title="1301">1301</a>
                        <a href="#" title="1484">1484</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="SEBS">SEBS</a></p>
                    <div class="model_content">
                        <a href="#" title="880123">880123</a>
                        <a href="#" title="602800">602800</a>
                        <a href="#" title="A2 500550M">A2 500550M</a>
                        <a href="#" title="610">610</a>
                        <a href="#" title="3031-102">3031-102</a>
                        <a href="#" title="520450">520450</a>
                        <a href="#" title="830.824">830.824</a>
                        <a href="#" title="500850M">500850M</a>
                        <a href="#" title="500500S">500500S</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="SIS">SIS</a></p>
                    <div class="model_content">
                        <a href="#" title="4113">4113</a>
                        <a href="#" title="4411">4411</a>
                        <a href="#" title="D1107 J">D1107 J</a>
                        <a href="#" title="4111A">4111A</a>
                        <a href="#" title="4114">4114</a>
                        <a href="#" title="4111">4111</a>
                        <a href="#" title="2393">2393</a>
                        <a href="#" title="D1124P">D1124P</a>
                        <a href="#" title="D-1162BS">D-1162BS</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="SPS">SPS</a></p>
                    <div class="model_content">
                        <a href="#" title="C142">C142</a>
                        <a href="#" title="WA212">WA212</a>
                        <a href="#" title="WA214LG">WA214LG</a>
                        <a href="#" title="4605 FR">4605 FR</a>
                        <a href="#" title="RTP 4607">RTP 4607</a>
                        <a href="#" title="S930">S930</a>
                        <a href="#" title="4605 HI FR">4605 HI FR</a>
                        <a href="#" title="4685 TFE 15">4685 TFE 15</a>
                        <a href="#" title="4605 TFE 10">4605 TFE 10</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_14" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=TPE" title="TPE">TPE</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=4556" title="4556">4556</a>
                        <a href="baojialist_wxb_search?keyword=UH 034" title="UH 034">UH 034</a>
                        <a href="baojialist_wxb_search?keyword=U-PE350" title="U-PE350">U-PE350</a>
                        <a href="baojialist_wxb_search?keyword=1000 UV Stabilized Black" title="1000 UV Stabilized Black">1000 UV Stabilized Black</a>
                        <a href="baojialist_wxb_search?keyword=PE-UHMW" title="PE-UHMW">PE-UHMW</a>
                        <a href="baojialist_wxb_search?keyword=GUR 5113" title="GUR 5113">GUR 5113</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4113" title="GUR 4113">GUR 4113</a>
                        <a href="baojialist_wxb_search?keyword=8238" title="8238">8238</a>
                        <a href="baojialist_wxb_search?keyword=5526" title="5526">5526</a>
                        <a href="baojialist_wxb_search?keyword=TPE">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="TPO">TPO</a></p>
                    <div class="model_content">
                        <a href="#" title="F-3900">F-3900</a>
                        <a href="#" title="CMN303">CMN303</a>
                        <a href="#" title="F-3740">F-3740</a>
                        <a href="#" title="AS319LW-01US">AS319LW-01US</a>
                        <a href="#" title="1410-t4">1410-t4</a>
                        <a href="#" title="Adflex Q100F">Adflex Q100F</a>
                        <a href="#" title="6030N">6030N</a>
                        <a href="#" title="CNR012">CNR012</a>
                        <a href="#" title="F-3710">F-3710</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="TPR">TPR</a></p>
                    <div class="model_content">
                        <a href="#" title="EPK-35A">EPK-35A</a>
                        <a href="#" title="31265N-PE">31265N-PE</a>
                        <a href="#" title="EPK-75A">EPK-75A</a>
                        <a href="#" title="EPK-50A">EPK-50A</a>
                        <a href="#" title="1840N-SE">1840N-SE</a>
                        <a href="#" title="EPK-65A">EPK-65A</a>
                        <a href="#" title="EPK-45A">EPK-45A</a>
                        <a href="#" title="X803N">X803N</a>
                        <a href="#" title="X902N">X902N</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="TPU">TPU</a></p>
                    <div class="model_content">
                        <a href="#" title="1185A">1185A</a>
                        <a href="#" title="C85A">C85A</a>
                        <a href="#" title="1190A">1190A</a>
                        <a href="#" title="685A">685A</a>
                        <a href="#" title="1195A">1195A</a>
                        <a href="#" title="C70AW">C70AW</a>
                        <a href="#" title="S80A">S80A</a>
                        <a href="#" title="1180A">1180A</a>
                        <a href="#" title="690AU">690AU</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="TPV">TPV</a></p>
                    <div class="model_content">
                        <a href="#" title="121-85M100">121-85M100</a>
                        <a href="#" title="8221-75M300">8221-75M300</a>
                        <a href="#" title="101-55">101-55</a>
                        <a href="#" title="W600B">W600B</a>
                        <a href="#" title="XL 55900">XL 55900</a>
                        <a href="#" title="271-87">271-87</a>
                        <a href="#" title="2940DN">2940DN</a>
                        <a href="#" title="6EKA85">6EKA85</a>
                        <a href="#" title="Santoprene™ 103-40">Santoprene™ 103-40</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="TPX">TPX</a></p>
                    <div class="model_content">
                        <a href="#" title="DX845">DX845</a>
                        <a href="#" title="MX022">MX022</a>
                        <a href="#" title="MX021">MX021</a>
                        <a href="#" title="RT18">RT18</a>
                        <a href="#" title="MX321XB">MX321XB</a>
                        <a href="#" title="2940">2940</a>
                        <a href="#" title="RT18XB">RT18XB</a>
                        <a href="#" title="MX001">MX001</a>
                        <a href="#" title="Generic PMP">Generic PMP</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
        <div class="search_box" id="con_one_15" style="display:none;">
          <div class="box">
            <div class="box_model">
              <p class="model_title"><a href="baojialist_wxb_search?keyword=UHMWPE" title="UHMWPE">UHMWPE</a></p>
              <div class="model_content">
                        <a href="baojialist_wxb_search?keyword=HD-8200B" title="HD-8200B">HD-8200B</a>
                        <a href="baojialist_wxb_search?keyword=UH 034" title="UH 034">UH 034</a>
                        <a href="baojialist_wxb_search?keyword=U-PE350" title="U-PE350">U-PE350</a>
                        <a href="baojialist_wxb_search?keyword=1000 UV Stabilized Black" title="1000 UV Stabilized Black">1000 UV Stabilized Black</a>
                        <a href="baojialist_wxb_search?keyword=PE-UHMW" title="PE-UHMW">PE-UHMW</a>
                        <a href="baojialist_wxb_search?keyword=GUR 5113" title="GUR 5113">GUR 5113</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4113" title="GUR 4113">GUR 4113</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4120" title="GUR 4120">GUR 4120</a>
                        <a href="baojialist_wxb_search?keyword=GUR 4152" title="GUR 4152">GUR 4152</a>
                        <a href="baojialist_wxb_search?keyword=UHMWPE">更多&gt;&gt;</a>
              </div>
            </div>
            <div class="box_model">
                  <p class="model_title"><a href="#" title="ULDPE">ULDPE</a></p>
                    <div class="model_content">
                        <a href="#" title="4404G">4404G</a>
                        <a href="#" title="4701">4701</a>
                        <a href="#" title="4702">4702</a>
                        <a href="#" title="4607GC">4607GC</a>
                        <a href="#" title="4203">4203</a>
                        <a href="#" title="4607G">4607G</a>
                        <a href="#" title="NG 4701G">NG 4701G</a>
                        <a href="#" title="4403">4403</a>
                        <a href="#" title="4206">4206</a>
                        <a href="#">更多&gt;&gt;</a>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- 尾部 -->
<?php echo W('Default/webfooter');?>