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
        
        $.ajax({
            async:false, //异步  是指两个页面同时执行 同步是指两个页面加载完一个之后加载另一个
            url:"/e/class/chuli.php",
            data:{code:code},
            type:"POST",
            datatype:"TEXT",
            success: function(data){
                
                    var hang = data.split('|');
                    var s = "<option value='0'>&nbsp;&nbsp;--请选择--&nbsp;&nbsp;</option>";
                    for(var i=0;i<hang.length;i++)
                    {
                        var lie = hang[i].split('^');
                        s = s+"<option value='"+lie[0]+"'>"+lie[1]+"</option>";
                    }
                    
                    $("#vendor").html(s);
                
                }
            
            });
    }
    
    function FillQu()
    {
        var code = $("#vendor").val();
        $.ajax({
            async:false,
            url:"/e/class/chuli2.php",
            data:{code:code},
            type:"POST",
            datatype:"TEXT",
            success: function(data){
                
                    var hang = data.split('|');
                    var s = "<option value='0'>&nbsp;&nbsp;--请选择--&nbsp;&nbsp;</option>";
                    for(var i=0;i<hang.length;i++)
                    {
                        var lie = hang[i].split('^');
                        s = s+"<option value='"+lie[0]+"'>"+lie[1]+"</option>";
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