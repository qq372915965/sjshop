/**
 * autoload all javascript
 * @param jsFile
 */
function autoLoadJs(jsFile){
    var oHead = document.getElementsByTagName('HEAD').item(0);
    var oScript= document.createElement("script");
    oScript.type = "text/javascript";
    oScript.src=jsFile+'&t='+Math.random();
    oHead.appendChild( oScript);
}


/**
 * Here is the public function
 */
$(function(){

    //01.header top the City screening
    $('.city_screening').hover(function(){
        $(this).addClass('curr');
    },function(){
        $(this).removeClass('curr');
    });
    $('.city_list li a').click(function(){
        var oCityName = $('.city_name');
        var oTex = $(this).text();
        oCityName.text(oTex);
    });
    $('.city_list li').each(function(){
        if($(this).find('a').text()=='上海'||$(this).find('a').text()=='宁波'||$(this).find('a').text()=='余姚'||$(this).find('a').text()=='汕头'){
            $(this).find('a').css('color','red');
        }
    });

    //02.header top the weixin hover
    $('.sn-b-j').hover(function(){
        $(this).find('b').show();
    },function(){
        $(this).find('b').hide();
    });

    //03.search tag hover
    $('.search_wrap').hover(function(){
        $('.search_tty').show();
    },function(){
        $('.search_tty').hide();
    });
    $('.search_tty span').click(function(){
        $('.search_ttys span').text($(this).text());
        $('.search_ttys span').attr('v',$(this).attr('v'));
        $('.search_ttys span').attr('href',$(this).attr('href'));
        $('.search_tty').hide();
    });
    $('.search_tty span').click(function(){
        var stv =  $(this).attr('v');
        var sts =  $(this).attr('s');
        $(this).addClass('curr').siblings().removeClass('curr');
        $('.search-text').attr('placeholder',sts);
        $('.search-text').attr('v',stv);
    });

    //这边显示数据
    //04.Join a shopping cart
    var Timer = null;
    $('.shopping-cart').hover(function () {
        if ($(this).find('.icons').text() == 0) {
            $('.shopping-cart-t').addClass('curr');
            $('.prompt').show();
        }
    },function(){
        $('.shopping-cart-t').removeClass('curr');
        $('.settleup-content').hide();
        $('.prompt').hide();
    });
    $('.settleup-content').hover(function(){
        clearInterval(Timer);
    });
    $('.shopping-cart-t').hover(function () {
        //这边显示数据
        $.ajax({
            url: "/shopcart/getshopcart",
            data: {},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                showshopcart(data);
            }
        });
        function showshopcart(data) {
            var cartlist = data.list;
            var num = data.num;
            var price = data.price;
            if (num == 0 || num == 'null') {
                $(".shopping-cart-t .icons").html('0');
            } else {
                $(".shopping-cart-t .icons").html(num);
            }
                //alert(cartlist.length);
            var str = '';
            if (cartlist.length == 0) {
                str = "<div class=\"prompt\">购物车中还没有商品，赶紧选购吧！</div>";
            } else {
                str += "<ul>";
                for (var i in  cartlist) {
                    str += "<li>";
                    str += "<div class=\"set_cot_text\">";
                    str += "<a href=\"#\">" + cartlist[i].cate_name + "-" + cartlist[i].product_name + "-" + cartlist[i].brand_name + "</a>";
                    str += "</div>";
                    str += "<span class=\"set_cot_amount\">" + cartlist[i].price + "<i class=\"gray\">x" + cartlist[i].buynum + "</i></span><span quote_id=" + cartlist[i].quote_id + " class=\"set_cot_close\"></span>";
                    str += "</li>";
                }
                str += "</ul>";
                str += "<div class=\"set_con_ft\">";
                str += "<div class=\"set_con_sp\">";
                str += "<p>共<span class=\"orange newcart\">" + num + "</span>吨商品</p>";
                //str += "<p class=\"orange lh22\"><span class=\"fs20\">" + price + "</span>元</p>";
                str += "</div>";
                str += "<a href=\"/shopcart.html\" class=\"set_con_btn\">去购物车结算</a>";
                str += "</div>";
            }
            $('.settleup-content').html(str);
            $('.shopping-cart-t').addClass('curr');
            $('.settleup-content').show();
        }
        clearInterval(Timer);
    },function(){
        Timer =setTimeout(function(){
            $('.shopping-cart-t').removeClass('curr');
            $('.settleup-content').hide();
            $('.prompt').hide();
        },10);
    });


    /**
     * add shopping cart
     */
    $(document).delegate(".addcart", "click", function () {
        var quote_id = $(this).attr("buy_id");
        var price = $(this).attr("price");
        $.ajax({
            url: "/shopcart/addcart",
            data: {quote_id: quote_id},
            type: "POST",
            dataType: "json",
            success: function (data) {
                //缺个好看的样式
                if( data.state === 'success')
                {
                    var shpnum = $(".shopcart_num").text();
                    var num = parseInt(shpnum)+1;
                    $(".shopcart_num").html(num);
                    //sAlert(data.msg);
                    //setTimeout(closealert, 1000 );//延迟5000毫米
                    window.location.href='/shopcart.html';
                }else{
                    sAlert(data.msg);
                    setTimeout(closealert, 1000 );//延迟5000毫米
                }

            }
        });
    })


    $(document).delegate(".set_cot_close", "click", function () {
        var quote_id = $(this).attr("quote_id");
        var oThis = $(this);
        $.ajax({
            url: "/shopcart/removes",
            data: {'quote_id':quote_id},
            type: "post",
            dataType: "json",
            success: function (data) {
                //Refrush();
                oThis.closest('li').remove();
                $(".newcart").text(data.newcart)
                $(".shopping-cart .icons").text(data.newcart);
                if($('.settleup-content li').length==0){
                    $('.settleup-content').hide();
                    $('.prompt').show();
                }
            }
        });
    });

    function Refrush() {
        $.post("/Json/refrushcookie", {}, function (data) {
            if (data.code == '8') {
                $(".shopping-cart .icons").text(data.num);
            }
        }, 'json');
    }

    //05.Member center drop down menu
    $('.myuser').hover(function(){
        $.ajax({
            url: "/common/getuserorderinfo",
            data: {},
            type: "post",
            dataType: "json",
            success: function (data) {
                var html = "<ul><li><a href='/user/supplyorder/status/draft'>待确认供应订单(<span>"+data.saletotal+"</span>)</a></li><li><a href='/user/purchaseorder/status/draft'>待确认采购订单(<span>"+data.quotationtotal+"</span>)</a></li></ul>";
                $(".message").html(html);
            }
        });
        $(".message").show();
        $('.myuser_name').addClass('curr');
    },function(){
        $(".message").hide();
        $('.myuser_name').removeClass('curr');
    });

    //06. Self negotiation
    $(document).delegate('.product-tm li','mouseover',function(){
        $(this).addClass('curr');
    });
    $(document).delegate('.product-tm li','mouseout',function(){
        $('.product-tm li').removeClass('curr');
    });

    
    $(document).delegate('.preview','mouseover',function(){
         $(this).closest('.product-tm li').addClass('currs');
    });

    $(document).delegate('.preview','mouseout',function(){
        $(this).closest('.product-tm li').removeClass('currs');
    });


    $('.scree-list>li:odd').css('background','#fafafa'); //隔行换色
    var iNm = true;
    $('.scree-list a.more').click(function(){

        if(iNm){
            $(this).addClass('curr');
            $(this).parents('li').height('auto');
        }else{
            $(this).removeClass('curr');
            $(this).parents('li').height('50px');
        }
        iNm=!iNm;
    });


    //07 remove div
    $(document).delegate(".overlay-close", "click", function(){
        $(".remove").remove();
    })
    $(document).delegate(".close", "click", function(){
        $(".remove").remove();
    })

    /**
     *  Read data in accordance with the province's data
     */
    $(document).delegate("#province", "change", function(){
        var provice_id = $(this).val();
        if(provice_id=="请选择"){
            alert("请先选择！");
            return false;
        }
        var url = "/region/getcitylist";
        $.ajax({
            url: url,//请求的地址
            type:'POST',
            dataType: "JSON",//请求的数据格式
            data: {
                region_id: provice_id //请求的数据
            },
            success: function(data) {
                if(data=='-1'){
                    alert("请先选择省份!");return false;
                }else{
                    $("#city option").remove();
                    var html = "<option>请选择</option>";
                    for(var k in data){
                        html +="<option value=\""+data[k].region_code+"\">"+data[k].region_name+"</option>";
                    }
                    $("#city").append(html);
                }
            }
        });
    });

    /**
     *   Read County in accordance with the city's data
     */
    $(document).delegate("#city", "change", function(){
        var city_id = $(this).val();
        if(city_id=="请选择"){
            alert("请先选择！"); return false;
        }
        var url = "/region/getcitylist";
        $.ajax({
            url: url,//请求的地址
            type:'post',
            dataType: "json",//请求的数据格式
            data: {
                region_id: city_id //请求的数据
            },
            success: function(data) {
                if(data=='-1'){
                    alert("请先选择城市!");return false;
                }else{
                    $("#area option").remove();
                    var html = "<option>请选择</option>";
                    for(var k in data){
                        html +="<option value=\""+data[k].region_code+"\">"+data[k].region_name+"</option>";
                    }
                    $("#area").append(html);
                }
            }
        });
    });

});

function closealert()
{
    $("#s_alert").remove();
    $("#s_alert_mask").remove();
}

(function(jQuery){
    
    var isMoving = false;
    var relativeTop  = 0;
    var relativeLeft = 0;

    jQuery.sAlert = function(options){
        // 参数加载默认值
        options = jQuery.extend({}, jQuery.sAlert.defaults, options);

        // 清理可能重复的DOM对象
        jQuery('#s_alert_mask').remove();
        jQuery('#s_alert').remove();

        // 建立遮罩层的DOM对象
        var maskObj = jQuery('<div id="s_alert_mask" style="display:none"></div>');
        maskObj.css("width",document.body.scrollWidth).css("height",document.body.scrollHeight);

        // 建立Alert的DOM对象
        var str = '';
        str += '<div id="s_alert" class="s_common_alert" style="display:none">';
        str +=      '<h2 class="s_common_alert_title"><span class="s_common_alert_close alert_close"></span>'+options.title+'</h2>';
        str +=      '<div class="s_common_alert_content">';
        str +=          '<p class="tac">'+options.content+'</p>';
        str +=          '<div class="tac"><input type="button" class="s_common_alert_button alert_close" value="'+options.btnText+'" hidefocus="true" /></div>';
        str +=      '</div>';
        str += '</div>';
        var alertObj = jQuery(str);

        //// 拖动效果
        //alertObj.find('.s_common_alert_title')
        //    .mousedown(function(e){
        //        isMoving = true;
        //        relativeTop  = e.clientY - jQuery('#s_alert').offset().top;
        //        relativeLeft = e.clientX - jQuery('#s_alert').offset().left;
        //    })
        //    .mouseup(function(){
        //        isMoving = false;
        //    });
        //jQuery('body').mousemove(function(e){
        //    if(isMoving){
        //        jQuery('#s_alert').css({left:e.clientX - relativeLeft, top:e.clientY - relativeTop});
        //    };
        //});

        // 关闭
        alertObj.find('.alert_close').click(function(){
            maskObj.hide();
            alertObj.hide();
            if(options.callback) options.callback();    // 执行回调函数
        });

        // 初始化
        if(true === options.isShowMask){
            maskObj.appendTo('body').show();
        }

        maskObj.appendTo('body').show();
        alertObj.appendTo('body').show();
        alertObj.find('.s_common_alert_button').focus();   // 设置按回车键即等同于点击弹层上的按钮

        return alertObj;
    };

    // 默认值
    jQuery.sAlert.defaults = {
        content     : '提示文字',
        callback    : function(){},
        isShowMask  : false,
        title       : '提示',
        btnText     : '确定'
    };

    // 绑定到全局的sAlert函数
    window.sAlert = function(content, callback, isShowMask, title, btnText){
        // 参数处理
        var options;
        if( 'object' === typeof(arguments[0]) ) { // 传入对象
            options = arguments[0];
        } else {    // 传入独立的参数值
            options = {content:content, callback:callback, isShowMask:isShowMask, title:title, btnText:btnText};
        }

        // 交由jQuery的sAlert来执行
        jQuery.sAlert(options);
    }
})(jQuery);


