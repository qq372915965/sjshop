/**
 * Created by Administrator on 2015/12/11.
 */
var Register = function() {

    "use strict";

    var initregister = function() {
        var email = $("input[name=email]");
        var mobile = $("input[name=mobile]");
        var login_code = $('input[name=login_code]');
        var password = $("input[name=password]");
        var repassword = $("input[name=repassword]");
        //msg
        var email_msg = $("#email_msg");
        var mobile_msg = $("#mobile_msg");
        var login_code_msg = $("#login_code_msg");
        var password_msg = $("#password_msg");
        var repassword_msg = $("#repassword_msg");


        email.blur(function(e){
             if(!email.val().match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)){
                email_msg.addClass('cue_red');
                email_msg.removeClass('cue_gray');
                email_msg.show();
                email_msg.html("请输入正确邮箱");
            }else if(isExistMobile(email.val()) == true){
                email_msg.addClass('cue_red');
                email_msg.removeClass('cue_gray');
                email_msg.show();
                email_msg.html("该邮箱已被注册，请更换！");
            }else{
                email_msg.removeClass('cue_red');
                email_msg.removeClass('cue_gray');
                email_msg.removeAttr("disabled");
                email_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });



        mobile.blur(function(e){
            if(mobile.val() ==''){
                mobile_msg.addClass('cue_red');
                mobile_msg.removeClass('cue_gray');
                mobile_msg.show();
                mobile_msg.html("请输入手机号码");
            }else if(!mobile.val().match(/^(?:13\d|14\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/)){
                mobile_msg.addClass('cue_red');
                mobile_msg.removeClass('cue_gray');
                mobile_msg.show();
                mobile_msg.html("请输入正确手机号码");
            }else if(isExistMobile(mobile.val()) == true){
                mobile_msg.addClass('cue_red');
                mobile_msg.removeClass('cue_gray');
                mobile_msg.show();
                mobile_msg.html("该手机号码已被注册，请更换！");
            }else{
                mobile_msg.removeClass('cue_red');
                mobile_msg.removeClass('cue_gray');
                login_code.removeAttr("disabled");
                mobile_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });

        mobile.focus(function(e){
            mobile_msg.addClass('cue_gray');
            mobile_msg.removeClass('cue_red');
            mobile_msg.show();
            mobile_msg.html("通过验证后,可以通过该手机登录和找回密码");
        });

        login_code.blur(function(e){
            if(login_code.val() ==''){
                login_code_msg.addClass('cue_red');
                login_code_msg.removeClass('cue_gray');
                login_code_msg.show();
                login_code_msg.html("请输入验证码");
            }else if(login_code.val().length != 4){
                login_code_msg.addClass('cue_red');
                login_code_msg.removeClass('cue_gray');
                login_code_msg.show();
                login_code_msg.html("请正确输入4位字符验证码");
            }else if(codeValidate(login_code.val()) === false){
                login_code_msg.addClass('cue_red');
                login_code_msg.removeClass('cue_gray');
                login_code_msg.show();
                login_code_msg.html("请正确输入验证码");
            }else{
                var html ="<td align='right' valign='top'><span class='fr pt10p' style='padding-top:6px;'>手机验证码：</span></td>";
                html += "<td><input placeholder='验证码' disabled class='reg-text1 smscode' type='text' maxlength='6' id='code' name='code' style='width: 170px;'><input type='button' class='reg-btn1 code_btn send'  value='获取验证码' style='width:150px; float: left;'><label id='sendcode_msg' class='cue'></label></td>";
                $(".codeValidate").html(html);

            }
        });
        $(document).delegate("#code",'blur',function(){
            //手机验证码 isExistcode
            var code = $(".smscode");
            var sendcode_msg = $("#sendcode_msg");
            var mobile = $("input[name=mobile]").val();
                if(code.val() ==''){
                    sendcode_msg.addClass('cue_red');
                    sendcode_msg.removeClass('cue_gray');
                    sendcode_msg.show();
                    sendcode_msg.html("请输入手机验证码");
                }else if(isExistcode(mobile,code.val()) == false){
                    sendcode_msg.addClass('cue_red');
                    sendcode_msg.removeClass('cue_gray');
                    sendcode_msg.show();
                    sendcode_msg.html("验证码错误，请重新填写！");
                }else{
                    sendcode_msg.removeClass('cue_red');
                    sendcode_msg.removeClass('cue_gray');
                    sendcode_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
                }
        });
        password.blur(function(e){
            if(password.val() =='') {
                password_msg.addClass('cue_red');
                password_msg.removeClass('cue_gray');
                password_msg.show();
                password_msg.html("请输入密码");
            }else if(password.val().length < 6){
                password_msg.addClass('cue_red');
                password_msg.removeClass('cue_gray');
                password_msg.show();
                password_msg.html("请输入6-20字符，建议由字母、数字等组合");
            }else{
                password_msg.removeClass('cue_red');
                password_msg.removeClass('cue_gray');
                password_msg.show();
                password_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");

            }
        });
        password.focus(function(e){
            password_msg.addClass('cue_gray');
            password_msg.removeClass('cue_red');
            password_msg.show();
            password_msg.html("6-20字符，建议由字母、数字、符号组合");
        });
        repassword.blur(function(e){
            if(repassword.val() =='') {
                repassword_msg.addClass('cue_red');
                repassword_msg.removeClass('cue_gray');
                repassword_msg.show();
                repassword_msg.html("请输入确认密码");
            }else if(repassword.val().length < 6){
                repassword_msg.addClass('cue_red');
                repassword_msg.removeClass('cue_gray');
                repassword_msg.show();
                repassword_msg.html("请输入6-20字符，建议由字母、数字等组合");
            }else if(repassword.val() != password.val()){
                repassword_msg.addClass('cue_red');
                repassword_msg.removeClass('cue_gray');
                repassword_msg.show();
                repassword_msg.html("两次输入密码不一致");
            }else{
                repassword_msg.removeClass('cue_red');
                repassword_msg.removeClass('cue_gray');
                repassword_msg.show();
                repassword_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });
        repassword.focus(function(e){
            repassword_msg.addClass('cue_gray');
            repassword_msg.removeClass('cue_red');
            repassword_msg.show();
            repassword_msg.html("请再次输入密码");
        });
    }

    var initSubmit = function(){
        var mobile = $("input[name=mobile]");
        var login_code = $('input[name=login_code]');
        var password = $("input[name=password]");
        var repassword = $("input[name=repassword]");
        var back_url =$("input[name=back_url]");

        //msg
        var mobile_msg = $("#mobile_msg");
        var login_code_msg = $("#login_code_msg");
        var password_msg = $("#password_msg");
        var repassword_msg = $("#repassword_msg");


        $(".reg-btn").click(function(e){
            if(mobileValidate(mobile,mobile_msg) === false || getcodeValidate(login_code,login_code_msg) === false || passwordValidate(password,password_msg) === false || passwordValidate(password,password_msg) === false || repasswordValidate(repassword,repassword_msg,password) === false || smscodeValidate() === false){
                return false;
            }else{
                $.ajax({
                    url:'/register/dosave',
                    data:{mobile:mobile.val(),password:password.val(),repassword:repassword.val(),back_url:back_url.val()},
                    type:'POST',
                    success:function(data){
                        var data = eval("("+data+")");
                        var code = data.code;
                        var msg = data.msg;
                        if(code == 38){
                            window.location.href="/register/company.html";
                            return true;
                        }else{
                                  sAlert(msg);
                           // window.wxc.xcConfirm(msg, window.wxc.xcConfirm.typeEnum.info);
                            return;
                        }
                    },
                    dataType:'text'
                });
            }
        });
    }

    var initGetmobileCaptcha = function(){
        $(document).delegate(".send", "click", function() {
            var oBthis = $(this);
            var mobile = $("input[name=mobile]").val();
            var InterValObj; //timer变量，控制时间
            var count = 60; //间隔函数，1秒执行
            var curCount;//当前剩余秒数
            var code = ""; //验证码
            var codeLength = 6;//验证码长度
            $('.smscode').removeAttr("disabled");
            sendcode(mobile,window.vcode);
            curCount = count;
            //设置button效果，开始计时
            oBthis.attr("disabled", "true");
            oBthis.val("(" + curCount + ")重新获取手机验证码");
            InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
            //timer处理函数
            function SetRemainTime() {
                if (curCount == 0) {
                    window.clearInterval(InterValObj);//停止计时器
                    $(".send").removeAttr("disabled");//启用按钮
                    $(".send").val("重新获取手机验证码");
                    code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效
                }
                else {
                    curCount--;
                    oBthis.val("(" + curCount + ")重新获取手机验证码");
                }
            }

            function sendcode(mobile,optr){
                $.ajax({
                    url:'/register/sendcode',
                    data:{mobile:mobile,codetime:optr},
                    type:'POST',
                    success:function(data){
                        //var data = eval("("+data+")");
                        if(data.code !== "1008"){
                            sAlert(data.msg);
                        }
                    },
                    dataType:'json'
                });
            }
        });
    }


    //重新获取验证码
    var initCaptcha  = function (){
        $('.change_code').click(function(){
            var img = document.getElementById('login_code_img');
            img.src = '/register/code/rand/' + Math.random();
        });
    };

    var initCompany  = function () {
        var business_name = $("input[name=business_name]");
        var business_remarks = $("input[name=business_remarks]");
        var main_variety = $("input[name=main_variety]");
        var contacts = $("input[name=contacts]");
        var mobile = $("input[name=mobile]");
        var qq = $("input[name=qq]");
        var contentname = $("input[name=contentname]");

        var name_msg = $("#name_msg");
        var remarks_msg = $("#remarks_msg");
        var variety_msg = $("#variety_msg");
        var contacts_msg = $("#contacts_msg");
        var mobile_msg = $("#mobile_msg");
        var qq_msg = $("#qq_msg");
        var contentname_msg = $("#contentname_msg");

        business_name.focus(function(){
            name_msg.addClass('cue_gray');
            name_msg.removeClass('cue_red');
            name_msg.show();
            name_msg.html("请填写完整的公司名称");
        });
        business_name.blur(function(){
            if(business_name.val() ==''){
                name_msg.addClass('cue_red');
                name_msg.removeClass('cue_gray');
                name_msg.show();
                name_msg.html("请填写完整的公司名称");
            }else if(business_name.val().length < 4){
                name_msg.addClass('cue_red');
                name_msg.removeClass('cue_gray');
                name_msg.show();
                name_msg.html("请填写完整的公司名称");
            }else if(bnameValidate(business_name.val()) == false){
                name_msg.addClass('cue_red');
                name_msg.removeClass('cue_gray');
                name_msg.show();
                name_msg.html("该公司名称已被注册，请更换！");
            }else{
                name_msg.removeClass('cue_red');
                name_msg.removeClass('cue_gray');
                name_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });

        business_remarks.focus(function(){
            remarks_msg.addClass('cue_gray');
            remarks_msg.removeClass('cue_red');
            remarks_msg.show();
            remarks_msg.html("请输入4-8位字符的公司简称");
        });
        business_remarks.blur(function(){
            if(business_remarks.val() ==''){
                remarks_msg.addClass('cue_red');
                remarks_msg.removeClass('cue_gray');
                remarks_msg.show();
                remarks_msg.html("请输入4-8位字符的公司简称");
            }else if(business_remarks.val().length < 3){
                remarks_msg.addClass('cue_red');
                remarks_msg.removeClass('cue_gray');
                remarks_msg.show();
                remarks_msg.html("请输入4-8位字符的公司简称");
            }else{
                remarks_msg.removeClass('cue_red');
                remarks_msg.removeClass('cue_gray');
                remarks_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });

        main_variety.focus(function(){
            variety_msg.addClass('cue_gray');
            variety_msg.removeClass('cue_red');
            variety_msg.show();
            variety_msg.html("请输入品种多个用“,”隔开");
        });
        main_variety.blur(function(){
            if(main_variety.val() ==''){
                variety_msg.addClass('cue_red');
                variety_msg.removeClass('cue_gray');
                variety_msg.show();
                variety_msg.html("请正确输入品种");
            }else if(main_variety.val().length < 2){
                variety_msg.addClass('cue_red');
                variety_msg.removeClass('cue_gray');
                variety_msg.show();
                variety_msg.html("请正确输入品种多个用“,”隔开");
            }else{
                variety_msg.removeClass('cue_red');
                variety_msg.removeClass('cue_gray');
                variety_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });

        contacts.focus(function(){
            contacts_msg.addClass('cue_gray');
            contacts_msg.removeClass('cue_red');
            contacts_msg.show();
            contacts_msg.html("请输入联系人名称");
        });
        contacts.blur(function(){
            if(contacts.val() ==''){
                contacts_msg.addClass('cue_red');
                contacts_msg.removeClass('cue_gray');
                contacts_msg.show();
                contacts_msg.html("请输入联系人名称");
            }else if(contacts.val().length < 2){
                contacts_msg.addClass('cue_red');
                contacts_msg.removeClass('cue_gray');
                contacts_msg.show();
                contacts_msg.html("请正确输入联系人名称");
            }else{
                contacts_msg.removeClass('cue_red');
                contacts_msg.removeClass('cue_gray');
                contacts_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });
        contentname.focus(function(){
            contentname_msg.addClass('cue_gray');
            contentname_msg.removeClass('cue_red');
            contentname_msg.show();
            contentname_msg.html("请输入开票名称");
        });
        contentname.blur(function(){
            if(contentname.val() ==''){
                contentname_msg.addClass('cue_red');
                contentname_msg.removeClass('cue_gray');
                contentname_msg.show();
                contentname_msg.html("请输入开票名称");
            }else if(contentname.val().length < 2){
                contentname_msg.addClass('cue_red');
                contentname_msg.removeClass('cue_gray');
                contentname_msg.show();
                contentname_msg.html("请正确输入开票名称");
            }else{
                contentname_msg.removeClass('cue_red');
                contentname_msg.removeClass('cue_gray');
                contentname_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });

        mobile.focus(function(){
            mobile_msg.addClass('cue_gray');
            mobile_msg.removeClass('cue_red');
            mobile_msg.show();
            mobile_msg.html("请输入手机号码");
        });
        mobile.blur(function(){
            if(mobile.val() ==''){
                mobile_msg.addClass('cue_red');
                mobile_msg.removeClass('cue_gray');
                mobile_msg.show();
                mobile_msg.html("请输入手机号码");
            }else if(!mobile.val().match(/^(?:13\d|14\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/)){
                mobile_msg.addClass('cue_red');
                mobile_msg.removeClass('cue_gray');
                mobile_msg.show();
                mobile_msg.html("请输入正确手机号码");
            }else{
                mobile_msg.removeClass('cue_red');
                mobile_msg.removeClass('cue_gray');
                mobile_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });

        qq.focus(function(){
            qq_msg.addClass('cue_gray');
            qq_msg.removeClass('cue_red');
            qq_msg.show();
            qq_msg.html("请输入QQ号码");
        });
        qq.blur(function(){

            if(qq.val() ==''){
                qq_msg.addClass('cue_red');
                qq_msg.removeClass('cue_gray');
                qq_msg.show();
                qq_msg.html("请输入QQ号码");
            }else if(qq.val().length<2){
                qq_msg.addClass('cue_red');
                qq_msg.removeClass('cue_gray');
                qq_msg.show();
                qq_msg.html("请正确输入QQ号码");
            }else if(isNaN(qq.val()) === true) {
                qq_msg.addClass('cue_red');
                qq_msg.removeClass('cue_gray');
                qq_msg.show();
                qq_msg.html("请正确输入QQ号码");
            }else{
                qq_msg.removeClass('cue_red');
                qq_msg.removeClass('cue_gray');
                qq_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            }
        });

    }

    var initProvince = function(){
        var province = $("#province");
        province.change(function(){
            var id= $(this).val();
            if(id>0){
                $.ajax({
                    type: 'POST',
                    dataType: 'Json',
                    data:{id:id},
                    url:"/region/getprovice.html",
                    success:function(data){
                        var str = '<option value="0">请选择....</option>';
                        $("#area").html(str);
                        if(data){

                            for(var a in data){
                                str += '<option  value="'+data[a].region_id+'">'+data[a].region_name+'</option>';
                            }
                        }
                        $("#city").html(str);
                    }
                });
            }else{
                var str = '<option value="0">请选择....</option>';
                $("#city").html(str);
                $("#area").html(str);
            }
        });
    }

    var initCity = function(){
        var city = $("#city");
        city.change(function(){
            var id= $(this).val();
            if(id>0){
                $.ajax({
                    type: 'POST',
                    dataType: 'Json',
                    data:{id:id},
                    url:"/region/getarea.html",
                    success:function(data){
                        var str = '<option value="0">请选择....</option>';
                        if(data){

                            for(var a in data){
                                str += '<option  value="'+data[a].region_id+'">'+data[a].region_name+'</option>';
                            }
                        }
                        $("#area").html(str);
                    }
                });
            }else{
                var str = '<option value="0">请选择....</option>';
                $("#area").html(str);
            }
        });
    }

    var initCompanySubmit = function(){
        var id = $("input[name=id]");
        var business_name = $("input[name=business_name]");
        var business_remarks = $("input[name=business_remarks]");
        var main_variety = $("input[name=main_variety]");
        var contacts = $("input[name=contacts]");
        var mobile = $("input[name=mobile]");
        var qq = $("input[name=qq]");
        var contentname = $("input[name=contentname]");
        var province =$("#province");
        var city=$("#city");
        var area=$("#area");

        var name_msg = $("#name_msg");
        var remarks_msg = $("#remarks_msg");
        var variety_msg = $("#variety_msg");
        var contacts_msg = $("#contacts_msg");
        var mobile_msg = $("#mobile_msg");
        var qq_msg = $("#qq_msg");
        var contentname_msg = $("#contentname_msg");

        $("#save_shop").click(function(e){
            if(business_nameValidate(business_name,name_msg) === false || business_remarksValidate(business_remarks,remarks_msg) === false || main_varietyValidate(main_variety,variety_msg) === false || contactsValidate(contacts,contacts_msg) === false || contactnameValidate(contentname,contentname_msg) ===false || mobileValidate(mobile,mobile_msg) === false || qqValidate(qq,qq_msg)===false){
                return false;
            }else{
                $.ajax({
                    url:'/register/docompany',
                    data:{id:id.val(),business_name:business_name.val(),business_remarks:business_remarks.val(),main_variety:main_variety.val(),contacts:contacts.val(),mobile:mobile.val(),qq:qq.val(),province:province.val(),city:city.val(),area:area.val(),name:contentname.val()},
                    type:'POST',
                    success:function(data){
                        var data = eval("("+data+")");
                        var code = data.code;
                        var msg = data.msg;
                        if(code == 88){
                            window.location.href="/register/success.html";
                            return true;
                        }else{
                           // window.wxc.xcConfirm(msg, window.wxc.xcConfirm.typeEnum.info);
                            return;
                        }
                    },
                    dataType:'text'
                });
            }
        });
    }

    function business_nameValidate(business_name,name_msg){
        if(business_name.val() ==''){
            name_msg.addClass('cue_red');
            name_msg.removeClass('cue_gray');
            name_msg.show();
            name_msg.html("请填写完整的公司名称");
            return false;
        }else if(business_name.val().length < 4){
            name_msg.addClass('cue_red');
            name_msg.removeClass('cue_gray');
            name_msg.show();
            name_msg.html("请填写完整的公司名称");
            return false;
        }else if(bnameValidate(business_name.val()) == false){
            name_msg.addClass('cue_red');
            name_msg.removeClass('cue_gray');
            name_msg.show();
            name_msg.html("该公司名称已被注册，请更换！");
            return false;
        }else{
            name_msg.removeClass('cue_red');
            name_msg.removeClass('cue_gray');
            name_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function business_remarksValidate(business_remarks,remarks_msg){
        if(business_remarks.val() ==''){
            remarks_msg.addClass('cue_red');
            remarks_msg.removeClass('cue_gray');
            remarks_msg.show();
            remarks_msg.html("请输入4-8位字符的公司简称");
            return false;
        }else if(business_remarks.val().length < 3){
            remarks_msg.addClass('cue_red');
            remarks_msg.removeClass('cue_gray');
            remarks_msg.show();
            remarks_msg.html("请输入4-8位字符的公司简称");
            return false;
        }else{
            remarks_msg.removeClass('cue_red');
            remarks_msg.removeClass('cue_gray');
            remarks_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function main_varietyValidate(main_variety,variety_msg){
        if(main_variety.val() ==''){
            variety_msg.addClass('cue_red');
            variety_msg.removeClass('cue_gray');
            variety_msg.show();
            variety_msg.html("请正确输入品种");
            return false;
        }else if(main_variety.val().length < 2){
            variety_msg.addClass('cue_red');
            variety_msg.removeClass('cue_gray');
            variety_msg.show();
            variety_msg.html("请正确输入品种多个用“,”隔开");
            return false;
        }else{
            variety_msg.removeClass('cue_red');
            variety_msg.removeClass('cue_gray');
            variety_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function contactsValidate(contacts,contacts_msg){
        if(contacts.val() ==''){
            contacts_msg.addClass('cue_red');
            contacts_msg.removeClass('cue_gray');
            contacts_msg.show();
            contacts_msg.html("请输入联系人名称");
        }else if(contacts.val().length < 2){
            contacts_msg.addClass('cue_red');
            contacts_msg.removeClass('cue_gray');
            contacts_msg.show();
            contacts_msg.html("请正确输入联系人名称");
        }else{
            contacts_msg.removeClass('cue_red');
            contacts_msg.removeClass('cue_gray');
            contacts_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
        }
    }

    function contactnameValidate(contentname,contentname_msg){
        if(contentname.val() ==''){
            contentname_msg.addClass('cue_red');
            contentname_msg.removeClass('cue_gray');
            contentname_msg.show();
            contentname_msg.html("请输入开票名称");
        }else if(contentname.val().length < 2){
            contentname_msg.addClass('cue_red');
            contentname_msg.removeClass('cue_gray');
            contentname_msg.show();
            contentname_msg.html("请正确输入开票名称");
        }else{
            contentname_msg.removeClass('cue_red');
            contentname_msg.removeClass('cue_gray');
            contentname_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
        }
    }

    function mobileValidate(mobile,mobile_msg){
        if(mobile.val() ==''){
            mobile_msg.addClass('cue_red');
            mobile_msg.removeClass('cue_gray');
            mobile_msg.show();
            mobile_msg.html("请输入手机号码");
            return false;
        }else if(!mobile.val().match(/^(?:13\d|14\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/)){
            mobile_msg.addClass('cue_red');
            mobile_msg.removeClass('cue_gray');
            mobile_msg.show();
            mobile_msg.html("请输入正确手机号码");
            return false;
        }else{
            mobile_msg.removeClass('cue_red');
            mobile_msg.removeClass('cue_gray');
            mobile_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function qqValidate(qq,qq_msg){
        if(qq.val() ==''){
            qq_msg.addClass('cue_red');
            qq_msg.removeClass('cue_gray');
            qq_msg.show();
            qq_msg.html("请输入QQ号码");
            return false;
        }else if(qq.val().length<2){
            qq_msg.addClass('cue_red');
            qq_msg.removeClass('cue_gray');
            qq_msg.show();
            qq_msg.html("请正确输入QQ号码");
            return false;
        }else if(isNaN(qq.val()) === true) {
            qq_msg.addClass('cue_red');
            qq_msg.removeClass('cue_gray');
            qq_msg.show();
            qq_msg.html("请正确输入QQ号码");
            return false;
        }else{
            qq_msg.removeClass('cue_red');
            qq_msg.removeClass('cue_gray');
            qq_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }


    function bnameValidate(business_name){
        var result='';
        $.ajax({
            url:'/register/bnvalidate.html',
            data:{bn:business_name},
            async:false,
            type:'POST',
            success:function(data){
                var data = eval("("+data+")");
                if(data.code != 8){
                    result =  true;
                }else{
                    result =  false;
                }
            },
            dataType:'text'
        });
        return result;
    }

    function mobileValidate(mobile,mobile_msg){
        if(mobile.val() ==''){
            mobile_msg.addClass('cue_red');
            mobile_msg.removeClass('cue_gray');
            mobile_msg.show();
            mobile_msg.html("请输入手机号码");
            return false;
        }else if(!mobile.val().match(/^(?:13\d|14\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/)){
            mobile_msg.addClass('cue_red');
            mobile_msg.removeClass('cue_gray');
            mobile_msg.show();
            mobile_msg.html("请输入正确手机号码");
            return false;
        }else if(isExistMobile(mobile.val()) == true){
            mobile_msg.addClass('cue_red');
            mobile_msg.removeClass('cue_gray');
            mobile_msg.show();
            mobile_msg.html("该手机号码已被注册，请更换！");
            return false;
        }else{
            mobile_msg.removeClass('cue_red');
            mobile_msg.removeClass('cue_gray');
            mobile_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function smscodeValidate(){
        var code = $("#code");
        var code_msg = $("#sendcode_msg");
        var mobile = $("input[name=mobile]").val();
        if(code.val() ==''){
            code_msg.addClass('cue_red');
            code_msg.removeClass('cue_gray');
            code_msg.show();
            code_msg.html("请输入手机验证码");
            return false;
        }else if(isExistcode(mobile,code.val()) == false){
            code_msg.addClass('cue_red');
            code_msg.removeClass('cue_gray');
            code_msg.show();
            code_msg.html("验证码错误，请重新输入");
            return false;
        }else{
            code_msg.removeClass('cue_red');
            code_msg.removeClass('cue_gray');
            code_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function isExistMobile(mobile){
        var result='';
        $.ajax({
            url:'/register/mobilevalidate.html',
            data:{mobile:mobile},
            async:false,
            type:'POST',
            success:function(data){
                var data = eval("("+data+")");
                if(data != ''){
                    result =  true;
                }else{
                    result= false;
                }
            },
            dataType:'text'
        });
        return result;
    }

    //验证手机验证码
    function isExistcode(mobile,code){
        var result='';
        $.ajax({
            url:'/register/confirmmobilecode.html',
            data:{mobile:mobile,code:code},
            async:false,
            type:'POST',
            success:function(data){
                var data = eval("("+data+")");
                if(data.code != 88){
                    result =  false;
                }else{
                    result= true;
                }
            },
            dataType:'text'
        });
        return result;
    }


    function getcodeValidate(login_code,login_code_msg){
        if(login_code.val() ==''){
            login_code_msg.addClass('cue_red');
            login_code_msg.removeClass('cue_gray');
            login_code_msg.show();
            login_code_msg.html("请输入验证码");
        }else if(login_code.val().length != 4){
            login_code_msg.addClass('cue_red');
            login_code_msg.removeClass('cue_gray');
            login_code_msg.show();
            login_code_msg.html("请正确输入4位字符验证码");
        }else if(codeValidate(login_code.val()) === false){
            login_code_msg.addClass('cue_red');
            login_code_msg.removeClass('cue_gray');
            login_code_msg.show();
            login_code_msg.html("请正确输入验证码");
        }else{
            login_code_msg.removeClass('cue_red');
            login_code_msg.removeClass('cue_gray');
            login_code_msg.show();
            login_code_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
        }
    }

    function passwordValidate(password,password_msg){
        if(password.val() =='') {
            password_msg.addClass('cue_red');
            password_msg.removeClass('cue_gray');
            password_msg.show();
            password_msg.html("请输入密码");
            return false;
        }else if(password.val().length < 6){
            password_msg.addClass('cue_red');
            password_msg.removeClass('cue_gray');
            password_msg.show();
            password_msg.html("请输入6-20字符，建议由字母、数字等组合");
            return false;
        }else{
            password_msg.removeClass('cue_red');
            password_msg.removeClass('cue_gray');
            password_msg.show();
            password_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function repasswordValidate(repassword,repassword_msg,password){
        if(repassword.val() =='') {
            repassword_msg.addClass('cue_red');
            repassword_msg.removeClass('cue_gray');
            repassword_msg.show();
            repassword_msg.html("请输入确认密码");
            return false;
        }else if(repassword.val().length < 6){
            repassword_msg.addClass('cue_red');
            repassword_msg.removeClass('cue_gray');
            repassword_msg.show();
            repassword_msg.html("请输入6-20字符，建议由字母、数字等组合");
            return false;
        }else if(repassword.val() != password.val()){
            repassword_msg.addClass('cue_red');
            repassword_msg.removeClass('cue_gray');
            repassword_msg.show();
            repassword_msg.html("两次输入密码不一致");
            return false;
        }else{
            repassword_msg.removeClass('cue_red');
            repassword_msg.removeClass('cue_gray');
            repassword_msg.show();
            repassword_msg.html("<p style='background: url(/images/web/sucess.png) no-repeat scroll 0 0; height: 16px; width: 16px;margin-top: 10px;'></b>");
            return true;
        }
    }

    function codeValidate(code){

        var result='';
        $.ajax({
            url:'/register/codevalidate.html',
            data:{code:code},
            async:false,
            type:'POST',
            success:function(data){
                var data = eval("("+data+")");
                window.vcode = data.vcode;
                if(data.code != 8){
                    result =  false;
                }else{
                    result =  true;
                }
            },
            dataType:'text'
        });
        return result;
    }


    function skip() {
        $('#skip').click(function () {
            window.location.href="/register/success.html";
        });
    }


    return {
        init: function () {
            initregister();
            initSubmit();
            initProvince();
            initCity();
            initCompany();
            initCompanySubmit();
            initCaptcha();
            initGetmobileCaptcha();
            skip();
        },
    };

}();