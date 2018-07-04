/**
 * Created by Administrator on 2016-01-04-0004.
 */
$(function(){
    var iNow = true;
    /**
     * Selected product
     */
    $('.j_sp_qx').click(function(){
        if(iNow){ //全选
            $(this).find('i').removeClass('check_invert');
            $(this).find('i').addClass('check_all');
            $('.sp_cat_wrap_list_lb').find('.sp_cat_w1 i').removeClass('check_invert');
            $('.sp_cat_wrap_list_lb').find('.sp_cat_w1 i').addClass('check_all');
            $('.sp_lc_btn').removeClass('btn_disabled');
            iNow=false;
            //全部选中的要添加的总计：
            var total = $(".sp_cat_wrap_list_lb ul").length;

            //total.text(total);
            //var count_num =  Number($(".count_num").attr("num"));

            $(".count_num").text(total);
        }else{   //反选
            $(this).find('i').removeClass('check_all');
            $('.sp_cat_wrap_list_lb').find('.sp_cat_w1 i').removeClass('check_all');
            $(this).find('i').addClass('check_invert');
            $('.sp_cat_wrap_list_lb').find('.sp_cat_w1 i').addClass('check_invert');
            $('.sp_lc_btn').addClass('btn_disabled');
            iNow=true;
            //这边未选中的要去掉总计：
            var total = $(".total_price");
//                total.text(0);
            $(".count_num").text(0);
        }
    });

    /**
     * Selected product
     */
    $('.sp_cat_w1 i').click(function(){    //选中 反选
        if($(this).attr('class')=='check_invert'){
            $(this).removeClass('check_invert');
            $(this).addClass('check_all');
            $('.sp_lc_btn').removeClass('btn_disabled');
            //选中加上小计
            var total = $(".total_price");
            var count_num = Number($(".count_num").text());
            var total_price = Number(total.text());
            var price_num = $(this).closest(".sp_catlt_t").find('.price_num');
            //total.text(total_price+Number(price_num.text()));
            //这边还要添加所选产品的小计
            $(".count_num").text(count_num+1);
        }else{
            $(this).removeClass('check_all');
            $(this).addClass('check_invert');

            //这边的提交按钮变色是在当一个也没有选择时
            var id = [];
            $('.sp_cat_wrap_list_lb').find('.sp_cat_w1 i').each(function(index,item){
                if($(this).attr("class")=='check_all'){
                    var quote_id =   $(this).closest(".sp_catlt_t").find('.sp_cat_close').attr("quote_id");
                    id.push(quote_id);
                }
            });
            if(id==''){
                $('.sp_lc_btn').addClass('btn_disabled');
            }
            //未选择去掉小计
            var total = $(".total_price");
            var count_num = Number($(".count_num").text());
            var total_price = Number(total.text());
            var price_num = $(this).closest(".sp_catlt_t").find('.price_num');
            //total.text(total_price-Number(price_num.text()));
            $(".count_num").text(count_num-1);
        }

    });


    var NumNew = 0;//当前改变的数量
    var MaxNum = 1000;//库存
    /**
     * minus product num
     */
    $('.sp_cat_subtract').click(function(){//商品数量减1
        var ipt = $(this).siblings('input.sp_cat_put');
        var mark = $(this).attr("mark");
        var quote_id = $(this).attr("quote_id");
        var nownum = ipt.val();
        var price_num = $(this).closest(".sp_catlt_t").find('.price_num');
        var total = $(".total_price");
        if(ipt.val()<=1){
            ipt.val("1");
            return;
        }else{
            NumNew = ipt.val()-1;
            ipt.val(NumNew);
            var price = ipt.attr("price");
            price_num.text(mark+NumNew*price);

            $.ajax({
                url: "/shopcart/updatanum",
                data: {'quote_id':quote_id,'buynum':ipt.val()},
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    return true;
                }
            });
        }
    });


 $('.sp_cat_put').change(function () {
        var ipt = $(this);
        var mark = $(this).attr("mark");
        var quote_id = $(this).attr("quote_id");
        var nownum = ipt.val();
        var price_num = $(this).closest(".sp_catlt_t").find('.price_num');
        var stock = $(this).closest(".sp_catlt_t").find('.stock');
        var MaxNum = stock.text();

        if(Number(nownum)>Number(MaxNum)) {
            //CxcDialog('提示框','对不起,您设置的数量超出商品数量','Warning');
            ipt.val(1);
            sAlert('对不起,您设置的数量超出商品数量');
            return false;
        }else{
            $.ajax({
                url: "/shopcart/updatanum",
                data: {'quote_id':quote_id,'buynum':nownum},
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    return true;
                }
            });
        }
    })

    /**
     * add product num
     */
    $('.sp_cat_add').click(function(){//商品数量加1

        var ipts = $(this).siblings('input.sp_cat_put');
        var mark = $(this).attr("mark");
        var quote_id = $(this).attr("quote_id");
        var  iptsVal  = ipts.attr('value');
        var price_num = $(this).closest(".sp_catlt_t").find('.price_num');
        var total = $(".total_price");
        var stock = $(this).closest(".sp_catlt_t").find('.stock');
        MaxNum = stock.text();

        if(Number(ipts.val())>Number(MaxNum)){
            //CxcDialog('提示框','对不起,您设置的数量超出商品数量','Warning');
            sAlert('对不起,您设置的数量超出商品数量');
            ipts.val(ipts.val()-1);
        }else{
            NumNew = Number(ipts.val())+1;
            ipts.val(NumNew);
            var price = ipts.attr("price");

            price_num.text(mark+NumNew*price);

            $.ajax({
                url: "/shopcart/updatanum",
                data: {'quote_id':quote_id,'buynum':ipts.val()},
                type: 'post',
                dataType: 'json',
                success: function (data) {
                        return true;
                }
            });
        }
    });

    /**
     * del a product
     */
    $('.sp_cat_close').click(function(){
        var quote_id = $(this).attr("quote_id");
        var obj = $(this);
        $.ajax({
            url: "/shopcart/removes",
            data: {'quote_id':quote_id},
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                //alert(data);

                sAlert(data.msg);
                obj.parent().parent('ul').remove();
                setTimeout(closealert, 1000 );//延迟5000毫米


                //window.location.reload();
            }
        });
    });


    /**
     * cleaned out  Shopping Cart
     */
    $('.delchecked').click(function(e){
        e.preventDefault();
        if(confirm("您确定清空购物车吗？")) {
            $.ajax({
                url: "/shopcart/removeall",
                data: {},
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    sAlert(data.msg);
                    window.location.reload();
                }
            });
        }
    });


    /**
     * submit a order
     */
    $(".submit_product").on("click",function(){
        //先判断是否选中
        var id = [];
        $('.sp_cat_wrap_list_lb').find('.sp_cat_w1 i').each(function(index,item){
            if($(this).attr("class")=='check_all'){
                var quote_id =   $(this).closest(".sp_catlt_t").find('.sp_cat_close').attr("quote_id");
                id.push(quote_id);
            }
        });

        if(id==''){
            //CxcDialog('提示框',"请先选中购买的产品!",'Error');
            sAlert("请选择要采购的产品!");
            return false;
        }

        //这边验证是否登录
        $.ajax({
            url:'/shopcart/initorder',
            data:{quote_id:id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.stats = 'success')
                {
                    window.location.href="/shopcart/setpone";
                }
            }
        });

    });

    /**
     * submit a order
     */
    $(".submit_order").on("click",function(){
        //先判断是否选中
        var open_switch = $(this).attr("dbled");

        if(open_switch === '1'){
            return false;
        }

     
        $.ajax({
           url:'/shopcart/createorder',
            data:{},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.stats = 'success')
                {
                    window.location.href="/shopcart/setptow/orderid/"+data.order_id;
                }
            }
        });

    });

    /**
     * 购物车选择初始化
     */
    $('.sp_cat_company_info_l>li').click(function(){
        $(this).siblings('li').find('.j_ra').removeClass('radio_all');
        $(this).siblings('li').find('.j_ra').addClass('radio_invert');
        $(this).find('.j_ra').removeClass('radio_invert');
        $(this).find('.j_ra').addClass('radio_all');
    });
    $('.sp_cart_wtps').click(function(){
        $('.sp_cat_ci_address').show();
    });
    $('.sp_cart_zt').click(function(){
        $('.sp_cat_ci_address').hide();
    });
    /**
     * 创建公司
     */
    $('.addcompany').click(function(){
        var business_name = $('input[name=business_name]').val();
        var contacts = $('input[name=contacts]').val();
        var mobile =  $('input[name=mobile]').val();
        var phone = $('input[name=phone]').val();
        if(!business_name)
        {
            sAlert("请输入采购公司名称");
        }
        if(!contacts)
        {
            sAlert("请输入联系人");
        }
        if(!mobile)
        {
            sAlert("请输入手机号");
        }
        if(!phone)
        {
            sAlert("请输入座机号");
        }
        $.ajax({
            url:"/shopcart/setcompany",
            data:{business_id:business_id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.state=='success'){
                    sAlert(data.msg);
                    window.location.reload();
                    //var invoice = data.msg;
                    //var html= "";
                    //html +="<li><i class=\"radio_all j_ra\"></i><span class=\"pr20\">发票抬头："+invoice.name+"</span><span class=\"pr20\">发票配送地址："+invoice.province_name+invoice.city_name+invoice.area_name+invoice.business_addr+"</span></li>";
                    //$(".invoice").html(html);
                }
            }
        });
    })

    /**
     * 选择公司
     */
    $(".company>li").click(function(){
        var business_id = $(this).find('.j_ra').attr("business_id");
        $.ajax({
            url:"/shopcart/setcompany",
            data:{business_id:business_id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.state=='success'){
                    // sAlert(data.msg);
                    window.location.reload();
                    //var invoice = data.msg;
                    //var html= "";
                    //html +="<li><i class=\"radio_all j_ra\"></i><span class=\"pr20\">发票抬头："+invoice.name+"</span><span class=\"pr20\">发票配送地址："+invoice.province_name+invoice.city_name+invoice.area_name+invoice.business_addr+"</span></li>";
                    //$(".invoice").html(html);
                }
            }
        });
    });

    $(".invoice>li").click(function(){
        var pay_id = $(this).find('.j_ra').attr("pay_id");
        $.ajax({
            url:"/shopcart/setpay",
            data:{pay_id:pay_id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.state=='success'){
                    // sAlert(data.msg);
                    window.location.reload();
                    //var invoice = data.msg;
                    //var html= "";
                    //html +="<li><i class=\"radio_all j_ra\"></i><span class=\"pr20\">发票抬头："+invoice.name+"</span><span class=\"pr20\">发票配送地址："+invoice.province_name+invoice.city_name+invoice.area_name+invoice.business_addr+"</span></li>";
                    //$(".invoice").html(html);
                }
            }
        });
    });
    $(".delivery_action>li").click(function(){
        var delivery_id = $(this).find('.j_ra').attr("delivery_id");

        $.ajax({
            url:"/shopcart/setdelivery",
            data:{delivery_id:delivery_id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.state=='success'){
                    // sAlert(data.msg);
                    window.location.reload();
                    //var invoice = data.msg;
                    //var html= "";
                    //html +="<li><i class=\"radio_all j_ra\"></i><span class=\"pr20\">发票抬头："+invoice.name+"</span><span class=\"pr20\">发票配送地址："+invoice.province_name+invoice.city_name+invoice.area_name+invoice.business_addr+"</span></li>";
                    //$(".invoice").html(html);
                }
            }
        });
    });
    $(".address>li").click(function(){
        var area_id = $(this).find('.j_ra').attr("area_id");
        $.ajax({
            url:"/shopcart/setarea",
            data:{area_id:area_id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.state=='success'){
                    // sAlert(data.msg);
                    window.location.reload();
                    //var invoice = data.msg;
                    //var html= "";
                    //html +="<li><i class=\"radio_all j_ra\"></i><span class=\"pr20\">发票抬头："+invoice.name+"</span><span class=\"pr20\">发票配送地址："+invoice.province_name+invoice.city_name+invoice.area_name+invoice.business_addr+"</span></li>";
                    //$(".invoice").html(html);
                }
            }
        });
    });

    $('.address-zm li').hover(function(){
        $(this).addClass('curr').siblings().removeClass('curr');
    },function(){
        $('.address-zm li').removeClass('curr');
    });

    $('.add_company').click(function(){
        company_html();
    });
    function company_html()
    {
        var html = "<div class='mui-dialog-mask remove j_company' ></div><div class='mui-dialog remove j_company' style='width:500px; height:335px; left:50%; top:50%;margin-top:-150px;position:fixed;margin-left:-250px;'>";
        html += "<a class='overlay-close' href='javascript:void(0)'></a>";
        html += "<div class='mui-diglog-wrap'>";
        html += "<div class='mui-dialog-header'>添加公司信息</div>";
        html += "<div class='mui-dialog-body'>";
        html += "<div class='brandMsgTips' style='margin:20px;'>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　公司名称：<input type='text' placeholder='请输入公司名称'   class='new_ph_text' name='business_name' id='business_name' style='width: 264px;'/></div>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　　联系人：<input type='text' placeholder='请输入联系人'  id='contacts' class='new_ph_text' name='contacts' style='width: 264px;'/></div>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　联系手机：<input type='text' placeholder='请输入联系手机'  id='mobiles' class='new_ph_text' name='mobiles' style='width: 264px;'/></div>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　联系电话：<input type='text' placeholder='请输入联系电话'  id='phone' class='new_ph_text' name='phone' style='width: 264px;'/></div>";
        html += "<div class='buy_btn clearfix' style='padding-top:10px;padding-left:58px;'><input type='button' class='popup_abtn save_company' value='保 存'></div>";
        html += "</form>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "<div class='mui-dialog-skin'></div>";
        html += "</div>";
        $("body").append(html);
    }

    $(document).delegate(".save_company", "click", function(){
        var business_name = $("input[name=business_name]").val();
        var contacts = $("input[name=contacts]").val();
        var mobile = $("input[name=mobiles]").val();
        var phone = $("input[name=phone]").val();

        if(business_name == '')
        {
            sAlert('请输入公司名称');
            return false;
        }
        if(contacts == '')
        {
            sAlert('请输入联系人');
            return false;
        }
        if(mobile == '')
        {
            sAlert('请输入联系手机');
            return false;
        }else {
                if(!(/^1(3|4|5|7|8)\d{9}$/.test(mobile))){
                    sAlert("手机号码格式不正确!");
                    return false;
                }
        }

        if(phone == '')
        {
            sAlert('请输入联系电话');
            return false;
        }else{
            if(!/^(\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,14}$/.test(phone)){
                sAlert('联系电话格式不正确');
                return false;
            }
        }

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'business_name':business_name,
                'contacts':contacts,
                'mobile':mobile,
                'phone':phone,
            },
            url:"/user/addcompanys",
            success:function(data){
                // sAlert(data.msg);
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
                return true;
            }
        });
    });

    $('.shipping_address li').hover(function(){
        $(this).addClass('curr').siblings().removeClass('curr');
    },function(){
        $('.shipping_address li').removeClass('curr');
    });

    $('.ps_address').click(function(){
        address_html();
    });
    function address_html()
    {
        var html = "<div class='mui-dialog-mask remove j_address' ></div><div class='mui-dialog remove j_address' style='width:500px; height:335px; left:50%; top:50%;margin-top:-150px;position:fixed;margin-left:-250px;'>";
        html += "<a class='overlay-close' href='javascript:void(0)'></a>";
        html += "<div class='mui-diglog-wrap'>";
        html += "<div class='mui-dialog-header'>添加收货地址</div>";
        html += "<div class='mui-dialog-body'>";
        html += "<div class='brandMsgTips' style='margin:20px;'>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　姓名：<input type='text' placeholder='请输入姓名' maxlength='11'  class='new_ph_text' name='username' id='name' style='width: 264px;'/></div>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　电话：<input type='text' placeholder='请输入电话' maxlength='11' id='mobile' class='new_ph_text' name='mobile' style='width: 264px;'/></div>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'><i class='fl' style='padding-left:28px;padding-top:3px;'>地址：</i>";
        html += "<div class='popup_semg'><label></label>";
        html += "<select name='province_id' id='province'>";
        html += "<option>省/市</option>";
        html += "<option value='110000'>北京市</option>";
        html += "<option value='120000'>天津市</option>";
        html += "<option value='130000'>河北省</option>";
        html += "<option value='130000'>河北省</option>";
        html += "<option value='140000'>山西省</option>";
        html += "<option value='150000'>内蒙古自治区</option>";
        html += "<option value='210000'>辽宁省</option>";
        html += "<option value='220000'>吉林省</option>";
        html += "<option value='230000'>黑龙江省</option>";
        html += "<option value='310000'>上海市</option>";
        html += "<option value='320000'>江苏省</option>";
        html += "<option value='330000'>浙江省</option>";
        html += "<option value='340000'>安徽省</option>";
        html += "<option value='350000'>福建省</option>";
        html += "<option value='360000'>江西省</option>";
        html += "<option value='370000'>山东省</option>";
        html += "<option value='410000'>河南省</option>";
        html += "<option value='420000'>湖北省</option>";
        html += "<option value='430000'>湖南省</option>";
        html += "<option value='440000'>广东省</option>";
        html += "<option value='450000'>广西壮族自治区</option>";
        html += "<option value='460000'>海南省</option>";
        html += "<option value='500000'>重庆市</option>";
        html += "<option value='510000'>四川省</option>";
        html += "<option value='520000'>贵州省</option>";
        html += "<option value='530000'>云南省</option>";
        html += "<option value='540000'>西藏自治区</option>";
        html += "<option value='610000'>陕西省</option>";
        html += "<option value='620000'>甘肃省</option>";
        html += "<option value='630000'>青海省</option>";
        html += "<option value='640000'>宁夏回族自治区</option>";
        html += "<option value='650000'>新疆维吾尔自治区</option>";
        html += "<option value='710000'>台湾省</option>";
        html += "<option value='810000'>香港特别行政区</option>";
        html += "<option value='820000'>澳门特别行政区</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='popup_semg'><label></label>";
        html += "<select name='city_id' id='city'>";
        html += "<option>城市</option>";
        html += "<option class='110000'>北京市</option>";
        html += "</select>";
        html += "</div>";
        html += "<div class='popup_semg'><label></label>";
        html += "<select name='area_id' id='area'>";
        html += "<option>区/县</option>";
        html += "</select>";
        html += "</div>";
        html += "<div style='padding-left:70px;padding-top:10px;overflow:hidden;clear:both;'><input type='text' placeholder='街道地址'   class='new_ph_text' name='address' id='address' style='width: 264px;'/></div>";
        html += "</div>";
        html += "<div style='padding-left:70px;overflow:hidden;clear:both;'><label><input name='is_default' id='is_default' type='checkbox' value='Y' /> 设置为默认地址</label></div>";
        html += "<div id='msg' class='yellow tmgfb  ' style='padding-top:0px;'></div>";
        html += "<div class='buy_btn clearfix' style='padding-top:10px;padding-left:58px;'><input type='button' class='popup_abtn save_address' value='保 存'></div>";
        html += "</form>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "<div class='mui-dialog-skin'></div>";
        html += "</div>";
        $("body").append(html);
    }

    $(document).delegate(".save_address", "click", function(){
        var username = $("input[name=username]").val();
        var mobile  = $("input[name=mobile]").val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var address = $("input[name=address]").val();
        var is_default  = $("input[name=is_default]").val();

        if(!username){
            sAlert('请输入姓名');
            return false;
        }
        if(!mobile){
            sAlert('请输入电话');
            return false;
        }else{
            if(!(/^1(3|4|5|7|8)\d{9}$/.test(mobile))){
                sAlert("手机号码格式不正确!");
                return false;
            }
        }
        if(!province_id){
            sAlert('请选择省!');
            return false;
        }
        if(!city_id){
            sAlert('请选择市!');
            return false;
        }
        if(!area_id){
            sAlert('请选择县!');
            return false;
        }
        if(!address){
            sAlert('请填写地址!');
            return false;
        }

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'username':username,
                'mobile':mobile,
                'province_id':province_id,
                'city_id':city_id,
                'area_id':area_id,
                'mobile':mobile,
                'address':address,
                'is_default':is_default,
            },
            url:"/user/addaddress",
            success:function(data){
                if(data.state =='success'){
                   window.location.reload();
                }else{
                    sAlert(data.msg);
                }
                return true;
            }
        });
    });

    $(document).delegate(".input-btn", "click", function(){
        var business_name = $("input[name=business_name]").val();
        var contacts = $("input[name=contacts]").val();
        var mobile = $("input[name=mobile]").val();
        var phone = $("input[name=phone]").val();

        if(business_name == '')
        {
            sAlert('请输入公司名称');
            return false;
        }
        if(contacts == '')
        {
            sAlert('请输入联系人');
            return false;
        }
        if(mobile == '')
        {
            sAlert('请输入联系手机');
            return false;
        }
        if(phone == '')
        {
            sAlert('请输入联系电话');
            return false;
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'business_name':business_name,
                'contacts':contacts,
                'mobile':mobile,
                'phone':phone,
            },
            url:"/user/addcompanys",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                        window.location.href="/user/company";
                }
                return true;
            }
        });
    });

    $(document).delegate(".input-btn1", "click", function(){
        var username = $("input[name=username]").val();
        var mobile  = $("input[name=mobile]").val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var address = $("input[name=address]").val();

        if(!username){
            sAlert('请输入姓名');
            return false;
        }
        if(!mobile){
            sAlert('请输入电话');
            return false;
        }
        if(!province_id){
            sAlert('请选择省!');
            return false;
        }
        if(!city_id){
            sAlert('请选择市!');
            return false;
        }
        if(!area_id){
            sAlert('请选择县!');
            return false;
        }
        if(!address){
            sAlert('请填写地址!');
            return false;
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'username':username,
                'mobile':mobile,
                'province_id':province_id,
                'city_id':city_id,
                'area_id':area_id,
                'address':address,
            },
            url:"/user/addaddress",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                        window.location.href="/user/address";
                }
                return true;
            }
        });
    });
});

