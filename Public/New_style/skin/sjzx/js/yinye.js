(function($){

	//指引页隐藏与显示
	$(".close-btn,.btn-r .btn").click(function(){
		$(this).parents(".yinye").hide()
	})

	/*//指引页 认证
	$(".btn").click(function(){
		
		var bl=true;
		var p=$(this).parents(".file-tab");
		$(".file",p).each(function(){
			
			var obj=$(this).find(".yz");
			var v=obj.val();
		
			if(v!='1'){
				alert(obj.attr("data-text")+"不能为空！")
				return	bl=false;
			}
		
			
			
		});
		
		//认证通过
		if(bl){
			$(".yinye").show();  //显示
		}
		
	});*/

})(window.jQuery)


//三证合一
 function ajaxupload(){
 	var uscard=$("#pic_7").val();
 	var Idcard1=$("#pic_8").val();
 	var Idcard2=$("#pic_9").val();
 	var Thestore=$("#pic_10").val();
 	var id = $("#companyid").val();
 	$.post("ajaxupload.php",{id:id,uscard:uscard,Idcard1:Idcard1,Idcard2:Idcard2,Thestore:Thestore},function(data){
        if(data==1){
          $(".yinye").show();
        }else{
          alert(data);
        }
 	}).error(function(){


 	})


 }

//普通认证
 function ajaxupload2(){
 	var yylicense=$("#pic_1").val();
 	var taxzj=$("#pic_2").val();
 	var organization=$("#pic_3").val();
 	var Idcard11=$("#pic_4").val();
 	var Idcard22=$("#pic_5").val();
 	var Thestore2=$("#pic_6").val();
 	var id = $("#companyid").val();
 	$.post("ajaxupload2.php",{id:id,yylicense:yylicense,taxzj:taxzj,organization:organization,Idcard11:Idcard11,Idcard22:Idcard22,Thestore2:Thestore2},function(data){
        if(data==1){
          $(".yinye").show();
        }else{
          alert(data);
        }
 	}).error(function(){


 	})


 }



