function setSelected(name,value){
    var all_li = $("#"+name).find("div");
    //console.log(all_li.eq(10));
    //清除所有li标签的selected类
    if(value!="0"){
    all_li.eq(value).addClass("selected").siblings().removeClass("selected");
    }
}
/*$("#selectA div").click(function () {
    $(this).addClass("selected").siblings().removeClass("selected");
});*/
$(document).ready(function(){
    var string_array = getQueryString();
    for(var i=1;i<string_array.length;i++){
        var tempArr = string_array[i].split("=");
        //console.log(string_array[2]);
        //console.log(tempArr[1]);
        setSelected(tempArr[0],tempArr[1]);//设置选中的筛选条件
        if(tempArr[1]!="0"){
        addSelected(tempArr[0],tempArr[1]);//添加已选中的筛选条件
        }
    }
});
function addSelected(name,value){
    //设置 div 属性
        //判断name
        if(name=="cInvName"){
          var parent=document.getElementById('select-A');
          var div = document.createElement("div");
          div.setAttribute("id", "selectA");
          var val=$("#cInvName .selected").text();
        }else if(name=="vendor"){
          var parent=document.getElementById('select-B');
          var div = document.createElement("div");
          div.setAttribute("id", "selectB");
          var val=$("#vendor .selected").text();
        }else if(name=="cInvStd"){
          var parent=document.getElementById('select-C');
          var div = document.createElement("div");
          div.setAttribute("id", "selectC");
          var val=$("#cInvStd .selected").text();
        }else if(name=="cAddress"){
          var parent=document.getElementById('select-D');
          var div = document.createElement("div");
          div.setAttribute("id", "selectD");
          var val=$("#cAddress .selected").text();
        }
    //console.log(val);
　　　　div.innerHTML = "<a><span class='screen'>"+val+"<i>&nbsp;</i></span></a>";
　　　　parent.appendChild(div);
    
}


	$("#selectA").live("click", function () {
		var string_array2 = getQueryString();
		var oldurl=document.URL;                
        for(var i=0;i<string_array2.length;i++){
            if(!(string_array2[i].indexOf("cInvName")==-1)){
                newUrl = oldurl.replace("&"+string_array2[i],""); //如果存在筛选条件，替换为空
            }
        }
		$(this).remove();
		$("#select1 div").removeClass("selected");
		//跳转
        window.location = newUrl;
	});

  $("#selectB").live("click", function () {
    var string_array2 = getQueryString();
    var oldurl=document.URL;                
        for(var i=0;i<string_array2.length;i++){
            if(!(string_array2[i].indexOf("vendor")==-1)){
                newUrl = oldurl.replace("&"+string_array2[i],""); //如果存在筛选条件，替换为空
            }
        }
    $(this).remove();
    $("#select3 div").removeClass("selected");
    window.location = newUrl;
  });

	$("#selectC").live("click", function () {
		var string_array2 = getQueryString();
		var oldurl=document.URL;                
        for(var i=0;i<string_array2.length;i++){
            if(!(string_array2[i].indexOf("cInvStd")==-1)){
                newUrl = oldurl.replace("&"+string_array2[i],""); //如果存在筛选条件，替换为空
            }
        }
		$(this).remove();
		$("#select2 div").removeClass("selected");
		window.location = newUrl;
	});

	$("#selectD").live("click", function () {
		var string_array2 = getQueryString();
		var oldurl=document.URL;                
        for(var i=0;i<string_array2.length;i++){
            if(!(string_array2[i].indexOf("cAddress")==-1)){
                newUrl = oldurl.replace("&"+string_array2[i],""); //如果存在筛选条件，替换为空
            }
        }
		$(this).remove();
		$("#select4 div").removeClass("selected");
		window.location = newUrl;
	});