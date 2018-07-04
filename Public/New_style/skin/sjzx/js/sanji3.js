$(document).ready(function(e) {
    
    FillShi();
    FillQu();
    
    $("#cInvName").change(function(){
        FillShi();
        FillQu();
        change();
        
        })
    $("#vendor").change(function(){
        FillQu();
        })
    
    
    function FillShi()
    {
        
        var code = $("#cInvName").val();
        var companyname=document.getElementById("companyname").value;
        $.ajax({
            async:false, //异步  是指两个页面同时执行 同步是指两个页面加载完一个之后加载另一个
            url:"../../../class/chuli_zs.php",
            data:{code:code,companyname:companyname},
            type:"POST",
            datatype:"TEXT",
            success: function(data){            
                    var hang = data.split('|');
                    if(!data){
                       var s = "<option value='0'>&nbsp;&nbsp;--请选择--&nbsp;&nbsp;</option>";
                    }else{
                    var s = "<option value='0'>&nbsp;&nbsp;--请选择--&nbsp;&nbsp;</option>";
                    for(var i=0;i<hang.length;i++)
                    {
                        var lie = hang[i].split('^');
                        s = s+"<option value='"+lie[0]+"'>"+lie[0]+"</option>";
                    }
                    }

                    $("#vendor").html(s);
                     
                }
            
            });
    }
    
    function FillQu()
    {
        var code_name = $("#cInvName").val();
        var code = $("#vendor").val();
        $.ajax({
            async:false,
            url:"../../../class/chuli_zs2.php",
            data:{code:code,code_name:code_name},
            type:"POST",
            datatype:"TEXT",
            success: function(data){
                    var hang = data.split('|');
                    if(!data){
                       var s = "<option value='0'>&nbsp;&nbsp;--请选择--&nbsp;&nbsp;</option>"; 
                    }else{
                    var s = "<option value='0'>&nbsp;&nbsp;--请选择--&nbsp;&nbsp;</option>";
                    for(var i=0;i<hang.length;i++)
                    {
                        var lie = hang[i].split('^');
                        s = s+"<option value='"+lie[3]+"'>"+lie[3]+"</option>";
                    }
                    }
                    
                    $("#cInvStd").html(s);
                
                }
            
            });
    }



    function change(){
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
            document.getElementById("cktext2").innerHTML=xmlhttp.responseText;
            }
          }
           var bb=form1.cInvName.value;
          xmlhttp.open("get","result_change.php?cInvName="+bb,true);
          xmlhttp.send();

    }
    
    
});