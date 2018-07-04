 //右边的指示DIV
 $(function() {
    var winH=$(window).height();
	var winW=$(window).width();
	var iNow=true;
	var main_menu=$("#float-nav").find(".circle");
	var list=$(".wrap1000").eq(0).find(".module2");
	var right=$(window).width()-($(".wrap1000").offset().left+1215);
	var rightAsk=$(window).width()-($(".wrap1000").offset().left+1130);
	var scrollT_A=parseInt(document.documentElement.scrollTop||document.body.scrollTop);
	var top;
	$("#myAsk").css({right:rightAsk,display:"block"});
	$("#float-nav").css("right",right);
	if(navigator.appVersion.match("IE 6.0")){
		srcollTopIE(scrollT_A);
	}
	//改变窗口大小
	$(window).resize(function() {//document.title=$(window).width();
		if($(window).width()<1300){
			$("#float-nav").hide();
			if($(window).width()<1060){
			 $("#myAsk").hide();
			}else{
			 $("#myAsk").css("right",$(window).width()-($(".wrap1000").offset().left+1130));
			 $("#myAsk").show();
			}
			iNow=false;
		}else{
			$("#float-nav").css("right",$(window).width()-($(".wrap1000").offset().left+1215));
			$("#float-nav").show();
			$("#myAsk").css("right",$(window).width()-($(".wrap1000").offset().left+1130));
			$("#myAsk").show();
			iNow=true
			}
		display();
	});
	//滚动条滚动
	$(window).scroll(function(){
		display();
	});
	//--------
	function display(){
		var scrollT=parseInt(document.documentElement.scrollTop||document.body.scrollTop);
		if(scrollT<=400||iNow==false){
			$("#float-nav").hide();
			if($(window).width()>1060){
				$("#myAsk").show();
			}else{
				$("#myAsk").hide();
				}
		}else{
			$("#float-nav").show();
			$("#myAsk").hide();
			srcollPos(scrollT);
			if(navigator.appVersion.match("IE 6.0")){
			srcollTopIE(scrollT);
			}
		}
	}
	function srcollPos(num){
		var i=0;
		while (i<main_menu.length)
		{	
			if(parseInt(list.eq(0).offset().top)>num){
				main_menu.eq(0).addClass("circle-current");
			}else if(parseInt(list.eq(i).offset().top)<=num&&num<=[parseInt(list.eq(i).offset().top)+list.eq(i).innerHeight()+118]){
				main_menu.eq(i).addClass("circle-current");
				top=list.eq(i).offset().top;
			}else{
				main_menu.eq(i).removeClass("circle-current");
			}
		i=i+1;
		}
   }
   function srcollTopIE(num){
	   $("#float-nav").css("top",num+20);
	   }
	
});