$(document).ready(function(e) {
    
    FillShi();
    FillQu();
    
    $("#cInvName").change(function(){
        
        FillShi();
        FillQu();
        
        })
    $("#vendor").change(function(){
        FillQu();
        })
    
    
    function FillShi()
    {
        
        var code = $("#cInvName").val();
        
        $.ajax({
            async:false, //异步  是指两个页面同时执行 同步是指两个页面加载完一个之后加载另一个
            url:"../../class/chuli.php",
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
            url:"../../class/chuli2.php",
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
    
    
});