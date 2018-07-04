

$(function(){
	
	// 全选
	$(".baojia-list-cont .all-select").click(function(){
		
	
		
		if($(this).attr("data-bl")){
			
			$(this).removeAttr("data-bl");
			$(this).removeClass("active");
			$(this).val("全选");
			select_ck(false);
			
		}else{
			$(this).addClass("active");
			$(this).attr("data-bl","true");

			$(this).val("取消");
			
			select_ck(true);
		
		}
	});
	
	function select_ck(bl){
	
		$(".baojia-list-cont table  .l1-box input[type=checkbox]").each(function(){
			if(bl){
			 $(this).attr("checked",false); 
             $(this).click();
             $(this).attr("checked", true);
            }else{
              $(this).attr("checked", false);
            }
		});
		
	}
	
	// 设置日期
	$(".baojia-list-cont .set-date").click(function(){
		
		var $arrs=$(".baojia-list-cont table .item input[type=checkbox]:checked");
					if($arrs.length<=0){
						alert("你还没有选择数据！");
						return;
		}
		var v=$(this).text();
		if(confirm("是否将所有的有效的天数设为："+v+"天")){
			
			//$(".baojia-list-cont table  .txt.date")
			$arrs.each(function(){
				
				$(this).parents(".item").find(".txt.date").val(v);
			});
		}
	});
	
	// 重置日期
	$(".baojia-list-cont .reset-date").click(function(){
		var $arrs=$(".baojia-list-cont table .item input[type=checkbox]:checked");
					if($arrs.length<=0){
						alert("你还没有选择数据！");
						return;
		}
		
		if(confirm("是否重置所有的有效的天数")){
			
		    $arrs.each(function(){
				$(this).parents(".item").find(".txt.date").val(0);
			});
		}
	});
	
	
	//详情
	$(".baojia-list-cont table tbody ").on("click",".dtl-btn",function(){
	
		var p=$(this).parents(".item");
		$(p).next().stop().fadeToggle(400);
		
	});
	
	
	// 保存数据
	$(".baojia-list-cont table tbody ").on("click"," .save",function(){
		
		var p=$(this).parents(".item");	
		var  list=[];
		var obj={};
		if(obj.fweight	=$(".fweight",p).val()<0.1){
			alert("数量不能低于0.1");
			return;
		}
		if(obj.fprice	=$(".fprice",p).val()<1000){
			alert("请检查价格是否错误");
			return;
		}

		if((obj.thecontact	=$(".thecontact",p).val()) == ''){
			alert("联系人不能为空");
			return;
		}
		if(confirm("是否要保存该数据？")){
			obj.id=	$("input[type=checkbox]",p).attr("data-id");
			obj.fprice=	$(".fprice",p).val();
			obj.valid_day=	$(".date",p).val();
			obj.fweight	=$(".fweight",p).val();
			obj.thecontact=$(".thecontact",p).val();
			  //alert(JSON.stringify(obj));
			  list.push(obj);
			  //alert(JSON.stringify(list));
			  			 $.post(mod+"/Baojialistuser/baojia_list_save",
							 {data:JSON.stringify(list)},
							 function(data){ 
							  alert('保存成功');
							  $("#baojia_data_list").html(data); 
							}).error(function(){ 
							  //当服务器出现异常时 
							  alert('数据异常');
							}) 
			
		}
	})

	    // 上架数据
	$(".baojia-list-cont table tbody").on("click"," .up",function(){
		
		var p=$(this).parents(".item");
        var  list=[];
		var obj={};
		if(obj.fweight	=$(".fweight",p).val()<0.1){
			alert("数量不能低于0.1");
			return;
		}
		if(obj.fprice	=$(".fprice",p).val()<1000){
			alert("请检查价格是否错误");
			return;
		}

		if((obj.thecontact	=$(".thecontact",p).val()) == ''){
			alert("联系人不能为空");
			return;
		}		
		if(confirm("是否要上架该数据？")){	
			obj.id=	$("input[type=checkbox]",p).attr("data-id");
			obj.fprice=	$(".fprice",p).val();
			obj.valid_day=	$(".date",p).val();
			obj.fweight	=$(".fweight",p).val();
			obj.thecontact=$(".thecontact",p).val();
			  //alert(JSON.stringify(obj));
			  list.push(obj);
			  //alert(JSON.stringify(list));
			  			 $.post(mod+"/Baojialistuser/baojia_list_save/status/0",
							 {data:JSON.stringify(list)},
							 function(data){ 
							  alert('上架成功');
							  
							   window.location.reload();
							  $("#baojia_data_list").html(data);
                               							  
							}).error(function(){ 
							  //当服务器出现异常时 
							  alert('数据异常');
							}) 
			         
			
		}
	})

	
		// 下架数据
	$(".baojia-list-cont table tbody").on("click"," .sapan",function(){
		
		var p=$(this).parents(".item");
        var  list=[];
		var obj={};		
		if(confirm("是否要下架该数据？")){
			
			
			obj.id=	$("input[type=checkbox]",p).attr("data-id");
			obj.fprice=	$(".fprice",p).val();
			obj.valid_day=	$(".date",p).val();
			obj.fweight	=$(".fweight",p).val();
			obj.thecontact=$(".thecontact",p).val();
			  //alert(JSON.stringify(obj));
			  list.push(obj);
			  //alert(JSON.stringify(list));
			  			 $.post(mod+"/Baojialistuser/baojia_list_save/status/1",
							 {data:JSON.stringify(list)},
							 function(data){ 
							  alert('下架成功');
							   window.location.reload();
							  $("#baojia_data_list").html(data); 
							   
							}).error(function(){ 
							  //当服务器出现异常时 
							  alert('数据异常');
							}) 
			
			
		}
	})
	
	
	
	
		// 删除数据
	$(".baojia-list-cont table tbody").on("click"," .del",function(){
		
		var p=$(this).parents(".item");	
		var  list=[];
		var obj={};	
		if(confirm("是否要删除该数据？")){
			
			// todo ajax ...
			
			
			obj.id=	$("input[type=checkbox]",p).attr("data-id");
			obj.fprice=	$(".fprice",p).val();
			obj.valid_day=	$(".date",p).val();
			obj.fweight	=$(".fweight",p).val();
			obj.thecontact=$(".thecontact",p).val();
			  //alert(JSON.stringify(obj));
			  list.push(obj);
			  //alert(JSON.stringify(list));
			  			 $.post(mod+"/Baojialistuser/baojia_list_save/status/3",
							 {data:JSON.stringify(list)},
							 function(data){ 
							  alert('删除成功');
							  $("#baojia_data_list").html(data); 
							}).error(function(){ 
							  //当服务器出现异常时 
							  alert('数据异常');
							}) 
			
			
			//$(p).next().remove();
			//$(p).remove();
		}
	})
	
	
	
	
	
	
	
	
	
});


