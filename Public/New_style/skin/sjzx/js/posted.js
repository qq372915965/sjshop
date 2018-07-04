function yl_click()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    alert(xmlhttp.responseText);
    if(xmlhttp.responseText=="提交成功"){
      window.location.href="../../../../e/member/Index/?enews=index&#news2";
    }else if(xmlhttp.responseText=="提交成功!"){
      window.location.href="../../../../e/member/IndexAdd/Msg_xg/index_xg.php";
    }else if(xmlhttp.responseText=="提交成功!!"){
      window.location.href="../../../../e/member/IndexAdd/Msg_xgqh/index_xgqh.php";
    }
    
    }
  }
   //获取参数并用encodeURIComponent函数对特殊字符进行编码
   var companyname=encodeURIComponent(form1.cPartnerCode.value);
   var companyid=encodeURIComponent(form1.companyid.value);
   var userfen=encodeURIComponent(form1.userfen.value);
   var cInvName=encodeURIComponent($("#cinvname").val());
   var vendor=encodeURIComponent($("#vendor").val());
   var cInvStd=encodeURIComponent($("#cinvstd").val());
   var province=encodeURIComponent(form1.province.value);
   var city=encodeURIComponent(form1.city.value);
   var area=encodeURIComponent(form1.area.value);
   var choose=encodeURIComponent(form1.choose.value);
   var fPrice=encodeURIComponent(form1.fPrice.value);
   var fWeight=encodeURIComponent(form1.fWeight.value);
   var delivery=encodeURIComponent(form1.delivery.value);
   var piaoju=encodeURIComponent(form1.piaoju.value);
   //var second=encodeURIComponent(form1.second.value);
   var chkObjs = document.getElementsByName("second");
      for(var i = 0; i < chkObjs.length; i++) {
        if(chkObjs[i].checked) {
          second = chkObjs[i].value;
          break;
        }
      }
   //var cert=encodeURIComponent(form1.cert.value);
   var certObj = document.getElementsByName("cert");
      for(var i = 0; i < certObj.length; i++) {
        if(certObj[i].checked) {
          cert = certObj[i].value;
          break;
        }
      }
   var pack=encodeURIComponent(form1.pack.value);
   var pack2=encodeURIComponent(form1.pack2.value);
   var g_type=encodeURIComponent(form1.g_type.value);
   var sl_low=encodeURIComponent(form1.sl_low.value);
   if(userfen=="1"){
   var chkObjs = document.getElementsByName("valid_day");
      for(var i = 0; i < chkObjs.length; i++) {
        if(chkObjs[i].checked) {
          chk = chkObjs[i].value;
          break;
        }
      }
   var valid_day=chk;
   }else{
    var valid_day=encodeURIComponent(form1.valid_day.value);
   }
   //alert(valid_day+"///"+second+"///"+cert); 
   var dValidDate=encodeURIComponent(form1.dValidDate.value);
   //var mian=encodeURIComponent(form1.mian.value);
   var Objmian = document.getElementsByName("mian");
      for(var i = 0; i < Objmian.length; i++) {
        if(Objmian[i].checked) {
          mian = Objmian[i].value;
          break;
        }
      }
   
   if(userfen==1){
    xmlhttp.open("post","posted_yl.php",true);
    //模拟from表单提交数据
   xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   xmlhttp.send("companyname="+companyname+"&cInvName="+cInvName+"&vendor="+vendor+"&cInvStd="+cInvStd+"&companyid="+companyid+"&userfen="+userfen+"&choose="+choose+"&delivery="+delivery+"&piaoju="+piaoju+"&province="+province+"&city="+city+"&area="+area+"&fPrice="+fPrice+"&second="+second+"&cert="+cert+"&pack="+pack+"&pack2="+pack2+"&g_type="+g_type+"&sl_low="+sl_low+"&valid_day="+valid_day+"&fWeight="+fWeight+"&dValidDate="+dValidDate);
   }else if(userfen==2){
    xmlhttp.open("post","posted_xg.php",true);
    //模拟from表单提交数据
   xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   xmlhttp.send("companyname="+companyname+"&cInvName="+cInvName+"&vendor="+vendor+"&cInvStd="+cInvStd+"&companyid="+companyid+"&userfen="+userfen+"&choose="+choose+"&delivery="+delivery+"&piaoju="+piaoju+"&province="+province+"&city="+city+"&fPrice="+fPrice+"&second="+second+"&pack="+pack+"&pack2="+pack2+"&g_type="+g_type+"&sl_low="+sl_low+"&valid_day="+valid_day+"&fWeight="+fWeight+"&dValidDate="+dValidDate);
   }else{
    xmlhttp.open("post","posted_qh.php",true);
    //模拟from表单提交数据
   xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   xmlhttp.send("companyname="+companyname+"&cInvName="+cInvName+"&vendor="+vendor+"&cInvStd="+cInvStd+"&companyid="+companyid+"&userfen="+userfen+"&choose="+choose+"&delivery="+delivery+"&piaoju="+piaoju+"&province="+province+"&city="+city+"&fPrice="+fPrice+"&pack="+pack+"&pack2="+pack2+"&g_type="+g_type+"&sl_low="+sl_low+"&valid_day="+valid_day+"&fWeight="+fWeight+"&dValidDate="+dValidDate+"&mian="+mian);
   }
}


function gx_click()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    alert(xmlhttp.responseText);
    if(xmlhttp.responseText=="提交成功"){
      window.location.href="../../../../e/member/Index/indexgxnew.php";
    }
    
    }
  }
   //获取参数并用encodeURIComponent函数对特殊字符进行编码
   var companyname=encodeURIComponent(sendmsg.companyname.value);
   var companyid=encodeURIComponent(sendmsg.companyid.value);
   var goodsname=encodeURIComponent(sendmsg.goodsname.value);
   var vendor2=encodeURIComponent(sendmsg.vendor2.value);
   //var vendor=encodeURIComponent(sendmsg.vendor.value);
   var model=encodeURIComponent(sendmsg.model.value);
   var outvendor=encodeURIComponent(sendmsg.outvendor.value);
   //var outvendor2=encodeURIComponent(sendmsg.outvendor2.value);
   var Basematerial=encodeURIComponent(sendmsg.Basematerial.value);
   var Supplementarymaterial=encodeURIComponent(sendmsg.Supplementarymaterial.value);
   var proportion=encodeURIComponent(sendmsg.proportion.value);
   var level=encodeURIComponent(sendmsg.level.value);
   var color=encodeURIComponent(sendmsg.color.value);
   var features=encodeURIComponent(sendmsg.features.value);
   var keywords=encodeURIComponent(sendmsg.keywords.value);
   var usecase=encodeURIComponent(sendmsg.usecase.value);
   var certification=encodeURIComponent(sendmsg.certification.value);
   var thetrial=encodeURIComponent(sendmsg.thetrial.value);
   var Exfactoryprice=encodeURIComponent(sendmsg.Exfactoryprice.value);
   var outstd=encodeURIComponent(sendmsg.outstd.value);
   //var pic_1=encodeURIComponent(sendmsg.pic_1.value);
   if(sendmsg.pic_1==undefined){
      var pic_1="";
   }else{
      var pic_1=encodeURIComponent(sendmsg.pic_1.value);
   }
   if(sendmsg.pic_2==undefined){
      var pic_2="";
   }else{
      var pic_2=encodeURIComponent(sendmsg.pic_2.value);
   }
   if(sendmsg.pic_3==undefined){
      var pic_3="";
   }else{
      var pic_3=encodeURIComponent(sendmsg.pic_3.value);
   }
   if(sendmsg.pic_4==undefined){
      var pic_4="";
   }else{
      var pic_4=encodeURIComponent(sendmsg.pic_4.value);
   }
   if(sendmsg.pic_5==undefined){
      var pic_5="";
   }else{
      var pic_5=encodeURIComponent(sendmsg.pic_5.value);
   }
   if(sendmsg.vendor==undefined){
      var vendor="";
   }else{
      var vendor=encodeURIComponent(sendmsg.vendor.value);
   }
   
   xmlhttp.open("post","posted_gx.php",true);
   //模拟from表单提交数据
   xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   xmlhttp.send("companyname="+companyname+"&companyid="+companyid+"&goodsname="+goodsname+"&vendor="+vendor+"&vendor2="+vendor2+"&model="+model+"&outvendor="+outvendor+"&Basematerial="+Basematerial+"&Supplementarymaterial="+Supplementarymaterial+"&proportion="+proportion+"&level="+level+"&color="+color+"&features="+features+"&keywords="+keywords+"&usecase="+usecase+"&certification="+certification+"&thetrial="+thetrial+"&Exfactoryprice="+Exfactoryprice+"&outstd="+outstd+"&pic_1="+pic_1+"&pic_2="+pic_2+"&pic_3="+pic_3+"&pic_4="+pic_4+"&pic_5="+pic_5);
}


function zs_click()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    alert(xmlhttp.responseText);
    if(xmlhttp.responseText=="提交成功"){
    window.location.href="../../../../e/member/Index/indexzsnew.php";
    }
    }
  }
   //获取参数并用encodeURIComponent函数对特殊字符进行编码
   var companyname=encodeURIComponent(sendmsg.cPartnerCode.value);
   var cInvName=encodeURIComponent(sendmsg.cInvName.value);
   var vendor2=encodeURIComponent(sendmsg.vendor2.value);
   //var vendor=encodeURIComponent(sendmsg.vendor.value);
   var cInvStd=encodeURIComponent(sendmsg.cInvStd.value);
   var companyid=encodeURIComponent(sendmsg.companyid.value);
   //var color=encodeURIComponent(sendmsg.color.value);
   var trial=encodeURIComponent(sendmsg.trial.value);
   var trade=encodeURIComponent(sendmsg.trade.value);
   var province=encodeURIComponent(sendmsg.province.value);
   var city=encodeURIComponent(sendmsg.city.value);
   var fPrice=encodeURIComponent(sendmsg.fPrice.value);
   var level=encodeURIComponent(sendmsg.level.value);
   //var pic_1=encodeURIComponent(sendmsg.pic_1.value);
   if(sendmsg.pic_1==undefined){
      var pic_1="";
   }else{
      var pic_1=encodeURIComponent(sendmsg.pic_1.value);
   }
   if(sendmsg.pic_2==undefined){
      var pic_2="";
   }else{
      var pic_2=encodeURIComponent(sendmsg.pic_2.value);
   }
   if(sendmsg.pic_3==undefined){
      var pic_3="";
   }else{
      var pic_3=encodeURIComponent(sendmsg.pic_3.value);
   }
   if(sendmsg.vendor==undefined){
      var vendor="";
   }else{
      var vendor=encodeURIComponent(sendmsg.vendor.value);
   }

   xmlhttp.open("post","posted_zs.php",true);
   //模拟from表单提交数据
   xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   xmlhttp.send("companyname="+companyname+"&cInvName="+cInvName+"&vendor="+vendor+"&vendor2="+vendor2+"&cInvStd="+cInvStd+"&companyid="+companyid+"&trial="+trial+"&trade="+trade+"&province="+province+"&city="+city+"&fPrice="+fPrice+"&level="+level+"&pic_1="+pic_1+"&pic_2="+pic_2+"&pic_3="+pic_3);
}


function zj_click()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    alert(xmlhttp.responseText);
    if(xmlhttp.responseText=="提交成功"){
    window.location.href="../../../../e/member/Index/indexzjnew.php";
    }
    }
  }
   //获取参数并用encodeURIComponent函数对特殊字符进行编码
   var companyname=encodeURIComponent(form1.cPartnerCode.value);
   var companyid=encodeURIComponent(form1.companyid.value);
   var cInvName=encodeURIComponent(form1.cInvName.value);
   var vendor2=encodeURIComponent(form1.vendor2.value);
   //var vendor=encodeURIComponent(form1.vendor.value);
   var cInvStd=encodeURIComponent(form1.cInvStd.value);
   var trial=encodeURIComponent(form1.trial.value);
   var province=encodeURIComponent(form1.province.value);
   var city=encodeURIComponent(form1.city.value);
   var piaoju=encodeURIComponent(form1.piaoju.value);
   var fPrice=encodeURIComponent(form1.fPrice.value);
   var yxq=encodeURIComponent(form1.yxq.value);
   //var pic_1=encodeURIComponent(form1.pic_1.value);
   if(form1.pic_1==undefined){
      var pic_1="";
   }else{
      var pic_1=encodeURIComponent(form1.pic_1.value);
   }
   if(form1.pic_2==undefined){
      var pic_2="";
   }else{
      var pic_2=encodeURIComponent(form1.pic_2.value);
   }
   if(form1.pic_3==undefined){
      var pic_3="";
   }else{
      var pic_3=encodeURIComponent(form1.pic_3.value);
   }
   if(form1.vendor==undefined){
      var vendor="";
   }else{
      var vendor=encodeURIComponent(form1.vendor.value);
   }
   
   xmlhttp.open("post","posted_zj.php",true);
   //模拟from表单提交数据
   xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   xmlhttp.send("companyname="+companyname+"&companyid="+companyid+"&cInvName="+cInvName+"&vendor="+vendor+"&vendor2="+vendor2+"&cInvStd="+cInvStd+"&trial="+trial+"&province="+province+"&city="+city+"&piaoju="+piaoju+"&fPrice="+fPrice+"&yxq="+yxq+"&pic_1="+pic_1+"&pic_2="+pic_2+"&pic_3="+pic_3);
}


function gh_click()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    alert(xmlhttp.responseText);
    if(xmlhttp.responseText=="提交成功"){
      var ark_1=form1.ark_1.value;
      if(ark_1=="1"){
        window.location.href="../../../../e/member/Index/index_gh.php";
      }else{
        window.location.href="../../../../e/member/Index/index_gh2.php";
      }
    }
    }
  }
   //获取参数并用encodeURIComponent函数对特殊字符进行编码
   var companyname=encodeURIComponent(form1.cPartnerCode.value);
   var companyid=encodeURIComponent(form1.companyid.value);
   var ark_1=encodeURIComponent(form1.ark_1.value);
   var cInvName=encodeURIComponent($("#cinvname").val());
   var vendor=encodeURIComponent($("#vendor").val());
   var cInvStd=encodeURIComponent($("#cinvstd").val());
   var ark_3=encodeURIComponent(form1.ark_3.value);
   var ark_4=encodeURIComponent(form1.ark_4.value);
   var ark_5=encodeURIComponent(form1.ark_5.value);
   var ark_6=encodeURIComponent(form1.ark_6.value);
   var ark_7=encodeURIComponent(form1.ark_7.value);
   //var ark_8=encodeURIComponent(form1.ark_8.value);
   //var ark_9=encodeURIComponent(form1.ark_9.value);
   var ark_10=encodeURIComponent(form1.ark_10.value);
   var province=encodeURIComponent(form1.province.value);
   var city=encodeURIComponent(form1.city.value);
   var area=encodeURIComponent(form1.area.value);
   var choose=encodeURIComponent(form1.choose.value);
   var ark_11=encodeURIComponent(form1.ark_11.value);
   var ark_12=encodeURIComponent(form1.ark_12.value);
   var ark_13=encodeURIComponent(form1.ark_13.value);
   var ark_14=encodeURIComponent(form1.ark_14.value);
   var ark_16=encodeURIComponent(form1.ark_16.value);
   var ark_17=encodeURIComponent(form1.ark_17.value);
   var ark_18=encodeURIComponent(form1.ark_18.value);
   var ark_19=encodeURIComponent(form1.ark_19.value);
   //var ark_15=encodeURIComponent(form1.ark_15.value);
   var chkObjs = document.getElementsByName("ark_8");
      for(var i = 0; i < chkObjs.length; i++) {
        if(chkObjs[i].checked) {
          ark_8 = chkObjs[i].value;
          break;
        }
      }
   var certObj = document.getElementsByName("ark_9");
      for(var i = 0; i < certObj.length; i++) {
        if(certObj[i].checked) {
          ark_9 = certObj[i].value;
          break;
        }
      }
   var chkObjs = document.getElementsByName("ark_15");
      for(var i = 0; i < chkObjs.length; i++) {
        if(chkObjs[i].checked) {
          ark_15 = chkObjs[i].value;
          break;
        }
      }

   xmlhttp.open("post","posted_gh.php",true);
   //模拟from表单提交数据
   xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   xmlhttp.send("companyname="+companyname+"&companyid="+companyid+"&ark_1="+ark_1+"&cInvName="+cInvName+"&vendor="+vendor+"&cInvStd="+cInvStd+"&ark_3="+ark_3+"&ark_4="+ark_4+"&ark_5="+ark_5+"&ark_6="+ark_6+"&ark_7="+ark_7+"&ark_8="+ark_8+"&ark_9="+ark_9+"&ark_10="+ark_10+"&ark_11="+ark_11+"&ark_12="+ark_12+"&ark_13="+ark_13+"&ark_14="+ark_14+"&ark_15="+ark_15+"&choose="+choose+"&province="+province+"&city="+city+"&area="+area+"&ark_16="+ark_16+"&ark_17="+ark_17+"&ark_18="+ark_18+"&ark_19="+ark_19);
}