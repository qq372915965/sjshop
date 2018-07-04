/*window.onload = function(){
                  
     // 鼠标移动改变背景,可以通过给每行绑定鼠标移上事件和鼠标移除事件来改变所在行背景色。
        var tr=document.getElementById("jingjia_u4"); 
		for(var i=0;i<tr.length;i++)
        {
            bgchange(tr[i]);
        }

	 }
     function bgchange(obj)
     {
        obj.onmouseover=function()
        {
            obj.style.backgroundColor="#ff00ff";
        }
        obj.onmouseout=function()
        {
            obj.style.backgroundColor="#00ff00";
        }
     }*/


     var bg=document.getElementById("jingjia_u4");
        for (var i = 0;i<bg.length;i++) {
            if (i=2*i+1) {
                bg.style.backgroundColor="blue";
            }else{
                bg.style.backgroundColor="red";
            }
        }

         