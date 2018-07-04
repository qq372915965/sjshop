/**
 * Created by Administrator on 2016-04-27.
 */
$(function(){

    /**
     *  Member information editing save
     */
    $(".userinfo_btn").click(function(){
        var realname = $('input[name="realname"]').val();
        var qq = $('input[name="qq"]').val();
        var email = $('input[name="email"]').val();
        var tel = $('input[name="tel"]').val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var detail_addr = $('input[name="detail_addr"]').val();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{'realname':realname,'qq':qq,'email' : email,'tel' : tel, 'province_id':province_id, 'city_id':city_id,'area_id':area_id,'detail_addr':detail_addr},
            url:"/user/userinfo",
            success:function(data){
                sAlert(data.msg);
                return true;
            }
        });
    });

    /**
     * add company information
     */
    $(".addcompany_btn").click(function(){
        var business_name = $('input[name="business_name"]').val();
        var business_remarks = $('input[name="business_remarks"]').val();
        var business_phone = $('input[name="business_phone"]').val();
        var main_variety = $('#main_variety').val();
        var contacts = $('input[name="contacts"]').val();
        var mobile = $('input[name="mobile"]').val();
        var phone = $('input[name="phone"]').val();
        var qq = $('input[name="qq"]').val();
        var email = $('input[name="email"]').val();
        var title = $('input[name="title"]').val();
        var ldentifier = $('input[name="ldentifier"]').val();
        var register_addr = $('input[name="register_addr"]').val();
        var register_phone = $('input[name="register_phone"]').val();
        var open_bank = $('input[name="open_ank"]').val();
        var bank_number = $('input[name="bank_number"]').val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var business_addr = $('input[name="business_addr"]').val();
        var backurl = $('input[name="backurl"]').val();

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

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'business_name':business_name,
                'business_remarks':business_remarks,
                'business_phone':business_phone,
                'main_variety':main_variety,
                'contacts':contacts,
                'mobile':mobile,
                'phone':phone,
                'qq':qq,
                'email':email,
                'title':title,
                'ldentifier':ldentifier,
                'business_addr':business_addr,
                'register_phone':register_phone,
                'open_bank':open_bank,
                'bank_number':bank_number,
                'province_id':province_id,
                'city_id':city_id,
                'area_id':area_id,
                'business_addr':business_addr,
                'backurl' : backurl,
            },
            url:"/user/addcompany",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    if(data.backurl){
                        window.location.href=data.backurl;
                    }else{
                        window.location.href="/user/company";
                    }
                }
                return true;
            }
        });
    });

    $(".addcompany_btn_2").click(function(){
        var business_name = $('input[name="business_name"]').val();
        var main_variety = $('#main_variety').val();
        var contacts = $('input[name="contacts"]').val();
        var mobile = $('input[name="mobile"]').val();
        var phone = $('input[name="phone"]').val();
        var backurl = $('input[name="backurl"]').val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var address = $('input[name="address"]').val();

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

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'business_name':business_name,
                'contacts':contacts,
                'mobile':mobile,
                'phone':phone,
                'backurl' : backurl,
                'province_id':province_id,
                'city_id':city_id,
                'area_id':area_id,
                'address':address,
            },
            url:"/user/addcompanys",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    if(data.backurl){
                        window.location.href=data.backurl;
                    }else{
                        window.location.href="/user/company";
                    }
                }
                return true;
            }
        });
    });

    $(".addcompany_btn_3").click(function(){

        //dom  值   $("#,. input[name="id"]).val()
        var id = $('input[name="id"]').val();
        var business_name = $('input[name="business_name"]').val();
        var main_variety = $('#main_variety').val();
        var contacts = $('input[name="contacts"]').val();
        var mobile = $('input[name="mobile"]').val();
        var phone = $('input[name="phone"]').val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var address = $('input[name="address"]').val();


        if(id == '') {
            if (business_name == '') {
                sAlert('请输入公司名称');
                return false;
            }
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
        }else if(!mobile.match(/^(?:13\d|14\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/)){
            sAlert('请输入正确联系手机');
            return false;
        }

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'business_id':id,
                'business_name':business_name,
                'main_variety':main_variety,
                'contacts':contacts,
                'mobile':mobile,
                'phone':phone,
                'province_id':province_id,
                'city_id':city_id,
                'area_id':area_id,
                'address':address,
            },
            url:"/user/addcompanyss",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    if(data.backurl){
                        window.location.href=data.backurl;
                    }else{
                        window.location.href="/user/company";
                    }
                }
                return true;
            }
        });
    });

    /**
     * edit company information
     */
    $(".editcompany_btn").click(function(){
        var id = $('input[name="id"]').val();
        var business_name = $('input[name="business_name"]').val();
        var business_remarks = $('input[name="business_remarks"]').val();
        var business_phone = $('input[name="business_phone"]').val();
        var main_variety = $('#main_variety').val();
        var contacts = $('input[name="contacts"]').val();
        var mobile = $('input[name="mobile"]').val();
        var phone = $('input[name="phone"]').val();
        var qq = $('input[name="qq"]').val();
        var email = $('input[name="email"]').val();
        var title = $('input[name="title"]').val();
        var ldentifier = $('input[name="ldentifier"]').val();
        var register_addr = $('input[name="register_addr"]').val();
        var register_phone = $('input[name="register_phone"]').val();
        var open_bank = $('input[name="open_bank"]').val();
        var bank_number = $('input[name="bank_number"]').val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var business_addr = $('input[name="business_addr"]').val();

        if(business_name == '')
        {
            sAlert('请输入公司名称');
            return false;
        }
        if(business_remarks == '')
        {
            sAlert('请输入公司简称');
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
        if(qq == '')
        {
            sAlert('请输入QQ号码');
            return false;
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'business_name':business_name,
                'business_remarks':business_remarks,
                'business_phone':business_phone,
                'main_variety':main_variety,
                'contacts':contacts,
                'mobile':mobile,
                'phone':phone,
                'qq':qq,
                'email':email,
                'title':title,
                'ldentifier':ldentifier,
                'business_addr':business_addr,
                'register_phone':register_phone,
                'open_bank':open_bank,
                'bank_number':bank_number,
                'province_id':province_id,
                'city_id':city_id,
                'area_id':area_id,
                'business_addr':business_addr,
            },
            url:"/user/editcompany",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    window.location.href="/user/company";
                }
                return true;
            }
        });
    });

    $(".editcompany_btn_2").click(function(){
        var id = $('input[name="id"]').val();
        var contacts = $('input[name="contacts"]').val();
        var mobile = $('input[name="mobile"]').val();
        var phone = $('input[name="phone"]').val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var address = $('input[name="address"]').val();
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

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'contacts':contacts,
                'mobile':mobile,
                'phone':phone,
                'province_id':province_id,
                'city_id':city_id,
                'area_id':area_id,
                'address':address ,
            },
            url:"/user/editcompanys",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    window.location.href="/user/company";
                }
                return true;
            }
        });
    });

    /**
     * setup default
     */
    $(".setup_default").click(function(e){
        e.preventDefault();
        var id= $(this).attr("val");
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            data:{
                'id':id,
            },
            url:"/user/statecompany",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    window.location.href="/user/company";
                }
                return true;
            }
        });
    });

    /**
     * delete company
     */
    $(".delete_btu").click(function(e){
        e.preventDefault();
        if(confirm("确定要删除吗？")){
            var id= $(this).attr("val");
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                data:{
                    'id':id,
                },
                url:"/user/delcompany",
                success:function(data){
                    sAlert(data.msg);
                    if(data.state =='success'){
                        window.location.href="/user/company";
                    }
                    return true;
                }
            });
        }
    })

    /**
     * upload img show name
     */
    $(".file1").change(function(){
        var file = $(this).val();
        var fileName = getFileName(file);
        $("#filename1").text(fileName);
        $(".imgfile1").val(fileName);
    });
    $(".file2").change(function(){
        var file = $(this).val();
        var fileName = getFileName(file);
        $("#filename2").text(fileName);
        $(".imgfile2").val(fileName);
    });
    $(".file3").change(function(){
        var file = $(this).val();
        var fileName = getFileName(file);
        $("#filename3").text(fileName);
        $(".imgfile3").val(fileName);
    });

    $(".excel").change(function(){
        var file = $(this).val();
        var fileName = getFileName(file);
        $("#filename").text(fileName);
        $(".file_excel").val(fileName);
    });

    function getFileName(o){
        var pos=o.lastIndexOf("\\");
        return o.substring(pos+1);
    }

    /**
     * add adders style
     */
    $('.shipping_address li').hover(function(){
        $(this).addClass('curr').siblings().removeClass('curr');
    },function(){
        $('.shipping_address li').removeClass('curr');
    });

    $('.add_icon_dz').click(function(){
        var backurl = $(this).attr('backurl');
        address_html(backurl);
    });
    function address_html(backurl)
    {

var html = "<div class='mui-dialog-mask remove j_address' ></div><div class='mui-dialog remove j_address' style='width:500px; height:335px; left:50%; top:50%;margin-top:-150px;position:fixed;margin-left:-250px;'>";
html += "<a class='overlay-close' href='javascript:void(0)'></a>";
        html += "<div class='mui-diglog-wrap'>";
        html += "<div class='mui-dialog-header'>添加收货地址</div>";
        html += "<div class='mui-dialog-body'>";
        html += "<div class='brandMsgTips' style='margin:20px;'>";
        html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　姓名：<input type='text' placeholder='请输入姓名' maxlength='11'  class='new_ph_text' name='username' id='name' style='width: 264px;'/><input type='hidden' name='backurl' value='"+backurl+"'></div>";
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
        html += "<div class='buy_btn   clearfix' style='padding-top:10px;padding-left:58px;'><input type='button' class='popup_abtn save_address' value='保 存'><input type='reset' class='popup_abtn pop_c3' value='重 置'></div>";
        html += "</form>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "<div class='mui-dialog-skin'></div>";
        html += "</div>";
        $("body").append(html);
    }

    /**
     * save new address url
     */
    $(document).delegate(".save_address", "click", function(){
        var username = $("input[name=username]").val();
        var mobile  = $("input[name=mobile]").val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var address = $("input[name=address]").val();
        var is_default  = $("input[name=is_default]").val();
        var backurl = $('input[name=backurl]').val();
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
                'backurl':backurl,
            },
            url:"/user/addaddress",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    if(data.backurl)
                    {
                        window.location.href=data.backurl;
                    }else{
                        window.location.href="/user/address";
                    }
                }
                return true;
            }
        });
    });

    /**
     * delete address
     */
    $(document).delegate(".delete_address", "click", function(e){
        e.preventDefault();
        if(confirm("确定要删除吗？")){
            var delivery_id= $(this).attr("delivery_id");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data:{
                    'delivery_id':delivery_id,
                },
                url:"/user/deladdress",
                success:function(data){
                    sAlert(data.msg);
                    if(data.state =='success'){
                        window.location.href="/user/address";
                    }
                    return true;
                }
            });
        }
    })

    /**
     * edit address
     */

    $(document).delegate(".edit_address", "click", function(e) {
        e.preventDefault();
        var delivery_id= $(this).attr("delivery_id");
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'delivery_id':delivery_id,
            },
            url:"/user/editaddress",
            success:function(data){
                var list = data.list
                var html = "<div class='mui-dialog-mask remove j_address' ></div><div class='mui-dialog remove j_address' style='width:500px; height:335px; left:50%; top:50%;margin-top:-150px;position:fixed;margin-left:-250px;'>";
                html += "<a class='overlay-close' href='javascript:void(0)'></a>";
                html += "<div class='mui-diglog-wrap'>";
                html += "<div class='mui-dialog-header'>编辑收货地址</div>";
                html += "<div class='mui-dialog-body'>";
                html += "<div class='brandMsgTips' style='margin:20px;'>";
                html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　姓名：<input type='text' placeholder='请输入姓名' maxlength='11'  class='new_ph_text' name='username' id='name' value='"+list.name+"' style='width: 264px;'/><input type='hidden' value='"+list.id+"' name='delivery_id' /> </div>";
                html += "<div class='qg_text clearfix' style='padding-bottom:10px;'>　　电话：<input type='text' placeholder='请输入电话' maxlength='11' id='mobile' class='new_ph_text' name='mobile' value='"+list.mobile+"' style='width: 264px;'/></div>";
                html += "<div class='qg_text clearfix' style='padding-bottom:10px;'><i class='fl' style='padding-left:28px;padding-top:3px;'>地址：</i>";
                html += "<div class='popup_semg'><label></label>";
                html += "<select name='province_id' id='province'>";
                html += "<option value='"+list.province_id+"'>"+list.province_name+"</option>";
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
                html += "<option value='"+list.city_id+"'>"+list.city_name+"</option>";
                html += "</select>";
                html += "</div>";
                html += "<div class='popup_semg'><label></label>";
                html += "<select name='area_id' id='area'>";
                html += "<option value='"+list.area_id+"'>"+list.area_name+"</option>";
                html += "</select>";
                html += "</div>";
                html += "<div style='padding-left:70px;padding-top:10px;overflow:hidden;clear:both;'><input type='text' placeholder='街道地址'   class='new_ph_text' name='address' id='address' value='"+list.address+"' style='width: 264px;'/></div>";
                html += "</div>";
                html += "<div style='padding-left:70px;overflow:hidden;clear:both;'><label><input name='is_default' id='is_default' type='checkbox' value='Y' checked /> 设置为默认地址</label></div>";
                html += "<div id='msg' class='yellow tmgfb  ' style='padding-top:0px;'></div>";
                html += "<div class='buy_btn   clearfix' style='padding-top:10px;padding-left:58px;'><input type='button' class='popup_abtn edit_save_address' value='保 存'><input type='reset' class='popup_abtn pop_c3' value='重 置'></div>";
                html += "</form>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                html += "<div class='mui-dialog-skin'></div>";
                html += "</div>";
                $("body").append(html);
            }
        });
    })

    /**
     * edit address save
     */
    $(document).delegate(".edit_save_address", "click", function(){
        var username = $("input[name=username]").val();
        var mobile  = $("input[name=mobile]").val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var area_id = $("#area option:selected").val();
        var address = $("input[name=address]").val();
        var is_default  = $("input[name=is_default]").val();
        var delivery_id = $("input[name=delivery_id]").val();
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
                "delivery_id":delivery_id
            },
            url:"/user/editsaveaddress",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    window.location.href="/user/address";
                }
                return true;
            }
        });
    })

    /**
     * password save
     */
    $(".password_btn").click(function(e){
        e.preventDefault();
        var old_password = $("input[name=old_password]").val();
        var original_password = $("input[name=original_password]").val();
        var confirm_password = $("input[name=confirm_password]").val();
        if(original_password !=confirm_password)
        {
            sAlert("新密码与确认密码不一致");
            return;
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'old_password':old_password,
                'original_password' :original_password
            },
            url:"/user/repassword",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    window.location.href="/user/repassword";
                }
                return true;
            }
        })
    })

    /**
     * currency conficm
     */
    $(".currency_id").on("click",function(){
        if($("input[name='currency_id']:checked").val()=='2'){
            $("#pay_type").show();
        }else{
            $("#pay_type").hide();
        }
    });

    /**
     * save mybuy
     */
    $(".mybuy_bnt").click(function(){

        var business_id = $("#business_id option:selected").val();
        var product_id = $("input[name=product_id]").val();
        var product_name = $("input[name=product_name]").val();
        var brand_name = $("input[name=brand_name]").val();
        var cate_name = $("input[name=cate_name]").val();
        var currency_id = $("input[name='currency_id']:checked").val();
        var settlement = $("#settlement option:selected").text();
        var price = $("input[name=price]").val();
        var num = $("input[name=num]").val();
        var city = $("#city option:selected").val();
        var delivery_area = $("input[name=delivery_area]").val();

        if(business_id == '')
        {
            sAlert("请选择交易公司");
            return false;
        }
        if(product_name == '')
        {
            sAlert("请选择牌号");
            return false;
        }
        if(price == '')
        {
            sAlert("请输入意向价格");
            return false;
        }
        if(num == '')
        {
            sAlert("请输入意向价格");
            return false;
        }
        if(city =='')
        {
            sAlert("请选择交换地");
            return false;
        }

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'business_id':business_id,
                'product_id' :product_id,
                'product_name':product_name,
                'brand_name':brand_name,
                'cate_name':cate_name,
                'currency_id':currency_id,
                'settlement':settlement,
                'price':price,
                'num':num,
                'city_id':city,
                'delivery_area':delivery_area
            },
            url:"/user/mybuy",
            success:function(data){
                sAlert(data.msg);
                if(data.state =='success'){
                    window.location.href="/user/mybuy";
                }
                return true;
            }
        })
    });

    /**
     * delete concern
     */
    $(document).delegate(".delete_concern", "click", function(e){
        e.preventDefault();
        if(confirm("确定要删除吗？")){
            var concern_id= $(this).attr("concern_id");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data:{
                    'id':concern_id,
                },
                url:"/user/delconcern",
                success:function(data){
                    sAlert(data.msg);
                    if(data.state =='success'){
                        window.location.href="/user/concern";
                    }
                    return true;
                }
            });
        }
    })

    /**
     * edit supply
     */
    $(document).delegate(".edit-supply", "click", function(e)
    {
        e.preventDefault();
        var id = $(this).attr("eid");
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
            },
            url:"/user/getmysupply",
            success:function(data){
               if(data.state =='success'){
                   editsupply(data.datalist);
               }else{
                   sAlert(data.msg);
               }
            }
        });
    })

    /**
     * edit supply html
     * @param data
     */
    function editsupply(data)
    {
        var html = '<div class="mui-dialog-mask remove"></div>';
        html += '<div style="width:550px; height: 300px; left:50%; top:50%;margin-top:-150px;position:fixed;margin-left:-250px;" class="mui-dialog remove">';
        html += '<a class="" href="javascript:void(0)"></a>';
        html += '<a class="overlay-close" href="javascript:void(0)"></a>';
        html += '<div class="mui-diglog-wrap">';
        html += '<div class="mui-dialog-header">编辑信息</div>';
        html += '<div class="mui-dialog-body">';
        html += '<div style="margin:20px;" class="brandMsgTips">';
        html += '<div class="qg_text pb10">交货地点：<input type="hidden" name="id"  value="'+data.id+'"><select name="province_id" id="province" class="province_id input-text3" style="width: 120px; margin-right: 10px;">';
        if(data.province_name){
            html += '<option value="'+data.province_code+'" selected>'+data.province_name+'</option>';
        }
        html += '<option value="110000">北京市</option>';
        html += '<option value="120000">天津市</option>';
        html += '<option value="130000">河北省</option>';
        html += '<option value="130000">河北省</option>';
        html += '<option value="140000">山西省</option>';
        html += '<option value="150000">内蒙古自治区</option>';
        html += '<option value="210000">辽宁省</option>';
        html += '<option value="220000">吉林省</option>';
        html += '<option value="230000">黑龙江省</option>';
        html += '<option value="310000">上海市</option>';
        html += '<option value="320000">江苏省</option>';
        html += '<option value="330000">浙江省</option>';
        html += '<option value="340000" >安徽省</option>';
        html += '<option value="350000">福建省</option>';
        html += '<option value="360000">江西省</option>';
        html += '<option value="370000">山东省</option>';
        html += '<option value="410000">河南省</option>';
        html += '<option value="420000">湖北省</option>';
        html += '<option value="430000">湖南省</option>';
        html += '<option value="440000">广东省</option>';
        html += '<option value="450000">广西壮族自治区</option>';
        html += '<option value="460000">海南省</option>';
        html += '<option value="500000">重庆市</option>';
        html += '<option value="510000">四川省</option>';
        html += '<option value="520000">贵州省</option>';
        html += '<option value="530000">云南省</option>';
        html += '<option value="540000">西藏自治区</option>';
        html += '<option value="610000">陕西省</option>';
        html += '<option value="620000">甘肃省</option>';
        html += '<option value="630000">青海省</option>';
        html += '<option value="640000">宁夏回族自治区</option>';
        html += '<option value="650000">新疆维吾尔自治区</option>';
        html += '<option value="710000">台湾省</option>';
        html += '<option value="810000">香港特别行政区</option>';
        html += '<option value="820000">澳门特别行政区</option>';
        html += '</select>';
        html += '<select name="city_id" id="city" class="city_id input-text3 " style="width: 120px; margin-right: 15px;">';
        if(data.city_name){
            html += '<option value="'+data.area_id+'">'+data.city_name+'</option>';
        }else{
            html += '<option value="0" >请选择</option>';
        }

        html += '</select>';
        html += '<input type="text" placeholder="详情交货地" class="input-text3" style="width: 120px; "  name ="delivery_area" maxlength="20"  value="'+data.delivery_area+'"></div>';
        html += '<div class="qg_text pb10">数　　量：<input type="text" name="num" class="new_ph_text quote_num" value="'+data.num+'" style="width: 160px;"/> 吨 <span class="fs10"> 注：（不同地区可设定不同数量）</span></div>';
        html += '<div class="qg_text pb10">价　　格：<input type="text" name="price" class="new_ph_text quote_price" value="'+data.price+'" style="width: 160px;"/> 元/吨<span class="fs10"> 注：（不同地区可设定不同价格）</span></div>';
        html += '<div class="qg_text pb10">交货时间：<input type="text" name="delivery_time"  id="start"  class="new_ph_text quote_dtime laydate-icon" value="'+data.delivery_time+'" style="width: 160px; border:1px solid #DEDEDE;"/>  <span class="fs10"> 注：（不同地区可设定不同交货时间）</span></div>';
        html += '<div class="buy_btn pl44"><input type="button" value="确 定" class="ad_btn edit_quote_btn"></div>';
        html += '</div> </div> </div> <div class="mui-dialog-skin"></div> </div>';
        $("body").append(html);
    }

    /**
     * edit update supply
     */
    $(document).delegate(".edit_quote_btn", "click", function(e)
    {
        var id = $("input[name=id]").val();
        var province_id = $("#province option:selected").val();
        var city_id = $("#city option:selected").val();
        var delivery_area = $("input[name=delivery_area]").val();
        var price = $("input[name=price]").val();
        var num = $("input[name=num]").val();
        var delivery_time = $("input[name=delivery_time]").val();
        if(id == '')
        {
            sAlert("无法获取到ID");
            return false;
        }
        if(province_id == '')
        {
            sAlert("请选择交换地点省");
            return false;
        }
        if(city_id == '')
        {
            sAlert("请选择交换地点");
            return false;
        }
        if(num == '')
        {
            sAlert("请输入数量");
            return false;
        }
        if(price == '')
        {
            sAlert("请输入价格");
            return false;
        }
        if(delivery_time == '')
        {
            sAlert("请选择交换时间");
            return false;
        }

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'province_id':province_id,
                'city_id':city_id,
                'delivery_area':delivery_area,
                'price':price,
                'num':num,
                'delivery_time':delivery_time
            },
            url:"/user/editmysupply",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        })
    })

    /**
     * product up
     */
    $(".shelf_up").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'operate':'up',
            },
            url:"/user/updatesupplys",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * product down
     */
    $(".shelf_down").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'operate':'down',
            },
            url:"/user/updatesupplys",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * product closed
     */
    $(".shelf_closed").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'operate':'closed',
            },
            url:"/user/updatesupplys",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * product open
     */
    $(".shelf_closed_open").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'operate':'closed_open',
            },
            url:"/user/updatesupplys",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * product cancel
     */
    $(".shelf_cancel").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'operate':'cancel',
            },
            url:"/user/updatesupplys",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * product delete
     */
    $(".shelf_delete").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
            },
            url:"/user/deletesupplys",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * product export
     */
    $(".shelf_export").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });

        var url = "/user/exportform/id/"+id;
        //window.location.href=url;
        window.open(url)
        //$.ajax({
        //    type: 'POST',
        //    dataType: 'JSON',
        //    data:{
        //        'id':id,
        //    },
        //    url:"/user/exportform",
        //    success:function(data){
        //        return true;
        //    }
        //});
    });

    /**
     * product update
     */
    $(".shelf_update").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });

        if(!id||id==''){
            sAlert('请选择需要更新的报价信息!');
            return false;
        }

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'operate':'update',
            },
            url:"/user/updatesupply",
            success:function(data){
                if(data.state=='success'){
                    showxls(data.counts,data.datalist);
                }else{
                    sAlert(data.msg);
                }


            }
        });
    });

    function showxls(counts,data)
    {

        var html='<div class="mui-dialog-mask product_code_f remove j_address" style="display:block;"></div>';
        html += '<div class="mui-dialog remove product_code_r j_address" style="display:block;width:1200px; height:500px;left:50%; top:50%;margin-top:-250px;position:fixed;margin-left:-600px;">';
        html += '<a href="javascript:void(0)" class=""></a>';
        html += '<a class="overlay-close" href="#"></a>';
        html += '<div class="mui-diglog-wrap">';
        html += '<div class="mui-dialog-header">批量修改</div>';
        html += '<div class="mui-dialog-body">';
        html += '<div class="brandMsgTips" style="margin:5px 20px;">';
        html += '<div class="gray mb10">注：您选择<span class="red">'+counts+'</span>报价信息！</div>';
        html += '<div class="brand_tab_wp">';
        html += '<table class="brand_tab">';
        html += '<tr>';
        html += '<th>ID</th>';
        html += '<th>品种</th>';
        html += '<th>牌号</th>';
        html += '<th>厂商</th>';
        html += '<th>交易类型</th>';
        html += '<th>价格(元/吨)</th>';
        html += '<th>币种</th>';
        html += '<th>结算方式</th>';
        html += '<th>数量(吨)</th>';
//         html += '<th>交货地点</th>';
        html += '<th>交货时间</th>';
        html += '</tr>';

        for( var x in data){
            html += '<tr>';
            html += '<td><input name="quote_id[]" class="upload_text1 ';
            if(data[x].errorcol == 'quote_id')
            {
                html += 'errorinput';
            }
            html += '" type="text" readonly=true value="';
            if(data[x].quote_id){
                html += data[x].quote_id;
            }
            html += '"/>';
            html += '</td>';
            html += '<td><input name="cate_names[]" class="upload_text ';
            if(data[x].errorcol == 'cate_name')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].cate_name){
                html += data[x].cate_name;
            }
            html += '"/></td>';
            html += '<td><input name="product_names[]" class="upload_text ';
            if(data[x].errorcol == 'product_name')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].product_name){
                html += data[x].product_name;
            }
            html += '"/></td>';
            html += '<td><input name="brand_names[]" class="upload_text ';
            if(data[x].errorcol == 'brand_name')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].brand_name){
                html += data[x].brand_name;
            }
            html += '"/></td>';
            html += '<td><input name="service[]" class="upload_text ';
            if(data[x].errorcol == 'service')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].service_id=='2'){
                html += '期货';
            }else {
                html += '现货';
            }
            html += '"/></td>';
            html += '<td><input name="price[]" class="upload_text ';
            if(data[x].errorcol == 'price')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].price){
                html += data[x].price;
            }
            html +=  '"/></td>';
            html += '<td><input name="currency[]" class="upload_text ';
            if(data[x].errorcol == 'currency')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].currency_id=='2'){
                html += 'USD';
            }else{
                html += 'RMB';
            }
            html += '"/></td>';
            html += '<td><input name="settlement[]" class="upload_text ';
            if(data[x].errorcol == 'settlement')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].settlement){
                html += data[x].settlement;
            }
            html += '"/></td>';
            html += '<td><input name="num[]" class="upload_text ';
            if(data[x].errorcol == 'num')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].num){
                html += data[x].num
            }
            html += '"/></td>';
           //  html += '<td><input name="delivery_areas[]" class="upload_text ';
//             if(data[x].errorcol == 'delivery_area')
//             {
//                 html += 'errorinput';
//             }
//             html += '" type="text" value="';
//             if(data[x].delivery_area){
//                 html += data[x].delivery_area;
//             }
//             html += '"/></td>';
            html += '<td><input name="delivery_time[]"  class="upload_text ';
            if(data[x].errorcol == 'delivery_time')
            {
                html += 'errorinput';
            }
            html += '" type="text" value="';
            if(data[x].delivery_time){
                html += data[x].delivery_time;
            }
            html += '"/></td>';
            html += '</tr>';
        }
        html += '</table>';
        html += '<div class="buy_btn  clearfix"><input type="submit" class="popup_abtn confirm_submit" value="确认提交"></div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<div class="mui-dialog-skin"></div>';
        html += '</div>';
        $("body").append(html);
    }

    $(document).delegate(".confirm_submit", "click", function(e){
        var cdata ={};
        var quote_id = new Array();
        var cate_name = new Array();
        var product_name = new Array();
        var brand_name = new Array();
        var service = new Array();
        var price = new Array();
        var currency = new Array();
        var settlement = new Array();
        var num = new Array();
        var delivery_area = new Array();
        var delivery_time = new Array();

        $("input[name^=quote_id]").each(function(a_Idx, a_Elmt){
            quote_id.push(a_Elmt.value);
            cdata.quote_id = quote_id;
        });

        $("input[name^=cate_names]").each(function(a_Idx, a_Elmt){
            cate_name.push(a_Elmt.value);
            cdata.cate_name = cate_name;
        });
        $("input[name^=product_names]").each(function(a_Idx, a_Elmt){
            product_name.push(a_Elmt.value);
            cdata.product_name = product_name;
        });
        $("input[name^=brand_names]").each(function(a_Idx, a_Elmt){
            brand_name.push(a_Elmt.value);
            cdata.brand_name = brand_name;
        });
        $("input[name^=service]").each(function(a_Idx, a_Elmt){
            service.push(a_Elmt.value);
            cdata.service = service;
        });

        $("input[name^=price]").each(function(a_Idx, a_Elmt){
            price.push(a_Elmt.value);
            cdata.price = price;
        });
        $("input[name^=currency]").each(function(a_Idx, a_Elmt){
            currency.push(a_Elmt.value);
            cdata.currency = currency;
        });
        $("input[name^=settlement]").each(function(a_Idx, a_Elmt){
            settlement.push(a_Elmt.value);
            cdata.settlement = settlement;
        });
        $("input[name^=num]").each(function(a_Idx, a_Elmt){
            num.push(a_Elmt.value);
            cdata.num = num;
        });
  //       $("input[name^=delivery_areas]").each(function(a_Idx, a_Elmt){
//             delivery_area.push(a_Elmt.value);
//             cdata.delivery_area = delivery_area;
//         });
        $("input[name^=delivery_time]").each(function(a_Idx, a_Elmt){
            delivery_time.push(a_Elmt.value);
            cdata.delivery_time = delivery_time;
        });
        $(".remove").remove();
        //
        // return false;
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:cdata,
            url:"/user/updatesupplyerr",
            success:function(data){
                var list = data.datalist;
                if(data.state == 'fail')
                {
                    showxls(data.counts,list);
                    return false;
                }else{
                    sAlert("更新成功！");
                    window.location.reload();
                }
            }
        });
    });

    /**
     * product cancel
     */
    $(".buy_cancel").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
                'operate':'cancel',
            },
            url:"/user/updatebuy",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * cancel purchase order
     */
    $(".purchase_order_cancel_btn").on("click",function(e){
        e.preventDefault();
        var order_id = $(this).attr("order_id");
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'order_id':order_id,
            },
            url:"/user/cancelpurchase",
            success:function(data){
                if(data.state =='success'){
                    sAlert(data.msg);
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * cancel purchase order
     */
    $(".purchase_order_confirm_btn").on("click",function(e){
        e.preventDefault();
        var order_id = $(this).attr("order_id");
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'order_id':order_id,
            },
            url:"/user/confirmreceipt",
            success:function(data){
                if(data.state =='success'){
                    sAlert(data.msg);
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * product cancel
     */
    $(".buy_delete").on("click",function(){
        var id = new Array();
        $(".supply_id").each(function(){
            if($(this).prop('checked')){
                id.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'id':id,
            },
            url:"/user/deletebuy",
            success:function(data){
                if(data.state =='success'){
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * cancel purchase order
     */
    $(".purchase_order_Billing_btn").on("click",function(e){
        e.preventDefault();
        var order_id = $(this).attr("order_id");
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'order_id':order_id,
            },
            url:"/user/getInvoice",
            success:function(data){
                if(data.state =='success'){
                    Invoicehtml(data.datalist);
                }else{
                    sAlert(data.msg);
                }
            }
        });
    });

    /**
     * all check
     */
    $(".check_all").on("click",function(){
        if($(this).prop("checked")==true){
            $(".supply_id").prop("checked",true);
        }else{
            $(".supply_id").prop("checked",false);
        }
    });

    /**
     * other product search
     */
    $(".search_btn").click(function(e){
        e.preventDefault();
        var url = $(".tag_url .attr a").attr("href");
        var current = $(".current").text();
        var cate_name = $("input[name=cate_name]").val();
        var product_name = $("input[name=product_name]").val();
        var brand_name = $("input[name=brand_name]").val();
        var delivery_area = $("input[name=delivery_area]").val();
        if(current)
        {
            url += "/page/"+current;
        }
        if(cate_name)
        {
            url += "/cate_name/"+cate_name;
        }
        if(product_name)
        {
            url += "/product_name/"+product_name;
        }
        if(brand_name)
        {
            url += "/brand_name/"+brand_name;
        }
        if(delivery_area)
        {
            url += "/delivery_area/"+delivery_area;
        }
        window.location.href = url;
    });

    /**
     * order search
     */
    $(".order_but").click(function(e){
        e.preventDefault();
        var url = $(".tag_url .attr a").attr("href");
        var current = $(".current").text();
        var order_key = $("input[name=order_key]").val();
        var product_name = $("input[name=product_name]").val();
        var start_time = $("input[name=start_time]").val();
        var end_time = $("input[name=end_time]").val();
        if(current)
        {
            url += "/page/"+current;
        }
        if(order_key)
        {
            url += "/order_key/"+order_key;
        }
        if(product_name)
        {
            url += "/product_name/"+product_name;
        }
        if(start_time)
        {
            url += "/start_time/"+start_time;
        }
        if(end_time)
        {
            url += "/end_time/"+end_time;
        }
        window.location.href = url;
    });

    /**
     * invoice html
     * @param data
     * @constructor
     */
    function Invoicehtml(data)
    {
        var html = '<div class="mui-dialog-mask remove"></div>';
        html += '<div style="width:550px; height: 400px; left:50%; top:40%;margin-top:-150px;position:fixed;margin-left:-250px;" class="mui-dialog remove">';
        html += '<a class="" href="javascript:void(0)"></a>';
        html += '<a class="overlay-close" href="javascript:void(0)"></a>';
        html += '<div class="mui-diglog-wrap">';
        html += '<div class="mui-dialog-header">发票信息</div>';
        html += '<div class="mui-dialog-body">';
        html += '<div style="margin:0px 20px;" class="brandMsgTips">';
        html += '<p style="line-height: 38px; padding-left: 50px;" class="gray">注：为订单申请发票，请填写发票信息。<input type="hidden" name="order_id" value="'+data.order_id+'"/></p>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">发票抬头：</span><input type="text" name="title" class="new_ph_text quote_num" style="width: 250px;" value="'+data.title+'"/></div>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">纳税人识别码：</span><input type="text" name="ldentifier" class="new_ph_text quote_num"  style="width: 250px;"  value="'+data.ldentifier+'"/></div>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">注册座机号：</span><input type="text" name="register_phone" class="new_ph_text quote_num" style="width: 250px;"  value="'+data.register_phone+'"/></div>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">注册地址：</span><input type="text" name="register_addr" class="new_ph_text quote_num" style="width: 250px;"  value="'+data.register_addr+'"/></div>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">开户银行：</span><input type="text" name="open_bank" class="new_ph_text quote_num" style="width: 250px;"  value="'+data.open_bank+'"/></div>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">银行帐号：</span><input type="text" name="bank_number" class="new_ph_text quote_num" style="width: 250px;"  value="'+data.bank_number+'"/></div>';
        html += '<div class="buy_btn pl44"><input type="button" value="提交申请" class="ad_btn invoice_but"></div>';
        html += '</div> </div> </div> <div class="mui-dialog-skin"></div> </div>';
        $("body").append(html);
    }

    /**
     * invoice save
     */
    $(document).delegate(".invoice_but", "click", function(e){
        var order_id = $('input[name="order_id"]').val();
        var title = $('input[name="title"]').val();
        var ldentifier = $('input[name="ldentifier"]').val();
        var register_phone = $('input[name="register_phone"]').val();
        var register_addr = $('input[name="register_addr"]').val();
        var open_bank = $('input[name="open_bank"]').val();
        var bank_number = $('input[name="bank_number"]').val();
        if(order_id =='')
        {
            sAlert("参数错误");
            return false;
        }
        if(title =='')
        {
            sAlert("请输入发票抬头");
            return false;
        }
        if(ldentifier =='')
        {
            sAlert("请输入发票抬头");
            return false;
        }
        if(register_phone =='')
        {
            sAlert("请输入发票抬头");
            return false;
        }
        if(register_addr =='')
        {
            sAlert("请输入发票抬头");
            return false;
        }
        if(open_bank =='')
        {
            sAlert("请输入发票抬头");
            return false;
        }
        if(bank_number =='')
        {
            sAlert("请输入发票抬头");
            return false;
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'order_id':order_id,
                'title':title,
                'ldentifier':ldentifier,
                'register_phone':register_phone,
                'register_addr':register_addr,
                'open_bank':open_bank,
                'bank_number':bank_number,
            },
            url:"/user/saveinvoice",
            success:function(data){
                if(data.state =='success'){
                    sAlert(data.msg);
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });

    })

    /**
     * edit order
     */
    $(".edit_supply_order").click(function(e){
        e.preventDefault();
        var order_id = $(this).attr("order_id");
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'order_id':order_id
            },
            url:"/user/editsupplyorder",
            success:function(data){
                if(data.state =='success'){
                    orderedithtml(data.datalist);
                }else{
                    sAlert(data.msg);
                }
            }
        });
    })

    function orderedithtml(data)
    {
        var html = '<div class="mui-dialog-mask remove"></div>';
        html += '<div style="width:550px; height: 230px; left:50%; top:50%;margin-top:-150px;position:fixed;margin-left:-250px;" class="mui-dialog remove">';
        html += '<a class="" href="javascript:void(0)"></a>';
        html += '<a class="overlay-close" href="javascript:void(0)"></a>';
        html += '<div class="mui-diglog-wrap">';
        html += '<div class="mui-dialog-header">订单编辑</div>';
        html += '<div class="mui-dialog-body">';
        html += '<div style="margin:0px 20px;" class="brandMsgTips">';
        html += '<p style="line-height: 38px; padding-left: 50px;" class="gray">注：双方确认清楚可以调整订单价格及数量信息。<input type="hidden" name="order_id" value="'+data[0].order_id+'"/></p>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">数量：</span><input type="text" name="num" class="new_ph_text quote_num" style="width: 250px;" value="'+data[0].num+'"/></div>';
        html += '<div class=" pb10"><span class="fl gray" style="display: block; width: 120px; text-align: right; line-height: 32px;">价格：</span><input type="text" name="price" class="new_ph_text quote_num"  style="width: 250px;"  value="'+data[0].price+'"/></div>';
        html += '<div class="buy_btn pl44"><input type="button" value="提交修改" class="ad_btn order_edit"></div>';
        html += '</div> </div> </div> <div class="mui-dialog-skin"></div> </div>';
        $("body").append(html);
    }

    $(document).delegate(".order_edit", "click", function(e){
        var order_id = $('input[name="order_id"]').val();
        var num = $('input[name="num"]').val();
        var price = $('input[name="price"]').val();

        if(order_id =='')
        {
            sAlert("参数错误");
            return false;
        }
        if(num =='')
        {
            sAlert("请输入数量");
            return false;
        }
        if(price =='')
        {
            sAlert("请输入价格");
            return false;
        }

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data:{
                'order_id':order_id,
                'num':num,
                'price':price
            },
            url:"/user/saveeditorder",
            success:function(data){
                if(data.state =='success'){
                    sAlert(data.msg);
                    window.location.reload();
                }else{
                    sAlert(data.msg);
                }
            }
        });

    })


    /**
     * audit order
     */
    $(".audit_supply_order").click(function(e){
        e.preventDefault();
        if(confirm("您确定审核通过吗？")){
            var order_id= $(this).attr("order_id");
            var status_type= $(this).attr("status_type");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data:{
                    'order_id':order_id,
                    'status_type':status_type,
                },
                url:"/user/supplystatusupdate",
                success:function(data){
                    if(data.state =='success'){
                        sAlert(data.msg);
                        window.location.reload();
                    }else{
                        sAlert(data.msg);
                    }
                }
            });
        }
    })

    /**
     * cancel order
     */
    $(".cancel_supply_order").click(function(e){
        e.preventDefault();
        if(confirm("您确定取消订单吗？")){
            var order_id= $(this).attr("order_id");
            var status_type= $(this).attr("status_type");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data:{
                    'order_id':order_id,
                    'status_type':status_type,
                },
                url:"/user/supplystatusupdate",
                success:function(data){
                    if(data.state =='success'){
                        sAlert(data.msg);
                        window.location.reload();
                    }else{
                        sAlert(data.msg);
                    }
                }
            });
        }
    })

    /**
     * pay order
     */
    $(".pay_supply_order").click(function(e){
        e.preventDefault();
        if(confirm("您确定订单已支付吗？")){
            var order_id= $(this).attr("order_id");
            var status_type= $(this).attr("status_type");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data:{
                    'order_id':order_id,
                    'status_type':status_type,
                },
                url:"/user/supplystatusupdate",
                success:function(data){
                    if(data.state =='success'){
                        sAlert(data.msg);
                        window.location.reload();
                    }else{
                        sAlert(data.msg);
                    }
                }
            });
        }
    })

    /**
     * deliver order
     */
    $(".deliver_supply_order").click(function(e){
        e.preventDefault();
        if(confirm("您确定订单可发货吗？")){
            var order_id= $(this).attr("order_id");
            var status_type= $(this).attr("status_type");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data:{
                    'order_id':order_id,
                    'status_type':status_type,
                },
                url:"/user/supplystatusupdate",
                success:function(data){
                    if(data.state =='success'){
                        sAlert(data.msg);
                        window.location.reload();
                    }else{
                        sAlert(data.msg);
                    }
                }
            });
        }
    })

    /**
     * billing order
     */
    $(".billing_supply_order").click(function(e){
        e.preventDefault();
        if(confirm("您确定订单已开票吗？")){
            var order_id= $(this).attr("order_id");
            var status_type= $(this).attr("status_type");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data:{
                    'order_id':order_id,
                    'status_type':status_type,
                },
                url:"/user/supplystatusupdate",
                success:function(data){
                    if(data.state =='success'){
                        sAlert(data.msg);
                        window.location.reload();
                    }else{
                        sAlert(data.msg);
                    }
                }
            });
        }
    })

    /**
     *  Tracking operation
     */
    $('.tooltip').hover(function() {
        $(this).find('.prompt-01').show();
    },function(){
        $('.prompt-01').hide();
    });


    $(".uc_btn").click(function(){
        var id = $('input[name="id"]').val();
        var business_phone = $('input[name="business_phone"]').val();
        var main_variety = $('input[name="main_variety"]').val();
        var qq = $('input[name="qq"]').val();
        var contacts = $('input[name="contacts"]').val();
        var mobile = $('input[name="mobile"]').val();
        var phone = $('input[name="phone"]').val();
        var email = $('input[name="email"]').val();
        var business_province_id = $("#province").val();
        var business_city_id = $("#city").val();
        var business_area_id = $("#area").val();
        var business_addr = $('input[name="business_addr"]').val();
        if(!contacts){
            sAlert('联系人不能为空!');
            return false;
        }
        if(!mobile){
            sAlert('联系手机不能为空!');
            return false;
        }
        if(!qq){
            sAlert('QQ不能为空!');
            return false;
        }
        $.ajax({
            url:"/user/savesupplyinfo",
            data:{
                'business_phone':business_phone,
                'main_variety':main_variety,
                'qq':qq,
                'contacts' : contacts,
                'mobile' : mobile,
                'phone' : phone,
                'email' : email,
                'business_province_id' : business_province_id,
                'business_city_id' : business_city_id,
                'business_area_id' : business_area_id,
                'business_addr' : business_addr,
                'id':id
            },
            type: 'post',
            dataType: 'json',
            success:function(data){
                sAlert(data.msg);
                return true;
            }
        });
    });

})

